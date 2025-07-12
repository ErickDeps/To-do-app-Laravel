@extends('layouts.layout')

@section('title', 'To do App - Edit Task')

@section('title-page', 'Edit Task')
@section('content')
    <a href="{{route('index')}}" class="btn__create"><i class="fa-solid fa-arrow-left"></i> Back to home</a>
    {{-- Formulario de nueva tarea --}}
    <form action="{{route('update', $task->id)}}" method="post" class="form__create">
        @csrf
        @method('PUT')
        <input type="text" class="name" name="title" id="title" placeholder="Title" value="{{$task->title}}">
        <textarea name="description" class="description" id="description" placeholder="Description">{{$task->description}}</textarea>
        <button type="submit">Save</button>
    </form>
    
@endsection