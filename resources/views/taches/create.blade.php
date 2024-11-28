@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- Add Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Tache</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('taches.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Gestionnairedetache">Gestionnaire de tache:</label>
                    <input type="text" name="Gestionnairedetache" value="{{ Auth::user()->name }}"id="Gestionnairedetache" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="DatedEcheance">Date d'échéance:</label>
                    <input type="date" name="DatedEcheance" id="DatedEcheance" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="DateD">Date de début:</label>
                    <input type="datetime-local" name="DateD" id="DateD" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="DateF">Date de fin:</label>
                    <input type="datetime-local" name="DateF" id="DateF" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Etat">Etat:</label>
                    <select name="Etat" id="Etat" class="form-control" required>
                        <option value="Non programmé">Non programmé</option>
                        <option value="Programmé">Programmé</option>
                        <option value="Dans les temps">Dans les temps</option>
                        <option value="Hors piste">Hors piste</option>
                        <option value="En danger">En danger</option>
                        <option value="Terminer">Terminer</option>
                        <option value="Fermé">Fermé</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="AutreEtat">Autre Etat:</label>
                    <input type="text" name="AutreEtat" id="AutreEtat" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="Localisation">Localisation:</label>
                    <input type="text" name="Localisation" id="Localisation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="Comptabilité et Finances">Comptabilité et Finances</option>
                        <option value="Recherche et Développement">Recherche et Développement</option>
                        <option value="Ressources humaines">Ressources humaines</option>
                        <option value="Production">Production</option>
                        <option value="Marketing et Vente">Marketing et Vente</option>
                        <option value="Achats">Achats</option>
                        <option value="Direction et Administration générale">Direction et Administration générale</option>
                        <option value="Technique">Technique</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="AutreType">Autre Type:</label>
                    <input type="text" name="AutreType" id="AutreType" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="Priorite">Priorité:</label>
                    <select name="Priorite" id="Priorite" class="form-control" required>
                        <option value="Bas">Bas</option>
                        <option value="Modéré">Modéré</option>
                        <option value="Important">Important</option>
                        <option value="Critique">Critique</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea name="Description" id="Description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Tache</button>
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
