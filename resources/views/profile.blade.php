@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h1>{{ __('Profile') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                       <div class="form-group row">
                            <div class="col-md-6">
                                <a href="{{ route('home')}}" class="btn btn-success"> <i class="fa fa-arrow-left"></i> Back to Home</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                        <img class="rounded-circle" src="{{ Auth::user()->picture }}" width="200" height="200" alt="User profile picture">
                                        </div><hr>
                                        <h3 class="profile-username text-center username">{{Auth::user()->name}}</h3>
                                    </div>
                                  
                                </div>   
 
                            </div>
                            <!-- /.col -->
                            <div class="col-md-8">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#personalinformation" role="tab" aria-controls="nav-home" aria-selected="true">Personal Information</a>
                                    </div>
                                </nav><hr/>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="personalinformation" role="tabpanel" aria-labelledby="nav-home-tab">
                                       <form action="{{ route('profile') }}" method="post" id="profileform">
                                       @csrf
                                            <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                        <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}">

                                                          <span class="text-danger error-text name_error"></span>
                                                        </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}">

                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-success">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                   
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
     
        $.ajaxSetup({
     
           headers:{
               'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
           }
        });

        $(function(){
            // update personal info

            $('#profileform').on('submit',function(e){
                e.preventDefault();
            });

        });
    </script> -->
</div>
@endsection
