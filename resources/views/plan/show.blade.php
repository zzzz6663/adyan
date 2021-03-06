@extends('master.main')
{{-- @php($side=true) --}}
@section('main')

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            <div class="symbol symbol-50 symbol-lg-120">
                                <img alt="Pic" src="{{$main_plan->user->avatar()}}">
                            </div>

                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                <span class="font-size-h3 symbol-label font-weight-boldest"></span>
                            </div>
                        </div>
                        <!--end: Pic-->

                        <!--begin: اطلاعات-->
                        <div class="flex-grow-1">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <!--begin::نام-->


                                    <a href="{{route('agent.public.show',$main_plan->user->id)}}"
                                        class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                        {{$main_plan->user->name}}
                                        {{$main_plan->user->family}}
                                        <i class="flaticon2-correct text-success icon-md ml-2"></i>
                                    </a>
                                    <!--end::نام-->

                                    <!--begin::مخاطب-->
                                    <div class="d-flex flex-wrap my-2">
                                        <a href="#"
                                            class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/Mail-notification.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                            fill="#000000"></path>
                                                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                            r="2.5"></circle>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> {{$main_plan->user->email}}
                                        </a>
                                        <a href="#"
                                            class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/Mail-notification.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                            fill="#000000"></path>
                                                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                            r="2.5"></circle>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> {{$main_plan->user->coe}}
                                        </a>
                                        <a href="#"
                                            class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/عمومی/Lock.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <mask fill="white">
                                                            <use xlink:href="#path-1"></use>
                                                        </mask>
                                                        <g></g>
                                                        <path
                                                            d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> {{__('arr.'.$main_plan->user->semat_job)}}
                                        </a>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Map/مارچker2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> {{$main_plan->user->province}}
                                        </a>
                                    </div>
                                    <!--end::مخاطب-->
                                </div>
                                {{-- <div class="my-lg-0 my-1">
                                    <a href="#"
                                        class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">گزارشات</a>
                                    <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">وظیفه
                                        جدید</a>
                                </div> --}}
                            </div>
                            <!--end: Title-->

                            <!--begin: Content-->
                            <h3>{{$main_plan->title}}</h3>
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.master_guid')}}:
                                    {{$main_plan->master_id ?$main_plan->master->name.' '.$main_plan->master->family:''}}
                                </div>
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.group')}}:
                                    {{$main_plan->group_id ?$main_plan->group->name:''}}
                                </div>

                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.guid')}}:
                                    {{$main_plan->guid_id ?$main_plan->guid->name.' '.$main_plan->guid->family:''}}
                                </div>

                                {{-- <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.tags')}}:
                                    @foreach ($main_plan->tags as $tag )
                                    <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                        {{$tag->tag }}
                                    </span>
                                    @endforeach
                                </div> --}}

                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">          {{__('sentences.created_at')}}</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">
                                                {{
                                                Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($main_plan->created_at))->format('Y-m-d')
                                                }}
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">     {{__('sentences.last_group_review')}}</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">

                                            @if ($main_plan->last_group_review())
                                            {{$main_plan->last_group_review()}}
                                            @endif

                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">     {{__('sentences.last_edit_student')}}</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                                @if ($main_plan->last_edit_student())
                                                {{$main_plan->last_edit_student()}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--end: اطلاعات-->
                    </div>

                    <div class="separator separator-solid my-7"></div>

                    {{--
                    <!--begin: Items-->
                    <div class="d-flex align-items-center flex-wrap">
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">درآمد</span>
                                <span class="font-weight-bolder font-size-h5"><span
                                        class="text-dark-50 font-weight-bold">دلار</span>249,500</span>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">هزینه ها</span>
                                <span class="font-weight-bolder font-size-h5"><span
                                        class="text-dark-50 font-weight-bold">دلار</span>164,700</span>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">خالص</span>
                                <span class="font-weight-bolder font-size-h5"><span
                                        class="text-dark-50 font-weight-bold">دلار</span>782,300</span>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">73 وظایف</span>
                                <a href="#" class="text-primary font-weight-bolder">چشم انداز</a>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">648 نظرات</span>
                                <a href="#" class="text-primary font-weight-bolder">چشم انداز</a>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill my-1">
                            <span class="mr-4">
                                <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="symbol-group symbol-hover">
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title=""
                                    data-original-title="مارچk Stone">
                                    <img alt="Pic" src="assets/media/users/300_25.jpg">
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title=""
                                    data-original-title="چکاوک ستاری">
                                    <img alt="Pic" src="assets/media/users/300_19.jpg">
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title=""
                                    data-original-title="لیلا مرادی">
                                    <img alt="Pic" src="assets/media/users/300_22.jpg">
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title=""
                                    data-original-title="نیکتا مهدوی">
                                    <img alt="Pic" src="assets/media/users/300_23.jpg">
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title=""
                                    data-original-title="ترانه فرهادی">
                                    <img alt="Pic" src="assets/media/users/300_18.jpg">
                                </div>
                                <div class="symbol symbol-30 symbol-circle symbol-light">
                                    <span class="symbol-label font-weight-bold">5+</span>
                                </div>
                            </div>
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--begin: Items--> --}}
                </div>
            </div>








            @role('expert|admin|master')

            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin::ویزارد-->
                    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first"
                        data-wizard-clickable="false">

                        @include('sections.error')

                        @if (($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1') && $main_plan->confirm_master !='1' )
                        <form class="form" action="{{route('admin.plan.confirm' ,$main_plan->id)}}" id="kt_form" method="post">
                        @else
                        <form class="form" action="{{route('admin.plan.submit' ,$main_plan->id)}}" id="kt_form" method="post">
                        @endif
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-12">
                                    <!--begin::ویزارد Form-->
                                    {{-- <h1>
                                        {{__('sentences.show_plan')}}

                                        {{$main_plan->title}}
                                    </h1> --}}
                                    <br>
                                    @if ($session)
                                    <input type="text" hidden value="{{$session}}" name="session_id">
                                    @endif
                                    <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.title')}}

                                                </label>
                                                <h4>
                                                    {{$main_plan->title}}
                                                </h4>
                                                <textarea name="title"
                                                    class="form-control {{old('title')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6"> {{old('title')}}</textarea>
                                                    {{-- && $main_plan->confirm_master !='1' --}}
                                                <span class="{{($main_plan->master_id==auth()->user()->id  )?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">

                                                    {{__('sentences.add_info')}}
                                                </span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->title)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->title}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.en_title')}}

                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->en_title}}
                                                </h6>
                                                <textarea name="en_title"
                                                    class="form-control  {{old('en_tags')?'':'hide'}} inp" id="en_title"
                                                    cols="30" rows="6">{{old('en_title')}}</textarea>
                                                <span class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">

                                                    {{__('sentences.add_info')}}
                                                </span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->en_title)
                                                    <li>

                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->en_title}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.tags')}}

                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    @foreach (explode('_',$main_plan->tags) as $tag )
                                                    {{$tag }} -
                                                    @endforeach
                                                </h6>
                                                <textarea name="tags" class="form-control {{old('tags')?'':'hide'}} inp"
                                                    id="title" cols="30" rows="6">{{old('tags')}}</textarea>
                                                <span class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">
                                                    {{__('sentences.add_info')}}
                                                </span>
                                                <ul>

                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->tags)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->tags}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.en_tags')}}

                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    @foreach (explode('_',$main_plan->en_tags) as $tag )
                                                    {{$tag }} -
                                                    @endforeach
                                                </h6>
                                                <textarea name="en_tags"
                                                    class="form-control  {{old('en_tags')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('en_tags')}}</textarea>
                                                <span class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">
                                                    {{__('sentences.add_info')}}
                                                </span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->en_tags)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->en_tags}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.problem')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->problem}}
                                                </h6>
                                                <textarea name="problem"
                                                    class="form-control {{old('problem')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('problem')}}</textarea>
                                                <span class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">
                                                    {{__('sentences.add_info')}}
                                                </span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->problem)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->problem}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.necessity')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->necessity}}
                                                </h6>
                                                <textarea name="necessity"
                                                    class="form-control {{old('necessity')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('necessity')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->necessity)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->necessity}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.goals')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->goals}}
                                                </h6>

                                                <textarea name="goals"
                                                    class="form-control {{old('goals')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('goals')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->goals)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->goals}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.question')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->question}}
                                                </h6>
                                                <textarea name="question"
                                                    class="form-control {{old('question')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('question')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->question)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->question}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.sub_question')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->sub_question}}
                                                </h6>

                                                <textarea name="sub_question"
                                                    class="form-control {{old('sub_question')?'':'hide'}} inp"
                                                    id="title" cols="30" rows="6">{{old('sub_question')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->sub_question)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->sub_question}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.hypo')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->hypo}}
                                                </h6>

                                                <textarea name="hypo" class="form-control {{old('hypo')?'':'hide'}} inp"
                                                    id="title" cols="30" rows="6">{{old('hypo')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->hypo)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->hypo}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.method')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->method}}
                                                </h6>

                                                <textarea name="method"
                                                    class="form-control {{old('method')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('method')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                               <ul>
                                                @foreach ($all_plans as $plan)
                                                @if ( $plan->method)
                                                <li>
                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{
                                                    Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->method}}
                                                </li>
                                                @endif
                                                @endforeach
                                               </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.concepts')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->concepts}}
                                                </h6>

                                                <textarea name="concepts"
                                                    class="form-control {{old('concepts')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('concepts')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                               <ul>
                                                @foreach ($all_plans as $plan)
                                                @if ( $plan->concepts)
                                                <li>
                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{
                                                    Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->concepts}}
                                                </li>
                                                @endif
                                                @endforeach
                                               </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.theory')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->theory}}
                                                </h6>

                                                <textarea name="theory"
                                                    class="form-control {{old('theory')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('theory')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->theory)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->theory}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.history')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->history}}
                                                </h6>

                                                <textarea name="history"
                                                    class="form-control {{old('history')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('history')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->history)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->history}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.structure')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->structure}}
                                                </h6>

                                                <textarea name="structure"
                                                    class="form-control {{old('structure')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('structure')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->structure)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->structure}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.source')}}
                                                </label>
                                                <h6 class="prf mt-3 mb-6">
                                                    {{$main_plan->source}}
                                                </h6>

                                                <textarea name="source"
                                                    class="form-control {{old('source')?'':'hide'}} inp" id="title"
                                                    cols="30" rows="6">{{old('source')}}</textarea>
                                                <span
                                                    class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                <ul>
                                                    @foreach ($all_plans as $plan)
                                                @if ( $plan->source)
                                                <li>
                                                    ({{$plan->group->admin()->name}}
                                                    {{$plan->group->admin()->family}})
                                                    ({{
                                                    Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                    <br>
                                                    {{$plan->source}}
                                                </li>
                                                @endif
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        {{ $main_plan->confirm_master}}
                                        @if ((!$main_plan->user->primary_plan()->guid_id) && $main_plan->confirm_master=='1' )
                                        @role('master')

                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.select_guid_master')}}
                                                </label>
                                                <select name="guid_id" id="" class="form-control  select2">
                                                    <option value="">{{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\User::where('level','master')->get() as $master
                                                    )
                                                    <option {{old('guid_id')==$master->id?'selected':''}}
                                                        value="{{$master->id}}">{{$master->name}}
                                                        {{$master->family}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        @endrole
                                        @endif

                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <a class="btn btn-danger "
                                                    href="{{$main_plan->report()}}">{{__('sentences.download_report')}}</a>
                                            </div>
                                        </div>

                                        <div class="col-xl-12  bg-light  mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.snote')}}
                                                </label>

                                                <textarea name="note" class="form-control hide inp" id="title"
                                                    cols="30" rows="6">{{old('note')}}</textarea>

                                                  <span
                                                  class="{{($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')?'hide':'show'}} btn btn-success font-weight-bolder font-size-sm">{{__('sentences.insert_info')}}</span>
                                                    @foreach ($all_plans as $plan)
                                                    @if ( $plan->note)
                                                    <li>
                                                        ({{$plan->group->admin()->name}}
                                                        {{$plan->group->admin()->family}})
                                                        ({{
                                                        Morilog\Jalali\Jalalian::forge($plan->created_at)->format('d-m-Y')}})
                                                        <br>
                                                        {{$plan->note}}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                            </div>
                                        </div>
                                        @if ($main_plan->master_id==auth()->user()->id  && $main_plan->confirm_master !='1')
                                        <div class="col-xl-12  bg-light  mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.info_master')}}
                                                </label>
                                                <textarea name="info_master" class="form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 bg-success  mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>

                                                    {{__('sentences.final_result')}}
                                                </label>
                                                <select class="form-control" name="confirm_master" id="">
                                                    <option value=""> {{__('sentences.select_one')}}</option>
                                                    <option {{old('confirm_master')=='0' ?'selected':''}} value="0">
                                                        {{__('sentences.should_edit_cuert')}}
                                                    </option>
                                                    <option {{old('confirm_master')=='1' ?'selected':''}} value="1">
                                                        {{__('sentences.confirm')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        @else
                                        <div class="col-xl-12   bg-success par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>

                                                    {{__('sentences.final_result_guid')}}
                                                </label>
                                                <select class="form-control" name="status" id="">
                                                    <option value=""> {{__('sentences.select_one')}}</option>
                                                    <option {{old('status')=='reject' ?'selected':''}} value="reject">
                                                        {{__('sentences.should_edit_cuert')}}
                                                    </option>
                                                    <option {{old('status')=='faild' ?'selected':''}} value="faild">
                                                        {{__('sentences.reject_plan')}}
                                                    </option>
                                                    @role('master')
                                                    <option {{old('status')=='accept' ?'selected':''}} value="accept">
                                                        {{__('sentences.accept_plan')}}
                                                    </option>
                                                    @endrole
                                                </select>

                                            </div>
                                        </div>
                                        @endif








                                    </div>


                                    <!--begin::ویزارد اقدامات-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        {{-- <div>
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">

                                                {{__('sentences.confirm')}
                                            </button>
                                        </div> --}}
                                        <div>
                                            @role('expert')
                                            @if ($main_plan->group_id)
                                            <p>
                                                {{__('sentences.cant_comment')}}

                                            </p>
                                            @else
                                            <input type="submit" value="  ddd     {{__('sentences.save')}}   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">

                                            @endif
                                            @endrole

                                            @role('master')
                                            <input type="submit" value="       {{__('sentences.save')}}   "
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            @endrole
                                            {{-- <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                href="{{route('admin.plan')}}">برکشت</a> --}}


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
            @endrole
            <br>
            <br>
            <br>

            <br>
            <br>
            <br>
            @if(!$main_plan->group_id)
            @role('expert')
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin::ویزارد-->
                    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first"
                        data-wizard-clickable="false">

                        @include('sections.error')


                        <form class="form" action="{{route('admin.save.plan.group',$main_plan->id)}}" id="kt_form"
                            method="post">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin::ویزارد Form-->
                                    <h1>

                                        {{__('sentences.form_select_geoup')}}
                                    </h1>
                                    <br>
                                    <br>


                                    <div class="row">



                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>

                                                    {{__('sentences.select_final_group')}}



                                                </label>
                                                <select name="group_id" id="ostad" class="form-control  ">
                                                    <option value=""> {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\Group::all() as $group
                                                    )
                                                    <option value="{{$group->id}}">
                                                        {{$group->name}}
                                                        (
                                                        {{__('sentences.manger')}}:
                                                        {{$group->admin()->name}}
                                                        {{$group->admin()->family}}
                                                        )
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>


                                    </div>

                                    <!--end::ویزارد گام 1-->

                                    <!--begin::ویزارد اقدامات-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">

                                        <div>
                                            <input type="submit" value="{{__('sentences.save')}}"
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            {{-- <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                href="{{route('agent.index')}}"> {{__('sentences.back')}}</a> --}}


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
            @endrole
            @endif

        </div>
        <!--end::ویزارد-->
    </div>
</div>
@endsection
