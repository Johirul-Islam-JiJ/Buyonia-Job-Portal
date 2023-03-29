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
        <div>
            <h1>Explore Popular
                <span class="text-primary">Jobs</span>
            </h1>
        </div>
        <div class="hero-message">
            <p>
                Get the fastest application so that your name is above other application
        </div>
        <div class="category">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid justify-content-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Recent Jobs</a>
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
                </div>
            </nav>
        </div>
        <div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary">Load More</button>
        </div>
        <div>
            <div class="row">
                <div class="col-sm-6">
                    <div>
                        <h1>
                            So Many People are engaged all over the world
                        </h1>
                    </div>

                    <div class="hero-message">
                        <p>
                            Et in sapien enim congue interdum pulvinar non sed. Ac augue netus tellus semper.
                    </div>
                    <div>
                        <button class="btn btn-primary">Register Today</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="" alt="image">
                </div>
            </div>
        </div>
    </section>
@endsection
