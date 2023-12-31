<section id="reels" class="section pp-scrollable position-absolute">
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">
                    @php 
                        $pageData = getPageData('reels');
                        $reels = getReels();
                    @endphp
                    <h2 class="mb-5 mb-md-3">{{ $pageData->getTranslation('title') ?? ''}}</h2>
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
    </section>