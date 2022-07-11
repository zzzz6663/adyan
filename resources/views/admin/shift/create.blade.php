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
                    <div class="card-body p-0">
                        <!--begin::ویزارد-->
                        <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first"
                            data-wizard-clickable="false">

                            @include('sections.error')


                            <form class="form" action="{{ route('shift.store') }}" id="kt_form" method="post">
                                @csrf
                                @method('post')
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-7">
                                        <!--begin::ویزارد Form-->
                                        <h1>
                                            {{ __('sentences.new_shift_form') }}

                                        </h1>
                                        <br>
                                        <br>
                                        <!--begin::ویزارد گام 1-->
                                        <div class="row">
                                            @if ($user->curt() && $user->curt()->master_id)
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    {{-- <label>     {{__('sentences.change_master')}}  </label> --}}
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-rounded">
                                                            <input type="checkbox" name="change_master">
                                                            <span></span>
                                                            {{ __('sentences.change_master') }}
                                                        </label>

                                                    </div>
                                                    {{-- <span class="form-text text-muted">می توانید توضیحات در اینجا بنویسید</span> --}}
                                                </div>
                                            </div>
                                            @endif
                                            @if ($user->curt() && $user->curt()->group_id)
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    {{-- <label>     {{__('sentences.change_group')}}  </label> --}}
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-rounded">
                                                            <input type="checkbox" name="change_group">
                                                            <span></span>
                                                            {{ __('sentences.change_group') }}
                                                        </label>

                                                    </div>
                                                    {{-- <span class="form-text text-muted">می توانید توضیحات در اینجا بنویسید</span> --}}
                                                </div>
                                            </div>
                                            @endif
                                            @if ($user->curt() )
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    {{-- <label>     {{__('sentences.change_title')}}  </label> --}}
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-rounded">
                                                            <input type="checkbox" name="change_title">
                                                            <span></span>
                                                            {{ __('sentences.change_title') }}
                                                        </label>

                                                    </div>
                                                    {{-- <span class="form-text text-muted">می توانید توضیحات در اینجا بنویسید</span> --}}
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    {{-- <label>     {{__('sentences.change_guid')}}  </label> --}}
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-rounded">
                                                            <input type="checkbox" name="change_guid">
                                                            <span></span>
                                                            {{ __('sentences.change_guid') }}
                                                        </label>

                                                    </div>
                                                    {{-- <span class="form-text text-muted">می توانید توضیحات در اینجا بنویسید</span> --}}
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="form-news fv-plugins-icon-container">
                                                    <label>
                                                        {{ __('sentences.request_title') }}

                                                    </label>
                                                    <textarea name="request" class="form-control  " id="" cols="30" rows="10">{{ old('request') }}</textarea>


                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-news fv-plugins-icon-container">
                                                    <ul>

                                                        <li> {{ __('sentences.note20') }} </li>
                                                        <li> {{ __('sentences.note21') }} </li>
                                                        <li> {{ __('sentences.note22') }} </li>
                                                    </ul>
                                                </div>
                                            </div>








                                        </div>


                                        <!--begin::ویزارد اقدامات-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            {{-- <div>
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">
                                                تایید
                                            </button>
                                        </div> --}}
                                            <div>
                                                <input type="submit" value=" {{ __('sentences.save') }}   "
                                                    class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                <a class="btn btn-danger font-weight-bold text-uppercase px-9 py-4"
                                                    href="{{ route('user.note') }}"> {{ __('sentences.back') }}</a>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::ویزارد اقدامات-->
                            </form>


                            <!--end::ویزارد Form-->
                        </div>



                    </div>
                    <!--end::ویزارد Body-->
                </div>


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
                        <form action="{{ route('agent.masters') }}" method="get">
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
                                                {{ __('sentences.request_type') }}
                                            </span>
                                        </th>

                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.confirm_master') }}
                                            </span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort text-center">
                                            <span>
                                                {{ __('sentences.confirm_expert') }}
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
                                    @foreach ($shifts=$user->shifts as $shift)
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
                                                    @switch($shift->confirm_master)
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
                                                </span>
                                            </td>
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


                        </div>
                        <!--end: جدول داده ها-->
                    </div>
                </div>
                <!--end::Card-->
                <!--end::ویزارد-->
            </div>
            <!--end::ویزارد-->
        </div>
    </div>
@endsection
