@extends('layouts.layout')

@section('title', 'To do App - Show Task')

@section('title-page', 'Task')
@section('content')
    <a href="{{ url()->previous() }}" class="btn__create"><i class="fa-solid fa-arrow-left"></i> Back</a>
    {{-- Lista de tareas con botones --}}
    <h2 class="show__title">Title: {{$task->title}}</h2>
    <p class="description">Description: {{$task->description}}</p>
@endsection