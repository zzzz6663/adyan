@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">


                <div class="row">
                    <div class="col-lg-12 order-1 order-xxl-2">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">
                                    {{ __('sentences.notes') }}


                                </h3>

                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <ul>
                                    <li>
                                        {{ __('sentences.note6') }}
                                    </li>
                                    <li>  {{ __('sentences.note7') }} </li>
                                    <li>  {{ __('sentences.note8') }}  </li>
                                    <li>   {{ __('sentences.note9') }} </li>
                                    <li>   {{ __('sentences.note10') }} </li>
                                </ul>



                            </div>
                            <!--end::Body-->

                            <div class="card-body">


                                     <!--begin: جدول داده ها-->
                                     <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                     id="kt_datatable" style="">
                                     <h1> {{ __('sentences.session_subjects') }}</h1>
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
                                                         {{ __('sentences.subject_admin') }}
                                                     </span>
                                                 </th>

                                                 <th class="datatable-cell datatable-cell-sort text-center">
                                                     <span>
                                                         {{ __('sentences.info') }}
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
                                                     <td class="datatable-cell text-center"><span>{{ $subject->title }} </span>
                                                     </td>
                                                     <td class="datatable-cell text-center"><span>
                                                             @if ($subject->admin_id)
                                                                 {{ $subject->admin->name }}
                                                                 {{ $subject->admin->family }}
                                                             @endif

                                                         </span></td>


                                                     <td class="datatable-cell text-center">
                                                         <span>
                                                             {{ $subject->info }}
                                                         </span>
                                                     </td>
                                                     <td class="datatable-cell text-center">
                                                         <span>
                                                             {{ implode(', ', $subject->tags()->pluck('tag')->toArray()) }}
                                                         </span>
                                                     </td>

                                                     <td class="datatable-cell text-center">

                                                        <form action="{{route('student.select.curt')}}" method="post">
                                                            @csrf
                                                            @method('post')
                                                            <input type="text" name="subject" hidden value="{{$subject->id}}">
                                                            <input type="submit" class="btn btn-success" value="{{ __('sentences.select') }} ">
                                                        </form>


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
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
