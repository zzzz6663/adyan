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


                        <form class="form" action="{{route('curt.update',$main_curt->id)}}" id="kt_form" method="post">
                            @csrf
                            @method('patch')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                    <h1>
                                        فرم ویرایش طرح اجمالی
                                    </h1>
                                    <br>
                                    <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-lg-4">

                                            <div class="col-xl-12">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <ul class="history">
                                                        @foreach ($all_curts as $curt)
                                                        <li>
                                                            ({{$curt->operator_curts()->name}}
                                                            {{$curt->operator_curts()->family}})
                                                            ({{
                                                            Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                            <br>
                                                            @if ($curt->title)
                                                            <span class="ti">
                                                                {{__('sentences.title')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->title}}
                                                            </p>

                                                            @endif


                                                            @if ($curt->tag)
                                                            <span class="ti">
                                                                {{__('sentences.tags')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->tag}}
                                                            </p>
                                                            @endif


                                                            @if ($curt->problem)
                                                            <span class="ti">
                                                                {{__('sentences.problem')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->problem}}
                                                            </p>

                                                            @endif

                                                            @if ($curt->question)
                                                            <span class="ti">
                                                                {{__('sentences.question')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->question}}
                                                            </p>
                                                            @endif


                                                            @if ($curt->necessity)
                                                            <span class="ti">
                                                                {{__('sentences.necessity')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->necessity}}

                                                            </p>
                                                            @endif


                                                            @if ($curt->innovation)
                                                            <span class="ti">
                                                                {{__('sentences.innovation')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->innovation}}
                                                            </p>
                                                            @endif


                                                            @if ($curt->history)
                                                            <span class="ti">
                                                                {{__('sentences.history')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->history}}
                                                            </p>

                                                            @endif

                                                            @if ($curt->fail_reason)
                                                            <span class="ti">
                                                                {{__('sentences.fail_reason')}}
                                                            </span>
                                                            <p class="">
                                                                {{$curt->fail_reason}}
                                                            </p>
                                                            @endif



                                                            <br>

                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">

                                                        <label>  {{__('sentences.title')}}   </label>
                                                        <input type="text" value="{{old('title',$main_curt->title)}}{{$main_curt->title}}" class="form-control"
                                                            name="title" placeholder="   {{__('sentences.title')}}   ">
                                                            <span class="form-text text-muted">
                                                                {{__('sentences.enter_title')}}
                                                            </span>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <!--begin::ورودی-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>       {{__('sentences.tags')}}  : </label>
                                                        {{-- <select readonly="readonly" name="tags[]" id="" class="form-control select2" multiple="multiple">
                                                            <option disabled="disabled" value="">{{__('sentences.select_one')}}</option>
                                                            @foreach (App\Models\Tag::all() as $tag)
                                                            <option {{in_array($tag->id ,old('tags',$main_curt->tags()->pluck('id')->toArray()))?'selected':''}} value="{{$tag->id}}">{{$tag->tag}}</option>

                                                            @endforeach
                                                        </select> --}}
                                                        <span class="content">{{ implode(' ,',$main_curt->tags()->pluck('tag')->toArray()) }}</span>

                                                    </div>
                                                    <!--end::ورودی-->
                                                </div>


                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>    {{__('sentences.problem')}}     </label>
                                                        <textarea class="form-control" name="problem"
                                                            rows="3">{{old('problem',$main_curt->problem)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.question')}}  </label>
                                                        <textarea class="form-control" name="question"
                                                            rows="3">{{old('question',$main_curt->question)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>    {{__('sentences.necessity')}}         </label>
                                                        <textarea class="form-control" name="necessity"
                                                            rows="3">{{old('necessity',$main_curt->necessity)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.innovation')}}    </label>
                                                        <textarea class="form-control" name="innovation"
                                                            rows="3">{{old('innovation',$main_curt->innovation)}}</textarea>
                                                    </div>
                                                </div>
                                                @if ($main_curt->history)

                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.history')}}    </label>
                                                        {{$main_curt->history}}
                                                    </div>
                                                </div>
                                                @endif
                                                @if ($main_curt->history)
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.fail_reason')}}    </label>
                                                        {{$main_curt->fail_reason}}
                                                    </div>
                                                </div>
                                                @endif
                                                <!--begin::ویزارد اقدامات-->
                                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                    {{-- <div>
                                                        <button type="button"
                                                            class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                            data-wizard-type="action-prev">
                                                            تایید
                                                        </button>
                                                    </div> --}}
                                                    <div>
                                                        <input type="submit" value="    {{__('sentences.save')}}   "
                                                            class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                        <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                            href="{{route('user.note')}}">{{__('sentences.back')}}  </a>


                                                    </div>
                                                </div>



                                            </div>

                                        </div>

                                    </div>

                                    <!--end::ویزارد گام 1-->


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
