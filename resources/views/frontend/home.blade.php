@extends('layouts.app.app')
@section('content')
     <!-- Masthead -->
     <div id="pagepiling">
        <section id="home" class="navbar-is-white text-white pp-scrollable d-flex align-items-center section position-absolute" role="main">
        
            
            <video autoplay muted loop playsinline id="myVideo">
                <source src="{{ $page->video_link }}" type="video/mp4">
            </video>
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <h1 class="text-white" > 
                                {!! $page->getTranslation('title') ?? '' !!}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#about" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>
        <!-- About -->
        <section id="about" class="section pp-scrollable d-flex align-items-center position-absolute">
            
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 pr-md-5 pr-lg-0">
                                <h2>
                                    {!! $page->getTranslation('sub_title') ?? '' !!}
                                </h2>
                                {!! $page->getTranslation('description') ?? '' !!}
                            </div>
                            <!-- <div class="mt-5 mt-md-0 col-md-6 col-lg-5  offset-lg-1">
                                <div class="position-relative">
                                    <img alt="" class="border-radius w-100" src="">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            
            <a href="#services" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>
        <!-- Services -->
        @include('frontend.common.service')
       
        <!-- Partners -->
        @include('frontend.common.client')
        <!-- Reels-->
        @include('frontend.common.reel')
        <!-- Contact -->
        @include('frontend.common.contact')
    </div>
    <div class="progress-nav">
        <ul class="navbar-nav">
            <li data-menuanchor="home" class="active"></li>
            <li data-menuanchor="about"></li>
            <li data-menuanchor="services"></li>
            <li data-menuanchor="partners"></li>
            <li data-menuanchor="reels"></li>
            <li data-menuanchor="contact"></li>
        </ul>
    </div>
@endsection

    @push('header')
    <style>
        #about{
            background-image:url('{{ asset($page->getImage1()) }}') !important;
        }
    </style>
    @endpush
