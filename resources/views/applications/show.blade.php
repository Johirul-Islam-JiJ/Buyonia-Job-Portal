@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-12 col-md-6 col-12 mx-auto">
                <div class="card">

                    <div class="card-body">
                        <a href="{{ url('/applications') }}" class="btn btn-danger">Back</a>
                        <h1 class="text-center">View Job Details</h1>
                        <div class="table-responsive">
                            <table class="table text-left" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" colspan="6">
                                            <h5>Applicant Details</h5>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>Contact Info</th>
                                        <td>
                                            <img src="{{ route('applications.image', $jobApplication) }}" width="100px"
                                                height="auto" alt="cover">
                                        </td>
                                        <td>
                                            <strong>Name:</strong> <br>
                                            {{ $jobApplication->name }}
                                        </td>
                                        <td>
                                            <strong>Email:</strong>
                                            {{ $jobApplication->email }} <br> <br>
                                            <strong>Phone: </strong>
                                            {{ $jobApplication->phone }}

                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                           <strong>Permanent: </strong> <br> {{ $jobApplication->address }}
                                        </td>
                                        <td>
                                          <strong>Present: </strong> <br> {{ $jobApplication->present_address }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Education Level</th>
                                        <td>
                                            {{ $jobApplication->education_level }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Salary</th>
                                        <td>
                                            <strong>Expected: </strong> <br>
                                            {{ $jobApplication->expected_salary }}
                                        </td>
                                        <td>
                                            <strong>Current: </strong> <br>
                                            {{ $jobApplication->current_salary }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Profiles</th>
                                        <td>
                                            <strong>Portfolio: </strong> <br>
                                            {{ $jobApplication->portfolio }}
                                        </td>
                                        <td>
                                            <i data-feather="github"></i> <strong>Github: </strong> <br>
                                            {{ $jobApplication->github }}
                                        </td>
                                        <td>
                                            <i data-feather="linkedin"></i> <strong>Linkedin: </strong> <br>
                                            {{ $jobApplication->linkdin }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Documents</th>
                                        <td>
                                            <strong>Cover Letter: </strong> <br>
                                            <a href="{{ route('applications.coverLetter', $jobApplication) }}"
                                                target="_blank">
                                                <button class="btn btn-light">
                                                    <i class="fa fa-eye" aria-hidden="true">View</i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <strong>Resume: </strong> <br>
                                            <a href="{{ route('applications.resume', $jobApplication) }}" target="_blank">
                                                <button class="btn btn-light">
                                                    <i class="fa fa-eye" aria-hidden="true">View</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Others</th>
                                        <td>
                                            <strong>Notes(If Any): </strong> <br>
                                            {{ $jobApplication->notes }}
                                        </td>
                                        <td>
                                            <strong>Available From: </strong> <br>
                                            {{ $jobApplication->available_joining }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="6">
                                            <h5>Company Details</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Name</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Phone</th>
                                        <th>Website</th>
                                        <th>Address</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $job->title }}
                                        </td>
                                        <td>{{ $job->company_name }}</td>
                                        {{-- <td>{{ $job->company_email }}</td> --}}
                                        <td>{{ $job->company_phone }}</td>
                                        <td>{{ $job->company_website }}</td>
                                        <td>{{ $job->company_address }}</td>
                                    </tr>

                                </thead>
                            </table>

                        </div>


                    </div>

                </div>

                {{-- {{ $job->links() }} --}}

            </div>


        </div>

    </div>

    <!-- END: Content-->
@endsection
