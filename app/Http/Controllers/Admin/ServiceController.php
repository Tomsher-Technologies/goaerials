<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|max:1024',
            'title' => 'required',
            'ar_title' => 'required',
            'content' => 'required',
            'ar_content' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB',
            '*.required' => 'This field is required'
        ]);

        $slug = Str::slug($request->title);

        $checkSlug =  Services::where('slug',$slug)->count();
        if($checkSlug == 0){
            $slug = $slug;
        }else{
            $slug = $slug.'-'.rand(1,10);
        }
        
         $saveData = [
            'title' => $request->title,
            'ar_title' => $request->ar_title,
            'content' => $request->content,
            'ar_content' => $request->ar_content,
            'status' => $request->status,
            'slug' => $slug,
            'blog_date' => $request->news_date,
            'seo_title' => $request->seotitle,
            'og_title' => $request->ogtitle, 
            'twitter_title' => $request->twtitle, 
            'seo_description' => $request->seodescription, 
            'og_description' => $request->og_description, 
            'twitter_description' => $request->twitter_description, 
            'keywords' => $request->seokeywords
        ];
        
        $service = Services::create($saveData);

        $image = uploadImage($request, 'image', 'services');

        $service->image = $image;
        $service->save();

        return redirect()->route('admin.services.index')->with([
            'status' => "Service Created"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $service)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Services::find($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $service = Services::find($request->service);
        $request->validate([
            'image' => 'nullable|max:1024',
            'title' => 'required',
            'ar_title' => 'required',
            'content' => 'required',
            'ar_content' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ],[
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $title = $service->title;
        $slug = $service->slug;

        $service->title                = $request->title;
        $service->ar_title             = $request->ar_title;
        $service->content              = $request->content;
        $service->ar_content           = $request->ar_content;
        $service->status               = $request->status;
        $service->sort_order           = ($request->sort_order != '') ? $request->sort_order : 0;
        $service->seo_title            = $request->seotitle;
        $service->og_title             = $request->ogtitle; 
        $service->twitter_title        = $request->twtitle;
        $service->seo_description      = $request->seodescription;
        $service->og_description       = $request->og_description;
        $service->twitter_description  = $request->twitter_description; 
        $service->keywords             = $request->seokeywords;

        if($title != $request->title){
            $slug = Str::slug($request->title);

            $checkSlug =  Services::where('slug',$slug)->count();
            if($checkSlug == 0){
                $service->slug = $slug;
            }else{
                $service->slug = $slug.'-'.rand(1,10);
            }
        }
        
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'services');
            deleteImage($service->image);
            $service->image = $image;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('status','Service details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
        $img = $service->image;
        if ($service->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.services.index')->with([
            'status' => "Service Deleted"
        ]);
    }
}
