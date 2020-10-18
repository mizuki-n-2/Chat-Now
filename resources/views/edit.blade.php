@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="container py-2">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header bg-dark text-white title">Profile Edit</div>
        <div class="card-body">
          <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">User Name <span class="text-danger">※required</span></label>
              <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Profile Image</label>
              <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Profile</label>
              <textarea class="form-control" name="profile" id="exampleFormControlTextarea1" rows="3">{{ $user->profile }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection