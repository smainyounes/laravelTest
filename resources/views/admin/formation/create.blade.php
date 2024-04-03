@extends('admin.layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('formation.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Nom de la formation</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Date</label>
                        <input class="form-control" type="date" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Lien</label>
                        <input class="form-control" type="text" name="link" value="{{ old('link') }}">
                    </div>
                    <div class="col-12">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection