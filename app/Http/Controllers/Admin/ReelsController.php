<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reels;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ReelsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:reels', ['only' => ['index','store']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reels = Reels::orderBy('sort_order','asc')->paginate(15);

        return view('admin.reels.index', compact('reels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // echo php_info();
        // die;
        $request->validate([
            'image' => 'required|max:1024',
            'title' => 'required',
            'ar_title' => 'required',
            'video' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required'
        ],[
            'ar_title.required' => 'The arabic title field is required.',
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
        $data = [
            'title' => $request->title,
            'ar_title' => $request->ar_title,
            // 'link' => $request->link,
            'sort_order' => ($request->sort_order != '') ? $request->sort_order : 0,
            'is_active' => $request->status,
        ];

        $reels = Reels::create($data);

        $image = uploadImage($request, 'image', 'reels');
        $video = uploadImage($request, 'video', 'reels');

        $reels->link = $video;
        $reels->image = $image;
        $reels->save();

        return redirect()->route('admin.reels.index')->with([
            'status' => "Reel created successfully."
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reels $reels)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reels $reel)
    {
        return view('admin.reels.edit', compact('reel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reels $reel)
    {
        $request->validate([
            'image' => 'nullable|max:1024',
            'title' => 'required',
            'ar_title' => 'required',
            // 'link' => 'required',
            'sort_order' => 'nullable|integer',
            'status' => 'required'
        ],[
            'ar_title.required' => 'The arabic title field is required.',
            'image.uploaded' => 'File size should be less than 1 MB'
        ]);
       
        $reel->title = $request->title;
        $reel->ar_title = $request->ar_title;
        // $reel->link = $request->link;
        $reel->sort_order = ($request->sort_order != '') ? $request->sort_order : 0;
        $reel->is_active = $request->status;

        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'reels');
            deleteImage($reel->image);
            $reel->image = $image;
        }

        if ($request->hasFile('video')) {
            $video = uploadImage($request, 'video', 'reels');
            deleteImage($reel->link);
            $reel->link = $video;
        }

        $reel->save();

        return redirect()->route('admin.reels.index')->with([
            'status' => 'Reel details updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reels $reels)
    {
        $img = $reels->image;
        if ($reels->delete()) {
            deleteImage($img);
        }
        return redirect()->route('admin.reels.index')->with([
            'status' => "Banner Deleted"
        ]);
    }
}
