<?php

use App\Helpers\MediaHelper;

?>
@extends('layouts.master')
@section('css')

    @section('title')
        land
    @stop
    <style>
        .slider-container {
            margin: 10px auto;
            width: 400px;
            height: 400px;
            position: relative;
        }

        .slider-container img {
            position: absolute;
            opacity: 0;
            transition: opacity 1s;
            z-index: 1;
        }

        .slider-container img.active {
            opacity: 1;
        }

        .slider-container .slide-number {
            position: absolute;
            left: 10px;
            top: 10px;
            background-color: rgba(0, 0, 0, .6);
            color: #FFF;
            padding: 5px 10px;
            font-size: 20px;
            z-index: 2;
            border-radius: 6px;
        }

        .slider-controls {
            width: 400px;
            margin: auto;
            overflow: hidden;
        }

        .slider-controls .indicators {
            width: 60%;
            float: left;
        }

        .slider-controls .indicators ul {
            list-style: none;
            margin: 0;
            text-align: center;
        }

        .slider-controls .indicators ul li {
            display: inline-block;
            background-color: #F6F6F6;
            color: #333;
            font-weight: bold;
            height: 28px;
            width: 28px;
            border-radius: 4px;
            margin: 0 2px;
            line-height: 28px;
            cursor: pointer;
        }

        .slider-controls .indicators ul li.active {
            background-color: #009688;
            color: #FFF;
        }
    </style>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> تفاصيل الأرض
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">
                            تفاصيل الأرض
                        </a></li>

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
                @component('components.label-title-component',[
                                                                'image'=> asset(MediaHelper::getFile($land->image)),
                                                                'id'=>$land->id,
                                                                'other_icon'=>false,
                                                                'other'=>'المكتب العقاري: '.$land->office->full_name,
                                                                'name'=>'أرض للبيع',
                                                                'date'=>$land->created_at->format('Y-m-d'),
                                                                'updateButton'=>route('lands.edit',$land->id),
                                                                'deleteButton'=>route('lands.destroy',$land->id),
                                                                ])
                @endcomponent
                <div class="card card-statistics h-100">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class=" card card-statistics h-100">
                                <div class="card-body">

                                    <div class="repeater-add">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>رقم المخطط :</label>
                                                <input type="text" class="form-control"
                                                       @if(isset($land->landscape->name))
                                                           placeholder="{{$land->landscape->name}}" readonly
                                                    @endif>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>وصف الموقع :</label>
                                                <input type="text" class="form-control"
                                                       @if(isset($land->siteDescription->name))
                                                           placeholder="{{$land->siteDescription->name}}" readonly
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>المساحة :</label>
                                                <input type="text" class="form-control"
                                                       @if(isset($land->area))
                                                           placeholder="{{$land->area}}" readonly
                                                    @endif>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>السعر :</label>
                                                <input type="text" class="form-control"
                                                       @if($land->price)
                                                           placeholder="{{$land->price}}" readonly
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>القطعة :</label>
                                                <input type="text" class="form-control"
                                                       @if($land->tract_no)
                                                           placeholder="{{$land->tract_no}}" readonly
                                                    @endif>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>الطول :</label>
                                                <input type="text" class="form-control"
                                                       @if($land->width && $land->length)
                                                           placeholder="{{$land->width.' في '.$land->length}}" readonly
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>الطبيعة :</label>
                                                <input type="text" class="form-control"
                                                       @if($land->nature)
                                                           placeholder="{{$land->nature}}" readonly
                                                    @endif>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputCity5">السوم :</label>
                                                <input type="text" class="form-control"
                                                       @if($land->desired_price)
                                                           placeholder="{{$land->desired_price}}" readonly
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>الواجهات :</label>
                                                <input type="text" class="form-control"
                                                       @if(isset($land->landDirection->name))
                                                           placeholder="{{$land->landDirection->name}}" readonly
                                                    @endif>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>تاريخ الانشاء :</label>
                                                <input type="text" class="form-control"
                                                       @if($land->created_at)
                                                           placeholder="{{$land->created_at->format('Y-m-d  g:i a')}}"
                                                       readonly
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label mt-3">الوصف</label>
                                                <textarea class="form-control" id="message" rows="3"
                                                          @if($land->description)
                                                              placeholder="{{$land->description}}" readonly
                                                          @endif></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-5">
                            <div class="slider-container">
                                @foreach($land->images as $image)
                                    <img decoding="async" src="{{asset(MediaHelper::getFile($image->path))}}" alt=""/>
                                @endforeach
                            </div>
                            <div class="slider-controls">
                                <span id="indicators" class="indicators "></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/js/slider.js')}}"></script>
@endsection
