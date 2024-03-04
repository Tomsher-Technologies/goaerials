@extends('layouts.app.app')
@section('content')
<!--Page content-->
    @php 
        $pageData = getPageData('social');
    @endphp
    <div id="pagepiling-social">
        <section id="contact-form-sec" class="section pp-scrollable position-absolute" style="background-image:url('{{ asset($pageData->image1) }}') !important;">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="elfsight-app-f84ca65d-c8fd-4fb4-82ec-f9657e6473b1" data-elfsight-app-lazy></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@push('header')


<style>

</style>
@endpush

@push('footer')
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
@endpush
@endsection