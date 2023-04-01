@extends('frontend.layouts.app')

@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <!-- Hero section -->
    <section class="hero">
        <div class="container">
            <div class="get-started">
                <p>Get Started from today</p>
            </div>
            <div>
                <h1>Join our team today to take your <br>
                    <span class="text-primary">next step</span> of your career.
                </h1>
            </div>
            <div class="hero-message">
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout.
            </div>
            <div class="hero-search-box">
                <div class="input-group">
                    <div class="input-group-prepend">
                        {{-- <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span> --}}
                    </div>
                    <input type="search" id="form1" class="form-control" placeholder="Start Searching your Dream Job"
                        aria-label="Search" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>

    </section>
    <section class="align-center">
        <div class="container">
            <div>
                <h1>Explore Popular
                    <span class="text-primary">Jobs</span>
                </h1>
            </div>
            <div class="hero-message">
                <p>
                    Get the fastest application so that your name is above other application
            </div>
            <div>
                <ul class="category">
                    <li class="category-link-active">
                        <a class="category-link" aria-current="page" href="#">Recent Jobs</a>
                    </li>
                    <li class="category-item">
                        <a class="category-link" href="#">Web Developer</a>
                    </li>
                    <li class="category-item">
                        <a class="category-link" href="#">Graphic Designer</a>
                    </li>
                    <li class="category-item">
                        <a class="category-link" href="#">Digital Marketer</a>
                    </li>
                    <li class="category-item">
                        <a class="category-link" href="#">Mobile App Developer</a>
                    </li>
                </ul>
            </div>
            <div class="card-grid-list">
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{ $job->title }}</h5>
                                        <p>Posted 11 Hours Ago</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="card-text" style="margin-right:40px;">
                                            <i class="fa-brands fa-staylinked"></i>
                                            {{ $job->company_name }}
                                        </span>
                                        <span class="card-text">
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $job->location }}
                                        </span>
                                    </div>
                                    <div>
                                        <span>
                                            <i class="fa-solid fa-money-check-dollar" style="margin-right:10px;"></i>
                                            <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                            {{ $job->salary }}
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="job-category">{{ $job->type }}</span>
                                        <span class="job-nature">{{ $job->job_nature }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="load-more">
                <a class="" href="#">Load More</a>
            </div>
            <div class="register-msg-img">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="register-msg">
                            <h1>
                                So Many People Are <br>
                                <span class="text-primary">Engaged</span> All Over The World
                            </h1>
                            <p> Et in sapien enim congue interdum pulvinar non sed. Ac augue netus tellus semper.Et in
                                sapien
                                enim congue interdum pulvinar non sed.
                                Ac augue netus tellus semper. </p>
                            <img src="frontend/images/Vector.png" alt="">
                            <div class="register-today">
                                <a class="" href="#">Register Today</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="register-img">
                            <img src="frontend/images/register.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
