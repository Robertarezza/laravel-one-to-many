@extends('layouts.admin')


@section('content')
<div class="container mt-5">

    @include('partials.session_message')
    <div class="d-flex justify-content-around mt-5">
        <h1>I miei Progetti</h1>
        <form action="{{ route('admin.projects.index') }}" method="GET" class="d-flex align-items-center justify-content-center gap-3">
            <div class="mb-3 d-flex flex-wrap">
                <label for="statusFilter" class="form-label ">Filtra per stato:</label>
                <select id="statusFilter" name="status" class="form-select">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Mostra tutti</option>
                    <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>In corso</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completati</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary " style="margin-top: 15px;">Filtra</button>
        </form>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Slug</th>
                <th scope="col">Tecnologie</th>
                <th scope="col">Stato</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->title}}</td>
                <td>{{$project->type?->name}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->used_technologies}}</td>
                <td>@if($project->status == 'ongoing')
                    <i class="fas fa-spinner fa-spin" title="In Progress"></i>
                    @elseif($project->status == 'completed')
                    <i class="fas fa-check-circle" title="Completed"></i>
                    @else
                    <i class="fas fa-question-circle" title="Unknown Status"></i>
                    @endif
                </td>
                <td class="d-flex gap-2">
                    <a href="{{route('admin.projects.show', ['project'=>$project->slug]) }}" class="btn btn-outline-info"  title="Dettagli">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>
                    <a href="{{route('admin.projects.edit', ['project'=>$project->slug]) }}" class="btn btn-outline-warning" title="Modifica">
                        <i class="fa-solid fa-file-pen" ></i>
                    </a>
                    <form action="{{route('admin.projects.destroy', ['project'=>$project->slug]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" title="Elimina" onclick="return confirm('Sei sicuro di volerlo eliminare {{$project->title}}? ')"><i class="fa-solid fa-trash-can " ></i></button>

                    </form> 
                </td>
            </tr>
            @endforeach



        </tbody>
    </table>
    <div>
    {{ $projects->appends(['status' => request('status')])->links() }}
    </div>
</div>

@endsection