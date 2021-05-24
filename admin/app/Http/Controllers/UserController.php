<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Footer;
use Hash;
use DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public  function loginForm()
    {
        if (Auth::user() != '') {
            return redirect('profile_setting');
        }
        return view('auth.login');
    }

    function profile()
    {
        session()->forget('pageName');
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    function update_profile(Request $request)
    {
        $input = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'work_contact' => 'required|digits:10',
            'contact_no' => 'required|digits:10',
        ], [
            'name.required' => 'The First Name field is required.',
            'email.required' => 'The Email field is required.',
            'work_contact.required' => 'The Work Contact field is required.',
            'work_contact.digits' => 'The Work Contact field 10 digits is required.',
            'contact_no.required' => 'The Home Contact field is required.',
            'contact_no.digits' => 'The Home Contact field 10 digits is required.',

        ]);
        $input = request()->all();
        $image = $request->file('photo');
        if ($image != '') {
            $image_name = 'profile_' . rand() . '.' . $image->getClientOriginalExtension();
        } else {
            $image_name = $request->hidden_image;
        }
        if ($input) {
            $id = $request->user_id_for_profile;
            $checkMail = User::where('email', '=', $request->email)->where('id', '!=', $id)->first();
            if ($checkMail) {
                toast('Email alredy exist', 'warning');
                return redirect('profile');
            } else {
                if ($image != '') {
                    $image->move(public_path('images'), $image_name);
                    if (file_exists(public_path('images/' . $request->hidden_image))) {
                        unlink(public_path('images/' . $request->hidden_image));
                    }
                }
                //insert record in database
                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->photo = $image_name;
                $user->work_contact = $request->work_contact;
                $user->contact_no = $request->contact_no;
                $user->save();

                toast()->success('Profile Data Updated Successfully');
                return redirect('profile');
            }
        } else {
            return redirect('profile')->withErrors($input)->withInput();
        }
    }

    function edit_admin_profile()
    {
        $admin = DB::table('users')->where('user_type',1)->get()->all();

        // dd($admin);

        return view('admin.admin_edit_profile',compact('admin'));

    }
    
    function update_password(Request $request)
    {
        $input = request()->validate([
            'oldPassword' => 'required|max:255',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required_with:password|same:newPassword|min:6',
        ], [
            'oldPassword.required' => 'The Old Password field is required.',
            'newPassword.required' => 'The New Password field is required.',
            'newPassword.min' => 'The New Password field must be minimum 6 Character .',
        ]);
        $input = request()->all();
        if ($input) {
            $user = User::find(auth()->user()->id);
            if (!Hash::check($request->oldPassword, $user->password)) {
                alert()->warning("Can't Change Password", 'Old Password not match');
                return redirect('profile');
            } else {


                $id = $request->user_id_for_pass;
                //Update record in database
                $user = User::find($id);
                $user->password = bcrypt($request->newPassword);
                $user->save();
                toast()->info('Password Change Successfully');
                return redirect('profile');
            }
        } else {
            return redirect('profile')->withErrors($input)->withInput();
        }
    }


    function edit_password()
    {
        // session()->forget('pageName');
        $user = Auth::user();
        return view('admin.change_password', compact('user'));
    }

    function update_password1(Request $request)
    {
        $input = request()->validate([
            'oldPassword' => 'required|max:255',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required_with:password|same:newPassword|min:6',
        ], [
            'oldPassword.required' => 'The Old Password field is required.',
            'newPassword.required' => 'The New Password field is required.',
            'newPassword.min' => 'The New Password field must be minimum 6 Character .',
        ]);
        $input = request()->all();
        if ($input) {
            $user = User::find(auth()->user()->id);
            if (!Hash::check($request->oldPassword, $user->password)) {
                alert()->warning("Can't Change Password", 'Old Password not match');
                return redirect('change_password');
            } else {


                $id = $request->user_id_for_pass;
                //Update record in database
                $user = User::find($id);
                $user->password = bcrypt($request->newPassword);
                $user->save();
                toast()->info('Password Change Successfully');
                return redirect('change_password');
            }
        } else {
            return redirect('change_password')->withErrors($input)->withInput();
        }
    }

    
    function show_users()
    {
        session()->put('pageName', 'usersPage');
        $users = User::orderby('id', 'DESC')
            // ->where('user_type', '!=', '1')
            ->where('soft_delete', '=', '0')
            ->get();
        if (request()->ajax()) {
            return datatables()->of($users)
                ->addColumn('fullname', function ($users) {
                    return $users->name . ' ' . $users->lname;
                })
                ->addColumn('status', function ($users) {
                    if ($users->status == '1') {
                        return '<button onclick="changeUser_Status(' . $users->id . ');" class="btn btn-success btn-sm"> Active </button>';
                    } else {
                        return '<button onclick="changeUser_Status(' . $users->id . ');" class="btn btn-primary btn-sm">Deactive</button>';
                    }
                })
                ->editColumn('created_at', function ($users) {
                    return date('d-M-Y h:i:s a', strtotime($users->created_at));
                })
                ->addColumn('action', function ($users) {
                    // return '<a href=standards/edit/'.$users->id.' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> '
                    return '<a href=users/edit/' . $users->id . ' title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>&nbsp;&nbsp; ' . '<button onclick="deleteUser(' . $users->id . ');" title="Delete" class="btn btn-danger btn-sm"><i style="color:#000;"class="fas fa-trash-alt"></i></button>';
                })

                ->rawColumns(['fullname', 'status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.users');
    }

    function addUser()
    {
        $states = DB::table('tbl_state')->select('*')->get();
        return view('admin.addUser')->with(compact('states'));
    }

    function saveUser(Request $request)
    {


        $input = request()->validate([
            'name'  =>   'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'gender' => 'required',
            'contact_no' => 'required|digits:10',
            'photo' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|digits:6',
        ], [
            'name.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'User Already Exists',
            'password.required' => 'Password is required',
            'gender.required' => 'Please Select gender',
            'contact_no.required' => 'Contact No. is required',
            'contact_no.digits' => 'Enter Valid Contact Number Of 10 Digit',
            'photo.required' => 'Please Select Photo',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
            'state.required' => 'Please Select State',
            'postal_code.required' => 'Pin Code  is required',
            'postal_code.digits' => 'Enter Valid PIN Code Of 6 Digit',

        ]);

        $input = request()->all();

        // if ($validator->passes()) {

        if ($input) {

            $image = $request->file('photo');
            $new_name = 'user_' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $new_name);

            $users = new User;
            $users->name = $request->name;
            $users->lname = $request->lname;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->m_password =   $request->password;
            $users->gender = $request->gender;
            $users->contact_no = $request->contact_no;
            $users->photo =  $new_name;
            $users->address = $request->address;
            $users->city = $request->city;
            $users->state = $request->state;
            $users->postal_code = $request->postal_code;
            $users->status = 1;

            $users->save();

            alert()->success('Data inserted', 'User Added Successfully');
            return redirect('users');
        } else {
            // return redirect('users/add')->withErrors($validator)->withInput();
            return redirect('users/add')->withErrors($input)->withInput();
        }
    }

    function editUser($id, Request $request)
    {
        $id = $request->id;
        $states = DB::table('tbl_state')->select('*')->get();

        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.editUser')->with(compact('states', 'user'));
    }

    function footer_edit()
    {
        $footer = DB::table('footer_setting')->first();
        return view('admin.footerEdit')->with(compact('footer'));
    }



    

    function profile_setting(Request $request)
    {
        $user = DB::table('users')->where('user_type',1)->first();
        return view('admin.editUser')->with(compact( 'user'));

    }


    function update_profile_setting($id, Request $request)
    {
        $input = request()->validate([
            'name'  =>   'required',
            'lname' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
            'gender' => 'required',
            'contact_no' => 'required',
            'location' =>'required',
            'lec_subject' =>'required',
            'lec_place' =>'required',
            'bday' =>'required',
            'about' =>'required',
            // 'address' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'postal_code' => 'required|digits:6',

        ], [
            'name.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'email.email' => ' Enter Valid Email',
            // 'email.unique' => 'User Already Exists',
            // 'password.required' => 'Password is required',
            'gender.required' => 'Please Select gender',
            'contact_no.required' => 'Contact No. is required',
            // 'contact_no.digits' => 'Enter Valid Contact Number Of 10 Digit',
            'location.required' => 'Location is required',
            'lec_subject.required' => 'Subject name is required',
            'lec_place.required' => 'Lecture Place is required',
            'bday.required' => 'DOB is required',
            'about.required' => 'About is required',


            // 'address.required' => 'Address is required',
            // 'city.required' => 'City is required',
            // 'state.required' => 'Please Select State',
            // 'postal_code.required' => 'Pin Code  is required',
            // 'postal_code.digits' => 'Enter Valid PIN Code Of 6 Digit',

        ]);

        $input = request()->all();

        if ($input) {
            $image = $request->file('photo');
            if ($image != '') {
                $image_name = 'user_' . rand() . '.' . $image->getClientOriginalExtension();
            } else {
                $image_name = $request->hidden_image;
            }

            if ($image != '') {
                $image->move(public_path('images/users'), $image_name);
                // if (file_exists(public_path('images/users' . $request->hidden_image))) {
                //     unlink(public_path('images/users' . $request->hidden_image));
                // }
            }
            $id = $request->id;
            $users = User::find($id);

            $users->name = $request->name;
            $users->lname = $request->lname;
            $users->email = $request->email;
            // $users->password = Hash::make($request->password);
            // $users->m_password =   $request->password;
            $users->gender = $request->gender;
            $users->contact_no = $request->contact_no;
            $users->photo = $image_name;

            $users->location = $request->location;
            $users->lec_subject = $request->lec_subject;
            $users->lec_place = $request->lec_place;
            $users->bday = $request->bday;
            $users->about = $request->about;

            // $users->address = $request->address;
            // $users->city = $request->city;
            // $users->state = $request->state;
            // $users->postal_code = $request->postal_code;
            $users->status = 1;

            $users->save();

            alert()->success('Data Updated', 'User Updated Successfully');
            return redirect('profile_setting');
        } else {
            // return redirect('users/add')->withErrors($validator)->withInput();
            return redirect('users/edit/' . $id)->withErrors($input)->withInput();
        }
    }

    function updateUser($id, Request $request)
    {
        $input = request()->validate([
            'name'  =>   'required',
            'lname' => 'required',
            'email' => 'required|email',
    
            'gender' => 'required',
            'contact_no' => 'required',
            'location' =>'required',
            'lec_subject' =>'required',
            'lec_place' =>'required',
            'bday' =>'required',
            'about' =>'required',
            'whatsapp' =>'required',
        

        ], [
            'name.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'whatsapp.required' => 'Whatsapp is required',
            'email.required' => 'Email is required',
            'email.email' => ' Enter Valid Email',
      
            'gender.required' => 'Please Select gender',
            'contact_no.required' => 'Contact No. is required',
       
            'location.required' => 'Location is required',
            'lec_subject.required' => 'Subject name is required',
            'lec_place.required' => 'Lecture Place is required',
            'bday.required' => 'DOB is required',
            'about.required' => 'About is required',


        ]);

        $input = request()->all();

        if ($input) {
            $image = $request->file('photo');
            if ($image != '') {
                $image_name = 'user_' . rand() . '.' . $image->getClientOriginalExtension();
            } else {
                $image_name = $request->hidden_image;
            }

            if ($image != '') {
                $image->move(public_path('images/users'), $image_name);
                // if (file_exists(public_path('images/users' . $request->hidden_image))) {
                //     unlink(public_path('images/users' . $request->hidden_image));
                // }
            }
            $id = $request->id;
            $users = User::find($id);

            $users->name = $request->name;
            $users->lname = $request->lname;
            $users->email = $request->email;
            // $users->password = Hash::make($request->password);
            // $users->m_password =   $request->password;
            $users->gender = $request->gender;
            $users->contact_no = $request->contact_no;
            $users->photo = $image_name;

            $users->location = $request->location;
            $users->lec_subject = $request->lec_subject;
            $users->lec_place = $request->lec_place;
            $users->bday = $request->bday;
            $users->about = $request->about;
            $users->whatsapp = $request->whatsapp;

            // $users->address = $request->address;
            // $users->city = $request->city;
            // $users->state = $request->state;
            // $users->postal_code = $request->postal_code;
            $users->status = 1;

            $users->save();

            alert()->success('Data Updated', 'User Updated Successfully');
            return redirect('profile_setting');
        } else {
            // return redirect('users/add')->withErrors($validator)->withInput();
            return redirect('profile_setting')->withErrors($input)->withInput();
        }
    }

    function user_stauts(Request $request)
    {
        $id = $request->id;
        $userStatus = User::where('id', $id)->first();
        if ($userStatus->status == '1') {
            $status = '2';
        } else {
            $status = '1';
        }
        $users = User::find($id);
        $users->status = $status;
        $users->save();
        if ($users) {
            return response()->json(["status" => "0", "message" => "success", "data" => $users]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function user_delete(Request $request)
    {
        $id = $request->id;
        $userDelete = User::find($id);
        $userDelete->soft_delete = '1';
        $userDelete->save();
        if ($userDelete) {
            return response()->json(["status" => "0", "message" => "success", "data" => $userDelete]);
        } else {
            return response()->json(["status" => "1", "message" => "Sorry Can not Change Status....!!"]);
        }
    }

    function footer_update(Request $request)
    {
        // dd($_POST);

        if(!empty($request->facebook))
        {
            $input = request()->validate([
                'facebook'  =>   'url',
            ], 
            [
                'facebook.required'  =>   'Facebook link is not valid',
            ]);
            $input = request()->all();
        }

        if(!empty($request->twitter))
        {
            $input = request()->validate([
                'twitter'  =>   'url',
            ], 
            [
                'twitter.required'  =>   'Twitter link is not Valid',
            ]);
            $input = request()->all();
        }

        if(!empty($request->behance))
        {
            $input = request()->validate([
                'behance'  =>   'url',
            ], 
            [
                'behance.required'  =>   'behance link is not valid',
            ]);
            $input = request()->all();
        }

        if(!empty($request->linked_in))
        {
            $input = request()->validate([
                'linked_in'  =>   'url',
            ], 
            [
                'linked_in.required'  =>   'linked_in link is not valid',
            ]);
            $input = request()->all();
        }

        if(!empty($request->pinterest))
        {
            $input = request()->validate([
                'pinterest'  =>   'url',
            ], 
            [
                'pinterest.required'  =>   'pinterest link is not valid',
            ]);
            $input = request()->all();
        }

        if(!empty($request->youtube))
        {
            $input = request()->validate([
                'youtube'  =>   'url',
            ], 
            [
                'youtube.required'  =>   'youtube link is not valid',
            ]);
            $input = request()->all();
        }

        if(!empty($request->instagram))
        {
            $input = request()->validate([
                'instagram'  =>   'url',
            ], 
            [
                'instagram.required'  =>   'instagram link is not valid',
            ]);
            $input = request()->all();
        }



        $input = request()->validate([
            'content'  =>   'required',
        ], [
            'content.required' => 'Footer content is required',
        
        ]);

        $input = request()->all();

        if ($input) {
            $id = $request->id;
            $footer = Footer::find($id);
            $footer->content = $request->content;
            $footer->facebook = $request->facebook;
            $footer->behance = $request->behance;
            $footer->pinterest = $request->pinterest;
            $footer->linked_in = $request->linked_in;
            $footer->twitter = $request->twitter;
            $footer->instagram = $request->instagram;
            $footer->youtube = $request->youtube;
            $footer->save();

            alert()->success('Data inserted', 'Slider Info Added Successfully');
            return redirect('footer_setting');

            // toast()->success('Updated Successfully');
            // return redirect('footer_setting');

            alert()->success('Data inserted', 'Updated Successfully');
            return redirect('footer_settng');
            
            // $footer = DB::table('footer_setting')->first();
            // return view('admin.footerEdit')->with(compact('footer'));
        
        } else {
        
            return redirect('footer_setting')->withErrors($input)->withInput();
          
        }

    
  
    }
}
