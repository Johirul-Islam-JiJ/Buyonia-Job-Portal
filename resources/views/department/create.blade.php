@extends('layouts.main')
@section('content')
<style>
    .required {
  color: red;
}
</style>
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-6 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Department Form</h1>

                        <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name<span class="required">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary float-right">Create</button>
                                <a href="{{ url('/department') }}" class="btn btn-danger">Back</a>
                            </div>
                            <h6 class="text-center">
                                Note: <strong class="required">*</strong> Marked Fields Are Required
                            </h6>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- END: Content-->

    </div>
@endsection
