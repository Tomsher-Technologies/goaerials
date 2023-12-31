@extends('layouts.app.app')
@section('content')
<!--Page content-->
<section id="contact-form-sec" class="section pp-scrollable position-absolute">
    <div class="intro">
        <div class="scroll-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="text-white mb-4">{{ $page->getTranslation('heading2') ?? '' }}</h2>
                        <div class="location-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28900.433552758805!2d55.23635500000001!3d25.116948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6e3f07d14f93%3A0x2d39c5b157232eb0!2sGo%20Aerials!5e0!3m2!1sen!2sve!4v1698982677410!5m2!1sen!2sve"
                                width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>

                    <div class="col-md-4">
                    
                        <h2 class="text-white mb-4">{{ $page->getTranslation('heading1') ?? '' }}</h2>
                        <div class="contact_form">
                            <form class="row g-3"  action="{{ route('store.contact') }}" method="POST"  autocomplete="off">
                                @csrf
                                <div class="col-12">
                                    <label for="inputName" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="inputName">
                                    @error('name')
                                        <div class="danger text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4">
                                    @error('email')
                                        <div class="danger text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputPhone" class="form-label">{{ __('Phone Number') }}</label>
                                    <input type="text" name="phone" class="form-control" id="inputPhone">
                                    @error('phone')
                                        <div class="danger text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputMessage" class="form-label">{{ __('Message') }}</label>
                                    <textarea class="form-control" name="message" id="inputMessage" rows="3"></textarea>
                                    @error('message')
                                        <div class="danger text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                                <x-status />
                            </form>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.common.contact')
@endsection

@push('header')

<style>
.hide {
    display: none !important;
}
textarea.form-control {
    min-height: 75px;
}
textarea.form-control {
    resize: auto;
}
.show {
    display: block !important;
}
textarea {
    text-align : left;
}
</style>
@endpush