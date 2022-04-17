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
                                {{ __('sentences.subject_table') }}
                                <span class="text-muted pt-2 font-size-sm d-block">
                                    {{ __('sentences.subject_list') }}

                                </span>
                            </h3>
                        </div>
                        <div class="card-toolbar">

                            @role('master')
                            <!--begin::دکمه-->
                            <a href="{{ route('subject.create') }}" class="btn btn-primary font-weight-bolder">
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
                                </span> {{ __('sentences.new_subject') }}
                            </a>
                            <!--end::دکمه-->
                            @endrole
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
                                                {{ __('sentences.subject_title') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.final_master') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.first_master') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.subject_admin') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.subject_user') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.status') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.info') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.tags') }}
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
                                    @foreach ($subjects as $subject)
                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span>
                                            </td>
                                            <td class="datatable-cell text-center"><span>{{ $subject->title }} </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                @if ($subject->master_id)
                                                {{ $subject->master->name }}
                                                {{ $subject->master->family }}
                                            @endif
                                            </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                @if ($subject->old_master_id)
                                                {{ $subject->old_master->name }}
                                                {{ $subject->old_master->family }}
                                            @endif
                                            </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                    @if ($subject->admin_id)
                                                        {{ $subject->admin->name }}
                                                        {{ $subject->admin->family }}
                                                    @endif

                                                </span></td>
                                            <td class="datatable-cell text-center">
                                                <span>

                                                    @if ($subject->user)
                                                        {{ $subject->user->name }}
                                                        {{ $subject->user->family }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>
                                                    @switch($subject->status)
                                                        @case(null)
                                                        {{ __('sentences.in_progress') }}
                                                            @break
                                                        @case(1)
                                                        {{ __('sentences.confirmed') }}
                                                            @break
                                                        @case(0)
                                                        {{ __('sentences.failed') }}
                                                            @break
                                                        @default

                                                    @endswitch
                                                </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>
                                                    {{$subject->info}}
                                                </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>
                                                    {{implode(', ', $subject->tags()->pluck('tag')->toArray())}}
                                                </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ Morilog\Jalali\Jalalian::forge($subject->created_at)->format('Y-m-d') }}
                                                </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                {{-- <a class="btn btn-outline-primary"
                                            href="{{route('subject.edit',$subject->id)}}">ویرایش</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>

                            {{ $subjects->appends(Request::all())->links('sections.pagination') }}

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
