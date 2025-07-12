@extends('layouts.layout')

@section('title', 'To do App - Create')

@section('title-page', 'Create a new task')
@section('content')
    <a href="{{route('index')}}" class="btn__create"><i class="fa-solid fa-arrow-left"></i> Back to home</a>
    {{-- Formulario de nueva tarea --}}
    <form action="{{route('store')}}" method="post" class="form__create">
        @csrf
        <input type="text" class="name" name="title" id="title" placeholder="Title">
        <textarea name="description" class="description" id="description" placeholder="Description"></textarea>
        <button type="submit">Create</button>
    </form>
    
@endsection