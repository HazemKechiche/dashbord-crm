<!-- resources/views/prospects/edit.blade.php -->

@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Modifier Prospect</h1>

        <form method="POST" action="{{ route('prospects.update', ['prospect' => $prospect->id]) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Include the necessary form fields for editing the Prospect -->
            <div class="form-group">
                <label for="GestionnaireDuProspect">Gestionnaire du Prospect:</label>
                <input type="text" name="GestionnaireDuProspect" id="GestionnaireDuProspect" class="form-control" required value="{{ $prospect->GestionnaireDuProspect }}">
            </div>

            <div class="form-group">
                <label for="Prénom">Prénom:</label>
                <input type="text" name="Prénom" id="Prénom" class="form-control" required value="{{ $prospect->Prénom }}">
            </div>

            <div class="form-group">
                <label for="Nom">Nom:</label>
                <input type="text" name="Nom" id="Nom" class="form-control" required value="{{ $prospect->Nom }}">
            </div>

            <div class="form-group">
                <label for="Titre">Titre:</label>
                <input type="text" name="Titre" id="Titre" class="form-control" value="{{ $prospect->Titre }}">
            </div>

            <div class="form-group">
                <label for="E-mail">E-mail:</label>
                <input type="email" name="E-mail" id="E-mail" class="form-control" required value="{{ $prospect->{'E-mail'} }}">
            </div>

            <div class="form-group">
                <label for="Téléphone">Téléphone:</label>
                <input type="text" name="Téléphone" id="Téléphone" class="form-control" value="{{ $prospect->Téléphone }}">
            </div>

            <div class="form-group">
                <label for="StatutduProspect">Statut du Prospect:</label>
                <input type="text" name="StatutduProspect" id="StatutduProspect" class="form-control" required value="{{ $prospect->StatutduProspect }}">
            </div>

            <div class="form-group">
                <label for="ChiffreAffaires">Chiffre d’affaires:</label>
                <input type="number" name="ChiffreAffaires" id="ChiffreAffaires" class="form-control" step="0.01" value="{{ $prospect->ChiffreAffaires }}">
            </div>

            <div class="form-group">
                <label for="Nbredemployes">Nombre d'employés:</label>
                <input type="number" name="Nbredemployes" id="Nbredemployes" class="form-control" value="{{ $prospect->Nbredemployes }}">
            </div>

            <div class="form-group">
                <label for="Address">Address:</label>
                <input type="text" name="Address" id="Address" class="form-control" value="{{ $prospect->Address }}">
            </div>

            <div class="form-group">
                <label for="Codepostal">Code postal:</label>
                <input type="text" name="Codepostal" id="Codepostal" class="form-control" value="{{ $prospect->Codepostal }}">
            </div>
            <div class="form-group">
                <label for="pdf_file">Sélectionner un fichier PDF:</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
