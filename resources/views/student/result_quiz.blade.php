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
                                <h3 id="quiz_p" class="card-title font-weight-bolder text-dark"> {{ __('sentences.quiz_result') }}  </h3>

                            </div>
                            <!--end::Header-->
                            <p class="text text-sm-center  font-size-h4 text-secondary">
                                {{ __('sentences.question_count') }}:
                                {{$total_question}}
                            </p>
                            <p class="text text-sm-center  font-size-h4 text-success">
                                {{ __('sentences.correct_answer') }}:
                                {{$correct}}
                            </p>
                            <p class="text  text-sm-center  font-size-h1 text-{{$quiz_result?'success':'danger'}}">
                                @if ($quiz_result)
                                {{ __('sentences.quiz_success_message') }}


                                @else
                                {{ __('sentences.quiz_fail_message') }}
                                @endif

                            </p>




                            <!--begin::Body-->
                            <div class="card-body pt-0">

                                <a class="btn  btn-danger" href="{{route('user.note')}}">       {{ __('sentences.back_to_dash') }}  </a>


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
