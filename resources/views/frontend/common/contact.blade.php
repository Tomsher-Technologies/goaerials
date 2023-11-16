    @php 
        $pageData = getPageData('contact');
    @endphp
    
    <section id="contact" class="navbar-is-white text-white section pp-scrollable position-absolute"
        style="background-image:url({{ asset($page->getImage2()) }});">
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    <div class="row">
                       
                        <h2 class="text-white mb-3">{{ $page->getTranslation('heading1') ?? '' }}</h2>
                        
                            @php 
                                $address12 = getFirstTwoAddress();

                            @endphp
                            @foreach($address12 as $onetwo)
                            <div class="col-md-4">
                                <div class="address-block">
                                    <h4>{{ $onetwo->getTranslation('place_name') }}</h4>
                                    <h5>{{ $onetwo->getTranslation('company_name') }}</h5>
                                    <p>{{ $onetwo->getTranslation('address') }}
                                    </p>
                                    <a href="mailto:{{ $onetwo->email }}"> {{ $onetwo->email }}</a>
                                    <a href="tel:{{ $onetwo->phone }}"> {{ $onetwo->phone }}</a>
                                </div>
                            </div>
                            @endforeach
                           
                        
                        
                        @php 
                            $address34 = getThreeFourAddress();
                        @endphp
                        @foreach($address34 as $threefour)
                            <div class="col-md-4">
                                <div class="address-block">
                                    <h4>{{ $threefour->getTranslation('place_name') }}</h4>
                                    <h5>{{ $threefour->getTranslation('company_name') }}</h5>
                                    <p>{{ $threefour->getTranslation('address') }}
                                    </p>
                                    <a href="mailto:{{ $threefour->email }}"> {{ $threefour->email }}</a>
                                    <a href="tel:{{ $threefour->phone }}"> {{ $threefour->phone }}</a>
                                </div>
                            </div>
                        @endforeach
                            
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </section>