@extends('layouts.app')
@push('css')
    <link href="{{asset('assets/css/customs/testimoni.css')}}" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row margin-top-15">
        <div class="testimoni-container">
            @if($testimonis['status'])
                @foreach($testimonis['data'] as $testimoni)
                <div class="col-lg-3 col-sm-6">
                    <div class="thumbnail">
                        <div class="thumb">
                            <img src="{{asset("$testimoni->file_path")}}" alt="" style="height: 380px;">
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection