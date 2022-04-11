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


                        <form class="form" action="{{route('admin.define.guid',$curt->id)}}" id="kt_form"
                            method="post" >
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{__('sentences.select_guid')}}

                                        </h1>
                                        <ul>
                                            <li>
                                                <span class="title">  {{__('sentences.student')}} :</span>
                                                <span class="content">
                                                    {{$curt->user->name}}
                                                    {{$curt->user->family}}
                                                </span>
                                            </li>
                                            <li>
                                                <span class="title">  {{__('sentences.title')}} :</span>
                                                <span class="content">
                                                    {{$curt->title}}
                                                </span>
                                            </li>
                                        </ul>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.suggested_master')}}
                                                </label>
                                                <select name="guid_id"  id="ostad"  class="form-control  select2">
                                                    <option value="">  {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option {{$master->id ==old('guid_id',[])?'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                    {{--  <option {{in_array('new' ,old('ostad_id',[]))?'selected':''}} value="new">استاد جدید</option>  --}}

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
