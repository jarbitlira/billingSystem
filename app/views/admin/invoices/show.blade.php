@section('page-top')
    <div class="col-md-8">
        <h1 class="page_title">Invoice #{{ $invoice->ref }}</h1>
        <p class="text-muted">Date: 24.05.2014; Due By: 17.06.2014</p>
        <p class="text-muted">{{ $invoice->created_at }}</p>
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
            <h3 class="heading_a">To:</h3>
            <p>{{ $invoice->client->name }}</p>
            <p><small><span class="text-muted">Phone:</span> {{ $invoice->client->phone1 }}</small></p>
            <p><small><span class="text-muted">E-mail:</span> <a href="#">{{ $invoice->client->email }}</a></small></p>
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
            <table class="table table-striped invoice_table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Sku</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Tax</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td class="col_total text-right">Subtotal</td>
                    <td class="col_total"><strong>C${{ $invoice->subtotal }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td class="col_total text-right">Tax</td>
                    <td class="col_total"><strong> - </strong></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td class="col_total text-right">Discount</td>
                    <td class="col_total"><strong>C${{ $invoice->disccount }} </strong></td>
                </tr>
                <tr class="grand_total">
                    <td colspan="4"></td>
                    <td class="col_total text-right">Grand Total</td>
                    <td class="col_total"><strong>C${{ $invoice->total }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>