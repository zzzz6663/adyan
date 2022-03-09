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
                        @include('home.register.wizard_nav', ['step' => '4'])

                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">

                            <div class="col-xl-12 col-xxl-7 ">
                              <h1 >

                                {{ __('sentences.alert1') }}
                              </h1>

                              <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                <div>
                                    <a href="{{route('user.register5')}}" class="btn btn-light-danger font-weight-bold text-uppercase px-9 py-4" >
                                        {{ __('sentences.previous') }}
                                    </a>
                                </div>
                                <div class="mr-2">
                                    <a
                                     href="{{route('student.dashboard')}}"
                                    type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" >

                                        {{ __('sentences.i_see') }}
                                    </a>

                                </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!--end::ویزارد Body-->
            </div>
            <!--end::ویزارد-->
        </div>
        <!--end::ویزارد-->
    </div>
    <!--end::ویزارد-->
</div>
<!--end::ویزارد-->
</div>
</div>
<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!--end::Content-->

@endsection
