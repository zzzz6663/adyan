@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">


            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ __('sentences.quiz_table') }}
                             <span class="text-muted pt-2 font-size-sm d-block">
                                    {{ __('sentences.quiz_list') }}
                            </span>
                        </h3>
                    </div>
                    <div class="card-toolbar">


                        <!--begin::دکمه-->
                        <a href="{{route('quiz.create')}}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/طرح/Flatten.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                        <path
                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                            fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            {{ __('sentences.new_quiz') }}
                        </a>
                        <!--end::دکمه-->
                    </div>
                </div>
                <div class="card-body">


                    <!--begin: جدول داده ها-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                        id="kt_datatable" style="">
                        <table class="datatable-table" style="display: block;">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.id') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.creator') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.quiz_name') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.question_count') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.question_duration') }}

                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.quiz_show_status') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.created_at') }}
                                        </span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.action') }}
                                        </span>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="datatable-body" style="">
                                @foreach ($quizzes as $quiz)
                                <tr class="datatable-row" style="left: 0px;">
                                    <td class="datatable-cell text-center"><span>{{$loop->iteration}} </span></td>
                                    <td class="datatable-cell text-center"><span>
                                        {{$quiz->user->name}}
                                        {{$quiz->user->family}}
                                     </span></td>
                                    <td class="datatable-cell text-center"><span>{{$quiz->title}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$quiz->questions()->count()}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$quiz->duration}} </span></td>
                                    <td class="datatable-cell text-center"><span class="text-{{$quiz->active=='1'?'success':'danger'}}">{{$quiz->active=='1'?'نمایش':'عدم نمایش'}} </span></td>


                                    <td class="datatable-cell text-center">
                                        <span>{{Morilog\Jalali\Jalalian::forge($quiz->created_at)->format('Y-m-d')}}
                                        </span>
                                    </td>
                                    <td class="datatable-cell text-center">

                                            <form method="post" action="{{route('admin.default.quiz')}}">
                                                @csrf
                                                @method('post')
                                                @role('expert')
                                                <a class="btn btn-outline-primary"
                                                    href="{{route('quiz.edit',$quiz->id)}}">       {{ __('sentences.edit') }}</a>
                                                    @endrole
                                                    <a class="btn btn-outline-danger"
                                                    href="{{route('quiz.question.index',$quiz->id)}}">       {{ __('sentences.questions') }}</a>
                                                <input type="text" value="{{$quiz->id}}" name="quiz_id" hidden>
                                                @role('admin')
                                                @if ($quiz->def)
                                                <span class="text text-success">{{__('sentences.used_defalut_quiz')}}</span>
                                                    @else
                                                <input type="submit" class="btn btn-primary"value="{{__('sentences.use_defalut_quiz')}}">

                                                @endif
                                                @endrole
                                            </form>
                                    </td>

                                </tr>

                                @endforeach



                            </tbody>
                        </table>

                            {{ $quizzes->appends(Request::all())->links('sections.pagination') }}

                    </div>
                    <!--end: جدول داده ها-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>

@endsection
