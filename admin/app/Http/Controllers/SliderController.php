<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator; 

class SliderController extends Controller
{
    function show()
    {
        session()->put('pageName', 'sliderPage');
        $sliders = Slider::where('soft_delete', '=', '0')->get();

        if (request()->ajax()) {
            return datatables()->of($sliders)
                ->addColumn('status', function ($sliders) {
                    if ($sliders->status == '1') {
                        return '<button onclick="changeSlider_Status(' . $sliders->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeSlider_Status(' . $sliders->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->editColumn('created_at', function ($sliders) {
                    return date('d-M-Y h:i:s a', strtotime($sliders->created_at));
                })
                ->addColumn('action', function ($sliders) {
                    return '<a href=slider/edit/' . $sliders->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteSlider(' . $sliders->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })

                ->addColumn('images', function ($slider) {
                    $url = asset('public/images/sliders' . $slider->images);
                    return '<img src="' . $url . '" border="0" width="60" height="40" class="img-rounded" align="center" />';
                })

                ->rawColumns(['status', 'action', 'images'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.slider');
    }

    function addSlider()
    {
        $sliders = DB::table('slider')->get();

          $categories = DB::table('category')->where('parent_id', '=', 0)->get();
          // $categories = DB::table('category')->get();

        return view('admin.sliderAdd')->with(compact('sliders','categories'));
    }

    function saveSlider(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'category'=>'required',
            'subtitle' => 'required|max:150',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link' => 'required|max:150',
        ]);

        if ($validator->passes()) {
            $image = $request->file('images');
            $new_name = 'slider_' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'), $new_name);

            $sliders = new Slider;
            $sliders->title = $request->title;
            $sliders->subtitle = $request->subtitle;
            $sliders->images =  $new_name;
            $sliders->link = $request->link;
            $sliders->category_id = $request->category;
            $sliders->status = 1;
            $sliders->save();

            alert()->success('Data inserted', 'Slider Info Added Successfully');
            return redirect('slider');

            // return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function editslider($id, Request $request)
    {
              $categories = DB::table('category')->where('parent_id', '=', 0)->get();
          // $categories = DB::table('category')->get();

        $slider = Slider::where('id', $id)->first();
        if (!$slider) {
            alert()->warning('Data Updated', 'Consultant Data can not Updated Check data id');
            return redirect('slider');
        }
        return view('admin.sliderEdit')->with(compact('slider','categories'));
    }

    function updateslider(Request $request)
    {
        // dd($_POST);
        $id = $request->id;

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'subtitle' => 'required|max:150',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link' => 'required|max:150',
        ]);

        if ($validator->passes()) {

            $images = $request->file('images');
            if ($images != '') {
                $image_name = 'slider_' . rand() . '.' . $images->getClientOriginalExtension();
            } else {
                $image_name = $request->hidden_image;
            }

            if ($images != '') {
                $images->move(public_path('images/sliders/'), $image_name);
                if (file_exists(public_path('images/sliders/' . $request->hidden_image))) {
                    unlink(public_path('images/sliders/' . $request->hidden_image));
                }
            }

            $slider = Slider::find($id);
            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->category_id = $request->category;
            $slider->link = $request->link;
            $slider->images = $image_name;
            $slider->save();
            alert()->info('Data Updated', 'Slider Data Updated Successfully');
            return redirect('slider');
        } else {
            // return redirect('updateSlider/' . $id)->withErrors($validator)->withinput();
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function slider_status(Request $request)
    {
        $id = $request->id;
        $sliderStatus = Slider::where('id', $id)->first();
        if ($sliderStatus->status == '1') {
            $status = '2';
        } else {
            $status = '1';
        }
        $sliders = Slider::find($id);
        $sliders->status = $status;
        $sliders->save();
        if ($sliders) {
            return response()->json(["status" => "0", "message" => "success", "data" => $sliders]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function slider_delete(Request $request)
    {
        $id = $request->id;
        $sliderDelete = Slider::find($id);
        $sliderDelete->soft_delete = '1';
        $sliderDelete->save();
        if ($sliderDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $sliderDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }
}
