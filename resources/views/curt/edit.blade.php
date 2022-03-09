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


                        <form class="form" action="{{route('curt.update',$curt->id)}}" id="kt_form" method="post">
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
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>  {{__('sentences.title')}}   </label>
                                                <input type="text" value="{{old('title',$curt->title)}}" class="form-control"
                                                    name="title" placeholder="   {{__('sentences.title')}}   ">
                                                    <span class="form-text text-muted">
                                                        {{__('sentences.enter_title')}}
                                                    </span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>       {{__('sentences.tags')}}   </label>
                                                <div class="input-group">
                                                    <input type="text" id="ex_p" class="form-control"
                                                        placeholder=""  {{__('sentences.search')}}  ...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary" id="add_ex1"
                                                            type="button">  {{__('sentences.add')}}</button>
                                                    </div>
                                                </div>
                                                <div class="fv-plugins-message-container" id="tags">
                                                    {{-- <span type="button" class="btn self btn-outline-success mr-2">
                                                        ssss
                                                        <input type="text" name="expert[]" hidden>
                                                    </span> --}}

                                                    @foreach (old('tags',explode('_',$curt->tags))  as $tag )
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
                                                <label>    {{__('sentences.problem')}}     </label>
                                                <textarea class="form-control" name="problem"
                                                    rows="3">{{old('problem',$curt->problem)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>     {{__('sentences.question')}}  </label>
                                                <textarea class="form-control" name="question"
                                                    rows="3">{{old('question',$curt->question)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>    {{__('sentences.necessity')}}         </label>
                                                <textarea class="form-control" name="necessity"
                                                    rows="3">{{old('necessity',$curt->necessity)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>     {{__('sentences.innovation')}}    </label>
                                                <textarea class="form-control" name="innovation"
                                                    rows="3">{{old('innovation',$curt->innovation)}}</textarea>
                                            </div>
                                        </div>

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
                                                        <span class="ti">
                                                            {{__('sentences.title')}}
                                                        </span>
                                                        <span class="cont">
                                                            {{$curt->title}}
                                                        </span>
                                                        <br>


                                                        <span class="ti">
                                                            {{__('sentences.tags')}}
                                                        </span>
                                                        <span class="cont">
                                                            {{$curt->tags}}
                                                        </span>
                                                        <br>


                                                        <span class="ti">
                                                            {{__('sentences.title')}}
                                                        </span>
                                                        <span class="cont">
                                                            {{$curt->problem}}
                                                        </span>
                                                        <br>


                                                        <span class="ti">
                                                            {{__('sentences.question')}}
                                                        </span>
                                                        <span class="cont">
                                                            {{$curt->question}}
                                                        </span>
                                                        <br>


                                                        <span class="ti">
                                                            {{__('sentences.necessity')}}
                                                        </span>
                                                        <span class="cont">
                                                            {{$curt->necessity}}

                                                        </span>
                                                        <br>


                                                        <span class="ti">
                                                            {{__('sentences.innovation')}}
                                                        </span>
                                                        <span class="cont">
                                                            {{$curt->innovation}}
                                                        </span>

                                                        <br>

                                                    </li>
                                                    @endforeach
                                                </ul>
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
