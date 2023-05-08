@extends('frontend.layouts.app')

@section('styles')
    <style>
        .hero {
            width: 100%;
            height: 100%;
            /* background-image: url("frontend/images/bg.png"); */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        @media only screen and (max-width: 768px) {
            .hero {
                background-image: none;
            }
        }

        @media screen and (max-width: 767px) {
            .hero {
                margin-bottom: 0px;
            }
        }

        .register-header {
            background-image: url("frontend/images/Vector.png");
            background-repeat: no-repeat;
            background-position: left bottom;
        }

        @media only screen and (max-width: 768px) {
            .register-header {
                background-image: none;
            }
        }

        @media only screen and (max-width: 767px) {
            .card-title {
                text-align: left;
                margin-right: 0;
            }
        }

        @media only screen and (max-width: 767px) {
            .register-today {
                text-align: center;
            }
        }

        .col-md-6 {
            text-align: start;
        }
    </style>
@endsection

@section('content')
    <!-- Hero section -->
    <section>
        <div class="container">
            <div class="hero">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <p class="get-started rounded-pill mt-5">
                            Get Started from today
                        </p>
                    </div>

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
                        <form action="">
                            <div class="search input-group">
                                <input class="form-control" type="text" name="search"
                                    placeholder="Search Your Dream Job" oninput="suggestSearch(this.value)">

                                <button class="btn btn-primary">Search</button>
                            </div>

                        </form>
                        <div id="search-suggestions" class="search-suggestions">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="explore">
        <div class="container">
            <div class="text-center">
                <h1>Explore Recent
                    <span class="text-primary">Jobs</span>
                </h1>
                <div class="d-flex justify-content-center">
                    <p class="hero-message">Get the fastest application so that your name is above other application</p>

                </div>
            </div>
            {{-- <div class="category">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Recent Jobs</a>
                    </li>
                    @foreach ($departments as $department)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ $department->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">All Post</a>
                    </li>
                    @foreach ($jobs as $job)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ $job->designation }}</a>
                        </li>
                    @endforeach
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
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="#">Load More</a>
            </div>
            <div class="register-msg-img">
                <div class="row">
                    <div class="col-md-6">
                        <div class="register-msg">


                            <h1 class="register-header">
                                So Many People Are <br>
                                <span class="text-primary">Engaged</span> All Over The World
                            </h1>

                            {{-- <img src="frontend/images/Vector.png" alt=""> --}}
                            <p> Et in sapien enim congue interdum pulvinar non sed. Ac augue netus tellus semper.Et in
                                sapien
                                enim congue interdum pulvinar non sed.
                                Ac augue netus tellus semper. </p>
                            {{-- <div class="register-today">
                                <a class="btn btn-primary" href="#">Register Today</a>
                            </div> --}}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function suggestSearch(query) {
        // Make an AJAX request to a server endpoint that returns search suggestions
        $.ajax({
            url: '/search/suggest',
            type: 'GET',
            data: {
                query: query
            },
            success: function(response) {
                // Update the search suggestion dropdown or list with the returned suggestions
                var suggestions = response.suggestions;
                var suggestionList = document.getElementById('search-suggestions');
                suggestionList.innerHTML = '';
                for (var i = 0; i < suggestions.length; i++) {
                    var suggestion = suggestions[i];
                    var suggestionItem = document.createElement('li');
                    suggestionItem.innerText = suggestion;
                    suggestionList.appendChild(suggestionItem);
                }
                // Show the search suggestion dropdown or list
                suggestionList.style.display = 'block';
            }
        });
    }
</script>
