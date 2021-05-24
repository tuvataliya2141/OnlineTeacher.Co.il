<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{


    
    function index()
    {
        $user = DB::table('users')->where('user_type',1)->where('soft_delete',0)->get()->all();
        // $works = DB::table('work')->where('soft_delete',0)->limit(6)->orderBy('id','desc')->get();

        $works = DB::table('work')->where('soft_delete',0)->where('status',1)->get();
        $footer = DB::table('footer_setting')->first();

        // $service = DB::table('service')->where('soft_delete',0)->limit(3)->orderBy('id','asc')->get()->all();

        $service = DB::table('service')->where('soft_delete',0)->where('status',1)->get()->all();

        $subject = DB::table('subject')->where('soft_delete',0)->where('status',1)->get()->all();
        
        return view('front.index',compact('user','works','footer','service','subject'));
    }
    
    function login()
    {
        if (session()->get('userlogin')) {
            return  redirect('home');
        } else {


            if (Auth::user() == '') {

                return view('front.login');
            } else {
                return redirect('/');
            }
        }
    }



    function viewabout()
    {
        session()->put('catName', '');
        session()->put('pageName', 'about');
        return view('front.about');
    }

    function viewcontact()
    {
        session()->put('catName', '');
        session()->put('pageName', 'contact');
        return view('front.contact');
    }
    function add_contactus(Request $request) 
    {
        // dd($_POST);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:150',
            'email' => 'required',
            // 'contact_no' => 'required|min:10|max:13',
            // 'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->passes()) {
            $dataArray = [
                "name" => $request->name,
                "email" => $request->email,
                "contact_no" => '',
                "subject" => '',
                "message" => $request->message,
                "updated_at" => now(),
            ];

            $result = DB::table('contact_us')->insert($dataArray);
            if ($result) {
                return response()->json(['success' => true]);
            } else {
            }
        } else {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()]);
        }
    }
    function add_subscriber(Request $request)
    {
        $validation_fields['email'] = 'required|email|unique:subscribers';
        $validation_msg['email.required'] = 'Email is Required for Subscribe !';
        $validation_msg['email.email'] = 'Please Enter Valid Email!';
        $validation_msg['email.unique'] = 'Email already Subscribed !';
        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);


        // $validator = Validator::make($request->all(), [

        //     'email' => 'required|email|unique:subscribers',
        // ]);

        if ($validator->passes()) {
            $dataArray = [
                "email" => $request->email,
            ];

            $result = DB::table('subscribers')->insert($dataArray);

            $email_id = DB::table('subscribers')->latest()->value('email');

            $data = array('name' => 'Dear,', 'body' => 'Thank You For Subscribe With Us ');

            $mail = Mail::send('subscriber_reply', $data, function ($message) use ($email_id) {
                $message->to($email_id)
                    ->subject('Greetings');
                $message->from('noreply@technobrigadeinfotech.com', 'Flowershop');
            });

            // $data = array('name' => 'Dear,', 'body' => $request->message);
            // Mail::send('mail', $data, function ($message) use ( $email_id) {
            //     $message->to($email_id) 
            //         ->subject('Newsletter');
            //     $message->from('noreply@technobrigadeinfotech.com', 'TBI'); 
            // });



            if ($result) {
                return response()->json(['success' => true]);
            } else {
            }
        } else {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()]);
        }
    }

    function productReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'review_msg' => 'required',
            'rating' => 'required',

        ]);

        if ($validator->passes()) {
            $dataArray = [
                "name" => $request->name,
                "review" => $request->review_msg,
                "rating" => $request->rating,
                "product_id" => $request->product_id,
            ];

            $result = DB::table('product_review')->insert($dataArray);
            if ($result) {
                return response()->json(['success' => true]);
            } else {
            }
        } else {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()]);
        }
    }
}
