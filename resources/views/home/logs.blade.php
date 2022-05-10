    <!--begin::تایم لاین-->
    <div class="timeline timeline-3">
        <div class="timeline-items">
            @foreach ($logs as $log )
            {{-- {{$log->type}} --}}

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
                    @case('submit_plan_master')
                    <img alt="Pic" src="{{$log->student()->avatar()}}">
                    @break
                    @case('edit_plan_by_student')
                    <img alt="Pic" src="{{$log->group->admin()->avatar()}}">
                    @break
                    @case('edit_plan_by_student_from_master')
                    <img alt="Pic" src="{{$log->operator()->avatar()}}">
                    @break
                    @case('confirm_plan')
                    <img alt="Pic" src="{{$log->operator()->avatar()}}">
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
                    @case('verify_curt_by_expert')
                    <img alt="Pic" src="{{$log->student()->avatar()}}">
                    @break
                    @case('accept_without_guid')
                    <img alt="Pic" src="{{$log->student()->avatar()}}">
                    @break

                    @case('submit_plan_to_group')
                    <img alt="Pic" src="{{$log->student()->avatar()}}">
                    @break
                    @case('faild_plan_confirm_guid')
                    <img alt="Pic" src="{{$log->student()->avatar()}}">
                    @break
                    @default

                    @endswitch


                </div>
                <div class="timeline-content">
                    <div
                        class="d-flex align-items-center justify-content-between mb-3">
                        <div class="mr-2">
                            {{-- {{$log->type}} --}}

                            @switch($log->type)
                            @case('register')
                                {{__('sentences.register')}}
                            @break

                            @case('verify')
                                {{__('sentences.verify_regiter')}}

                            @break
                            @case('submit_curt')
                                {{__('sentences.create_curt')}}
                            @break

                            @case('edit_curt_by_student')
                                {{__('sentences.verify_curt_by_student')}}

                            @break

                            @case('save_curt_group_by_expert')
                                {{__('sentences.save_curt_group_by_expert')}}

                            @break



                            @case('review_curt_by_master')

                                {{__('sentences.review_curt_by_master')}}

                            @break

                            @case('select_curt_master')
                                {{__('sentences.select_curt_master')}}

                            @break
                            @case('select_plan_guid')
                                {{__('sentences.select_plan_guid')}}

                            @break

                            @case('select_curt_guid')
                                {{__('sentences.select_curt_guid')}}

                            @break

                            @case('accept_curt')
                                {{__('sentences.accept_curt')}}

                            @break


                            @case('pass_quiz')
                                {{__('sentences.pass_quiz')}}
                            @break

                            @case('create_subject')
                                {{__('sentences.create_subject')}}
                            @break

                            @case('subject_result')
                                {{__('sentences.subject_result')}}
                            @break
                            @case('submit_survey')
                                {{__('sentences.submit_survey_log__title')}}
                            @break

                            @case('submit_subject')
                            {{__('sentences.submit_subject_student_log')}}
                             @break

                            @case('submit_plan')
                            {{__('sentences.submit_plan_student_log')}}
                            @break
                            @case('submit_plan_master')
                            {{__('sentences.submit_plan_student_log')}}
                            @break

                            @case('edit_plan_by_student')
                            {{__('sentences.edit_plan_by_student_log')}}
                            @break
                            @case('edit_plan_by_student_from_master')
                            {{__('sentences.edit_plan_by_student_log')}}
                            @break
                            @case('confirm_plan')
                            {{__('sentences.confirm_plan_title')}}
                            @break

                            @case('accept_plan')
                            {{__('sentences.accept_plan_student_log')}}
                            @break
                            @case('answer_survey')
                            {{__('sentences.answer_survey')}}
                            @break
                            @case('verify_curt_by_expert')
                            {{__('sentences.verify_curt_by_expert_log_title',['student'=>$log->student()->name.' '.$log->student()->family])}}
                            @break
                            @case('accept_without_guid')
                            {{__('sentences.accept_without_guid_title')}}
                            @break

                            @case('pass_curt_to_group')
                            {{__('sentences.pass_curt_to_group_title')}}
                            @break


                            @case('submit_plan_to_group')
                            {{__('sentences.submit_plan_to_group_title')}}
                            @break


                            @case('faild_plan_confirm_guid')
                            {{__('sentences.faild_plan_confirm_guid_title')}}
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
                        <span class=" ">
                            {{__('sentences.register_student_logs',['name'=>$log->student()->name.' '.$log->student()->family])}}
                        </span>
                        @break

                        @case('verify')
                        <span class=" ">
                            {{__('sentences.confirm_student_account_by_exprt',['name'=>$log->student()->name.' '.$log->student()->family,'expert'=>$log->operator()->name.' '.$log->operator()->family])}}
                        </span>
                        @break


                        @case('submit_curt')
                        <span class=" ">
                            {{__('sentences.submit_curt_by_student',['student'=>$log->student()->name.' '.$log->student()->family])}}
                        </span>
                        @break

                        @case('edit_curt_by_student')
                        <span class=" ">
                            {{__('sentences.edit_curt_by_student',['expert'=>$log->operator()->name.' '.$log->operator()->family])}}
                        </span>
                        @break


                        @case('save_curt_group_by_expert')
                        <span class=" ">
                        {{__('sentences.save_curt_group_by_expert_log',['expert'=>$log->operator()->name.' '.$log->operator()->family,'group'=>$log->curt->group->name,'student'=>$log->curt->user->name.' '.$log->curt->user->family])}}
                        </span>
                        @break


                        @case('review_curt_by_master')
                        <span class=" ">
                        {{__('sentences.review_curt_by_master_by_student',['student'=>$log->operator()->name.' '.$log->operator()->family,'group'=>$log->curt->group->name])}}
                        </span>
                        @break



                        @case('select_curt_master')
                        <span class=" ">
                      {{__('sentences.select_curt_master_for_curt',['student'=>$log->curt->user->name.' '.$log->curt->user->family,'master'=>$log->curt->master()->name.' '.$log->curt->master()->family,'group'=>$log->curt->group->name])}}
                        </span>
                        @break
                        @case('select_plan_guid')
                        <span class=" ">
                      {{__('sentences.select_plan_guid_for_plan',['student'=>$log->curt->user->name.' '.$log->curt->user->family,'master'=>$log->plan->guid->name.' '.$log->plan->guid->family,'group'=>$log->plan->group->name])}}
                        </span>
                        @break

                        @case('select_curt_guid')
                        <span class=" ">
                            @if ($log->curt)
                            {{__('sentences.select_curt_guid_for_curt',['master'=>$log->curt->master()->name.' '.$log->curt->master()->family,'group'=>$log->curt->group->name])}}
                            @else
                            {{__('sentences.select_curt_guid_for_curt',['master'=>$log->plan->master()->name.' '.$log->plan->master()->family,'group'=>$log->plan->group->name])}}

                            @endif
                        </span>
                        @break

                        @case('accept_curt')
                        <span class=" ">
                        {{__('sentences.accept_curt_by_group',['group'=>$log->curt->group->name,'student'=>$log->curt->user->name.' '.$log->curt->user->family])}}
                        </span>
                        @break


                        @case('pass_quiz')
                        <span class=" ">
                        {{__('sentences.pass_quiz_student',[ 'student'=>$log->student()->name.' '.$log->student()->family])}}
                        </span>
                        @break

                        @case('create_subject')
                        <span class=" ">
                        {{__('sentences.create_subject_log',[ 'master'=>$log->student()->name.' '.$log->student()->family,'subject'=>$log->subject->title,'group'=>$log->group->name])}}
                        </span>
                        @break


                        @case('subject_result')
                        <span class=" ">
                        {{__('sentences.subject_result_log',[ 'master'=>$log->student()->name.' '.$log->student()->family,'subject'=>$log->subject->title,'group'=>$log->group->name])}}
                        </span>
                        @break

                        @case('submit_survey')
                        <span class=" ">
                            {{__('sentences.survey_submit_log',[ 'master'=>$log->student()->name.' '.$log->student()->family,'name'=>$log->survey->name,])}}
                        </span>
                        @break





                        @case('submit_subject')
                        <span class=" ">
                            {{__('sentences.submit_subject_student',['subject'=>$log->subject->title,'master'=>$log->subject->master->name.' '.$log->subject->master->family,'student'=>$log->student()->name.' '.$log->student()->family])}}
                        </span>
                        @break




                        @case('submit_plan')
                        <span class=" ">
                            {{__('sentences.submit_plan_master_log',['student'=>$log->student()->name.' '.$log->student()->family,'master'=>$log->plan->master->name.' '.$log->plan->master->family])}}
                        </span>
                        @break
                        @case('submit_plan_master')
                        <span class=" ">
                            @if($log->plan->master)
                            {{__('sentences.submit_plan_log',['student'=>$log->student()->name.' '.$log->student()->family,'master'=>$log->plan->master->name.' '.$log->plan->master->family])}}
                            @endif
                        </span>
                        @break

                        @case('edit_plan_by_student')
                        <span class=" ">
                            {{__('sentences.edit_plan_by_student',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->plan->group->name ])}}
                        </span>
                        @break
                        @case('edit_plan_by_student_from_master')
                        <span class=" ">
                            {{__('sentences.edit_plan_by_student_from_master',['student'=>$log->student()->name.' '.$log->student()->family,'master'=>$log->operator()->name.' '.$log->operator()->family ])}}
                        </span>
                        @break
                        @case('confirm_plan')
                        <span class=" ">
                            {{__('sentences.confirm_plan_log',['student'=>$log->student()->name.' '.$log->student()->family,'master'=>$log->operator()->name.' '.$log->operator()->family ,'group'=>$log->plan->group->name  ])}}
                        </span>
                        @break
                        @case('accept_plan')
                        <span class=" ">
                            {{__('sentences.accept_plan_log',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->plan->group->name ])}}
                        </span>
                        @break
                        @case('answer_survey')
                        <span class=" ">
                            {{__('sentences.answer_survey_log',['master'=>$log->student()->name.' '.$log->student()->family,'name'=>$log->survey->name ])}}
                        </span>
                        @break
                        @case('accept_without_guid')
                        <span class=" ">
                            {{__('sentences.accept_without_guid_title_log',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->curt->group->name])}}
                        </span>
                        @break
                        @case('pass_curt_to_group')
                        <span class=" ">
                            {{__('sentences.pass_curt_to_group_log',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->curt->group->name])}}
                        </span>
                        @break

                        @case('submit_plan_to_group')
                        <span class=" ">
                            {{__('sentences.submit_plan_to_group_content',['student'=>$log->student()->name.' '.$log->student()->family,'group'=>$log->plan->group->name])}}
                        </span>
                        @break

                        @case('faild_plan_confirm_guid')
                        <span class=" ">
                            {{__('sentences.faild_plan_confirm_guid_content',['student'=>$log->student()->name.' '.$log->student()->family,'master'=>$log->plan->master->name.' '.$log->plan->master->family])}}
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
