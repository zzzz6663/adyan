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
                                        <span>{{ Morilog\Jalali\Jalalian::forge($subject->created_at)->format('Y-m-d')
                                            }}
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
                @if (!isset($show_chart))
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::لیست Widget 11-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title font-weight-bolder text-dark">{{__('sentences.log')}}</h3>

                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-0">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-warning mr-5">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/home/کتابخانه.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                            fill="#000000"></path>
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                            x="16.3255682" y="2.94551858" width="3" height="18" rx="1">
                                                        </rect>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                        <!--end::Icon-->

                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 mr-2">
                                            <a href="#"
                                                class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                                {{__('sentences.subject_student')}}
                                            </a>
                                            {{-- <span class="text-muted font-weight-bold">موعد 2 روز</span> --}}
                                        </div>
                                        <!--end::Title-->

                                        <!--begin::Lable-->
                                        <span class="font-weight-bolder text-warning py-1 font-size-lg">{{ App\Models\Subject::where('user_id','!=',null)->whereStatus('1')->count()}}</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-success mr-5">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/Write.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                        </path>
                                                        <path
                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                        <!--end::Icon-->

                                        <!--begin::Title-->
                                         <div class="d-flex flex-column flex-grow-1 mr-2">
                                            <a href="#"
                                                class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                                {{__('sentences.subject_confirm')}}
                                            </a>
                                            {{-- <span class="text-muted font-weight-bold">موعد 2 روز</span> --}}
                                        </div>
                                        <!--end::Title-->

                                        <!--begin::Lable-->
                                        <span class="font-weight-bolder text-warning py-1 font-size-lg">{{ App\Models\Subject::whereStatus('1')->count()}}</span>
                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-9">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-danger mr-5">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/group-chat.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                            fill="#000000"></path>
                                                        <path
                                                            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span> </span>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 mr-2">
                                            <a href="#"
                                                class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                                {{__('sentences.subject_confirm_remain')}}
                                            </a>
                                            {{-- <span class="text-muted font-weight-bold">موعد 2 روز</span> --}}
                                        </div>
                                        <!--end::Title-->

                                        <!--begin::Lable-->
                                        <span class="font-weight-bolder text-warning py-1 font-size-lg">{{ App\Models\Subject::where('user_id',null)->whereStatus('1')->count()}}</span>

                                        <!--end::Lable-->
                                    </div>
                                    <!--end::Item-->


                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::لیست Widget 11-->
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>
@endsection
