@include('admin.layouts.header')
    <!-- main content -->
    <div id="main_wrapper">
        <div class="page_bar clearfix">
            <div class="row">
                @yield("page-top")
            </div>
        </div>
        @if(isset($breadcrumbs))
        <nav class="breadcrumbs">
            <ul>
                @foreach($breadcrumbs as $bc => $url)
                <li><a href="{{ URL::to($url) }}">{{ $bc }}</a></li>
                @if($url != last($breadcrumbs))
                <li class="sep">\</li>
                @endif
                @endforeach
                {{--@yield('breadcrumbs')--}}
            </ul>
        </nav>
        @endif
        {{ $content }}
    </div>
    <!-- /main content-->
@include('admin.layouts.sidenav')
@include('admin.layouts.footer')