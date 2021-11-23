@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Files') }}</h1>
                    <div class="form-group row">
                            <div class="col-md-6">
                                <a href="{{ route('files.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Upload File</a>
                            </div>
                    </div>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                   
                    <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Files</th>
                            <th scope="col">Action(s)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($file as $data)
                                <tr>
                                   <td>{{$data->title}}</td>
                                   <td>{{$data->description}}</td>
                                   <td>{{$data->file}}</td>
                                   <td>
                                   <a href="/file/download/{{$data->file}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-download"></i> Download</a>
                                   </td>
                                </tr>
                            @empty
                                <tr>
                                    No Uploads.
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
                   
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection