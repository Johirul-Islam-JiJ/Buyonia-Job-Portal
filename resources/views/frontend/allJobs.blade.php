@extends('frontend.layouts.app')

@section('styles')
    <style>
        .col-md-6 {
            text-align: start;
        }
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
            {{-- <div class="category">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-link-active">
                        <a class="nav-link" aria-current="page" href="#">Recent Jobs</a>
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
            </div> --}}
            <div class="card-grid-list">
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-md-6 mb-4">
                            <a style="color: black" href="{{ route('show_job', $job) }}">
                                <div class="card">
                                    <div class="card-body px-4 py-4">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title mr-3 mr-md-0">{{ $job->title }}</h5>
                                            <p>Posted 11 Hours Ago</p>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-start">
                                            <div class="col-md-6">
                                                <span class="card-text">
                                                    <i class="fab fa-staylinked"></i>
                                                    {{ $job->company_name }}
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="card-text">
                                                    <i class="fas fa-location-dot"></i>
                                                    {{ $job->location }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start mt-2">
                                            <span>
                                                <i class="fa-solid fa-money-check-dollar mt-2"></i>
                                                <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                                {{ $job->salary }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-start mt-4">
                                            <div>
                                                <span class="job-category rounded-pill">{{ $job->type }}</span>
                                            </div>
                                            <div>
                                                <span class="job-nature rounded-pill">{{ $job->job_nature }}</span>
                                            </div>
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
