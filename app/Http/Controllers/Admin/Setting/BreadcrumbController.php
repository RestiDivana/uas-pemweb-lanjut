<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class BreadcrumbController extends Controller
{

    public function __construct() {
        view()->share('menuActive', 'settings');
        view()->share('subMenuActive', 'breadcrumb');
    }
    
    public function edit()
    {
        $profile    = @Setting::key(Setting::PROFILE)->first()->value;
        $service    = @Setting::key(Setting::SERVICE)->first()->value;
        $partner    = @Setting::key(Setting::PARTNER)->first()->value;
        $blog       = @Setting::key(Setting::BLOG)->first()->value;
        $page       = @Setting::key(Setting::PAGE)->first()->value;
        $contact    = @Setting::key(Setting::CONTACT)->first()->value;
        $doctor     = @Setting::key(Setting::DOCTOR)->first()->value;
       
        $setting    = (object) compact('profile','service','partner','blog','page','contact','doctor');

        return view('admin.settings.breadcrumb.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'profile'   => ['image'],
            'service'   => ['image'],
            'partner'   => ['image'],
            'page'      => ['image'],
            'contact'   => ['image'],
            'blog'      => ['image'],
            'doctor'    => ['doctor']
        ]);

        if ($request->hasFile('profile')) {
            $profile = Setting::where('key','profile')->first();
            if ($profile && Storage::exists($profile->value)) {
                Storage::delete(@$profile->value);
            }
       
            $path = $request->file('profile')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::PROFILE,
            ], ['value' => 'storage/'.$path]);

        } 
        if ($request->hasFile('service')) {
            $service = Setting::where('key','service')->first();
            if ($service && Storage::exists($service->value)) {
                Storage::delete(@$service->value);
            }
       
            $path = $request->file('service')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::SERVICE,
            ], ['value' => 'storage/'.$path]);

        } 
        if ($request->hasFile('partner')) {
            $partner = Setting::where('key','partner')->first();
            if ($partner && Storage::exists($partner->value)) {
                Storage::delete(@$partner->value);
            }
       
       
            $path = $request->file('partner')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::PARTNER,
            ], ['value' => 'storage/'.$path]);

        } 
        if ($request->hasFile('blog')) {
            $blog = Setting::where('key','blog')->first();
            if ($blog && Storage::exists($blog->value)) {
                Storage::delete(@$blog->value);
            }
       
            $path = $request->file('blog')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::BLOG,
            ], ['value' => 'storage/'.$path]);

        } 
        if ($request->hasFile('page')) {
            $page = Setting::where('key','page')->first();
            if ($page && Storage::exists($page->value)) {
                Storage::delete(@$page->value);
            }
       
            $path = $request->file('page')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::PAGE,
            ], ['value' => 'storage/'.$path]);

        } 
        if ($request->hasFile('contact')) {
            $contact = Setting::where('key','contact')->first();
            if ($contact && Storage::exists($contact->value)) {
                Storage::delete(@$contact->value);
            }
       
            $path = $request->file('contact')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::CONTACT,
            ], ['value' => 'storage/'.$path]);

        } 
        if ($request->hasFile('doctor')) {
            $doctor = Setting::where('key','doctor')->first();
            if ($doctor      && Storage::exists($doctor->value)) {
                Storage::delete(@$doctor->value);
            }
       
            $path = $request->file('doctor')->store('setting');

            Setting::updateOrCreate([
                'key' => Setting::DOCTOR,
            ], ['value' => 'storage/'.$path]);

        } 
        return redirect()->route('admin.settings.breadcrumb.edit')->with([
            'success' => 'Assets Setting Saved :)'
        ]);
    }
}