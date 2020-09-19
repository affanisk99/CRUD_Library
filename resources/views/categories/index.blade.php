<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>	
	<h1>Kategori Buku</h1>
	<table border="1">
		<a href="/">MENU</a><br/>
		<br/><a href="{{route('categories.create')}}">Tambah Kategori</a>
	<tr>
		<th>Nama Kategori</th>
		<th>Pilihan</th>
	</tr>
	<tr>
		@foreach($categories as $cat)
		<td>{{$cat->name}}</td>
		<td>
			<a href="{{route('categories.edit', $cat->id)}}">Edit</a>
			<a href="{{route('categories.destroy', $cat->id)}}">Hapus</a>
		</td>
	</tr>
	@endforeach
</body>
</html>