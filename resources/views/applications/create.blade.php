@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-7 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Job Application Form</h1>

                        <form action="{{ route('applications.store', $job) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="expected_salary">Expected Salary</label>
                                        <input class="form-control @error('expected_salary') is-invalid @enderror"
                                            type="number" name="expected_salary" id="expected_salary"
                                            value="{{ old('expected_salary') }}" placeholder="Enter Expected Salary">
                                        @error('expected_salary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="portfolio">Portfolio</label>
                                        <input class="form-control @error('portfolio') is-invalid @enderror" type="text"
                                            name="portfolio" id="portfolio" value="{{ old('portfolio') }}"
                                            placeholder="Portfolio">
                                        @error('portfolio')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    name="address" id="address" value="{{ old('address') }}" placeholder="Address">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            name="image" id="image" value="{{ old('image') }}">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="cover_letter">Cover Letter</label>
                                        <input class="form-control @error('cover_letter') is-invalid @enderror"
                                            type="file" name="cover_letter" id="cover_letter"
                                            value="{{ old('cover_letter') }}">

                                        @error('cover_letter')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="resume">Resume</label>
                                        <input class="form-control @error('resume') is-invalid @enderror" type="file"
                                            name="resume" id="resume" value="{{ old('resume') }}">
                                        @error('resume')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="notes">Notes</label>

                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="notes" rows="3"
                                    placeholder="Enter Description Here">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary float-right">Create</button>
                                <a href="{{ url('/applications') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- END: Content-->

    </div>
@endsection
