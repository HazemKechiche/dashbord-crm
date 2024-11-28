@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Taches List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gestionnaire de tache</th>
                            <th>Date d'échéance</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Etat</th>
                            <th>Localisation</th>
                            <th>Type</th>
                            <th>Priorité</th>
                            <th>Description</th>
                            <th> employees <th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($taches as $tache)
                        <tbody>
                            <tr>
                                <td>{{ $tache->Gestionnairedetache }}</td>
                                <td>{{ $tache->DatedEcheance }}</td>
                                <td>{{ $tache->DateD }}</td>
                                <td>{{ $tache->DateF }}</td>
                                <td>{{ $tache->Etat }}</td>
                                <td>{{ $tache->Localisation }}</td>
                                <td>{{ $tache->type }}</td>
                                <td>{{ $tache->Priorite }}</td>
                                <td>{{ $tache->Description }}</td>
                               
                            <td>
                            <a href="{{ route('taches.employes', ['tache' => $tache->id]) }}" class="btn btn-primary">Voir les employés</a>
                            </td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('taches.destroy', ['id' => $tache->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    <!-- Update Button -->
                                    <a href="{{ route('taches.edit', ['id' => $tache->id]) }}" class="btn btn-primary">Update</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
