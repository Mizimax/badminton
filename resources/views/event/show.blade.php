@extends('layouts.app')
@section('title', $event->Event_Name)
@section('style')

@endsection
@section('content')
{{ $event->Event_Name }}
@endsection
@section('script')

@endsection