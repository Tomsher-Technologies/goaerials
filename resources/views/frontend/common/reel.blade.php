    @php 
        $pageData = getPageData('reels');
        $reels = getReels();
    @endphp
    <section id="reels" class="section pp-scrollable position-absolute" >
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                   
                    <h2 class="mb-5 mb-md-3 text-white">{{ $pageData->getTranslation('title') ?? ''}}</h2>
                    <div class="home-demo">
                        <div class="owl-carousel owl-theme">
                            @foreach($reels as $key => $value)
                                <div class="item">
                                    <img src="{{ asset($value->image) }}" class="img-fluid" alt="">
                                    <a class="popup-youtube" href="{{ $value->link ?? '#' }}"><i
                                            class="bi bi-play"></i></a>
                                    <h5 class="reel-title">{{ $value->getTranslation('title') ?? '' }} </h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(request()->routeIs('home'))
            <a class="scroll-down"  href="#contact"><span></span>Scroll</a>
        @endif
    </section>
    @push('header')
    <style>
        #reels{
            background-image:url('{{ asset($pageData->image1) }}') !important;
        }
    </style>
    @endpush