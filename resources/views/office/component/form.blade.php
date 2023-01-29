<div class=" card card-statistics h-100">
    <div class="card-body">
        <h5 class="card-title">{{$method=='POST'?"انشاء مكتب":"تعديل المكتب"}}</h5>
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
              action="{{$method=='POST'?route('offices.store'):route('offices.update',$office->id)}}">
            @csrf
            @if($method!='POST')
                @method('PUT')
            @endif

            <div class="repeater-add">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword5">اسم الكامل:</label>
                        <input type="text" class="form-control"
                               name="full_name"
                               @if(isset($office->full_name))
                                   value="{{$office->full_name}}"
                               @else
                                   placeholder="ادخل الاسم الكامل"
                            @endif>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail5">الايميل:</label>
                        <input type="email" class="form-control"
                               name="email"
                               @if(isset($office->email))
                                   value="{{$office->email}}"
                               @else placeholder="ادخل الايميل"
                            @endif>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity5">رقم الهاتف :</label>
                        <input type="text" class="form-control"
                               name="phone_number"
                               @if(isset($office->phone_number))
                                   value="{{$office->phone_number}}"
                               @else placeholder="ادخل رقم الهاتف
                               "@endif>
                    </div>
                </div>
                <div class="control-group" id="toastTypeGroup">
                    <div class="controls">
                        <label class="d-block mb-2">حالة المكتب</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="verified" value="true"
                                   {{(isset($office->email_verified_at )&& !is_null($office->email_verified_at) ) ? ' checked' : '' }}
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">مفعل</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="verified" value="false"
                                   {{(isset($office->email_verified_at) && is_null($office->email_verified_at)) ? '' : ' checked' }}
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">غير مفعل</label>
                        </div>
                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label" for="validatedCustomFile">اختر صورة</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
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
