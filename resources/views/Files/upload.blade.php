@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Files') }}</h1>
                    <div class="form-group row">
                            <div class="col-md-6">
                                <a href="{{route('files.index')}}" class="btn btn-success"> <i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                    </div>
                </div>
                
                    <div class="card-body">
                        <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title"  placeholder="Title">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Browse Files</label>
                                <input type="file" class="form-control-file" name="file">
                            </div>

                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection