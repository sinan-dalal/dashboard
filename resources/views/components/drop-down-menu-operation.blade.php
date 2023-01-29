@extends('layouts.master')
@section('css')

    @section('title')
        القائمة منسدلة
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> القوائم المنسدلة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">القوائم المنسدلة</a></li>
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
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="d-block">
                                        <h5 class="card-title pb-0 border-0"> {{$title}}</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mb-30">
                                    <div class="card card-statistics h-100">

                                        <div class="row">
                                            <div class="card-body">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->default->getMessages() as $key=> $messages)
                                                                @foreach($messages as $message)
                                                                    <li>{{$key.':'. $message }}</li>
                                                                @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form method="POST" enctype="multipart/form-data"
                                                      action="{{route($route.'.store')}}">
                                                    @csrf

                                                    <div class="repeater-add">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputPassword5">اسم :</label>
                                                                <input type="text" class="form-control" name="name"
                                                                       placeholder="ادخل الاسم ">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>الوصف:</label>
                                                                <input type="text" class="form-control"
                                                                       name="description"
                                                                       placeholder="ادخل الوصف ">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20">
                                                            <div class="col-12">
                                                                <input class="button" type="submit" value="اضافة">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th></th>
                                                        <th>المعرف</th>
                                                        <th>الاسم</th>
                                                        <th>الوصف</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($items)

                                                        @foreach($items as $item)
                                                            <tr>
                                                                <td></td>
                                                                <td>{{$item->id}}</td>
                                                                <td>{{$item->name}}</td>
                                                                <td>{{$item->descrption}}</td>
                                                                <td>
                                                                    <form method="POST" enctype="multipart/form-data"
                                                                          action="{{ route($route.'.destroy',$item->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                style="width: 7rem;"
                                                                                value="حذف">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- row closed -->
@endsection
