@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom">
                @if (isset($group) && $group->id)

                <div class="col-xxl-12 order-2 order-xxl-1">
                    <!--begin::پیشرفت Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column mt-14">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_curt_wait') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <!--begin: جدول داده ها-->
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
                                                 {{ __('sentences.title') }}
                                             </span>
                                         </th>
                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.student') }}
                                             </span>
                                         </th>
                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.status') }}
                                             </span>
                                         </th>

                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.last_change_student_date') }}

                                             </span>
                                         </th>
                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.created_at') }}
                                             </span>
                                         </th>

                                     </tr>
                                 </thead>
                                 <tbody class="datatable-body" style="">
                                     {{-- @foreach ($user->master_curts()->whereType('primary')->get() as $mastercrut) --}}
                                     @foreach ($my_curt_waits=$group->curts()->whereType('primary')->whereSide('0')->paginate(10, ['*'], 'my_curt_wait') as $mastercrut)
                                     <tr class="datatable-row" style="left: 0px;">
                                         <td class="datatable-cell text-center">
                                             <span>{{ $loop->iteration }} </span>
                                         </td>
                                         <td class="datatable-cell text-center">
                                             <span>{{ $mastercrut->title }} </span>
                                         </td>
                                         <td class="datatable-cell text-center">
                                             <span>
                                                 {{ $mastercrut->user->name }}
                                                 {{ $mastercrut->user->family }}
                                              </span>
                                         </td>
                                         <td class="datatable-cell text-center">
                                            <span>
                                                    {{__('arr.'.$mastercrut->status)}}
                                            </span>
                                        </td>

                                         <td class="datatable-cell text-center">
                                             <span>
                                                @if ($mastercrut->last_edit_student())
                                                {{$mastercrut->last_edit_student()}}
                                                @endif
                                             </span>
                                         </td>


                                         <td class="datatable-cell text-center">
                                             <span>{{
                                                 Morilog\Jalali\Jalalian::forge($mastercrut->created_at)->format('Y-m-d')
                                                 }}
                                             </span>
                                         </td>
                                         {{-- <td class="datatable-cell text-center">
                                             <a class="btn btn-outline-primary"
                                                 href="{{ route('survey.show', $mastercrut->id) }}">مشاهده</a>
                                         </td> --}}
                                     </tr>
                                     @endforeach



                                 </tbody>
                             </table>
                             {{ $my_curt_waits->appends(Request::all())->links('sections.pagination') }}

                         </div>
                         <!--end: جدول داده ها-->
                                <!--end: جدول داده ها-->
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column mt-14">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_curt_all') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <!--begin: جدول داده ها-->
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
                                                 {{ __('sentences.title') }}
                                             </span>
                                         </th>
                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.student') }}
                                             </span>
                                         </th>
                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.status') }}
                                             </span>
                                         </th>

                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.last_change_student_date') }}

                                             </span>
                                         </th>
                                         <th class="datatable-cell datatable-cell-sort text-center">
                                             <span>
                                                 {{ __('sentences.created_at') }}
                                             </span>
                                         </th>

                                     </tr>
                                 </thead>
                                 <tbody class="datatable-body" style="">
                                     {{-- @foreach ($user->master_curts()->whereType('primary')->get() as $mastercrut) --}}
                                     @foreach ($my_curt_alls=$group->curts()->whereType('primary')->whereType('primary')->paginate(10, ['*'], 'my_curt_all') as $mastercrut)
                                     <tr class="datatable-row" style="left: 0px;">
                                         <td class="datatable-cell text-center">
                                             <span>{{ $loop->iteration }} </span>
                                         </td>
                                         <td class="datatable-cell text-center">
                                             <span>{{ $mastercrut->title }} </span>
                                         </td>
                                         <td class="datatable-cell text-center">
                                             <span>
                                                 {{ $mastercrut->user->name }}
                                                 {{ $mastercrut->user->family }}
                                              </span>
                                         </td>
                                         <td class="datatable-cell text-center">
                                            <span>
                                                {{__('arr.'.$mastercrut->status)}}
                                            </span>
                                        </td>

                                         <td class="datatable-cell text-center">
                                             <span>
                                                @if ($mastercrut->last_edit_student())
                                                {{$mastercrut->last_edit_student()}}
                                                @endif
                                             </span>
                                         </td>


                                         <td class="datatable-cell text-center">
                                             <span>{{
                                                 Morilog\Jalali\Jalalian::forge($mastercrut->created_at)->format('Y-m-d')
                                                 }}
                                             </span>
                                         </td>
                                         {{-- <td class="datatable-cell text-center">
                                             <a class="btn btn-outline-primary"
                                                 href="{{ route('survey.show', $mastercrut->id) }}">مشاهده</a>
                                         </td> --}}
                                     </tr>
                                     @endforeach



                                 </tbody>
                             </table>
                             {{ $my_curt_alls->appends(Request::all())->links('sections.pagination') }}

                         </div>
                         <!--end: جدول داده ها-->
                                <!--end: جدول داده ها-->
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->

{{-- my_plan_wait --}}
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_plan_wait') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <div class="card-body pt-3 pb-0">
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
                                                    {{ __('sentences.title') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.student') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.status') }}
                                                </span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.last_change_student_date') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.created_at') }}

                                                </span>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body" style="">
                                        @foreach ($my_plan_waits=$group->plans()->whereType('primary')->whereSide('0')->paginate(10, ['*'], 'my_plan_wait') as $masterplan)

                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center">
                                                <span>{{ $loop->iteration }} </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ $masterplan->title }} </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>
                                                    {{ $masterplan->user->name }}
                                                    {{ $masterplan->user->family }}
                                                 </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ __('sentences.'.$masterplan->status)   }}
                                                </span>
                                            </td>

                                            <td class="datatable-cell text-center">
                                                <span>
                                                    <span>
                                                        @if ($masterplan->last_edit_student())
                                                        {{$masterplan->last_edit_student()}}
                                                        @endif
                                                    </span>

                                                </span>
                                            </td>


                                            <td class="datatable-cell text-center">
                                                <span>{{
                                                    Morilog\Jalali\Jalalian::forge($masterplan->created_at)->format('Y-m-d')
                                                    }}
                                                </span>
                                            </td>
                                            {{-- <td class="datatable-cell text-center">
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('survey.show', $mastercrut->id) }}">مشاهده</a>
                                            </td> --}}
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $my_plan_waits->appends(Request::all())->links('sections.pagination') }}

                            </div>
                            <!--end: جدول داده ها-->
                        </div>


                        {{-- my_plan_all --}}
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_plan_all') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <div class="card-body pt-3 pb-0">
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
                                                    {{ __('sentences.title') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.student') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.status') }}
                                                </span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.last_change_student_date') }}

                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>
                                                    {{ __('sentences.created_at') }}

                                                </span>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body" style="">
                                        @foreach ($my_plan_alls=$group->plans()->whereType('primary')->paginate(10, ['*'], 'my_plan_all') as $masterplan)

                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center">
                                                <span>{{ $loop->iteration }} </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ $masterplan->title }} </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>
                                                    {{ $masterplan->user->name }}
                                                    {{ $masterplan->user->family }}
                                                 </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ __('sentences.'.$masterplan->status)   }}
                                                </span>
                                            </td>

                                            <td class="datatable-cell text-center">
                                                <span>
                                                    <span>
                                                        @if ($masterplan->last_edit_student())
                                                        {{$masterplan->last_edit_student()}}
                                                        @endif
                                                    </span>

                                                </span>
                                            </td>


                                            <td class="datatable-cell text-center">
                                                <span>{{
                                                    Morilog\Jalali\Jalalian::forge($masterplan->created_at)->format('Y-m-d')
                                                    }}
                                                </span>
                                            </td>
                                            {{-- <td class="datatable-cell text-center">
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('survey.show', $mastercrut->id) }}">مشاهده</a>
                                            </td> --}}
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $my_plan_alls->appends(Request::all())->links('sections.pagination') }}

                            </div>
                            <!--end: جدول داده ها-->
                        </div>


                        {{-- my_subject_wait --}}

                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_subject_wait') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <div class="card-body pt-3 pb-0">
                                <!--begin: جدول داده ها-->
                                <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                id="kt_datatable" style="">
                                <!--begin: جدول داده ها-->
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
                                        @foreach (

                                        $my_subject_waits=$group->subjects()->whereStatus(null)->latest()->paginate(10, ['*'], 'my_subject_wait')
                                        as $subject)
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
                                {{ $my_subject_waits->appends(Request::all())->links('sections.pagination') }}
                              </div>
                            <!--end: جدول داده ها-->
                        </div>




                        {{-- my_subject_wait --}}

                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_subject_all') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <div class="card-body pt-3 pb-0">
                                <!--begin: جدول داده ها-->
                                <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                id="kt_datatable" style="">
                                <!--begin: جدول داده ها-->
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
                                        @foreach (

                                        $my_subject_alls= $group->subjects()->latest()->paginate(10, ['*'], 'my_subject_all')
                                        as $subject)
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
                                {{ $my_subject_alls->appends(Request::all())->links('sections.pagination') }}
                              </div>
                            <!--end: جدول داده ها-->
                        </div>




                    </div>
                    <!--end::پیشرفت Table Widget 2-->
                        <!--end::ویزارد-->
            <div class="row mt-2">
                <div class="col-lg-12">
                   <div class="card card-custom  card-stretch gutter-b">
                       <!--begin::Header-->
                       <div class="card-header h-auto border-0">
                           <div class="card-title py-5">
                               <h3 class="card-label">
                                   <span class="d-block text-dark font-weight-bolder">   {{__('sentences.chart_all')}}</span>

                               </h3>
                           </div>

                       </div>
                       <!--end::Header-->

                       <!--begin::Body-->
                       <div class="card-body">
                           {{-- <div id="amamr1" data-amar="{{json_encode([$curts->count(),$plans->count(),$subjects->count()])}}" ></div> --}}
                           <div id="amamr1" data-amar="{{json_encode([
                               $my_curt_waits->total(),
                               $my_curt_alls->total(),
                               $my_plan_waits->total(),
                               $my_plan_alls->total(),
                               $my_subject_waits->total(),
                               $my_subject_alls->total(),
                               ])}}"
                                data-title="
                                    {{json_encode([
                                        __('sentences.my_curt_wait'),
                                    __('sentences.my_curt_all'),
                                    __('sentences.my_plan_wait'),
                                    __('sentences.my_plan_all'),
                                    __('sentences.my_subject_wait'),
                                    __('sentences.my_subject_all')])
                                     }}
                                    "

                                ></div>
                       </div>
                       <!--end::Body-->
                   </div>
                </div>
                   <!--end::نمودار Widget 4-->
               </div>
                </div>

                @else
                <div class="col-xxl-12 order-2 order-xxl-1">
                    <!--begin::پیشرفت Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.select_group_show') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-0">
                            <form action="{{route('admin.group.mission')}}" method="get">
                                @csrf
                                @method('get')
                                <div class="row">
                                    <div class="col-xl-6">
                                            <!--begin::ورودی-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>       {{__('sentences.select_group')}}    </label>
                                                <select name="group_id" id="ostad" class="form-control  ">
                                                    <option value="">           {{__('sentences.select_one')}} </option>
                                                    @foreach (App\Models\Group::all() as $group
                                                    )
                                                    <option {{old('group_id')==$group->id?'selected':''}} value="{{$group->id}}">
                                                        {{__('sentences.group')}}
                                                        {{$group->name}}
                                                      (
                                                        {{__('sentences.manager')}}:
                                                          {{$group->admin()->name}}
                                                          {{$group->admin()->family}}
                                                      )
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::ورودی-->
                                        </div>
                                        <div class="col-xl-6">
                                        </div>
                                </div>
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    {{--  <div>
                                        <button type="button"
                                            class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                            data-wizard-type="action-prev">
                                            تایید
                                        </button>
                                    </div>  --}}
                                    <div>
                                        <input type="submit" value="     {{__('sentences.save')}}   "
                                            class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                            {{-- <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4" href="{{route('agent.index')}}">   {{__('sentences.back')}}</a> --}}

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif




            </div>
            <!--end::ویزارد-->

        </div>
        <!--end::ویزارد-->

    </div>
</div>

@endsection
