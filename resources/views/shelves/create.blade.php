<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>
<h1>Tambah Rak</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="{{route('shelves.store')}}" method="post">
	@csrf
  Code : <br/><input type="text" name="code" value="{{$shelves}}" readonly=""><br/>
	Description : <br/><input type="text" name="description" value="{{old('description')}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button>
</form>
</body>
</html>