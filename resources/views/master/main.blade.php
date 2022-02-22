<!DOCTYPE html>
<html lang="fa"  direction="rtl" dir="rtl" style="direction: rtl">
<head>

    <meta charset="UTF-8">
    <title>@yield('title')


    </title>

    {{--  <link rel="stylesheet" href="/css/style.css">  --}}
    {{--  <link rel="stylesheet" href="/css/responsive.css">  --}}
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/croppie.css">
    <link rel="stylesheet" href="/css/persian-datepicker.css">
    <link rel="stylesheet" href="/css/persianDatepicker-default.css">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="google-site-verification" content="qc-1R8WG_jNsY_X86nabe6b9Bb5JoNwUdh-SnUXtI-Q" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content=" سامانه مدیریت پژوهش دانشکده رسانه و ارتباطات دانشگاه ادیان و مذاهب">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{@csrf_token()}}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



    <!--begin::Head-->
 <base href="">
        <meta name="description" content="Updates and statistics"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
      <link href="/assets/css/pages/login/login-1.rtl.css?v=7.0.6" rel="stylesheet" type="text/css">
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <!--end::Page Vendors Styles-->


        <!--begin::Global تم Styles(used by all pages)-->
        <link href="/assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/style.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <!--end::Global تم Styles-->

        <!--begin::چیدمان تم ها(used by all pages)-->

        <link href="/assets/css/themes/layout/header/base/light.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/themes/layout/header/menu/light.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/themes/layout/brand/dark.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/themes/layout/aside/dark.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/pages/wizard/wizard-1.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="/css/persian-datepicker.css">

        <link rel="shortcut icon" href="/assets/media/logos/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

    <link href="/css/app.css" rel="stylesheet" type="text/css"/>

        @yield('css')
    </head>
    <!--end::Head-->

    <body id="kt_body" style=" " class="{{Route::currentRouteName()=='home.index'?'':'aside-fixed header-fixed '}}  quick-panel-right demo-panel-right offcanvas-right  subheader-enabled" cz-shortcut-listen="true">
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                @includeWhen( empty($side),'sections.sidebar')
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    @includeWhen( empty($header),'sections.header')
                    @yield('main')
                    @includeWhen( empty($footer),'sections.footer')
                </div>

            </div>
        </div>
{{--  <script>var HOST_URL  = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global جی اس scripts)-->
<script>
    var KTAppSettings  = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->  --}}


<script>var HOST_URL  = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global جی اس scripts)-->
<script>
    var KTAppSettings  = {
"breakpoints": {
"sm": 576,
"md": 768,
"lg": 992,
"xl": 1200,
"xxl": 1400
},
"colors": {
"theme": {
    "base": {
        "white": "#ffffff",
        "primary": "#3699FF",
        "secondary": "#E5EAEE",
        "success": "#1BC5BD",
        "info": "#8950FC",
        "warning": "#FFA800",
        "danger": "#F64E60",
        "light": "#E4E6EF",
        "dark": "#181C32"
    },
    "light": {
        "white": "#ffffff",
        "primary": "#E1F0FF",
        "secondary": "#EBEDF3",
        "success": "#C9F7F5",
        "info": "#EEE5FF",
        "warning": "#FFF4DE",
        "danger": "#FFE2E5",
        "light": "#F3F6F9",
        "dark": "#D6D6E0"
    },
    "inverse": {
        "white": "#ffffff",
        "primary": "#ffffff",
        "secondary": "#3F4254",
        "success": "#ffffff",
        "info": "#ffffff",
        "warning": "#ffffff",
        "danger": "#ffffff",
        "light": "#464E5F",
        "dark": "#ffffff"
    }
},
"gray": {
    "gray-100": "#F3F6F9",
    "gray-200": "#EBEDF3",
    "gray-300": "#E4E6EF",
    "gray-400": "#D1D3E0",
    "gray-500": "#B5B5C3",
    "gray-600": "#7E8299",
    "gray-700": "#5E6278",
    "gray-800": "#3F4254",
    "gray-900": "#181C32"
}
},
"font-family": "Poppins"
};
</script>
<!--end::Global Config-->

<!--begin::Global تم Bundle(used by all pages)-->

<script src="/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="/assets/js/scripts.bundle.js?v=7.0.6"></script>
<!--end::Global تم Bundle-->
<script src="/assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
{{--  <!--begin::Page Vendors(used by this page)-->
<script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
<!--end::Page Vendors-->  --}}

{{--  <!--begin::Page Scripts(used by this page)-->
<script src="/assets/js/pages/widgets.js?v=7.0.6"></script>
<!--end::Page Scripts-->  --}}


{{--  <script src="assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>  --}}
{{--  <scridpt type="text/javascript" src="/js/jquery-2.2.0.min.js"></scridpt>  --}}


<script type="text/javascript" src="/js/persian-date.min.js"></script>
<script type="text/javascript" src="/js/persian-datepicker.min.js"></script>
<script type="text/javascript" src="/js/select2.full.min.js"></script>
<script type="text/javascript" src="/js/iziToast.min.js"></script>
<script type="text/javascript" src="/js/croppie.js"></script>
<script type="text/javascript" src="/js/fun.js"></script>
<script type="text/javascript" src="/js/app.js"></script>


<script type="text/javascript" src="/home/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/home/js/persianDatepicker.min.js"></script>
<script type="text/javascript" src="/home/js/persian-date.min.js"></script>
<script type="text/javascript" src="/home/js/persian-datepicker.min.js"></script>
{{--  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JT7Q3JNZJ8"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-JT7Q3JNZJ8');
</script>  --}}
</body>
@include('sweet::alert')
</html>
