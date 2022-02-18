@extends('master.main')
@php($side=true)
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin::ویزارد-->
                    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
                        @include('home.register.wizard_nav', ['step' => '3'])
                        @include('sections.error')
                        <form class="form" action="{{route('user.register3')}}" id="kt_form" method="post" >
                            @method('post')
                            @csrf

                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">

                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Body-->

                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        {{--  <h3 class="mb-10 font-weight-bold text-dark">کاربر پروفایل جزئیات:</h3>  --}}
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> شماره تماس ایرانی
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="mobile" type="number" value="{{old('mobile',$user->mobile)}}">
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> شماره   واتس اپ
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="whatsapp" type="number" value="{{old('whatsapp',$user->whatsapp)}}">
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> ایمیل* </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="email" type="email" value="{{old('email',$user->email)}}">
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                    <!--begin::ویزارد اقدامات-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <a href="{{route('user.register2')}}" class="btn btn-light-danger font-weight-bold text-uppercase px-9 py-4" >
                                                قبلی
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                                ارسال
                                            </button>
                                            <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">
                                                بعد
                                            </button>
                                        </div>
                                    </div>
                                    <!--end::ویزارد اقدامات-->
                                </div>

                            </div>


                        </form>

                    </div>

                    <!--end::ویزارد Form-->
                </div>
            </div>

        </div>
    </div>
    <!--end::ویزارد Body-->
</div>
<!--end::ویزارد-->


@endsection
