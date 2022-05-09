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
                        <div class="row">
                            <div class="col-lg-8">
                                @include('sections.error')


                                <form class="form" action="{{route('plan.update',$plan->id)}}" id="kt_form" method="post"
                                  >
                                    @csrf
                                    @method('patch')
                                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                        <div class="col-xl-12 col-xxl-12">
                                            <!--begin::ویزارد Form-->
                                            <h1>
                                                {{__('sentences.plan_edit_form')}}
                                                <br>

                                                {{__('sentences.last_status')}}:
                                                {{__('sentences.'.$plan->status)}}


                                            </h1>
                                            <br>
                                            <br>
                                            <!--begin::ویزارد گام 1-->
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.title')}} </label>
                                                        <input type="text" value="{{old('title',$plan->title)}}"
                                                            class="form-control" name="title"
                                                            placeholder="     {{__('sentences.title')}} ">
                                                        <span class="form-text text-muted">
                                                            {{__('sentences.enter_title')}}
                                                        </span>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.en_title')}} </label>
                                                        <input type="text" value="{{old('en_title',$plan->en_title)}}"
                                                            class="form-control" name="en_title"
                                                            placeholder="     {{__('sentences.en_title')}} ">
                                                        <span class="form-text text-muted">
                                                            {{__('sentences.enter_en_title')}}
                                                        </span>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <!--begin::ورودی-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.tags')}} </label>
                                                        <div class="input-group">
                                                            <input type="text" id="ex_p" class="form-control"
                                                                placeholder="  {{__('sentences.tags')}}  ...">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-secondary" id="add_ex1" type="button">
                                                                    {{__('sentences.add')}} </button>
                                                            </div>
                                                        </div>
                                                        <div class="fv-plugins-message-container" id="tags">
                                                            {{-- <span type="button" class="btn self btn-outline-success mr-2">
                                                                ssss
                                                                <input type="text" name="expert[]" hidden>
                                                            </span> --}}
                                                            @foreach (old('tags',explode('_',$plan->tags)??[]) as $tag )
                                                            <span type="button" class="btn self btn-outline-success mr-2">
                                                                {{$tag}}
                                                                <input type="text" name="tags[]" hidden="" value="{{$tag}}">
                                                            </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!--end::ورودی-->
                                                </div>


                                                <div class="col-xl-12">
                                                    <!--begin::ورودی-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.en_tags')}} </label>
                                                        <div class="input-group">
                                                            <input type="text" id="ex_p2" class="form-control"
                                                                placeholder="  {{__('sentences.tags')}}  ...">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-secondary" id="add_ex2" type="button">
                                                                    {{__('sentences.add')}} </button>
                                                            </div>
                                                        </div>
                                                        <div class="fv-plugins-message-container" id="en_tags">
                                                            {{-- <span type="button" class="btn self btn-outline-success mr-2">
                                                                ssss
                                                                <input type="text" name="expert[]" hidden>
                                                            </span> --}}
                                                            @foreach (old('en_tags',explode('_',$plan->en_tags)??[]) as $entag )
                                                            <span type="button" class="btn self btn-outline-success mr-2">
                                                                {{$entag}}
                                                                <input type="text" name="en_tags[]" hidden=""
                                                                    value="{{$entag}}">
                                                            </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!--end::ورودی-->
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.problem')}} </label>
                                                        <textarea class="form-control" name="problem"
                                                            rows="3">{{old('problem',$plan->problem)}}</textarea>
                                                    </div>
                                                </div>


                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.necessity')}} </label>
                                                        <textarea class="form-control" name="necessity"
                                                            rows="3">{{old('necessity',$plan->necessity)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.goals')}}    </label>
                                                        <textarea class="form-control" name="goals" rows="3">{{old('goals',$plan->goals)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.question')}} </label>
                                                        <textarea class="form-control" name="question"
                                                            rows="3">{{old('question',$plan->question)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.sub_question')}} </label>
                                                        <textarea class="form-control" name="sub_question"
                                                            rows="3">{{old('sub_question',$plan->sub_question)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.theory')}} </label>
                                                        <textarea class="form-control" name="theory"
                                                            rows="3">{{old('theory',$plan->theory)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.method')}} </label>
                                                        <textarea class="form-control" name="method"
                                                            rows="3">{{old('method',$plan->method)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.concepts')}}    </label>
                                                        <textarea class="form-control" name="concepts" rows="3">{{old('concepts',$plan->concepts)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.hypo')}} </label>
                                                        <textarea class="form-control" name="hypo"
                                                            rows="3">{{old('hypo',$plan->hypo)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>     {{__('sentences.history')}}    </label>
                                                        <textarea class="form-control" name="history" rows="3">{{old('history',$plan->history)}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.structure')}} </label>
                                                        <textarea class="form-control" name="structure"
                                                            rows="3">{{old('structure',$plan->structure)}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label> {{__('sentences.source')}} </label>
                                                        <textarea class="form-control" name="source"
                                                            rows="3">{{old('source',$plan->source)}}</textarea>
                                                    </div>
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
                                                    <input type="submit" value="    {{__('sentences.save')}}    "
                                                        class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                    <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                        href="{{route('user.note')}}"> {{__('sentences.back')}} </a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::ویزارد اقدامات-->
                                </form>

                            </div>
                            <div class="col-lg-4">
                                <div class="col-xl-12">
                                    <div class="form-group fv-plugins-icon-container">
                                        <ul class="history">
                                            @foreach ($all_plans as $p)
                                            <li>
                                                @if ($p->status)
                                                {{__('sentences.group')}}
                                                {{$p->group->name}}
                                                @else
                                                {{__('sentences.master_name')}}
                                                {{$plan->master->name}}
                                                {{$plan->master->family}}
                                                @endif

                                                ({{Morilog\Jalali\Jalalian::forge($p->created_at)->format('d-m-Y')}})
                                                @if ($p->title)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.title')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->title}}
                                                    </span>
                                                </p>
                                                @endif
                                                @if ($p->en_title)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.en_title')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->en_title}}
                                                    </span>
                                                </p>

                                                @endif



                                                @if ($p->tags)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.tags')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->tags}}
                                                    </span>
                                                </p>
                                                @endif

                                                @if ($p->en_tags)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.en_tags')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->en_tags}}
                                                    </span>
                                                </p>
                                                @endif

                                                @if ($p->problem)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.problem')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->problem}}
                                                    </span>
                                                </p>
                                                @endif

                                                @if ($p->sub_question)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.sub_question')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->sub_question}}
                                                    </span>
                                                </p>
                                                @endif



                                                @if ($p->question)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.question')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->question}}
                                                    </span>
                                                </p>
                                                @endif


                                                @if ($p->necessity)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.necessity')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->necessity}}

                                                    </span>
                                                </p>

                                                @endif


                                                @if ($p->hypo)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.hypo')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->hypo}}
                                                    </span>
                                                <p>

                                                @endif

                                                @if ($p->theory)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.theory')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->theory}}
                                                    </span>
                                                <p>

                                                @endif

                                                @if ($p->structure)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.structure')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->structure}}
                                                    </span>
                                                <p>
                                                @endif


                                                @if ($p->method)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.method')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->method}}
                                                    </span>
                                                <p>
                                                @endif


                                                @if ($p->source)

                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.source')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->source}}
                                                    </span>
                                                <p>
                                                @endif


                                                @if ($p->concepts)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.concepts')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->concepts}}
                                                    </span>
                                                <p>
                                                @endif



                                                @if ($p->goals)
                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.goals')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->goals}}
                                                    </span>
                                                <p>
                                                @endif


                                                @if ($p->history)

                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.history')}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->history}}
                                                    </span>
                                                <p>

                                                @endif







                                                    @if ($p->info_master)

                                                <p>
                                                    <span class="ti">
                                                        {{__('sentences.info_master')}}
                                                        {{$p->master->name}}
                                                        {{$p->master->family}}
                                                    </span>
                                                    <span class="cont">
                                                        {{$p->info_master}}
                                                    </span>
                                                <p>
                                                    @endif


                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>


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
