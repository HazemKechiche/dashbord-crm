<!-- resources/views/services/create.blade.php -->

@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Ajouter Secteur</h1>

        <form method="POST" action="{{ route('services.store') }}">
            @csrf
            <!-- Include the necessary form fields for creating a new service -->
            <div class="form-group">
                <label for="nom">Name:</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
