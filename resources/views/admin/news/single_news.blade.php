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

                        </h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                </div>

                <div class="card-body ">

                    <h2>
                            {{$news->title}}
                        <span class="text-muted pt-2 font-size-sm d-">{{Morilog\Jalali\Jalalian::forge($news->created_at)->format('d-m-Y')}}
                        </span>
                    </h2>
                    <p>
                        {{$news->content}}
                    </p>
                    <a href="{{route('news.list')}}" class="btn btn-primary">{{__('sentences.back')}}</a>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>

@endsection
