@extends('layouts.main')
@section('content')
    <style>
        .required {
            color: red;
        }

        .ck-editor__editable {
            height: 7em;
            /* Set the height to show 5 rows of text */
        }
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-7 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Create Job</h1>

                        <form action="{{ route('jobs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="department_id">Department<span class="required">*</span></label>
                                <select class="form-select form-control mb-3" name="department_id" id="department_id"
                                    onchange="validateDepartment()">
                                    <option selected>Select Department...</option>
                                    @foreach ($department as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="designation">Job Designation<span class="required">*</span></label>
                                <input class="form-control @error('designation') is-invalid @enderror" type="text"
                                    name="designation" id="designation" value="{{ old('designation') }}"
                                    placeholder="Enter Job Designation Here">
                                @error('designation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Job Title<span class="required">*</span></label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    name="title" id="title" value="{{ old('title') }}"
                                    placeholder="Enter Title Here">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Job Description<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="description" id="description" rows="5"
                                    placeholder="Enter Description Here">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="salary">Job Salary</label>
                                <input class="form-control @error('salary') is-invalid @enderror" type="number"
                                    name="salary" id="salary" value="{{ old('salary') }}"
                                    placeholder="Enter Salary Here">
                                @error('salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="location">Job Location<span class="required">*</span></label>
                                <input class="form-control @error('location') is-invalid @enderror" type="text"
                                    name="location" id="location" value="{{ old('location') }}"
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
                                            name="type" id="type" value="{{ old('type') }}"
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
                                            name="experience" id="experience" value="{{ old('experience') }}"
                                            placeholder="Enter Job Experience">
                                        @error('experience')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="application_deadline">Deadline<span class="required">*</span></label>
                                        <input class="form-control @error('application_deadline') is-invalid @enderror"
                                            type="date" name="application_deadline" id="application_deadline"
                                            value="{{ old('application_deadline') }}">
                                        @error('application_deadline')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qualification">Job Qualification<span class="required">*</span></label>
                                        <input class="form-control @error('qualification') is-invalid @enderror"
                                            type="text" name="qualification" id="qualification"
                                            value="{{ old('qualification') }}" placeholder="Enter Job Qualification">
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
                                            value="{{ old('application_link') }}" placeholder="Enter Application Link">
                                        @error('application_link')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="how_to_apply">How To Apply</label>
                                <textarea class="form-control resizable" name="how_to_apply" id="how_to_apply" rows="5"
                                    placeholder="Enter Instruction">{{ old('how_to_apply') }}</textarea>
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
                                            value="{{ old('job_category') }}" placeholder="Job Category">
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
                                            value="{{ old('job_level') }}" placeholder="Job Level">
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
                                            value="{{ old('job_nature') }}" placeholder="Job Nature">
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
                                            value="{{ old('employment_status') }}" placeholder="Employment Status">
                                        @error('employment_status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="working_hours">Working Hours</label>
                                        <input class="form-control @error('working_hours') is-invalid @enderror"
                                            type="text" name="working_hours" id="working_hours"
                                            value="{{ old('working_hours') }}" placeholder="Working Hours">
                                        @error('working_hours')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Weekend">Weekend</label>
                                        <input class="form-control @error('Weekend') is-invalid @enderror" type="text"
                                            name="Weekend" id="Weekend" value="{{ old('Weekend') }}"
                                            placeholder="Weekend">
                                        @error('Weekend')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="vacancy">Vacancy</label>
                                        <input class="form-control @error('vacancy') is-invalid @enderror" type="text"
                                            name="vacancy" id="vacancy" value="{{ old('vacancy') }}"
                                            placeholder="Vacancy">
                                        @error('vacancy')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_name">Company Name<span class="required">*</span></label>
                                        <input class="form-control @error('company_name') is-invalid @enderror"
                                            type="text" name="company_name" id="company_name"
                                            value="{{ old('company_name') }}" placeholder="Company Name">
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
                                            value="{{ old('company_website') }}" placeholder="Company Website">
                                        @error('company_website')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_email">Company Email<span class="required">*</span></label>
                                        <input class="form-control @error('company_email') is-invalid @enderror"
                                            type="email" name="company_email" id="company_email"
                                            value="{{ old('company_email') }}" placeholder="Company Email">
                                        @error('company_email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_phone">Company Phone<span class="required">*</span></label>
                                        <input class="form-control @error('company_phone') is-invalid @enderror"
                                            type="text" name="company_phone" id="company_phone"
                                            value="{{ old('company_phone') }}" placeholder="Company Phone">
                                        @error('company_phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_address">Company Address<span class="required">*</span></label>
                                <input class="form-control @error('company_address') is-invalid @enderror" type="text"
                                    name="company_address" id="company_address" value="{{ old('company_address') }}"
                                    placeholder="Company Address">
                                @error('company_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>

                                <button type="submit" class="btn btn-success float-right">Create</button>
                                <a href="{{ url('/jobs') }}" class="btn btn-danger">Back</a>

                                <div style="text-align: center;">
                                    <button class="btn btn-primary mb-2" onclick="callvalue()">Preview</button>
                                </div>
                            </div>

                            <h6 class="text-center">
                                Note: <strong class="required">*</strong> Marked Fields Are Required
                            </h6>
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

            function callvalue() {
                var title = document.getElementById("title").value;
                var description = document.getElementById("description").value;
                var salary = document.getElementById("salary").value;
                var location = document.getElementById("location").value;
                var type = document.getElementById("type").value;
                var qualification = document.getElementById("qualification").value;
                var experience = document.getElementById("experience").value;
                var application_deadline = document.getElementById("application_deadline").value;
                var application_link = document.getElementById("application_link").value;
                var how_to_apply = document.getElementById("how_to_apply").value;
                var job_category = document.getElementById("job_category").value;
                var job_level = document.getElementById("job_level").value;
                var job_nature = document.getElementById("job_nature").value;
                var employment_status = document.getElementById("employment_status").value;
                var company_name = document.getElementById("company_name").value;
                var company_website = document.getElementById("company_website").value;
                var company_email = document.getElementById("company_email").value;
                var company_phone = document.getElementById("company_phone").value;
                var company_address = document.getElementById("company_address").value;

                document.writeln("Job Title: " + title);
                document.writeln("Description: " + description);
                document.writeln("Salary: " + salary);
                document.writeln("Location: " + location);
                document.writeln("Type: " + type);
                document.writeln("Qualification: " + qualification);
                document.writeln("Experience: " + experience);
                document.writeln("Application Deadline: " + application_deadline);
                document.writeln("Application Link: " + application_link);
                document.writeln("How to apply: " + how_to_apply);
                document.writeln("Job Category: " + job_category);
                document.writeln("Job Level: " + job_level);
                document.writeln("Job Nature: " + job_nature);
                document.writeln("Employment Status: " + employment_status);
                document.writeln("Company Name: " + company_name);
                document.writeln("Company Website: " + company_website);
                document.writeln("Company Email: " + company_email);
                document.writeln("Company Phone: " + company_phone);
                document.writeln("Company Address: " + company_address);
            }

            function validateDepartment() {
                var departmentSelect = document.getElementById("department_id");
                if (departmentSelect.value === "Select Division...") {
                    alert("Please select a valid department.");
                    departmentSelect.value = "";
                }
            }
        </script>
        <!-- END: Content-->
    </div>
@endsection
