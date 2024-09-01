@extends('layouts.backend')
@section('title', 'Add Leave Type')
@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">User</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">

            <div class="card shadow">
                <div class="card-header">
                    <h4>Add Leave Type
                        <a href="{{url('admin/leavetype')}}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{url('admin/add/leavetype')}}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Leave Type</label>
                            <input type="text" name="leave_type" class="form-control" value="{{ old('leave_type') }}">
                        </div>

                        <!-- <div class="col-md-3 mb-3">
                    <label for="">Approve</label> // No need of approval while creating Leavetype
                    <input type="checkbox" name="status" value="{{ old('status') }}">
                </div> -->

                        <div class="form-group col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection