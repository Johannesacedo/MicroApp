@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Files') }}</h1>
                    <div class="form-group row">
                            <div class="col-md-6">
                                <a href="{{ route('files.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                    </div>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <p>
                        <iframe src="{{url('storage/'.$data->file)}}" frameborder="0"></iframe>
                    </p>
                    
                </div>
                   
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection