@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">


                <div class="row">
                    <div class="col-lg-12 order-1 order-xxl-2">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">
                                    {{ __('sentences.notes') }}


                                </h3>

                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <ul>
                                    <li>
                                        {{ __('sentences.note6') }}
                                    </li>
                                    <li>  {{ __('sentences.note7') }} </li>
                                    <li>  {{ __('sentences.note8') }}  </li>
                                    <li>   {{ __('sentences.note9') }} </li>
                                    <li>   {{ __('sentences.note10') }} </li>
                                </ul>

                                <form action="{{route('student.subject.list')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="submit" class="btn btn-success" value=" {{ __('sentences.select_curt') }} ">

                                <a class="btn  btn-primary" href="{{route('curt.create')}}">{{ __('sentences.create_curt') }}</a>

                                </form>

                                {{-- <a class="btn " href="{{route('student.subject.list')}}">{{ __('sentences.select_curt') }}</a> --}}


                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
