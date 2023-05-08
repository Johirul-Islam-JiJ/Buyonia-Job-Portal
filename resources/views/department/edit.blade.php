@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-7 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Edit Job</h1>

                        <form action="{{ route('department.update',$department) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" value="{{ old('name') ?? $department->name }}"
                                    placeholder="Enter Name Here">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                <a href="{{ url('/department') }}" class="btn btn-danger">Back</a>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>


        <!-- END: Content-->

    </div>
@endsection
