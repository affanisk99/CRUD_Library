<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>
<h1>Edit Rak</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="{{route('shelves.update', $shelves->id)}}" method="post">
	@csrf
	Description : <br/><input type="text" name="description" value="{{$shelves->description}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button>
</form>
</body>
</html>