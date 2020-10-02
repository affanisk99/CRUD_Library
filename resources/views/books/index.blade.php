<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>	
	<h1>Buku</h1>
	<table border="1">
		<a href="/">MENU</a><br/>
		<br/><a href="{{route('books.bin')}}">Bin</a>
		<br/><a href="{{route('books.create')}}">Tambah Buku</a>
	<tr>
		<th>ID</th>
		<th>Code</th>
		<th>Name</th>
		<th>Author</th>
		<th>Category</th>
		<th>Publisher</th>
		<th>Shelves</th>
		<th>Release Date</th>
		<th>Availability</th>
		<th>Opsi</th>
	</tr>
	<tr>
		@foreach($books as $b)
		<td>{{$b->id}}</td>
		<td>{{$b->code}}</td>
		<td>{{$b->name}}</td>
		<td>{{$b->author}}</td>
		<td>{{$b->categories->name}}</td>
		<td>{{$b->publisher->name}}</td>
		<td>{{$b->shelves->description}}</td>
		<td>{{$b->release_date}}</td>
		<td>{{$b->is_available}}</td>
		<td>
			<a href="{{route('books.edit',$b->id)}}">Edit</a>
			<a href="{{route('books.delete',$b->id)}}">Hapus</a>
		</td>
	</tr>
		@endforeach
</body>
</html>