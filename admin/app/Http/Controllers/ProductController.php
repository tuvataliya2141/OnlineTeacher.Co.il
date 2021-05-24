<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function show()
    {
        session()->put('pageName', 'productPage');
        $products = DB::table('product')
            // ->join('product_images','product_images.product_id','=','product.id')
            ->join('category as C', 'C.id', '=', 'product.category_parent_id')
            ->join('category as  SC', 'SC.id', '=', 'product.category_id')
            ->where('product.soft_delete', '=', '0')
            ->select('product.*', 'C.name as category_name', 'SC.name as sub_category')
            // ->select('*')
            ->get();
        // dd($products);
        if (request()->ajax()) {
            return datatables()->of($products)
                ->addColumn('status', function ($products) {
                    if ($products->status == '1') {
                        return '<button onclick="changeProduct_Status(' . $products->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeProduct_Status(' . $products->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->addColumn('category_name', function ($products) {
                    return $products->category_name;
                })
                ->addColumn('sub_category', function ($products) {
                    return $products->sub_category;
                })
                ->editColumn('created_at', function ($products) {
                    return date('d-M-Y h:i:s a', strtotime($products->created_at));
                })

                ->addColumn('action', function ($products) {
                    return '<a href=product/edit/' . $products->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                        . '<button onclick="deleteProduct(' . $products->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })

                // ->addColumn('action', function ($product) {
                //     $html = '';
                //     if (isset(Auth::user()->name)) {
                //         $html = '<a href=product/edit/' . $product->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>&nbsp;&nbsp; '
                //             . ' <a href="#" onclick="deleteConsultant(' . $product->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;' .
                //             '<a href=product/view/' . $product->id . ' title="View" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                //     } else {
                //         $html = 'Permission Denied';
                //     }
                //     return $html;
                // })



                // ->addColumn('images', function ($products) {
                //     $url = asset('public/images/products/' . $products->product_image);
                //     return '<img src="' . $url . '" border="0" width="60" height="40" class="img-rounded" align="center" />';
                // })



                // ->rawColumns(['status', 'action', 'images'])
                ->rawColumns(['category_name', 'sub_category', 'status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.product');
    }

    function addProduct()
    {
        $products = DB::table('category')
            ->join('product', 'category.id', '=', 'product.category_id')
            ->get();
        $categories = DB::table('category')->where('parent_id', '=', 0)->get();

        $subcategories = DB::table('category')->where('parent_id', '!=', 0)->get();

        return view('admin.productAdd')->with(compact('products', 'categories', 'subcategories'));
    }

    function get_subcategory(Request $request)
    {
        $subcategory = DB::table("category")->where("parent_id", $request->parent_id)->where("status", '=', '1')->pluck("name", "parent_id");
        if (count($subcategory) > 0) {
            return response()->json(["message" => "success", "data" => $subcategory]);
        } else {
            return response()->json(["message" => "No Subcategory Found....!!"]);
        }
    }

    function get_Relatedproducts(Request $request)
    {
        $products = DB::table("product")->select('id', 'name')->get()->all();
        return response()->json(["message" => "success", "data" => $products]);
    }

    function saveProduct(Request $request)
    {

        // dd($_POST);
        $product_image  = $request->product_image;
        $files          = $request->file('image_arr');
        $validation_fields['category'] = 'required';
        $validation_msg['category.required'] = 'Please Select Category !';
        $validation_fields['subcategory'] = 'required';
        $validation_msg['subcategory.required'] = 'Subcategory is required!';
        // $validation_fields['name'] = 'required';
        $validation_fields['name'] = 'required|unique:product,name';
        $validation_msg['name.unique'] = 'This Product Name is already Exist!';
        $validation_msg['name.required'] = 'Product Name is required!';
        $validation_fields['price'] = 'required|numeric|min:1';
        $validation_msg['price.required'] = 'Product Price is required!';

        // $validation_fields['related_products[]'] = 'required';
        // $validation_msg['related_products[].required'] = 'Please Select Related Products';

        $validation_fields['quantity'] = 'required|numeric|min:1';
        $validation_msg['quantity.required'] = 'Product quantity is required!';
        $validation_fields['slug'] = 'required';
        $validation_msg['slug.required'] = 'Product Slug is required!';
        $validation_fields['description'] = 'required';
        $validation_msg['description.required'] = 'Product Description is required!';

        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);

        if ($validator->passes()) {

            $products = new Product;
            $products->name = $request->name;
            $products->price = $request->price;
            $products->quantity = $request->quantity;
            $products->description = $request->description;
            $products->slug = $request->slug;
            $products->name = $request->name;
            $products->category_id =  $request->subcategory;
            $products->category_parent_id = $request->category;
            $products->status = 1;
            $products->save();

            $maxId = Product::latest()->value('id');


            if ($maxId) {
                // if ($product_image && count($product_image) > 0) {             
                $img_counter = 1;
                foreach ($product_image as $imgkey => $img) {
                    $validation_fields1['product_image.' . $imgkey . '.sort_order'] = 'required|numeric|min:1';
                    // dd("Hello");
                    if ($maxId) {
                        $validation_fields1['image_arr.' . $imgkey]  = 'required';
                    }
                    $validation_msg1['product_image.' . $imgkey . '.sort_order.required']     = 'In Image tab, Sort Order is required for row ' . $img_counter . '.';
                    $validation_msg1['image_arr.' . $imgkey . '.required']      = 'In Image tab, Image is required for row ' . $img_counter . '.';
                    $img_counter++;
                }
            } else {
                $validation_fields1['images']       = 'required';
                $validation_msg1['images.required'] = 'Product Image is required!';
            }
            $validator1 = \Validator::make($request->all(), $validation_fields1, $validation_msg1);

            if ($validator1->fails()) {
                DB::table('product')->where('id', $maxId)->delete();
                return response()->json(['error' => $validator1->errors()->all()]);
            } else {
                $file_images  = array();
                if ($files) {
                    foreach ($files as $key => $file) {
                        $name = 'product_' . time() . $key . '.' . $file->getClientOriginalExtension();
                        $file->move('public/images/products', $name);
                        $file_images[]['product_image'] = $name;
                    }
                }


                $related_id     = $request->related_products;

                if ($related_id) {
                    $rel_id  = implode(",", $related_id);
                    if ($maxId) {
                        $related_id     = $request->related_products;
                        $rel_id  = implode(",", $related_id);
                        $related_product_arr[] = array(
                            'product_id'    => $maxId,
                            'related_products_id'    => $rel_id,
                        );
                        DB::table('related_products')->insert($related_product_arr);
                    }
                }


                if ($product_image && (count($product_image) > 0) && count($file_images) > 0) {
                    $image_arr = array();
                    foreach ($product_image as $key => $image) {
                        $image_arr[] = array(
                            // 'id'            => ($image['product_img_id']) ? $image['product_img_id'] : '',
                            'product_id'    => $maxId,
                            'sort_order'    => ($image['sort_order']) ? $image['sort_order'] : 0,
                            'status'        => ($image['status']) ? $image['status'] : 0,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s'),
                        );
                    }
                    $final_file  = array_replace_recursive($image_arr, $file_images);


                    $result =  DB::table('product_images')->insert($final_file);
                    if ($result) {
                        alert()->success('Data inserted', 'Product Info Added Successfully');
                        return redirect('product');
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
