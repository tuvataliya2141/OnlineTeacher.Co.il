<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

 
class CoupenController extends Controller
{
    function show()
    {
        session()->put('pageName', 'couponPage');
        $coupons = DB::table('tbl_coupons')->where('soft_delete',0)->get()->all();


        if (request()->ajax()) {
            return datatables()->of($coupons)
                ->addColumn('status', function ($coupons) {
                    if ($coupons->status == '1') {
                        return '<button onclick="changeCoupon_Status(' . $coupons->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeCoupon_Status(' . $coupons->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })

                ->editColumn('type', function ($coupons) {
                    if($coupons->type == 1)
                    {
                        return 'Percentage';
                    }
                    else
                    {
                        return 'Amount';
                    }
                    
                })

                ->editColumn('min_amount', function ($coupons) {
                    if($coupons->min_amount == NULL|0)
                    {
                        return 'N/A';
                    }
                    else
                    {
                        return $coupons->min_amount;
                    }
                    
                })

                ->editColumn('created_at', function ($coupons) {
                    return date('d-M-Y h:i:s a', strtotime($coupons->created_at));
                })

                ->addColumn('action', function ($coupons) {
                    return '<a href=coupon/edit/' . $coupons->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteCoupon(' . $coupons->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })


                ->rawColumns(['min_amount','status','created_at', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.coupons'); 
    }

    function addCoupon()
    {
        return view('admin.couponAdd');
    }

    function saveCoupon(Request $request)
    {
 
        $validation_fields['code'] = 'required';
        $validation_msg['code.required'] = 'CouponCode is Required !';
        $validation_fields['type'] = 'required';
        $validation_msg['type.required'] = 'Discount Type  is Required !';

        $validation_fields['value'] = 'required|digits_between:1,3';
        $validation_msg['value.required'] = 'Discount value   is Required !';
        // $validation_fields['value'] = 'digits_between:2,5';
        $validation_msg['value.digits_between'] = 'Discount value accept Digit,Minimum 1 Digit!';

        // $validation_fields['min_amount'] = 'required|digits';
        // $validation_msg['min_amount.required'] = 'Minimum Amount  is Required !';

        if(!empty($request->min_amount)){
            $validation_fields['min_amount'] = 'digits_between:2,5';
            $validation_msg['min_amount.digits_between'] = 'Minimum Amount accept Digit only !';
        }

     



        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);


        if ($validator->passes()) {

            // dd($_POST);

            $coupon_array = array(
                // 'code' => $request->code, 
                'code'  => $request->code ? $request->code : '',
                'type'  => $request->type ? $request->type : '',
                'value'  => $request->value ? $request->value : '',
                'min_amount'=>  $request->min_amount ? $request->min_amount : NULL,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            );



           DB::table('tbl_coupons')->insert($coupon_array);

        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function editCoupon($id,Request $request)
    {
        $coupon = DB::table('tbl_coupons')->where('id',$request->id)->first();
        return view('admin.couponEdit')->with(compact('coupon'));
    }

    function updateCoupon(Request $request)
    {
        

        $validation_fields['code'] = 'required';
        $validation_msg['code.required'] = 'CouponCode is Required !';
        $validation_fields['type'] = 'required';
        $validation_msg['type.required'] = 'Discount Type  is Required !';

        $validation_fields['value'] = 'required|digits_between:1,3';
        $validation_msg['value.required'] = 'Discount value   is Required !';
        // $validation_fields['value'] = 'digits_between:2,5';
        $validation_msg['value.digits_between'] = 'Discount value accept Digit,Minimum 1 Digit!';

        // $validation_fields['min_amount'] = 'required|digits';
        // $validation_msg['min_amount.required'] = 'Minimum Amount  is Required !';

        if(!empty($request->min_amount)){
            $validation_fields['min_amount'] = 'digits_between:2,5';
            $validation_msg['min_amount.digits_between'] = 'Minimum Amount accept Digit only !';
        }

        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);

        if ($validator->passes()) {
// dd($_POST);

$coupon_array = array(
    // 'code' => $request->code, 
    'code'  => $request->code ? $request->code : '',
    'type'  => $request->type ? $request->type : '',
    'value'  => $request->value ? $request->value : '',
    'min_amount'=>  $request->min_amount ? $request->min_amount : NULL,
    'created_at'    => date('Y-m-d H:i:s'),
    'updated_at'    => date('Y-m-d H:i:s'),
);

DB::table('tbl_coupons')->where('id',$request->coupon_id)->update($coupon_array);

        } else {
           return response()->json(['error' => $validator->errors()->all()]);
        }
    } 

    function coupon_status(Request $request)
    {
        $id = $request->id;

        $couponStatus = DB::table('tbl_coupons')->where('id', $id)->first();

        if ($couponStatus->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $coupon_status = DB::table('tbl_coupons')->where('id', $id)->update(['status'=>$status]);


        if ($coupon_status) {
            return response()->json(["status" => "0", "message" => "success", "data" => $coupon_status]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function coupon_delete(Request $request)
    {
        $id = $request->id;

        // $couponDelete = coupon::find($id);
        $couponDelete = DB::table('tbl_coupons')->where('id', $id)->update(['soft_delete'=>1]);
  

        if ($couponDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $couponDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

} 
