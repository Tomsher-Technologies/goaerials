 <!--Footer-->
 <footer class="vlt-footer vlt-footer--style-1">
     <div class="cta-area">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-12">
                     <div class="rts-cta-wrapper">
                         <div class="background-cta">
                             <div class="row align-items-center">
                                 <!-- cta-left -->
                                 @php  
                                    $general = getSettings();
                                @endphp
                                 <div class="col-lg-6">
                                     <div class="cta-left-wrapepr">
                                         <h3 class="title animated fadeIn">
                                         {{ $general->getTranslation('footer_content') }}
                                         </h3>
                                     </div>
                                 </div>
                                 <!-- cta left end -->
                                 <div class="col-lg-3">
                                     <!-- cta right -->
                                     <img class="cta-img-fot" src="{{ asset('assets/img/cta-image-02.png') }}"
                                         alt="" />
                                     <!-- cta right End -->
                                 </div>

                                 <div class="col-lg-3 m-auto">
                                     <!-- cta right -->

                                     <a class="vlt-btn vlt-btn--primary vlt-btn--md" href="{{ route('contact_us') }}" target="_self">
                                         {{ __('Get in touch') }}
                                     </a>

                                     <!-- cta right End -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-sm-6 footer-col-st">
                 <!--Widget-->
                 <div class="vlt-widget vlt-widget--text vlt-widget--">
                     <p class="footer-content">{{ __('About') }}</p>

                     <ul>
                         <li><a href="{{ route('about') }}"> {{ __('About Al Douri') }} </a></li>
                         <li><a href="{{ route('missionVision') }}"> {{ __('Mission & Vision') }} </a></li>
                         <li><a href="{{ route('our_heritage') }}"> {{ __('Our Heritage') }} </a></li>
                         <li><a href="{{ route('chairmans_message') }}"> {{ __("Chairman's Message") }} </a></li>
                     </ul>
                 </div>
             </div>

             <div class="col-lg-3 col-sm-6 footer-col-st">
                 <!--Widget-->
                 <div class="vlt-widget vlt-widget--text vlt-widget--">
                     <p class="footer-content">{{ __('Our Products range') }}</p>
                     <ul>
                        @foreach (menuCategory(0) as $category)
                            <li><a href="{{ route('category', $category->slug) }}">{{ $category->getTranslation('title') }}</a></li>
                        @endforeach
                     </ul>
                 </div>
             </div>

             <div class="col-lg-3 col-sm-6 footer-col-st">
                 <!--Widget-->
                 <div class="vlt-widget vlt-widget--text vlt-widget--">
                     <p class="footer-content">{{ __('Our Division') }}</p>
                     <ul>
                        @foreach (menuDivisions() as $division)
                            <li><a href="{{ route('divisions', $division->slug) }}"> {{ $division->getTranslation('title') }}</a></li>
                        @endforeach
                     </ul>
                 </div>
             </div>

             <div class="col-lg-3 col-sm-6 footer-col-st">
                 <!--Widget-->
                 <div class="vlt-widget vlt-widget--text vlt-widget--">
                     <p class="footer-content">{{ __('Company') }}</p>
                     <ul>
                         <li><a href="{{ route('news') }}"> {{ __('News') }}</a></li>
                         <li><a href="{{ route('career') }}"> {{ __('Career') }}</a></li>
                         <li><a href="{{ route('contact_us') }}"> {{ __('Contact Us') }}</a></li>
                         <li><a href="{{ asset('assets/docs/Corporate_brochure.pdf') }}" target="_blank"> {{ __('Download Brochure') }}</a></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <div class="copyright-area">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="text-center">
                 <p>
                         © {{ date('Y') }} {{ __('  All Rights Reserved to Al Douri.') }} <a target="_blank" href="https://www.tomsher.com/"
                             style="font-size:80%">{{ __('Designed By Tomsher') }}</a>
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!--Cursor-->
 <div class="vlt-cursor">
     <div class="outer">
         <div class="circle"></div>
     </div>
     <div class="inner">
         <div class="icon"><i class="fa-solid fa-arrow-right"></i></div>
     </div>
 </div>
 <!--Libs-->
