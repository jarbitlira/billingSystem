@section('page-top')
    <div class="col-md-8">
        <h1 class="page_title">Invoice #{{ $invoice->id }}</h1>
        {{--<p class="text-muted">Date: 24.05.2014; Due By: 17.06.2014</p>--}}
        <p class="text-muted">Due By: {{ $seller->first_name.' '.$seller->last_name }}</p>
        <p class="text-muted">Date: {{ $invoice->created_at }}</p>
    </div>
    <div class="col-md-4 text-right">
        <div class="btn-group btn-group-sm">
            <button class="btn btn-default">CSV</button>
            <button class="btn btn-default">XML</button>
            <button class="btn btn-default">PDF</button>
            <button class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</button>
        </div>
    </div>
@endsection

<div class="panel-body">
    <div class="row">
        <!--<div class="col-sm-6">
            <h3 class="heading_a">From</h3>
            <address>
                <p class="addres_name">Ebro Admin HQ</p>
                <p>Av Almozara, 79</p>
                <p>50003 Zaragoza</p>
                <p class="sepH_b">Spain</p>
                <p><small><span class="text-muted">Phone:</span> (+321) 123 456 789</small></p>
                <p><small><span class="text-muted">E-mail:</span> <a href="mailto:example.com">tisa@example.com</a></small></p>
            </address>
        </div> -->
        <div class="col-sm-6">
            <h3 class="heading_a">Client:</h3>
            <p>{{ $invoice->client->name }}</p>
            <p><small><span class="text-muted">Phone:</span> {{ $invoice->client->phone1 }}</small></p>
            <p><small><span class="text-muted">E-mail:</span> <a href="#">{{ $invoice->client->email }}</a></small></p>
            <p><small><span class="text-muted">Address:</span>
            <address>
                <p class="addres_name">{{ $invoice->client->address }}</p>
                <!-- <p>Alayna Fall 968</p>
                <p>92101 South Wilton</p>
                <p>Schaeferberg</p>-->
            </address>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered text-center invoice_table">
                <thead>
                <tr>
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