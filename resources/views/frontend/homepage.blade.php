@extends('frontend.layouts.app')

@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <!-- Hero section -->
    <section class="hero">
        <div class="container">
            <div class="text-center">
                <p class="get-started">Get Started from today</p>
                <h1>Join Our Team Today To Take Your <br>
                    <span class="text-primary">Next Step</span> Of Your Career.
                </h1>
                <div class="d-flex justify-content-center">
                    <p class="hero-message">
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="search input-group">
                        <input type="text" class="form-control" placeholder="Start Searching Your Dream Job">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="explore">
        <div class="container">
            <div class="text-center">
                <h1>Explore Popular
                    <span class="text-primary">Jobs</span>
                </h1>
                <div class="d-flex justify-content-center">
                    <p class="hero-message">Get the fastest application so that your name is above other application</p>

                </div>
            </div>
            <div class="category">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Recent Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Web Developer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Graphic Designer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Digital Marketer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mobile App Developer</a>
                    </li>
                </ul>
            </div>
            <div class="card-grid-list">
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-md-6 mb-4">
                            <a style="color: black" href="{{ route('show_job', $job) }}">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title">{{ $job->title }}</h5>
                                            <p>Posted 11 Hours Ago</p>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            <span class="card-text" style="margin-right:20%;">
                                                <i class="fa-brands fa-staylinked"></i>
                                                {{ $job->company_name }}
                                            </span>
                                            <span class="card-text">
                                                <i class="fa-solid fa-location-dot"></i>
                                                {{ $job->location }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-start" style="margin-top:10px;">
                                            <span>
                                                <i class="fa-solid fa-money-check-dollar" style="margin-right:10px;"></i>
                                                <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                                {{ $job->salary }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-start" style="margin-top:10px;">
                                            <span class="job-category">{{ $job->type }}</span>
                                            <span class="job-nature">{{ $job->job_nature }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="#">Load More</a>
            </div>
            <div class="register-msg-img">
                <div class="row">
                    <div class="col-md-6">
                        <div class="register-msg">

                            <h1>
                                So Many People Are <br>
                                <span class="text-primary">Engaged</span> All Over The World
                            </h1>

                            <img src="frontend/images/Vector.png" alt="">
                            <p> Et in sapien enim congue interdum pulvinar non sed. Ac augue netus tellus semper.Et in
                                sapien
                                enim congue interdum pulvinar non sed.
                                Ac augue netus tellus semper. </p>
                            <div class="register-today">
                                <a class="btn btn-primary" href="#">Register Today</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="register-img">
                            <img src="frontend/images/register.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
