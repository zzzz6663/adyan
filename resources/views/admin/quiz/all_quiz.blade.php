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
                                {{ __('sentences.all_quiz_table') }}
                                <span class="text-muted pt-2 font-size-sm d-block">
                                    {{ __('sentences.all_quiz_list') }}
                                </span>
                            </h3>
                        </div>
                        <div class="card-toolbar">



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
                                                {{ __('sentences.student') }}

                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.result') }}

                                            </span>
                                        </th>


                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.created_at') }}

                                            </span>
                                        </th>

                                        {{-- <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.action') }}

                                            </span>
                                        </th> --}}

                                    </tr>
                                </thead>
                                <tbody class="datatable-body" style="">
                                    @foreach ($quizzes as $quiz)
                                        <?php

                                        $student = App\Models\User::find($quiz->user_id);
                                        if (!$student) {
                                            continue;
                                            # code...
                                        }
                                        ?>

                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span>
                                            </td>
                                            <td class="datatable-cell text-center"><span>
                                                    {{ $student->name}}
                                                    {{ $student->family }}
                                            </span></td>
                                            <td class="datatable-cell text-center"><span>{{ $quiz->result=='1' ?'قبول ':'مردود'}}
                                                </span></td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ Morilog\Jalali\Jalalian::forge($quiz->time)->format('Y-m-d') }}
                                                </span>
                                            </td>
                                            {{-- <td class="datatable-cell text-center">
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('quiz.edit', $quiz->id) }}">
                                                    {{ __('sentences.edit') }}</a>
                                                <a class="btn btn-outline-danger"
                                                    href="{{ route('quiz.question.index', $quiz->id) }}">
                                                    {{ __('sentences.questions') }}</a>
                                            </td> --}}

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
