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
                                <img alt="Pic" src="{{$user->avatar()}}">
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
                                    <a href="#"
                                        class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                        {{$user->name}}
                                        {{$user->family}}
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
                                            </span> {{$user->email}}
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
                                            </span> {{$user->coed}}
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
                                            </span> {{__('arr.'.$user->semat_job)}}
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
                                            </span> {{$user->province}}
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









            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin::ویزارد-->
                    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first"
                        data-wizard-clickable="false">

                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-12">

                                    <br>
                                    <!--begin::ویزارد گام 1-->
                                    {{-- <div class="row">
                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.title')}}

                                                </label>
                                                <h4>
                                                    {{$main_plan->title}}
                                                </h4>

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


                                        <div class="col-xl-12 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <a class="btn btn-danger "
                                                    href="{{$main_plan->report()}}">{{__('sentences.download_report')}}</a>
                                            </div>
                                        </div>
                                        @role('admin|master|expert')
                                        <div class="col-xl-12  bg-light  mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.snote')}}
                                                </label>
                                                   <ul>
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
                                                   </ul>
                                            </div>
                                        </div>
                                        @endrole


                                    </div> --}}
                                    <ul class="history">
                                        @foreach ($all_plans as $p)
                                        <li>
                                            @if ($p->status)
                                            {{__('sentences.group')}}
                                            {{$p->group->name}}
                                            @else
                                            {{__('sentences.master_name')}}
                                            {{$main_plan->master->name}}
                                            {{$main_plan->master->family}}
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

                            <!--end::ویزارد اقدامات-->


                        <!--end::ویزارد Form-->
                    </div>
                </div>
                <!--end::ویزارد Body-->
            </div>


        </div>
        <!--end::ویزارد-->
    </div>
</div>
@endsection
