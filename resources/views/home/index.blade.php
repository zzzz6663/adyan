@extends('master.main')


@php($side = true)
@php($header = true)
@php($footer = true)


@section('script')
<script src="/assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
@endsection
@section('main')
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <!--begin::Aside header-->
                    <a href="#" class="text-center mb-10">
                        <img src="assets/media/logos/logo-letter-1.png" alt="">
                    </a>
                    <!--end::Aside header-->

                    <!--begin::Aside title-->
                    <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">

                        {{__('sentences.app_name')}}
                    </h3>
                    <!--end::Aside title-->
                </div>
                <!--end::Aside Top-->

                {{-- <!--begin::Aside Bottom-->
                                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/media/svg/illustrations/login-visual-1.svg)"></div>
                                <!--end::Aside Bottom--> --}}
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div
                class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                <!--begin::Content body-->

                <div class="d-flex flex-column-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form login-signin">

                        <!--begin::Form-->
                        <form method="POST" autocomplete="off" action="{{ route('user.signin') }}">
                            @csrf
                            @method('post')
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">

                                </h3>
                                <div class="dropdown" hidden style="display: inline-block">
                                    <!--begin::Toggle-->
                                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px"
                                        aria-expanded="false">
                                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                            <img class="h-20px w-20px rounded-sm"

                                              src="/assets/media/svg/flags/136-iran.svg" alt="">
                                        </div>
                                    </div>
                                    <!--end::Toggle-->

                                    <!--begin::دراپ دان-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right"
                                        style="">
                                        <!--begin::Nav-->
                                        <ul class="navi navi-hover py-4">
                                            <!--begin::Item-->
                                            <li class="navi-item">
                                                <a href="{{route('lang',['lang'=>'en'])}}" class="navi-link">
                                                    <span class="symbol symbol-20 mr-3">
                                                        <img src="/assets/media/svg/flags/020-iraq.svg" alt="">
                                                    </span>
                                                    <span class="navi-text">عراق</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="navi-item active">
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
                                <span class="text-muted font-weight-bold font-size-h4">
                                    {{ __('sentences.become_a_member') }}
                                    <a href="{{ route('user.register1') }}" class="text-primary font-weight-bolder">
                                                                          {{ __('sentences.create_account') }}

                                    </a></span>



                            </div>
                            <!--begin::Title-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <label class="font-size-h6 font-weight-bolder text-dark">   {{ __('sentences.email') }}</label>
                                <input autocomplete="off"
                                    class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text"
                                    name="username" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5"> {{ __('sentences.password') }}  </label>

                                    <a href="#"
                                        class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"
                                        id="kt_login_forgot">
                                        {{ __('sentences.forget_password') }}
                                    </a>
                                </div>

                                <input autocomplete="off"
                                    class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password"
                                    name="password" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::اکشن-->
                            <div class="pb-lg-0 pb-5">
                                <input type="submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3"
                                    value="   {{ __('sentences.login') }}">
                                {{-- <button  id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">ورود</button> --}}

                                {{-- <button type="button" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
                            <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/social-icons/google.svg--><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
    <path d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z" fill="#4285F4"></path>
    <path d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z" fill="#34A853"></path>
    <path d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z" fill="#FBBC05"></path>
    <path d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z" fill="#EB4335"></path>
</svg><!--end::Svg Icon--></span>                            ورود با گوگل
                                                </button> --}}
                            </div>
                            <!--end::اکشن-->
                            <input type="hidden">
                            <div></div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->

                    <!--begin::ثبت نام-->
                    <div class="login-form login-signup">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate"
                            id="kt_login_signup_form">
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">ثبت نام</h3>
                                <p class="text-muted font-weight-bold font-size-h4">برای ایجاد حساب کاربری ، جزئیات خود را
                                    وارد کنید</p>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    type="text" placeholder="نام و ناو خانوادگی" name="fullname" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    type="email" placeholder="پست الکترونیک" name="email" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    type="password" placeholder="کلمه عبور" name="password" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    type="password" placeholder="تکرار کلمه عبور" name="cpassword" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <label class="checkbox mb-0">
                                    <input type="checkbox" name="agree">می پذیرم <a href="#">قوانین و مقررات</a>.
                                    <span></span>
                                </label>
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                                <button type="button" id="kt_login_signup_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">ارسال</button>
                                <button type="button" id="kt_login_signup_cancel"
                                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">لغو</button>
                            </div>
                            <!--end::Form group-->
                            <div></div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::ثبت نام-->

                    <!--begin::Forgot-->
                    <div class="login-form login-forgot">
                        <!--begin::Form-->

                        <form action="{{ route('forget.password') }}" method="post"
                            class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate"
                            id="kt_login_forgot_form">
                            @csrf
                            @method('post')
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">کلمه عبور خود را
                                    فراموش کرده اید؟</h3>
                                <p class="text-muted font-weight-bold font-size-h4">ایمیل تان را وارد کنید تا پسوردتان ریست
                                    شود</p>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form group-->
                            <div class="form-group fv-plugins-icon-container">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    type="email" placeholder="پست الکترونیک" name="email_forget" autocomplete="off">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap pb-lg-0">
                                <button id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">ارسال</button>
                                <button type="button" id="kt_login_forgot_cancel"
                                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">لغو</button>
                            </div>
                            <!--end::Form group-->
                            <div></div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                </div>
                <!--end::Content body-->

                <!--begin::Content footer-->
                <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                    <a href="#" class="text-primary font-weight-bolder font-size-h5">مقررات</a>
                    <a href="{{route('news.list')}}" class="text-primary ml-10 font-weight-bolder font-size-h5">  اخبار</a>
                    {{-- <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">    ما</a> --}}
                </div>
                <!--end::Content footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
@endsection
