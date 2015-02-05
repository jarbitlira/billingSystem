@section('page-top')
    <div class="col-md-8">
        <h1 class="page_title">Invoice #{{ $invoice->id }}</h1>
        <p class="text-muted">Due By: {{ $seller->first_name.' '.$seller->last_name }}</p>
        <p class="text-muted">Date: {{ $invoice->created_at->format('D M dS, Y') }}</p>
    </div>
    <div class="col-md-4 text-right">
        <div class="btn-group btn-group-sm">
            <button class="btn btn-default">CSV</button>
            <button class="btn btn-default">XML</button>
            <a href="{{ URL::to('print/invoice/'.$invoice->id, $invoice->created_at) }}" class="btn btn-default">PDF</a>
            <button class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</button>
        </div>
    </div>
@endsection

<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered text-center invoice_table">
                <thead>
                <tr id="client_data">
                    <th class="bg-primary" colspan="5">
                        <h3 class="heading_a">Client information:</h3>
                        <div class="col-md-6">
                            <p id="client_name"><small>Name: </small><ins><strong><a style="color:#fff" href="{{ URL::to('client/'.$invoice->client->id.'/edit') }}">{{ $invoice->client->name }}</a></strong></ins>  </p>
                            <p id="client_address"><small>Address: </small><ins><strong>{{ $invoice->client->address }}</strong></ins></p>
                        </div>
                        <div class="col-md-6">
                            <p id="client_email"><small>Email: </small><ins><strong>{{ $invoice->client->email }}</strong></ins></p>
                            <p id="client_phone"><small>Phone: </small><ins><strong>{{ $invoice->client->phone1 }}</strong></ins></p>
                        </div>
                    </th>
                    <th class="bg-primary" colspan="2">
                        <p class="pull-right">
                            <small>No.:</small> {{ $invoice->id }}<br/>
                            <small>Date: </small>{{ $invoice->created_at->format('D M dS, Y') }}
                        </p>
                    </th>
                </tr>
                <tr class="product_headers">
                    <th>Sku</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Tax</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->products as $product)
                <tr>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td> {{ $product->pivot->quantity }} </td>
                    <td> - </td>
                    <td> {{ (float)$product->unit_price * (float)$product->pivot->quantity }} </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" rowspan="4">
                        <label for="invoice_notes" class="text-left">Notes:</label>
                        <textarea id="invoice_notes" class="form-control" cols="5" rows="4" readonly>{{ $invoice->notes }}</textarea>
                    </td>
                    <td colspan="1" rowspan="4"></td>
                    <td class="col_total text-right">Subtotal</td>
                    <td class="col_total">C$ <strong>{{ $invoice->subtotal }}</strong></td>
                </tr>
                <tr>
                    {{--<td colspan="2"></td>--}}
                    <td class="col_total text-right">Tax</td>
                    <td class="col_total">C$ <strong> 0.00 </strong></td>
                </tr>
                <tr>
                    {{--<td colspan="2"></td>--}}
                    <td class="col_total text-right">Discount</td>
                    <td class="col_total">C$ <strong>{{ $invoice->disccount }} </strong></td>
                </tr>
                <tr class="grand_total">
                    {{--<td colspan="2"></td>--}}
                    <td class="col_total text-right">Grand Total</td>
                    <td class="col_total">C$ <strong>{{ $invoice->total }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>