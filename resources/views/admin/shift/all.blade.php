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
                            {{__('sentences.shift_table')}}
                             <span class="text-muted pt-2 font-size-sm d-block">
                                {{__('sentences.shift_list')}}

                            </span>
                        </h3>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('shift.index')}}" method="get">
                        @csrf
                        @method('get')
                        <div class="mb-12">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" name="search" class="form-control"
                                                    value="{{request('search')}}" placeholder="جستجو..."
                                                    id="kt_datatable_search_query">
                                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-3 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label
                                                    class="mr-3 mb-4 d-none d-md-block">{{__('sentences.from_date')}}:</label>
                                                <input type="text" name="from" value="{{request('from')}}"
                                                    class="form-control persian2"
                                                    placeholder=" {{__('sentences.from_date')}} ">
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label
                                                    class="mr-3 mb-4 d-none d-md-block">{{__('sentences.to_date')}}:</label>
                                                <input type="text" name="to" value="{{request('to')}}"
                                                    class="form-control persian2"
                                                    placeholder=" {{__('sentences.to_date')}} ">
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                    <input type="submit" value="{{__('sentences.search')}}"
                                        class="btn btn-light btn btn-light-primary px-6 font-weight-bold">
                                </div>
                            </div>
                        </div>

                    </form>

                 <!--begin: جدول داده ها-->
                 <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                 id="kt_datatable" style="">
                 <table class="datatable-table">
                     <thead class="datatable-head">
                         <tr class="datatable-row" style="left: 0px;">

                             <th class="datatable-cell datatable-cell-sort text-center">
                                 <span>
                                     {{ __('sentences.id') }}
                                 </span>
                             </th>
                             {{-- <th class="datatable-cell datatable-cell-sort text-center">
                                 <span>
                                     {{ __('sentences.student') }}
                                 </span>
                             </th> --}}
                             <th class="datatable-cell datatable-cell-sort text-center">
                                 <span>
                                     {{ __('sentences.student') }}
                                 </span>
                             </th>
                             <th class="datatable-cell datatable-cell-sort text-center">
                                 <span>
                                     {{ __('sentences.request_type') }}
                                 </span>
                             </th>
                             <th class="datatable-cell datatable-cell-sort text-center">
                                <span>
                                    {{ __('sentences.confirm_expert') }}
                                </span>
                            </th>

                             <th class="datatable-cell datatable-cell-sort text-center">
                                 <span>
                                     {{ __('sentences.confirm_master') }}
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
                         @foreach ($shifts as $shift)
                             <tr class="datatable-row" style="left: 0px;">
                                 <td class="datatable-cell text-center"><span>
                                         {{ $loop->iteration  }}

                                     </span></td>
                                 {{-- <td class="datatable-cell text-center"><span>

                                 <a href="{{route('agent.profile',$curt->user->id)}}">
                                     <span>
                                         {{$shift->user->name}}
                                         {{$shift->user->family}}
                                     </span>
                                    </a>

                             </span></td> --}}

                             <td class="datatable-cell text-center">

                                    <a href="{{route('agent.profile',$shift->user->id)}}">
                                        <span>
                                            {{$shift->user->name}}
                                            {{$shift->user->family}}
                                               </span>
                                       </a>
                                </td>
                             <td class="datatable-cell text-center"><span>


                             @if ($shift->change_master)
                                 {{__('sentences.change_master')}}  -
                             @endif
                             @if ($shift->change_title)
                             {{__('sentences.change_title')}} -
                             @endif
                             @if ($shift->change_guid)
                             {{__('sentences.change_guid')}}-
                             @endif
                             @if ($shift->change_group)
                             {{__('sentences.change_group')}}-
                             @endif




                             </span></td>
                             <td class="datatable-cell text-center">
                                <span>
                                    @switch($shift->confirm_expert)
                                    @case(null)
                                    {{ __('sentences.in_progress')}}
                                        @break
                                    @case(0)
                                    {{ __('sentences.failed')}}
                                        @break
                                    @case(1)
                                    {{ __('sentences.confirmed')}}
                                        @break

                                    @default
                                @endswitch
                                @if ($shift->expert)
                                ---
                                استاد
                                {{$shift->expert->name}}
                                {{$shift->expert->family}}
                                @endif
                                </span>
                            </td>

                                 <td class="datatable-cell text-center">
                                     <span>
                                         @switch($shift->confirm_master)
                                             @case(null)
                                                 @break
                                             @case(0)
                                             {{ __('sentences.failed')}}
                                                 @break
                                             @case(1)
                                             {{ __('sentences.confirmed')}}
                                                 @break

                                             @default
                                         @endswitch
                                         @if ($shift->master)
                                         ---
                                         استاد
                                         {{$shift->master->name}}
                                         {{$shift->master->family}}
                                         @endif

                                     </span>
                                 </td>


                                 <td class="datatable-cell text-center">
                                     <span>
                                             {{ Morilog\Jalali\Jalalian::forge($shift->created_at)->format('Y-m-d') }}
                                     </span>
                                 </td>

                             </tr>
                         @endforeach



                     </tbody>
                 </table>
                 <div class="pagi">
                    {{ $shifts->appends(Request::all())->links('sections.pagination') }}
                </div>

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
