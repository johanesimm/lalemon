@extends('layouts.app')
@push('css')
    <link href="{{asset('assets/css/customs/article.css')}}" rel="stylesheet" />
@endpush
@section('content')
    <!-- Banner promo -->
    <div class="row margin-top-15">
        @if($promo->status)
            <div class="banner-promo">
                <img src="{{asset($promo->data[0]->file_path)}}" style="width: 100%;height: 100%;border-radius: 10px;">
            </div>
        @else
            <div class="banner-promo">
                <p class="text-default-promo"> BANNER PROMO </p>
            </div>
        @endif
    </div>
    <!-- /banner promo -->

    <!-- FAQ -->
    <div class="row margin-top-15">
        <a href="{{url('/products')}}">
            <div class="faq-header desktop-only">
                <p class="text-default-faq"> Beli Sekarang diskon 20%! </p>
            </div>
            <div class="faq-header mobile-only">
                <p class="text-default-faq"> Beli Sekarang diskon 20% </p>
            
            </div>     
        </a>
        
        <div class="faq-body margin-top-10">
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-search-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Apakah ini Sari Lemon Asli ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : Asli, tidak ada campuran apapun 
                </p>
            </div>
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-time-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Awet berapa lama ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : 2 Minggu di dalam kulkas
                </p>
            </div>
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-box-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Cara minumnya ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : 2 sdm Lalemon + 150ml Air Mineral
                </p>
            </div>
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-doc-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Bisa dicampur apa saja ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : Madu, teh hijau, selasi, semuanya bisa
                </p>
            </div>
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-truck-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Apakah aman dikirim keluar pulau jawa ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : Aman dan masih bisa dikonsumi
                </p>
            </div>
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-motor-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Apakah pengiriman hari minggu ada ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : Ada untuk Go-send / Grab Expressi dan J&T
                </p>
            </div>
            <div class="faq-card">
                <img src="{{asset('assets/images/lalemon/card-money-icon.png')}}"/>
                <p class="faq-question margin-top-15"> 
                    Q : Apakah ada Garansi jika produk Bocor ?
                </p>
                <p class="faq-answer margin-top-15">
                    A : Ada, akan kita ganti 100% termasuk ongkir
                </p>
            </div>
        </div>
    </div>
    <!-- /faq -->
    <!-- Main Menu -->
    <div class="row margin-top-15" style="margin-bottom: 5px;">
        <label class="main-title"> Artikel Terbaru </label>
    </div>
    <div class="row">
        @if($artikel['status'])
            <div class="col-lg-7 col-md-7 col-xs-12 main-card-mobile-border">
                <img src="{{asset($artikel['data']['newest_article'][0]->file_path)}}" class="main-image-article" data-id={{$artikel['data']['newest_article'][0]->article_id}}>
                <span class="title" data-id={{$artikel['data']['newest_article'][0]->article_id}}> 
                    {{$artikel['data']['newest_article'][0]->title}} 
                </span>
                <label class="date"> 
                    {{ date_format(date_create($artikel['data']['newest_article'][0]->created_at), 'j M Y')}} 
                </label>
            </div>
            @for($i = 1; $i < count($artikel['data']['newest_article']); $i++)
            <div class="col-lg-5 col-md-5 col-xs-12 margin-top-10 sub-card-mobile-border">
                <div class="col-lg-12 col-md-12 col-xs-12 no-padding" style="margin-bottom: 10px;">
                    <div class="col-lg-6 col-md-6 col-xs-6">
                        <span class="title" data-id={{$artikel['data']['newest_article'][$i]->article_id}}> 
                            {{$artikel['data']['newest_article'][$i]->title}}
                        </span>
                        <span class="subtitle"> 
                            {{$artikel['data']['newest_article'][$i]->subtitle}}
                        </span>
                        <span class="date"> 
                            {{ date_format(date_create($artikel['data']['newest_article'][$i]->created_at), 'j M Y') }}
                        </span>
                    </div>
                    <div class="col-lg-5 col-md-5 col-xs-5">
                        <img src="{{ asset($artikel['data']['newest_article'][$i]->file_path)}}" data-id={{$artikel['data']['newest_article'][$i]->article_id}} class="sub-image-article">
                    </div>
                </div>
            </div>
            @endfor
        @endif
    </div>
    {{-- <div class="row margin-top-15">
        <div class="col-lg-6 col-md-6 topic-img-container">
            <img src="{{asset($artikel['data']['newest_article'][0]->file_path)}}" class="main-topic"/>
            <p class="text-topic-default"> {{$artikel['data']['newest_article'][0]->title}} </p>
        </div>
        <div class="col-lg-6 col-md-6 topic-img-container">
            <img src="{{asset($artikel['data']['newest_article'][1]->file_path)}}" class="main-topic"/>
            <p class="text-topic-default" style="margin: -55px 0 0 -22px !important;">{{ $artikel['data']['newest_article'][1]->title }}  </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 topic-img-container">
            <img src="{{asset($artikel['data']['newest_article'][2]->file_path)}}" class="main-topic"/>
            <p class="text-topic-default" style="margin: -50px 0 0 -60px !important;"> {{ $artikel['data']['newest_article'][2]->title}} </p>
        </div>
        <div class="col-lg-6 col-md-6 topic-img-container">
            <img src="{{asset($artikel['data']['newest_article'][3]->file_path)}}" class="main-topic"/>
            <p class="text-topic-default" style="margin: -60px 0 0 -35px !important;"> {{ $artikel['data']['newest_article'][3]->title }} </p>
        </div>
    </div> --}}
    <!-- /main menu-->
    <!-- Testimoni -->
    {{-- <div class="row margin-top-15 card-testimoni">
        <img src="{{asset('assets/images/lalemon/sc-testi-1.png')}}" class="sc-testimoni"/>
    </div> --}}
    <!-- /testimoni -->
@endsection