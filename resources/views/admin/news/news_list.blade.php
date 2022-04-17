@extends('master.main')


@php($side = true)
@php($header = true)
@php($footer = true)


@section('main')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">


            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{__('sentences.news_table')}}
                             <span class="text-muted pt-2 font-size-sm d-block">
                                {{__('sentences.news_list')}}

                            </span>
                        </h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                </div>
                <div class="card-header ">

                    <h3 class="card-title font-weight-bolder text-dark">       {{__('sentences.all_news')}}</h3>


                </div>
                <div class="card-body ">

                    <ul>
                        @foreach ($newses as $news)
                            <li>
                                <h2>
                                    <a href="{{route('single.list',$news->id)}}">
                                        {{$news->title}}
                                    </a>
                                    <span class="text-muted pt-2 font-size-sm d-">{{Morilog\Jalali\Jalalian::forge($news->created_at)->format('d-m-Y')}}
                                    </span>
                                </h2>


                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>

@endsection
