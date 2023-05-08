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
                        <h1 class="text-center">Task Form</h1>

                        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="form-group">
                                <label for="job_id">Job<span class="required">*</span></label>
                                <select class="form-select form-control mb-3" name="job_id" id="job_id"
                                    onchange="validateJob()">
                                    <option selected>Select Job...</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->title }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="job_application_id">Applicant<span class="required">*</span></label>
                                <select class="select2" name="applicant[]" multiple="multiple"
                                    data-placeholder="Select applicant" style="width: 100%;">
                                    @foreach ($applications as $application)
                                        <option value="{{ $application->id }}">{{ $application->name }}</option>
                                    @endforeach
                                </select>
                                @error('applicant')
                                    <div class="text-danger font-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="task_name">Task Name<span class="required">*</span></label>
                                <input class="form-control @error('task_name') is-invalid @enderror" type="text"
                                    name="task_name" id="task_name" value="{{ old('task_name') }}" placeholder="Task Name">
                                @error('task_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="task_details">Task Details<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="task_details" id="task_details" rows="5"
                                    placeholder="Enter Task Details Here">{{ old('task_details') }}</textarea>
                                @error('task_details')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary float-right">Create</button>
                                <a href="{{ url('/tasks') }}" class="btn btn-danger">Back</a>
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
                .create(document.querySelector('#task_details'), {
                    toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Enter Task Details Here',
                    rows: 5,
                    language: 'en'
                })
                .catch(error => {
                    console.error(error);
                });

            function validateJob() {
                var jobSelect = document.getElementById("Job_id");
                if (jobSelect.value === "Select Job...") {
                    alert("Please select a valid Job.");
                    jobSelect.value = "";
                }
            }
        </script>

        <!-- END: Content-->

    </div>
@endsection
