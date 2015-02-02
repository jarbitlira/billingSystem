<?php
/**
 * Created by PhpStorm.
 * User: Yass
 * Date: 02-01-15
 * Time: 11:32 AM
 */
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>

    <style type="text/css">
    .topdata{
        border: solid 1px;
        margin: 0px;
           }
    #titulo{
        text-align: center;
    }

    #num_fact{
        display: inline;
        margin-left: 130px;
        float: right;
    }
    #vendor{
        display: inline;
        float: left;
            }
    #date{
        margin-left: 120px;
        display: inline;
        float: left;
    }

    .col-sm-6{
        margin-top: 10px;
        background-color:#D8D8D8;
        padding: 10 0 10 0;
    }

    .client{
        display: inline;
            }
    .telf{
        float: right;
        display: inline;
        margin-left: 400px;
    }

    .email{
        float: right;
        display: inline;
          }
    .dir{
        display: inline;
        float: left;

    }

    table {
        margin-top: 15px !important;
        margin-left: 10px;
    }

     td{
       padding: 0 20 0 20;
       border: 2px red;
   }

    thead{
        background-color: green;
        color: white;
    }
    tbody{
        background-color: #999988;
        color: white;
    }

    </style>
</head>
<body>

    <div class="topdata">

        <h1 id="titulo"> Nombre del Comercio, S.A   </h1>
        {{--<p class="text-muted">date: 24.05.2014; due by: 17.06.2014</p>--}}
        <p id="vendor">Vendedor: {{ $seller->first_name.' '.$seller->last_name }}</p>
        <p id="date">Fecha: {{ $invoice->created_at }}</p>
        <h3 id="num_fact">Factura # {{ $invoice->id }}</h3>
    </div>


    <div class="panel-body">
    <div class="row">

        <div class="col-sm-6">
            <h3 class="client">Cliente:</h3>
            <p class="client">{{ $invoice->client->name }}</p>
            <h3 class="telf">Telefono:</h3>
            <p class="telf"><small> {{ $invoice->client->phone1 }}</small></p>
            <h3 class="email">Email:</h3>
            <pclass="email"><small><a href="#">{{ $invoice->client->email }}</a></small></p>
            <br>
            <h3 class="dir">Dirección:</h3>
            <address class="dir">
                <p class="dir">{{ $invoice->client->address }}</p>
            </address>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
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
</body>
</html>