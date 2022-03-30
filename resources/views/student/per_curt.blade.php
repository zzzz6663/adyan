@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">


                <div class="row">
                    <div class="col-lg-12 order-1 order-xxl-2">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">
                                    {{ __('sentences.notes') }}


                                </h3>

                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->

                            <div class="card-body pt-0">
                                <ul>
                                    <li>
                                        {{ __('sentences.note6') }}
                                    </li>
                                    <li>  {{ __('sentences.note7') }} </li>
                                    <li>  {{ __('sentences.note8') }}  </li>
                                    <li>   {{ __('sentences.note9') }} </li>
                                    <li>   {{ __('sentences.note10') }} </li>
                                </ul>

                                <a class="btn  btn-primary" href="{{route('curt.create')}}">{{ __('sentences.create_curt') }}</a>
                                <span class="btn  btn-success"  id="show_tags">{{ __('sentences.select_curt') }}</span>



                                {{-- <a class="btn " href="{{route('student.subject.list')}}">{{ __('sentences.select_curt') }}</a> --}}


                            </div>
                            @include('sections.error')
                            <div id="tags_section" class="card-body pt-0  {{$errors->any()?'':'hide'}}" >
                                <ul>
                                  <li>  {{ __('sentences.note12') }} </li>
                                  <li>  {{ __('sentences.note13') }}  </li>
                                  <li>   {{ __('sentences.note14') }} </li>
                                  <li>   {{ __('sentences.note15') }} </li>
                                </ul>



                                <form class="form" action="{{route('student.subject.list')}}" method="post">
                                  @csrf
                                  @method('post')
                                  <div class="row">
                                    <div class="col-lg-6">
                                        <!--begin::ورودی-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>       {{__('sentences.tags')}}    </label>
                                            <select style="width:500px" name="tags[]" id="" class="form-control select2" multiple="multiple">
                                                <option disabled="disabled" value="">{{__('sentences.select_one')}}</option>
                                                @foreach (App\Models\Tag::all() as $tag)
                                                <option {{in_array($tag->id ,old('tags',[]))?'selected':''}} value="{{$tag->id}}">{{$tag->tag}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::ورودی-->
                                    </div>
                                  </div>
                                  <input type="submit" class="btn btn-success" value=" {{ __('sentences.select_tags') }} ">
                              </form>
                              </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
