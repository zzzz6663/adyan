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


                        <form class="form" action="{{route('admin.basic.info1')}}" id="kt_form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{__('sentences.cuet_new_form')}}

                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  نام  </label>
                                                <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                                    placeholder="     {{__('sentences.name')}} " >
                                                <span class="form-text text-muted">
                                                                نام را وارد کنید
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  نام خانوادگی  </label>
                                                <input type="text" value="{{old('family')}}" class="form-control" name="family"
                                                    placeholder="     {{__('sentences.family')}} " >
                                                <span class="form-text text-muted">
                                                                نام خانوادگی را وارد کنید
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  کد دانشجو  </label>
                                                <input type="text" value="{{old('code')}}" class="form-control" name="code"
                                                    placeholder="     {{__('sentences.code')}} " >
                                                <span class="form-text text-muted">
                                                    کد دانشجویی راواردکنید
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    {{__('sentences.title')}}  </label>
                                                <input type="text" value="{{old('title')}}" class="form-control" name="title"
                                                    placeholder="     {{__('sentences.title')}} " >
                                                <span class="form-text text-muted">
                                                    {{__('sentences.enter_title')}}
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>       {{__('sentences.tags')}}    </label>
                                                <select name="tags[]" id="" class="form-control select2_tag" multiple="multiple">
                                                    <option disabled="disabled" value="">{{__('sentences.select_one')}}</option>
                                                    @foreach (App\Models\Tag::all() as $tag)
                                                    <option {{in_array($tag->id ,old('tags',[]))?'selected':''}} value="{{$tag->id}}">{{$tag->tag}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>


                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    {{__('sentences.problem')}}     </label>
                                                <textarea class="form-control"  name="problem" rows="3">{{old('problem')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>     {{__('sentences.question')}}  </label>
                                                <textarea class="form-control"  name="question" rows="3">{{old('question')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    {{__('sentences.necessity')}}         </label>
                                                <textarea class="form-control"  name="necessity" rows="3">{{old('necessity')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>     {{__('sentences.innovation')}}    </label>
                                                <textarea class="form-control" name="innovation" rows="3">{{old('innovation')}}</textarea>
                                            </div>
                                        </div>



                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.guid_master')}}
                                                </label>
                                                <select name="master_id"  id="ostad"  class="form-control  select2">
                                                    <option value="">  {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option {{old('master_id')==$master->id ? 'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.enter_group_name')}}

                                                </label>
                                                <select name="group_id"  class="form-control  ">
                                                    <option value="">   {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\Group::all() as $group )
                                                   <option {{old('group_id',[])==$group->id?'selected':''}} value="{{$group->id}}">{{$group->name}} </option>
                                                    @endforeach
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.select_guid_master')}}
                                                </label>
                                                <select name="guid_id"    class="form-control  select2">
                                                    <option value="">  {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option {{old('guid_id')==$master->id ? 'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.fail_reason')}}

                                                </label>
                                                <textarea class="form-control" name="fail_reason" id="">{{old('fail_reason')}}</textarea>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
سابقه

                                                </label>
                                                <textarea class="form-control" name="history" id="">{{old('history')}}</textarea>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.status')}}

                                                </label>
                                                <select name="status"  class="form-control select2 ">
                                                    <option value="">   {{__('sentences.select_one')}} </option>
                                                    <option {{old('status')=='no_verifyed'?'selected':''}} value="no_verifyed">       بررسی نشده  </option>
                                                    <option {{old('status')=='verify_by_group'?'selected':''}} value="verify_by_group">         طرح اجمالی اصلاح شده  </option>
                                                    <option {{old('status')=='faild'?'selected':''}} value="faild">     رد شده  </option>
                                                    <option {{old('status')=='accept_with_guid_with_plan'?'selected':''}} value="accept_with_guid_with_plan">      تایید شده با استاد راهنما با تفصیلی
                                                      </option>
                                                    <option {{old('status')=='accept_with_guid_without_plan'?'selected':''}} value="accept_with_guid_without_plan">      تایید شده با استاد راهنما بدون  تفصیلی    </option>
                                                    <option {{old('status')=='accept_without_guid'?'selected':''}} value="accept_without_guid">     تایید شده بدون استاد راهنما    </option>
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
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
                                            <input type="submit" value="    {{__('sentences.save')}}    "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('agent.index')}}">  {{__('sentences.back')}} </a>


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
