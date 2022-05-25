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
                            @if (auth()->user()->curt() && !auth()->user()->curt()->group_id && auth()->user()->status == 'curt' && auth()->user()->direct)

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

                                    <div class="list list-hover min-w-300px" data-inbox="list">
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
                                                    ({{$duty->curt->user->code}})
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

                                                  {{__('sentences.review_curt_by_master_duty_l',['student'=>$duty->student()->name.' '.$duty->student()->family,'group'=>$duty->curt->group->name])}}

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
                                                    @case('confirm_session')
                                                    @role('master')
                                                    @if ($duty->session)
                                                    {{__('sentences.confirm_session_duty',['date'=>Morilog\Jalali\Jalalian::forge($duty->session->time)->format('d-m-Y')])}}
                                                    @endif
                                                    @endrole
                                                    @break

                                                    @case('define_guid')
                                                    @role('master')
                                                  {{__('sentences.define_guid_title',['student'=>$duty->curt->user->name.' '.$duty->curt->user->family,'code'=>$duty->curt->user->code])}}
                                                    @endrole
                                                    @break
                                                    {{-- @case('verify_plan')
                                                    @role('master')
                                                  {{__('sentences.verify_plan')}}
                                                    @endrole
                                                    @break --}}

                                                    @case('verify_plan')
                                                    @role('master')
                                                  {{__('sentences.verify_plan_duty_title',['student'=>$duty->plan->user->name.' '.$duty->plan->user->family])}}
                                                  {{-- {{$duty->plan->user->id}}
                                                  {{$duty->plan->user->name}} --}}
                                                    @endrole
                                                    @break

                                                    @case('verify_plan_by_master')
                                                    @role('master')
                                                    @if ($duty->plan)
                                                    {{__('sentences.verify_plan_by_master_duty',['student'=>$duty->plan->user->name.' '.$duty->plan->user->family,'code'=>$duty->plan->user->code])}}
                                                    @endrole
                                                    @endif

                                                    @break

                                                    @case('verify_subject')
                                                    @role('master')
                                                  {{__('sentences.verify_subject_duty',['master'=>$duty->subject->master->name.' '.$duty->subject->master->family])}}
                                                    @endrole
                                                    @break


                                                    @case('confirm_plan_by_master')
                                                    @role('master')

                                                  {{__('sentences.confirm_plan_by_master_duty_title',['student'=>$duty->plan->user->name.' '.$duty->plan->user->family])}}
                                                    @endrole
                                                    @break



                                                    @case('confirm_expert_shift')
                                                    @role('expert')
                                                      {{__('sentences.confirm_expert_shift_duty_title',['student'=>$duty->shift->user->name.' '.$duty->shift->user->family,'code'=>$duty->shift->user->code])}}
                                                    @endrole
                                                    @break


                                                    @case('verify_group_shift')
                                                    @role('master')
                                                      {{__('sentences.confirm_expert_shift_duty_title',['student'=>$duty->shift->user->name.' '.$duty->shift->user->family,'code'=>$duty->shift->user->code])}}
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
                                                        {{$duty->id}}
                                                       {{-- {{Morilog\Jalali\Jalalian::forge($duty->created_at)->ago()}} --}}
                                                    @switch( $duty->type)

                                                    @case('register')
                                                    @role('expert')
                                                    {{Morilog\Jalali\Jalalian::forge($duty->created_at)->ago()}}
                                                    <a class="btn btn-primary"
                                                        href="{{route('admin.see.profile.verify.student',[$duty->student()->id,$duty->id])}}">
                                                        {{__('sentences.see_profile')}}
                                                    </a>
                                                    {{-- <a class="btn btn-primary"
                                                        href="{{route('admin.verify.student',[$duty->student()->id,$duty->id])}}">
                                                        {{__('sentences.confirm_account')}}
                                                    </a> --}}
                                                    @endrole
                                                    @break


                                                    @case('student_go_quiz')
                                                    @role('student')

                                                    <a class="btn btn-primary" href="{{route('student.per.quiz')}}">
                                                        {{-- {{__('sentences.participating_in_a_test')}} --}}
                                                        {{__('sentences.action')}}
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
                                                        {{-- {{$duty->curt->title}} --}}
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
                                                        {{-- (    {{__('sentences.review_curt_by_master_duty')}}) --}}
                                                        {{__('sentences.create_session')}}
                                                    </a>
                                                    @endrole
                                                    @break


                                                    @case('verify_subject')
                                                    @role('master')
                                                   <a class="btn btn-primary" href="{{route('session.create',['group'=>$duty->group->id])}}">
                                                        {{-- (    {{__('sentences.verify_subject')}}) --}}
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
                                                        {{__('sentences.create_session')}}
                                                    </a>
                                                    @endrole
                                                    @break
                                                    @case('verify_plan_by_master')
                                                    @role('master')
                                                   @if (!$duty->time && $duty->plan)
                                                   <a class="btn btn-outline-primary"
                                                   href="{{ route('admin.show.plan',[ $duty->plan->id]) }}">
                                                   {{ __('sentences.verify') }} </a>
                                                   @endif

                                                    @endrole
                                                    @break
                                                    @case('confirm_plan_by_master')
                                                    @role('master')

                                                    <a class="btn btn-outline-primary"
                                                    href="{{ route('admin.show.plan',[ $duty->plan->id]) }}">
                                                    {{ __('sentences.verify') }} </a>
                                                    @endrole
                                                    @break

                                                    @case('edit_plan_by_student')
                                                    @role('student')
                                                    <a class="btn btn-primary" href="{{route('plan.edit',['plan'=>$duty->plan->id])}}">
                                                        {{-- {{__('sentences.edit_plan_by_student_duty')}} --}}
                                                        {{__('sentences.action')}}
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

                                                    @case('confirm_session')
                                                    @role('master')
                                                    @if($duty->session)
                                                     <a class="btn btn-primary" href="{{route('session.confirm.show',[$duty->session->id])}}">
                                                        {{__('sentences.confirm_session')}}
                                                    </a>
                                                    @endif
                                                    @endrole
                                                    @break

                                                    @case('define_guid')
                                                    @role('master')
                                                    {{-- @dd($duty->curt->id) --}}
                                                     <a class="btn btn-primary" href="{{route('admin.define.guid',$duty->curt->id)}}">
                                                        {{__('sentences.select')}}
                                                    </a>
                                                    @endrole
                                                    @break

                                                    @case('verify_group_shift')
                                                    @case('confirm_expert_shift')
                                                    @role('expert|master')
                                                    <a class="btn btn-primary" href="{{route('shift.edit',$duty->shift->id)}}">
                                                        {{__('sentences.confirm')}}
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
                    <div class="col-xl-6  pt-xl-0">
                        <div class="card card-custom gutter-b bob"   >
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
                                        @include('home.logs')
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
