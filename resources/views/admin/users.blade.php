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
            <h2>Manage <b>Users</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="#addUser" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
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
            <th>FULL Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Ban</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->phone }}</td>
            <td>
              <input type="checkbox" data-id="{{ $user->id }}" name="status" class="js-switch" {{ $user->status == 1 ? 'checked' : '' }}>
            </td>
            <td>
              <a class="edit" href={{ route("users.edit",$user->id) }}><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
              {!! Form::open(['route' => ['users.destroy',$user->id],'method' => 'DELETE']) !!}
              <input type="submit" class="btn btn-danger" value="Delete">
              {!! Form::close() !!}

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Add Modal HTML -->
    <div id="addUser" class="modal">

      <div class="modal-dialog">
        <div class="modal-content">
          {!! Form::open(['route' => 'users.store','method' => 'post']) !!}
          <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Full Name</label>
              <input name="name" type="text" class="form-control" required>
            </div>
            <div class="form-group">
              <label>username</label>
              <input name="username" type="text" class="form-control" required>
              @error('username')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" type="email" class="form-control" required>
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control" required>
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea name="address" class="form-control" required></textarea>
              @error('address')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input name="phone" type="text" class="form-control" required>
              @error('phone')
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
    $('#addUser').modal('show');
  });
</script>
@endif

<script type="text/javascript">
  $(document).ready(function() {
    // Activate tooltip
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

    $(document).ready(function(){
      $('.js-switch').change(function () {
          let status = $(this).prop('checked') === true ? 1 : 0;
          let userId = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route('users.ban') }}',
              data: {'status': status, 'user_id': userId},
              success: function (data) {
                  console.log(data.message);
              }
          });
      });
  });
</script>
@endsection