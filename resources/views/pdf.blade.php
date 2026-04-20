<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order</title>
    <style>
        /* Styles CSS pour le ticket */

.ticket {
    font-family: Arial, sans-serif;
    width: 650px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
}

h1 {
    font-size: 18px;
    text-align: center;
    margin-bottom: 20px;
}

p {
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 5px;
    border-bottom: 1px solid #ccc;
}

th {
    text-align: left;
    font-weight: bold;
}

tfoot td {
    border-top: 1px solid #ccc;
    font-weight: bold;
}

.total {
    margin-top: 10px;
    text-align: right;
    font-weight: bold;
}

/* Ajoutez d'autres styles personnalisés selon vos besoins */

    </style>
</head>
<body>
    <div class="ticket">
        <h1>Your Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Product</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Cart::content() as $item )
                    <tr>
                        <td>x {{$item->qty}}</td>
                        <td>
                            <h5>{{$item->model->name}}</h5>
                        </td>
                        <td>${{$item->subtotal}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th colspan="2">SubTotal</th>
                    <td colspan="2">${{Cart::subtotal()}}</td>
                </tr>
                <tr>
                    <th colspan="2"> Tax</th>
                    <td>${{Cart::tax()}}</td>
                </tr>
                <tr>
                    <th  colspan="2">Total</th>
                    <td><span class="font-xl text-brand fw-900">${{Cart::total()}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
