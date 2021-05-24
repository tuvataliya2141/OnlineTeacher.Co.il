<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Userlogin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function login(Request $request)
    {
        $validation_fields['login_email'] = 'required';
        $validation_msg['login_email.required'] = 'Email is Required !';
        $validation_fields['login_password'] = 'required';
        $validation_msg['login_password.required'] = 'Password  is Required !';

        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);



        // $validator = Validator::make($request->all(), [
        //     'login_email' => 'required',
        //     'login_password' => 'required',
        // ]); 



        if ($validator->passes()) {
            $remember = $request->get('remember');
            // $remember = (Input::has('remember')) ? true : false;
            // $remember = $request->has('remember') ? true : false; 
            $email = $request->login_email;
            $password = $request->login_password;


            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                // Authentication passed...

                return response()->json(['success' => true]);

                redirect('/');
            } else {
                return response()->json(['success' => false]);
                // return response()->json(['error' => 'Invalid Login or password']);
                return redirect()->route('login');
            }
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function register_form()
    {
        return view('front/login');
    }

    public function register(Request $request)
    {

        $validation_fields['name'] = 'required|alpha_dash';
        $validation_msg['name.required'] = 'First Name is Required !';
        $validation_msg['name.alpha_dash'] = 'Space is not Allowed First Name  !';
        $validation_fields['lname'] = 'required|alpha_dash';
        $validation_msg['lname.required'] = 'Last Name is Required !';
        $validation_msg['lname.alpha_dash'] = 'Space is not Allowed Last Name  !';
        $validation_fields['email'] = 'required|email|unique:users,email';
        $validation_msg['email.required'] = 'Email is Required !';
        $validation_msg['email.email'] = 'Enter A Valid Email Address!';
        $validation_msg['email.unique'] = 'Email Already Registered!';
        $validation_fields['password'] = 'required|min:6';
        $validation_msg['password.required'] = 'Password  is Required !';
        $validation_fields['confirm_password'] = 'required|required_with:password|same:password';
        $validation_msg['confirm_password.required'] = 'Confirm Password is Required!';
        $validation_msg['confirm_password.required_with'] = 'Confirm Password is Required!';
        $validation_msg['confirm_password.same'] = 'Password and Confirm Password not match!';


        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'password' => 'required',
        //     'confirm_password' => 'required'
        // ]);

        if ($validator->passes()) {

            $password = Hash::make($request->password);
            $users = new User;
            $users->name = $request->name;
            $users->lname = $request->lname;
            $users->email = $request->email;
            // $users->password = $request->password;
            $users->password = $password;
            $users->contact_no = '';

            $users->gender = '';
            $users->photo = '';
            $users->address = '';
            $users->city = '';
            $users->state = '';
            $users->country = '';
            $users->postal_code = '';

            $users->status = 1;
            $users->user_type = 2;
            $users->save();


            return response()->json(['success' => true, 'action' => 'login']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    function myaccount(Request $request)
    {

        if (Auth::user() != '') {
            $user_detail = Auth::user();
            dd($user_detail);
        }

        // session()->put('pageName', '');
        $user_details = DB::table('users')->where('id', '=', $id)->select('*')->first();
        $states = DB::table('tbl_state')->select('*')->get();
        Session::put('pageName', '');
        Session::put('catName', '');

        return view('front.myaccount')->with(compact('user_details', 'states'));
    }

    function viewaccount(Request $request)
    {

        if (Auth::user() != '') {
            $user_detail = Auth::user();
        }
        Session::put('pageName', '');
        Session::put('catName', '');
        $states = DB::table('tbl_state')->select('*')->get();
        return view('front.myaccount')->with(compact('user_detail', 'states'));
    }

    function updateaccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',


        ]);
        $id = Auth::user()->id;

        if ($validator->passes()) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->lname = $request->lname;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->postal_code = $request->postal_code;

            $user->save();

            return back()->with('message', 'Update Profile Successfully!');
        } else {
            return redirect('myaccount')->withErrors($validator)->withinput();
        }
    }

    public function updatepassword(Request $request)
    {
        $id = Auth::user()->id;

        $oldPassword = User::where('id', $id)->first();
        $input_data = $request->all();
        $password = Hash::make($input_data['password']);

        if ($password == $oldPassword->password) {
            $this->validate($request, [
                'newPassword' => 'required|min:6|max:12|confirmed'
            ]);
            $new_pass = $input_data['newPassword'];
            User::where('id', $id)->update(['password' => $new_pass]);
            return back()->with('message', 'Update Password Successfully!');
        } else {
            return back()->with('oldpassword', 'Old Password is Inconrrect!');
        }
    }

    public function logout()
    {
        session()->forget('userlogin');
        Session::forget('coupon');
        Auth::logout();
        return redirect('/');
    }
    public function forget_password()
    {

        // return view('front.layout.forget_password');
        return view('front.layout.login1');


        // return view('front.forget');
    }

    public function reset_password(Request $request, $token)
    {
        if(Auth::user() == '')
        {
            $token = $request->token;
            // return view('front.layout.reset_password')->with(compact('token'));
    
            return view('front.layout.reset1')->with(compact('token'));

        }
        else
        {
            return redirect('myprofile');
        }

    }

    function validatePasswordRequest(Request $request)
    {

        $validation_fields['email'] = 'required';
        $validation_msg['email.required'] = 'Email is Required  !';
        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);


        if ($validator->passes()) {

               //You can add validation login here
        $user = DB::table('users')->where('email', '=', $request->email)
        ->first();

    //Check if the user exists

    // if (count($user) < 1) {
    if ($user == null) {
        // return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        return response()->json(['success' => false,'msg'=>'User Does not Exist']);
    }

    //Create Password Reset Token
    // $token = str_random(60);

    $token = Str::random(60);

    DB::table('password_resets')->insert([ 
        'email' => $request->email,
        'token' => $token,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    $email_id = $request->email;

    $data = array('name' => 'Dear,', 'body' => 'You can reset your password by clicking the below link', 'token' => $token, 'email' => $email_id);


    $mail = Mail::send('forget_pass', $data, function ($message) use ($email_id) {
        $message->to($email_id)
            ->subject('Forget Password');
        $message->from('noreply@technobrigadeinfotech.com', 'Flowershop');
    });

    return response()->json(['success' => true,'msg'=>'A reset link has been sent to your email.']);

    // if ($mail == true) {

    //     return response()->json(['success' => true,'msg'=>'A reset link has been sent to your email.']);

    //     // return redirect()->back()->with('status', trans('A reset link has been sent to your email.'));
    // } else {
    //     return response()->json(['success' => false,'msg'=>'A Network Error occurred. Please try again.']);
    //     // return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
    // }

        } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }

    }

    public function resetPassword(Request $request)
    { 
        $validation_fields['password'] = 'required|min:6';
        $validation_msg['password.required'] = 'Password  is Required !';
        $validation_fields['password_confirmation'] = 'required|required_with:password|same:password';
        $validation_msg['password_confirmation.required'] = 'Confirm Password is Required!';
        $validation_msg['password_confirmation.required_with'] = 'Confirm Password is Required!';
        $validation_msg['password_confirmation.same'] = 'Password and Confirm Password not match!';


        $validator = \Validator::make($request->all(), $validation_fields, $validation_msg);

        if ($validator->passes()) {

            $password = $request->password;

            // Validate the token
            $tokenData = DB::table('password_resets')
                ->where('token', $request->token)->first();

            // Redirect the user back to the password reset request form if the token is invalid
            if (!$tokenData) return view('auth.passwords.email');
    
            $user = User::where('email', $tokenData->email)->first();

            // Redirect the user back if the email is invalid
            if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);

            //Hash and update the new password
            $user->password = \Hash::make($password);
            $user->update(); 
            
 
    
            //Delete the token
            DB::table('password_resets')->where('email', $user->email)
                ->delete();

                return response()->json(['success' => true,'msg'=>'Password reset Successfully']);

        } else {
                 return response()->json(['error' => $validator->errors()->all()]);
             }

    }
}
