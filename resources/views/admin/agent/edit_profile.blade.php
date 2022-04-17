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


                        <form class="form" action="{{route('user.edit.profile',$user->id)}}" id="kt_form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{__('sentences.edit_form')}}
                                            {{$user->name}}
                                            {{$user->family}}

                                        </h1>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">   {{__('sentences.avatar')}}</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="image-input image-input-outline" id="kt_مخاطب_add_avatar">
                                                    <div class="image-input-wrapper" id="avatar" style="background-image: url({{$user->avatar()}})"></div>

                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="تغییر  ">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" id="avatarinp" name="avatar" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="profile_avatar_remove">
                                                    </label>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="لغو avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  {{__('sentences.name')}}  </label>
                                                <input type="text" value="{{old('name',$user->name)}}" class="form-control" name="name"
                                                    placeholder="   {{__('sentences.name')}} " >
                                                <span class="form-text text-muted">  {{__('sentences.enter_name')}}
                                                   </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  {{__('sentences.family')}}   </label>
                                                <input type="text" value="{{old('family',$user->family)}}" class="form-control" name="family"
                                                    placeholder="   {{__('sentences.family')}}  " >
                                                    <span class="form-text text-muted">  {{__('sentences.enter_family')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        @role('student|admin')
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> *
                                                    {{ __('sentences.group') }}
                                                </label>
                                                <input class="form-control form-control-lg form-control-solid" name="group" type="text" value="{{old('group',$user->group)}}">
                                            </div>
                                            <!--end::ورودی-->
                                        </div>


                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.whatsapp') }}
                                                </label>
                                                <input class="form-control form-control-lg form-control-solid" name="whatsapp" type="number" value="{{old('whatsapp',$user->whatsapp)}}">
                                            </div>
                                            <!--end::ورودی-->
                                        </div>


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

                                        @endrole
                                        @role('admin')
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> {{__('sentences.defend_status')}}   </label>
                                                <select class="form-control "  name="defend" id="">
                                                    <option {{old('defend',$user->defend)=='1' ?'selected':''}} value="1">{{__('sentences.defended')}} </option>
                                                    <option {{old('defend',$user->defend)=='0' ?'selected':''}} value="0">{{__('sentences.undefended')}} </option>
                                                </select>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        @endrole


                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> {{__('sentences.email')}}   </label>
                                                <input type="email" class="form-control" name="email" placeholder=" {{__('sentences.email')}}   "
                                                    value="{{old('email',$user->email)}}">
                                                    <span class="form-text text-muted">
                                                        {{__('sentences.enter_email')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    *
                                                    {{ __('sentences.password') }}
                                                </label>
                                                <input class="form-control form-control-lg form-control-solid" name="password" type="text" value="{{old('password',$user->password)}}">

                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    *
                                                    {{ __('sentences.password') }}
                                                </label>
                                                <input class="form-control form-control-lg form-control-solid" name="password_confirmation" type="text" value="{{old('password_confirmation',$user->password)}}">

                                            </div>
                                            <!--end::ورودی-->
                                        </div>

                                        {{-- <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> {{__('sentences.group')}}  </label>
                                                <select name="group" class="form-control">
                                                    <option value="">         {{__('sentences.select_one')}}      </option>
                                                    <option {{old('group',$user->group)=='g1'?'selected':''}} value="g1">گروه یک</option>
                                                    <option {{old('group',$user->group)=='g2'?'selected':''}} value="g2">گروه دو</option>
                                                    <option {{old('group',$user->group)=='g3'?'selected':''}} value="g3">گروه سه</option>
                                                </select>

                                                <span class="form-text text-muted">
                                                    {{__('sentences.select_group')}}
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div> --}}
                                        @role('expert|master')
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  {{__('sentences.course')}}   </label>
                                                <input type="text" class="form-control" name="course" placeholder=" {{__('sentences.course')}}   "
                                                    value="{{old('course',$user->course)}}">
                                                    <span class="form-text text-muted">
                                                        {{__('sentences.enter_course')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>          {{__('sentences.specialty')}}    </label>
                                                <div class="input-group">
                                                    <input type="text" id="ex_p" class="form-control" placeholder="   {{__('sentences.search')}} ...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary" id="add_ex" type="button">     {{__('sentences.add')}}</button>
                                                    </div>
                                                </div>
                                                <div class="fv-plugins-message-container" id="tags">
                                                    {{--  <span type="button" class="btn self btn-outline-success mr-2">
                                                        ssss
                                                        <input type="text" name="expert[]" hidden>
                                                    </span>  --}}
                                                    @foreach (old('expert',explode('_',$user->expert)) as $tags )
                                                    <span type="button" class="btn self btn-outline-success mr-2">
                                                        {{$tags}}
                                                        <input type="text" name="expert[]" hidden="" value="{{$tags}}">
                                                         </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        @endrole

                                    </div>
                                    <!--end::ویزارد گام 1-->


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
                                            <input type="submit" value="     {{__('sentences.save')}}   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('agent.index')}}">   {{__('sentences.back')}}</a>

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
