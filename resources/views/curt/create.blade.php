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
                 

                        <form class="form" action="{{route('curt.store')}}" id="kt_form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            فرم تعریف  طرح اجمالی
                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> عنوان  </label>
                                                <input type="text" value="{{old('title')}}" class="form-control" name="title"
                                                    placeholder="  عنوان " >
                                                <span class="form-text text-muted">لطفا   عنوان  خود را وارد
                                                    کنید.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> کلمات کلیدی    </label>
                                                <div class="input-group">
                                                    <input type="text" id="ex_p" class="form-control" placeholder="جستجو ...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary" id="add_ex1" type="button">اضافه کردن</button>
                                                    </div>
                                                </div>
                                                <div class="fv-plugins-message-container" id="tags">
                                                    {{--  <span type="button" class="btn self btn-outline-success mr-2">
                                                        ssss
                                                        <input type="text" name="expert[]" hidden>
                                                    </span>  --}}
                                                    @foreach (old('tags',[]) as $tag )
                                                    <span type="button" class="btn self btn-outline-success mr-2">
                                                        {{$tag}}
                                                        <input type="text" name="tags[]" hidden="" value="{{$tag}}">
                                                         </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>


                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    بیان مساله  </label>
                                                <textarea class="form-control"  name="problem" rows="3">{{old('problem')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>      سوال اصلی  </label>
                                                <textarea class="form-control"  name="question" rows="3">{{old('question')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>        ضرورت  </label>
                                                <textarea class="form-control"  name="necessity" rows="3">{{old('necessity')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>        جنبه نوآوری  </label>
                                                <textarea class="form-control" name="innovation" rows="3">{{old('innovation')}}</textarea>
                                            </div>
                                        </div>



                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>استاد پیشنهادی


                                                </label>
                                                <select name="ostad_id[]"  id="ostad" multiple class="form-control  select2">
                                                    <option value="">یک مورد  را  انتخاب کنید </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option {{in_array($master->id ,old('ostad_id',[]))?'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                    <option {{in_array(9999999999 ,old('ostad_id',[]))?'selected':''}} value="9999999999">استاد جدید</option>
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row {{(in_array('9999999999',old('ostad_id',[]))&& sizeof(old('ostad_id',[]))==1)?'':'hide'}}"  id="ostad_port"  >

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> نام استاد پیشنهادی  </label>
                                                <input type="text" value="{{old('ostad')}}" class="form-control" name="ostad"
                                                    placeholder="  عنوان " >
                                                <span class="form-text text-muted">
                                                    نام استاد پیشنهادی خود را وارد  کنید
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> رزومه  </label>
                                                <input type="file"  class="form-control" name="resume"
                                                    placeholder="  عنوان " >
                                                <span class="form-text text-muted">
                                                    لطفا فایل رزومه استاد خود را انتخاب کنید
                                                </span>
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
                                            <input type="submit" value="  دخیره   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('agent.index')}}">برکشت</a>


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
