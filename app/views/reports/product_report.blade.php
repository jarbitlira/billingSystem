<?php
/**
 * Created by PhpStorm.
 * User: Yass
 * Date: 01-23-15
 * Time: 06:09 PM
 */
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BillingSystem</title>

    <style type="text/css">
        *{
            margin: 0 0 0 0;
        }
        h2{
            margin-top: 30px !important;
            text-align: center;
        }
        table{
            margin-left: 65px !important;
            margin-top: 15px !important;
        }
        tr{
            border-bottom: 1px;
            border-bottom-color: #000000;
        }
        thead{
            background-color: lightgray;
        }
    </style>
</head>
<body>

<h2>REPORTE DE PRODUCTOS </h2>
<HR width=80% align="center">
<table class="table info_table" id="prod_table">
    <thead>
    <tr>
        <th class="sub_col">SKU</th>
        <th class="sub_col">Name</th>
        <th class="sub_col">Unit Price</th>
        <th class="sub_col">Length</th>
        <th class="sub_col">Weight</th>
        <th class="sub_col">Category</th>
        <th class="sub_col">Provider</th>
        <th class="sub_col">Available</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="sub_col">1j27a111</td>
        <td>
            <p>Occaecati veritatis libero.</p>
        </td>
        <td class="sub_col"><strong>C$87.72</strong></td>
        <td class="sub_col">27m</td>
        <td class="sub_col">27kg</td>
        <td class="sub_col">Category</td>
        <td class="sub_col">provider</td>
        <td class="sub_col"><span class="label label-success">enabled</span></td>
    </tr>
    <tr>
        <td class="sub_col">2k38b222</td>
        <td>
            <p>ad verbum strong</p>
        </td>
        <td class="sub_col"><strong>C$50.00</strong></td>
        <td class="sub_col">0.3m</td>
        <td class="sub_col">0.5kg</td>
        <td class="sub_col">Category</td>
        <td class="sub_col">provider</td>
        <td class="sub_col"><span class="label label-success">disable</span></td>
    </tr>
    <tr>
       @foreach($products as $product)
       <tr>
           <td class="sub_col">
               {{ $product->sku }}
           </td>
           <td>
               <h5><p> {{ $product->name }} </p></h5>
           </td>
           <td class="sub_col"><strong>
C${{ $product->unit_price }}
           </strong></td>
           <td class="sub_col">
               {{ $product->length }}
           </td>
           <td class="sub_col">
               {{ $product->weight }}
           </td>
           <td class="sub_col">
               {{ $product->category->name }}
           </td>
           <td class="sub_col">
@if (isset($product->provider->name))
{{ $product->provider->name }}
               @endif
           </td>
           <td class="sub_col">
@if($product->available == 1)
               <span class="label label-success"><i class="fa fa-thumbs-up"></i></span>
@else
               <span class="label label-danger"><i class="fa fa-thumbs-down"></i></span>
@endif
           </td>
       </tr>
@endforeach
</table>

</body>