<!-- resources/views/services/edit.blade.php -->

@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Edit Service</h1>

        <form method="POST" action="{{ route('services.update', $service->id) }}">
            @csrf
            @method('PUT')
            <!-- Include the necessary form fields for editing a service -->
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $service->nom }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
