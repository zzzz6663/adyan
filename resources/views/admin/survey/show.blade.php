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
                                                    @foreach ($survey->curts as $curt )
                                                    <span>
                                                        {{ $curt->title }}</span> ------
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group fv-plugins-icon-container">
                                                    @foreach ($survey->plans as $plan )
                                                    <span>
                                                        {{ $plan->title }}</span> ------
                                                    @endforeach
                                                </div>
                                            </div>





                                        </div>


                                            <div class="row">
                                         @foreach ($survey->users as $user )

                                                <div class="col-lg-4">
                                                    <span class="title">

                                                         {{$user ->family}}
                                                         {{$user ->name}}:
                                                    </span>
                                                @if ($res=$user ->surveys()->where('survey_id', $survey->id)->first())

                                                    <span class="content">
                                                        @if ( $res->pivot->time)
                                                       ( {{Morilog\Jalali\Jalalian::forge($res->pivot->time)->format('d-m-Y')}})
                                                        @endif
                                                    <br>
                                                        {{ $res->pivot->info }}

                                                    </span>
                                                @endif

                                                </div>

                                                @endforeach ($survey->users)

                                            </div>

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

                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                    href="{{ url()->previous() }}
                                                    "> {{ __('sentences.back') }}</a>


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
