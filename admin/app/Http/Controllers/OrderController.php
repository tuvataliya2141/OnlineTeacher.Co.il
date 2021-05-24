<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class OrderController extends Controller
{
    function show()
    {
        session()->put('pageName', 'orderPage');
        $orders = DB::table('tbl_orders')
            ->join('users', 'tbl_orders.user_id', '=', 'users.id')
            ->select('tbl_orders.*', 'users.name as fname', 'users.lname as lname')
            ->where('tbl_orders.soft_delete',0)
            ->get();

        if (request()->ajax()) {
            return datatables()->of($orders)

                ->addColumn('status', function ($orders) {

                    if ($orders->status == '1') {
                        // return 'Pending';
                        // return '<button onclick="changeOrder_Status(' . $orders->id . ');" class="btn btn-warning btn-sm"> Pending </button>';

                        return '<button  class="btn btn-warning btn-sm  orderstatus" id="'.$orders->id.'"> Pending </button>';

                        // return ' <font color="orange">Pending<font> ';
                    } elseif ($orders->status == '2') {
                        // return 'Confirmed';
                        // return '<button onclick="changeOrder_Status(' . $orders->id . ');" class="btn btn-primary btn-sm"> Confirmed </button>';

                        return '<button  class="btn btn-primary btn-sm orderstatus"  id="'.$orders->id.'"> Confirmed </button>';

                        // return ' <font color="blue">Confirmed<font> ';
                    } elseif ($orders->status == '3') {
                        // return 'Cancelled';
                        // return '<button onclick="changeOrder_Status(' . $orders->id . ');" class="btn btn-danger btn-sm"> Canceled</button>';

                        return '<button  class="btn btn-danger btn-sm orderstatus" id="'.$orders->id.'"> Canceled</button>';

                        // return ' <font color="red">Cancelled<font> ';
                    } elseif ($orders->status == '4') {
                        // return 'Dispatched';
                        // return '<button onclick="changeOrder_Status(' . $orders->id . ');" class="btn btn-info btn-sm"> Dispatched</button>';

                        return '<button  class="btn btn-info btn-sm orderstatus" id="'.$orders->id.'"> Dispatched</button>';

                        // return ' <font color="olive">Dispatched<font> ';
                    } elseif ($orders->status == '5') {
                        // return 'Delivered';
                        // return '<button onclick="changeOrder_Status(' . $orders->id . ');" class="btn btn-success btn-sm"> Delivered</button>';

                        return '<button   class="btn btn-success btn-sm orderstatus" id="'.$orders->id.'"> Delivered</button>';

                        // return ' <font color="green">Delivered<font> ';
                    } else {
                        return '';
                    }
                })




                ->addColumn('customer_name', function ($orders) {
                    return $orders->fname . '&nbsp;' . $orders->lname;
                })

                ->editColumn('order_date', function ($orders) {
                    return date('d-M-Y ', strtotime($orders->order_date));
                    // $order_date = Carbon::parse($orders->order_date);
                    // return $order_date->diffForHumans();
                })

                ->editColumn('created_at', function ($orders) {
                    return date('d-M-Y h:i:s a', strtotime($orders->created_at));
                })

                ->addColumn('action', function ($orders) {
                    return '<a href=orders/view/' . $orders->id . ' title="View" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> '
                        . '<button onclick="deleteOrder(' . $orders->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';

                    // '<a href=orders/edit/' . $orders->id . ' title="Edit" class="btn btn-warning btn-sm" disable><i class="fas fa-edit"></i></a> ' '<a href="#" value="{{$orders->id}}"  data-toggle="modal" data-target="#orderstatusModal">Status</a>'.;
                })


                ->rawColumns(['customer_name', 'order_date', 'status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.order');
    }

    function fetchOrder($id, Request $request)
    {
        $orders = DB::table('tbl_orders')
            ->join('users', 'tbl_orders.user_id', '=', 'users.id')
            ->where('tbl_orders.id', $id)
            ->select('tbl_orders.*', 'users.name as fname', 'users.lname as lname')
            ->first();
        //    dd($orders);
        $bill_address = DB::table('billing_address')->where('order_id', $id)->first();
        $ship_address = DB::table('delivery_address')->where('order_id', $id)->first();

        $billing = $bill_address->address . ',' . $bill_address->city . ',' . $bill_address->state . ',' . $bill_address->country . ',' . $bill_address->postal_code;

        $shipping = $ship_address->address . ',' . $ship_address->city . ',' . $ship_address->state . ',' . $ship_address->country . ',' . $ship_address->postal_code;

        return view('admin.editorder')->with(compact('orders', 'billing', 'shipping'));
    }

    function viewOrder($id, Request $request)
    { 
        $orders = DB::table('tbl_orders')
            ->join('users', 'tbl_orders.user_id', '=', 'users.id')
            ->where('tbl_orders.id', $id)
            ->select('tbl_orders.*', 'users.name as fname', 'users.lname as lname')
            ->first();
        //    dd($orders);
        $bill_address = DB::table('billing_address')->where('order_id', $id)->first();
        $ship_address = DB::table('delivery_address')->where('order_id', $id)->first();

        $billing = $bill_address->address . ',' . $bill_address->city . ',' . $bill_address->state . ',' . $bill_address->country . ',' . $bill_address->postal_code;

        $shipping = $ship_address->address . ',' . $ship_address->city . ',' . $ship_address->state . ',' . $ship_address->country . ',' . $ship_address->postal_code;

        $order_items = DB::table('tbl_order_items')->where('order_id', $id)->get()->all();

        return view('admin.vieworder')->with(compact('orders', 'billing', 'shipping', 'order_items'));
    }

    function order_delete(Request $request)
    {
        $id = $request->id;
        $orderDelete = Order::find($id);

        $orderDelete->soft_delete = '1';
        $orderDelete->save();
        if ($orderDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $orderDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function order_stauts(Request $request)
    {
        // dd($_POST);
       

        $id = $request->order_id;
        $status = $request->status;
        if($status == '')
        {
            return response()->json(['success' => false, "message" => "Please Select Status First!!"]);
            exit();
        }
        else
        {
            // $orderStatus = Order::find('id', $id);
            $orderStatus = Order::where('id', $id)->first();
            $orderStatus->status = $status;
            $orderStatus->save();
            if ($orderStatus) {
                return response()->json(['success' => true, "data" => $orderStatus]);
            } else {
                return response()->json(['success' => false, "message" => "Sorry Can not Change Status....!!"]);
            }

        }

    }
}
