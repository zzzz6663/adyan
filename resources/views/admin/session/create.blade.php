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
                                            {{ __('sentences.session_new_form') }}

                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    {{ __('sentences.name') }}   </label>
                                                <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                                    placeholder="   {{ __('sentences.name') }} " >
                                                {{-- <span class="form-text text-muted">
                                                    {{ __('sentences.enter_session_name') }}
                                                </span> --}}
                                                {{-- <span class="form-text text-muted">
                                                    {{ __('sentences.session_date') }}
                                                </span> --}}
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>      {{ __('sentences.session_date') }}   </label>
                                                <input type="text" value="{{old('time')}}" class="form-control persian" name="time"
                                                    placeholder="    {{ __('sentences.session_date') }}  " >
                                                    {{-- <span class="form-text text-muted">
                                                        {{ __('sentences.session_date') }}
                                                    </span> --}}
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>




                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                @if ($group)
                                                <input type="text" hidden value="{{$group}}" name="group_id">
                                                @endif
                                                <label>
                                                    {{ __('sentences.select_master') }}
                                                </label>
                                                <select name="users[]"   multiple class="form-control  select2">
                                                    <option disabled value="">           {{ __('sentences.select_one') }} </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option {{in_array($master->id ,old('masters',[]))?'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.select_curt') }}
                                                </label>
                                                <select name="curts[]"   multiple class="form-control  select2">
                                                    <option disabled value="">  {{ __('sentences.select_one') }}</option>
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

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.select_subject') }}
                                                </label>
                                                <select name="subjects[]"   multiple class="form-control  select2">
                                                    <option disabled value="">  {{ __('sentences.select_one') }}</option>
                                                    @foreach ($subjects as $subject )
                                                   <option {{in_array($subject->id ,old('subjectss',[]))?'selected':''}} value="{{$subject->id}}">
                                                    {{$subject->title}}
                                                 (
                                                     {{$subject->master->name}}
                                                     {{$subject->master->family}}

                                                 )

                                                </option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.select_plan') }}
                                                </label>
                                                <select name="plans[]"   multiple class="form-control  select2">
                                                    <option disabled value="">  {{ __('sentences.select_one') }}</option>
                                                    @foreach ($plans as $plan )
                                                   <option {{in_array($plan->id ,old('plans',[]))?'selected':''}} value="{{$plan->id}}">
                                                    {{$plan->title}}
                                                 (
                                                     {{$plan->user->name}}
                                                     {{$plan->user->family}}

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
                                            <input type="submit" value="    {{ __('sentences.save') }}   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('session.index')}}">  {{ __('sentences.back') }}</a>


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
