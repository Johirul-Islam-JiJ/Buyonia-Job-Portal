@extends('layouts.main')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">

    <div class="row match-height">
        <!-- Medal Card -->

        <div class="col-xl-4 col-md-4 col-12 mx-auto">

            <div class="card">

                <div class="card-body">
                    <h1 class="text-center">Create User</h1>

            <form action="{{ route('user.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>
                <div class="form-group">
                    <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>

                <div>
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                    <a href="{{ url('/user')  }}" class="btn btn-danger">Back</a>
                </div>


            </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- END: Content-->

@endsection
