@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Ajouter client  </h1>

        <form method="POST" action="{{ route('clients.store', ['id' => $id]) }}">
            @csrf
            <!-- Include the necessary form fields for creating a new service -->
            <div class="form-group">
                <label for="nom">Name:</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gestionnaire">Gestionnaire du Contact:</label>
                <input type="text" name="gestionnaire" value="{{ Auth::user()->name }}" id="gestionnaire" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone:</label>
                <input type="tel" name="telephone" id="telephone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fournisseur">Nom du Fournisseur:</label>
                <input type="text" name="fournisseur" id="fournisseur" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="departement">Département:</label>
                <input type="text" name="departement" id="departement" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telecopie">Télécopie:</label>
                <input type="tel" name="telecopie" id="telecopie" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <textarea name="adresse" id="adresse" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="code_postal">Code Postal:</label>
                <input type="text" name="code_postal" id="code_postal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
