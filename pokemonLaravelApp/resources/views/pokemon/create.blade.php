@extends('base')

@section('title', 'Add New Pokémon')

@section('content')
<form action="{{ url('pokemon') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Pokémon Name</label>
        <input value="{{ old('name') }}" required type="text" class="form-control" id="name" name="name" placeholder="Pokémon name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="type">Pokémon Type</label>
        <input value="{{ old('type') }}" required type="text" class="form-control" id="type" name="type" placeholder="Pokémon type (e.g., Water, Electric)">
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="height">Height</label>
        <input value="{{ old('height') }}" required type="number" step="0.01" class="form-control" id="height" name="height" placeholder="Height in meters">
        @error('height')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="weight">Weight</label>
        <input value="{{ old('weight') }}" required type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="Weight in kilograms">
        @error('weight')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="evolution">Evolution</label>
        <input value="{{ old('evolution') }}" type="text" class="form-control" id="evolution" name="evolution" placeholder="Pokémon evolution (optional)">
        @error('evolution')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <input value="{{ old('level') }}" type="number" class="form-control" id="level" name="level" placeholder="Pokémon level (optional)">
        @error('level')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Add Pokémon</button>
</form>
@endsection
