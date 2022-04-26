<div class="card card-custom gutter-b">
    <div class="card-body">

        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">    {{__('sentences.subject_similar_list')}}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
            </h3>

        </div>

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
                            {{ __('sentences.tags') }}
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
                @foreach ($similar_subjects as $subject)
                    <tr class="datatable-row" style="left: 0px;">
                        <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span>
                        </td>
                        <td class="datatable-cell text-center"><span>{{ $subject->title }} </span></td>
                        <td class="datatable-cell text-center"><span>
                                @if ($subject->admin_id)
                                    {{ $subject->admin->name }}
                                    {{ $subject->admin->family }}
                                @endif

                            </span></td>
                        <td class="datatable-cell text-center">
                            <span>

                                @if ($subject->user)
                                    {{ $subject->user->name }}
                                    {{ $subject->user->family }}
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
                                {{$subject->info}}
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            <span>
                                {{implode(', ', $subject->tags()->pluck('tag')->toArray())}}
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            <span>{{ Morilog\Jalali\Jalalian::forge($subject->created_at)->format('Y-m-d') }}
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            {{-- <a class="btn btn-outline-primary"
                        href="{{route('subject.edit',$subject->id)}}">ویرایش</a> --}}
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>


    </div>
    <!--end: جدول داده ها-->
     </div>
</div>

<div class="card card-custom gutter-b">
    <div class="card-body">

        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">    {{__('sentences.curt_similar_list')}}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
            </h3>

        </div>

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
                            {{ __('sentences.tags') }}
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
                @foreach ($similar_curt as $tag)
                    <tr class="datatable-row" style="left: 0px;">
                        <td class="datatable-cell text-center"><span>{{ $loop->iteration }} </span>
                        </td>
                        <td class="datatable-cell text-center"><span>{{ $tag->title }} </span></td>
                        <td class="datatable-cell text-center"><span>
                                @if ($tag->admin_id)
                                    {{ $tag->admin->name }}
                                    {{ $tag->admin->family }}
                                @endif

                            </span></td>
                        <td class="datatable-cell text-center">
                            <span>

                                @if ($tag->user)
                                    {{ $tag->user->name }}
                                    {{ $tag->user->family }}
                                @endif
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            <span>
                                @switch($tag->status)
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
                                {{$tag->info}}
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            <span>
                                {{implode(', ', $tag->tags()->pluck('tag')->toArray())}}
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            <span>{{ Morilog\Jalali\Jalalian::forge($tag->created_at)->format('Y-m-d') }}
                            </span>
                        </td>
                        <td class="datatable-cell text-center">
                            {{-- <a class="btn btn-outline-primary"
                        href="{{route('tag.edit',$tag->id)}}">ویرایش</a> --}}
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>


    </div>
    <!--end: جدول داده ها-->
     </div>
</div>

