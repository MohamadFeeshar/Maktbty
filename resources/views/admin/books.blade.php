@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')
@push('table-styles')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush

<body>
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Manage <b>Books</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="#addBook" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Book</span></a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>
              <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
                <label for="selectAll"></label>
              </span>
            </th>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            <th>Category</th>
            <th>Price</th>
            <th>Copies</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($books as $book)
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>
              <img src="{{ URL::to('/images') }}/{{$book->pic}}" alt="No image" height="80" width="60"></td>
            <td>{{ $book->category->name }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->no_copies }}</td>
            <td>
              <a class="edit" href={{ route("books.edit",$book->id) }}><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
              {!! Form::open(['route' => ['books.destroy',$book->id],'method' => 'DELETE']) !!}
              <input type="submit" class="btn btn-danger" value="Delete">
              {!! Form::close() !!}

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Add Modal HTML -->
    <div id="addBook" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          {!! Form::open(['route' => 'books.store','method' => 'post', 'enctype' => "multipart/form-data"]) !!}
          <div class="modal-header">
            <h4 class="modal-title">Add Book</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Title</label>
              <input name="title" type="text" class="form-control" required>
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Author</label>
              <input name="author" type="text" class="form-control" required>
              @error('author')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div>
              <label>Cover Image</label>
              <input name="image" type="file" class="form-control">
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Category</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Price</label>
              <input name="price" type="text" class="form-control" required>
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Copies</label>
              <input name="no_copies" type="text" class="form-control" required>
              @error('no_copies')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Add">
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</body>

</html>
@endsection




@section('scripts')

@if (count($errors) > 0)
<script>
  $(document).ready(function() {
    $('#addBook').modal('show');
  });
</script>
@endif

<script type="text/javascript">
  $(document).ready(function() {
    // Activate modal
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
      if (this.checked) {
        checkbox.each(function() {
          this.checked = true;
        });
      } else {
        checkbox.each(function() {
          this.checked = false;
        });
      }
    });
    checkbox.click(function() {
      if (!this.checked) {
        $("#selectAll").prop("checked", false);
      }
    });
  });
</script>
@endsection