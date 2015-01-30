<div class="panel-body">

    <div class="row">
        <div class="col-xs-3">
            <label for="filter_product">PRODUCTS FILTER</label>
            <input type="text" id="filter_product" class="form-control billingFilter" placeholder="Type a product..">
        </div>
        <div class="col-xs-3">
            <label for="filter-client">CLIENTS FILTER</label>
            <input type="text" id="filter_client"class="form-control billingFilter" placeholder="Type a client name.."/>
        </div>
        <div class="col-xs-3">
            <label for="filter-client">SELLER</label>
            <input type="text" class="form-control" id="current_user" value="{{ $seller }}" readonly/>
        </div>
        <div class="col-xs-offset-1 col-xs-2">
            <button class="btn btn-lg btn-success" type="button">GENERATE</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered invoice_table text-center" id="billing_table">
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
                    <td class="col_total text-right"> Total</td>
                    <td class="col_total" id="finalGrandtotal"><strong>C$</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-12 text-right">
            <button class="btn btn-lg btn-success" type="button">GENERATE</button>
        </div>
    </div>
</div>
