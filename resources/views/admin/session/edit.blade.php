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


                        <form class="form" action="{{route('admin.session.update2',$session->id)}}" id="kt_form"
                            method="post" >
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
                                                <input type="text" value="{{old('name',$session->name)}}" class="form-control" name="name"
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
                                                <input type="text" value="{{old('time',$session->name)}}" class="form-control persian" name="time"
                                                    placeholder="    {{ __('sentences.session_date') }}  " >
                                                    {{-- <span class="form-text text-muted">
                                                        {{ __('sentences.session_date') }}
                                                    </span> --}}
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>




                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                @if ($group)
                                                <input type="text" hidden value="{{$group}}" name="group_id">
                                                @endif
                                                <label>
                                                    {{ __('sentences.select_master') }}
                                                </label>
                                                <select name="users[]"   id="select_master"    multiple class="form-control  select3">
                                                    <option disabled value="">           {{ __('sentences.select_one') }} </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master )
                                                   <option  {{in_array($master->id ,old('masters',$session->masters()->pluck('id')->toArray()))?'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.select_curt') }} (ترتیب قدیم به جدید)
                                                </label>
                                                <select name="curts[]"  id="select_curt"    multiple class="form-control  select4">
                                                    <option disabled value="">  {{ __('sentences.select_one') }}</option>
                                                    @foreach ($curts as $curt )
                                                   <option
                                                    {{-- data-select2-id="{{$curt->id}}"
                                                     locked="{{$curt->side || $curt->status=='accept_without_master'? 'locked':''}}" --}}
                                                      {{-- {{ $curt->side ? ' disabled':''}}
                                                        {{ $curt->status=='accept_without_master'? ' disabled':''}} --}}
                                                         {{in_array($curt->id ,old('curts',$session->curts()->pluck('id')->toArray()))?'selected':''}}
                                                         value="{{$curt->id}}">
                                                    {{-- {{$curt->status}}
                                                    {{$curt->id}} --}}
                                                    {{$curt->title}}
                                                 (
                                                     {{$curt->user->name}}
                                                     {{$curt->user->family}}
                                                     -
                                                     {{$curt->user->code}}
                                                 )

                                                </option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.select_subject') }}
                                                </label>
                                                <select name="subjects[]"  id="select_subject"   multiple class="form-control  select5">
                                                    <option disabled value="">  {{ __('sentences.select_one') }}</option>
                                                    @foreach ($subjects as $subject )
                                                   <option  data-select2-id="{{$subject->id}}"  locked="{{$subject->time? 'locked':''}}"    {{in_array($subject->id ,old('subjects',$session->subjects()->pluck('id')->toArray()))?'selected':''}} value="{{$subject->id}}">
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

                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{ __('sentences.select_plan') }} (ترتیب قدیم به جدید)
                                                </label>
                                                <select name="plans[]" id="select_plan"  multiple class="form-control  select6">
                                                    <option disabled value="">  {{ __('sentences.select_one') }}</option>
                                                    @foreach ($plans as $plan )

                                                   <option   {{in_array($plan->id ,old('plans',$session->plans()->pluck('id')->toArray()))?'selected':''}} value="{{$plan->id}}">
                                                    {{-- {{$plan->id}}
                                                    {{$plan->status}} --}}
                                                    {{$plan->title}}
                                                 (
                                                     {{$plan->user->name}}
                                                     {{$plan->user->family}}
                                                     -
                                                     {{$plan->user->code}}

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
