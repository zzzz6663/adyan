
@extends('email.master')
@section('message')
{{$user->name}}
{{$user->family}}
{{  __('sentences.verify_account')}}
@endsection
