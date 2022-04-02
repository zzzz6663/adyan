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
                        @include('sections.error')
                        <form class="form" action="{{route('user.register4')}}" id="kt_form" method="post" >
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
                                                            <label>

                                                                {{ __('sentences.job_type') }}
                                                                *
                                                            </label>
                                                            <select name="type_job" id="type_job" class="form-control form-control-solid form-control-lg">
                                                                <option value="">  {{ __('sentences.select_one') }} </option>
                                                                <option {{old('type_job',$user->type_job)=='state'?'selected':''}} value="state">    {{ __('sentences.state') }}</option>
                                                                <option {{old('type_job',$user->type_job)=='private'?'selected':''}} value="private">  {{ __('sentences.private') }}</option>
                                                                <option {{old('type_job',$user->type_job)=='freelance'?'selected':''}} value="freelance">  {{ __('sentences.freelance') }}    </option>
                                                                <option {{old('type_job',$user->type_job)=='homemaker'?'selected':''}} value="homemaker"> {{ __('sentences.homemaker') }} </option>
                                                                <option {{old('type_job',$user->type_job)=='unemployed'?'selected':''}} value="unemployed">{{ __('sentences.unemployed') }}  </option>
                                                            </select>
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                {{ __('sentences.semat_job') }}
                                                                *
                                                            </label>
                                                            <select name="semat_job" id="semat_job" class="form-control form-control-solid form-control-lg">
                                                                <option value="">   {{ __('sentences.select_one') }}</option>
                                                                <option {{old('semat_job',$user->semat_job)=='admin'?'selected':''}} value="admin">{{ __('sentences.admin') }}  </option>
                                                                <option {{old('semat_job',$user->semat_job)=='staff'?'selected':''}} value="staff">{{ __('sentences.staff') }}  </option>
                                                                <option {{old('semat_job',$user->semat_job)=='free'?'selected':''}} value="free">{{ __('sentences.free') }}  </option>
                                                                <option {{old('semat_job',$user->semat_job)=='none'?'selected':''}} value="none">{{ __('sentences.none') }}  </option>
                                                            </select>
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                {{ __('sentences.job') }}

                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="job" type="text" value="{{old('job',$user->job)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                {{ __('sentences.org') }}
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="org" type="text" value="{{old('org',$user->org)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>

                                                                 *
                                                                 {{ __('sentences.country') }}
                                                            </label>
                                                            <select name="country_id" id="country_id" class="form-control form-control-solid form-control-lg">
                                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                                                @foreach ( App\Models\Country::orderBy('fa_name')->get() as $country )
                                                                <option {{old('country_id' , $user->country_id) ==$country->id?'selected':""}} value="{{$country->id}}">{{$country->fa_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                *
                                                                {{ __('sentences.city') }}
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="city" type="text" value="{{old('city',$user->city)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                *
                                                                {{ __('sentences.province') }}
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="province" type="text" value="{{old('province',$user->province)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                *
                                                                {{ __('sentences.master_course') }}
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="master_course" type="text" value="{{old('master_course',$user->master_course)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>
                                                                *
                                                                {{ __('sentences.master_univer') }}
                                                             </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="master_univer" type="text" value="{{old('master_univer',$user->master_univer)}}">

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
                                            <a href="{{route('user.register3')}}" class="btn btn-light-danger font-weight-bold text-uppercase px-9 py-4" >
                                                {{ __('sentences.previous') }}
                                            </a>
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
