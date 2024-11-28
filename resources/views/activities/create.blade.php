<!-- resources/views/activities/create.blade.php -->

@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Add Activity</h1>

        <form method="POST" action="{{ route('activities.store',['id'=>$clients->id]) }}">
            @csrf
            <input type="hidden" name="client_id" value="{{ $clients->id }}">
            <!-- Include the necessary form fields for creating a new activity -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type">Activity Type:</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="visites">Visites</option>
                    <option value="réunions">Réunions</option>
                    <option value="appels téléphoniques">Appels téléphoniques</option>
                    <option value="lettre d'introduction">Lettre d'introduction</option>
                    <option value="e-mails">E-mails</option>
                    <option value="publicités ciblées">Publicités ciblées</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="date_time">Date and Time:</label>
                <input type="datetime-local" name="date_time" id="date_time" class="form-control" required>
            </div>


            <div class="form-group">
                <label for="client_id">Client:</label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">Select Client (optional)</option>
                    @foreach ($clients as $client)
                        <option value="{{ $clients->id }}">{{ $clients->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
