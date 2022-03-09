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



                <div class="col-xxl-12 order-2 order-xxl-1">
                    <!--begin::پیشرفت Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_group') }}  </span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
                            </h3>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
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
                                                <th class="datatable-cell datatable-cell-sort text-center">
                                                    <span>
                                                        {{ __('sentences.name') }}
                                                    </span>
                                                </th>
                                                <th class="datatable-cell datatable-cell-sort text-center">
                                                    <span>
                                                        {{ __('sentences.members') }}
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
                                            @foreach ($groups as $group)
                                            <tr class="datatable-row" style="left: 0px;">
                                                <td class="datatable-cell text-center"><span>{{$loop->iteration}}
                                                    </span></td>
                                                <td class="datatable-cell text-center"><span>{{$group->name}} </span>
                                                </td>
                                                <td class="datatable-cell text-center">
                                                    <span>
                                                 @foreach ($group->users as $user )
                                                        <span>(
                                                            {{$user->name}}
                                                            {{$user->family}}

                                                            )</span>
                                                 @endforeach
                                                    </span>
                                                </td>

                                                <td class="datatable-cell text-center">
                                                    <span>{{Morilog\Jalali\Jalalian::forge($group->created_at)->format('Y-m-d')}}
                                                    </span>
                                                </td>

                                            </tr>

                                            @endforeach



                                        </tbody>
                                    </table>

                                    {{-- {{ $users->appends(Request::all())->links('sections.pagination') }} --}}

                                </div>
                                <!--end: جدول داده ها-->
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::پیشرفت Table Widget 2-->
                </div>

            </div>
            <!--end::ویزارد-->
        </div>
        <!--end::ویزارد-->

    </div>
</div>

@endsection
