@extends('layouts.layout')

@section('title', 'To do App - Home')

@section('title-page', 'To do list')
@section('content')
    <a href="{{route('create')}}" class="btn__create"><i class="fa-solid fa-plus"></i> Create a new task</a>
    {{-- Lista de tareas con botones --}}
    <ul class="task__list p-0">
        @forelse ($tasks as $task)
            <li>
                <h4 class="task__title mb-0"><a href="{{route('show', $task->id)}}">{{$task['title']}}</a></h4>
                <div class="task__actions">
                    <form action="{{route('completed', $task->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success"> <i class="fa-solid fa-check"></i></button>
                    </form> |
                    <a href="{{route('edit', $task->id)}}" class="btn btn-primary" style="color: #fff;"><i class="fa-solid fa-pencil"></i></a> |
                    {{-- Boton para mostrar el modal de confirmacion --}}
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$task->id}}">
                        <i class="fa-solid fa-trash"></i></button>
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
                                    <button type="submit" class="btn btn-danger bg-danger">Yes, delete</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>                     
                </div>
            </li>
        @empty
            <li>No data.</li>
        @endforelse
    </ul>
    <div class="d-flex justify-content-end mt-4">
        {{ $tasks->links() }}
    </div>
    <div class="d-flex justify-content-end mt-4">
        <a href="{{route('completed.tasks')}}">Show completed tasks</a>
    </div>
    
    
@endsection
    