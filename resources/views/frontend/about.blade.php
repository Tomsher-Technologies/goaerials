@extends('layouts.app.app')
@section('content')
    <div id="pagepiling-about">
        <section id="about-section-01" class="about-page section pp-scrollable position-absolute">
            <video autoplay muted loop playsinline id="myVideo">
                <source src="{{$page->video_link}}" type="video/mp4">
            </video>
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>
                                {!! $page->getTranslation('title') ?? '' !!}
                                </h2>
                                {!! $page->getTranslation('description') ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="scroll-down"  href="#about-section-02"><span></span>Scroll</a>
        </section>

        <section id="about-section-02" class="about-page-sec-1  text-white section pp-scrollable position-absolute">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>
                                {!! $page->getTranslation('heading1') ?? '' !!}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                {!! $page->getTranslation('content1') ?? '' !!}
                            </div>
                        </div>
                        <div class="row g-5">
                            <img src="{{ asset($page->getImage1()) }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <a class="scroll-down"  href="#about-section-03"><span></span>Scroll</a>
        </section>

        <section id="about-section-03" class=" text-white section pp-scrollable position-absolute panel slide-panel-1">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="">
                        {!! $page->getTranslation('heading2') ?? '' !!}
                        {!! $page->getTranslation('content2') ?? '' !!}
                    </div>
                </div>
            </div>
            <a class="scroll-down"  href="#about-section-04"><span></span>Scroll</a>
        </section>

        <section id="about-section-04" class="navbar-is-white text-white section pp-scrollable position-absolute panel slide-panel-2">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="">
                        {!! $page->getTranslation('heading3') ?? '' !!}
                        {!! $page->getTranslation('content3') ?? '' !!}
                    </div>
                </div>
            </div>
            <a class="scroll-down"  href="#about-section-05"><span></span>Scroll</a>
        </section>

        <section id="about-section-05" class="section pp-scrollable position-absolute panel slide-panel-3">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="">
                        {!! $page->getTranslation('heading4') ?? '' !!}
                        {!! $page->getTranslation('content4') ?? '' !!}
                    </div>
                </div>
            </div>
            <a class="scroll-down"  href="#about-section-06"><span></span>Scroll</a>
        </section>

        <section id="about-section-06" class="vision-mission section panel pp-scrollable position-absolute">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <div class="vision-mission-content">
                                <h3 class="section-heading section-heading-dark">
                                    <span>01.</span> {!! $page->getTranslation('heading5') ?? '' !!}
                                </h3>
                                {!! $page->getTranslation('content5') ?? '' !!}
                            </div>
                            <img src="{{ asset($page->getImage2()) }}" class="img-fluid" alt="" />
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($page->getImage3()) }}" class="img-fluid" alt="" />
                            <div class="vision-mission-content">
                                <h3 class="section-heading section-heading-dark">
                                    <span>02.</span> {!! $page->getTranslation('heading6') ?? '' !!}
                                </h3>
                                {!! $page->getTranslation('content6') ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="progress-nav">
        <ul class="navbar-nav">
            <li data-menuanchor="about-section-01" class="active"></li>
            <li data-menuanchor="about-section-02"></li>
            <li data-menuanchor="about-section-03"></li>
            <li data-menuanchor="about-section-04"></li>
            <li data-menuanchor="about-section-05"></li>
            <li data-menuanchor="about-section-06"></li>
        </ul>
    </div>
@endsection