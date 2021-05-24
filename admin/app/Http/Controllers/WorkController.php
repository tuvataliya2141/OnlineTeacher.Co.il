<?php

namespace App\Http\Controllers;

use App\Work;
// use App\tbl_category_plan;
use DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    function show()
    {
        session()->put('pageName', 'workPage');
    
        $works = DB::table('work')
            ->where('soft_delete', '=', '0')
            ->Select('*')
            ->get();
        // dd($works);
        if (request()->ajax()) {
            return datatables()->of($works)
                ->addColumn('status', function ($works) {
                    if ($works->status == '1') {
                        return '<button onclick="changeWork_Status(' . $works->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeWork_Status(' . $works->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->editColumn('created_at', function ($works) {
                    return date('d-M-Y h:i:s a', strtotime($works->created_at));
                })
                ->addColumn('action', function ($works) {
                    return '<a href=work/edit/' . $works->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteWork(' . $works->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })
                ->addColumn('images', function ($work) {
                    $url = asset('public/images/works' . $work->images);
                    return '<img src="' . $url . '" border="0" width="60" height="40" class="img-rounded" align="center" />';
                })

                ->rawColumns(['status', 'action', 'images'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.work');
    }

    function addwork()
    {
        $works = DB::table('work')->get();

      

        return view('admin.workAdd')->with(compact('works'));
    }

    function saveWork(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
   
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         
        ]);

        if ($validator->passes()) {
            $image = $request->file('images');
            $new_name = 'work_' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/works'), $new_name);

            $works = new Work;
            $works->title = $request->title;
            $works->images =  $new_name;
            $works->status = 1;



            $works->save();

            alert()->success('Data inserted', 'work Info Added Successfully');
            return redirect('work');

            // return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function editwork($id, Request $request)
    {
      
        $work = Work::where('id', $id)->first();
        if (!$work) {
            alert()->warning('Data Updated', 'work Data can not Updated Check data id');
            return redirect('work');
        }
        return view('admin.workEdit')->with(compact('work'));
    }

    function updatework(Request $request)
    {
 
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
        
        ]);
     
        if ($validator->passes()) {

            $images = $request->file('images');
            if ($images != '') {
                $image_name = 'work_' . rand() . '.' . $images->getClientOriginalExtension();
            } else {
                $image_name = $request->hidden_image;
            }


            if ($images != '') {
                $images->move(public_path('images/works/'), $image_name);
                if (file_exists(public_path('images/works/' . $request->hidden_image))) {
                    unlink(public_path('images/works/' . $request->hidden_image));
                }
            }

            $work = DB::table('work')
                ->where('id', $id)
                ->update(['title' => $request->title,  'images' => $image_name]);


            alert()->info('Data Updated', 'work Data Updated Successfully');
            return redirect('work');
        } else {
        

            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function work_status(Request $request)
    {
        $id = $request->id;
   
        $workStatus = Work::where('id', $id)->first();
        if ($workStatus->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
 
        $works = DB::table('work')
            ->where('id', $id)
            ->update(['status' => $status]);

        if ($works) {
            return response()->json(["status" => "0", "message" => "success", "data" => $works]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function work_delete(Request $request)
    {
        $id = $request->id;


        $workDelete = DB::table('work')
            ->where('id', $id)
            ->update(['soft_delete' => 1]);

        if ($workDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $workDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }
}
