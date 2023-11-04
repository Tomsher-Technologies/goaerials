<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Division;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Pages;
use App\Models\PageTranslations;
use App\Models\PageSeos;
use App\Models\HomeBanner;
use App\Models\Careers;
use App\Models\HeritageLists;
use App\Models\CareerApplications;
use App\Models\Branches;
use App\Models\Services;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;
use Storage;
use Validator;
use Mail;
use DB;
use Hash;

class FrontendController extends Controller
{

    public function loadSEO($model)
    {
        SEOTools::setTitle($model->page_title);
        OpenGraph::setTitle($model->page_title);
        TwitterCard::setTitle($model->page_title);

        if (isset($model->seo[0])) {
            SEOMeta::setTitle($model->seo[0]->seo_title ?? $model->page_title);
            SEOMeta::setDescription($model->seo[0]->seo_description);
            SEOMeta::addKeyword($model->seo[0]->keywords);

            OpenGraph::setTitle($model->seo[0]->og_title);
            OpenGraph::setDescription($model->seo[0]->og_description);
            OpenGraph::setUrl(URL::full());
            OpenGraph::addProperty('locale', 'en_US');
           
            JsonLd::setTitle($model->seo[0]->seo_title);
            JsonLd::setDescription($model->seo[0]->seo_description);
            JsonLd::setType('Page');

            TwitterCard::setTitle($model->seo[0]->twitter_title);
            TwitterCard::setSite("@goaerials");
            TwitterCard::setDescription($model->seo[0]->twitter_description);

            SEOTools::jsonLd()->addImage(URL::to(asset('assets/img/favicon.svg')));
        }
    }

    public function loadDynamicSEO($model)
    {
        SEOTools::setTitle($model->title);
        OpenGraph::setTitle($model->title);
        TwitterCard::setTitle($model->title);

        SEOMeta::setTitle($model->seo_title ?? $model->title);
        SEOMeta::setDescription($model->seo_description);
        SEOMeta::addKeyword($model->keywords);

        OpenGraph::setTitle($model->og_title);
        OpenGraph::setDescription($model->og_description);
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
           
        JsonLd::setTitle($model->seo_title);
        JsonLd::setDescription($model->seo_description);
        JsonLd::setType('Page');

        TwitterCard::setTitle($model->twitter_title);
        TwitterCard::setSite("@goaerials");
        TwitterCard::setDescription($model->twitter_description);

        SEOTools::jsonLd()->addImage(URL::to(asset('assets/img/favicon.svg')));
    }
    public function home()
    {
        $page = Pages::with(['seo'])->where('page_name','home')->first();
        $this->loadSEO($page);
        return view('frontend.home',compact('page'));
    }

    public function about()
    {
        $page = Pages::with(['seo'])->where('page_name','about')->first();
        $this->loadSEO($page);
        
        return view('frontend.about',compact('page'));
    }


    public function contact_us()
    {
        $page = Pages::with(['seo'])->where('page_name','contact')->first();
        $this->loadSEO($page);
        return view('frontend.contact_us', compact('page'));
    }

    public function services()
    {
        $page = Pages::with(['seo'])->where('page_name','services')->first();
        $this->loadSEO($page);
        return view('frontend.services', compact('page'));
    }

    public function serviceDetails(Request $request)
    {
        $slug = $request->slug;
        $service = Services::where('status',1)->where('slug',$slug)->first();
        $this->loadDynamicSEO($service);
        return view('frontend.service-details',compact('service'));
    }

    public function clients()
    {
        $page = Pages::with(['seo'])->where('page_name','clients')->first();
        $this->loadSEO($page);
        return view('frontend.clients', compact('page'));
    }

    public function reels()
    {
        $page = Pages::with(['seo'])->where('page_name','reels')->first();
        $this->loadSEO($page);
        return view('frontend.reels', compact('page'));
    }

   public function storeContact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ],[
            '*.required' => 'This field is required.'
        ]);

        $con = new Contact;
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone_number = $request->phone;
        $con->message = $request->message;
        $con->save();

        return redirect()->back()->with([
            'status' => "Thank you for getting in touch. Our team will contact you shortly."
        ]);
   }

    

    public function changeLanguage(Request $request)
    {
        Session::put('locale', $request->locale);
    }

  

    

   
}
