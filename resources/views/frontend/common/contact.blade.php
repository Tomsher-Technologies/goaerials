<section id="contact" class="navbar-is-white text-white section pp-scrollable position-absolute"
        style="background-image:url({{ asset('assets/img/bg/contact.jpg') }});">
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    <div class="row">
                        @php 
                            $pageData = getPageData('contact');
                        @endphp
                        <h2 class="text-white mb-3">{{ $pageData->getTranslation('title') ?? '' }}</h2>
                        <div class="col-md-6">
                            <div class="address-block h-100">
                                @php 
                                    $address12 = getFirstTwoAddress();

                                @endphp
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
                        <div class="col-md-6">
                                @php 
                                    $address34 = getThreeFourAddress();
                                @endphp
                                @foreach($address34 as $threefour)
                                    <div class="address-block">
                                        <h4>{{ $threefour->getTranslation('place_name') }}</h4>
                                        <h5>{{ $threefour->getTranslation('company_name') }}</h5>
                                        <p>{{ $threefour->getTranslation('address') }}
                                        </p>
                                        <a href="mailto:{{ $threefour->email }}"> {{ $threefour->email }}</a>
                                        <a href="tel:{{ $threefour->phone }}"> {{ $threefour->phone }}</a>
                                    </div>
                                @endforeach
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>