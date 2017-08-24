@extends('layouts.app')
@section('title', $event->Event_Name)
@section('style')

@endsection
@section('content')

@if(Auth::isOrganizer())
Organizer
@elseif(Auth::isAdmin())
Admin
@elseif(Auth::isUser())
User
@endif

@endsection
@section('script')

@endsection