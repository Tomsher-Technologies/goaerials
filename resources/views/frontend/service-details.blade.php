@extends('layouts.app.app')
@section('content')

<section id="services" class="service-detail-page navbar-is-white text-white section pp-scrollable position-absolute">
    <div class="intro">
        <div class="scroll-wrap">
            <div class="container">
                <div class="service-detail-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset($service->getImage()) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            <h4 class="pt-3">{{ $service->getTranslation('title') }}</h4>
                            {!! $service->getTranslation('content') !!}
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection