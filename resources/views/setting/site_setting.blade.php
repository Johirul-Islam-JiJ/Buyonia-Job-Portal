@extends('layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-12 col-md-6 col-12 mx-auto">
                @if(session('toast-success'))
                    <div class="alert alert-success alert-dismissible p-1">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{  session('toast-success') }}!</strong>
                    </div>
                @endif
                @if(session('toast-error'))
                    <div class="alert alert-danger alert-dismissible p-1">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{  session('toast-error') }}!</strong>
                    </div>
                @endif

                <div class="card pb-2 pt-2">

                    <div class="card-body mx-auto">
                        <h1 class="text-center">Edit Settings</h1>
                        <form action="{{ route('setting.update',1) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="row">
                               <div class=" col-6">
                                   <label for="name" class="form-label">Name</label>
                                   <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Site Name" value="{{ old('name') ?? $site_setting->name }}">
                                   @error('name')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class=" col-6">
                                   <label for="name" class="form-label">Email</label>
                                   <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') ?? $site_setting->email }}">
                                   @error('email')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>

                            <div class="row">
                                <div class=" col-6">
                                    <label for="name" class="form-label">Phone</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone" value="{{ old('phone') ?? $site_setting->phone }}">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" col-6">
                                    <label for="name" class="form-label">Whatsapp</label>
                                    <input class="form-control @error('whatsapp') is-invalid @enderror" type="text" name="whatsapp" placeholder="Whatsapp" value="{{ old('whatsapp') ?? $site_setting->whatsapp }}">
                                    @error('whatsapp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-6">
                                    <label for="name" class="form-label">Working Hour</label>
                                    <input class="form-control @error('working_hour') is-invalid @enderror" type="text" name="working_hour" placeholder="working Hour" value="{{ old('working_hour') ?? $site_setting->working_hour }}">
                                    @error('working_hour')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="name" class="form-label">Address</label>
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Address" value="{{ old('address') ?? $site_setting->address }}">
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" >
                                <div class="form-group col-6">
                                    <label for="customFile">Logo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo" />
                                        <label class="custom-file-label" for="customFile">Choose logo</label>

                                   </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="customFile">Favicon</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="favicon" name="favicon" />
                                        <label class="custom-file-label" for="customFile">Choose favicon</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="description" class="form-label">Short Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2" placeholder="Short Description">{{ old('description') ?? $site_setting->description }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="copyright" class="form-label">Copyright Details</label>
                                    <textarea class="form-control @error('copyright') is-invalid @enderror" id="copyright" name="copyright" rows="2" placeholder="Copyright Details">{{ old('copyright') ?? $site_setting->copyright }}</textarea>
                                    @error('copyright')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <a class="btn btn-danger" href="{{ url('home') }}">Cancel</a>
                            <button type="submit" class="btn btn-success float-right">Save Settings</button>

                        </form>

                    </div>

                </div>



            </div>



        </div>


    </div>

    <!-- END: Content-->

@endsection
