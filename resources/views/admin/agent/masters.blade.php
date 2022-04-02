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
                    <form action="{{route('agent.masters')}}" method="get">
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


                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.email') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.curt_master_count') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.curt_master_count') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.curt_guid_count') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.curt_guid_count') }}
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
                                    <td class="datatable-cell text-center"><span>{{$loop->iteration}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->name}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->family}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->mobile}} </span></td>

                                    <td class="datatable-cell text-center"><span>{{$user->email}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->curt_master_count()}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->plan_master_count()}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->curt_guid_count()}} </span></td>
                                    <td class="datatable-cell text-center"><span>{{$user->plan_guid_count()}} </span></td>




 


                                    <td class="datatable-cell text-center">
                                        <span>{{Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y-m-d')}}
                                        </span>
                                    </td>
                                    <td class="datatable-cell text-center">
                                        @if ($user->level !='student')
                                        <a class="btn btn-outline-primary"
                                            href="{{route('agent.edit',$user->id)}}">{{__('sentences.edit')}} </a>
                                        @endif
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
