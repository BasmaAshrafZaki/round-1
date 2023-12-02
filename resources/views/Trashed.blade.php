<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h2>News Details</h2>
<table class="table table-hover">
<thead>
<tr>
<th>Title</th>
<th >Content</th>
<th>Author</th>
<th>Published</th>
<th>Edit</th>
<th>Show</th>
<th>delete</th>
<th>Newsrestore</th>

</tr>
</thead>
<tbody>
@foreach ($News as $News)
<tr>
<td>{{$News->newsTitle}}</td>
<td>{{$News->newsContent }}</td>
<td>{{$News->newsAuthor}}</td>
@if( $News->newsPublished === 1)
<td > Yes ✅</td>
@else
<td > No ❌ </td>
@endif
<td><a href="edit-News/{{$News->id}}">Edit</a></td>
<td><a href="NewsDetails/{{$News->id}}">Show</a></td>
<td><a href="forceDel/{{$News->id}}">deleteNews</a></td>
<td><a href="Newsrestore/{{$News->id}}">restore</a></td>


</tr>
@endforeach
</tbody>
</table>
</div>
</body>
</html>