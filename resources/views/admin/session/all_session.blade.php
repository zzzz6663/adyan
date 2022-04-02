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



                        <div class="tab-pane" id="sessions" role="tabpanel">
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

                                                    {{ __('sentences.session_name') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>

                                                    {{ __('sentences.session_admin') }}
                                                </span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort text-center">
                                                <span>

                                                    {{ __('sentences.session_member') }}
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
                                        @foreach ($user->sessions()->latest()->get()
                                        as $usersession)
                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell text-center">
                                                <span>{{ $loop->iteration }} </span>
                                            </td>
                                            <td class="datatable-cell text-center">
                                                <span>{{ $usersession->name }} </span>
                                            </td>
                                            <td class="datatable-cell text-center"><span>
                                                    @if ($usersession->user_id)
                                                    {{ $usersession->user->name }}
                                                    {{ $usersession->user->family }}
                                                    @endif

                                                </span></td>
                                            <td class="datatable-cell text-center"><span>
                                                    @foreach ($usersession->users as $users)
                                                    {{ $users->name }}
                                                    {{ $users->family }}
                                                    -
                                                    @endforeach

                                                </span></td>
                                            <td class="datatable-cell text-center">
                                                <span>{{
                                                    Morilog\Jalali\Jalalian::forge($usersession->created_at)->format('Y-m-d')
                                                    }}
                                                </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('admin.session.result', $usersession->id) }}">مشاهده</a>
                                            </td>

                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>


                            </div>
                            <!--end: جدول داده ها-->
                        </div>



                    </div>



 
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
