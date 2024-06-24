@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">


  <h1>Eliminati</h1>
  <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Progetti Eliminati</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deletedProjects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td class="d-flex gap-2">
                                    <form action="{{ route('admin.projects.restore', ['project' => $project->slug]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-sm">Ripristina</button>
                                    </form>
                                    <form action="{{ route('admin.projects.force-delete', ['project' => $project->slug]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Elimina definitivamente</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection