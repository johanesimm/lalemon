@extends('layouts.app')
@push('css')
    <link href="{{asset('assets/css/customs/sidebar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/customs/article.css')}}" rel="stylesheet" />
@endpush
@section('content')
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
    <div class="row margin-top-15" style="margin-bottom: 5px;">
        <label class="main-title"> Hot Topic </label>
    </div>
    <div class="row">
        @if($artikel['status'])
            <?php $first = true; ?>
            @foreach($artikel['data']['article'] as $index => $article)
                @if($article->category->name == "Hot Topic")
                    @if($first)
                        <div class="col-lg-7 col-md-7 col-xs-12 main-card-mobile-border">
                            <img src="{{asset($article->file_path)}}" class="main-image-article" data-id={{$article->id}}>
                            <span class="title" data-id={{$artikel['data']['newest_article'][0]->article_id}}> 
                                {{$article->title}} 
                            </span>
                            <label class="date">
                                {{ date_format(date_create($article->created_at), 'j M Y') }}
                            </label>
                        </div>
                        <?php $first = false; ?>
                    @else
                        <div class="col-lg-5 col-md-5 col-xs-12 sub-card-mobile-border">
                            <div class="col-lg-12 col-md-12 col-xs-12" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <span class="title" data-id={{$article->id}}> 
                                        {{$article->title}}
                                    </span>
                                    <span class="subtitle"> 
                                        {{$article->subtitle}}
                                    </span>
                                    <span class="date"> 
                                        {{ date_format(date_create($article->created_at), 'j M Y') }} 
                                    </span>
                                </div>
                                <div class="col-lg-5 col-md-5 col-xs-5">
                                    <img src="{{asset($article->file_path)}}" class="sub-image-article" data-id={{$article->id}}>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        @endif
    </div>
    <div class="row margin-top-15" style="margin-bottom: 5px;">
        <label class="main-title"> Tips Diet </label>
    </div>
    <div class="row">
        @if($artikel['status'])
            <?php $first = true; ?>
            @foreach($artikel['data']['article'] as $index => $article)
                @if($article->category->name == "Tips Diet")
                    @if($first)
                        <div class="col-lg-7 col-md-7 col-xs-12 main-card-mobile-border">
                            <img src="{{asset($article->file_path)}}" class="main-image-article" data-id={{$article->id}}>
                            <span class="title" data-id={{$article->id}}> {{$article->title}} </span>
                            <label class="date">
                                {{ date_format(date_create($article->created_at), 'j M Y') }}
                            </label>
                        </div>
                        <?php $first = false; ?>
                    @else
                        <div class="col-lg-5 col-md-5 col-xs-12 sub-card-mobile-border">
                            <div class="col-lg-12 col-md-12 col-xs-12" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <span class="title" data-id={{$article->id}}> 
                                        {{$article->title}}
                                    </span>
                                    <span class="subtitle"> 
                                        {{$article->subtitle}}
                                    </span>
                                    <span class="date"> 
                                        {{ date_format(date_create($article->created_at), 'j M Y') }} 
                                    </span>
                                </div>
                                <div class="col-lg-5 col-md-5 col-xs-5">
                                    <img src="{{asset($article->file_path)}}" class="sub-image-article" data-id={{$article->id}}>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        @endif
    </div>
    <div class="row margin-top-15" style="margin-bottom: 5px;">
        <label class="main-title"> Heathly News </label>
    </div>
    <div class="row">
        @if($artikel['status'])
            <?php $first = true; ?>
            @foreach($artikel['data']['article'] as $index => $article)
                @if($article->category->name == "Hot Topic")
                    @if($first)
                        <div class="col-lg-7 col-md-7 col-xs-12 main-card-mobile-border">
                            <img src="{{asset($article->file_path)}}" class="main-image-article" data-id={{$article->id}}>
                            <span class="title" data-id={{$article->id}}> {{$article->title}} </span>
                            <label class="date">
                                {{ date_format(date_create($article->created_at), 'j M Y') }}
                            </label>
                        </div>
                        <?php $first = false; ?>
                    @else
                        <div class="col-lg-5 col-md-5 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-xs-12 sub-card-mobile-border" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <span class="title" data-id={{$article->id}}> 
                                        {{$article->title}}
                                    </span>
                                    <span class="subtitle"> 
                                        {{$article->subtitle}}
                                    </span>
                                    <span class="date"> 
                                        {{ date_format(date_create($article->created_at), 'j M Y') }} 
                                    </span>
                                </div>
                                <div class="col-lg-5 col-md-5 col-xs-5">
                                    <img src="{{asset($article->file_path)}}" class="sub-image-article" data-id={{$article->id}}>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        @endif
    </div>
    <div class="row margin-top-15" style="margin-bottom: 5px;">
        <label class="main-title"> Daily Cook </label>
    </div>
    <div class="row">
        @if($artikel['status'])
            <?php $first = true; ?>
            @foreach($artikel['data']['article'] as $index => $article)
                @if($article->category->name == "Daily Cook")
                    @if($first)
                        <div class="col-lg-7 col-md-7 col-xs-12 main-card-mobile-border">
                            <img src="{{asset($article->file_path)}}" class="main-image-article" data-id={{$article->id}}>
                            <label class="title" data-id={{$article->id}}> {{$article->title}} </label>
                            <label class="date">
                                {{ date_format(date_create($article->created_at), 'j M Y') }}
                            </label>
                        </div>
                        <?php $first = false; ?>
                    @else
                        <div class="col-lg-5 col-md-5 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-xs-12 sub-card-mobile-border" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <span class="title" data-id={{$article->id}}> 
                                        {{$article->title}}
                                    </span>
                                    <span class="subtitle"> 
                                        {{$article->subtitle}}
                                    </span>
                                    <span class="date"> 
                                        {{ date_format(date_create($article->created_at), 'j M Y') }} 
                                    </span>
                                </div>
                                <div class="col-lg-5 col-md-5 col-xs-5">
                                    <img src="{{asset($article->file_path)}}" class="sub-image-article" data-id={{$article->id}}>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        @endif
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function()
        {
            $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
            }); 
            
            $('.title').on('click', function() {
                let article_id = $(this).data('id');
                let url = window.location.origin + "/topic/id=" + article_id;
                window.location = url;
                console.log(url);
            });

            $('.main-image-article').on('click', function() {
                let article_id = $(this).data('id');
                let url = window.location.origin + "/topic/id=" + article_id;
                window.location  = url;
                console.log(url);
            });

        });
    </script>
@endpush