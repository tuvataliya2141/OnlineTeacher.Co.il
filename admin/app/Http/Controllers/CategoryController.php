<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    function show()
    {
        session()->put('pageName', 'categoryPage');
        $categorys = Category::where('soft_delete', '=', '0')->get();

        if (request()->ajax()) {
            return datatables()->of($categorys)
                ->addColumn('status', function ($categorys) {
                    if ($categorys->status == '1') {
                        return '<button onclick="changeCategory_Status(' . $categorys->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeCategory_Status(' . $categorys->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->editColumn('created_at', function ($categorys) {
                    return date('d-M-Y h:i:s a', strtotime($categorys->created_at));
                })
                ->addColumn('action', function ($categorys) {
                    return '<a href=category/edit/' . $categorys->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteCategory(' . $categorys->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })

                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.category');
    }

    function addCategory()
    {
        $categories = DB::table('category')->where('parent_id', '=', 0)->get(); 

        return view('admin.categoryAdd')->with(compact('categories'));
    }

    function saveCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|unique:category,name',
        ]);


        if ($validator->passes()) {
            $category = new Category;
            $category->name = $request->categoryName;
            $category->parent_id = $request->category;
            $category->slug = $request->slug;
            $category->image = '';
            $category->status = 1; 
            $category->save(); 
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function editCategory($id, Request $request)
    {
        $category = Category::where('id', $id)->first();

        // dd( $category);
        $categories = DB::table('category')->where('parent_id', '=', 0)->get();
        // dd($categories);
        if (!$categories) {
            alert()->warning('Data Updated', 'Category Data can not Updated Check data id');
            return redirect('category');
        }
        return view('admin.categoryEdit')->with(compact('categories', 'category'));
    }

    function updateCategory($id, Request $request)
    {
        // dd($_POST);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:150',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->passes()) {

            $images = $request->file('images');
            if ($images != '') {
                $image_name = 'category_' . rand() . '.' . $images->getClientOriginalExtension();
            } else {
                $image_name = $request->hidden_image;
            }

            if ($images != '') {
                $images->move(public_path('images'), $image_name);
                if (file_exists(public_path('images/' . $request->hidden_image))) {
                    unlink(public_path('images/' . $request->hidden_image)); 
                }
            }

            $category = Category::find($id);
            $category->name = $request->name;
            $category->parent_id = $request->category;
            $category->slug = $request->slug;
            $category->save();
            alert()->info('Data Updated', 'category Data Updated Successfully');
            return redirect('category');
        } else {
            return redirect('category/edit/' . $id)->withErrors($validator)->withinput();
        }
    }



    function category_status(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $categoryStatus = Category::where('id', $id)->first();
        if ($categoryStatus->status == '1') {
            $status = '2';
        } else {
            $status = '1';
        }
        $categorys = Category::find($id);
        $categorys->status = $status;
        $categorys->save();
        if ($categorys) {
            return response()->json(["status" => "0", "message" => "success", "data" => $categorys]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function category_delete(Request $request)
    {
        $id = $request->id;
        $categoryDelete = Category::find($id);
        $categoryDelete->soft_delete = '1';
        $categoryDelete->save();
        if ($categoryDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $categoryDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    public function get_SubCategory(Request $request)
    {
        $subcategories = DB::table("category")->where("parent_id", $request->category_id)->where("status", '=', '1')->pluck("name", "id");
        if (count($subcategories) > 0) {
            return response()->json(["status" => "0", "message" => "success", "data" => $subcategories]);
        } else {
            return response()->json(["status" => "1", "message" => "No Subcategory "]);
        }
    }


}
