@if(\Session::has('notice'))
    <div class="alert alert-success">
        <button type="button" class="btn btn-xs btn-danger pull-right" data-dismiss="alert"><i class="fa fa-close"></i></button>
        <p>{{ \Session::get('notice') }}</p>
    </div>
@endif

@if(\Session::has('errors') || \Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="btn btn-xs btn-success pull-right" data-dismiss="alert"><i class="fa fa-close"></i></button>
        @if(\Session::has('errors'))
            <ul>
                @foreach(\Session::get('errors')->all() as $error)
                    @if(is_array($error))
                        <li>{{ implode(',', $error) }}</li>
                    @else
                        <li>{{ $error }}</li>
                    @endif
                @endforeach
            </ul>
        @elseif(\Session::has('error'))
            <p>{{ \Session::get('error') }}</p>
        @endif
    </div>
@endif