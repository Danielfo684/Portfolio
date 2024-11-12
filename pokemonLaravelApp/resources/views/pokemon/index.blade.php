@extends('base')

@section('title', 'Pokémon List')

@section('content')

    <table class="table table-striped table-hover" id="tablaMueble">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Evolution</th>
                <th>Level</th>
                @if(session('user'))
                    <th>Delete</th>
                    <th>Edit</th>
                @endif
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemon as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->type }}</td>
                    <td>{{ number_format($pokemon->height, 2) }} m</td>
                    <td>{{ number_format($pokemon->weight, 2) }} kg</td>
                    <td>{{ $pokemon->evolution }}</td>
                    <td>{{ $pokemon->level }}</td>
                    @if(session('user'))
                        <td><a href="#" data-href="{{ url('pokemon/' . $pokemon->id) }}" class="borrar">Delete</a></td>
                        <td><a href="{{ url('pokemon/' . $pokemon->id . '/edit') }}">Edit</a></td>
                    @endif
                    <td><a href="{{ url('pokemon/' . $pokemon->id) }}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        @if(session('user'))
            <a href="{{ url('pokemon/create') }}" class="btn btn-success">Add Pokémon</a>
            <form id="formDelete" action="{{ url('') }}" method="post">
                @csrf
                @method('delete')
            </form>
        @endif
    </div>

@endsection

@section('scripts')
    <script src="{{ url('assets/scripts/script.js') }}"></script>
@endsection
