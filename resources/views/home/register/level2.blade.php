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
                        @include('home.register.wizard_nav', ['step' => '2'])
                        @include('sections.error')
                        <form class="form" action="{{route('user.register2')}}" id="kt_form" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf

                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">

                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Body-->

                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        {{--  <h3 class="mb-10 font-weight-bold text-dark">کاربر پروفایل جزئیات:</h3>  --}}
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">آواتار</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="image-input image-input-outline" id="kt_مخاطب_add_avatar">
                                                            <div class="image-input-wrapper" id="avatar" style="background-image: url({{$user->avatar?$user->avatar():'assets/media/users/avatar.png'}})"></div>

                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="تغییر آواتار">
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

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>       {{ __('sentences.name') }}</label>
                                                            <input class="form-control form-control-lg form-control-solid" name="firstname" type="text" readonly value="{{$user->name}}">
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>     {{ __('sentences.family') }}</label>
                                                            <input class="form-control form-control-lg form-control-solid" readonly name="lastname" type="text" value="{{$user->family}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>

                                                </div>
                                                <div class="row">
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
                                                    {{--  <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> شماره واتساپ* </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="whatsapp" type="tell" value="{{old('whatsapp',$user->whatsapp)}}">
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>  --}}
                                                </div>
{{--
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> شماره تماس ایرانی
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="mobile" type="tell" value="{{old('mobile',$user->mobile)}}">
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

                                                <div class="row">
                                                    <div class="col-xl-6">

                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> نوع شغل*
                                                            </label>
                                                            <select name="type_job" id="type_job" class="form-control form-control-solid form-control-lg">
                                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                                                <option {{old('type_job',$user->type_job)=='state'?'selected':''}} value="state">شغل دولتی</option>
                                                                <option {{old('type_job',$user->type_job)=='private'?'selected':''}} value="private">شغل خصوصی</option>
                                                            </select>
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> نوع سمت*
                                                            </label>
                                                            <select name="semat_job" id="semat_job" class="form-control form-control-solid form-control-lg">
                                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                                                <option {{old('semat_job',$user->semat_job)=='admin'?'selected':''}} value="admin">مدیر </option>
                                                                <option {{old('semat_job',$user->semat_job)=='staff'?'selected':''}} value="staff">کارمند </option>
                                                                <option {{old('semat_job',$user->semat_job)=='free'?'selected':''}} value="free">آزاد </option>
                                                                <option {{old('semat_job',$user->semat_job)=='none'?'selected':''}} value="none">هیچکدام </option>
                                                            </select>
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> عنوان شغل
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="job" type="text" value="{{old('job',$user->job)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>   سازمان
                                                            </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="org" type="text" value="{{old('org',$user->org)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> کشور سکونت*
                                                            </label>
                                                            <select name="country_id" id="country_id" class="form-control form-control-solid form-control-lg">
                                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                                                @foreach ( App\Models\Country::all() as $country )
                                                                <option {{old('country_id' , $user->country_id) ==$country->id?'selected':""}} value="{{$country->id}}">{{$country->fa_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> شهر سکونت * </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="city" type="text" value="{{old('city',$user->city)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> استان سکونت * </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="province" type="text" value="{{old('province',$user->province)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> رشته کارشناسی
                                                                * </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="master_course" type="text" value="{{old('master_course',$user->master_course)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> دانشگاه کارشناسی * </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="master_univer" type="text" value="{{old('master_univer',$user->master_univer)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <!--begin::ورودی-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label> رمز عبور * </label>
                                                            <input class="form-control form-control-lg form-control-solid" name="password" type="text" value="{{old('password',$user->password)}}">

                                                        </div>
                                                        <!--end::ورودی-->
                                                    </div>
                                                </div>  --}}

                                            </div>


                                        </div>
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
