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


                        <form class="form" action="{{route('session.store')}}" id="kt_form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            فرم تعریف  جلسه جدید
                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label> نام جلسه   </label>
                                                <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                                    placeholder="  عنوان " >
                                                <span class="form-text text-muted">لطفا   عنوان  خود را وارد
                                                    کنید.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>   تاریخ جلسه   </label>
                                                <input type="text" value="{{old('time')}}" class="form-control persian" name="time"
                                                    placeholder="  عنوان " >
                                                <span class="form-text text-muted">لطفا   عنوان  خود را وارد
                                                    کنید.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>




                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>انتخاب استاتید
                                                </label>
                                                <select name="users[]"   multiple class="form-control  select2">
                                                    <option value="">یک مورد  را  انتخاب کنید </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option {{in_array($master->id ,old('masters',[]))?'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>انتخاب طرح ها
                                                </label>
                                                <select name="curts[]"   multiple class="form-control  select2">
                                                    <option value="">یک مورد  را  انتخاب کنید </option>
                                                    @foreach ($curts as $curt )
                                                   <option {{in_array($curt->id ,old('curts',[]))?'selected':''}} value="{{$curt->id}}">
                                                    {{$curt->title}}
                                                 (
                                                     {{$curt->user->name}}
                                                     {{$curt->user->family}}

                                                 )

                                                </option>
                                                    @endforeach
                                                </select>
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
                                            <input type="submit" value="  دخیره   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('session.index')}}">برکشت</a>


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
