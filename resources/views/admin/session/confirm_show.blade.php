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
                                {{ __('sentences.session_all_table') }}
                                {{ __('sentences.session_all_list') }}
                                <span class="text-muted pt-2 font-size-sm d-block">

                                </span>
                            </h3>
                        </div>
                        <div class="card-toolbar">


                        </div>
                    </div>
                    @include('admin.session.tables',['show_actions' => false])
                            <br>
                            <br>
                            <br>
                            <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ __('sentences.session_info') }}
                                    </h3>

                                </div>
                                <!--begin::Form-->
                                <form action="{{route('session.confirm',['session'=>$session->id])}}" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>
                                                {{ __('sentences.session_point') }}


                                            </label>
                                           <textarea class="form-control" name="info" id="" cols="30" rows="10"></textarea>

                                        </div>


                                    </div>

                                    <div class="card-footer">
                                        <input type="submit" name="confirm" value=" {{ __('sentences.confirm') }} " class="btn btn-primary mr-2">
                                        <input type="submit" name="reject" value=" {{ __('sentences.reject') }} " class="btn btn-danger mr-2">
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
