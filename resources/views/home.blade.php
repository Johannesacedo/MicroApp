@extends('layouts.app')

@section('content')
<style>
    .card-box {
        position: relative;
        color: #fff;
        padding: 20px 10px 40px;
        margin: 20px 0px;
    }
    .card-box:hover {
        text-decoration: none;
        color: #f1f1f1;
    }
    .card-box:hover .icon i {
        font-size: 100px;
        transition: 1s;
        -webkit-transition: 1s;
    }
    .card-box .inner {
        padding: 5px 10px 0 10px;
    }
    .card-box h3 {
        font-size: 27px;
        font-weight: bold;
        margin: 0 0 8px 0;
        white-space: nowrap;
        padding: 0;
        text-align: left;
    }
    .card-box p {
        font-size: 15px;
    }
    .card-box .icon {
        position: absolute;
        top: auto;
        bottom: 5px;
        right: 5px;
        z-index: 0;
        font-size: 72px;
        color: rgba(0, 0, 0, 0.15);
    }
    .card-box .card-box-footer {
        position: absolute;
        left: 0px;
        bottom: 0px;
        text-align: center;
        padding: 3px 0;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        text-decoration: none;
    }
    .card-box:hover .card-box-footer {
        background: rgba(0, 0, 0, 0.3);
    }
    .bg-blue {
        background-color: #00c0ef !important;
    }
    .bg-green {
        background-color: #00a65a !important;
    }
    .bg-orange {
        background-color: #f39c12 !important;
    }
    .bg-red {
        background-color: #d9534f !important;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Dashboard') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card-box bg-blue">
                                <div class="inner">
                                    <h3> Activity </h3>
                                    <p> To do lists </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <a href="{{route('todo.index')}}" class="card-box-footer">Click here View More <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="card-box bg-green">
                                <div class="inner">
                                    <h3> File Management </h3>
                                    <p> Store Files </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </div>
                                <a href="{{route('files.index')}}" class="card-box-footer">Click here to View More <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
