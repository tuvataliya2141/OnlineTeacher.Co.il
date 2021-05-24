<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session()->put('pageName', 'dashboardPage');
        // $TaskCount = DB::table('tbl_tasks')->count();
        $UserCount = DB::table('users')->count();
        $CategoryCount = DB::table('category')->where('parent_id',0)->count();
        $BannerCount = DB::table('banner')->where('soft_delete',0)->count();
        $SliderCount = DB::table('slider')->where('soft_delete',0)->count();
        $ProductCount = DB::table('product')->where('soft_delete',0)->count();
        $CouponCount = DB::table('tbl_coupons')->where('soft_delete',0)->count();

        $OrderCount = DB::table('tbl_orders')->where('soft_delete',0)->count();
        $SubscriberCount = DB::table('subscribers')->where('soft_delete',0)->count();
        $ContactUsCount = DB::table('contact_us')->where('soft_delete',0)->count();

        return view('admin.dashboard')->with(compact('UserCount','CategoryCount','BannerCount','SliderCount','ProductCount','OrderCount','SubscriberCount','ContactUsCount','CouponCount'));
    } 

    public function logout()
    {
        session()->forget('pageName');
        Auth::logout();
        return redirect('login');
    }
}
