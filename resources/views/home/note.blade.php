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

                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label"> اخرین تسک ها </h3>
                                </div>
                            </div>
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
                                                    @role('expert')
                                                    تایید ثبت نام دانشجو
                                                    {{$duty->student()->name}}
                                                    {{$duty->student()->family}}
                                                    @endrole
                                                    @break

                                                    @case('submit_curt')
                                                    @role('student')
                                                    ثبت  طرح اجمالی اجمالی

                                                    @endrole
                                                    @break

                                                    @case('verify_curt')
                                                    @role('expert|master')
                                                    بررسی  طرح اجمالی اجمالی
                                                    دانشجو
                                                    {{$duty->curt->user->name}}
                                                    {{$duty->curt->user->family}}

                                                    @endrole
                                                    @break




                                                    @case('edit_curt_by_student')
                                                    @role('student')
                                                ویرایش  طرح اجمالی اجمالی  به خواسته
                                                کارشناس
                                                {{$duty->operator()->name}}
                                                {{$duty->operator()->family}}
                                                    @endrole
                                                    @break


                                                    @case('save_curt_group_by_expert')
                                                    @role('master')
                                                    کارشناس
                                                    {{$duty->operator()->name}}
                                                    {{$duty->operator()->family}}
                                                     طرح اجمالی را به گروه
                                                {{$duty->curt->group->name}}
                                                ارجاع داد
                                                    @endrole
                                                    @break



                                                    {{-- @case('save_curt_group_by_expert')
                                                    @role('master')
                                                    کارشناس
                                                    {{$duty->operator()->name}}
                                                    {{$duty->operator()->family}}
                                                     طرح اجمالی را به گروه
                                                {{$duty->curt->group->name}}
                                                ارجاع داد
                                                    @endrole
                                                    @break --}}



                                                    @case('review_curt_by_master')
                                                    @role('master')
                                                  اصلاح  طرح اجمالی توسط دانشجو
                                                  {{$duty->student()->name}}
                                                  {{$duty->student()->family}}
                                                    @endrole
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
                                                <div class="font-weight-bolder alert {{$duty->down_id?'alert-success':'alert-danger'}}"
                                                    data-toggle="view">



                                                    @switch( $duty->type)

                                                    @case('register')
                                                    @role('expert')
                                                    @if ($duty->operator_id)
                                                    انجام شده توسط
                                                    کارشناس
                                                    {{$duty->operator()->name}}
                                                    {{$duty->operator()->family}}
                                                    {{Morilog\Jalali\Jalalian::forge($duty->time)->ago()}}
                                                    @else
                                                    درخواست شده
                                                    {{Morilog\Jalali\Jalalian::forge($duty->created_at)->ago()}}
                                                    <a class="btn btn-primary"
                                                        href="{{route('admin.verify.student',[$duty->student()->id,$duty->id])}}">تایید
                                                        حساب</a>
                                                    @endif
                                                    @endrole
                                                    @break


                                                    @case('submit_curt')
                                                    @role('student')
                                                    @if ($duty->time)
                                                    <span class="alert alert-info">
                                                     انجام شده در
                                                     {{Morilog\Jalali\Jalalian::forge($duty->time)->ago()}}
                                                    </span>
                                                    @else
                                                    <a class="btn btn-primary" href="{{route('curt.create')}}">تبت  طرح اجمالی
                                                        اجمالی
                                                        حساب</a>
                                                    @endif
                                                    @endrole
                                                    @break


                                                    @case('verify_curt')
                                                    @role('master|expert')
                                                    @if ($duty->time)
                                                    <span class="alert alert-info">
                                                     انجام شده در
                                                     {{Morilog\Jalali\Jalalian::forge($duty->time)->ago()}}
                                                    </span>
                                                    @else
                                                    <a class="btn btn-primary" href="{{route('admin.show.curt',$duty->curt->id)}}">
                                                        بررسی  طرح اجمالی اجمالی
                                                        {{$duty->curt->title}}
                                            </a>
                                                    @endif

                                                    @endrole
                                                    @break



                                                    @case('edit_curt_by_student')
                                                    @role('student')
                                                    @if ($duty->time)
                                                    ویرایش شده در
                                                    {{Morilog\Jalali\Jalalian::forge($duty->time)->ago()}}
                                                    @else
                                                    <a class="btn btn-primary" href="{{route('curt.edit',$duty->curt->id)}}">
                                                        ویرایش
                                                    </a>
                                                    @endif
                                                    @endrole
                                                    @break



                                                    @case('save_curt_group_by_expert')
                                                    @role('master')
                                                    <a class="btn btn-primary" href="{{route('curt.edit',$duty->curt->id)}}">
                                                        ویرایش
                                                    </a>
                                                    @endrole
                                                    @break




                                                    @case('review_curt_by_master')
                                                    @role('master')


                                                    @if ($duty->time)
                                                    ویرایش شده در
                                                    {{Morilog\Jalali\Jalalian::forge($duty->time)->ago()}}
                                                    @else
                                                    <a class="btn btn-primary" href="{{route('session.create')}}">
                                                        تعین جلسه
                                                    </a>

                                                    @endif
                                                    @endrole
                                                    @break






                                                    @default

                                                    @endswitch

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
                                    <h3 class="card-label"> اخرین گزارشات </h3>
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

                                                        @case('verify')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break

                                                        @case('submit_curt')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break

                                                        @case('edit_curt_by_student')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break

                                                        @case('save_curt_group_by_expert')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('review_curt_by_master')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('select_curt_master')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('accept_curt')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
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
                                                                <span class="">
                                                                    ثبت نام
                                                                </span>
                                                                @break

                                                                @case('verify')
                                                                <span class="">
                                                                      بررسی ثبت نام
                                                                </span>
                                                                @break
                                                                @case('submit_curt')
                                                                <span class="">
                                                                          ثبت  طرح اجمالی توسط دانشجو
                                                                </span>
                                                                @break

                                                                @case('edit_curt_by_student')
                                                                <span class="">
                                                               بررسی  طرح اجمالی توسط دانشجو
                                                                </span>
                                                                @break

                                                                @case('save_curt_group_by_expert')
                                                                <span class="">
                                                                     ارجاع  طرح اجمالی  به گروه
                                                                </span>
                                                                @break



                                                                @case('review_curt_by_master')
                                                                <span class="">
                                                                     ارجاع مجدد  طرح اجمالی  به گروه
                                                                </span>
                                                                @break

                                                                @case('select_curt_master')
                                                                <span class="">
                                                                   انتخاب استاد راهنما
                                                                </span>
                                                                @break

                                                                @case('accept_curt')
                                                                <span class="">
                                                                تایید طرح اجمالی
                                                                </span>
                                                                @break

                                                                @default

                                                                @endswitch

                                                                <span class="text-muted ml-2">
                                                                    {{
                                                                    Morilog\Jalali\Jalalian::forge($log->created_at)->format('d-m-Y')}}
                                                                </span>
                                                                {{-- <span
                                                                    class="label label-light-success font-weight-bolder label-inline ml-2">جدید</span>
                                                                --}}

                                                            </div>

                                                        </div>
                                                        <p class="p-0">
                                                            @switch($log->type)
                                                            @case('register')
                                                            <span class="alert alert-success">
                                                                دانشجو
                                                                {{$log->student()->name}}
                                                                {{$log->student()->family}}
                                                                ثبت نام کردند
                                                            </span>
                                                            @break

                                                            @case('verify')
                                                            <span class="alert alert-success">
                                                                حساب
                                                                دانشجو
                                                                {{$log->student()->name}}
                                                                {{$log->student()->family}}
                                                                توسط متخصص
                                                                {{$log->operator()->name}}
                                                                {{$log->operator()->family}}
                                                                تایید شد
                                                            </span>
                                                            @break
                                                            @case('submit_curt')
                                                            <span class="alert alert-success">
                                                                     طرح اجمالی   اجمالی توسط دانشجو

                                                                {{$log->student()->name}}
                                                                {{$log->student()->family}}
                                                                ثبت شد
                                                            </span>
                                                            @break



                                                            @case('edit_curt_by_student')
                                                            <span class="alert alert-success">
                                                                کارشناس
                                                                {{$log->operator()->name}}
                                                                {{$log->operator()->family}}
                                                                 درخواست اصلاح در  طرح اجمالی اجمالی  را داشته است

                                                            </span>
                                                            @break

                                                            @case('save_curt_group_by_expert')
                                                            <span class="alert alert-success">
                                                                کارشناس
                                                                {{$log->operator()->name}}
                                                                {{$log->operator()->family}}
                                                                 طرح اجمالی را به گروه

                                                            {{$log->curt->group->name}}
                                                            ارجاع داد

                                                            </span>
                                                            @break



                                                            @case('review_curt_by_master')
                                                            <span class="alert alert-success">
                                                                دانشجو

                                                                {{$log->student()->name}}
                                                                {{$log->student()->family}}
                                                                طرح اجمالی را برای بررسی بیشتر به گروه

                                                            {{$log->curt->group->name}}
                                                            ارجاع داد

                                                            </span>
                                                            @break



                                                            @case('select_curt_master')
                                                            <span class="alert alert-success">
                                                                 استاد
                                                                 {{$log->curt->master()->name}}
                                                                 {{$log->curt->master()->family}}
                                                                 به عنوان
                                                                 استاد راهنمای  طرح اجمالی


                                                            {{$log->curt->group->name}}
                                                          انتخاب  شد

                                                            </span>
                                                            @break

                                                            @case('accept_curt')
                                                            <span class="alert alert-success">
                                                             گروه
                                                            {{$log->curt->group->name}}
                                                            طرح اجمالی دانشجو

                                                            {{$log->student()->name}}
                                                            {{$log->student()->family}}
                                                            را تایید کردند
                                                            </span>
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
