<html>
    <head>
        <title>Products Summary</title>

    </head>
    <style>
        *{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13pt;
        }

        h1{
            font-size: 22pt;

        }

        table{
            border-collapse: collapse;

        }
        table th, table td{
            padding:2px;
            border: 1px solid #333;
        }

    </style>

    <body>
        <div style="text-align:center; padding-bottom:12pt; border-bottom: 1px solid #333">
            <strong>S-Mall Sari Sari Store</strong> <br>
            {{-- <img src="{{public_path('images/mdc-logo.jpg')}}" style="height: 100px; justify-center" alt="MDC Bank, Inc."><br> --}}
            #456 Skina Japan Ave., Instagram Block <br>
            Tel. No.: 456-123-900, 145-234-890
        </div>

        <h1 style="padding-bottom: 10pt; border-bottom: 1px solid #333">Product List</h1>

        <table>
            @foreach ($products as $product )
                <tr>
                    <th>Name</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$product->description}}</td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td>{{$product->qty}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <th>Supplier</th>
                    <td>{{$product->supplier->name}}</td>
                </tr>
                <br>
            @endforeach
        </table>

        <hr>


    </body>
</html>
