@extends('theme.default')
@section('content')
<div class="container-fluid">
    <h2>Employés associés à la tâche "{{ $tache->Gestionnairedetache }}"</h2>
    <form action="{{ route('taches.assign', $tache->id) }}" method="POST">
        @csrf
        <select name="employees[]" class="form-control" required>
            @foreach ($employesDisponibles as $employe)
                <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Assigner</button>
    </form>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>E-mail</th>
                <th>Poste</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->Telephone }}</td>
                    <td>{{ $employe->{"E-mail"} }}</td>
                    <td>{{ $employe->Poste }}</td>
                    <td>
                        <form action="{{ route('taches.disassociate', ['tache' => $tache->id, 'employe' => $employe->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
