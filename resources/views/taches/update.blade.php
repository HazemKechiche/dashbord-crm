@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- Update Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Tache</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('taches.update', ['id' => $tache->id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use the PUT method for updates -->
                <div class="form-group">
                    <label for="Gestionnairedetache">Gestionnaire de tache:</label>
                    <input type="text" name="Gestionnairedetache" id="Gestionnairedetache" class="form-control" value="{{ $tache->Gestionnairedetache }}" required>
                </div>
                <div class="form-group">
                    <label for="DatedEcheance">Date d'échéance:</label>
                    <input type="date" name="DatedEcheance" id="DatedEcheance" class="form-control" value="{{ $tache->DatedEcheance }}" required>
                </div>
                <div class="form-group">
                    <label for="DateD">Date de début:</label>
                    <input type="datetime-local" name="DateD" id="DateD" class="form-control" value="{{ $tache->DateD }}" required>
                </div>
                <div class="form-group">
                    <label for="DateF">Date de fin:</label>
                    <input type="datetime-local" name="DateF" id="DateF" class="form-control" value="{{ $tache->DateF }}" required>
                </div>
                <div class="form-group">
                    <label for="Etat">Etat:</label>
                    <select name="Etat" id="Etat" class="form-control" required>
                        <!-- Add options for the etat values, and set the selected attribute for the corresponding value -->
                        <option value="Non programmé" {{ $tache->Etat === 'Non programmé' ? 'selected' : '' }}>Non programmé</option>
                        <option value="Programmé" {{ $tache->Etat === 'Programmé' ? 'selected' : '' }}>Programmé</option>
                        <option value="Dans les temps" {{ $tache->Etat === 'Dans les temps' ? 'selected' : '' }}>Dans les temps</option>
                        <option value="Hors piste" {{ $tache->Etat === 'Hors piste' ? 'selected' : '' }}>Hors piste</option>
                        <option value="En danger" {{ $tache->Etat === 'En danger' ? 'selected' : '' }}>En danger</option>
                        <option value="Terminer" {{ $tache->Etat === 'Terminer' ? 'selected' : '' }}>Terminer</option>
                        <option value="Fermé" {{ $tache->Etat === 'Fermé' ? 'selected' : '' }}>Fermé</option>
                        <option value="Autre" {{ $tache->Etat === 'Autre' ? 'selected' : '' }}>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="AutreEtat">Autre Etat:</label>
                    <input type="text" name="AutreEtat" id="AutreEtat" class="form-control" value="{{ $tache->Etat === 'Autre' ? $tache->AutreEtat : '' }}" @if($tache->Etat !== 'Autre') disabled @endif>
                </div>
                <div class="form-group">
                    <label for="Localisation">Localisation:</label>
                    <input type="text" name="Localisation" id="Localisation" class="form-control" value="{{ $tache->Localisation }}" required>
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select name="type" id="type" class="form-control" required>
                        <!-- Add options for the type values, and set the selected attribute for the corresponding value -->
                        <option value="Comptabilité et Finances" {{ $tache->type === 'Comptabilité et Finances' ? 'selected' : '' }}>Comptabilité et Finances</option>
                        <option value="Recherche et Développement" {{ $tache->type === 'Recherche et Développement' ? 'selected' : '' }}>Recherche et Développement</option>
                        <option value="Ressources humaines" {{ $tache->type === 'Ressources humaines' ? 'selected' : '' }}>Ressources humaines</option>
                        <option value="Production" {{ $tache->type === 'Production' ? 'selected' : '' }}>Production</option>
                        <option value="Marketing et Vente" {{ $tache->type === 'Marketing et Vente' ? 'selected' : '' }}>Marketing et Vente</option>
                        <option value="Achats" {{ $tache->type === 'Achats' ? 'selected' : '' }}>Achats</option>
                        <option value="Direction et Administration générale" {{ $tache->type === 'Direction et Administration générale' ? 'selected' : '' }}>Direction et Administration générale</option>
                        <option value="Technique" {{ $tache->type === 'Technique' ? 'selected' : '' }}>Technique</option>
                        <option value="Maintenance" {{ $tache->type === 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        <option value="Autre" {{ $tache->type === 'Autre' ? 'selected' : '' }}>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="AutreType">Autre Type:</label>
                    <input type="text" name="AutreType" id="AutreType" class="form-control" value="{{ $tache->type === 'Autre' ? $tache->AutreType : '' }}" @if($tache->type !== 'Autre') disabled @endif>
                </div>
                <div class="form-group">
                    <label for="Priorite">Priorité:</label>
                    <select name="Priorite" id="Priorite" class="form-control" required>
                        <!-- Add options for the priorite values, and set the selected attribute for the corresponding value -->
                        <option value="Bas" {{ $tache->Priorite === 'Bas' ? 'selected' : '' }}>Bas</option>
                        <option value="Modéré" {{ $tache->Priorite === 'Modéré' ? 'selected' : '' }}>Modéré</option>
                        <option value="Important" {{ $tache->Priorite === 'Important' ? 'selected' : '' }}>Important</option>
                        <option value="Critique" {{ $tache->Priorite === 'Critique' ? 'selected' : '' }}>Critique</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea name="Description" id="Description" class="form-control">{{ $tache->Description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Tache</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('type').addEventListener('change', function() {
        var autreTypeInput = document.getElementById('AutreType');
        if (this.value === 'Autre') {
            autreTypeInput.disabled = false;
        } else {
            autreTypeInput.disabled = true;
            autreTypeInput.value = '';
        }
    });

    document.getElementById('Etat').addEventListener('change', function() {
        var autreEtatInput = document.getElementById('AutreEtat');
        if (this.value === 'Autre') {
            autreEtatInput.disabled = false;
        } else {
            autreEtatInput.disabled = true;
            autreEtatInput.value = '';
        }
    });
</script>
@endsection
