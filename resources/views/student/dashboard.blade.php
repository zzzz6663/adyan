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
                                    <!--begin::Items-->
                                    <div class="list list-hover min-w-500px" data-inbox="list">
                                        <div class="d-flex align-items-start list-item card-spacer-x py-4"
                                            data-inbox="message">


                                            <!--begin::Info-->
                                            <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                                                <!--begin::Title-->
                                                <div class="font-weight-bolder mr-2">تایید کیفیت</div>
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

                                    <!--end::Items-->
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
                                    <h3 class="card-label">تایم لاین </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::نمونه-->
                                <div class="example example-basic">
                                    <div class="example-preview">
                                        <!--begin::تایم لاین-->
                                        <div class="timeline timeline-3">
                                            <div class="timeline-items">
                                                <div class="timeline-item">
                                                    <div class="timeline-media">
                                                        <img alt="Pic" src="assets/media/users/300_25.jpg">
                                                    </div>
                                                    <div class="timeline-content">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-3">
                                                            <div class="mr-2">
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold">
                                                                    سفارش جدید درج شده است
                                                                </a>
                                                                <span class="text-muted ml-2">
                                                                    امروز
                                                                </span>
                                                                <span
                                                                    class="label label-light-success font-weight-bolder label-inline ml-2">جدید</span>
                                                            </div>
                                                            <div class="dropdown ml-2" data-toggle="tooltip" title=""
                                                                data-placement="left"
                                                                data-original-title="اقدامات سریع">
                                                                <a href="#"
                                                                    class="btn btn-hover-light-primary btn-sm btn-icon"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i
                                                                        class="ki ki-more-hor font-size-lg text-primary"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                                    <!--begin::Navigation-->
                                                                    <ul class="navi navi-hover">
                                                                        <li class="navi-header font-weight-bold py-4">
                                                                            <span class="font-size-lg">انتخاب
                                                                                کنید:</span>
                                                                            <i class="flaticon2-information icon-md text-muted"
                                                                                data-toggle="tooltip"
                                                                                data-placement="right" title=""
                                                                                data-original-title="برای اطلاعات بیشتر کلیک کنید..."></i>
                                                                        </li>
                                                                        <li class="navi-separator mb-3 opacity-70"></li>
                                                                        <li class="navi-item">
                                                                            <a href="#" class="navi-link">
                                                                                <span class="navi-text">
                                                                                    <span
                                                                                        class="label label-xl label-inline label-light-success">مشتری</span>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="navi-item">
                                                                            <a href="#" class="navi-link">
                                                                                <span class="navi-text">
                                                                                    <span
                                                                                        class="label label-xl label-inline label-light-danger">شریک</span>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="navi-item">
                                                                            <a href="#" class="navi-link">
                                                                                <span class="navi-text">
                                                                                    <span
                                                                                        class="label label-xl label-inline label-light-warning">برتر</span>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="navi-item">
                                                                            <a href="#" class="navi-link">
                                                                                <span class="navi-text">
                                                                                    <span
                                                                                        class="label label-xl label-inline label-light-primary">عضو</span>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="navi-item">
                                                                            <a href="#" class="navi-link">
                                                                                <span class="navi-text">
                                                                                    <span
                                                                                        class="label label-xl label-inline label-light-dark">کارمندان</span>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="navi-separator mt-3 opacity-70"></li>
                                                                        <li class="navi-footer py-4">
                                                                            <a class="btn btn-clean font-weight-bold btn-sm"
                                                                                href="#">
                                                                                <i class="ki ki-plus icon-sm"></i>
                                                                                جدید اضافه کن
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <!--end::Navigation-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="p-0">
                                                            این متن تست است,
                                                            در این قسمت می توانید توضیحات دلخواه خود را قرار دهید.
                                                        </p>
                                                    </div>
                                                </div>

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
