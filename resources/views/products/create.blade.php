<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="{{ route('products.insert') }}" method="POST">
        @csrf
        <input type="text" name="name"><br>
        <input type="number" name="price"><br>
        <input type="submit" value="SAVE">
   </form>
</body>
</html>