@extends('layouts.app')
@push('css')
    <link href="{{asset('assets/css/customs/sidebar.css')}}" rel="stylesheet" />
    <style>
        div.page-container {
            background-color: white;
        }
        @font-face {
            font-family: utsaahFont;
            src: url('/assets/fonts/utsaah.ttf');
        }

        .title {
            font-size: 2.5rem;
            color: #000000;
            font-weight: 600;
            font-family: utsaahFont;
        }

        .date {
            font-size: 18px; 
            color: #828986;
            display:block;
            font-family: utsaahFont;
        }

        div.content-wrapper {
            padding-bottom: 220px;
        }

        .subtitle {
            font-size: 2.3rem;
            color: #000000;
            font-weight: 600;
            font-family: utsaahFont;
            overflow-wrap: break-word;
            text-align: justify;
        }

        .description {
            display: block;
            font-family: utsaahFont;
            font-size: 2rem; 
            color: black;
            text-align: justify;
            overflow-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    @if($artikel['status'])
    <div class="row margin-top-15" style="margin-bottom: 20px;">
        <label class="title"> {{$artikel['data']->title }} </label>
        <span  class="date""> 
            {{date_format(date_create($artikel['data']->created_at), 'j M Y')}}
        </span>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 no-padding">
            <img src="{{asset($artikel['data']->file_path)}}" style="width: 100%;"/>
        </div>
    </div>
    <div class="row margin-top-15">
        <label class="subtitle"> {{$artikel['data']->subtitle }}  </label>
        <span class="description"> 
            {{$artikel['data']->description }} 
        </span>
    </div>
    @endif
    <div class="row margin-top-15">
        <div class="col-lg-4 col-md-4 col-xs-12">
            <a href="{{url('/topic-detail')}}">
                <button class="btn btn-primary">
                    Kembali ke laman Artikel
                </button>
            </a>
        </div>
    </div>
@endsection
@push('js')
@endpush