@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body pt-4">


                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div
                                    class="symbol text-center mb-10 symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label" style="background-image:url('{{ $user->avatar() }}')">
                                    </div>
                                    @if ($user->level=='student')

                                    <h4 class="font-weight-bold my-2">
                                        {{ __('sentences.last_status' ) }}
                                                    :
                                        {{ __('sentences.' . $user->status) }}
                                    </h4>
                                    @endif

                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                                        {{ $user->name }}
                                        {{ $user->family }}
                                    </a>
                                    <div class="text-muted">
                                        {{ __('sentences.' . $user->level) }}
                                    </div>
                                    {{-- <div class="mt-2">
                                        <a href="#"
                                            class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">چت</a>
                                        <a href="#"
                                            class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">دنبال
                                            کردن</a>
                                    </div> --}}
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::مخاطب-->
                            <div class="pt-8 pb-6">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">

                                        {{ __('sentences.email') }} :</span>
                                    <a href="#" class="text-muted text-hover-primary"> {{ $user->email }} </a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.mobile') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->mobile }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.code') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->code }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.group') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->group }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.whatsapp') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->whatsapp }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.type_job') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->type_job }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.semat_job') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->semat_job }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.job') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->job }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.org') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->org }}
                                    </span>
                                </div>
                                @role('srudent')
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.country') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->country->fa_name }}
                                    </span>
                                </div>
                                @endrole

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.province') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->province }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.city') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->city }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.master_univer') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->master_univer }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.master_course') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->master_course }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.expert') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->expert }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">
                                        {{ __('sentences.course') }} :</span>
                                    <span class="text-muted">
                                        {{ $user->course }}
                                    </span>
                                </div>


                            </div>
                            <!--end::مخاطب-->

                            {{-- <a href="#"
                                class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">
                                پروفایل بررسی
                            </a> --}}
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->


                </div>
                <!--end::Aside-->

                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">

                    <div class="row">

                        <div class="col-xl-12">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header card-header-tabs-line">
                                    <div class="card-toolbar">
                                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#logs">
                                                    <span class="nav-icon mr-2">
                                                        <span class="svg-icon mr-3">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/general/اطلاع2.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                                        fill="#000000"></path>
                                                                    <circle fill="#000000" opacity="0.3" cx="18.5"
                                                                        cy="5.5" r="2.5"></circle>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </span>
                                                    <span class="nav-text">
                                                        {{ __('sentences.logs') }}
                                                    </span>
                                                </a>
                                            </li>
                                            @if ($user->level == 'master')
                                            <li class="nav-item mr-3">
                                                <a class="nav-link" data-toggle="tab" href="#groups">
                                                    <span class="nav-icon mr-2">
                                                        <span class="svg-icon mr-3">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/چت-check.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        opacity="0.3"></path>
                                                                    <path
                                                                        d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                                        fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </span>
                                                    <span class="nav-text">
                                                        {{ __('sentences.my_group') }}
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="nav-item mr-3">
                                                <a class="nav-link" data-toggle="tab" href="#sessions">
                                                    <span class="nav-icon mr-2">
                                                        <span class="svg-icon mr-3">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                                        fill="#000000" opacity="0.3"></path>
                                                                    <path
                                                                        d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                                        fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </span>
                                                    <span class="nav-text">
                                                        {{ __('sentences.my_session') }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item mr-3">
                                                <a class="nav-link" data-toggle="tab" href="#subjects">
                                                    <span class="nav-icon mr-2">
                                                        <span class="svg-icon mr-3">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                                        fill="#000000" opacity="0.3"></path>
                                                                    <path
                                                                        d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                                        fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </span>
                                                    <span class="nav-text">
                                                        {{ __('sentences.my_subject') }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item mr-3">
                                                <a class="nav-link" data-toggle="tab" href="#surveys">
                                                    <span class="nav-icon mr-2">
                                                        <span class="svg-icon mr-3">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                                        fill="#000000" opacity="0.3"></path>
                                                                    <path
                                                                        d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                                        fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </span>
                                                    <span class="nav-text">
                                                        {{ __('sentences.my_surveys') }}
                                                    </span>
                                                </a>
                                            </li>
                                            @endif
                                            @if ($user->level == 'expert')
                                            <li class="nav-item mr-3">
                                                <a class="nav-link" data-toggle="tab" href="#quizizz">
                                                    <span class="nav-icon mr-2">
                                                        <span class="svg-icon mr-3">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                                        fill="#000000" opacity="0.3"></path>
                                                                    <path
                                                                        d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                                        fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> </span>
                                                    <span class="nav-text">
                                                        {{ __('sentences.my_quiz') }}
                                                    </span>
                                                </a>
                                            </li>
                                            @endif


                                        </ul>
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body px-0">
                                    <div class="tab-content pt-5">
                                        <!--begin::Tab Content-->
                                        <div class="tab-pane active" id="logs" role="tabpanel">
                                            <div class="container">


                                                <div class="separator separator-dashed my-10">


                                                </div>

                                                <!--begin::تایم لاین-->
                                                <div class="timeline timeline-3">
                                                    <div class="timeline-items">
                                                        @foreach ($logs as $log)
                                                        <div class="timeline-item">
                                                            <div class="timeline-media">
                                                                @switch($log->type)
                                                                @case('register')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('verify')
                                                                <img alt="Pic" src="{{ $log->operator()->avatar() }}">
                                                                @break

                                                                @case('pass_quiz')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('submit_curt')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('edit_curt_by_student')
                                                                <img alt="Pic" src="{{ $log->operator()->avatar() }}">
                                                                @break

                                                                @case('save_curt_group_by_expert')
                                                                <img alt="Pic" src="{{ $log->operator()->avatar() }}">
                                                                @break

                                                                @case('review_curt_by_master')
                                                                <img alt="Pic" src="{{ $log->operator()->avatar() }}">
                                                                @break

                                                                @case('select_curt_master')
                                                                <img alt="Pic" src="{{ $log->operator()->avatar() }}">
                                                                @break

                                                                @case('accept_curt')
                                                                <img alt="Pic" src="{{ $log->operator()->avatar() }}">
                                                                @break

                                                                @case('submit_subject')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('submit_plan')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('edit_plan_by_student')
                                                                <img alt="Pic"
                                                                    src="{{ $log->group->admin()->avatar() }}">
                                                                @break

                                                                @case('accept_plan')
                                                                <img alt="Pic"
                                                                    src="{{ $log->group->admin()->avatar() }}">
                                                                @break

                                                                @case('create_subject')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('subject_result')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('submit_survey')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @case('answer_survey')
                                                                <img alt="Pic" src="{{ $log->student()->avatar() }}">
                                                                @break

                                                                @default
                                                                @endswitch
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mb-3">
                                                                    <div class="mr-2">
                                                                        <a href="#"
                                                                            class="text-dark-75 text-hover-primary font-weight-bold">
                                                                            {{ $log->type }}
                                                                            @switch($log->type)
                                                                            @case('register')
                                                                            {{ __('sentences.register') }}
                                                                            @break

                                                                            @case('verify')
                                                                            {{ __('sentences.verify_regiter') }}
                                                                            @break

                                                                            @case('pass_quiz')
                                                                            {{ __('sentences.pass_quiz') }}
                                                                            @break

                                                                            @case('submit_curt')
                                                                            {{ __('sentences.create_curt') }}
                                                                            @break

                                                                            @case('edit_curt_by_student')
                                                                            {{ __('sentences.verify_curt_by_student') }}
                                                                            @break

                                                                            @case('save_curt_group_by_expert')
                                                                            {{ __('sentences.save_curt_group_by_expert')
                                                                            }}
                                                                            @break

                                                                            @case('review_curt_by_master')
                                                                            {{ __('sentences.review_curt_by_master') }}
                                                                            @break

                                                                            @case('select_curt_master')
                                                                            {{ __('sentences.select_curt_master') }}
                                                                            @break

                                                                            @case('accept_curt')
                                                                            {{ __('sentences.accept_curt') }}
                                                                            @break

                                                                            @case('submit_subject')
                                                                            {{
                                                                            __('sentences.submit_subject_student_log')
                                                                            }}
                                                                            @break

                                                                            @case('submit_plan')
                                                                            {{ __('sentences.submit_plan_student_log')
                                                                            }}
                                                                            @break

                                                                            @case('edit_plan_by_student')
                                                                            {{ __('sentences.edit_plan_by_student_log')
                                                                            }}
                                                                            @break

                                                                            @case('accept_plan')
                                                                            {{ __('sentences.accept_plan_student_log')
                                                                            }}
                                                                            @break

                                                                            @case('create_subject')
                                                                            {{ __('sentences.create_subject') }}
                                                                            @break


                                                                            @break

                                                                            @case('subject_result')
                                                                            {{ __('sentences.subject_result') }}
                                                                            @break

                                                                            @case('submit_survey')
                                                                            {{ __('sentences.submit_survey') }}
                                                                            @break

                                                                            @case('answer_survey')
                                                                            {{ __('sentences.answer_survey') }}
                                                                            @break

                                                                            @default
                                                                            @endswitch
                                                                        </a>
                                                                        <span class="text-muted ml-2">
                                                                            {{
                                                                            Morilog\Jalali\Jalalian::forge($log->created_at)->format('d-m-Y')
                                                                            }}

                                                                        </span>
                                                                        <span
                                                                            class="label label-light-success font-weight-bolder label-inline ml-2">




                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <p class="p-0">
                                                                    @switch($log->type)
                                                                    @case('register')
                                                                    {{ __('sentences.register_student_logs', ['name' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family]) }}
                                                                    @break

                                                                    @case('verify')
                                                                    {{ __('sentences.confirm_student_account_by_exprt',
                                                                    ['name' => $log->student()->name . ' ' .
                                                                    $log->student()->family,'expert' =>
                                                                    $log->operator()->name . ' ' .
                                                                    $log->operator()->family]) }}
                                                                    @break

                                                                    @case('pass_quiz')
                                                                    {{ __('sentences.pass_quiz_student', ['student' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family]) }}
                                                                    @break

                                                                    @case('submit_curt')
                                                                    {{ __('sentences.submit_curt_by_student', ['student'
                                                                    => $log->student()->name . ' ' .
                                                                    $log->student()->family]) }}
                                                                    @break

                                                                    @case('edit_curt_by_student')
                                                                    {{ __('sentences.edit_curt_by_student', ['expert' =>
                                                                    $log->operator()->name . ' ' .
                                                                    $log->operator()->family]) }}
                                                                    @break

                                                                    @case('save_curt_group_by_expert')
                                                                    {{ __('sentences.save_curt_group_by_expert_log',
                                                                    ['expert' => $log->operator()->name . ' ' .
                                                                    $log->operator()->family,'group' =>
                                                                    $log->curt->group->name,'student' =>
                                                                    $log->curt->user->name . ' ' .
                                                                    $log->curt->user->family]) }}
                                                                    @break

                                                                    @case('review_curt_by_master')
                                                                    {{ __('sentences.review_curt_by_master_by_student',
                                                                    ['student' => $log->operator()->name . ' ' .
                                                                    $log->operator()->family,'group' =>
                                                                    $log->curt->group->name]) }}
                                                                    @break

                                                                    @case('select_curt_master')
                                                                    {{ __('sentences.select_curt_master_for_curt',
                                                                    ['master' => $log->curt->master()->name . ' ' .
                                                                    $log->curt->master()->family,'group' =>
                                                                    $log->curt->group->name]) }}
                                                                    @break

                                                                    @case('accept_curt')
                                                                    {{ __('sentences.accept_curt_by_group', ['group' =>
                                                                    $log->curt->group->name,'student' =>
                                                                    $log->curt->user->name . ' ' .
                                                                    $log->curt->user->family]) }}
                                                                    @break

                                                                    @case('submit_subject')
                                                                    {{ __('sentences.submit_subject_student', ['subject'
                                                                    => $log->subject->title,'master' =>
                                                                    $log->subject->master->name . ' ' .
                                                                    $log->subject->master->family,'student' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family]) }}
                                                                    @break

                                                                    @case('submit_plan')
                                                                    {{ __('sentences.submit_plan_log', ['student' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family,'group' =>
                                                                    $log->plan->group->name]) }}
                                                                    @break

                                                                    @case('edit_plan_by_student')
                                                                    {{ __('sentences.edit_plan_by_student', ['student'
                                                                    => $log->student()->name . ' ' .
                                                                    $log->student()->family,'group' =>
                                                                    $log->plan->group->name]) }}
                                                                    @break

                                                                    @case('accept_plan')
                                                                    {{ __('sentences.accept_plan_log', ['student' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family,'group' =>
                                                                    $log->plan->group->name]) }}
                                                                    @break

                                                                    @case('create_subject')
                                                                    {{ __('sentences.create_subject_log', ['master' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family,'subject' =>
                                                                    $log->subject->title,'group' => $log->group->name])
                                                                    }}
                                                                    @break

                                                                    @case('subject_result')
                                                                    {{ __('sentences.subject_result_log', ['master' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family,'subject' =>
                                                                    $log->subject->title,'group' => $log->group->name])
                                                                    }}
                                                                    @break

                                                                    @case('submit_survey')
                                                                    {{ __('sentences.survey_submit_log', ['master' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family,'name' =>
                                                                    $log->survey->name]) }}
                                                                    @break

                                                                    @case('answer_survey')
                                                                    {{ __('sentences.answer_survey_log', ['master' =>
                                                                    $log->student()->name . ' ' .
                                                                    $log->student()->family,'name' =>
                                                                    $log->survey->name]) }}
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
                                        <!--end::Tab Content-->


                                        @if ($user->level == 'master')
                                        <!--begin::Tab Content-->
                                        <div class="tab-pane" id="groups" role="tabpanel">

                                            <!--begin: جدول داده ها-->
                                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                                id="kt_datatable" style="">
                                                <table class="datatable-table" style="display: block;">
                                                    <thead class="datatable-head">
                                                        <tr class="datatable-row" style="left: 0px;">

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.id') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.group_name') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.group_admin_name') }}

                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">

                                                                <span>
                                                                    {{ __('sentences.group_member') }}

                                                                </span>
                                                            </th>

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.created_at') }}

                                                                </span>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="datatable-body" style="">
                                                        @foreach ($user->groups()->latest()->get()
                                                        as $usergroup)
                                                        <tr class="datatable-row" style="left: 0px;">
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $loop->iteration }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $usergroup->name }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @if ($usergroup->user_id)
                                                                    {{ $usergroup->admin()->name }}
                                                                    {{ $usergroup->admin()->family }}
                                                                    @endif

                                                                </span></td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @foreach ($usergroup->users as $userg)
                                                                    {{ $userg->name }}
                                                                    {{ $userg->family }}
                                                                    -
                                                                    @endforeach

                                                                </span></td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{
                                                                    Morilog\Jalali\Jalalian::forge($usergroup->created_at)->format('Y-m-d')
                                                                    }}
                                                                </span>
                                                            </td>

                                                        </tr>
                                                        @endforeach



                                                    </tbody>
                                                </table>


                                            </div>
                                            <!--end: جدول داده ها-->

                                        </div>
                                        <!--end::Tab Content-->

                                        <div class="tab-pane" id="sessions" role="tabpanel">
                                            <!--begin: جدول داده ها-->
                                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                                id="kt_datatable" style="">
                                                <table class="datatable-table" style="display: block;">
                                                    <thead class="datatable-head">
                                                        <tr class="datatable-row" style="left: 0px;">

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.id') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>

                                                                    {{ __('sentences.session_name') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>

                                                                    {{ __('sentences.session_admin') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>

                                                                    {{ __('sentences.session_member') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>

                                                                    {{ __('sentences.created_at') }}
                                                                </span>
                                                            </th>

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>

                                                                    {{ __('sentences.action') }}
                                                                </span>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="datatable-body" style="">
                                                        @foreach ($user->sessions()->latest()->get()
                                                        as $usersession)
                                                        <tr class="datatable-row" style="left: 0px;">
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $loop->iteration }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $usersession->name }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @if ($usersession->user_id)
                                                                    {{ $usersession->user->name }}
                                                                    {{ $usersession->user->family }}
                                                                    @endif

                                                                </span></td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @foreach ($usersession->users as $users)
                                                                    {{ $users->name }}
                                                                    {{ $users->family }}
                                                                    -
                                                                    @endforeach

                                                                </span></td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{
                                                                    Morilog\Jalali\Jalalian::forge($usersession->created_at)->format('Y-m-d')
                                                                    }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-outline-primary"
                                                                    href="{{ route('admin.session.result', $usersession->id) }}">مشاهده</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach



                                                    </tbody>
                                                </table>


                                            </div>
                                            <!--end: جدول داده ها-->
                                        </div>



                                        <div class="tab-pane" id="subjects" role="tabpanel">
                                            <!--begin: جدول داده ها-->
                                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                                id="kt_datatable" style="">
                                                <table class="datatable-table" style="display: block;">
                                                    <thead class="datatable-head">
                                                        <tr class="datatable-row" style="left: 0px;">

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.id') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.subject_title') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.subject_admin') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.subject_user') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.status') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.info') }}
                                                                </span>
                                                            </th>

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.action') }}

                                                                </span>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="datatable-body" style="">

                                                        @foreach ($user->master_subjects()->latest()->get()
                                                        as $usersubject)
                                                        <tr class="datatable-row" style="left: 0px;">
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $loop->iteration }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $usersubject->title }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @if ($usersubject->admin_id)
                                                                    {{ $usersubject->admin->name }}
                                                                    {{ $usersubject->admin->family }}
                                                                    @endif

                                                                </span></td>
                                                            <td class="datatable-cell text-center">
                                                                <span>

                                                                    @if ($usersubject->user)
                                                                    {{ $usersubject->user->name }}
                                                                    {{ $usersubject->user->family }}
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>
                                                                    @switch($usersubject->status)
                                                                    @case(null)
                                                                    {{ __('sentences.in_progress') }}
                                                                    @break

                                                                    @case(1)
                                                                    {{ __('sentences.confirmed') }}
                                                                    @break

                                                                    @case(0)
                                                                    {{ __('sentences.failed') }}
                                                                    @break

                                                                    @default
                                                                    @endswitch
                                                                </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>
                                                                    {{ $usersubject->info }}
                                                                </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{
                                                                    Morilog\Jalali\Jalalian::forge($usersubject->created_at)->format('Y-m-d')
                                                                    }}
                                                                </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">

                                                            </td>
                                                        </tr>
                                                        @endforeach



                                                    </tbody>
                                                </table>


                                            </div>
                                            <!--end: جدول داده ها-->
                                        </div>

                                        <div class="tab-pane" id="surveys" role="tabpanel">
                                            <!--begin: جدول داده ها-->
                                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                                id="kt_datatable" style="">
                                                <table class="datatable-table" style="display: block;">
                                                    <thead class="datatable-head">
                                                        <tr class="datatable-row" style="left: 0px;">

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.id') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.survey_name') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.survey_master') }}
                                                                </span>
                                                            </th>

                                                            <th class="datatable-cell datatable-cell-sort text-center">

                                                                <span>
                                                                    {{ __('sentences.survey_member') }}

                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.created_at') }}

                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.action') }}

                                                                </span>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="datatable-body" style="">
                                                        @foreach ($user->surveys as $usersurvey)
                                                        <tr class="datatable-row" style="left: 0px;">
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $loop->iteration }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{ $usersurvey->name }} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @if ($usersurvey->user_id)
                                                                    {{ $usersurvey->user->name }}
                                                                    {{ $usersurvey->user->family }}
                                                                    @endif

                                                                </span></td>
                                                            <td class="datatable-cell text-center"><span>
                                                                    @foreach ($usersurvey->users as $userss)
                                                                    {{ $userss->name }}
                                                                    {{ $userss->family }}
                                                                    -
                                                                    @endforeach

                                                                </span></td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{
                                                                    Morilog\Jalali\Jalalian::forge($usersurvey->created_at)->format('Y-m-d')
                                                                    }}
                                                                </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <a class="btn btn-outline-primary"
                                                                    href="{{ route('survey.show', $usersurvey->id) }}">مشاهده</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach



                                                    </tbody>
                                                </table>


                                            </div>
                                            <!--end: جدول داده ها-->
                                        </div>
                                        @endif

                                        @if ($user->level == 'expert')
                                        <div id="quizizz" class="tab-pane" role="tabpanel">
                                            <!--begin: جدول داده ها-->
                                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                                id="kt_datatable" style="">
                                                <table class="datatable-table" style="display: block;">
                                                    <thead class="datatable-head">
                                                        <tr class="datatable-row" style="left: 0px;">

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.id') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.quiz_name') }}

                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.question_count') }}

                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.question_duration') }}

                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.quiz_show_status') }}
                                                                </span>
                                                            </th>
                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.created_at') }}

                                                                </span>
                                                            </th>

                                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                                <span>
                                                                    {{ __('sentences.action') }}

                                                                </span>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="datatable-body" style="">
                                                        @foreach ($user->quizzes as $quiz)
                                                        <tr class="datatable-row" style="left: 0px;">
                                                            <td class="datatable-cell text-center">
                                                                <span>{{$loop->iteration}} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{$quiz->title}} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{$quiz->questions()->count()}} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                <span>{{$quiz->duration}} </span>
                                                            </td>
                                                            <td class="datatable-cell text-center"><span
                                                                    class="text-{{$quiz->active=='1'?'success':'danger'}}">{{$quiz->active=='1'?'نمایش':'عدم
                                                                    نمایش'}} </span></td>


                                                            <td class="datatable-cell text-center">
                                                                <span>{{Morilog\Jalali\Jalalian::forge($quiz->created_at)->format('Y-m-d')}}
                                                                </span>
                                                            </td>
                                                            <td class="datatable-cell text-center">
                                                                {{-- <a class="btn btn-outline-primary"
                                                                    href="{{route('quiz.edit',$quiz->id)}}"> {{
                                                                    __('sentences.edit') }}</a> --}}
                                                                <a class="btn btn-outline-danger"
                                                                    href="{{route('quiz.question.index',$quiz->id)}}">
                                                                    {{ __('sentences.questions') }}</a>
                                                            </td>

                                                        </tr>

                                                        @endforeach



                                                    </tbody>
                                                </table>


                                            </div>
                                            <!--end: جدول داده ها-->
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>

                    @if ($user->level=='student')
                    <!--begin::پیشرفت Table Widget 8-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">{{__('sentences.quizzez')}}
                                </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                    {{__('sentences.quizzez_list')}}</span>
                            </h3>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <!--begin: جدول داده ها-->
                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                id="kt_datatable" style="">
                                <table class="datatable-table" style="display: block;">
                                    <thead class="datatable-head">
                                        <tr class="datatable-row" style="left: 0px;">

                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.id') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.quiz_name') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.question_count') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.question_duration') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.quiz_show_status') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.created_at') }}

                                                </span>
                                            </th>



                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body" style="">
                                        @foreach ($user->quizzes as $quiz)
                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center"><span>{{$loop->iteration}} </span>
                                            </td>
                                            <td class="datatable-cell text-center"><span>{{$quiz->title}} </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                    {{ $user->questions()->wherePivot('number',
                                                    $quiz->pivot->number)->wherePivot('quiz_id', $quiz->id)->count()}}
                                                </span></td>
                                            <td class="datatable-cell text-center"><span>{{$quiz->duration}} </span>
                                            </td>
                                            <td class="datatable-cell text-center"><span
                                                    class="text-{{$quiz->pivot->result=='1'?'success':'danger'}}">{{$quiz->pivot->result=='1'?
                                                    __('sentences.passed') : __('sentences.action') }} </span></td>
                                            <td class="datatable-cell text-center">
                                                <span>{{Morilog\Jalali\Jalalian::forge($quiz->pivot->time)->format('Y-m-d')}}
                                                </span>
                                            </td>

                                        </tr>

                                        @endforeach



                                    </tbody>
                                </table>


                            </div>
                            <!--end: جدول داده ها-->
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::پیشرفت Table Widget 8-->



                    <div class="card card-custom gutter-b">
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">{{__('sentences.curts')}}
                                    @if ($main_curt->subject)
                                    <br>
                                    {{__('sentences.curts_subject')}}
                                    @endif
                                </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                    {{__('sentences.curts_list')}}</span>
                            </h3>


                        </div>
                        @if ($main_curt->subject)
                        <div class="card-body pt-0 pb-3">
                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                id="kt_datatable" style="">
                                <table class="datatable-table" style="display: block;">
                                    <thead class="datatable-head">
                                        <tr class="datatable-row" style="left: 0px;">

                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.id') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.title') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.master') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.group') }}

                                                </span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.info') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.created_at') }}

                                                </span>
                                            </th>



                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body" style="">

                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center"><span>1 </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{$main_curt->subject->title}} </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                    {{$main_curt->subject->master->name}}
                                                </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                    {{$main_curt->subject->group->name}} </span>
                                            </td>
                                            <td class="datatable-cell text-center"><span>
                                                    {{$main_curt->subject->info}} </span>
                                            </td>

                                            <td class="datatable-cell text-center">
                                                <span>{{Morilog\Jalali\Jalalian::forge($main_curt->subject->time)->format('Y-m-d')}}
                                                </span>
                                            </td>

                                        </tr>





                                    </tbody>
                                </table>


                            </div>
                        </div>
                        @else
                        <div class="card-body pt-0 pb-3">
                            <div class="row">
                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            {{__('sentences.title')}}

                                        </label>
                                        <h2 class="">
                                            {{$main_curt->title}}
                                        </h2>
                                        <ul>
                                            @foreach ($all_curts as $curt)
                                            @if ( $curt->title)
                                            <li>

                                                ({{$curt->operator_curts()->name}}
                                                {{$curt->operator_curts()->family}})
                                                ({{
                                                Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                <br>
                                                {{$curt->title}}
                                            </li>
                                            @endif


                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            {{__('sentences.tags')}}

                                        </label>
                                        <h2 class="text-fs">
                                            @foreach ($main_curt->tags as $tag )
                                            {{$tag->tag }} -
                                            @endforeach
                                        </h2>

                                        <ul>
                                            @foreach ($all_curts as $curt)
                                            @if ( $curt->tag)
                                            <li>
                                                ({{$curt->operator_curts()->name}}
                                                {{$curt->operator_curts()->family}})
                                                ({{
                                                Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                <br>
                                                {{$curt->tag}}
                                            </li>
                                            @endif

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            {{__('sentences.problem')}}
                                        </label>
                                        <h2 class="text-fs">
                                            {{$main_curt->problem}}
                                        </h2>

                                        <ul>
                                            @foreach ($all_curts as $curt)
                                            @if ( $curt->problem)
                                            <li>
                                                ({{$curt->operator_curts()->name}}
                                                {{$curt->operator_curts()->family}})
                                                ({{
                                                Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                <br>
                                                {{$curt->problem}}
                                            </li>
                                            @endif

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            {{__('sentences.question')}}
                                        </label>
                                        <h2 class="text-fs">
                                            {{$main_curt->question}}
                                        </h2>

                                        @foreach ($all_curts as $curt)
                                        @if ( $curt->question)
                                        <li>
                                            ({{$curt->operator_curts()->name}}
                                            {{$curt->operator_curts()->family}})
                                            ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                            <br>
                                            {{$curt->question}}
                                        </li>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            {{__('sentences.necessity')}}
                                        </label>
                                        <h2 class="text-fs">
                                            {{$main_curt->necessity}}
                                        </h2>

                                        @foreach ($all_curts as $curt)
                                        @if ( $curt->necessity)
                                        <li>
                                            ({{$curt->operator_curts()->name}}
                                            {{$curt->operator_curts()->family}})
                                            ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                            <br>
                                            {{$curt->necessity}}
                                        </li>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            {{__('sentences.innovation')}}
                                        </label>
                                        <h2 class="text-fs">
                                            {{$main_curt->innovation}}
                                        </h2>


                                        @foreach ($all_curts as $curt)
                                        @if ( $curt->innovation)
                                        <li>
                                            ({{$curt->operator_curts()->name}}
                                            {{$curt->operator_curts()->family}})
                                            ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                            <br>
                                            {{$curt->innovation}}
                                        </li>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>
                                @if (!$main_curt->master_id)
                                <div class="col-xl-12 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="card-title font-weight-bolder">
                                            @if ($main_curt->ostad())

                                            {{__('sentences.suggested_master_list')}}
                                            {{$main_curt->ostad()->name}}
                                            {{$main_curt->ostad()->family}}

                                            @endif
                                            <br>
                                            @if ($main_curt->ostad)
                                            {{__('sentences.suggested_master_out_list')}}
                                            {{$main_curt->ostad}}

                                            <a target="_blank" href="{{$main_curt->resume()}}" class="btn btn-danger">
                                                {{__('sentences.download_resume')}} </a>

                                            @endif


                                        </label>

                                    </div>
                                </div>

                                @endif






                            </div>
                        </div>
                        @endif
                    </div>


                    @if ($main_plan)

                    <div class="card card-custom gutter-b">
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">
                                    {{__('sentences.plan')}}


                                </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                    {{__('sentences.plan_list')}}</span>
                            </h3>


                        </div>
                        <div class="card-body pt-0 pb-3">
                            <div class="row">
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.title')}}

                                        </label>
                                        <h2>
                                            {{$main_plan->title}}
                                        </h2>

                                           <ul>
                                               @foreach ($all_plans as  $plan)
                                                  @if ( $plan->title)
                                                  <li>

                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->title}}
                                                    </li>
                                               @endif


                                               @endforeach
                                           </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.en_title')}}

                                        </label>
                                        <h2>
                                            {{$main_plan->en_title}}
                                        </h2>

                                           <ul>
                                               @foreach ($all_plans as  $plan)
                                                  @if ( $plan->en_title)
                                                  <li>

                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->en_title}}
                                                    </li>
                                               @endif


                                               @endforeach
                                           </ul>
                                    </div>
                                </div>

                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.tags')}}

                                        </label>
                                        <h2>
                                            @foreach (explode('_',$main_plan->tags) as $tag )
                                            {{$tag }} -
                                            @endforeach
                                        </h2>

                                             <ul>
                                               @foreach ($all_plans as  $plan)
                                                  @if ( $plan->tags)
                                                  <li>
                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->tags}}
                                                    </li>
                                               @endif

                                               @endforeach
                                           </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.en_tags')}}

                                        </label>
                                        <h2>
                                            @foreach (explode('_',$main_plan->en_tags) as $tag )
                                            {{$tag }} -
                                            @endforeach
                                        </h2>

                                             <ul>
                                               @foreach ($all_plans as  $plan)
                                                  @if ( $plan->en_tags)
                                                  <li>
                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->en_tags}}
                                                    </li>
                                               @endif

                                               @endforeach
                                           </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.problem')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->problem}}
                                        </h2>

                                            <ul>
                                                @foreach ($all_plans as  $plan)
                                                   @if ( $plan->problem)
                                                   <li>
                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->problem}}
                                                    </li>
                                               @endif

                                                @endforeach
                                            </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.question')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->question}}
                                        </h2>
                                      <ul>
                                        @foreach ($all_plans as  $plan)
                                        @if ( $plan->question)
                                        <li>
                                         ({{$plan->group->admin()->name}}
                                         {{$plan->group->admin()->family}})
                                         ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                         <br>
                                         {{$plan->question}}
                                         </li>
                                        @endif

                                    @endforeach
                                      </ul>
                                </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.necessity')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->necessity}}
                                        </h2>
                                      <ul>
                                        @foreach ($all_plans as  $plan)
                                        @if ( $plan->necessity)
                                        <li>
                                         ({{$plan->group->admin()->name}}
                                         {{$plan->group->admin()->family}})
                                         ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                         <br>
                                         {{$plan->necessity}}
                                         </li>
                                        @endif

                                    @endforeach
                                      </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.sub_question')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->sub_question}}
                                        </h2>

                                        <ul>
                                            @foreach ($all_plans as  $plan)
                                            @if ( $plan->sub_question)
                                            <li>
                                             ({{$plan->group->admin()->name}}
                                             {{$plan->group->admin()->family}})
                                             ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                             <br>
                                             {{$plan->sub_question}}
                                             </li>
                                            @endif

                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.hypo')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->hypo}}
                                        </h2>

                                     <ul>
                                        @foreach ($all_plans as  $plan)
                                        @if ( $plan->hypo)
                                        <li>
                                         ({{$plan->group->admin()->name}}
                                         {{$plan->group->admin()->family}})
                                         ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                         <br>
                                         {{$plan->hypo}}
                                         </li>
                                        @endif

                                    @endforeach
                                     </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.theory')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->theory}}
                                        </h2>

                                       <ul>
                                        @foreach ($all_plans as  $plan)
                                        @if ( $plan->theory)
                                        <li>
                                         ({{$plan->group->admin()->name}}
                                         {{$plan->group->admin()->family}})
                                         ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                         <br>
                                         {{$plan->theory}}
                                         </li>
                                        @endif

                                    @endforeach
                                       </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.structure')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->structure}}
                                        </h2>

                                       <ul>
                                        @foreach ($all_plans as  $plan)
                                        @if ( $plan->structure)
                                        <li>
                                         ({{$plan->group->admin()->name}}
                                         {{$plan->group->admin()->family}})
                                         ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                         <br>
                                         {{$plan->structure}}
                                         </li>
                                        @endif

                                    @endforeach
                                       </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.method')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->method}}
                                        </h2>

                                          <ul>
                                            @foreach ($all_plans as  $plan)
                                            @if ( $plan->method)
                                            <li>
                                             ({{$plan->group->admin()->name}}
                                             {{$plan->group->admin()->family}})
                                             ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                             <br>
                                             {{$plan->method}}
                                             </li>
                                            @endif

                                        @endforeach
                                          </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 par">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>
                                            {{__('sentences.source')}}
                                        </label>
                                        <h2>
                                            {{$main_plan->source}}
                                        </h2>

                                           <ul>
                                            @foreach ($all_plans as  $plan)
                                            @if ( $plan->source)
                                            <li>
                                             ({{$plan->group->admin()->name}}
                                             {{$plan->group->admin()->family}})
                                             ({{ Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                             <br>
                                             {{$plan->source}}
                                             </li>
                                            @endif

                                        @endforeach
                                           </ul>
                                    </div>
                                </div>








                            </div>
                         </div>
                     </div>

                     @endif



                    @endif

                </div>
                <!--end::Content-->
            </div>

        </div>
        <!--end::Container-->
    </div>
</div>
@endsection