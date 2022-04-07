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


                        <form class="form" action="{{route('survey.store')}}" id="kt_form"
                            method="post"  >
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                        <h1>
                                            {{__('sentences.new_survey_form')}}

                                        </h1>
                                            <br>
                                            <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  {{__('sentences.survey_name')}}  </label>
                                                <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                                    placeholder="   {{__('sentences.survey_name')}} " >
                                                <span class="form-text text-muted">
                                                    {{__('sentences.enter_survey_name')}}
                                                </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.list_curt')}}

                                                </label>
                                                <select name="curts[]" multiple="multiple"   class="form-control  select2">
                                                    <option value="">   {{__('sentences.none')}} </option>
                                                    @foreach (App\Models\User::where('status','curt')->latest()->get() as $student )
                                                    @if (!$student->curt())
                                                    @continue
                                                   @endif

                                                   <option {{in_array($student->id,old('curts',[]))?'selected':''}}  value="{{$student->curt()->id}}">{{$student->name}} {{$student->family}}

                                                   ({{$student->curt()->title}})
                                                 <span class="text txat-" dir="rtl">
                                                    ({{Morilog\Jalali\Jalalian::forge($student->curt()->created_at)->format('Y-m-d')}})
                                                 </span>


                                                </option>
                                                    @endforeach
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.list_plan')}}

                                                </label>
                                                <select name="plans[]" multiple="multiple"  class="form-control  select2">
                                                    <option disabled>   {{__('sentences.none')}} </option>
                                                    @foreach (App\Models\User::where('status','plan')->latest()->get() as $student )
                                                    @if (!$student->plan()->whereType('primary')->first())
                                                    @continue
                                                    @endif
                                                   <option {{in_array($student->id,old('plans',[]))?'selected':''}} value="{{$student->plan->id}}">{{$student->name}} {{$student->family}}
                                                   ({{$student->plan->title}})
                                                   <span class="text txat-" dir="rtl">
                                                    ({{Morilog\Jalali\Jalalian::forge($student->plan->created_at)->format('Y-m-d')}})
                                                   </span>
                                                </option>
                                                    @endforeach
                                                </select>

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>



                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>

                                                    {{__('sentences.select_master')}}
                                                </label>
                                                <select name="masters[]"   multiple class="form-control  select2">
                                                    <option disabled>          {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\User::where('level','master')->latest()->get() as $master )
                                                   <option {{in_array($master->id ,old('masters',[]))?'selected':''}} value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>
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
                                            <input type="submit" value="            {{__('sentences.save')}}   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('survey.index')}}">          {{__('sentences.back')}}</a>


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
