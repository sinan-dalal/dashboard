<?php

use App\Models\Landscape;
use App\Models\LandSiteDescription;
use App\Models\LandDirection;
use App\Models\Office;

?>
<div class=" card card-statistics h-100">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data"
              action="{{$method=='POST'?route('lands.store'):route('lands.update',$land->id)}}">
            @csrf
            @if($method!='POST')
                @method('PUT')
            @endif

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

            <div class="repeater-add">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>رقم المخطط :</label>
                        <select
                            name="landscape_id"
                            class="custom-select custom-select-lg mb-3">
                            @if($land->landscape)
                                <option value="{{$land->landscape->id}}" selected>{{$land->landscape->name}}</option>
                            @else
                                <option value="">اختر رقم المخطط</option>
                            @endif>

                            @foreach(Landscape::all() as $landscape)
                                <option value="{{$landscape->id}}">{{$landscape->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>وصف الموقع :</label>
                        <select
                            name="site_description_id"
                            class="custom-select custom-select-lg mb-3">
                            @if($land->siteDescription)
                                <option value="{{$land->siteDescription->id}}"
                                        selected>{{$land->siteDescription->name}}</option>
                            @else
                                <option value="">اختر وصف الموقع</option>
                            @endif>

                            @foreach(LandSiteDescription::all() as $siteDescription)
                                <option value="{{$siteDescription->id}}">{{$siteDescription->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>المساحة :</label>
                        <input type="text" class="form-control"
                               name="area"
                               @if(isset($land->area))
                                   value="{{$land->area}}"
                               @else
                                   placeholder="ادخل المساحة"
                            @endif>
                    </div>
                    <div class="form-group col-md-6">
                        <label>السعر :</label>
                        <input type="text" class="form-control"
                               name="price"
                               @if($land->price)
                                   value="{{$land->price}}"
                               @else
                                   placeholder="ادخل السعر"
                            @endif>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>الطول :</label>
                        <input type="text" class="form-control"
                               name="length"
                               @if($land->length)
                                   value="{{$land->length}}"
                               @else
                                   placeholder="ادخال الطول"
                            @endif>
                    </div>
                    <div class="form-group col-md-6">
                        <label>العرض :</label>
                        <input type="text" class="form-control"
                               name="width"
                               @if($land->width)
                                   value="{{$land->width}}"
                               @else
                                   placeholder="ادخل العرض"
                            @endif>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>العنوان :</label>
                        <input type="text" class="form-control"
                               name="address"
                               @if($land->address)
                                   value="{{$land->address}}"
                               @else
                                   placeholder="ادخل رقم العنوان"
                            @endif>
                    </div>
                    <div class="form-group col-md-6">
                        <label>الطبيعة :</label>
                        <input type="text" class="form-control"
                               name="nature"
                               @if($land->nature)
                                   value="{{$land->nature}}"
                               @else
                                   placeholder="ادخل الطبيعة"
                            @endif>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>القطعة :</label>
                        <input type="text" class="form-control"
                               name="tract_no"
                               @if($land->tract_no)
                                   value="{{$land->tract_no}}"
                               @else
                                   placeholder="ادخل رقم القطعة"
                            @endif>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity5">السوم :</label>
                        <input type="text" class="form-control"
                               name="desired_price"
                               @if($land->desired_price)
                                   value="{{$land->desired_price}}"
                               @else
                                   placeholder="ادخل السوم"
                            @endif>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>الواجهات :</label>
                        <select
                            name="direction_id"
                            class="custom-select custom-select-lg mb-3">
                            @if($land->landDirection)
                                <option value="{{$land->landDirection->id}}"
                                        selected>{{$land->landDirection->name}}</option>
                            @else
                                <option value="">اختر رقم المخطط</option>
                            @endif>

                            @foreach(LandDirection::all() as $landDirection)
                                <option value="{{$landDirection->id}}">{{$landDirection->name}}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="form-group col-md-6">
                        <label>المكاتب العقارية :</label>
                        <select
                            name="office_id"
                            class="custom-select custom-select-lg mb-3">
                            @if($land->office)
                                <option value="{{$land->office->id}}" selected>{{$land->office->full_name}}</option>
                            @else
                                <option value="">اختر المكتب العقاري</option>
                            @endif>

                            @foreach(Office::all() as $office)
                                <option value="{{$office->id}}">{{$office->full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="control-label mt-3">الوصف</label>
                        <textarea class="form-control" id="message" rows="3"  placeholder="اكتب وصف مختصر" name="description">
                            @if($land->description)
                                {{$land->description}}
                            @endif
                        </textarea>
                    </div>
                </div>

                <div class="form-row ">
                    <label class="form-group col-md-1">الصورة الرئيسية :</label>
                    <div class="form-group col-md-5">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                        <label class="custom-file-label" for="validatedCustomFile">حدد الصورة الريسية</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    <label class="form-group col-md-1">الصور :</label>
                    <div class="form-group col-md-5">
                        <input class="custom-file-input" id="validatedCustomFile" multiple="" name="images[]"
                               type="file">
                        <label class="custom-file-label" for="validatedCustomFile">حدد صوره او اكثر</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>

                </div>

                <div class="row mt-20">
                    <div class="col-12">
                        <input class="button" type="submit" value="{{$submit}}">
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
