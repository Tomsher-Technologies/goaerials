    @php 
        $pageData = getPageData('clients');
        $clients = getClients();
    @endphp

    <section id="partners" class="section pp-scrollable position-absolute" >
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    <h2 class="mb-3 text-white page-title-2"> {{ $pageData->getTranslation('title') ?? '' }}</h2>
                    <div class="row g-1 align-items-center ">
                    
                        <div class="owl-carousel owl-theme">
                            @foreach($clients as $cli)
                                <div class="item slider-div">
                                    <a href="{{ ($cli->link != '') ? $cli->link : '#' }}" @if($cli->link != '') target="_blank" @endif>
                                        <img src="{{ asset($cli->getImage()) }}" class="img-fluid slider-img" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if(request()->routeIs('home'))
            <a href="#reels" id="scroll-down">
                <span class="arrow-down"></span>
                <span class="scroll-text">{{ __('Scroll') }}</span>
            </a>
        @endif
    </section>
    @push('header')
    <style>
        #partners{
            background-image:url('{{ asset($pageData->image1) }}') !important;
        }
        .slider-div{
            background: white !important;
        }
        .slider-img{
            height: 150px !important;
            object-fit: fill !important;
            padding : 30px !important;
        }
    
    </style>
    @endpush