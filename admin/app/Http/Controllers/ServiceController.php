<?php

namespace App\Http\Controllers;

use App\Service;
// use App\tbl_category_plan;
use DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function show()
    {
        session()->put('pageName', 'servicePage');
       
        $services = DB::table('service')
            ->where('soft_delete', '=', '0')
            ->Select('*')
            ->get();

       

        if (request()->ajax()) {
            return datatables()->of($services)
                ->addColumn('status', function ($services) {
                    if ($services->status == '1') {
                        return '<button onclick="changeservice_Status(' . $services->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeservice_Status(' . $services->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->editColumn('created_at', function ($services) {
                    return date('d-M-Y h:i:s a', strtotime($services->created_at));
                })
                ->addColumn('action', function ($services) {
                    return '<a href=service/edit/' . $services->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteservice(' . $services->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })
     

                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.service');
    }

    function addservice()
    {
        $services = DB::table('service')->get();

      

        return view('admin.serviceAdd')->with(compact('services'));
    }

    function saveservice(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'service' => 'required|max:150',
            'description' => 'required',
        
        ]);

        if ($validator->passes()) {
  

            $services = new Service;
            $services->title = $request->service;
            $services->description = $request->description;
            $services->status = 1;
            $services->save();

            alert()->success('Data inserted', 'service Info Added Successfully');
            return redirect('service');

         
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function editservice($id, Request $request)
    {
           
        $service = service::where('id', $id)->first();
        if (!$service) {
            alert()->warning('Data Updated', 'service Data can not Updated Check data id');
            return redirect('service');
        }
        return view('admin.serviceEdit')->with(compact('service'));
    }



    

    function updateService(Request $request)
    {
 
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'description' => 'required',
        
        ]);
     
        if ($validator->passes()) {

 

            $service = DB::table('service')
                ->where('id', $id)
                ->update(['title' => $request->title,  'description' => $request->description]);


            alert()->info('Data Updated', 'Service Data Updated Successfully');
            return redirect('service');
        } else {
        

            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function service_status(Request $request)
    {
        $id = $request->id;
     
        $serviceStatus = service::where('id', $id)->first();
        if ($serviceStatus->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
   
        $services = DB::table('service')
            ->where('id', $id)
            ->update(['status' => $status]);

        if ($services) {
            return response()->json(["status" => "0", "message" => "success", "data" => $services]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function service_delete(Request $request)
    {
        $id = $request->id;
  

        $serviceDelete = DB::table('service')
            ->where('id', $id)
            ->update(['soft_delete' => 1]);

        if ($serviceDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $serviceDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }
}
