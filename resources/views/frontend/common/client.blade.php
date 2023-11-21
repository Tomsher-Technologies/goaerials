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
                        @foreach($clients as $cli)
                            <div class="col-partner col-6 col-sm-6 col-md-4  col-xl-2">
                                <div class="partners-img-block">
                                    <img alt="" src="{{ asset($cli->getImage()) }}" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
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
    
    </style>
    @endpush