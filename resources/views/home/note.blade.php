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
                <div class="row">
                    <div class="col-xl-6">
                        <!--begin::Card-->


                        <div class="card card-custom card-stretch" id="kt_todo_list">

                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{__('sentences.last_duty')}}

                                         </h3>
                                </div>
                            </div>
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <!--begin::Responsive container-->
                                <div class="table-responsive">
                                    @foreach ($duties as $duty)
                                    <div class="list list-hover min-w-500px" data-inbox="list">
                                        <div class="d-flex align-items-start list-item card-spacer-x py-4"
                                            data-inbox="message">

                                            <!--begin::Info-->
                                            <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                                                <!--begin::Title-->
                                                <div class="font-weight-bolder mr-2">
                                                    @switch( $duty->type)

                                                    @case('register')
                                                    @role('expert')

                                                    {{__('sentences.confirm_student_confirm')}}
                                                    {{$duty->student()->name}}
                                                    {{$duty->student()->family}}
                                                    @endrole
                                                    @break

                                                    @case('student_go_quiz')
                                                    @role('student')
                                                      {{__('sentences.participating_in_a_test')}}

                                                    @endrole
                                                    @break

                                                    @case('submit_curt')
                                                    @role('student')
                                                    {{__('sentences.submit_curt')}}


                                                    @endrole
                                                    @break

                                                    @case('verify_curt')
                                                    @role('expert|master')
                                                    {{__('sentences.vrify_curt')}}
                                                    {{$duty->curt->user->name}}
                                                    {{$duty->curt->user->family}}

                                                    @endrole
                                                    @break




                                                    @case('edit_curt_by_student')
                                                    @role('student')

                                                {{__('sentences.request_vrify_curt')}}
                                                {{$duty->operator()->name}}
                                                {{$duty->operator()->family}}
                                                    @endrole
                                                    @break


                                                    @case('save_curt_group_by_expert')
                                                    @role('master')
                                                    {{-- کارشناس --}}
                                                    {{__('sentences.pass_curt_to_group',['expert'=>$duty->operator()->name.' '.$duty->operator()->family,'group'=>$duty->curt->group->name])}}
                                                    {{-- {{$duty->operator()->name}}
                                                    {{$duty->operator()->family}}
                                                     طرح اجمالی را به گروه
                                                {{$duty->curt->group->name}}
                                                ارجاع داد --}}
                                                    @endrole
                                                    @break







                                                    @case('review_curt_by_master')
                                                    @role('master')

                                                  {{__('sentences.review_curt_by_master')}}
                                                  {{$duty->student()->name}}
                                                  {{$duty->student()->family}}
                                                    @endrole
                                                    @break
















                                                    @default


                                                    @endswitch


                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center justify-content-end flex-wrap"
                                                data-toggle="view">
                                                <!--begin::تاریخtime-->
                                                <div class="font-weight-bolder "
                                                    data-toggle="view">


                                                        {{$duty->type}}
                                                    @switch( $duty->type)

                                                    @case('register')
                                                    @role('expert')
                                                    {{Morilog\Jalali\Jalalian::forge($duty->created_at)->ago()}}
                                                    <a class="btn btn-primary"
                                                        href="{{route('admin.verify.student',[$duty->student()->id,$duty->id])}}">
                                                        {{__('sentences.confirm_account')}}
                                                    </a>
                                                    @endrole
                                                    @break


                                                    @case('student_go_quiz')
                                                    @role('student')

                                                    <a class="btn btn-primary" href="{{route('student.per.quiz')}}">
                                                        {{__('sentences.participating_in_a_test')}}

                                                         </a>
                                                            @if (!$user->check_quiz_pass() && $user->quizzes()->count()>0)

                                                            {{__('sentences.day_remain_to_quiz', ['time'=> $user->persian_latest_falid_quiz() ])}}
                                                            @endif
                                                    @endrole
                                                    @break

                                                    @case('submit_curt')
                                                    @role('student')
                                                    <a class="btn btn-primary" href="{{route('curt.create')}}">
                                                        {{__('sentences.create_curt')}}
                                                    </a>
                                                    @endrole
                                                    @break


                                                    @case('verify_curt')
                                                    @role('expert')
                                                    <a class="btn btn-primary" href="{{route('admin.show.curt',$duty->curt->id)}}">
                                                        {{__('sentences.verify_curt')}}
                                                        {{$duty->curt->title}}
                                                     </a>
                                                    @endrole
                                                    @break



                                                    @case('edit_curt_by_student')
                                                    @role('student')
                                                    <a class="btn btn-primary" href="{{route('curt.edit',$duty->curt->id)}}">
                                                        {{__('sentences.edit')}}
                                                    </a>
                                                    @endrole
                                                    @break



                                                    @case('save_curt_group_by_expert')
                                                    @role('master')
                                                    <a class="btn btn-primary" href="{{route('curt.edit',$duty->curt->id)}}">
                                                        {{__('sentences.edit')}}
                                                    </a>
                                                    @endrole
                                                    @break




                                                    @case('review_curt_by_master')
                                                    @role('master')
                                                    <a class="btn btn-primary" href="{{route('session.create')}}">
                                                        (    {{__('sentences.review_curt_by_master_duty')}})
                                                        {{__('sentences.create_session')}}
                                                    </a>
                                                    @endrole
                                                    @break


                                                    @case('verify_subject')
                                                    @role('master')
                                                   <a class="btn btn-primary" href="{{route('session.create',['group'=>$duty->group->id])}}">
                                                        (    {{__('sentences.verify_subject')}})
                                                        {{__('sentences.create_session')}}
                                                    </a>
                                                    @endrole
                                                    @break






                                                    @default

                                                    @endswitch

                                                </div>
                                                <!--end::تاریخtime-->

                                                <!--begin::User تصویر-->
                                                <div class="symbol symbol-light-danger symbol-30 ml-3">

                                                </div>
                                                <!--end::User تصویر-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <!--end::Responsive container-->

                                {{--
                                <!--begin::Pagination-->
                                <div class="d-flex align-items-center my-2 my-6 card-spacer-x justify-content-end">
                                    <div class="d-flex align-items-center mr-2" data-toggle="tooltip" title=""
                                        data-original-title="Records per page">
                                        <span class="text-muted font-weight-bold mr-2" data-toggle="dropdown">1 - 50 از
                                            235</span>
                                        <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-sm">
                                            <ul class="navi py-3">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">20 per page</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link active">
                                                        <span class="navi-text">50 par page</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-text">100 per page</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Pagination--> --}}
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-xl-6 pt-10 pt-xl-0">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{__('sentences.last_logs')}}
                              </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::نمونه-->
                                <div class="example example-basic">
                                    <div class="example-preview">
                                        <!--begin::تایم لاین-->
                                        <div class="timeline timeline-3">
                                            <div class="timeline-items">
                                                @foreach ($logs as $log )
                                                <div class="timeline-item">
                                                    <div class="timeline-media">
                                                        @switch($log->type)
                                                        @case('register')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break

                                                        @case('verify')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break

                                                        @case('submit_curt')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break

                                                        @case('edit_curt_by_student')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break

                                                        @case('save_curt_group_by_expert')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('review_curt_by_master')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('select_curt_master')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('accept_curt')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break

                                                        @case('pass_quiz')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break

                                                        @case('create_subject')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break

                                                        @case('subject_result')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break

                                                        @default

                                                        @endswitch


                                                    </div>
                                                    <div class="timeline-content">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-3">
                                                            <div class="mr-2">
                                                                {{$log->type}}
                                                                @switch($log->type)
                                                                @case('register')
                                                                <span class="">

                                                                    {{__('sentences.register')}}
                                                                </span>
                                                                @break

                                                                @case('verify')
                                                                <span class="">
                                                                    {{__('sentences.verify_regiter')}}

                                                                </span>
                                                                @break
                                                                @case('submit_curt')
                                                                <span class="">
                                                                    {{__('sentences.create_curt')}}
                                                                </span>
                                                                @break

                                                                @case('edit_curt_by_student')
                                                                <span class="">
                                                                    {{__('sentences.verify_curt_by_student')}}

                                                                </span>
                                                                @break

                                                                @case('save_curt_group_by_expert')
                                                                <span class="">
                                                                    {{__('sentences.save_curt_group_by_expert')}}

                                                                </span>
                                                                @break



                                                                @case('review_curt_by_master')
                                                                <span class="">

                                                                    {{__('sentences.review_curt_by_master')}}

                                                                </span>
                                                                @break

                                                                @case('select_curt_master')
                                                                <span class="">
                                                                    {{__('sentences.select_curt_master')}}

                                                                </span>
                                                                @break

                                                                @case('accept_curt')
                                                                <span class="">
                                                                    {{__('sentences.accept_curt')}}

                                                                </span>
                                                                @break


                                                                @case('pass_quiz')
                                                                <span class="">
                                                                    {{__('sentences.pass_quiz')}}
                                                                </span>
                                                                @break

                                                                @case('create_subject')
                                                                <span class="">
                                                                    {{__('sentences.create_subject')}}
                                                                </span>
                                                                @break























                                                                @default

                                                                @endswitch

                                                                <span class="text-muted ml-2">
                                                                    {{
                                                                    Morilog\Jalali\Jalalian::forge($log->created_at)->format('d-m-Y')}}
                                                                </span>
                                                                {{-- <span
                                                                    class="label label-light-success font-weight-bolder label-inline ml-2">جدید</span>
                                                                --}}

                                                            </div>

                                                        </div>
                                                        <p class="p-0" style="line-height: 2.5em">
                                                            @switch($log->type)
                                                            @case('register')
                                                            <span class="alert alert-success">
                                                                {{__('sentences.register_student_logs',['name'=>$log->student()->name.' '.$log->student()->family])}}
                                                            </span>
                                                            @break

                                                            @case('verify')
                                                            <span class="alert alert-success">
                                                                {{__('sentences.register_student_logs',['student'=>$log->student()->name.' '.$log->student()->family,'expert'=>$log->operator()->name.' '.$log->operator()->family])}}
                                                            </span>
                                                            @break


                                                            @case('submit_curt')
                                                            <span class="alert alert-success">
                                                                {{__('sentences.submit_curt_by_student',['student'=>$log->student()->name.' '.$log->student()->family])}}
                                                            </span>
                                                            @break

                                                            @case('edit_curt_by_student')
                                                            <span class="alert alert-success">
                                                                {{__('sentences.edit_curt_by_student',['expert'=>$log->operator()->name.' '.$log->operator()->family])}}
                                                            </span>
                                                            @break


                                                            @case('save_curt_group_by_expert')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.edit_curt_by_student',['expert'=>$log->operator()->name.' '.$log->operator()->family,'group'=>$log->curt->group->name])}}
                                                            </span>
                                                            @break


                                                            @case('review_curt_by_master')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.review_curt_by_master_by_student',['expert'=>$log->operator()->name.' '.$log->operator()->family,'group'=>$log->curt->group->name])}}
                                                            </span>
                                                            @break



                                                            @case('select_curt_master')
                                                            <span class="alert alert-success">
                                                          {{__('sentences.select_curt_master_for_curt',['master'=>$log->master()->name.' '.$log->master()->family,'group'=>$log->curt->group->name])}}
                                                            </span>
                                                            @break

                                                            @case('accept_curt')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.accept_curt_by_group',['group'=>$log->curt->group->name,'student'=>$log->master()->name.' '.$log->master()->family])}}
                                                            </span>
                                                            @break


                                                            @case('pass_quiz')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.pass_quiz_student',[ 'student'=>$log->student()->name.' '.$log->student()->family])}}
                                                            </span>
                                                            @break

                                                            @case('create_subject')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.create_subject_log',[ 'master'=>$log->student()->name.' '.$log->student()->family,'subject'=>$log->subject->title,'group'=>$log->group->name])}}
                                                            </span>
                                                            @break











                                                            @default

                                                            @endswitch
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                        <!--end::تایم لاین-->
                                    </div>
                                </div>
                                <!--end::نمونه-->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::ویزارد-->
        </div>
        <!--end::ویزارد-->
    </div>
</div>

@endsection
