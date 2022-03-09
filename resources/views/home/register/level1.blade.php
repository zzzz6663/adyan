
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

                        @include('home.register.wizard_nav', ['step' => '1'])
                        <!--begin::ویزارد Body-->
                        @include('sections.error')


                        @if(request('confirm'))
                        <form class="form" action="{{route('user.register1',['yes'=>request('code')])}}" id="kt_form" method="post">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->

                                    <!--begin::ویزارد گام 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h1 class="mb-10 font-weight-bold text-dark">

                                            {{ __('sentences.confirm_student_code') }}

                                        </h1>
                                        <h3>
                                            <br>
                                            @php(     $code=  App\Models\Code::whereCode(request('code'))->first())
                                            {{-- کد دانشجویی وارد شده
                                            ({{$code->code}})
                                            مربوط  به

                                            {{$code->name}}
                                            {{$code->family}} می باشد --}}
                                            {{ __('sentences.code_alert1',['code'=>$code->code,'student'=>$code->name.' '.$code->family]) }}
                                            <br>
                                            {{ __('sentences.code_question') }}



                                        </h3>
                                        <h3 style="text-align: center; color:red">
                                            {{ __('sentences.code_alert2') }}
                                        </h3>
                                            <input type="text" hidden value="{{$code->code}}" name="code">




                                    </div>
                                    <!--end::ویزارد گام 1-->


                                    <!--begin::ویزارد اقدامات-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">

                                                {{ __('sentences.previous') }}
                                            </button>
                                        </div>
                                        <div>
                                            <input type="submit" value="  {{ __('sentences.i_confirm') }}" name="yes" class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            <a href="{{route('user.register1')}}" class="btn btn-danger font-weight-bold text-uppercase px-9 py-4">   {{ __('sentences.i_reject') }}  </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::ویزارد اقدامات-->
                        </form>
                        @else
                        <form class="form" action="{{route('user.register1')}}" id="kt_form" method="post">
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->

                                    @csrf
                                    @method('post')
                                    <!--begin::ویزارد گام 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h3 class="mb-10 font-weight-bold text-dark">
                                            {{ __('sentences.inquiry_code') }}
                                        </h3>
                                        <!--begin::ورودی-->
                                        <div class="form-group">
                                            <label> کد</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" name="code" value="{{old('code')}}" />
                                            <span class="form-text text-muted">
                                                {{ __('sentences.enter_code') }}
                                            </span>
                                        </div>
                                        <!--end::ورودی-->

                                    </div>
                                    <!--begin::ویزارد اقدامات-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                                {{ __('sentences.previous') }}
                                            </button>
                                        </div>
                                        <div>
                                            <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                                {{ __('sentences.send') }}
                                            </button>
                                            <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">

                                                {{ __('sentences.next') }}
                                            </button>
                                        </div>
                                    </div>
                                    <!--end::ویزارد اقدامات-->
                                </div>

                            </div>
                            <!--end::ویزارد گام 1-->



                        </form>
                        @endif

                        <!--end::ویزارد Form-->
                    </div>
                </div>
                <!--end::ویزارد Body-->
            </div>
            <!--end::ویزارد-->
        </div>
        <!--end::ویزارد-->
    </div>
</div>

@endsection
