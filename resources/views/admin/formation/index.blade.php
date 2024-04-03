@extends('admin.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input class="form-control" type="text" name="search" value="{{ old("search") }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <button class="btn btn-primary">search</button>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-primary" href="{{ route('formation.create') }}">Ajouter</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if ($formations->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Formation</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Lien</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formations as $formation)
                                <tr>
                                    <td>{{ $formation->id }}</td>
                                    <td>{{ $formation->name }}</td>
                                    <td>
                                        {{ $formation->description }}
                                    </td>
                                    <td>{{ $formation->date }}</td>
                                    <td>
                                        <a href="#">{{ $formation->link }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('formation.edit', $formation->id) }}">modifier</a>
                                        <form action="{{ route('formation.destroy', $formation->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-danger">supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $formations->withQueryString()->links() }}
            @else
                <h4 class="text-center">Aucune formation trouvée</h4>
            @endif
        </div>
    </div>
@endsection