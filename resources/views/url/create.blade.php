@extends('layout')

@section('title', 'Create - URLs')

@section('content')

    <form action="{{ route('url.save') }}" method="post">
        @csrf
        <div class="form-group">
            <label>URL</label>
            <input type="text" name="host" class="form-control">
            <small class="form-text text-muted">Digite uma URL válida.</small>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

@endsection