<?php
/**
 * Created by PhpStorm.
 * User: Yass
 * Date: 02-02-15
 * Time: 11:18 PM
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

        h2 {
            margin-top: 30px !important;
            text-align: center;
        }

        table {
            margin-left: 65px !important;
            margin-top: 15px !important;
        }

        tr {
            border-bottom: 1px;
            border-bottom-color: #000000;
        }

        td{
            padding: 0 20 0 20;
        }
        thead {
            background-color: lightgray;
        }
        #tot{

            background-color: #989898;
            text-align: center;
            color: #ffffff;
        }
    </style>
</head>
<body>

            <h2>MANAGE INVOICES</h2>
            <HR width=80% align="center">

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Seller</th>
                    <th>Products</th>
                    {{--<th>Payment type</th>--}}
                    <th>Created</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
@foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->client->name }}</td>
                    <td>{{ $invoice->user->first_name }}</td>
                    <td>{{ count($invoice->products) }}</td>
{{--                    <td>{{ $invoice->payment_type }}</td>--}}
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->total }}</td>
                    <?php
                    global $total;
                    $total = $total + $invoice->total;
                    ?>
                </tr>
@endforeach
            <tr>
                <th id="tot" colspan="5"> <em>Total</em></th>
                <?php echo("<th id="."tot"."> <em>". $total . "</em></th>"); ?>
            </tr>

            </tbody>
        </table>

</body>
</html>