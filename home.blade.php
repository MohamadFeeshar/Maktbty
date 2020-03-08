@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a> -->
        <a href="#" class="list-group-item list-group-item-action bg-light">Ads</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Music</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Kids</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Business</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Computers</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
   
    <!-- /#page-content-wrapper -->

  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
