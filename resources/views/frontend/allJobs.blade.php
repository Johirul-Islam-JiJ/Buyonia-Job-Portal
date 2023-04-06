@extends('frontend.layouts.app')

@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <section class="align-center">
        <div class="container">
            <div class="all-jobs-header">
                <h2>Find Your Job</h2>
                <p>Home/ <span style="color: #0033CC">All Jobs</span> </p>
            </div>
            <div class="hero-search-box">
                <div class="search input-group">
                    <input type="text" class="form-control" placeholder="Start Searching Your Dream Job">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
            <div>
                <h1>Explore Popular
                    <span class="text-primary">Jobs</span>
                </h1>
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
                            <a style="color: black" href="{{ route('show_job', $job) }}">
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
                            </a>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>
@endsection
