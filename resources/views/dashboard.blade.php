@extends('layouts.main')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">


    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-12 col-md-6 col-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1>Welcome to dashboard {{ Auth::user()->name }}!</h1>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- END: Content-->

    @endsection
