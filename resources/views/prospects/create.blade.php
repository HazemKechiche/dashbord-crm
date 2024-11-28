

@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Ajouter Prospect</h1>

        <form method="POST" action="{{ route('prospects.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Include the necessary form fields for creating a new Prospect -->
            <div class="form-group">
                <label for="GestionnaireDuProspect">Gestionnaire du Prospect:</label>
                <input type="text" name="GestionnaireDuProspect" value="{{ Auth::user()->name }}" id="GestionnaireDuProspect" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Prénom">Prénom:</label>
                <input type="text" name="Prénom" id="Prénom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Nom">Nom:</label>
                <input type="text" name="Nom" id="Nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Titre">Titre:</label>
                <input type="text" name="Titre" id="Titre" class="form-control">
            </div>

            <div class="form-group">
                <label for="E-mail">E-mail:</label>
                <input type="email" name="E-mail" id="E-mail" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Téléphone">Téléphone:</label>
                <input type="text" name="Téléphone" id="Téléphone" class="form-control">
            </div>

            <div class="form-group">
                <label for="StatutduProspect">Statut du Prospect:</label>
                <input type="text" name="StatutduProspect" id="StatutduProspect" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ChiffreAffaires">Chiffre d’affaires:</label>
                <input type="number" name="ChiffreAffaires" id="ChiffreAffaires" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="Nbredemployes">Nombre d'employés:</label>
                <input type="number" name="Nbredemployes" id="Nbredemployes" class="form-control">
            </div>

            <div class="form-group">
                <label for="Address">Address:</label>
                <input type="text" name="Address" id="Address" class="form-control">
            </div>

            <div class="form-group">
                <label for="Codepostal">Code postal:</label>
                <input type="text" name="Codepostal" id="Codepostal" class="form-control">
            </div>
            <div class="form-group">
                <label for="pdf_file">Sélectionner un fichier PDF:</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
