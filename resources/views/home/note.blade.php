@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom">
                <div class="row">
                    <div class="col-xl-6">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch" id="kt_todo_list">


                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <!--begin::Responsive container-->
                                <div class="table-responsive">
                                    @foreach ($duties as $duty)
                                    <div class="list list-hover min-w-500px" data-inbox="list">
                                        <div class="d-flex align-items-start list-item card-spacer-x py-4"
                                            data-inbox="message">

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                                                <!--begin::Title-->
                                                <div class="font-weight-bolder mr-2">
                                                        @switch( $duty->type)
                                                            @case('register')
                                                            دانشجو
                                                                @break
                                                            @default

                                                        @endswitch


                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center justify-content-end flex-wrap"
                                                data-toggle="view">
                                                <!--begin::تاریخtime-->
                                                <div class="font-weight-bolder" data-toggle="view">
                                                    روز قبل
                                                </div>
                                                <!--end::تاریخtime-->

                                                <!--begin::User تصویر-->
                                                <div class="symbol symbol-light-danger symbol-30 ml-3">

                                                </div>
                                                <!--end::User تصویر-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <!--end::Responsive container-->

                                {{--
                                <!--begin::Pagination-->
                                <div class="d-flex align-items-center my-2 my-6 card-spacer-x justify-content-end">
                                    <div class="d-flex align-items-center mr-2" data-toggle="tooltip" title=""
                                        data-original-title="Records per page">
                                        <span class="text-muted font-weight-bold mr-2" data-toggle="dropdown">1 - 50 از
                                            235</span>
                                        <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-sm">
                                            <ul class="navi py-3">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">20 per page</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link active">
                                                        <span class="navi-text">50 par page</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">100 per page</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Pagination--> --}}
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-xl-6 pt-10 pt-xl-0">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">  اخرین گزارشات </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::نمونه-->
                                <div class="example example-basic">
                                    <div class="example-preview">
                                        <!--begin::تایم لاین-->
                                        <div class="timeline timeline-3">
                                            <div class="timeline-items">
                                                @foreach ($logs as $log )
                                                <div class="timeline-item">
                                                    <div class="timeline-media">
                                                        @switch($log->type)
                                                            @case('register')

                                                            <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                                @break

                                                            @default

                                                        @endswitch

                                                    </div>
                                                    <div class="timeline-content">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-3">
                                                            <div class="mr-2">
                                                                @switch($log->type)
                                                                @case('register')
                                                                <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">
                                                                    ثبت نام
                                                                </a>
                                                                    @break

                                                                @default

                                                            @endswitch

                                                                <span class="text-muted ml-2">
                                                                    {{  Morilog\Jalali\Jalalian::forge($log->created_at)->format('d-m-Y')}}
                                                                </span>
                                                                {{--  <span class="label label-light-success font-weight-bolder label-inline ml-2">جدید</span>  --}}
                                                            </div>

                                                        </div>
                                                        <p class="p-0">
                                                         @switch($log->type)
                                                             @case('register')
                                                             دانشجو
                                                             {{$log->student()->name}}
                                                             {{$log->student()->family}}
                                                             ثبت نام کردند
                                                                 @break

                                                             @default

                                                         @endswitch
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                        <!--end::تایم لاین-->
                                    </div>
                                </div>
                                <!--end::نمونه-->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::ویزارد-->
        </div>
        <!--end::ویزارد-->
    </div>
</div>

@endsection
