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
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.select_curt') }}  </span>
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
                                     @foreach ($group->curts()->whereType('primary')->get() as $mastercrut)
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
                                                 @if ($last_curt=$mastercrut->user->curts()->latest()->first())

                                                 {{Morilog\Jalali\Jalalian::forge($last_curt->created_at)->format('Y-m-d')}}
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


                         </div>
                         <!--end: جدول داده ها-->
                                <!--end: جدول داده ها-->
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->


                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark"> {{ __('sentences.my_plan') }}  </span>
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
                                        @foreach ($group->plans()->whereType('primary')->get() as $masterplan)
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
                                                <span>
                                                    @if ($last_plan=$masterplan->user->plans()->latest()->first())

                                                    {{Morilog\Jalali\Jalalian::forge($last_plan->created_at)->format('Y-m-d')}}
                                                @endif

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


                            </div>
                            <!--end: جدول داده ها-->
                        </div>
                    </div>
                    <!--end::پیشرفت Table Widget 2-->
                </div>
                <div class="col-xxl-12 order-2 order-xxl-1 mt-2">
                    <div class="col-lg-6">
                       <div class="card card-custom  card-stretch gutter-b">
                           <!--begin::Header-->
                           <div class="card-header h-auto border-0">
                               <div class="card-title py-5">
                                   <h3 class="card-label">
                                       <span class="d-block text-dark font-weight-bolder">   {{__('sentences.pending_log')}}</span>

                                   </h3>
                               </div>

                           </div>
                           <!--end::Header-->

                           <!--begin::Body-->
                           <div class="card-body">
                               <div id="amamr2" data-amar="{{json_encode([$curts->count(),$plans->count(),$subjects->count()])}}" ></div>
                           </div>
                           <!--end::Body-->
                       </div>
                    </div>
                       <!--end::نمودار Widget 4-->
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
