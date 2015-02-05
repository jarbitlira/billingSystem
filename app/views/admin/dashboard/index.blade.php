@section('pre-panel')
 <div class="col-md-12">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="stat_box stat_up">
                    <a href="{{ URL::to('product') }}" class="text-muted">
                    <div class="stat_ico color_f"><i class="ion ion-bag"></i></div>
                    <div class="stat_content">
                        <span class="stat_count">{{ $products->count() }}</span>
                        <span class="stat_name">Products in Stock</span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="stat_box stat_up">
                    <a href="{{ URL::to('billing') }}" class="text-muted">
                    <div class="stat_ico color_g"><i class="ion-ios7-cart-outline"></i></div>
                    <div class="stat_content">
                        <span class="stat_count">C$ {{ $invoices->sum('total') }}</span>
                        <span class="stat_name">Sale (last month)</span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="stat_box stat_down">
                    <a href="{{ URL::to('invoice') }}" class="text-muted">
                    <div class="stat_ico color_a"><i class="ion-clipboard"></i></div>
                    <div class="stat_content">
                        <span class="stat_count">{{ $invoices->count() }}</span>
                        <span class="stat_name">Invoices</span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="stat_box stat_up">
                    <a href="{{ URL::to('client') }}" class="text-muted">
                    <div class="stat_ico color_d"><i class="fa fa-user"></i></div>
                    <div class="stat_content">
                        <span class="stat_count">{{ $clients->count() }}</span>
                        <span class="stat_name">Clients</span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

 <div class="row">
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="chart">
                <div id="monthSales"></div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="heading_b">Product Categories</div>
            <div class="row">
                <div class="col-xs-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th class="col_md sub_col">Products</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($categories as $category)
                            <tr>
                                {{-- Set a filter in products by category--}}
                                <td><strong>{{ $category->name }}</strong></td>
                                <td class="sub_col">{{ $category->products->count() }}</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-8">
                    <div id="piechart" class="chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="heading_b">Browsers</div>
            <div class="row">
                <div class="col-xs-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Browser</th>
                                <th class="col_md sub_col">Visits</th>
                                <th class="col_md sub_col">% visits</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = array_pull($browsers, 'total'); ?>
                            @foreach($browsers as $item)
                            <tr>
                                <td><strong>{{$item->browser}}</strong></td>
                                <td class="sub_col">{{ $item->counter }}</td>
                                <td class="sub_col"> {{ (int)(($item->counter / $total) * 100) }}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-8">
                    <div id="donutBrowser" class="chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{{--<div class="row">--}}
{{--<div class="col-md-8">--}}
    {{--<div class="panel panel-default">--}}
        {{--<div class="panel-body">--}}
            {{--<div class="heading_b">Latest Images</div>--}}
            {{--<div id="latest-images" class="owl-carousel owl-theme">--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image001_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image002_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image003_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image004_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image005_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image006_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image007_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image008_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image009_tn.jpg" alt=""></div>--}}
                {{--<div class="item"><img class="img-thumbnail" src="/public/template/assets/img/gallery/Image010_tn.jpg" alt=""></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
    {{----}}
{{--<div class="col-md-4">--}}
    {{--<div id="mini-clndr">--}}
        {{--<script>--}}
            {{--// todo calendar events--}}
{{--//            var currentMonth = moment().format('YYYY-MM'),--}}
{{--//                nextMonth    = moment().add('month', 1).format('YYYY-MM');--}}
{{--//--}}
{{--//            todo_events = [--}}
{{--//                { date: currentMonth + '-' + '07', title: 'Dolore est beatae.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '08', title: 'A ex reiciendis et.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '08', title: 'Officiis accusantium non.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '12', title: 'Impedit eos minima rerum.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '19', title: 'Ut ad enim.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '19', title: 'Eum ut nesciunt dolores.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '22', title: 'Earum rerum.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '25', title: 'Voluptatem vel doloremque reiciendis expedita.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '25', title: 'Corrupti voluptates impedit.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '25', title: 'Sunt possimus labore sint reprehenderit.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '28', title: 'Vitae hic laboriosam aut aut.', url: 'javascript:void(0)' },--}}
{{--//                { date: currentMonth + '-' + '28', title: 'Velit voluptatibus quasi.', url: 'javascript:void(0)' },--}}
{{--//                { date: nextMonth + '-' + '04',    title: 'Rem reiciendis in et.', url: 'javascript:void(0)' },--}}
{{--//                { date: nextMonth + '-' + '18',    title: 'Nam nobis in molestiae itaque.', url: 'javascript:void(0)' }--}}
{{--//            ]--}}
        {{--</script>--}}
        {{--<script id="mini-clndr-template" type="text/template">--}}
            {{--<div class="controls">--}}
                {{--<div class="clndr-previous-button"><span class="glyphicon glyphicon-chevron-left"></span></div><div class="month"><%= month+' '+year %></div><div class="clndr-next-button"><span class="glyphicon glyphicon-chevron-right"></span></div>--}}
            {{--</div>--}}

            {{--<div class="days-container">--}}
                {{--<div class="days">--}}
                    {{--<div class="headers">--}}
                        {{--<% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>--}}
                    {{--</div>--}}
                    {{--<% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>--}}
                {{--</div>--}}
                {{--<div class="events">--}}
                    {{--<div class="headers">--}}
                        {{--<div class="x-button"><span class="glyphicon glyphicon-remove"></span></div>--}}
                        {{--<div class="event-header">EVENTS</div>--}}
                    {{--</div>--}}
                    {{--<div class="events-list-wrapper">--}}
                        {{--<div class="events-list">--}}
                            {{--<% _.each(eventsThisMonth, function(event) { %>--}}
                                {{--<div class="event">--}}
                                    {{--<a href="<%= event.url %>"><%= moment(event.date).format('MMM Do') %>: <%= event.title %></a>--}}
                                {{--</div>--}}
                              {{--<% }); %>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</script>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</div>--}}
