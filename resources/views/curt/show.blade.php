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
                                <img alt="Pic" src="{{$main_curt->user->avatar()}}">
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

                                        <a class="btn btn-success" href="{{route('agent.public.show',$main_curt->user->id)}}">
                                            {{$main_curt->user->name}}
                                        {{$main_curt->user->family}}
                                    </a>
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
                                            </span> {{$main_curt->user->email}}
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
                                            </span> {{$main_curt->user->coe}}
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
                                            </span> {{__('arr.'.$main_curt->user->semat_job)}}
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
                                            </span> {{$main_curt->user->province}}
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
                            <h3>{{$main_curt->title}}</h3>
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.master_guid')}}:
                                    {{$main_curt->master_id ?$main_curt->master()->name.' '.$main_curt->master()->family:''}}
                                </div>
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.group')}}:
                                    {{$main_curt->group_id ?$main_curt->group->name:''}}
                                </div>

                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.guid')}}:
                                    {{$main_curt->guid_id ?$main_curt->guid->name.' '.$main_curt->guid->family:''}}
                                </div>

                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {{__('sentences.tags')}}:
                                    @foreach ($main_curt->tags as $tag )
                                    <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                        {{$tag->tag }}
                                    </span>
                                    @endforeach
                                </div>

                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">          {{__('sentences.created_at')}}</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">
                                                {{
                                                Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($main_curt->created_at))->format('Y-m-d')
                                                }}
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">     {{__('sentences.last_group_review')}}</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                            @if ($main_curt->last_group_review())
                                            {{$main_curt->last_group_review()}}
                                            @endif

                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">     {{__('sentences.last_edit_student')}}</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                                @if ($main_curt->last_edit_student())
                                                {{$main_curt->last_edit_student()}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end: Content-->
                            <div class="row">
                                @if ($main_curt->history)
                                <div class="col-lg-6">
                                    <h5>
                                        {{__('sentences.history_more')}}
                                    </h5>
                                    <p style="background:#f5f5f5">
                                        {{$main_curt->history}}
                                    </p>
                                </div>
                                @endif
                                {{-- <div class="col-lg-6">
                                    <h5>
                                        {{__('sentences.special_note')}}
                                    </h5>
                                    <p style="background:#f5f5f5">
                                        {{$main_curt->note}}
                                    </p>
                                </div> --}}
                                @if ($main_curt->fail_reason)
                                <div class="col-lg-6">
                                    <h5>
                                        {{__('sentences.fail_reason')}}
                                    </h5>
                                    <p style="background:#f5f5f5">
                                        {{$main_curt->fail_reason}}
                                    </p>
                                </div>
                                @endif

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


                        <form class="form" action="{{route('admin.curt.submit' ,$main_curt->id)}}" id="kt_form"
                            method="post">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                <div class="col-xl-12">
                                    <!--begin::ویزارد Form-->
                                    {{-- <h1>
                                        {{__('sentences.show_curt')}}

                                        {{$main_curt->title}}
                                    </h1> --}}
                                    <br>
                                    @if ($session)
                                            <input type="text" hidden value="{{$session}}" name="session_id">
                                    @endif
                                    <br>
                                    <!--begin::ویزارد گام 1-->
                                    <div class="row">
                                        <div class="col-xl-12 mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.title')}}

                                                </label>
                                                 <h4 class="mt-3 mb-6 prf" style=" ">
                                                    {{$main_curt->title}}
                                                </h4>
                                                <textarea name="title" class="form-control hide inp" id="title"
                                                    cols="30" rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                   <ul>
                                                       @foreach ($all_curts as  $curt)
                                                          @if ( $curt->title)
                                                          <li>

                                                            ({{$curt->operator_curts()->name}}
                                                            {{$curt->operator_curts()->family}})
                                                            ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                            <br>
                                                            {{$curt->title}}
                                                            </li>
                                                       @endif
                                                       @endforeach
                                                   </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.tags')}}
                                                </label>
                                                 <h6 class="mt-3 mb-6 prf" style=" ">
                                                    @foreach ($main_curt->tags as $tag )
                                                    {{$tag->tag }} -
                                                    @endforeach
                                                </h6>
                                                <textarea name="tag" class="form-control hide inp" id="title" cols="30"
                                                    rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                     <ul>
                                                       @foreach ($all_curts as  $curt)
                                                          @if ( $curt->tag)
                                                          <li>
                                                            ({{$curt->operator_curts()->name}}
                                                            {{$curt->operator_curts()->family}})
                                                            ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                            <br>
                                                            {{$curt->tag}}
                                                            </li>
                                                       @endif

                                                       @endforeach
                                                   </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.problem')}}
                                                </label>
                                                 <h6 class="mt-3 mb-6 prf" style=" ">
                                                    {{$main_curt->problem}}
                                                </h6>
                                                <textarea name="problem" class="form-control hide inp" id="title"
                                                    cols="30" rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                    <ul>
                                                        @foreach ($all_curts as  $curt)
                                                           @if ( $curt->problem)
                                                           <li>
                                                            ({{$curt->operator_curts()->name}}
                                                            {{$curt->operator_curts()->family}})
                                                            ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                            <br>
                                                            {{$curt->problem}}
                                                            </li>
                                                       @endif

                                                        @endforeach
                                                    </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.question')}}
                                                </label>
                                                 <h6 class="mt-3 mb-6 prf" style=" ">
                                                    {{$main_curt->question}}
                                                </h6>
                                                <textarea name="question" class="form-control hide inp" id="title"
                                                    cols="30" rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                        <ul>
                                                            @foreach ($all_curts as  $curt)
                                                            @if ( $curt->question)
                                                            <li>
                                                             ({{$curt->operator_curts()->name}}
                                                             {{$curt->operator_curts()->family}})
                                                             ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                             <br>
                                                             {{$curt->question}}
                                                             </li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.necessity')}}
                                                </label>
                                                 <h6 class="mt-3 mb-6 prf" style=" ">
                                                    {{$main_curt->necessity}}
                                                </h6>
                                                <textarea name="necessity" class="form-control hide inp" id="title"
                                                    cols="30" rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                        <ul>
                                                            @foreach ($all_curts as  $curt)
                                                            @if ( $curt->necessity)
                                                            <li>
                                                             ({{$curt->operator_curts()->name}}
                                                             {{$curt->operator_curts()->family}})
                                                             ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                             <br>
                                                             {{$curt->necessity}}
                                                             </li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.innovation')}}
                                                </label>
                                                 <h6 class="mt-3 mb-6 prf" style=" ">
                                                    {{$main_curt->innovation}}
                                                </h6>

                                                <textarea name="innovation" class="form-control hide inp" id="title"
                                                    cols="30" rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                  <ul>
                                                    @foreach ($all_curts as  $curt)
                                                    @if ( $curt->innovation)
                                                    <li>
                                                     ({{$curt->operator_curts()->name}}
                                                     {{$curt->operator_curts()->family}})
                                                     ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                     <br>
                                                     {{$curt->innovation}}
                                                     </li>
                                                    @endif
                                                @endforeach
                                                  </ul>
                                            </div>
                                        </div>


                                        <div class="col-xl-12   bg-light  mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                 {{__('sentences.suggested_master')}}

                                                </label>
                                                @if ($main_curt->ostad_id)
                                                <p>
                                                    {{__('sentences.suggested_master_list')}}:
                                                    {{$main_curt->ostad_a->name}}
                                                    {{$main_curt->ostad_a->family}}
                                                </p>
                                                @endif
                                                @if ($main_curt->ostad)
                                                <p>
                                                    {{__('sentences.suggested_master_list')}}:
                                                    {{$main_curt->ostad}}
                                                </p>
                                                @endif
                                                @if ($main_curt->resume)
                                                <p>
                                                   <a href="{{assrt('/media/curt/'.$main_curt->resume)}}" target="_blank">   {{__('sentences.download_resume')}}:</a>
                                                </p>
                                                @endif

                                                </p>

                                            </div>
                                        </div>

                                        <div class="col-xl-12   bg-light  mb-2 par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>
                                                    {{__('sentences.snote')}}
                                                </label>

                                                <textarea name="note" class="form-control hide inp" id="title"
                                                    cols="30" rows="6"></textarea>
                                                    <span class="show btn btn-success font-weight-bolder font-size-sm">
                                                        {{__('sentences.insert_note')}}
                                                        </span>
                                                  <ul>
                                                    @foreach ($all_curts as  $curt)
                                                    @if ( $curt->note)
                                                    <li>
                                                     ({{$curt->operator_curts()->name}}
                                                     {{$curt->operator_curts()->family}})
                                                     ({{ Morilog\Jalali\Jalalian::forge($curt->created_at)->format('d-m-Y')}})
                                                     <br>
                                                     {{$curt->note}}
                                                     </li>
                                                    @endif
                                                     @endforeach
                                                  </ul>
                                            </div>
                                        </div>


                                            @if (!$main_curt->master_id)
                                            @role('master')
                                            <div class="col-xl-6  bg-light ">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>

                                                        {{__('sentences.select_final_master')}}

                                                    </label>
                                                    <select name="master_id" id="ostad" class="form-control  select2">
                                                        <option value="">{{__('sentences.select_one')}} </option>
                                                        @foreach ($masters as $master
                                                        )
                                                        <option value="{{$master->id}}">{{$master->name}}
                                                            {{$master->family}}</option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </div>
                                            @endrole
                                            @else
                                            <input type="text" hidden value="{{$main_curt->master_id}}" name="master_id">
                                            @endif



                                            @if (!$main_curt->guid_id)
                                            @role('master')
                                            <div class="col-xl-6  bg-light ">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>
                                                        {{__('sentences.select_guid_master')}}
                                                    </label>
                                                    <select name="guid_id" id="" class="form-control  select2">
                                                        <option value="">{{__('sentences.select_one')}} </option>
                                                        @foreach (App\Models\User::where('level','master')->get() as $master
                                                        )
                                                        <option  {{old('guid_id')==$master->id?'selected':''}} value="{{$master->id}}">{{$master->name}}
                                                            {{$master->family}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            @endrole
                                            @endif


                                        <div class="col-xl-12  bg-light
                                        @hasrole('expert|master')
                                        @else
                                        height0

                                        @endhasrole
                                        ">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>       {{__('sentences.tags')}}    </label>
                                                <select name="tags[]" id="tags" class="form-control select2_tag" multiple="multiple">
                                                    <option disabled="disabled" value="">{{__('sentences.select_one')}}</option>
                                                    @foreach (App\Models\Tag::all() as $tag)
                                                    <option {{in_array($tag->id ,old('tags',$main_curt->tags()->pluck('id')->toArray()))?'selected':''}} value="{{$tag->id}}">{{$tag->tag}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>




                                        @if(!$main_curt->group_id)

                                        @role('expert')
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>

                                                    {{__('sentences.select_final_group')}}



                                                </label>
                                                <select name="group_id" id="ostad" class="form-control  ">
                                                    <option value="">           {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\Group::all() as $group
                                                    )
                                                    <option {{old('group_id')==$group->id?'selected':''}} value="{{$group->id}}">
                                                        {{__('sentences.group')}}
                                                        {{$group->name}}
                                                      (
                                                        {{__('sentences.manager')}}:
                                                          {{$group->admin()->name}}
                                                          {{$group->admin()->family}}
                                                      )
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        @endrole
                                        @endif


                                        <div class="col-xl-12  bg-success   par">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>

                                                    {{__('sentences.final_result')}}
                                                </label>
                                                <select class="form-control" name="status" id="">
                                                    <option value="">   {{__('sentences.select_one')}}</option>
                                                    <option {{old('status')=='reject' ?'selected':''}} value="reject">

                                                        {{__('sentences.should_edit_cuert')}}
                                                        </option>

                                                    <option {{old('status')=='faild' ?'selected':''}} value="faild">
                                                        {{__('sentences.reject_curt')}}
                                                      </option>

                                                        @role('master')
                                                        <option {{old('status')=='accept' ?'selected':''}} value="accept">
                                                            {{__('sentences.accept_curt')}}
                                                         </option>

                                                        <option {{old('status')=='accept_without_master' ?'selected':''}} value="accept_without_master">
                                                            {{__('sentences.accept_without_master')}}
                                                         </option>
                                                            @endrole

                                                        @role('expert')
                                                        <option {{old('pass_to_group')=='accept' ?'selected':''}} value="pass_to_group">
                                                            {{__('sentences.pass_to_group')}}
                                                         </option>
                                                            @endrole
                                                </select>

                                            </div>
                                        </div>







                                    </div>

                                    <div class="co-xl-12">
                                        <div id="similar_tags"></div>
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
                                            @if ($main_curt->group_id)
                                            <p>
                                                {{__('sentences.cant_comment')}}

                                            </p>
                                            @else
                                            <input type="submit" value="       {{__('sentences.save')}}   " class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            @endif
                                            @endrole

                                            @role('master')
                                            <input type="submit" value="       {{__('sentences.save')}}   " class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            @endrole
                                            {{-- <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                href="{{route('admin.curt')}}">برکشت</a> --}}


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


        </div>
        <!--end::ویزارد-->


    </div>
</div>

@endsection
