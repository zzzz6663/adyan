@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">


            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            جدول طرح ها  اجمالی
                             <span class="text-muted pt-2 font-size-sm d-block">
                            دانشجویانی که طرح اجمالی رو پر کرده اند
                            </span>
                        </h3>
                    </div>

                </div>
                <div class="card-body">
                    <!--begin: جستجو Form-->
                    <!--begin::جستجو Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="جستجو..."
                                                id="kt_datatable_search_query">
                                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">وضعیت:</label>

                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">نوع:</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                                    جستجو
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::جستجو Form-->
                    <!--end: جستجو Form-->

                    <!--begin: جدول داده ها-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                        id="kt_datatable" style="">
                        <table class="datatable-table" style="display: block;">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            ID
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                          عنوان
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                        دانشجو
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            استاد
                                        </span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            تاریخ
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            اقدام
                                        </span>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="datatable-body" style="">
                                @foreach ($curts as $curt)
                                <tr class="datatable-row" style="left: 0px;">
                                    <td class="datatable-cell text-center"><span>{{$loop->iteration}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$curt->title}} </span></td>
                                    <td class="datatable-cell text-center"><span>
                                        {{$curt->user->name}}
                                        {{$curt->user->family}}
                                    </span></td>

                                    <td class="datatable-cell text-center"><span>{{__('arr.'.$curt->level)}} </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        <span>{{Morilog\Jalali\Jalalian::forge($curt->created_at)->format('Y-m-d')}}
                                        </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        <a class="btn btn-outline-primary"
                                            href="{{route('admin.show.curt',$curt->id)}}">مشاهده</a>
                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                        </table>

                        <div class="pagi">
                            {{ $curts->appends(Request::all())->links('sections.pagination') }}
                        </div>

                    </div>
                    <!--end: جدول داده ها-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>

@endsection
