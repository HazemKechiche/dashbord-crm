@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- Update Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Reunion</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('reunions.update', ['reunion' => $reunion->id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use the PUT method for updates -->
                <div class="form-group">
                    <label for="nomReunion">Nom Reunion:</label>
                    <input type="text" name="nomReunion" id="nomReunion" class="form-control" value="{{ $reunion->nomReunion }}" required>
                </div>
                <div class="form-group">
                    <label for="Emplacement">Emplacement:</label>
                    <input type="text" name="Emplacement" id="Emplacement" class="form-control" value="{{ $reunion->Emplacement }}" required>
                </div>
                <div class="form-group">
                    <label for="dateD">Date Début:</label>
                    <input type="datetime-local" name="dateD" id="dateD" class="form-control" value="{{ $reunion->dateD }}" required>
                </div>
                <div class="form-group">
                    <label for="dateF">Date Fin:</label>
                    <input type="datetime-local" name="dateF" id="dateF" class="form-control" value="{{ $reunion->dateF }}" required>
                </div>
                <div class="form-group">
                    <label for="Hote">Hôte:</label>
                    <input type="text" name="Hote" id="Hote" class="form-control" value="{{ $reunion->Hote }}" required>
                </div>
                <div class="form-group">
                    <label for="Rappel">Rappel:</label>
                    <input type="text" name="Rappel" id="Rappel" class="form-control" value="{{ $reunion->Rappel }}" required>
                </div>
                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea name="Description" id="Description" class="form-control">{{ $reunion->Description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Reunion</button>
            </form>
        </div>
    </div>
</div>
@endsection
