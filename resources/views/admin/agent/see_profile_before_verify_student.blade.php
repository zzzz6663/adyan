@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
 @include('admin.agent.profile_info')

 <div class="row">
     <div class="col-lg-12">
        <div class="card-body d-flex flex-column">
            <div class="pt-5">
                @include('sections.error')
                <form action="{{route('admin.verify.student',[$duty->student()->id,$duty->id])}}"  method="post">
                    @csrf
                    @method('post')
                    <div class="form-group mb-1">
						<label for="exampleتکس اریا"> {{__('sentences.reject_reason')}}  </label>
						<textarea class="form-control"  name="reason" id="exampleتکس اریا" rows="3"></textarea>
					</div>

                    <input  class="btn btn-success btn-shadow-hover font-weight-bolder  " type="submit" value="{{__('sentences.confirm')}} " name="confirm">
                    <input  class="btn btn-danger btn-shadow-hover font-weight-bolder  " type="submit" value="{{__('sentences.do_reject')}} " name="remove">
                </form>

            </div>
        </div>
     </div>
 </div>
@endsection
