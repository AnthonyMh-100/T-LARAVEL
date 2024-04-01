@extends('base')
@include('navbar')

@section('cards-task')
    <nav class="container-nav">
        <h1 class="mb-4">Mi Tareas</h1>
        <form action="{{route('search')}}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="Search" />
            <button type="submit">Buscar</button>
        </form>
    </nav>
    <div class="container-card">
        <table class="table table-striped table-hover text-left">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ substr($task->description, 0, 50) }}</td>
                        <td>{{ $task->date_to }}</td>
                        <td>{{ $task->date_from }}</td>

                        <td>
                            <a href="{{ route('edit' ,['id' => $task->id]) }}" class="btn btn-warning">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                                  </svg>
                                  </a>
                            <a href="{{ route('destroy', ['id' => $task->id]) }}" class="btn btn-danger">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                  </svg>
                                  </a>
                        </td>
                    </tr>

                @empty
                    <h1>No hay tareas</h1>
                @endforelse

                <P></P>

            </tbody>

        </table>


        <nav class="pag-box" aria-label="Page navigation example d-flex justify-content-end">
            <ul class="pagination">
                @if ($tasks->previousPageUrl())
                    <li class="page-item"><a class="page-link" href="{{ $tasks->previousPageUrl() }}">Previous</a></li>
                @endif
                
                <!-- Mostrar los enlaces de paginación generados por Laravel -->
                <li class="page-item"><span class="page-link">{{ $tasks->currentPage() }}</span></li>

                
                @if ($tasks->nextPageUrl())
                    <li class="page-item"><a class="page-link" href="{{ $tasks->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        </nav>
        
        
    </div>
@endsection
