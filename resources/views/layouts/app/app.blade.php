<!doctype html>
<html dir="{{ getDirection() }}" lang="{{ getActiveLanguage() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all">
    {!! SEO::generate() !!}
    <link rel="icon" type="image/svg" href="{{ asset('assets/img/favicon.svg') }}">
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&amp;family=Lato:wght@400;700&amp;display=swap"
        rel="stylesheet">
        
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.pagepiling.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <title>Go Aerials</title>
    @stack('header')
</head>

@php 
    if(request()->routeIs('about')){
        $bodyClass = 'about-page-body';
    }elseif(request()->routeIs('clients')){
        $bodyClass = 'clients-page-body';
    }elseif(request()->routeIs('reels')){
        $bodyClass = 'reel-page-body';
    }elseif(request()->routeIs('contact_us')){
        $bodyClass = 'contact-page-body';
    }else{
        $bodyClass = '';
    }
@endphp
<body class="{{ $bodyClass }}">
    @include('frontend.parts.header')

    <div id="pagepiling">
        @yield('content')
    </div>
    <!-- Scrollbar -->
    <div class="progress-nav">
        <ul class="navbar-nav">
            <li data-menuanchor="home" class="active"></li>
            <li data-menuanchor="about"></li>
            <li data-menuanchor="services"></li>
            <li data-menuanchor="why-choose"></li>
            <li data-menuanchor="partners"></li>
            <li data-menuanchor="reels"></li>
            <li data-menuanchor="contact"></li>
        </ul>
    </div>
    <p class="copy-right">© <?php echo date('Y'); ?> Go Aerials. {{ __("All Rights Reserved.")  }} {{ __("Designed By")  }} <a href="https://www.tomsher.com/" target="_blank">{{ __("Tomsher")  }}</a></p>
    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.pagepiling.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.youtube-background.js_v=1.0.18') }}"></script>
      <script type="text/javascript">
         jQuery(document).ready(function() {
               jQuery('[data-vbg]').youtube_background();
         });
     </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots:false,
            autoplay:true,
            autoplayTimeout:1500,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })

        $('.lang-change').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('locale');
                $.post('{{ route('language.change') }}', {
                    _token: '{{ csrf_token() }}',
                    locale: locale
                }, function(data) {
                    location.reload();
                });
            });
    </script>
</body>

</html>