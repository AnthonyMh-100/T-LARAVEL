@extends('base')
@include('navbar')

<nav class="container-nav">
    <h1 class="mb-4">Editar Tarea</h1>

</nav>

<div class="container-card">
    <form action="{{ route('update')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title Task</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="" value="{{$one_task->title}}">
            <input type="hidden" name="user_id" value="{{$one_task->user_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">
                {{$one_task->description}}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">date_to</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="date_to" placeholder="name@example.com" value="{{$one_task->date_to}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">date_from</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="date_from" placeholder="name@example.com" value="{{$one_task->date_from}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Actualizar Task</button>
        </div>

    </form>
</div>
