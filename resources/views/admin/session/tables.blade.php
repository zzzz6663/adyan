<div class="card-body">


    <!--begin: جدول داده ها-->
    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
        id="kt_datatable" style="">
        <h1> {{ __('sentences.session_curts') }}</h1>
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
                            {{ __('sentences.status') }}
                        </span>
                    </th>

                    <th class="datatable-cell datatable-cell-sort text-center">
                        <span>
                            {{ __('sentences.edit_last_date') }}
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
                @foreach ($session->curts as $curt)
                <tr class="datatable-row" style="left: 0px;">
                    <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span></td>
                    <td class="datatable-cell text-center">
                        @if($show_actions)
                        <span>
                            {{ $curt->title }}
                        </span>
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            {{$curt->pivot->title }}
                        </span>
                        @endif



                    </td>
                    <td class="datatable-cell text-center">
                        <a href="{{route('agent.profile',$curt->user->id)}}">
                            <span>
                                {{ $curt->user->name }}
                                {{ $curt->user->family }}
                            </span>

                        </a>
                    </td>

                    <td class="datatable-cell text-center">
                        @if($show_actions)
                        @if ($curt->master_id)
                        <span>
                            {{ $curt->master()->name }}
                            {{ $curt->master()->family }}
                        </span>
                        @endif
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            @if ($session_master= App\Models\User::find($curt->pivot->master_id))
                            {{$session_master->name}}
                            {{$session_master->family}}
                            @endif
                        </span>
                        @endif




                    </td>
                    <td class="datatable-cell text-center">
                        @if($show_actions)
                        @if ($curt->guid_id)
                        <span>
                            {{ $curt->guid->name }}
                            {{ $curt->guid->family }}
                        </span>
                        @endif
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            @if ($session_guid= App\Models\User::find($curt->pivot->guid_id))
                            {{$session_guid->name}}
                            {{$session_guid->family}}
                            @endif
                        </span>
                        @endif


                    </td>
                    <td class="datatable-cell text-center">

                        @if($show_actions)
                        <span>{{ __('arr.'.$curt->status) }}
                        </span>
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            {{ __('arr.'.$curt->pivot->status) }}
                        </span>
                        @endif


                    </td>
                    <td class="datatable-cell text-center">
                        <span>
                            @if ($curt->last_edit_student())
                            {{ $curt->last_edit_student()}}
                            @endif
                        </span>
                    </td>

                    @if($show_actions)
                    <td class="datatable-cell text-center">
                        {{-- @if ($curt->side || $curt->status =='accept_without_master') --}}
                        @if ($curt->pivot->down)
                        <span class="text  text-success">
                            {{ __('sentences.verified') }}
                        </span>
                        @else
                        <a class="btn btn-outline-primary"
                            href="{{ route('admin.show.curt', [$curt->id,'sesssion_id'=>$session->id]) }}">{{__('sentences.verify')}}</a>
                        @endif

                    </td>
                    @endif

                </tr>
                @endforeach



            </tbody>
        </table>


    </div>
    <!--end: جدول داده ها-->




</div>

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
                            {{ __('sentences.subject_user') }}
                        </span>
                    </th>
                    <th class="datatable-cell datatable-cell-sort text-center">
                        <span>
                            {{ __('sentences.status') }}
                        </span>
                    </th>
                    <th class="datatable-cell datatable-cell-sort text-center">
                        <span>
                            {{ __('sentences.info') }}
                        </span>
                    </th>
                    <th class="datatable-cell datatable-cell-sort text-center">
                        <span>
                            {{ __('sentences.edit_last_date') }}
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
                @foreach ($session->subjects as $subject)
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
                            @if ($subject->user_id)
                            <a href="{{route('agent.profile',$subject->user->id)}}">
                                <span>
                                    {{ $subject->user->name }}
                                    {{ $subject->user->family }}
                                </span>
                            </a>
                            @endif
                        </span>
                    </td>
                    <td class="datatable-cell text-center">
                        <span>
                            @switch($subject->status)
                            @case(null)
                            {{ __('sentences.in_progress') }}
                            @break

                            @case(1)
                            {{ __('sentences.confirmed') }}
                            @break

                            @case(0)
                            {{ __('sentences.failed') }}
                            @break

                            @default
                            @endswitch
                        </span>
                    </td>
                    <td class="datatable-cell text-center">
                        <span>
                            {{ $subject->info }}
                        </span>
                    </td>
                    <td class="datatable-cell text-center">
                        <span>{{ Morilog\Jalali\Jalalian::forge($subject->updated_at)->format('Y-m-d') }}
                        </span>
                    </td>
                    @if($show_actions)
                    <td class="datatable-cell text-center">
                        @if ($subject->time)
                        <span class="text  text-success">
                            {{ __('sentences.verified') }}
                        </span>
                        @else
                        <a class="btn btn-outline-primary" href="{{ route('subject.edit', $subject->id) }}">
                            {{ __('sentences.verify') }} </a>
                        @endif

                    </td>
                    @endif
                </tr>
                @endforeach



            </tbody>
        </table>


    </div>
    <!--end: جدول داده ها-->



</div>



<div class="card-body">


    <!--begin: جدول داده ها-->
    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
        id="kt_datatable" style="">
        <h1> {{ __('sentences.session_plans') }}</h1>
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
                            {{ __('sentences.plan_title') }}
                        </span>
                    </th>
                    <th class="datatable-cell datatable-cell-sort text-center">
                        <span>
                            {{ __('sentences.subject_user') }}
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
                            {{ __('sentences.status') }}
                        </span>
                    </th>

                    <th class="datatable-cell datatable-cell-sort text-center">
                        <span>
                            {{ __('sentences.edit_last_date') }}
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
                @foreach ($session->plans as $plan)
                <tr class="datatable-row" style="left: 0px;">
                    <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span>
                    </td>
                    <td class="datatable-cell text-center">
                        @if($show_actions)
                        <span>{{ $plan->title }}
                        </span>
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            {{$plan->pivot->title }}
                        </span>
                        @endif



                    </td>
                    <td class="datatable-cell text-center">
                        <span>

                            <a href="{{route('agent.profile',$plan->user->id)}}">
                                <span>
                                    {{ $plan->user->name }}
                                    {{ $plan->user->family }}
                                </span>
                            </a>


                        </span>
                    </td>

                    <td class="datatable-cell text-center">

                        @if($show_actions)
                        @if ($plan->master_id)
                        <span>
                            {{ $plan->master->name }}
                            {{ $plan->master->family }}
                        </span>
                        @endif
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            @if ($session_master= App\Models\User::find($plan->pivot->master_id))
                            {{$session_master->name}}
                            {{$session_master->family}}
                            @endif
                        </span>
                        @endif



                    </td>
                    <td class="datatable-cell text-center">


                        @if($show_actions)
                        @if ($plan->guid_id)
                        <span>
                            {{ $plan->guid->name }}
                            {{ $plan->guid->family }}
                        </span>
                        @endif
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            @if ($session_guid= App\Models\User::find($plan->pivot->guid_id))
                            {{$session_guid->name}}
                            {{$session_guid->family}}
                            @endif
                        </span>
                        @endif


                    </td>
                    <td class="datatable-cell text-center">
                        @if($show_actions)
                        <span>{{ __('arr.'.$plan->status) }}
                        </span>
                        @else
                        <span class="text-muted pt-2 font-size-sm text-danger">
                            {{ __('arr.'.$plan->pivot->status) }}
                        </span>
                        @endif
                    </td>
                    <td class="datatable-cell text-center">
                        <span>
                            @if ($plan->last_edit_student())
                            {{ $plan->last_edit_student()}}
                            @endif
                        </span>
                    </td>
                    @if($show_actions)
                    <td class="datatable-cell text-center">
                        @if ($plan->pivot->down)
                        <span class="text  text-success">
                            {{ __('sentences.verified') }}
                        </span>
                        @else
                        <a class="btn btn-outline-primary"
                            href="{{ route('admin.show.plan',[ $plan->id,'sesssion_id'=>$session->id]) }}">
                            {{ __('sentences.verify') }} </a>
                        @endif

                    </td>
                    @endif
                </tr>
                @endforeach



            </tbody>
        </table>


    </div>
    <!--end: جدول داده ها-->



</div>
