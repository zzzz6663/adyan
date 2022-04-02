@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            @role('student')
            @include('student.progress',['status'=>auth()->user()->status])
            @endrole
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
                            @role('student')
                            @if (auth()->user()->curt() && !auth()->user()->curt()->group_id && auth()->user()->status == 'curt')

                            <form action="{{route('student.subject.list')}}" method="post">
                               @csrf
                               @method('post')
                               <input type="submit" class="btn btn-success" value=" {{ __('sentences.select_subject') }} ">

                              </a>
                           </form>
                           @endrole
                           @endif

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


                                                    @case('submit_plan')
                                                    @role('student')
                                                  {{__('sentences.submit_plan')}}
                                                    @endrole
                                                    @break

                                                    @case('edit_plan_by_student')
                                                    @role('student')
                                                  {{__('sentences.edit_plan_by_student_duty')}}
                                                    @endrole
                                                    @break


                                                    @case('submit_survey')
                                                    @role('master')
                                                  {{__('sentences.submit_survey_duty')}}
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
                                                    <a class="btn btn-primary" href="{{route('student.per.curt')}}">
                                                        {{__('sentences.submit_curt')}}
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

                                                    @case('submit_plan')
                                                    @role('student')
                                                   <a class="btn btn-primary" href="{{route('plan.create')}}">
                                                        {{__('sentences.submit_plan')}}
                                                    </a>
                                                    @endrole
                                                    @break

                                                    @case('verify_plan')
                                                    @role('master')
                                                   <a class="btn btn-primary" href="{{route('session.create',['plan'=>$duty->plan->id])}}">
                                                        (    {{__('sentences.verify_plan')}})
                                                        {{__('sentences.create_session')}}
                                                    </a>
                                                    @endrole
                                                    @break

                                                    @case('edit_plan_by_student')
                                                    @role('student')
                                                    <a class="btn btn-primary" href="{{route('plan.edit',['plan'=>$duty->plan->id])}}">
                                                        {{__('sentences.edit_plan_by_student_duty')}}
                                                    </a>
                                                    @endrole
                                                    @break




                                                    @case('submit_survey')
                                                    @role('master')
                                                  <a class="btn btn-primary" href="{{route('survey.edit',[$duty->survey->id])}}">
                                                    {{__('sentences.submit_survey_master')}}
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
                                                        @case('select_plan_guid')
                                                        <img alt="Pic" src="{{$log->operator()->avatar()}}">
                                                        @break
                                                        @case('select_curt_guid')
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

                                                        @case('submit_subject')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break
                                                        @case('submit_plan')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break
                                                        @case('edit_plan_by_student')
                                                        <img alt="Pic" src="{{$log->group->admin()->avatar()}}">
                                                        @break
                                                        @case('accept_plan')
                                                        <img alt="Pic" src="{{$log->group->admin()->avatar()}}">
                                                        @break
                                                        @case('submit_survey')
                                                        <img alt="Pic" src="{{$log->student()->avatar()}}">
                                                        @break
                                                        @case('answer_survey')
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
                                                                @case('select_plan_guid')
                                                                <span class="">
                                                                    {{__('sentences.select_plan_guid')}}

                                                                </span>
                                                                @break

                                                                @case('select_curt_guid')
                                                                <span class="">
                                                                    {{__('sentences.select_curt_guid')}}

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

                                                                @case('subject_result')
                                                                <span class="">
                                                                    {{__('sentences.subject_result')}}
                                                                </span>
                                                                @break
                                                                @case('submit_survey')
                                                                <span class="">
                                                                    {{__('sentences.submit_survey_log__title')}}
                                                                </span>
                                                                @break

                                                                @case('submit_subject')
                                                                {{__('sentences.submit_subject_student_log')}}
                                                                 @break

                                                                @case('submit_plan')
                                                                {{__('sentences.submit_plan_student_log')}}
                                                                @break

                                                                @case('edit_plan_by_student')
                                                                {{__('sentences.edit_plan_by_student_log')}}
                                                                @break

                                                                @case('accept_plan')
                                                                {{__('sentences.accept_plan_student_log')}}
                                                                @break
                                                                @case('answer_survey')
                                                                {{__('sentences.answer_survey')}}
                                                                @break





















                                                                @default

                                                                @endswitch

                                                                <span class="text-muted ml-2">
                                                                    {{Morilog\Jalali\Jalalian::forge($log->created_at)->format('d-m-Y')}}
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
                                                                {{__('sentences.confirm_student_account_by_exprt',['name'=>$log->student()->name.' '.$log->student()->family,'expert'=>$log->operator()->name.' '.$log->operator()->family])}}
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
                                                            {{__('sentences.save_curt_group_by_expert_log',['expert'=>$log->operator()->name.' '.$log->operator()->family,'group'=>$log->curt->group->name,'student'=>$log->curt->user->name.' '.$log->curt->user->family])}}
                                                            </span>
                                                            @break


                                                            @case('review_curt_by_master')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.review_curt_by_master_by_student',['student'=>$log->operator()->name.' '.$log->operator()->family,'group'=>$log->curt->group->name])}}
                                                            </span>
                                                            @break



                                                            @case('select_curt_master')
                                                            <span class="alert alert-success">
                                                          {{__('sentences.select_curt_master_for_curt',['master'=>$log->curt->master()->name.' '.$log->curt->master()->family,'group'=>$log->curt->group->name])}}
                                                            </span>
                                                            @break
                                                            @case('select_plan_guid')
                                                            <span class="alert alert-success">
                                                          {{__('sentences.select_plan_guid_for_plan',['master'=>$log->plan->master->name.' '.$log->plan->master->family,'group'=>$log->plan->group->name])}}
                                                            </span>
                                                            @break

                                                            @case('select_curt_guid')
                                                            <span class="alert alert-success">
                                                          {{__('sentences.select_curt_guid_for_curt',['master'=>$log->curt->master()->name.' '.$log->curt->master()->family,'group'=>$log->curt->group->name])}}
                                                            </span>
                                                            @break

                                                            @case('accept_curt')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.accept_curt_by_group',['group'=>$log->curt->group->name,'student'=>$log->curt->user->name.' '.$log->curt->user->family])}}
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


                                                            @case('subject_result')
                                                            <span class="alert alert-success">
                                                            {{__('sentences.subject_result_log',[ 'master'=>$log->student()->name.' '.$log->student()->family,'subject'=>$log->subject->title,'group'=>$log->group->name])}}
                                                            </span>
                                                            @break

                                                            @case('submit_survey')
                                                            <span class="">
                                                                {{__('sentences.survey_submit_log',[ 'master'=>$log->student()->name.' '.$log->student()->family,'name'=>$log->survey->name,])}}

                                                            </span>
                                                            @break





                                                            @case('submit_subject')
                                                            <span class="">
                                                                {{__('sentences.submit_subject_student',['subject'=>$log->subject->title,'master'=>$log->subject->master->name.' '.$log->subject->master->family,'student'=>$log->student()->name.' '.$log->student()->family])}}
                                                            </span>
                                                            @break




                                                            @case('submit_plan')
                                                            <span class="">
                                                                {{__('sentences.submit_plan_log',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->plan->group->name])}}
                                                            </span>
                                                            @break

                                                            @case('edit_plan_by_student')
                                                            <span class="">
                                                                {{__('sentences.edit_plan_by_student',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->plan->group->name ])}}
                                                            </span>
                                                            @break
                                                            @case('accept_plan')
                                                            <span class="">
                                                                {{__('sentences.accept_plan_log',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->plan->group->name ])}}
                                                            </span>
                                                            @break
                                                            @case('answer_survey')
                                                            <span class="">
                                                                {{__('sentences.answer_survey_log',['master'=>$log->student()->name.' '.$log->student()->family,'name'=>$log->survey->name ])}}
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
