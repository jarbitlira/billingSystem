<div class="panel-body">

    <div class="col-md-4">
        <label for="filter_product">PRODUCTS FILTER</label>
        <input type="text" class="form-control" id="filter_product" placeholder="Type a product..">
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped invoice_table" id="billing_table">
                <thead>
                <tr>
                    <th>Sku</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Tax</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td class="col_total text-right">Subtotal</td>
                    <td class="col_total" id="finalSubtotal"><strong>C$</strong></td>
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
