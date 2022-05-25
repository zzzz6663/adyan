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


                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin::ویزارد Form-->
                                <h1>
                                    {{ __('sentences.new_shift_form') }}

                                </h1>
                                <br>
                                <br>
                                <!--begin::ویزارد گام 1-->
                                <div class="row">

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label> {{__('sentences.name')}} </label>

                                            <span class="form-text text-muted">
                                                <a href="{{route('agent.profile',$shift->user->id)}}">
                                                    <span>
                                                        {{$shift->user->name}}
                                                        {{$shift->user->family}}
                                                    </span>
                                                   </a>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label> {{__('sentences.reuest_type')}} </label>

                                            <span class="form-text text- ">
                                               @if ($shift->change_master)
                                               {{__('sentences.change_master')}} -
                                               @endif
                                               @if ($shift->change_guid)
                                               {{__('sentences.change_guid')}} -
                                               @endif
                                               @if ($shift->change_title)
                                               {{__('sentences.change_title')}} -
                                               @endif
                                               @if ($shift->change_group)
                                               {{__('sentences.change_group')}} -
                                               @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label> {{__('sentences.request_title')}} </label>

                                            <span class="form-text text-">
                                                    {{
                                                        $shift->request
                                                    }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form" action="{{ route('shift.update',$shift->id) }}" id="kt_form"
                                            method="post">
                                            @csrf
                                            @method('patch')
                                            <!--begin::ویزارد اقدامات-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div>
                                                    <input type="submit" name="accept" value=" {{ __('sentences.confirm') }}   "
                                                        class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                    <input type="submit" name="reject" value=" {{ __('sentences.reject') }}   "
                                                        class="btn btn-danger font-weight-bold text-uppercase px-9 py-4">
                                                    <a class="btn btn-warning font-weight-bold text-uppercase px-9 py-4"
                                                        href="{{ route('user.note') }}"> {{ __('sentences.back') }}</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end::ویزارد اقدامات-->


                        <!--end::ویزارد Form-->
                    </div>



                </div>
                <!--end::ویزارد Body-->
            </div>


        </div>
        <!--end::ویزارد-->
    </div>
</div>
@endsection
