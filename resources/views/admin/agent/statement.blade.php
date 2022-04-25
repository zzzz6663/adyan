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
                                {{ __('sentences.statement_list') }}
                            </span>
                        </h3>
                    </div>

                </div>
                <div class="card-body">
                    <!--begin: جستجو Form-->
                    <!--begin::جستجو Form-->
                    <form action="{{route('agent.masters')}}" method="get">
                        @csrf
                        @method('get')
                    {{-- <div class="mb-12">
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
                                    @role('admin')
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
                                    @endrole
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <input type="submit" value="{{__('sentences.search')}}" class="btn btn-light btn btn-light-primary px-6 font-weight-bold">
                                                            </div>
                        </div>
                    </div> --}}

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
                                            {{ __('sentences.student') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.title') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.master_guid') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.guid') }}
                                        </span>
                                    </th>



                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.group') }}
                                        </span>
                                    </th>
                                    <th class="datatable-cell datatable-cell-sort text-center">
                                        <span>
                                            {{ __('sentences.down_date') }}
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
                                @foreach ($curts as $curt)
                                <tr class="datatable-row" style="left: 0px;">
                                    <td class="datatable-cell text-center"><span>{{$loop->iteration}} </span></td>
                                    <td class="datatable-cell text-center"><span>

                                        <a href="{{route('agent.profile',$curt->user->id)}}">
                                            <span>
                                                {{$curt->user->name}}
                                                {{$curt->user->family}}
                                            </span>
                                           </a>

                                    </span></td>

                                    <td class="datatable-cell text-center"><span>{{$curt->title}} </span></td>
                                    <td class="datatable-cell text-center"><span>

                                    @if ($curt->master_id)
                                    {{$curt->master()->name}}
                                    {{$curt->master()->family}}
                                    @endif
                                    </span></td>
                                    <td class="datatable-cell text-center"><span>

                                    @if ($curt->guid_id)
                                    {{$curt->guid->name}}
                                    {{$curt->guid->family}}
                                    @endif
                                    </span></td>
                                    <td class="datatable-cell text-center"><span>

                                    @if ($curt->group_id)
                                    {{$curt->group->name}}
                                  (  {{$curt->group->admin()->name}}
                                  {{$curt->group->admin()->family}})
                                    @endif
                                    </span></td>





                                    <td class="datatable-cell text-center">
                                        <span>
                                            @if ($curt->down)
                                            {{
                                                Morilog\Jalali\Jalalian::forge($curt->down)->format('Y-m-d')
                                                }}
                                            @endif
                                        </span>
                                    </td>
                                    <td class="datatable-cell text-center">

                                        <a class="btn btn-success"
                                        href="{{route('agent.statement.pdf',$curt->id)}}">{{__('sentences.more')}} </a>
                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                        </table>

                            {{ $curts->appends(Request::all())->links('sections.pagination') }}

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
