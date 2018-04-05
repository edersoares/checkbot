@extends('layout')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Host</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($urls as $url)
            <tr>
                <td>{{ $url->id }}</td>
                <td>{{ $url->host }}</td>
                <td>{{ $url->getStatusText() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('url.create') }}" class="btn btn-primary">Adicionar</a>

@endsection