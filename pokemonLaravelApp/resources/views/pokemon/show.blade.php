@extends('base')

@section('title', 'Pokémon Details')

@section('content')

    <div class="form-group">
        Pokémon ID #:
        {{ $pokemon->id }}
    </div>
    <div class="form-group">
        Name:
        {{ $pokemon->name }}
    </div>
    <div class="form-group">
        Type:
        {{ $pokemon->type }}
    </div>
    <div class="form-group">
        Height:
        {{ number_format($pokemon->height, 2) }} m
    </div>
    <div class="form-group">
        Weight:
        {{ number_format($pokemon->weight, 2) }} kg
    </div>
    <div class="form-group">
        Evolution:
        {{ $pokemon->evolution }}
    </div>
    <div class="form-group">
        Level:
        {{ $pokemon->level }}
    </div>
    <div class="form-group">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>

@endsection
