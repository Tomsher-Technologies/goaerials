    @php 
        $pageData = getPageData('contact');
    @endphp
    
    <section id="contact" class="navbar-is-white text-white section pp-scrollable position-absolute"
        style="background-image:url({{ asset($page->getImage2()) }});">
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    <div class="row">
                       
                        <h2 class="text-white mb-3">{{ $page->getTranslation('heading2') ?? '' }}</h2>
                        
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
        <a href="#pagepiling" class="scroll__top" id="scroll_button">
            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C12.2652 3 12.5196 3.10536 12.7071 3.29289L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071C19.3166 12.0976 18.6834 12.0976 18.2929 11.7071L13 6.41421V20C13 20.5523 12.5523 21 12 21C11.4477 21 11 20.5523 11 20V6.41421L5.70711 11.7071C5.31658 12.0976 4.68342 12.0976 4.29289 11.7071C3.90237 11.3166 3.90237 10.6834 4.29289 10.2929L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z" fill="#000000"/>
               </svg>
        </a>
    </section>