<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>
	<a href="/books">Back</a><br/>
<h1>Edit Book </h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="{{route('books.update',$books->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	name : <br/><input type="text" name="name" value="{{$books->name}}" ><br/>
  	author : <br/><input type="text" name="author" value="{{$books->author}}"><br/>
	release date : <br/><input type="date" name="release_date" value="{{$books->release_date}}"><br/>
	description : <br/><input type="text" name="description" value="{{$books->description}}"><br/>
	category : <br/>
	<select name="category_id">
		<option value="">..</option>
		@forelse($categories as $cat)
		<option value="{{$cat->id}}" @if ($books->category_id == $cat->id) selected @endif>{{$cat->name}}</option>
		@empty
		@endforelse
	</select><br/>
	publisher : <br/>
	<select name="publisher_id">
		<option value="">..</option>
		@forelse($publisher as $pub)
		<option value="{{$pub->id}}" @if ($books->publisher_id == $pub->id) selected @endif>{{$pub->name}}</option>
		@empty
		@endforelse
	</select><br/>
	shelves : <br/>
	<select name="shelves_id">
		<option value="">..</option>
		@forelse($shelves as $shv)
		<option value="{{$shv->id}}" @if ($books->shelves_id == $shv->id) selected @endif>{{$shv->code}}</option>
		@empty
		@endforelse
	</select><br/>
	availability : <br/><select name="is_available">
						<option value="#">...</option>
						<option value="yes">Available</option>
						<option value="no">Not Available</option><br/>
						</select><br/>
<br/><button type="submit" value="submit">submit</button>	
</form>
</body>
</html>