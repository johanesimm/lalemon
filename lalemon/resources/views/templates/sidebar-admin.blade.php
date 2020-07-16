<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <ul class="navigation">
                <li class="@if(Str::contains(url()->current(), '/dashboard')) active @endif">
                    <a href="{{url('/dashboard')}}">
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="@if(Str::contains(url()->current(), '/add-product')) active @endif">
                    <a href="{{url('/add-product')}}">
                        <span> Add Product</span>
                    </a>
                </li>
                <li class="@if(Str::contains(url()->current(), '/add-artikel')) active @endif">
                    <a href="{{url('/add-artikel')}}">
                        <span> Add Artikel</span>
                    </a>
                </li>
                <li class="@if(Str::contains(url()->current(), '/add-promo')) active @endif">
                    <a href="{{url('/add-promo')}}">
                        <span> Add Promo</span>
                    </a>
                </li>
                <li class="@if(Str::contains(url()->current(), '/add-testimoni')) active @endif">
                    <a href="{{url('/add-testimoni')}}">
                        <span> Add Testimoni </span>
                    </a>
                </li>
                <li class="@if(Str::contains(url()->current(), '/manage-customer')) active @endif">
                    <a href="{{url('/manage-customer')}}">
                        <span> Manage Customer </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->