@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title">Manage invoices</h1>
        <p class="text-muted">...</p>
    </div>
@endsection

<div class="panel-body">
    <div class="table-responsive">
        <table class="table info-table">
            <thead>
                <tr>
                    <th class="sub_col">#</th>
                    <th class="sub_col">Client</th>
                    <th class="sub_col">Seller</th>
                    <th class="sub_col">Products</th>
                    {{--<th class="sub_col">Payment type</th>--}}
                    <th class="sub_col">Total</th>
                    <th class="sub_col">Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <th class="sub_col">{{ $invoice->id }}</th>
                    <th class="sub_col">{{ $invoice->client->name }}</th>
                    <th class="sub_col">{{ $invoice->user->first_name }}</th>
                    <th class="sub_col">{{ count($invoice->products) }}</th>
{{--                    <th class="sub_col">{{ $invoice->payment_type }}</th>--}}
                    <th class="sub_col">{{ $invoice->total }}</th>
                    <th class="sub_col">{{ $invoice->created_at }}</th>
                    <th>
                        <a href="{{ URL::to('invoice/'.$invoice->id) }}" class="btn btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-xs"><i class="fa fa-print"></i></a>
                        <button class="btn btn-xs" type="submit"><i class="fa fa-ban"></i></button>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>