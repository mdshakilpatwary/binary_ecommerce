<?php

namespace App\Http\Controllers\AdminBackend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\SiteInfo;
use File;

class DashboardController extends Controller
{
    public function index(){

        return view('backend.dashboard');
    }
    public function setting(){
        $site_info = SiteInfo::where('type','1')->first();
        return view('backend.pages.site-info', compact('site_info'));
    }
    public function update_setting(Request $request, $id){
        $site_info = SiteInfo::findOrFail($id);
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|max:100|email',
            'name' => 'required|max:150',
            'phone' => 'required|numeric|digits_between:10,16',
            'address' => 'required|max:100',
            'description' => 'nullable|max:200',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkdin' => 'nullable|url',
        ]);

        $site_info->name = $request->name;
        $site_info->phone = $request->phone;
        $site_info->address = $request->address;
        $site_info->description = $request->description;
        
        $site_info->email = $request->email;
        $site_info->facebook = $request->facebook;
        $site_info->instagram = $request->instagram;
        $site_info->linkdin = $request->linkdin;
        

        if($request->file('logo')){
            $manager = new ImageManager(new Driver());
            if(File::exists(public_path($site_info->image))){
                File::delete(public_path($site_info->image));
            }
            $image = $request->file('logo');
            $customName = $request->name . rand() . '.' . $image->getClientOriginalExtension();            
            $img = $manager->read($image);          
            $img->toPng()->save(public_path('uploads/siteinfo/'.$customName)); 
            $site_info->logo='uploads/siteinfo/'.$customName;
        }
        $insert = $site_info->update();
        if($insert){
            return redirect()->back()->with('success', 'Successfully Profile Updated');

        }
        else{
            return redirect()->back()->with('error', 'Opps! data not Update');

        }    
    }
}
