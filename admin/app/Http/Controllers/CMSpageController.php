<?php

namespace App\Http\Controllers;

use App\CMSpage;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class CMSpageController extends Controller
{
    function show()
    {
        session()->put('pageName', 'cmsPage');
        $cmsData = CMSpage::get();
        return view('admin.cmspage')->with(compact('cmsData'));
    }

    function updateAbout(Request $request)
    {
        $input = request()->validate([
            'about' => 'required',
        ], [
            'about.required' => 'The Description field is required.'
        ]);
        $input = request()->all();
        if ($input) {
            $DataArray = [
                "description" => $request->about, "created_at" => date('Y-m-d H:i:s')
            ];
            DB::table('tbl_cms')
                ->where('id', $request->cms_id)
                ->update($DataArray);

            toast()->success('About Us', 'Record  Updated Successfully');
            return redirect('cmspage');
        } else {
            return redirect('cmspage')->withErrors($input)->withInput();
        }
    }

    function updateHelp(Request $request)
    {

        $input = request()->validate([
            'help' => 'required',
        ], [
            'help.required' => 'The Description field is required.'
        ]);
        $input = request()->all();
        if ($input) {
            $DataArray = [
                "description" => $request->help,
                "created_at" => date('Y-m-d H:i:s')
            ];
            $helpData = DB::table('tbl_cms')
                ->where('id', $request->cms_id)
                ->update($DataArray);
            if ($helpData) {


                toast()->success('Help Page ', 'Record Updated Successfully');
                return redirect('cmspage');
            }
        } else {
            return redirect('cmspage')->withErrors($input)->withInput();
        }
    }

    function updatePrivacyPolicies(Request $request)
    {
        $input = request()->validate([
            'privacy_policies' => 'required',
        ], [
            'privacy_policies.required' => 'The Description field is required.'
        ]);
        $input = request()->all();
        if ($input) {
            $DataArray = [
                "description" => $request->privacy_policies, "created_at" => date('Y-m-d H:i:s')
            ];
            DB::table('tbl_cms')
                ->where('id', $request->cms_id)
                ->update($DataArray);

            toast()->success('Privacy Policies ', 'Record  Updated Successfully');
            return redirect('cmspage');
        } else {
            return redirect('cmspage')->withErrors($input)->withInput();
        }
    }
}
