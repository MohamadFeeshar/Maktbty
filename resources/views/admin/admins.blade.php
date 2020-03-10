@extends('layouts.master')

@section('title')
 Dashboard
@endsection


@section('content')
    
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Admins Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Admin
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Any
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                
              </div>
              
            </div>
          </div>
        </div>

@endsection




@section('scripts')

@endsection