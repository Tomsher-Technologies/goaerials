<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Blog;
use App\Models\Reels;
use App\Models\Clients;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countEnquiry = Contact::count();
        $countReels = Reels::where('is_deleted',0)->count();
        $countClients = Clients::count();

        return view('admin.dashboard')->with([
            'countReels' => $countReels,
            'countEnquiry' => $countEnquiry,
            'countClients' => $countClients
        ]);
    }

    public function search(Request $request)
    {
        $searchResults = [];
        // $searchResults = (new Search())
        //     ->registerModel(News::class, 'title')
        //     ->registerModel(Pages::class, ['title', 'page_name'])
        //     ->search($request->q);

        return view('admin.search')->with(['searchResults' => $searchResults]);
    }
}
