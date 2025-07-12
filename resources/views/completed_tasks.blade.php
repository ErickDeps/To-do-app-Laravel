@extends('layouts.layout')

@section('title', 'To do App - Completed Tasks')

@section('title-page', 'Completed Tasks')
@section('content')
    <a href="{{route('index')}}" class="btn__create"><i class="fa-solid fa-arrow-left"></i> Back to home</a>
    {{-- Lista de tareas con botones --}}
    <ul class="task__list p-0">
        @forelse ($tasks as $task)
            <li>
                <h4 class="task__title mb-0"><a href="{{route('show', $task->id)}}">{{$task['title']}}</a></h4>
                <div class="task__actions">
                    {{-- Boton para mostrar el modal de confirmacion --}}
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$task->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="deleteModal{{$task->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$task->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteModalLabel{{$task->id}}">Delete Task</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the task <strong>"{{ $task->title }}"</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                <!-- Formulario real que se envía al confirmar -->
                                <form action="{{ route('destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    |
                    <form action="{{route('no.completed', $task->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning"> 
                           <i class="fa-solid fa-rotate"></i>
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li>There are no completed tasks at the moment.</li>
        @endforelse
    </ul>
    <div class="d-flex justify-content-end mt-4">
        {{ $tasks->links() }}
    </div>
    <div class="d-flex justify-content-end mt-4">
        {{-- <a href="">Show completed tasks</a> --}}
    </div>
    
    
@endsection
    