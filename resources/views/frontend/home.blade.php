@extends('layouts.app.app')
@section('content')
     <!-- Masthead -->
     <section id="home" class="navbar-is-white text-white pp-scrollable d-flex align-items-center section position-absolute" role="main">
    
        
        <video autoplay muted loop id="myVideo">
            <source src="{{ $page->video_link }}" type="video/mp4">
        </video>
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <h1 class="text-white"> 
                            {!! $page->getTranslation('title') ?? '' !!}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-down">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </section>
    <!-- About -->
    <section id="about" class="section pp-scrollable d-flex align-items-center position-absolute">
        <h3 class="stroke-title">{{ $page->getTranslation('heading1') ?? '' }}</h3>
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 pr-md-5 pr-lg-0">
                            <h2>
                                {!! $page->getTranslation('sub_title') ?? '' !!}
                            </h2>
                            {!! $page->getTranslation('description') ?? '' !!}
                        </div>
                        <div class="mt-5 mt-md-0 col-md-6 col-lg-5  offset-lg-1">
                            <div class="position-relative">
                                <img alt="" class="border-radius w-100" src="{{ asset($page->getImage1('image1')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->
    @include('frontend.common.service')
    <!-- Why Choose -->
    <section id="why-choose" class="section pp-scrollable d-flex align-items-center position-absolute">
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="position-relative">
                                
                                <img alt="" class="border-radius w-100" src="{{ asset($page->getImage2()) }}">
                            </div>
                        </div>
                        <div class="mt-5 mt-lg-0 col-lg-5 offset-lg-1">
                            <h2>{!! $page->getTranslation('heading2') ?? '' !!}</span></h2>
                            {!! $page->getTranslation('content2' ?? '') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners -->
    @include('frontend.common.client')
    <!-- Reels-->
    @include('frontend.common.reel')
    <!-- Contact -->
    @include('frontend.common.contact')
@endsection
