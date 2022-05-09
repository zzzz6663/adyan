@extends('master.main')


@php($side = true)
@php($header = true)
@php($footer = true)


@section('script')
<script src="/assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
@endsection
@section('main')

<div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(/assets/media/error/bg6.jpg);">
    <!--begin::Content-->
    <div class="d-flex flex-column flex-row-fluid text-center">
        <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">متاسفیم !...</h1>
        <p class="display-4 font-weight-bold text-white">
            به نظر می رسد مشکلی پیش آمده است.</br>
            ما روی آن کار می کنیم
        </p>
    </div>
    <!--end::Content-->
</div>
@endsection
