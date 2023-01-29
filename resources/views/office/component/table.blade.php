<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <div class="row">

        <div class="col-sm-12 col-md-6">
            <div class="d-block">
                <h5 class="card-title pb-0 border-0"> {{$attribute['title']}}</h5>
            </div>

            <form method="GET" action="{{ route($attribute['operation'].'.index') }}">
                <div class="dataTables_length" id="datatable_length"><label>@lang('pagination.show')
                        <select
                            name="perPage"
                            class="form-control form-control-sm" onchange="this.form.submit()">
                            <option value="10" {{$perPage==10 ? ' selected' : ''}}>10</option>
                            <option value="25"{{$perPage==25 ? ' selected' : ''}}>25</option>
                            <option value="50"{{$perPage==50 ? ' selected' : ''}}>50</option>
                            <option value="100"{{$perPage==100 ? ' selected' : ''}}>100</option>
                        </select>
                    </label>
                </div>
            </form>

        </div>
        <div class="col-sm-12 col-md-6">
            <div class="box-body">
                <div class="form-group" style="direction: rtl">
                    <a class="btn btn-primary " href="{{ route($attribute['operation'].'.create') }}">
                        <i class="fa  fa-plus-square"> إضافة</i>
                    </a>
                </div>
            </div>

            <div class="widget-search ml-0 clearfix">
                <i class="fa fa-search"></i>
                <input type="search" class="form-control" placeholder="Search....">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="table-responsive mt-15">
            <table class="table center-aligned-table mb-0">
                <thead>
                <tr class="text-dark">
                    <th>{{trans('office.id')}}</th>
                    <th>{{trans('office.full_name')}}</th>
                    <th>{{trans('office.phone_number')}}</th>
                    <th>{{trans('office.email')}}</th>
                    <th>{{trans('office.created_at')}}</th>
                    <th>{{trans('office.land_no')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($offices as $office)
                    <tr>
                        <td>{{$office->id}}</td>
                        <td>{{$office->full_name}}</td>
                        <td>{{$office->phone_number}}</td>
                        <td>{{$office->email}}</td>
                        <td>{{Carbon\Carbon::parse($office->email_verified_at)->format('Y-m-d')}}</td>
                        <td>{{$office->lands->count()}}</td>
                        <td>

                            <form method="POST" enctype="multipart/form-data"
                                  action="{{ route($attribute['operation'].'.destroy',$office->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route($attribute['operation'].'.show',$office->id) }}"
                                   class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-list-alt "></i>
                                </a>
                                <a href="{{ route($attribute['operation'].'.edit',$office->id) }}"
                                   class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-edit "></i>
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                        value="حذف">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{$offices->links()}}

</div>
