@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- Add Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Affaire</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('affaires.store',$clients->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="GestionnaireAffaire">Gestionnaire de l'Affaire:</label>
                    <input type="text" name="GestionnaireAffaire" value ="{{ Auth::user()->name }}"id="GestionnaireAffaire" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="NomAffaire">Nom de l'Affaire:</label>
                    <input type="text" name="NomAffaire" id="NomAffaire" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="NomClient">Nom du Client:</label>
                    <select name="NomClient" id="NomClient" class="form-control" required>
                        <option value="">Sélectionner un client</option>
                        
                            <option value="{{ $clients->Nom }}">{{ $clients->Nom }}</option>
                 
                    </select>
                </div>
                <div class="form-group">
                    <label for="Type">Type:</label>
                    <input type="text" name="Type" id="Type" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="OrigineProspect">Origine du Prospect:</label>
                    <input type="text" name="OrigineProspect" id="OrigineProspect" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Montant">Montant:</label>
                    <input type="number" name="Montant" id="Montant" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="DateEcheance">Date d'échéance:</label>
                    <input type="date" name="DateEcheance" id="DateEcheance" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Etape">Étape:</label>
                    <input type="text" name="Etape" id="Etape" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="ChiffreAffaires">Chiffre d'affaires (€/$):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&euro;</span>
                        <!-- For Dollar: <span class="input-group-text">&#36;</span> -->
                    </div>
                    <input type="number" name="ChiffreAffaires" id="ChiffreAffaires" class="form-control" required>
                </div>
            </div>
                <div class="form-group">
                    <label for="DescriptionAttendue">Description Attendue:</label>
                    <textarea name="DescriptionAttendue" id="DescriptionAttendue" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Affaire</button>
            </form>
        </div>
    </div>
</div>
@endsection