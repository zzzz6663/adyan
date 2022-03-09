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
                <div class="card-body p-0">
                    <!--begin::ویزارد-->
                    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first"
                        data-wizard-clickable="false">

                        @include('sections.error')


                        <form class="form" action="{{route('quiz.question.store',$quiz->id)}}" id="kt_form"
                            method="post" >
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{ __('sentences.new_question_form') }}

                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    {{ __('sentences.question_title') }}    </label>
                                                <input type="text" value="{{old('question')}}" class="form-control" name="question"
                                                    placeholder="   {{ __('sentences.question_title') }}  " >
                                                <span class="form-text text-muted">
                                                    {{ __('sentences.enter_question') }}
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>            {{ __('sentences.a1') }}   </label>
                                                <input type="text" value="{{old('a1')}}" class="form-control" name="a1"
                                                    placeholder="    {{ __('sentences.a1') }}  " >
                                                    <span class="form-text text-muted">
                                                        {{ __('sentences.enter_a1') }}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>      {{ __('sentences.a2') }}    </label>
                                                <input type="text" value="{{old('a2')}}" class="form-control" name="a2"
                                                    placeholder="    {{ __('sentences.a2') }}  " >
                                                <span class="form-text text-muted">
                                                    {{ __('sentences.enter_a2') }}
                                                     .</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>      {{ __('sentences.a3') }}    </label>
                                                <input type="text" value="{{old('a3')}}" class="form-control" name="a3"
                                                    placeholder="   {{ __('sentences.a3') }} " >
                                                <span class="form-text text-muted">
                                                    {{ __('sentences.enter_a3') }}
                                                     .</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>      {{ __('sentences.a4') }}   </label>
                                                <input type="text" value="{{old('a4')}}" class="form-control" name="a4"
                                                    placeholder="   {{ __('sentences.a4') }} " >
                                                <span class="form-text text-muted">
                                                    {{ __('sentences.enter_a4') }}
                                                     .</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>              {{ __('sentences.answer') }}      </label>
                                                <select name="answer" id="" class="form-control">
                                                    <option value="">  {{ __('sentences.select-one') }} </option>
                                                    <option  {{old('answer')=='1'?'selected':''}} value="1">{{ __('sentences.g1')}}</option>
                                                    <option  {{old('answer')=='2'?'selected':''}} value="2">  {{__('sentences.g2')}}</option>
                                                    <option  {{old('answer')=='3'?'selected':''}} value="3">  {{__('sentences.g3')}}</option>
                                                    <option  {{old('answer')=='4'?'selected':''}} value="4">  {{__('sentences.g4')}}</option>
                                                </select>
                                            </div>
                                        </div>





                                    </div>


                                    <!--begin::ویزارد اقدامات-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        {{--  <div>
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">
                                                تایید
                                            </button>
                                        </div>  --}}
                                        <div>
                                            <input type="submit" value="  دخیره   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('quiz.question.index',[$quiz->id])}}">برکشت</a>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::ویزارد اقدامات-->
                        </form>


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
