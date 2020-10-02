<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>
<h1>Tambah Buku</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<a href="{{route('books.index')}}">Back</a>
<form action="{{route('books.store')}}" method="post">
	@csrf
	name : <br/><input type="text" name="name" value="{{old('name')}}" ><br/>
  author : <br/><input type="text" name="author" value="{{old('author')}}"><br/>
  release date : <br/><input type="date" name="release_date" value="{{old('release_date')}}"><br/>
  description : <br/><input type="text" name="description" value="{{old('description')}}"><br/>
  category  : <br/>
          <select name="category_id">
          <option value=""> ... </option>
          @forelse($categories as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
          @empty
          @endforelse
          </select>
          </select>
         <br/>
  publisher  : <br/>
          <select name="publisher_id">
          <option value=""> ... </option>
          @forelse($publisher as $pub)
          <option value="{{$pub->id}}">{{$pub->name}}</option>
          @empty
          @endforelse
          </select>
          <br/> 
  shelves  : <br/>
          <select name="shelves_id">
          <option value=""> ... </option>
          @forelse($shelves as $shv)
          <option value="{{$shv->id}}">{{$shv->code}}</option>
          @empty
          @endforelse
          </select>
         <br/> 
  <!--  -->
  availability : <br/><select name="is_available">
            <option value="#"> ... </option>
            <option value="yes">Available</option>
            <option value="no">Not Available</option>
          </select><br/>
	<br/><button type="submit" value="submit">SUBMIT</button>
</form>
</body>
</html>