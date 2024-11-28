@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- Add Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update employe</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('employes.update', ['id' => $employe->id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use the PUT method for updates -->
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $employe->nom }}" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom:</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $employe->prenom }}" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="E-mail" id="email" class="form-control" value="{{ $employe->{"E-mail"} }}" required>
                </div>
                <div class="form-group">
                    <label for="poste">Poste:</label>
                    <input type="text" name="Poste" id="poste" class="form-control" value="{{ $employe->Poste }}" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone:</label>
                    <input type="text" name="Telephone" id="telephone" class="form-control" value="{{ $employe->Telephone }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update employe</button>
            </form>
        </div>
    </div>
</div>
@endsection
