<section id="partners" class="section pp-scrollable position-absolute">
        <div class="intro">
            <div class="scroll-wrap">
                <div class="container">

                    @php 
                        $pageData = getPageData('clients');
                        $clients = getClients();
                    @endphp

                    <h2 class="mb-3 text-white text-start"> {{ $pageData->getTranslation('title') ?? '' }}</h2>
                    <div class="row g-1 align-items-center ">
                        @foreach($clients as $cli)
                            <div class="col-partner col-sm-6 col-md-4  col-xl-2">
                                <div class="partners-img-block">
                                    <img alt="" src="{{ asset($cli->getImage()) }}" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>