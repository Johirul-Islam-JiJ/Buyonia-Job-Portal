@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-4 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Assign Permission To {{ $role->name }}</h1>

                        <form action="{{ route('assign.permission',$role->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="permissions[]" value="{{$permission->id}}"
                                    @foreach($assigned_permission_id as $ass)
                                        {{ $ass->id == $permission->id ? 'checked' : '' }}
                                    @endforeach
                                    >
                                    <label class="form-check-label">{{$permission->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ url('/role')  }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Assign</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <!-- END: Content-->

@endsection
