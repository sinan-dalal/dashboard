@extends('layouts.master')
@section('css')

    @section('title')
        {{$title}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{$title}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{$title}}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        @component('office.component.form', [
                                                        'method'=>'POST',
                                                        'submit'=>'اضاف',
                                                        'attribute'=>$attribute
                                                        ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
