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


                        <form class="form" action="{{route('quiz.update',$quiz->id)}}" id="kt_form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{ __('sentences.edit_form') }}
                                            {{$quiz->title}}
                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>   {{ __('sentences.quiz_title') }}    </label>
                                                <input type="text" value="{{old('title',$quiz->title)}}" class="form-control" name="title"
                                                    placeholder="  {{ __('sentences.quiz_title') }}  " >
                                                    <span class="form-text text-muted">
                                                        {{ __('sentences.enter_quiz_title') }}
                                                     </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>      {{ __('sentences.question_duration') }}    </label>
                                                <input type="text" value="{{old('duration',$quiz->duration)}}" class="form-control" name="duration"
                                                    placeholder="   {{ __('sentences.question_duration') }}  " >
                                                    <span class="form-text text-muted">
                                                        {{ __('sentences.enter_question_duration') }}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.show_to_user') }}
                                                </label>
                                                <select name="active" class="form-control"  id="">
                                                    <option value="">  {{ __('sentences.select_one') }} </option>
                                                    <option {{old('active',$quiz->active)=='1'?'selected':''}} value="1"> {{ __('sentences.show') }}  </option>
                                                    <option {{old('active',$quiz->active)=='0'?'selected':''}} value="0">  {{ __('sentences.hide') }}  </option>
                                                </select>
                                                <span class="form-text text-muted">
                                                    {{ __('sentences.enter_show_status') }}
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
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
                                            <input type="submit" value="  {{ __('sentences.save') }}    "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('quiz.index')}}">{{ __('sentences.back') }} </a>


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
