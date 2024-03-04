@extends('layouts.app.app')
@section('content')
<!--Page content-->

<!-- Contact -->
    <div id="pagepiling-contact">
        @php 
            $pageData = getPageData('contact');
            $address12 = getFirstAddress();
        @endphp

        <section id="contact-section-01" class="navbar-is-white text-white section pp-scrollable position-absolute contact-background contact-section"
            style="background-image:url({{ asset($address12[0]->getImage()) }});">

            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row">
                            <h2 class="text-white mb-3 text-center page-title-2">{{ $pageData->getTranslation('title') ?? '' }}</h2>
                            <div class="col-md-8 m-auto">
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
            <a href="#contact-section-02" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        </section>
        <!-- Contact -->
        @php 
            $address23 = getTwoThreeAddress();
            $i = 2;
        @endphp
        @foreach($address23 as $twothree)
            <section id="contact-section-0{{$i}}" class="navbar-is-white text-white section pp-scrollable position-absolute contact-background contact-section"
                style="background-image:url({{ asset($twothree->getImage()) }});">

                <div class="intro">
                    <div class="scroll-wrap">
                        <div class="container">
                            <div class="row">


                                <div class="col-md-8 m-auto">
                                    <div class="address-block">
                                        <h4>{{ $twothree->getTranslation('place_name') }}</h4>
                                        <h5>{{ $twothree->getTranslation('company_name') }}</h5>
                                        <p>{{ $twothree->getTranslation('address') }}</p>
                                        <a href="mailto:{{ $twothree->email }}"> {{ $twothree->email }}</a>
                                        <a href="tel:{{ $twothree->phone }}"> {{ $twothree->phone }}</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#contact-section-0{{$i+1}}" id="scroll-down">
                    <span class="arrow-down"></span>
                    <span class="scroll-text">{{ __('Scroll') }}</span>
                </a>
            </section>
            @php   $i++;  @endphp
        @endforeach

        <section id="contact-section-04" style="background-image:url({{ asset($page->getImage1()) }});" class="section pp-scrollable position-absolute contact-form-sec contact-section">
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="text-white mb-4 page-title-2">{{ $page->getTranslation('heading2') ?? '' }}</h2>
                                <div class="location-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28900.433552758805!2d55.23635500000001!3d25.116948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6e3f07d14f93%3A0x2d39c5b157232eb0!2sGo%20Aerials!5e0!3m2!1sen!2sve!4v1698982677410!5m2!1sen!2sve"
                                        width="100%" height="391" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <h2 class="text-white mb-4 page-title-2">{{ $page->getTranslation('heading1') ?? '' }}</h2>
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

            <a href="#contact-section-01" class="scroll__top" id="scroll_button">
                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C12.2652 3 12.5196 3.10536 12.7071 3.29289L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071C19.3166 12.0976 18.6834 12.0976 18.2929 11.7071L13 6.41421V20C13 20.5523 12.5523 21 12 21C11.4477 21 11 20.5523 11 20V6.41421L5.70711 11.7071C5.31658 12.0976 4.68342 12.0976 4.29289 11.7071C3.90237 11.3166 3.90237 10.6834 4.29289 10.2929L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z" fill="#000000"/>
                   </svg>
            </a>
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
section.contact-form-sec{
  background-color:#000 !important;
}
textarea.form-control {
    min-height: 75px;
}

.btn{
    border: 0.2em solid #ffffff !important;
    background: #fff !important;
}

.contact-section a {
  color: #fff !important;;
  font-size: 14px !important;;
  display: block !important;;
  margin-bottom: 3px !important;;
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