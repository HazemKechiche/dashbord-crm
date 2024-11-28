@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom Reunion</th>
                            <th>Emplacement</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Hôte</th>
                            <th>Rappel</th>
                            <th>Participant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reunions as $reunion)
                            <tr>
                                <td>{{ $reunion->nomReunion }}</td>
                                <td>{{ $reunion->Emplacement }}</td>
                                <td>{{ $reunion->dateD }}</td>
                                <td>{{ $reunion->dateF }}</td>
                                <td>{{ $reunion->Hote }}</td>
                                <td>{{ $reunion->Rappel }}</td>
                                <td> <a href="{{ route('reunion.employes', ['reunion' => $reunion->id]) }}" class="btn btn-primary">Voir les Participant</a></td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('reunions.destroy', ['reunion' => $reunion->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>

                                    <!-- Update Button -->
                                    <a href="{{ route('reunions.edit', ['reunion' => $reunion->id]) }}"
                                        class="btn btn-primary">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
