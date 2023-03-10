@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-4 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Assign Role To {{ $user->name }}</h1>

                        <form action="{{ route('assign.role',$user->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                @foreach($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="roles[]" value="{{$role->id}}"
                                    @foreach($assigned_role_id as $ass)
                                        {{ $ass->id == $role->id ? 'checked' : '' }}
                                    @endforeach
                                    >
                                    <label class="form-check-label">{{$role->name}}</label>
                                </div>
                                @endforeach
                            </div>
                                <div>
                                    <a href="{{ url('/user')  }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Assign</button>

                                </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <!-- END: Content-->

@endsection
