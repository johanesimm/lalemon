<div class="row margin-top-15 desktop-only">
    <div class="col-lg-2 col-md-2">
        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content sidebar-bg-grey">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <li class="main-navigation" data-id="1">
                                <a data-toggle="collapse" data-target="#sidebar-hottopic"> 
                                    <span> Hot Topic  </span>
                                    {{-- <span class="arrow-icon"> 
                                        <img src="{{asset('assets/images/lalemon/icon-right-arrow.png')}}" style="margin-left: 10%;"/>
                                    </span> --}}
                                </a>
                            </li>
                            <li class="main-navigation" data-id="2">
                                <a data-toggle="collapse" data-target="#sidebar-tipsdiet"> 
                                    <span> Tips Diet </span> 
                                </a>
                            </li class="main-navigation">
                            <li class="main-navigation" data-id="3">
                                <a data-toggle="collapse" data-target="#sidebar-heatlhy"> 
                                    <span> Heathly News </span> 
                                </a>
                            </li>
                            <li class="main-navigation" data-id="4">
                                <a data-toggle="collapse" data-target="#sidebar-daily">
                                    <span> Daily Cook </span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
            <div class="sidebar-content second-sidebar-fixed collapse" id="sidebar-hottopic">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            @if($artikel['status'])
                                @foreach($artikel['data'] as $row)
                                    @if($row->m_article_id == 1)
                                    <li class="sub-navigation" data-id="{{$row->id}}">
                                        <a style="overflow-wrap: break-word"> 
                                            <span> {{$row->title}}</span>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
            <div class="sidebar-content second-sidebar-fixed collapse" id="sidebar-tipsdiet">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            @if($artikel['status'])
                                @foreach($artikel['data'] as $row)
                                    @if($row->m_article_id == 2)
                                    <li class="sub-navigation" data-id="{{$row->id}}">
                                        <a style="overflow-wrap: break-word"> 
                                            <span> {{$row->title}}</span>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
            <div class="sidebar-content second-sidebar-fixed collapse" id="sidebar-heatlhy">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            @if($artikel['status'])
                                @foreach($artikel['data'] as $row)
                                    @if($row->m_article_id == 3)
                                    <li class="sub-navigation" data-id="{{$row->id}}">
                                        <a style="overflow-wrap: break-word"> 
                                            <span> {{$row->title}}</span>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
            <div class="sidebar-content second-sidebar-fixed collapse" id="sidebar-daily">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            @if($artikel['status'])
                                @foreach($artikel['data'] as $row)
                                    @if($row->m_article_id == 4)
                                    <li class="sub-navigation" data-id="{{$row->id}}">
                                        <a style="overflow-wrap: break-word"> 
                                            <span> {{$row->title}}</span>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
        </div>
            <!-- /main sidebar -->
    </div>
    <div class="col-lg-9 col-md-9">
        <div class="content-container" style="display:block;">
        </div>
    </div>
</div>
<div class="row margin-top-15 mobile-only">
    <div class="col-xs-12">
        <div class="topic-img-container">
            <img src="{{asset('assets/images/lalemon/hot-topic.png')}}" class="main-topic"/>
            <p class="text-topic-default"> HOT <br> TOPIC </p>        
        </div>
        <div class="content-container content-collapse">
            @if($artikel['status'])
                @foreach($artikel['data'] as $row)
                    @if($row->m_article_id == 1)
                    <div class="card-content">
                        <h4 class="header"> {{$row->title}} </h4>
                        <h5 class="sub-header"> {{$row->subtitle}} </h5>
                        <img src="{{asset("$row->file_path")}}" class="topic-image"/>
                        <div class="paragraph-container paragraph-collapse">
                            <p class="lbl-paragraph"> 
                                {{$row->description}}
                            </p>
                        </div>
                        <a style="float: right;cursor: pointer;" class="btn-expand-paragraph collapsed"> See More ... </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        <a style="float: right;cursor: pointer;" class="btn-expand" data-topic="hot-topic"> See More ... </a>
    </div>
    <div class="col-xs-12 margin-top-10 topic-img-container">
        <div class="topic-img-container">
            <img src="{{asset('assets/images/lalemon/tips-diet.png')}}" class="main-topic"/>
            <p class="text-topic-default" style="margin: -55px 0 0 -45px !important;"> TIPS <br> DIET </p>     
        </div>
        <div class="content-container content-collapse">
            @if($artikel['status'])
                @foreach($artikel['data'] as $row)
                    @if($row->m_article_id == 2)
                    <div class="card-content">
                        <h4 class="header"> {{$row->title}} </h4>
                        <h5 class="sub-header"> {{$row->subtitle}} </h5>
                        <img src="{{asset("$row->file_path")}}" class="topic-image"/>
                        <div class="paragraph-container paragraph-collapse">
                            <p class="lbl-paragraph"> 
                                {{$row->description}}
                            </p>
                        </div>
                        <a style="float: right;cursor: pointer;" class="btn-expand-paragraph collapsed"> See More ... </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        <a style="float: right;cursor: pointer;" class="btn-expand" data-topic="tips-diet"> See More ... </a>
    </div>
    <div class="col-xs-12 topic-img-container">
        <div class="topic-img-container">
            <img src="{{asset('assets/images/lalemon/healthy-news.png')}}" class="main-topic"/>
            <p class="text-topic-default" style="margin: -50px 0 0 -60px !important;"> HEALTHY <br> NEWS </p> 
        </div>
        <div class="content-container content-collapse">
            @if($artikel['status'])
                @foreach($artikel['data'] as $row)
                    @if($row->m_article_id == 3)
                    <div class="card-content">
                        <h4 class="header"> {{$row->title}} </h4>
                        <h5 class="sub-header"> {{$row->subtitle}} </h5>
                        <img src="{{asset("$row->file_path")}}" class="topic-image"/>
                        <div class="paragraph-container paragraph-collapse">
                            <p class="lbl-paragraph"> 
                                {{$row->description}}
                            </p>
                        </div>
                        <a style="float: right;cursor: pointer;" class="btn-expand-paragraph collapsed"> See More ... </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        <a style="float: right;cursor: pointer;" class="btn-expand" data-topic="healthy-news"> See More ... </a>
    </div>
    <div class="col-xs-12 topic-img-container">
        <div class="topic-img-container">
            <img src="{{asset('assets/images/lalemon/daily-cook.png')}}" class="main-topic"/>
            <p class="text-topic-default" style="margin: -55px 0 0 -45px !important;"> DAILY <br> COOK </p>
        </div>
        <div class="content-container-mobile content-collapse">
            @if($artikel['status'])
                @foreach($artikel['data'] as $row)
                    @if($row->m_article_id == 4)
                    <div class="card-content">
                        <h4 class="header"> {{$row->title}} </h4>
                        <h5 class="sub-header"> {{$row->subtitle}} </h5>
                        <img src="{{asset("$row->file_path")}}" class="topic-image"/>
                        <div class="paragraph-container paragraph-collapse">
                            <p class="lbl-paragraph"> 
                                {{$row->description}}
                            </p>
                        </div>
                        <a style="float: right;cursor: pointer;" class="btn-expand-paragraph collapsed"> See More ... </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        <a style="float: right;cursor: pointer;" class="btn-expand" data-topic="main-topic"> See More ... </a>
    </div>
</div>