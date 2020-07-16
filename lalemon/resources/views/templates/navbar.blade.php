<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo lalemon-navbar">
    <div class="navbar-header">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-paragraph-justify3" style="font-size: 25px;"></i></a></li>
            <li class="icon">
                <a href="">
                    <img src="{{asset('assets/images/lalemon/main-logo.png')}}" style="width: 100px; height; 100px;"/>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li class="width-20 visible-xs-block">
                <a href="{{url('/home')}}">
                    Home
                </a>
                @if(Str::contains(url()->current(), '/home')) <div class="active"></div> @endif
            </li>
            <li class="width-20">
                <a href="{{url('/products')}}">
                    Produk
                </a>
                @if(Str::contains(url()->current(), '/products')) <div class="active"></div> @endif
            </li>
            <li class="width-20">
                <a href="{{url('/topic-detail')}}">
                    Artikel
                </a>
                @if(Str::contains(url()->current(), '/topic-detail')) <div class="active"></div> @endif
            </li>
            <li class="width-20 visible-md-block visible-lg-block">
                <a href="{{url('/home')}}">
                   <img src="{{asset('assets/images/lalemon/main-logo.png')}}" style="width: 130px; height; 100px;"/>
                </a>
                @if(Str::contains(url()->current(), '/home')) <div class="active"></div> @endif
            </li>
            <li class="width-20">
                <a href="{{url('/testimoni')}}">
                    Testimoni
                </a>
                @if(Str::contains(url()->current(), '/testimoni')) <div class="active"></div> @endif
            </li>
            <li class="width-20">
                <a href="{{url('/contactus')}}">
                    Kontak
                </a>
                @if(Str::contains(url()->current(), '/contactus')) <div class="active"></div> @endif
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->