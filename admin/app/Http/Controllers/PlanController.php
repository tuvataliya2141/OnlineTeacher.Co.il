<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\PlanFeature;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    function show()
    {
        session()->put('pageName', 'planPage');
        $plans = DB::table('plan')->get()->all();

        // dd($plans);

        if (request()->ajax()) {
            return datatables()->of($plans)
                ->addColumn('status', function ($plans) {
                    if ($plans->status == '1') {
                        return '<button onclick="changeProduct_Status(' . $plans->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeProduct_Status(' . $plans->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
        
                ->editColumn('created_at', function ($plans) {
                    return date('d-M-Y h:i:s a', strtotime($plans->created_at));
                })

                ->addColumn('action', function ($plans) {
                    return '<a href=product/edit/' . $plans->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteProduct(' . $plans->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })

   
                ->rawColumns([ 'status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.plan');
    }

    function addPlan()
    {
    

        return view('admin.planAdd');
    }



    function savePlan(Request $request)
    {

        // dd($_POST);
        $product_image  = $request->product_image;
        $files          = $request->file('image_arr');
 
        // $validation_fields['name'] = 'required';
        $validation_fields['name'] = 'required|unique:plan,name';
        $validation_msg['name.unique'] = 'This Plan is already Exist!';
        $validation_msg['name.required'] = 'Plan Name is required!';
        $validation_fields['price'] = 'required|numeric|min:1';
        $validation_msg['price.required'] = 'Plan Price is required!';

        // $validation_fields['related_products[]'] = 'required';
        // $validation_msg['related_products[].required'] = 'Please Select Related Products';

  
        $validation_fields['description'] = 'required';
        $validation_msg['description.required'] = 'Plan Description is required!';

        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);

        if ($validator->passes()) {

            $plan = new Plan;
            $products->name = $request->name;
            $plan->price = $request->price;
  
            $plan->description = $request->description;
      
     
            $plan->status = 1;
            $plan->save();

            $maxId = Plan::latest()->value('id');


            if ($maxId) {
                // if ($product_image && count($product_image) > 0) {             
                $img_counter = 1;
                foreach ($product_image as $imgkey => $img) {
                    $validation_fields1['product_image.' . $imgkey . '.plan_feature'] = 'required';
                 
             
                    $validation_msg1['product_image.' . $imgkey . '.plan_feature.required']     = 'In Feature tab, feature name  is required for row ' . $img_counter . '.';

                
                    $img_counter++;
                }
            } else {
                $validation_fields1['images']       = 'required';
                $validation_msg1['images.required'] = 'Product Image is required!';
            }

            $validator1 = \Validator::make($request->all(), $validation_fields1, $validation_msg1);

            if ($validator1->fails()) {
                DB::table('plan')->where('id', $maxId)->delete();
                return response()->json(['error' => $validator1->errors()->all()]);
            } else {
   


 


                if ($product_image && (count($product_image) > 0) ) {
                    $image_arr = array();
                    foreach ($product_image as $key => $image) {
                        $image_arr[] = array(
                            // 'id'            => ($image['product_img_id']) ? $image['product_img_id'] : '',
                            'plan_id'    => $maxId,
                            'plan_feature'    => ($image['plan_feature']) ? $image['plan_feature'] : 0,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s'),
                        );
                    }

                    $final_file  = array_replace_recursive($image_arr, $file_images);


                    $result =  DB::table('plan_features')->insert($final_file);
                    if ($result) {
                        alert()->success('Data inserted', 'Plan Added Successfully');
                        return redirect('plan');
                    }
                }
            }
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
            // return redirect('product/add')->withErrors($validator)->withInput();
        }
    } 

    function editproduct($id, Request $request)
    {
        $product = Product::where('id', $id)->first();
        $related_products = DB::table('related_products')->where('product_id', $id)->get()->all();
        $categories = DB::table('category')->where('parent_id', '=', 0)->get();
        $subcategories = DB::table('category')->where('parent_id', '!=', 0)->get();
        $Product_images = ProductImage::where('product_id', '=', $id)->get();

        if (!$product) {
            alert()->warning('Data Updated', 'Consultant Data can not Updated Check data id');
            return redirect('product');
        }
        return view('admin.productEdit')->with(compact('product', 'Product_images', 'categories', 'subcategories', 'related_products'));
    }

    function updateproduct(Request $request)
    {
        $id             = $request->id;
        $product_image  = $request->product_image;
        $files          = $request->file('image_arr');
        $validation_fields['category'] = 'required';
        $validation_msg['category.required'] = 'Please Select Category !';
        $validation_fields['subcategory'] = 'required';
        $validation_msg['subcategory.required'] = 'Subcategory is required!';
        $validation_fields['name'] = 'required';
        $validation_msg['name.required'] = 'Product Name is required!';

        // $validation_fields['name'] = 'required|unique:product,name';
        // $validation_msg['name.unique'] = 'This Product Name is already Exist!';
        $validation_fields['price'] = 'required';
        $validation_msg['price.required'] = 'Product Price is required!';

        $validation_fields['quantity'] = 'required|numeric|min:1';
        $validation_msg['quantity.required'] = 'Product quantity is required!';
        $validation_fields['slug'] = 'required';
        $validation_msg['slug.required'] = 'Product Slug is required!';
        $validation_fields['description'] = 'required';
        $validation_msg['description.required'] = 'Product Description is required!';

        // $validation_fields['related_products[]'] = 'required';
        // $validation_msg['related_products[].required'] = 'Please Select Related Products';

        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);
        if ($validator->passes()) {

            if ($product_image && count($product_image) > 0) {
                $img_counter = 1;
                foreach ($product_image as $imgkey => $img) {
                    $validation_fields['product_image.' . $imgkey . '.sort_order'] = 'required';
                    if (!$id) {
                        $validation_fields['image_arr.' . $imgkey]  = 'required';
                    }

                    $validation_msg['product_image.' . $imgkey . '.sort_order.required']     = 'In Image tab, Sort Order is required for row ' . $img_counter . '.';
                    $validation_msg['image_arr.' . $imgkey . '.required']      = 'In Image section, Image is required for row ' . $img_counter . '.';
                    $img_counter++;
                }
            } else {
                $validation_fields['images']       = 'required';
                $validation_msg['images.required'] = 'Product Image is required!';
            }
            $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);


            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
                exit;
            }
            if ($validator->passes()) {
                if ($id) {
                    $product_arr  = array(
                        'name'          => ($request->name) ? $request->name : '',
                        'price'         => ($request->price) ? $request->price : 0,
                        'quantity'         => ($request->quantity) ? $request->quantity : 0,
                        'category_parent_id'   => ($request->category) ? $request->category : '',
                        'category_id'  => ($request->subcategory) ? $request->subcategory : '',
                        'description'   => ($request->description) ? $request->description : '',
                        'slug'         => ($request->slug) ? $request->slug : '',
                        'status'        => ($request->status) ? $request->status : 1,
                        'updated_at'    => date('Y-m-d H:i:s'),
                    );
                    $product_affected = DB::table('product')->where('id', $id)->update($product_arr);


                    $related_id     = $request->related_products;
                    if ($related_id) {


                        $rel_id  = implode(",", $related_id);

                        $related_product_arr[] = array(
                            'product_id'    => $id,
                            'related_products_id'    => $rel_id,
                        );
                        DB::table('related_products')->where('product_id', $id)->delete();
                        DB::table('related_products')->insert($related_product_arr);
                    }


                    if ($product_image && (count($product_image) > 0)) {

                        $file_images  = array();

                        if ($files) {
                            foreach ($files as $fkey => $file) {
                                $name = 'product_' . time() . $fkey . '.' . $file->getClientOriginalExtension();
                                $file->move('public/images/products/', $name);
                                $file_images[$fkey]['product_image'] = $name;
                            }
                        }

                        $image_arr = array();
                        foreach ($product_image as $key => $image) {

                            $image_arr[$key] = array(
                                'id'            => ($image['product_img_id']) ? $image['product_img_id'] : NULL,
                                'product_id'    => $id,
                                'product_image'         => isset($image['product_img_value']) ? $image['product_img_value'] : '',
                                'sort_order'    => ($image['sort_order']) ? $image['sort_order'] : 0,
                                'status'        => ($image['status']) ? $image['status'] : 0,
                                'created_at'    => date('Y-m-d H:i:s'),
                                'updated_at'    => date('Y-m-d H:i:s'),
                            );
                        }

                        $final_file  = array_replace_recursive($image_arr, $file_images);

                        DB::table('product_images')->where('product_id', $id)->delete();
                        $update =  DB::table('product_images')->insert($final_file);

                        if ($update) {
                            alert()->info('Data Updated', 'Product Data Updated Successfully');
                            return redirect('product');
                        } else {
                            return response()->json(['error' => $validator->errors()->all()]);
                        }
                    }
                }
            } else {
                return response()->json(['errors' => $validator->errors()->all()]);
            }
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function product_status(Request $request)
    {
        $id = $request->id;
        $productStatus = Product::where('id', $id)->first();
        if ($productStatus->status == '1') {
            $status = '2';
        } else {
            $status = '1';
        }
        $products = Product::find($id);
        $products->status = $status;
        $products->save();
        if ($products) {
            return response()->json(["status" => "0", "message" => "success", "data" => $products]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function product_delete(Request $request)
    {
        $id = $request->id;
        $productDelete = Product::find($id);
        $productDelete->soft_delete = '1';
        $productDelete->save();
        if ($productDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $productDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function deleteProduct_Image($id, Request $request)
    {
        $id = $request->id;
        $product_image = ProductImage::where('id', $id)->first();
        $product_id =  $product_image->product_id;

        if (!$product_image) {
            alert()->warning('Data Deleted', 'Product Image can not Deleted Check data id');
            return redirect('product');
        }
        ProductImage::where('id', $id)->delete();
        alert()->success('Data Delete', 'Product Image  Deleted Successfully');
        return redirect('product');
        // return redirect('product/edit/'.$product_id);
    }
}
