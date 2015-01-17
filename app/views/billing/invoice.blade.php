<div class="panel-body">
    <input type="hidden" id="filter_product">
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
                @foreach($products as $product)
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
                    <td class="col_total"><strong>C${{ '-' }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td class="col_total text-right">Tax</td>
                    <td class="col_total"><strong> - </strong></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td class="col_total text-right">Discount</td>
                    <td class="col_total"><strong>C${{ '-' }} </strong></td>
                </tr>
                <tr class="grand_total">
                    <td colspan="4"></td>
                    <td class="col_total text-right">Grand Total</td>
                    <td class="col_total"><strong>C${{ '-' }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
