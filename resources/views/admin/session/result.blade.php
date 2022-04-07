@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
    <!--begin::Content-->
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
                                {{ __('sentences.session_all_table_log') }}
                                <span class="text-muted pt-2 font-size-sm d-block">
                                    {{ __('sentences.session_all_list_log') }}

                                </span>
                                <span class="text-muted pt-2 font-size-sm d-block">
                                    {{ __('sentences.info') }}:


                                </span>
                                    <p>
                                        {{$session->info}}
                                    </p>
                            </h3>
                        </div>
                        <div class="card-toolbar">


                        </div>
                    </div>
                    @include('admin.session.tables',['show_actions' => false])


                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
