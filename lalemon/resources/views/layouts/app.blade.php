<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '788519085002644');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=788519085002644&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title> Lalemon </title>
    @include('templates.css')
    @stack('css')
</head>
<body>
    @include('templates.navbar')
    <!-- Page Container -->
    <div class="page-container no-padding" >
        <div class="page-content">
            <!-- Floating Button -->
            <div class="floating-btn-container row desktop-only">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <p class="lbl-find-us"> Find Us </p>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 margin-top-15">
                    <a href="https://wa.me/6287870090209?text=Isi Pesan">
                        <img src="{{asset('assets/images/lalemon/wa-icon.png')}}" style="width: 45px; height: 45px;"/>
                    </a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 margin-top-15">
                    <a href="https://shopee.co.id/Sari-Lemon-Lalemon-500-ml-i.66393996.1312752134">
                        <img src="{{asset('assets/images/lalemon/shopee-icon.png')}}" style="width: 45px; height: 45px;"/>
                    </a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 margin-top-15">
                    <a href="https://www.instagram.com/Lalemon_id/">
                        <img src="{{asset('assets/images/lalemon/ig-icon.png')}}" style="width: 45px; height: 45px;"/>
                    </a>
                </div>
            </div>
            <!-- Floating button mobile -->
            <div class="floating-btn-container row mobile-only">
                <div class="col-xs-12 col-md-12 col-lg-12 margin-top-15">
                    <a href="https://wa.me/6287870090209?text=Isi Pesan">
                        <img src="{{asset('assets/images/lalemon/wa-icon.png')}}" style="width: 45px; height: 45px;"/>
                    </a>
                </div>
            </div>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>
    @include('templates.footer')
    @include('templates.js')
    @stack('js')
</body>