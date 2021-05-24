<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contact;
use Mail;
class ContactUsController extends Controller
{
    function show()
    {
        session()->put('pageName', 'contactusPage');
        $contacts = DB::table('contact_us')
            ->where('soft_delete',0)
            ->get()->all();

        if (request()->ajax()) {
            return datatables()->of($contacts)
                ->editColumn('created_at', function ($contacts) {
                    return date('d-M-Y h:i:s a', strtotime($contacts->created_at));
                })

                ->addColumn('Response', function($contacts){

                    $email = "replymail('".$contacts->email."')";
                    return '<center><button onclick="'.$email.'" id="replymess" class="btn btn-success btn-sm"> Reply </button></center>';
    
                })

                ->addColumn('action', function ($contacts) {
                    return '<a href=contact-us/view/' . $contacts->id . ' title="View" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> '
                        . '<button onclick="deleteContact(' . $contacts->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';

                    // '<a href=orders/edit/' . $orders->id . ' title="Edit" class="btn btn-warning btn-sm" disable><i class="fas fa-edit"></i></a> ';
                })


                ->rawColumns(['created_at','Response','action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.contactus');
    }

    function contact_delete(Request $request)
    {
        $id = $request->id;
        $contactDelete = Contact::find($id);

        $contactDelete->soft_delete = '1';
        $contactDelete->save();
        if ($contactDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $contactDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function viewContact($id,Request $request)
    {
        $id = $request->id;
        $contact = Contact::where('id',$id)->get()->first();
        // dd($contact_detail);
        return view('admin.viewContactus')->with(compact('contact'));
  
    }

    function sendmail(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'message' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        $email_id = $request->email;

                  $dataArray = [
                "message" => $request->message,
                "email" => $email_id,
                "created_at" => now()
            ];

            $result = DB::table('tbl_contact_reply')->insert($dataArray); 



      

        $data = array('name' => $request->name, 'body' => $request->message);
        Mail::send('contactmail', $data, function ($message) use ($email_id) {
            $message->to($email_id)
                ->subject('Newsletter');
            $message->from('noreply@technobrigadeinfotech.com', 'TBI');
        });

        return response()->json(['success' => 'Data is successfully added', 'email_id' => $email_id]);

    }
}
