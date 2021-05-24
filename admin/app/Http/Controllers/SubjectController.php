<?php

namespace App\Http\Controllers;

use App\Subject;
// use App\tbl_category_plan;
use DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class subjectController extends Controller
{
    function show()
    {
        session()->put('pageName', 'subjectPage');
    
        $subjects = DB::table('subject')
            ->where('soft_delete', '=', '0')
            ->Select('*')
            ->get();
        // dd($subjects);
        if (request()->ajax()) {
            return datatables()->of($subjects)
                ->addColumn('status', function ($subjects) {
                    if ($subjects->status == '1') {
                        return '<button onclick="changesubject_Status(' . $subjects->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changesubject_Status(' . $subjects->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->editColumn('created_at', function ($subjects) {
                    return date('d-M-Y h:i:s a', strtotime($subjects->created_at));
                })
                ->addColumn('action', function ($subjects) {
                    return '<a href=subject/edit/' . $subjects->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deletesubject(' . $subjects->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })

         

                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.subject');
    }

    function addsubject()
    {
        $subjects = DB::table('subject')->get();

      

        return view('admin.subjectAdd')->with(compact('subjects'));
    }

    function saveSubject(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'percentage' => 'required|digits:1',
   
           
         
        ]);

        if ($validator->passes()) {
      

            $subjects = new Subject;
            $subjects->name = $request->name;
            $subjects->percentage =  $request->percentage;
            $subjects->status = 1;



            $subjects->save();

            alert()->success('Data inserted', 'subject Info Added Successfully');
            return redirect('subject');

            // return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function editsubject($id, Request $request)
    {
      
        $subject = subject::where('id', $id)->first();
        if (!$subject) {
            alert()->warning('Data Updated', 'subject Data can not Updated Check data id');
            return redirect('subject');
        }
        return view('admin.subjectEdit')->with(compact('subject'));
    }

    function updateSubject(Request $request)
    {
 
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'percentage' => 'required',
        
        ]);
     
        if ($validator->passes()) {

   

            $subject = DB::table('subject')
                ->where('id', $id)
                ->update(['name' => $request->name,  'percentage' => $request->percentage]);


            alert()->info('Data Updated', 'subject Data Updated Successfully');
            return redirect('subject');
        } else {
        

            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function subject_status(Request $request)
    {
        $id = $request->id;
   
        $subjectStatus = subject::where('id', $id)->first();
        if ($subjectStatus->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
 
        $subjects = DB::table('subject')
            ->where('id', $id)
            ->update(['status' => $status]);

        if ($subjects) {
            return response()->json(["status" => "0", "message" => "success", "data" => $subjects]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function subject_delete(Request $request)
    {
        $id = $request->id;


        $subjectDelete = DB::table('subject')
            ->where('id', $id)
            ->update(['soft_delete' => 1]);

        if ($subjectDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $subjectDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }
}
