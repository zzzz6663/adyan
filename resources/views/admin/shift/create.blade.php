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


                        <form class="form" action="{{route('news.store')}}" id="kt_form"
                            method="post" >
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{__('sentences.new_shift_form')}}

                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>استایل گوشه گرد</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-rounded">
                                                        <input type="checkbox" checked="checked" name="چک باکس ها15_1">
                                                        <span></span>
                                                        {{__('sentences.change_master')}}
                                                    </label>
                                                    <label class="checkbox checkbox-rounded">
                                                        <input type="checkbox" name="چک باکس ها15_1">
                                                        <span></span>
                                                        گزینه 2
                                                    </label>
                                                    <label class="checkbox checkbox-rounded">
                                                        <input type="checkbox" name="چک باکس ها15_1">
                                                        <span></span>
                                                        گزینه 3
                                                    </label>
                                                </div>
                                                <span class="form-text text-muted">می توانید توضیحات در اینجا بنویسید</span>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-news fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.show')}}

                                                </label>
                                                <select name="show" class="form-control  "id="">
                                                    <option value="">     {{__('sentences.select_one')}}</option>
                                                    <option {{old('show')=='1'?'selected':''}} value="1"> {{__('sentences.show')}}</option>
                                                    <option {{old('show')=='0'?'selected':''}} value="0"> {{__('sentences.hide')}}</option>
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-news fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.content')}}

                                                </label>
                                                <textarea name="content" class="form-control  "id="" cols="30" rows="10">{{old('content')}}</textarea>


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
                                            <input type="submit" value="            {{__('sentences.save')}}   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('news.index')}}">          {{__('sentences.back')}}</a>


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
