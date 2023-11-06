<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\PageTranslations;
use App\Models\PageSeos;
use App\Models\GeneralSettings;
use App\Models\HeritageLists;
use App\Models\Contact;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:page_settings', ['only' => ['homePage','storeHomePage','aboutPage','storeAboutPage','missionPage','storeMissionPage', 'messagePage','storeMessagePage','contactPage','storeContactPage','heritagePage','storeHeritagePage','newsPage','storeNewsPage','careerPage','storeCareerPage']]);

         $this->middleware('permission:enquiries', ['only' => ['enquiries']]);

         $this->middleware('permission:general_settings', ['only' => ['generalSettings']]);
    }
    
    public function homePage()
    {
        $data = Pages::with(['seo'])->where('page_name','home')->first();
      
        return view('admin.pages.home',compact('data'));
    }

    public function storeHomePage(Request $request)
    {
        $request->validate([
                        'main_title' => 'required',
                        'ar_main_title' => 'required',
                        'video_link' => 'required',
                        'about_title' => 'required',
                        'ar_about_title' => 'required',
                        'about_description' => 'required',
                        'ar_about_description' => 'required',
                        'background_text' => 'required',
                        'ar_background_text' => 'required',
                        'about_image' => 'nullable|max:1024',
                        'choose_title' => 'required',
                        'ar_choose_title' => 'required',
                        'choose_content' => 'required',
                        'ar_choose_content' => 'required',
                        'main_image' => 'nullable|max:1024'
                    ],[
                        '*.required' => 'This field is required.',
                        'about_image.uploaded' => "Maximum file size to upload is 1 MB.",
                        'main_image.uploaded' => "Maximum file size to upload is 1 MB.",
                    ]);
        $data = [
                'page_title'        => 'Home',
                'page_name'         => 'home',
                'title'             => $request->main_title,
                'sub_title'         => $request->about_title,
                'description'       => $request->about_description,
                'heading1'          => $request->background_text,
                'heading2'          => $request->choose_title,
                'content2'          => $request->choose_content,

                'ar_title'             => $request->ar_main_title,
                'ar_sub_title'         => $request->ar_about_title,
                'ar_description'       => $request->ar_about_description,
                'ar_heading1'          => $request->ar_background_text,
                'ar_heading2'          => $request->ar_choose_title,
                'ar_content2'          => $request->ar_choose_content,

                'seotitle'             => $request->seotitle,
                'ogtitle'              => $request->ogtitle,
                'twtitle'              => $request->twtitle,
                'seodescription'       => $request->seodescription, 
                'og_description'       => $request->og_description,
                'twitter_description'  => $request->twitter_description,
                'seokeywords'          => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','home')->first();
        if ($request->hasFile('about_image')) {
            $image = uploadImage($request, 'about_image', 'pages/home');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }
        if ($request->hasFile('main_image')) {
            $image = uploadImage($request, 'main_image', 'pages/home');
            deleteImage($pageData->image2);
            $data['image2'] = $image;
        }

        if ($request->hasFile('video_link')) {
            $video_link = uploadImage($request, 'video_link', 'pages/home');
            deleteImage($pageData->video_link);
            $data['video_link'] = $video_link;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Home page details updated"
        ]);
    }

    public function savePageSettings($data){
        $image_array = array();
        $updateData = array( 
            'page_title' => isset($data['page_title']) ? $data['page_title'] : NULL,
            'page_name' => isset($data['page_name']) ? $data['page_name'] : NULL,
            'button_link_1' => isset($data['button_link_1']) ? $data['button_link_1'] : NULL,
            'button_link_2' => isset($data['button_link_2']) ? $data['button_link_2'] : NULL,
            'video_link' => isset($data['video_link']) ? $data['video_link'] : NULL,
        );

        if(isset($data['image1']) ){
            $image_array['image1'] = $data['image1'] ?? NULL;
        }
        if(isset($data['image2']) ){
            $image_array['image2'] = $data['image2'] ?? NULL;
        }
        if(isset($data['image3']) ){
            $image_array['image3'] = $data['image3'] ?? NULL;
        }      
        if(isset($data['image4']) ){
            $image_array['image4'] = $data['image4'] ?? NULL;
        }
        if(isset($data['image6']) ){
            $image_array['image6'] = $data['image6'] ?? NULL;
        }
        if(isset($data['image5']) ){
            $image_array['image5'] = $data['image5'];
        }
       
        $page_array = array_merge( $updateData,$image_array);

        $page = Pages::updateOrCreate([
                    'page_name'   => $data['page_name'],
                ],$page_array);
            
        $normal_array = array('title' => isset($data['title']) ? $data['title'] : NULL,
                            'sub_title'    => isset($data["sub_title"]) ?  $data["sub_title"] : NULL,
                            'description'    => isset($data["description"]) ? $data["description"] : NULL,
                            'heading1'    => isset($data["heading1"]) ? $data["heading1"] : NULL,
                            'content1' => isset($data['content1']) ? $data['content1'] : NULL,
                            'heading2'    => isset($data["heading2"]) ? $data["heading2"] : NULL,
                            'content2' => isset($data['content2']) ? $data['content2'] : NULL,
                            'heading3'    => isset($data["heading3"]) ? $data["heading3"] : NULL,
                            'content3' => isset($data['content3']) ? $data['content3'] : NULL,
                            'heading4'    => isset($data["heading4"]) ? $data["heading4"] : NULL,
                            'content4' => isset($data['content4']) ? $data['content4'] : NULL,
                            'heading5'    => isset($data["heading5"]) ? $data["heading5"] : NULL,
                            'content5' => isset($data['content5']) ? $data['content5'] : NULL,
                            'heading6'    => isset($data["heading6"]) ? $data["heading6"] : NULL,
                            'content6' => isset($data['content6']) ? $data['content6'] : NULL,
                            'heading7'    => isset($data["heading7"]) ? $data["heading7"] : NULL,
                            'content7' => isset($data['content7']) ? $data['content7'] : NULL,
                            'button_text_1'    => isset($data["button_text_1"]) ? $data["button_text_1"] : NULL,
                            'button_text_2'    => isset($data["button_text_2"]) ? $data["button_text_2"] : NULL,
                        );

        $ar_array = array('title' => isset($data['ar_title']) ? $data['ar_title'] : NULL,
                            'sub_title'    => isset($data["ar_sub_title"]) ?  $data["ar_sub_title"] : NULL,
                            'description'    => isset($data["ar_description"]) ? $data["ar_description"] : NULL,
                            'heading1'    => isset($data["ar_heading1"]) ? $data["ar_heading1"] : NULL,
                            'content1' => isset($data['ar_content1']) ? $data['ar_content1'] : NULL,
                            'heading2'    => isset($data["ar_heading2"]) ? $data["ar_heading2"] : NULL,
                            'content2' => isset($data['ar_content2']) ? $data['ar_content2'] : NULL,
                            'heading3'    => isset($data["ar_heading3"]) ? $data["ar_heading3"] : NULL,
                            'content3' => isset($data['ar_content3']) ? $data['ar_content3'] : NULL,
                            'heading4'    => isset($data["ar_heading4"]) ? $data["ar_heading4"] : NULL,
                            'content4' => isset($data['ar_content4']) ? $data['ar_content4'] : NULL,
                            'heading5'    => isset($data["ar_heading5"]) ? $data["ar_heading5"] : NULL,
                            'content5' => isset($data['ar_content5']) ? $data['ar_content5'] : NULL,
                            'heading6'    => isset($data["ar_heading6"]) ? $data["ar_heading6"] : NULL,
                            'content6' => isset($data['ar_content6']) ? $data['ar_content6'] : NULL,
                            'heading7'    => isset($data["ar_heading7"]) ? $data["ar_heading7"] : NULL,
                            'content7' => isset($data['ar_content7']) ? $data['ar_content7'] : NULL,
                            'button_text_1'    => isset($data["ar_button_text_1"]) ? $data["ar_button_text_1"] : NULL,
                            'button_text_2'    => isset($data["ar_button_text_2"]) ? $data["ar_button_text_2"] : NULL
                        );

        $seo_Array = array(
                            'seo_title'    => isset($data["seotitle"]) ? $data["seotitle"] : NULL,
                            'og_title'    => isset($data["ogtitle"]) ? $data["ogtitle"] : NULL,
                            'twitter_title'    => isset($data["twtitle"]) ?  $data["twtitle"] : NULL,
                            'seo_description'    => isset($data["seodescription"]) ? $data["seodescription"] : NULL,
                            'og_description'    => isset($data["og_description"]) ? $data["og_description"] : NULL,
                            'twitter_description'    => isset($data["twitter_description"]) ? $data["twitter_description"] : NULL,
                            'keywords'    => isset($data["seokeywords"]) ? $data["seokeywords"] : NULL,
                        ); 

        PageTranslations::updateOrCreate([
            'page_id' => $page->id,
            'lang' => 'en',
        ], $normal_array);
                
        PageTranslations::updateOrCreate([
            'page_id' => $page->id,
            'lang' => 'ar',
        ], $ar_array);

        $seo = PageSeos::updateOrCreate([
                    'page_id'   => $page->id,
                ],$seo_Array);
    }

    public function aboutPage()
    {
        $data = Pages::with(['seo'])->where('page_name','about')->first();
      
        return view('admin.pages.about-us',compact('data'));
    }

    public function storeAboutPage(Request $request)
    {
        $request->validate([
                        'first_title' => 'required',
                        'ar_first_title' => 'required',
                        'first_description' => 'required',
                        'ar_first_description' => 'required',
                        'second_title' => 'required',
                        'ar_second_title' => 'required',
                        'second_description' => 'required',
                        'ar_second_description' => 'required',
                        'choose_title' => 'required',
                        'ar_choose_title' => 'required',
                        'choose_description' => 'required',
                        'ar_choose_description' => 'required',
                        'fourth_title' => 'required',
                        'ar_fourth_title' => 'required',
                        'fourth_description' => 'required',
                        'ar_fourth_description' => 'required',
                        'fifth_title' => 'required',
                        'ar_fifth_title' => 'required',
                        'fifth_description' => 'required',
                        'ar_fifth_description' => 'required',
                        'vision_heading' => 'required',
                        'ar_vision_heading' => 'required',
                        'vision_content' => 'required',
                        'ar_vision_content' => 'required',
                        'mission_heading' => 'required',
                        'ar_mission_heading' => 'required',
                        'mission_content' => 'required',
                        'ar_mission_content' => 'required',
                        'first_image' => 'nullable|max:1024',
                        'vision_image' => 'nullable|max:1024',
                        'mission_image' => 'nullable|max:1024',
                        'video_link' => 'required'
                    ],[
                        '*.required' => 'This field is required.',
                        '*.uploaded' => "Maximum file size to upload is 1 MB."
                    ]);
        $data = [
                'page_title'            => 'About Us',
                'page_name'             => 'about',
                'title'                 => $request->first_title,
                'ar_title'              => $request->ar_first_title,
                'description'           => $request->first_description,
                'ar_description'        => $request->ar_first_description,
                'heading1'              => $request->second_title,
                'ar_heading1'           => $request->ar_second_title,
                'content1'              => $request->second_description,
                'ar_content1'           => $request->ar_second_description,
                'heading2'              => $request->choose_title,
                'ar_heading2'           => $request->ar_choose_title,
                'content2'              => $request->choose_description,
                'ar_content2'           => $request->ar_choose_description,
                'heading3'              => $request->fourth_title,
                'ar_heading3'           => $request->ar_fourth_title,
                'content3'              => $request->fourth_description,
                'ar_content3'           => $request->ar_fourth_description,
                'heading4'              => $request->fifth_title,
                'ar_heading4'           => $request->ar_fifth_title,
                'content4'              => $request->fifth_description,
                'ar_content4'           => $request->ar_fifth_description,
                'heading5'              => $request->vision_heading,
                'ar_heading5'           => $request->ar_vision_heading,
                'content5'              => $request->vision_content,
                'ar_content5'           => $request->ar_vision_content,
                'heading6'              => $request->mission_heading,
                'ar_heading6'           => $request->ar_mission_heading,
                'content6'              => $request->mission_content,
                'ar_content6'           => $request->ar_mission_content,
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','about')->first();
        if ($request->hasFile('first_image')) {
            $image = uploadImage($request, 'first_image', 'pages/about');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        if ($request->hasFile('vision_image')) {
            $image = uploadImage($request, 'vision_image', 'pages/about');
            deleteImage($pageData->image2);
            $data['image2'] = $image;
        }

        if ($request->hasFile('mission_image')) {
            $image = uploadImage($request, 'mission_image', 'pages/about');
            deleteImage($pageData->image3);
            $data['image3'] = $image;
        }

        if ($request->hasFile('video_link')) {
            $video_link = uploadImage($request, 'video_link', 'pages/about');
            deleteImage($pageData->video_link);
            $data['video_link'] = $video_link;
        }
        
        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function generalSettings(Request $request){
        $data = getGeneralSettings();
        return view('admin.pages.settings',compact('data'));
    }

    public function storeSettings(Request $request)
    {
        $request->validate([
            'facebook' => 'required',
            'instagram' => 'required'
        ],[
            '*.required' => 'This field is required.'
        ]);

        $data = $request->all();
        
        unset($data['_token']);
        $set = GeneralSettings::find(1);
        $set->facebook = $request->facebook;
        $set->instagram = $request->instagram;
        $set->save();
        
        return redirect()->back()->with(['status' => "Details updated"]);
    }

    public function servicesPage()
    {
        $data = Pages::with(['seo'])->where('page_name','services')->first();
      
        return view('admin.pages.services',compact('data'));
    }

    public function storeServicesPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'ar_title' => 'required'
                    ],[
                        '*.required' => 'This field is required.'
                    ]);
        $data = [
                'page_title'        => 'Services',
                'page_name'        => 'services',
                'title'             => $request->title,
                'ar_title'             => $request->ar_title,
                'seotitle'             => $request->seotitle,
                'ogtitle'              => $request->ogtitle,
                'twtitle'              => $request->twtitle,
                'seodescription'       => $request->seodescription, 
                'og_description'       => $request->og_description,
                'twitter_description'  => $request->twitter_description,
                'seokeywords'          => $request->seokeywords,
        ];

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function clientsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','clients')->first();
      
        return view('admin.pages.clients',compact('data'));
    }

    public function storeClientsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'ar_title' => 'required'
                    ],[
                        '*.required' => 'This field is required.'
                    ]);
        $data = [
                'page_title'        => 'Clients',
                'page_name'        => 'clients',
                'title'             => $request->title,
                'ar_title'             => $request->ar_title,
                'seotitle'             => $request->seotitle,
                'ogtitle'              => $request->ogtitle,
                'twtitle'              => $request->twtitle,
                'seodescription'       => $request->seodescription, 
                'og_description'       => $request->og_description,
                'twitter_description'  => $request->twitter_description,
                'seokeywords'          => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','clients')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/clients');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function contactPage()
    {
        $data = Pages::with(['seo'])->where('page_name','contact')->first();
        $address = Address::orderBy('id','asc')->get();
        return view('admin.pages.contact',compact('data','address'));
    }

    public function storeContactPage(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die;

        $request->validate([
                        'title' => 'required',
                        'ar_title' => 'required',
                        'heading' => 'required',
                        'ar_heading' => 'required',
                        'map_heading' => 'required',
                        'ar_map_heading' => 'required'
                    ],[
                        '*.required' => 'This field is required.'
                    ]);
        $data = [
                'page_title'        => 'Contact Us',
                'page_name'        => 'contact',
                'title'             => $request->title,
                'heading1'          => $request->heading,
                'heading2'          => $request->map_heading,
                'ar_title'             => $request->ar_title,
                'ar_heading1'          => $request->ar_heading,
                'ar_heading2'          => $request->ar_map_heading,
                'seotitle'             => $request->seotitle,
                'ogtitle'              => $request->ogtitle,
                'twtitle'              => $request->twtitle,
                'seodescription'       => $request->seodescription, 
                'og_description'       => $request->og_description,
                'twitter_description'  => $request->twitter_description,
                'seokeywords'          => $request->seokeywords,
        ];

      
        $this->savePageSettings($data);
        $addArray = [];
        if($request->has('address')){
            $addresses = $request->address;
           
            foreach($addresses as $add){
                $img = $add['img'];
                $newimage = '';
                if (isset($add['image'])) {
                    
                    $uploadedFile = $add['image'];
                    $filename =    strtolower(Str::random(2)).time().'.'. $uploadedFile->getClientOriginalName();
                    $frontname = Storage::disk('public')->putFileAs(
                        'pages/contacts',
                        $uploadedFile,
                        $filename
                    );
                    $image = Storage::url($frontname);

                    if($img != null){
                        deleteImage($img);
                    }
                    $newimage = $image;
                }
                $ad = Address::find($add['add_id']);
                $ad->place_name = $add['place_name'] ?: '';
                $ad->ar_place_name = $add['ar_place_name'] ?: '';
                $ad->company_name = $add['company_name'] ?: '';
                $ad->ar_company_name = $add['ar_company_name'] ?: '';
                $ad->address = $add['address'] ?: '';
                $ad->ar_address = $add['ar_address'] ?: '';
                $ad->email = $add['email'] ?: '';
                $ad->phone = $add['phone'] ?: '';
                $ad->image = $newimage ?: $img;
                $ad->save();
            }
        }

        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function reelsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','reels')->first();

        return view('admin.pages.reels',compact('data'));
    }

    public function storeReelsPage(Request $request){
        $request->validate([
                    'title' => 'required',
                    'ar_title' => 'required'
                ],[
                    '*.required' => 'This field is required.'
                ]);
        $data = [
            'page_title'        => 'Reels',
            'page_name'        => 'reels',
            'title'             => $request->title,
            'ar_title'             => $request->ar_title,
            'seotitle'             => $request->seotitle,
            'ogtitle'              => $request->ogtitle,
            'twtitle'              => $request->twtitle,
            'seodescription'       => $request->seodescription, 
            'og_description'       => $request->og_description,
            'twitter_description'  => $request->twitter_description,
            'seokeywords'          => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','reels')->first();
        if ($request->hasFile('image')) {
            $image = uploadImage($request, 'image', 'pages/reels');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }

        $this->savePageSettings($data);

        return redirect()->back()->with(['status' => "Page details updated"]);
    }

    public function newsPage()
    {
        $data = Pages::with(['seo'])->where('page_name','news')->first();
      
        return view('admin.pages.news',compact('data'));
    }

    public function storeNewsPage(Request $request)
    {
        $request->validate([
                        'title' => 'required',
                        'ar_title' => 'required',
                        'image1' => 'nullable|max:2048'
                    ],[
                        '*.required' => 'This field is required.',
                        '*.max' => "Maximum file size to upload is 2MB."
                    ]);
        $data = [
                'page_title'        => 'News',
                'page_name'        => 'news',
                'title'             => $request->title,
                'ar_title'             => $request->ar_title,
                'seotitle'             => $request->seotitle,
                'ogtitle'              => $request->ogtitle,
                'twtitle'              => $request->twtitle,
                'seodescription'       => $request->seodescription, 
                'og_description'       => $request->og_description,
                'twitter_description'  => $request->twitter_description,
                'seokeywords'          => $request->seokeywords,
        ];

        $pageData = Pages::where('page_name','news')->first();
        if ($request->hasFile('image1')) {
            $image = uploadImage($request, 'image1', 'pages/message');
            deleteImage($pageData->image1);
            $data['image1'] = $image;
        }
       
        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function socialPage()
    {
        $data = Pages::with(['seo'])->where('page_name','social')->first();
      
        return view('admin.pages.social',compact('data'));
    }

    public function storeSocialPage(Request $request)
    {
        
        $data = [
                'page_title'            => 'Social',
                'page_name'             => 'social',
                'seotitle'              => $request->seotitle,
                'ogtitle'               => $request->ogtitle,
                'twtitle'               => $request->twtitle,
                'seodescription'        => $request->seodescription, 
                'og_description'        => $request->og_description,
                'twitter_description'   => $request->twitter_description,
                'seokeywords'           => $request->seokeywords,
        ];
       
        $this->savePageSettings($data);
        return redirect()->back()->with([
            'status' => "Page details updated"
        ]);
    }

    public function enquiries(){
        $query = Contact::latest();
        $contact = $query->paginate(10);

        return view('admin.contact.index', compact('contact'));
    }
}
