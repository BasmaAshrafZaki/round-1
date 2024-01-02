<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__ ('CarForm.AddCar')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div>
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
        </div>
    <h2>{{__ ('CarForm.AddCar')}}</h2>
    <form action="{{route('car-added')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{__ ('CarForm.title')}}</label>
            <input type="text" class="form-control" id="title" placeholder="{{__ ('CarForm.titleplaceholder')}}" name="title" value="{{ 
old('title') }}" >
            @error('title')
           {{ $message }}
              @enderror
        
        </div>
        <div class="form-group">
            <label for="price">{{__ ('CarForm.price')}}</label>
            <input type="number" class="form-control" id="price" placeholder="{{__ ('CarForm.priceplaceholder')}}" name="price"value="{{ 
old('price') }}" >
            @error('price')
           {{ $message }}
              @enderror
        
        </div>
        <div class="form-group">
            <label for="description">{{__ ('CarForm.description')}}</label>
            <textarea class="form-control" rows="5" id="description" placeholder= "" name="description" >{{ 
old('description') }} {{__ ('CarForm.descriptionplaceholder')}}</textarea>
           
            @error('description')
           {{ $message }}
              @enderror
              <div class="form-group">
            <label for="image">{{__ ('CarForm.image')}}</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="shortDescription">{{__ ('CarForm.shortDescription')}}</label>
            <select name="category_id" id="">
                <option value="">{{__ ('CarForm.SelectCategory')}}</option>
                @foreach($categories as $category)
                <option value ="{{ $category->id }}" >{{ $category->categoryName }}</option>
                @endforeach
</select>
        </div>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="published"> {{__ ('CarForm.published')}}</label>
        </div>
        <button type="submit" class="btn btn-default"> {{__ ('CarForm.Add')}}</button>
    </form>
</div>

</body>
</html>
