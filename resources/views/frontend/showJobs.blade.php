@extends('frontend.layouts.app')

@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <section class="align-center">
        <div class="container">
            <div class="job-show-header">
                <h1>{{ $job->title }}</h1>
                <div class="d-flex justify-content-center">
                    <span class="card-text" style="margin-right:40px;">
                        Job Type: {{ $job->type }}
                    </span>
                    <span class="card-text">
                        No of Vacancies:{{ $job->vacancy }}
                    </span>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="">Apply Now</a>
                </div>
            </div>
            <div class="show-job-img">
                <img src="" alt="">
            </div>
        </div>
    </section>
    <section class="job-details-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="job-details-show-info">
                        <h1>{{ $job->title }}</h1>
                        <h5>Who Are We Looking For</h5>
                        <p>{{ $job->description }}</p>
                    </div>
                    <div class="job-details-show-info">
                        <h5>Educational Requirement</h5>
                        <p>{{ $job->qualification }}</p>
                    </div>
                    <div class="job-details-show-info">
                        <h5>Apply Instruction</h5>
                        <p>{{ $job->how_to_apply }}</p>
                    </div>
                    <div class="job-details-show-info">
                        <h5>Salary</h5>
                        <p>{{ $job->salary }}</p>
                    </div>
                    <div class="job-details-show-info">
                        <h5>Working Hours</h5>
                        <p>{{ $job->working_hours }}</p>
                    </div>
                    <div class="job-details-show-info">
                        <h5>Weekly Of Day</h5>
                        <p>{{ $job->Weekend }}</p>
                    </div>
                    <div class="job-details-show-info">
                        <h5>Job Location</h5>
                        <p>{{ $job->location }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job-details-show-info-right">
                        <div class="d-flex justify-content-center">
                            <a href="">Apply Now</a>
                        </div>
                        <h5>Job Summary</h5>
                        <div class="job-details-show-info-right-body">
                            <p>
                                <i class="fa-solid fa-location-dot"></i> Location :
                                <span style="color: black">
                                    {{ $job->location }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-solid fa-money-check-dollar"></i> Salary :
                                <span style="color: black">
                                    <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    {{ $job->salary }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-solid fa-wallet"></i> Job Type :
                                <span style="color: black">
                                    {{ $job->type }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-sharp fa-solid fa-business-time"></i> Date Posted :
                                <span style="color: black">
                                    1 month ago
                                </span>
                            </p>
                            <p>
                                <i class="fa-sharp fa-solid fa-business-time"></i> Deadline :
                                <span style="color: black">
                                    {{ $job->application_deadline }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-solid fa-book"></i> Experience :
                                <span style="color: black">
                                    {{ $job->experience }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-sharp fa-solid fa-business-time"></i> Working Hours :
                                <span style="color: black">
                                    {{ $job->working_hours }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-solid fa-calendar-days"></i> Weekend :
                                <span style="color: black">
                                    {{ $job->Weekend }}
                                </span>
                            </p>
                            <p>
                                <i class="fa-solid fa-users"></i> Vacancy :
                                <span style="color: black">
                                    {{ $job->vacancy }}
                                </span>
                            </p>

                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="">View All Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
