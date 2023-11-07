@extends('layouts.app.app')
@section('content')
<!--Page content-->

<!-- Contact -->
    <div id="pagepiling-contact">
        @php 
            $pageData = getPageData('contact');
            $address12 = getFirstTwoAddress();
        @endphp

        <section id="contact-section-01" class="navbar-is-white text-white section pp-scrollable position-absolute contact-background contact-section"
            style="background-image:url({{ asset($address12[0]->getImage()) }});">

            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row">
                            <h2 class="text-white mb-3">{{ $pageData->getTranslation('title') ?? '' }}</h2>
                            <div class="col-md-12">
                                <div class="address-block h-100">
                                    @foreach($address12 as $onetwo)
                                        <h4>{{ $onetwo->getTranslation('place_name') }}</h4>
                                        <h5>{{ $onetwo->getTranslation('company_name') }}</h5>
                                        <p>{{ $onetwo->getTranslation('address') }}
                                        </p>
                                        <a href="mailto:{{ $onetwo->email }}"> {{ $onetwo->email }}</a>
                                        <a href="tel:{{ $onetwo->phone }}"> {{ $onetwo->phone }}</a>
                                    @endforeach
                                
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <a class="scroll-down"  href="#contact-section-02"><span></span>Scroll</a>
        </section>
        <!-- Contact -->
        @php 
            $address34 = getThreeFourAddress();
            $i = 2;
        @endphp
        @foreach($address34 as $threefour)
            <section id="contact-section-0{{$i}}" class="navbar-is-white text-white section pp-scrollable position-absolute contact-background contact-section"
                style="background-image:url({{ asset($threefour->getImage()) }});">

                <div class="intro">
                    <div class="scroll-wrap">
                        <div class="container">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="address-block">
                                        <h4>{{ $threefour->getTranslation('place_name') }}</h4>
                                        <h5>{{ $threefour->getTranslation('company_name') }}</h5>
                                        <p>{{ $threefour->getTranslation('address') }}</p>
                                        <a href="mailto:{{ $threefour->email }}"> {{ $threefour->email }}</a>
                                        <a href="tel:{{ $threefour->phone }}"> {{ $threefour->phone }}</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="scroll-down"  href="#contact-section-0{{$i+1}}"><span></span>Scroll</a>
            </section>
            @php   $i++;  @endphp
        @endforeach

        <section id="contact-section-04" class="section pp-scrollable position-absolute contact-form-sec contact-section">
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
                                    <form class="row g-3" action="{{ route('store.contact') }}" method="POST"
                                        autocomplete="off">
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
        <!-- Contact -->
    </div>
    <div class="progress-nav">
        <ul class="navbar-nav">
            <li data-menuanchor="contact-section-01" class="active"></li>
            <li data-menuanchor="contact-section-02"></li>
            <li data-menuanchor="contact-section-03"></li>
            <li data-menuanchor="contact-section-04"></li>
        </ul>
    </div>
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
    text-align: left;
}
.contact-background{
    background-color:black !important;
}

</style>
@endpush