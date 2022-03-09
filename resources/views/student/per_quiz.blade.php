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
                                        {{ __('sentences.note1') }}
                                    </li>
                                    <li>  {{ __('sentences.note2') }} </li>
                                    <li>  {{ __('sentences.note3') }}  </li>
                                    <li>   {{ __('sentences.note4') }} </li>
                                    <li>  {{ __('sentences.note5') }} </li>
                                </ul>

                                <form action="{{route('student.per.quiz')}}" method="post">
                                    <input type="submit" class="btn btn-success" value=" {{ __('sentences.start_quiz') }} ">
                                <a class="btn  btn-danger" href="{{route('user.note')}}">{{ __('sentences.abrot_quiz') }}</a>

                                    @csrf
                                    @method('post')
                                </form>

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
