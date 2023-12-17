<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarDetails</title>
</head>
<body>
Car title:{{$car->title}}
    <br>
    Car Description: {{  $car->description }}
    <br>
    Car Price: {{$car->price}}
    <br>
    Car Category: {{$car->category->categoryName}}
</body>
</html>
