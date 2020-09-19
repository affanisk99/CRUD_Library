<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>
<h1>Tambah Kategori</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="{{route('categories.store')}}" method="post">
	@csrf
	Nama Kategori : <br/><input type="text" name="name" value="{{old('name')}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button>
</form>
</body>
</html>