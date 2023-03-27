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

                        <form action="{{ route('jobs.update', $job) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">

                                <label for="department_id">Department<span class="required">*</span></label>
                                <select class="form-select form-control mb-3" name="department_id" id="department_id"
                                    onchange="validateDepartment()">
                                    <option selected>{{ $job->department->name }}</option>
                                    @foreach ($department as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    name="title" id="title" value="{{ old('title') ?? $job->title }}"
                                    placeholder="Enter Title Here">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                    rows="5" placeholder="Enter Description Here">{{ old('description') ?? $job->description }}</textarea>

                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="salary">Job Salary</label>
                                <input class="form-control @error('salary') is-invalid @enderror" type="number"
                                    name="salary" id="salary" value="{{ old('salary') ?? $job->salary }}"
                                    placeholder="Enter Salary Here">
                                @error('salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="location">Job Location</label>
                                <input class="form-control @error('location') is-invalid @enderror" type="text"
                                    name="location" id="location" value="{{ old('location') ?? $job->location }}"
                                    placeholder="Enter Location Here">
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type">Job Type</label>
                                        <input class="form-control @error('type') is-invalid @enderror" type="text"
                                            name="type" id="type" value="{{ old('type') ?? $job->type }}"
                                            placeholder="Enter Job Type">
                                        @error('type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="experience">Job Experience</label>
                                        <input class="form-control @error('experience') is-invalid @enderror" type="text"
                                            name="experience" id="experience"
                                            value="{{ old('experience') ?? $job->experience }}"
                                            placeholder="Enter Job Experience">
                                        @error('experience')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="application_deadline">Deadline</label>
                                        <input class="form-control @error('application_deadline') is-invalid @enderror"
                                            type="date" name="application_deadline" id="application_deadline"
                                            value="{{ old('application_deadline') ?? $job->application_deadline }}">
                                        @error('application_deadline')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qualification">Job Qualification</label>
                                        <input class="form-control @error('qualification') is-invalid @enderror"
                                            type="text" name="qualification" id="qualification"
                                            value="{{ old('qualification') ?? $job->qualification }}"
                                            placeholder="Enter Job Qualification">
                                        @error('qualification')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="application_link">Application Link</label>
                                        <input class="form-control @error('application_link') is-invalid @enderror"
                                            type="text" name="application_link" id="application_link"
                                            value="{{ old('application_link') ?? $job->application_link }}"
                                            placeholder="Enter Application Link">
                                        @error('application_link')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="how_to_apply">How To Apply</label>

                                <textarea class="form-control @error('how_to_apply') is-invalid @enderror" name="how_to_apply" id="how_to_apply"
                                    rows="5" placeholder="Enter Description Here">{{ old('how_to_apply') ?? $job->how_to_apply }}</textarea>
                                @error('how_to_apply')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="job_category">Job Category</label>
                                        <input class="form-control @error('job_category') is-invalid @enderror"
                                            type="text" name="job_category" id="job_category"
                                            value="{{ old('job_category') ?? $job->job_category }}"
                                            placeholder="Job Category">
                                        @error('job_category')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="job_level">Job Level</label>
                                        <input class="form-control @error('job_level') is-invalid @enderror"
                                            type="text" name="job_level" id="job_level"
                                            value="{{ old('job_level') ?? $job->job_level }}" placeholder="Job Level">
                                        @error('job_level')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="job_nature">Job Nature</label>
                                        <input class="form-control @error('job_nature') is-invalid @enderror"
                                            type="text" name="job_nature" id="job_nature"
                                            value="{{ old('job_nature') ?? $job->job_nature }}" placeholder="Job Nature">
                                        @error('job_nature')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="employment_status">Employment Status</label>
                                        <input class="form-control @error('employment_status') is-invalid @enderror"
                                            type="text" name="employment_status" id="employment_status"
                                            value="{{ old('employment_status') ?? $job->employment_status }}"
                                            placeholder="Employment Status">
                                        @error('employment_status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input class="form-control @error('company_name') is-invalid @enderror"
                                            type="text" name="company_name" id="company_name"
                                            value="{{ old('company_name') ?? $job->company_name }}"
                                            placeholder="Company Name">
                                        @error('company_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_website">Company Website</label>
                                        <input class="form-control @error('company_website') is-invalid @enderror"
                                            type="text" name="company_website" id="company_website"
                                            value="{{ old('company_website') ?? $job->company_website }}"
                                            placeholder="Company Website">
                                        @error('company_website')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_email">Company Email</label>
                                        <input class="form-control @error('company_email') is-invalid @enderror"
                                            type="email" name="company_email" id="company_email"
                                            value="{{ old('company_email') ?? $job->company_email }}"
                                            placeholder="Company Email">
                                        @error('company_email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_phone">Company Phone</label>
                                        <input class="form-control @error('company_phone') is-invalid @enderror"
                                            type="text" name="company_phone" id="company_phone"
                                            value="{{ old('company_phone') ?? $job->company_phone }}"
                                            placeholder="Company Phone">
                                        @error('company_phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_address">Company Address</label>
                                <input class="form-control @error('company_address') is-invalid @enderror" type="text"
                                    name="company_address" id="company_address"
                                    value="{{ old('company_address') ?? $job->company_address }}"
                                    placeholder="Company Address">
                                @error('company_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                <a href="{{ url('/jobs') }}" class="btn btn-danger">Back</a>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>

        <script>
            ClassicEditor
                .create(document.querySelector('#description'), {
                    toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Enter Description Here',
                    rows: 5,
                    language: 'en'
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#how_to_apply'), {
                    toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Enter Description Here',
                    rows: 5,
                    language: 'en'
                })

                .catch(error => {
                    console.error(error);
                });
        </script>


        <!-- END: Content-->

    </div>
@endsection
