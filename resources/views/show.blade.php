<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tangacia_CV2</title>

        <style>
            table,td,tr{
                border:1px solid;
            }
        </style>
    </head>
    <body>
        <h3><a href="{{ route( 'showProducts' ) }}" role="button">Zpět na začátek</a></td></h3>
        <table>
        <tr>
            <td>ESHOP_ID</td>
            <td>PRODUCT_ID</td>
            <td>TITLE</td>
            <td>DESCRIPTION</td>
            <td>COST</td>
            <td>STATE</td>
            <td>STATE</td>
        </tr>
        <tr>
            <td>{{$product['product_id']}}</td>
            <td>{{$product['shop_id']}}</td>
            <td>{{$product['title']}}</td>
            <td>{{$product['description']}}</td>
            <td>{{$product['cost']}}</td>
            <td>{{$product['state_1']}}</td>
            <td>{{$product['state_2']}}</td>
        </tr>
        </table>
    </body>
</html>
