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
            <h2>Manage <b>Admins</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a>
          </div>
        </div>
      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
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
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($admins as $admin)
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->username }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->address }}</td>
            <td>{{ $admin->phone }}</td>
            <td>
              <a class="edit" href={{ route("admins.edit",$admin->id) }} ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
              {!! Form::open(['route' => ['admins.destroy',$admin->id],'method' => 'DELETE']) !!}
              <input type="submit" class="btn btn-danger" value="Delete">
              {!! Form::close() !!}

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          {!! Form::open(['route' => 'admins.store','method' => 'post']) !!}
          <div class="modal-header">
            <h4 class="modal-title">Add Admin</h4>
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
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="text" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input name="phone" type="text" class="form-control" required>
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
</script>
@endsection