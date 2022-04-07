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


                            <form class="form" action="{{ route('survey.update', $survey->id) }}" id="kt_form"
                                method="post">
                                @csrf
                                @method('patch')
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-7">
                                        <!--begin::ویزارد Form-->
                                        <h1>
                                            {{ __('sentences.edit_survey_form') }}

                                        </h1>
                                        <br>
                                        <br>
                                        <!--begin::ویزارد گام 1-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group fv-plugins-icon-container">
                                                    {{ __('sentences.survey_name') }}:
                                                    {{ $survey->name }}
                                                    <br>
                                                    {{ __('sentences.by') }}:
                                                    {{ $survey->user->name }}
                                                    {{ $survey->user->family }}


                                                </div>
                                            </div>


                                            <div class="col-xl-6">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>
                                                        {{ __('sentences.result') }}

                                                    </label>
                                                    <textarea name="info" class="form-control" id="" cols="30" rows="5">{{ old('info') }}</textarea>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div>




                                        </div>
                                        @foreach ($survey->curts as $curt )
                                        <h1>{{$loop->iteration}}-
                                            {{ $curt->title }}</h1>
                                        <div class="row">
                                            {{-- <div class="col-lg-4">
                                                <span class="title"> {{ __('sentences.title') }}:</span>
                                                <span class="content">{{ $curt->title }}</span>
                                            </div> --}}
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.problem') }}:</span>
                                                <span class="content">{{ $curt->problem }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.question') }}:</span>
                                                <span class="content">{{ $curt->question }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.necessity') }}:</span>
                                                <span class="content">{{ $curt->necessity }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.innovation') }}:</span>
                                                <span class="content">{{ $curt->innovation }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.tags') }}:</span>
                                                <span class="content">{{ implode(' ',$curt->tags()->pluck('tag')->toArray()) }}</span>
                                            </div>
                                        </div>
                                        <br>
                                        @endforeach


                                        @foreach ($survey->plans as $plan )
                                        <h1>{{$loop->iteration}}-
                                            {{ $plan->title }}</h1>
                                        <div class="row">
                                            {{-- <div class="col-lg-4">
                                                <span class="title"> {{ __('sentences.title') }}:</span>
                                                <span class="content">{{ $curt->title }}</span>
                                            </div> --}}
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.en_title') }}:</span>
                                                <span class="content">{{ $plan->en_title }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.en_tags') }}:</span>
                                                <span class="content">
                                                    {{implode(explode('_',$plan->en_tags)) }}
                                                </span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.tags') }}:</span>
                                                <span class="content">{{implode(explode('_',$plan->tags)) }}</span>
                                            </div>

                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.problem') }}:</span>
                                                <span class="content">{{ $plan->problem }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.necessity') }}:</span>
                                                <span class="content">{{ $plan->necessity }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.question') }}:</span>
                                                <span class="content">{{ $plan->question }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.sub_question') }}:</span>
                                                <span class="content">{{ $plan->sub_question }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.hypo') }}:</span>
                                                <span class="content">{{ $plan->hypo }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.theory') }}:</span>
                                                <span class="content">{{ $plan->theory }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.structure') }}:</span>
                                                <span class="content">{{ $plan->structure }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.method') }}:</span>
                                                <span class="content">{{ $plan->method }}</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.source') }}:</span>
                                                <span class="content">{{ $plan->source }}</span>
                                            </div>

                                            {{-- <div class="col-lg-3">
                                                <span class="title"> {{ __('sentences.tags') }}:</span>
                                                <span class="content">{{ implode(' ',$plan->tags()->pluck('tag')->toArray()) }}</span>
                                            </div> --}}
                                        </div>
                                        <br>
                                        @endforeach


                                        <!--begin::ویزارد اقدامات-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            {{-- <div>
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">
                                                تایید
                                            </button>
                                        </div> --}}
                                            <div>
                                                <input type="submit" value="            {{ __('sentences.save') }}   "
                                                    class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                    href="{{ route('survey.index') }}"> {{ __('sentences.back') }}</a>


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
