
    <section id="services" class="navbar-is-white text-white section pp-scrollable position-absolute">
        <div class="project-wrap">
            <div class="bg-changer">
                @php 
                    $pageData = getPageData('services');
                    $services = getServices();
                    $html = '';
                @endphp
                @foreach($services as $key => $serv)
                    @php 
                        $status = '';
                        if($key == 0){
                            $status = 'active';
                        }

                        $html .= "<div class='col-project-box col-6 col-md-6 col-lg-4 col-xl-4'>
                                    <a href='".route('service-details',['slug' => $serv->slug]) ."'' class='project-box'>
                                        <div class='project-box-inner'>
                                            <h4>". $serv->getTranslation('title') ."</h4>
                                            <div class='project-category'>". __('View More') ."</div>
                                        </div>
                                    </a>
                                </div>";

                    @endphp
                    <div class="section-bg {{ $status }}" style="background-image:url({{ asset($serv->getImage()) }});"></div>
                    
                @endforeach
            </div>
            <div class="intro">
                <div class="scroll-wrap">
                    <div class="container">
                        <h2 class="text-white mb-3">{{ $pageData->getTranslation('title') ?? '' }}</h2>
                        <div class="mt-5">
                            <div class="row-project-box row g-2">

                                {!! $html !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(request()->routeIs('home'))
            <a class="scroll-down"  href="#why-choose"><span></span>Scroll</a>
        @endif
    </section>