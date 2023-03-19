@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">


        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-12 col-md-6 col-12 mx-auto">
                @if (session('toast-success'))
                    <div class="alert alert-success alert-dismissible p-1">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('toast-success') }}!</strong>
                    </div>
                @endif
                @if (session('toast-error'))
                    <div class="alert alert-danger alert-dismissible p-1">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('toast-error') }}!</strong>
                    </div>
                @endif
                <div class="mb-1">
                    <a class="btn btn-primary btn-sm" href="{{ route('jobs.create') }}">Add New Job</a>
                </div>
                <div class="card">

                    <div class="card-body">

                        <form>
                            <div class="btn-group mb-1 float-right">
                                <select class="form-control mr-1" name="per_page_result" id="per_page_result"
                                    onchange="this.form.submit()">
                                    <option value="">Per Page</option>
                                    <option value="10" {{ request('per_page_result') == 10 ? 'selected' : '' }}>10
                                    </option>
                                    <option value="15" {{ request('per_page_result') == 15 ? 'selected' : '' }}>15
                                    </option>
                                    <option value="20" {{ request('per_page_result') == 20 ? 'selected' : '' }}>20
                                    </option>
                                </select>
                                <input class="form-control" type="text" name="search" placeholder="Search..."
                                    value="{{ old('search') }}">
                                <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                            </div>
                        </form>


                        <div class="table-responsive">
                            <table class="table text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th onclick="sortTable(0)" class="cursor-pointer">
                                            Title<i data-feather="arrow-up"></i><i data-feather="arrow-down"></i></th>
                                        <th>Description</th>
                                        <th>Salary</th>
                                        <th>Location</th>
                                        <th>Qualification</th>
                                        <th>Experience</th>
                                        <th>Deadline</th>
                                        <th>Apply Link</th>
                                        <th>How to apply</th>
                                        <th>Job Category</th>
                                        <th>Job Level</th>
                                        <th>Job Nature</th>
                                        <th>Employment Status</th>
                                        <th>Company Name</th>
                                        <th>Company Website</th>
                                        <th>Company Email</th>
                                        <th>Company Phone</th>
                                        <th>Company Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>

                                    @foreach ($job as $job)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td>
                                                {{ $job->title }}
                                            </td>

                                            <td>
                                                {{ $job->description }}
                                            </td>

                                            <td>{{ $job->salary }}</td>
                                            <td>{{ $job->location }}</td>
                                            <td>{{ $job->qualification }}</td>
                                            <td>{{ $job->experience }}</td>
                                            <td>{{ $job->application_deadline }}</td>
                                            <td>{{ $job->application_link }}</td>
                                            <td>{{ $job->how_to_apply }}</td>
                                            <td>{{ $job->job_category }}</td>
                                            <td>{{ $job->job_level }}</td>
                                            <td>{{ $job->job_nature }}</td>
                                            <td>{{ $job->employment_status }}</td>
                                            <td>{{ $job->company_name }}</td>
                                            <td>{{ $job->company_website }}</td>
                                            <td>{{ $job->company_email }}</td>
                                            <td>{{ $job->company_phone }}</td>
                                            <td>{{ $job->company_address }}</td>
                                        </tr>
                                    @endforeach

                                </thead>
                            </table>
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
