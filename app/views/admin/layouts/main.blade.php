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
        </ul>
    </nav>
    @endif
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-default">
                    @include('admin.layouts.messages')
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main content-->
@include('admin.layouts.sidenav')
@include('admin.layouts.footer')