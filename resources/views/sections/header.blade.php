
<!--begin::Header-->
<div id="kt_header" class="header  header-fixed ">
    <!--begin::Container-->
    <div class=" container  d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu"
                class="header-menu header-menu-mobile  header-menu-layout-default ">

<!--begin::دراپ دان-->
            </div>
              <!--end::Toggle-->

            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

        <!--begin::Topbar-->
        <div class="topbar">

            <div class="dropdown"  >
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false">
                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px active" id="kt_aside_mobile_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>

            </div>
            <div class="dropdown"  >
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px"
                    aria-expanded="false">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                            @if (session('locale')=='ar')
                             <img class="h-20px w-20px rounded-sm" src="/assets/media/svg/flags/020-iraq.svg" alt="">

                            @else
                        <img class="h-20px w-20px rounded-sm" src="/assets/media/svg/flags/136-iran.svg" alt="">

                            @endif
                    </div>
                </div>

                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right"
                    style="">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        <li class="navi-item {{session('locale')=='ar' ? 'active' :''}}">
                            <a href="{{route('lang',['lang'=>'ar'])}}" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="/assets/media/svg/flags/020-iraq.svg" alt="">
                                </span>
                                <span class="navi-text">عراق</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="navi-item {{(session('locale')?? config('app.locale'))=='fa' ? 'active' :''}}">
                            <a href="{{route('lang',['lang'=>'fa'])}}" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="/assets/media/svg/flags/136-iran.svg" alt="">
                                </span>
                                <span class="navi-text">ایران</span>
                            </a>
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::دراپ دان-->
            </div>
            <!--begin::اعلان ها-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/کد/Compiling.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->

                <!--begin::دراپ دان-->
                <div
                    class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column  bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url(assets/media/misc/bg-1.jpg)">
                            <!--begin::Title-->

                            <!--end::Title-->

                            <!--begin::تب ها-->

                            <!--end::تب ها-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane active show p-8"
                                id="topbar_notifications_notifications" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="scroll pr-7 mr-n7" data-scroll="true" data-height=""
                                    data-mobile-height="200">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-6">
                                            <!--begin::سیمبل-->
                                            <div class="symbol symbol-40 symbol-light-warning mr-5">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-warning">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/Write.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />
                                                                <path
                                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span> </span>
                                            </div>
                                            <!--end::سیمبل-->

                                            <!--begin::متن-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                @if (auth()->check())

                                                <a href="{{route('user.edit.profile',auth()->user()->id)}}"
                                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg">
                                                    {{__('sentences.edit_profile')}}
                                                      </a>
                                                @endif

                                            </div>
                                            <!--end::متن-->
                                        </div>
                                        <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-6">
                                        <!--begin::سیمبل-->
                                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                                            <span class="symbol-label">
                                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/home/کتابخانه.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                fill="#000000" />
                                                            <rect fill="#000000" opacity="0.3"
                                                                transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                                x="16.3255682" y="2.94551858" width="3"
                                                                height="18" rx="1" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span> </span>
                                        </div>
                                        <!--end::سیمبل-->

                                        <!--begin::متن-->
                                        <div class="d-flex flex-column font-weight-bold">
                                            <a href="{{route('logout')}}"
                                                class="text-dark text-hover-primary mb-1 font-size-lg">    {{ __('sentences.exit') }} </a>

                                        </div>
                                        <!--end::متن-->
                                    </div>
                                    <!--end::Item-->


                                </div>
                                <!--end::Scroll-->


                            </div>
                            <!--end::Tabpane-->


                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::دراپ دان-->
            </div>
            <!--end::اعلان ها-->









            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon  w-auto btn-clean d-flex align-items-center btn-lg px-2"
                    id="kt_quick_user_toggle">
                    <span
                        class="text-muted font-weight-bold font-size-base d-md-inline mr-1">
                        {{ __('sentences.hi') }}
                    </span>
                        @auth
                        <span
                        class="text-dark-50 font-weight-bolder font-size-base e d-md-inline mr-3">
                        {{auth()->user()->name}}
                        {{auth()->user()->family}}
                    </span>
                      @endauth

                    {{--  <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">م</span>
                    </span>  --}}
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
