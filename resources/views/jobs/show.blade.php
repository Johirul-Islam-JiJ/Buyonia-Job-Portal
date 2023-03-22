@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-8 col-md-6 col-12 mx-auto">
                <div class="card">

                    <div class="card-body">
                        <a href="{{ url('/jobs') }}" class="btn btn-danger">Back</a>
                        <h1 class="text-center">View Job Details</h1>
                        <div class="table-responsive">
                            <table class="table text-left" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <td>
                                            {{ $job->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Job Description</th>
                                        <td>
                                            {!! $job->description !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Monthly Salary</th>
                                        <td>{{ $job->salary }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job Location</th>
                                        <td>{{ $job->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Minimum Qualification</th>
                                        <td>{{ $job->qualification }}</td>
                                    </tr>
                                    <tr>
                                        <th>Minimum Experience</th>
                                        <td>{{ $job->experience }}</td>
                                    </tr>
                                    <tr>
                                        <th>Application Deadline</th>
                                        <td>{{ $job->application_deadline }}</td>
                                    </tr>
                                    <tr>
                                        <th>Application Link</th>
                                        <td>{{ $job->application_link }}</td>
                                    </tr>
                                    <tr>
                                        <th>Application Instruction</th>
                                        <td>{!! $job->how_to_apply !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Job Category</th>
                                        <td>{{ $job->job_category }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job Level</th>
                                        <td>{{ $job->job_level }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job Nature</th>
                                        <td>{{ $job->job_nature }}</td>
                                    </tr>
                                    <tr>
                                        <th>Employment Status</th>
                                        <td>{{ $job->employment_status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Name</th>
                                        <td>{{ $job->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Website</th>
                                        <td>{{ $job->company_website }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Email</th>
                                        <td>{{ $job->company_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Phone Number</th>
                                        <td>{{ $job->company_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Address</th>
                                        <td>{{ $job->company_address }}</td>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('applications.create',$job) }}">Apply Now</a>
                        </div>


                    </div>

                </div>

                {{-- {{ $job->links() }} --}}

            </div>


        </div>

    </div>
    {{-- table sorting using name and email --}}
    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];

                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {

                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;

                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>

    <!-- END: Content-->
@endsection
