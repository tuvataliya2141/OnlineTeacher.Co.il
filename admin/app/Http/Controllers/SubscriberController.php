<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Subscriber;
use Mail;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function show()
    {
        session()->put('pageName', 'subsciberPage');

        $subscribers = DB::table('subscribers')
        ->where('soft_delete',0)
            ->get()->all();

//  return $subscribers;

        if (request()->ajax()) {
            return datatables()->of($subscribers)
                ->editColumn('created_at', function ($subscribers) {
                    return date('d-M-Y h:i:s a', strtotime($subscribers->created_at));
                })

                ->addColumn('Response', function($subscribers){
                    $email_address = $subscribers->email;
                    // return '<center><button onclick="'.$email_address.'" id="reply" class="btn btn-success btn-sm"> Reply </button></center>';
                    return '<center><input type="checkbox" class="childCheckbox" name="chkId"  value="'.$email_address.'" id="'.$subscribers->id.'"/></center>';
                })

                ->addColumn('action', function ($subscribers) {
                    return '<button onclick="deleteSubscriber(' . $subscribers->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';

                    // '<a href=orders/edit/' . $orders->id . ' title="Edit" class="btn btn-warning btn-sm" disable><i class="fas fa-edit"></i></a> ' '<a href=subscribers/view/' . $subscribers->id . ' title="View" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> '
                        // . ;
                })


                ->rawColumns(['created_at','Response','action'])  
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.subscibers');
    }

    function subscriber_delete(Request $request)
    {
        $id = $request->id;
        $subscriberDelete = Subscriber::find($id);

        $subscriberDelete->soft_delete = '1';
        $subscriberDelete->save();
        if ($subscriberDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $subscriberDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function savemail(Request $request)
    {

        // dd($_POST);

        $validator = \Validator::make($request->all(), [
            'message' => 'required',
            'user_mail' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $email_address = explode(', ',$request->user_mail);

        foreach($email_address as $email_id){
            
            // $dataArray = [
            //     "message" => $request->message,
            //     "email_address" => $email_id,
            //     "created_at" => now()
            // ];

            // $result = DB::table('tbl_subscribe_reply')->insert($dataArray); 

            // $email_id = 'malisagar1995@gmail.com'; 
            
            $data = array('name' => 'Dear,', 'body' => $request->message);
            Mail::send('mail', $data, function ($message) use ( $email_id) {
                $message->to($email_id)
                    ->subject('Newsletter');
                $message->from('noreply@technobrigadeinfotech.com', 'TBI');
            });
        }
        
        return response()->json(['success' => 'Data is successfully added','email_id' => $email_id]);
   
    }

    


}
