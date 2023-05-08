@extends('layouts.main')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">

    <div class="row match-height">
        <!-- Medal Card -->

        <div class="col-xl-4 col-md-4 col-12 mx-auto">

            <div class="card">

                <div class="card-body">
                    <h1 class="text-center">Create permission</h1>

            <form action="{{ route('permission.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>
                <div>
                    <a href="{{ url('/permission')  }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>


            </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- END: Content-->

@endsection
