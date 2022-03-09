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


                        <form class="form" action="{{route('agent.update',$user->id)}}" id="kt_form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
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
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  {{__('sentences.code')}} </label>
                                                <input type="number" class="form-control" name="code" placeholder="{{__('sentences.code')}}  "
                                                    value="{{old('code',$user->code)}}">
                                                    <span class="form-text text-muted">  {{__('sentences.user_code')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> {{__('sentences.mobile')}}  </label>
                                                <input type="number" class="form-control" name="mobile" placeholder=" {{__('sentences.mobile')}}  "
                                                    value="{{old('mobile',$user->mobile)}}">
                                                    <span class="form-text text-muted">  {{__('sentences.enter_mobile')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> {{__('sentences.mobile')}}   </label>
                                                <input type="email" class="form-control" name="email" placeholder=" {{__('sentences.mobile')}}   "
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
                                                <label>    {{__('sentences.password')}} </label>
                                                <input type="text" class="form-control" name="password" placeholder="    {{__('sentences.password')}} "
                                                    value="{{old('pasword',$user->password)}}">
                                                    <span class="form-text text-muted">
                                                        {{__('sentences.enter_password')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>

                                        <div class="col-xl-6">
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
                                        </div>
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
                                                <label>       {{__('sentences.level')}}   </label>
                                                <select name="level" class="form-control">
                                                    <option value="">      {{__('sentences.select_one')}}  </option>
                                                    <option {{old('level',$user->level)=='master'?'selected':''}} value="master">    {{__('sentences.master')}} </option>
                                                    {{--  <option {{old('level',$user->level)=='manager'?'selected':''}} value="manager">  مدیر گروه</option>  --}}
                                                    <option {{old('level',$user->level)=='expert'?'selected':''}} value="expert">   {{__('sentences.expert')}}</option>
                                                </select>

                                                <span class="form-text text-muted">
                                                    {{__('sentences.select_group')}}
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
