<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>	
	<h1>BIN heRak Buku</h1>
	<table border="1">
		<a href="/">MENU</a><br/>
		<br/><a href="{{route('shelves.index')}}">Kembali</a>
	<tr>
		<th>ID</th>
		<th>Code</th>
		<th>Description</th>
		<th>Opsi</th>
	</tr>
	<tr>
		@foreach($shelves as $shv)
		<td>{{$shv->id}}</td>
		<td>{{$shv->code}}</td>
		<td>{{$shv->description}}</td>
		<td>
			<a href="{{route('shelves.rollback', $shv->id)}}">Rollback</a>
			<a href="{{route('shelves.destroy', $shv->id)}}">Delete Permanent</a>
		</td>
	</tr>
	@endforeach
</body>
</html>