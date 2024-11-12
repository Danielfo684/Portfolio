@extends('base')

@section('title', 'Edit Pokémon')

@section('content')

<form action="{{ url('pokemon/' . $pokemon->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Pokémon Name</label>
        <input value="{{ old('name', $pokemon->name) }}" required type="text" class="form-control" id="name" name="name" placeholder="Pokémon name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="type">Pokémon Type</label>
        <input value="{{ old('type', $pokemon->type) }}" required type="text" class="form-control" id="type" name="type" placeholder="Pokémon type (e.g., Water, Electric)">
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="height">Height</label>
        <input value="{{ old('height', $pokemon->height) }}" required type="number" step="0.01" class="form-control" id="height" name="height" placeholder="Height in meters">
        @error('height')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="weight">Weight</label>
        <input value="{{ old('weight', $pokemon->weight) }}" required type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="Weight in kilograms">
        @error('weight')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="evolution">Evolution</label>
        <input value="{{ old('evolution', $pokemon->evolution) }}" type="text" class="form-control" id="evolution" name="evolution" placeholder="Pokémon evolution (optional)">
        @error('evolution')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <input value="{{ old('level', $pokemon->level) }}" type="number" class="form-control" id="level" name="level" placeholder="Pokémon level (optional)">
        @error('level')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit Pokémon</button>
</form>

@endsection
