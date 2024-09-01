@extends('layouts.backend')
@section('title', 'Leave Type')
@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">User</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">

      <div class="card shadow ">
        <div class="card-header">
          <h4>Leave Type
            <a href="{{url('admin/add/leavetype')}}" class="btn btn-primary btn-sm float-end">Add Leave Type</a>
          </h4>
        </div>
        <div class="card-body table-responsive">
          <table id="mydataTable" class="table table-striped table-bordered " class="display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Leave type</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($leavetype as $item)
          <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->leave_type}}</td>
          <td>{{$item->status == '1' ? 'Approved' : 'Waiting Approval' }}</td>
          <td>
            <a href="{{url('admin/edit/leavetype/' . $item->id)}}" class="btn btn-success">Edit</a>
          </td>
          <td>
            <!--  //first method -->
            <form action="{{url('admin/delete/leavetype/' . $item->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
          </tr>
        @endforeach

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection