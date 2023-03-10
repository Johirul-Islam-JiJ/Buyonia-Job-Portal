<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SiteSettingController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewSetting(){
        $site_setting = SiteSetting::find(1);
        return view('setting.site_setting',compact('site_setting'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveSettings(Request $request){
        $update_data = SiteSetting::find(1);
        $valid = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'phone' => ['required', 'max:255','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'whatsapp' => ['required', 'max:255','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'working_hour' => ['nullable', 'max:255'],
            'address' => ['required', 'max:255'],
            'description' => ['nullable'],
            'copyright' => ['required', 'max:255'],
        ]);

        $request->validate([
            'logo' => ['nullable', 'file', 'image', 'max:2048'],
            'favicon' => ['nullable', 'file', 'max:150'],
        ]);
        if ($request->file('logo') != null){
            $logo = $request->file('logo')->getClientOriginalName();
            $valid['logo'] = $logo;
            $logo_path = public_path('images') . '/' . $update_data->logo;
            if (File::exists($logo_path)) {
                File::delete($logo_path);
            }
            //save file
            $request->logo->move(public_path('images'), $logo);
        }
        if($request->file('favicon') != null){
            $favicon = $request->file('favicon')->getClientOriginalName();
            $valid['favicon'] = $favicon;
            $fav_path = public_path('images') . '/' . $update_data->favicon;

            if (File::exists($fav_path)) {
                File::delete($fav_path);
            }
            //save file
            $request->favicon->move(public_path('images'), $favicon);
        }


            $update_data->update($valid);


        return redirect('setting')->with('toast-success', 'Setting Updated Successfully!');
    }
}
