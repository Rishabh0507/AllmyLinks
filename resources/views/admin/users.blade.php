@extends('admin.adminLayout')
@section('admin')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark" style="text-decoration: underline;"><b>Users</b></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            @if (session()->has('message'))
            <div class="alert alert-{{ session()->get('type') }} alert-dismissable">
                {{ session()->get('message') }}
            </div>
          @endif 
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mail Varified</th>
                    <th>Access</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($userList as $users)
                    <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>
                      @if($users->is_email_verified == 1)
                        <span class="badge badge-primary">Yes! Varified</span>
                      @else
                      <span class="badge badge-danger">No ! Not Varified</span>
                      @endif
                    </td>
                      <td>
                        @if($users->is_access_allowed == 1)
                          <span class="badge badge-success">Allowed</span>
                        @else
                          <span class="badge badge-danger">Not Allowed</span>
                        @endif
                      </td>
                      <td>
                      <button class="btn btn-danger" data-toggle="modal" id="userAccessEdit" data-target="#exampleModalCenter"
                      data-id="{{$users->id}}" data-name="{{$users->name}}" data-access="{{$users->is_access_allowed}}">Access</button>
                      </td>
                    </tr>   
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mail Varified</th>
                    <th>Access</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('change-user-access')}}" method="POST">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="userId" id="userId" class="form-control userId">
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="userName" id="userName" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Access</label>
            <select name="userAccess" id="userAccess" class="form-control">
              <option value="1">Allowed</option>
              <option value="0">Not Allowed</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection