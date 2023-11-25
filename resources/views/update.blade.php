<!DOCTYPE html>
<html lang="en">
<head>
    <title>update News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>update News</h2>
    <form action="{{route('update-News',$News->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" value="{{$News->newsTitle}}" placeholder="Enter title" name="newsTitle">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" id="content" name="newsContent">{{$News->newsContent }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author"value="{{$News->newsAuthor}}" placeholder="Enter Author" name="newsAuthor">
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="newsPublished"@checked($News->newsPublished)>Published</label>
        </div>
        <button type="submit" class="btn btn-default">update</button>
    </form>
</div>

</body>
</html>
