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
                            {{ __('sentences.users_table') }}
                             <span class="text-muted pt-2 font-size-sm d-block">
                                {{ __('sentences.users_list') }}
                            </span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        {{--  <!--begin::دراپ دان-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/desgin/PenAndRuller.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                fill="#000000" opacity="0.3"></path>
                                            <path
                                                d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> خروجی گرفتن
                            </button>

                            <!--begin::دراپ دان Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li
                                        class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                        گزینه ای را انتخاب کنید:
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="la la-print"></i></span>
                                            <span class="navi-text">چاپ</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="la la-copy"></i></span>
                                            <span class="navi-text">کپی</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                            <span class="navi-text">اکسل</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::دراپ دان Menu-->
                        </div>
                        <!--end::دراپ دان-->  --}}

                        <!--begin::دکمه-->
                        <a href="{{route('agent.create')}}" class="btn btn-primary font-weight-bolder">
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
                            {{ __('sentences.new_user') }}
                        </a>
                        <!--end::دکمه-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: جستجو Form-->
                    <!--begin::جستجو Form-->
                    <form action="{{route('agent.index')}}" method="get">
                        @csrf
                        @method('get')
                    <div class="mb-12">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-xl-12">
                                <div class="row align-items-center">
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" name="search" class="form-control" value="{{request('search')}}" placeholder="جستجو..."
                                                id="kt_datatable_search_query">
                                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-4 d-none d-md-block">{{__('sentences.status')}}:</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="">    {{__('sentences.all')}}  </option>
                                                <option {{request('status')=='register'?'selected':''}} value="register">     {{__('sentences.register')}}        </option>
                                                <option {{request('status')=='quiz'?'selected':''}} value="quiz">    {{__('sentences.quiz')}}            </option>
                                                <option {{request('status')=='curt'?'selected':''}} value="curt">    {{__('sentences.curt')}}            </option>
                                                <option {{request('status')=='plan'?'selected':''}} value="plan">    {{__('sentences.plan')}}            </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-4 d-none d-md-block">{{__('sentences.active')}}:</label>
                                            <select name="active" id="" class="form-control">
                                                <option value="">    {{__('sentences.all')}}  </option>
                                                <option {{request('active')=='1'?'selected':''}} value="1">    {{__('sentences.active')}}            </option>
                                                <option {{request('active')=='0'?'selected':''}} value="0">    {{__('sentences.deactive')}}            </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-4 d-none d-md-block">{{__('sentences.level')}}:</label>
                                            <select name="level" id="" class="form-control">
                                                <option value="">    {{__('sentences.all')}}  </option>
                                                <option {{request('level')=='student'?'selected':''}} value="student"> {{__('sentences.student')}}  </option>
                                                <option {{request('level')=='master'?'selected':''}} value="master"> {{__('sentences.master')}}  </option>
                                                <option {{request('level')=='expert'?'selected':''}} value="expert"> {{__('sentences.expert')}}  </option>
                                                {{-- <option {{request('level')=='admin_group'?'selected':''}} value="admin_group"> {{__('sentences.admin_group')}}  </option> --}}
                                                {{-- <option {{request('level')=='guide_master'?'selected':''}} value="guide_master"> {{__('sentences.guide_master')}}  </option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-4 d-none d-md-block">{{__('sentences.from_date')}}:</label>
                                            <input type="text" name="from" value="{{request('from')}}" class="form-control persian2" placeholder=" {{__('sentences.from_date')}} " >
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-4 d-none d-md-block">{{__('sentences.to_date')}}:</label>
                                            <input type="text" name="to"  value="{{request('to')}}"  class="form-control persian2" placeholder=" {{__('sentences.to_date')}} " >
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <input type="submit" value="{{__('sentences.search')}}" class="btn btn-light btn btn-light-primary px-6 font-weight-bold">
                                                            </div>
                        </div>
                    </div>

                </form>
                    <!--end::جستجو Form-->
                    <!--end: جستجو Form-->

                    <!--begin: جدول داده ها-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                        id="kt_datatable" style="">
                        <table class="datatable-table" >
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{__('sentences.id')}}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.name') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.family') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.mobile') }}
                                        </span>
                                    </th>
                                    @if (request('status') =='curt' || request('status') =='plan' )
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.title') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.guid_master') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.last_change_student_date') }}
                                        </span>
                                    </th>
                                    @elseif (request('status') =='quiz')
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.status') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.quiz_date') }}
                                        </span>
                                    </th>
                                    @else
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.level') }}
                                        </span>
                                    </th>
                                    @endif

                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.code') }}
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
                                @foreach ($users as $user)
                                <tr class="datatable-row" style="left: 0px;">
                                    <td class="datatable-cell text-center">
                                      <span>{{ $loop->iteration + (($users->currentPage()-1) *($users->perPage())) }} </span>
                                    </td>
                                    <td class="datatable-cell text-center"><span>
                                        {{$user->name}}


                                    </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->family}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->mobile}} </span></td>





                                    @switch(request('status'))



                                    @case('curt')

                                    <td class="datatable-cell text-center">
                                        <span>
                                            {{$user->curt()?$user->curt()->title:''}}

                                    </span>
                                    </td>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            @if ($user->curt() && $user->curt()->master_id)
                                            {{$user->curt()?$user->curt()->master->name.' '.$user->curt()->master->family:''}}
                                            @endif

                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            @if ($last_curt=$user->curts()->latest()->first())

                                                {{Morilog\Jalali\Jalalian::forge($last_curt->created_at)->format('Y-m-d')}}
                                            @endif

                                        </span>
                                    </th>
                                    @break

                                    @case('plan')
                                    <td class="datatable-cell text-center">
                                        <span>
                                            {{$user->primary_plan()?$user->primary_plan()->title:''}}

                                    </span>
                                    </td>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            @if ($user->primary_plan() && $user->primary_plan()->master_id)
                                            {{$user->primary_plan()?$user->primary_plan()->master->name.' '.$user->primary_plan()->master->family:''}}
                                            @endif
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            @if ($last_plan=$user->plans()->latest()->first())

                                                {{Morilog\Jalali\Jalalian::forge($last_plan->created_at)->format('Y-m-d')}}
                                            @endif
                                        </span>
                                    </th>
                                    @break
                                    @case('quiz')
                                    <td class="datatable-cell text-center">
                                        <span>
                                            <?php
                                                $last_quiz=$user->quizzes()->latest()->first();

                                                 ?>

                                            @if ($last_quiz)

                                                {{$last_quiz->pivot->status=='1'?__('sentences.passed'):__('sentences.faild')}}
                                            @endif
                                    </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        <span>
                                            <?php
                                            $last_quiz=$user->quizzes()->latest()->first();
                                                 ?>

                                         @if ($last_quiz)
                                         {{Morilog\Jalali\Jalalian::forge($last_quiz->pivot->time)->format('Y-m-d')}}
                                         @endif

                                            </span>
                                    </td>
                                    @break
                                    @default
                                    <td class="datatable-cell text-center"><span>{{__('arr.'.$user->level)}} </span>
                                    </td>




                                    @endswitch












                                    <td class="datatable-cell text-center"><span>{{$user->code}} </span></td>
                                    <td class="datatable-cell text-center">
                                        <span>{{Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y-m-d')}}
                                        </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        <a class="btn btn-outline-primary"
                                            href="{{route('agent.edit',$user->id)}}">{{__('sentences.edit')}} </a>
                                        @if ($user->level=='student' &&$user->verify==0)
                                        {{-- <a class="btn btn-outline-success" href="{{route('admin.verify.student',$user->id)}}">اکتیو</a> --}}
                                        @endif
                                        <a class="btn btn-success"
                                        href="{{route('agent.show',$user->id)}}">{{__('sentences.more')}} </a>
                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                        </table>

                            {{ $users->appends(Request::all())->links('sections.pagination') }}

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
