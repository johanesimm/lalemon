<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    @include('templates.css')
    <link href="{{asset('assets/css/customs/contact-us.css')}}" rel="stylesheet"/>
</head>
<body>
    @include('templates.navbar')
    <!-- Page Container -->
    <div class="page-container" style="padding: 0px;">
        <div class="page-content">
            <div class="content-wrapper" style="padding-bottom: 0px;">
                <div class="row row-description">
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id mauris mi adipiscing ac.Tristique tellus adipiscing turpis scelerisque mollis sit enim integer feugiat. In egestas nullam dolor convallis. At eget elementum ullamcorper risus tellus orci at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id mauris mi adipiscing ac.Tristique tellus adipiscing turpis scelerisque mollis sit enim integer feugiat. In egestas nullam dolor convallis. At eget elementum ullamcorper risus tellus orci at.
                    </p>
                </div>
                <div class="row" style="display: block; margin: auto;">
                    <img src="{{asset('assets/images/lalemon/main-logo.png')}}" class="img-contact-us"/>
                </div>
                <div class="row row-contact-us">
                    <div class="col-xs-4 col-md-4 col-lg-4">
                        <div class="col-lg-3 col-md-3 col-xs-4">
                            <img src="{{asset('assets/images/lalemon/wa-icon.png')}}" class="icon-contact-us"/>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-12">
                            <h3 class="h3-contact-us"> 0811-3112-3412 </h3>
                        </div>
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4">
                        <div class="col-lg-3 col-md-3 col-xs-4">
                            <img src="{{asset('assets/images/lalemon/shopee-icon.png')}}" class="icon-contact-us"/>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-12">
                            <h3 class="h3-contact-us"> lalemon_id </h3>
                        </div>
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4">
                        <div class="col-lg-3 col-md-3 col-xs-4">
                            <img src="{{asset('assets/images/lalemon/ig-icon.png')}}" class="icon-contact-us"/>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-12">
                            <h3 class="h3-contact-us"> lalemon_id </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.footer')
    @include('templates.js')
</body>