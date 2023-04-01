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
                    <h3>hello</h3>
                </div>
                <div class="col-md-4">
                    <h3>hi</h1>
                </div>
            </div>
        </div>
    </section>
@endsection
