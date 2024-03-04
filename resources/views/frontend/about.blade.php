@extends('layouts.app.app')
@section('content')
    <div id="pagepiling-about">
        <section id="about-section-01" class="about-page section pp-scrollable position-absolute panel">
            <video autoplay muted loop playsinline id="myVideo">
                <source src="{{$page->video_link}}" type="video/mp4">
            </video>
            <div class="intro">
                <div class="scroll-wrap">
                    {{-- <div class="container"> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <h2>
                                {!! $page->getTranslation('title') ?? '' !!}
                                </h2>
                                <p> {!! $page->getTranslation('sub_title') ?? '' !!}</p>
                                {!! $page->getTranslation('description') ?? '' !!}
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
            <a href="#about-section-02" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>

        <section id="about-section-02" class=" text-white section pp-scrollable position-absolute panel slide-panel-1">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="">
                        {!! $page->getTranslation('heading2') ?? '' !!}
                        {!! $page->getTranslation('content2') ?? '' !!}
                    </div>
                </div>
            </div>
            <a href="#about-section-03" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>

        <section id="about-section-03" class="navbar-is-white text-white section pp-scrollable position-absolute panel slide-panel-2">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="">
                        {!! $page->getTranslation('heading3') ?? '' !!}
                        {!! $page->getTranslation('content3') ?? '' !!}
                    </div>
                </div>
            </div>
            <a href="#about-section-04" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>

        <section id="about-section-04" class="section pp-scrollable position-absolute panel slide-panel-3">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="">
                        {!! $page->getTranslation('heading4') ?? '' !!}
                        {!! $page->getTranslation('content4') ?? '' !!}
                    </div>
                </div>
            </div>
            
            <a href="#about-section-05" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>

        <section id="about-section-05" class="vision-mission section panel pp-scrollable position-absolute">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6 mob-flex">
                            <div class="vision-mission-content order-2 order-md-1">
                                <h3 class="section-heading section-heading-dark">
                                    <span>01.</span> {!! $page->getTranslation('heading5') ?? '' !!}
                                </h3>
                                {!! $page->getTranslation('content5') ?? '' !!}
                            </div>
                            <img src="{{ asset($page->getImage2()) }}" class="img-fluid order-1 order-md-2" alt="" />
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
            <a href="#about-section-01" class="scroll__top" id="scroll_button">
                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C12.2652 3 12.5196 3.10536 12.7071 3.29289L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071C19.3166 12.0976 18.6834 12.0976 18.2929 11.7071L13 6.41421V20C13 20.5523 12.5523 21 12 21C11.4477 21 11 20.5523 11 20V6.41421L5.70711 11.7071C5.31658 12.0976 4.68342 12.0976 4.29289 11.7071C3.90237 11.3166 3.90237 10.6834 4.29289 10.2929L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z" fill="#000000"/>
                   </svg>
            </a>
        </section>
    </div>
    <div class="progress-nav">
        <ul class="navbar-nav">
            <li data-menuanchor="about-section-01" class="active"></li>
            <li data-menuanchor="about-section-02"></li>
            <li data-menuanchor="about-section-03"></li>
            <li data-menuanchor="about-section-04"></li>
            <li data-menuanchor="about-section-05"></li>
        </ul>
    </div>
@endsection

@push('header')
<style>
    #about-section-02{
        background-image:url('{{ asset($page->getImage1()) }}') !important;
    }
    #about-section-03{
        background-image:url('{{ asset($page->getImage4()) }}') !important;
    }
    #about-section-04{
        background-image:url('{{ asset($page->getImage5()) }}') !important;
    }
    #about-section-05{
        background-image:url('{{ asset($page->getImage6()) }}') !important;
    }
</style>
@endpush
