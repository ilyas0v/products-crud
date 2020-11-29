<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table cellpadding="10" border="1" style="with:50%;margin:auto;margin-top:50px;">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
        </tr>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <th>{{ $product->price }}</th>
            </tr>
        @endforeach
   </table> 
</body>
</html>