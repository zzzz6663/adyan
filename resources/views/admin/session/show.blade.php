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
                            {{ __('sentences.session_all_table') }}
                            {{ __('sentences.session_all_list') }}
                             <span class="text-muted pt-2 font-size-sm d-block">

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
                        <h1> {{__('sentences.session_curts')}}</h1>
                        <table class="datatable-table" style="display: block;">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.id')}}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.title')}}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.student')}}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.master')}}
                                        </span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.created_at')}}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.action')}}
                                        </span>
                                    </th>


                                </tr>
                            </thead>
                            <tbody class="datatable-body" style="">
                                @foreach ($session->curts as $curt)
                                <tr class="datatable-row" style="left: 0px;">
                                    <td class="datatable-cell text-center"><span>{{$loop->iteration}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$curt->title}} </span></td>
                                    <td class="datatable-cell text-center"><span>
                                        {{$curt->user->name}}
                                        {{$curt->user->family}}
                                    </span></td>

                                    <td class="datatable-cell text-center"><span>{{__('arr.'.$curt->level)}} </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        <span>{{Morilog\Jalali\Jalalian::forge($curt->created_at)->format('Y-m-d')}}
                                        </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        <a class="btn btn-outline-primary"
                                            href="{{route('admin.show.curt',$curt->id)}}">مشاهده</a>
                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                        </table>


                    </div>
                    <!--end: جدول داده ها-->




                </div>

                <div class="card-body">


                    <!--begin: جدول داده ها-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                        id="kt_datatable" style="">
                        <h1> {{__('sentences.session_subjects')}}</h1>
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
                                @foreach ($session->subjects as $subject)
                                    <tr class="datatable-row" style="left: 0px;">
                                        <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span>
                                        </td>
                                        <td class="datatable-cell text-center"><span>{{ $subject->title }} </span></td>
                                        <td class="datatable-cell text-center"><span>
                                                @if ($subject->admin_id)
                                                    {{ $subject->admin->name }}
                                                    {{ $subject->admin->family }}
                                                @endif

                                            </span></td>
                                        <td class="datatable-cell text-center">
                                            <span>

                                                @if ($subject->user_id)
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
                                            <span>{{ Morilog\Jalali\Jalalian::forge($subject->created_at)->format('Y-m-d') }}
                                            </span>
                                        </td>
                                        <td class="datatable-cell text-center">
                                            @if ($subject->time)
                                                <span class="text  text-success">بررسی شده </span>
                                              @else
                                              <a class="btn btn-outline-primary"
                                              href="{{route('subject.edit',$subject->id)}}">تعیین جلسه </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>


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
