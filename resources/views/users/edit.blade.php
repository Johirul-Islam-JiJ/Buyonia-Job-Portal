@extends('layouts.main')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">

    <div class="row match-height">
        <!-- Medal Card -->

        <div class="col-xl-4 col-md-4 col-12 mx-auto">

            <div class="card">

                <div class="card-body">
                    <h1 class="text-center">Update User</h1>

                    <form action="{{ route('user.update',$edit_user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') ?? $edit_user->name }}" placeholder="Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') ?? $edit_user->email }}" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password') ?? $edit_user->password }}" placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{ url('/user')  }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>


                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- END: Content-->

@endsection
