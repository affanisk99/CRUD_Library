<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>	
	<h1>Penerbit Buku</h1>
	<table border="1">
		<a href="/">MENU</a><br/>
		<br/><a href="{{route('publisher.create')}}">Tambah Publisher</a>
	<tr>
		<th>Nama Penerbit</th>
		<th>Pilihan</th>
	</tr>
	<tr>
		@foreach($publisher as $pub)
		<td>{{$pub->name}}</td>
		<td>
			<a href="{{route('publisher.edit', $pub->id)}}">Edit</a>
			<a href="{{route('publisher.destroy', $pub->id)}}">Hapus</a>
		</td>
	</tr>
	@endforeach
</body>
</html>