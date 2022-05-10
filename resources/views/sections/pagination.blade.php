


@if ($paginator->lastPage() > 1)
<div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
    <div class="datatable-pager datatable-paging-loaded">


        <ul class="datatable-pager-nav mb-5 mb-sm-0">
            <li>
                @if($paginator->currentPage() > 1)


                <li><a href="{{$paginator->url(1)}}" title="اول" class="datatable-pager-link datatable-pager-link-first  " ><i class="flaticon2-fast-next"></i></a></li>
                <li><a href="{{$paginator->url($paginator->currentPage()-1)}}" title="قبلی" class="datatable-pager-link datatable-pager-link-prev   "   ><i class="flaticon2-next"></i></a></li>


                @endif
            </li>

            @php
            $link_limit = 12;
            @endphp
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
        $half_total_links = floor($link_limit / 2);
        $from = $paginator->currentPage() - $half_total_links;
        $to = $paginator->currentPage() + $half_total_links;
        if ($paginator->currentPage() < $half_total_links) {
           $to += $half_total_links - $paginator->currentPage();
        }
        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
        }
        ?>
                @if ($from < $i && $i < $to) <li
                    class="  ">
                    <a class="datatable-pager-link datatable-pager-link-number {{ ($paginator->currentPage() == $i) ? ' datatable-pager-link-active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                    @endif
                    @endfor
                    {{-- @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <li class="">
                            <a class="datatable-pager-link datatable-pager-link-number {{ ($paginator->currentPage() == $i) ? '  datatable-pager-link-active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor --}}

                        @if($paginator->currentPage() <$paginator->lastPage())
                        <li><a href="{{$paginator->url($paginator->currentPage()+1)}}" title="بعدی" class="datatable-pager-link datatable-pager-link-next" data-page="2"><i class="flaticon2-back"></i></a></li>
                        <li><a href="{{$paginator->url($paginator->lastPage())}}" title="آخری" class="datatable-pager-link datatable-pager-link-last" data-page="10"><i class="flaticon2-fast-back"></i></a></li>
                            @endif

                            </li>
        </ul>
    </div>
</div>



















{{-- <span style="margin-right: 20px">صفحه
    {{$paginator->currentPage()}}
    از
    {{$paginator->lastPage()}}
</span> --}}
{{-- <div class="pagination1">
    <div class="number">


        <ul>
            {{-- <li><a href="#">1</a></li>--}}
            {{-- <li class="active"><a href="#">2</a></li>--}}
            {{-- <li><span>...</span></li>--}}
            {{-- <li><a href="#">14</a></li>--}}
            {{-- <li><a href="#">15</a></li>--}}


            {{-- </ul>
    </div>
    <div class="result">

    </div> --}}

    {{-- <div class="next-prev">

        <span class="next-page {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">

            <a href="{{ $paginator->url($paginator->currentPage()+1) }}"> <i class="icon-arrow-right-line"></i></a>

        </span>
        <span class="prev-page{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} ">
            <a href="{{ $paginator->url($paginator->currentPage()-1) }}"> <i class="icon-arrow-right-line"></i></a>

        </span>
    </div> --}}
    {{--
</div> --}}

@endif
