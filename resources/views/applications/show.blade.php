@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-10 col-md-6 col-12 mx-auto">
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
                                        <th>Image</th>
                                        <td>
                                            <img src="{{ route('applications.image', $jobApplication) }}" width="100px"
                                                height="auto" alt="cover">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            {{ $jobApplication->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            {{ $jobApplication->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>
                                            {{ $jobApplication->phone }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            {{ $jobApplication->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Portfolio</th>
                                        <td>
                                            {{ $jobApplication->portfolio }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cover Letter</th>
                                        <td>
                                            <a href="{{ route('applications.coverLetter', $jobApplication) }}"
                                                target="_blank">
                                                <button class="btn btn-light">
                                                    <i class="fa fa-eye" aria-hidden="true">View</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Resume</th>
                                        <td>
                                            <a href="{{ route('applications.resume', $jobApplication) }}" target="_blank">
                                                <button class="btn btn-light">
                                                    <i class="fa fa-eye" aria-hidden="true">View</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Expected Salary</th>
                                        <td>
                                            {{ $jobApplication->expected_salary }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Note</th>
                                        <td>
                                            {{ $jobApplication->notes }}
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
