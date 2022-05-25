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
                    <div class="col-lg-12 ">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 id="quiz_p" class="card-title font-weight-bolder text-dark">  زمان </h3>

                                <div id="progressBar" data-time="{{$questions->count()*$quiz->duration}}">
                                    <div class="bar"></div>
                                  </div>

                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <form id="quiz_form" action="{{ route('student.quiz.result') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <ul class="row" style="list-style: none">
                                        @foreach ($questions as $question)
                                            <li class="col-lg-6">

                                                <div class="form-group   border-primary p-5">
                                                    <label class="mb-5">
                                                            {{$loop->iteration}}-
                                                        {{ $question->question }}
                                                        {{ $question->answer }}

                                                    </label>
                                                    <div class="radio-">
                                                        <input type="text" hidden name="quiz_id" value="{{$quiz->id}}">
                                                        <input type="text" hidden name="number" value="{{$number}}">
                                                        <input type="text" hidden name="answer[{{$question->id}}]">
                                                        <label class="radio radio-lg mb-5">
                                                            <input type="radio"  name="answer[{{$question->id}}]" value="1">
                                                            <span></span>
                                                           {{$question->a1}}
                                                        </label>
                                                        <label class="radio radio-lg mb-5">
                                                            <input type="radio" name="answer[{{$question->id}}]" value="2">
                                                            <span></span>
                                                            {{$question->a2}}
                                                        </label>
                                                        <label class="radio radio-lg mb-5">
                                                            <input type="radio" name="answer[{{$question->id}}]" value="3">
                                                            <span></span>
                                                            {{$question->a3}}
                                                        </label>
                                                        <label class="radio radio-lg mb-5">
                                                            <input type="radio" name="answer[{{$question->id}}]"  value="4">
                                                            <span></span>
                                                            {{$question->a4}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>


                                    <span id="finish_butt" class="btn btn-danger" >{{ __('sentences.end_quiz') }}</span>
                                    <h1 class="finish_zone hide" >
                                        {{ __('sentences.for_end_quiz') }}

                                    </h1>
                                    <input id=""   type="submit" value="{{ __('sentences.end') }}" class="btn btn-primary finish_zone hide" >
                                    <span id="cancel_finish_butt" class="btn btn-success  hide finish_zone" >{{ __('sentences.i_continue') }}
                                    </span>
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
