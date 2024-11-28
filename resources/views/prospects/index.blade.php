@extends('theme.default')
@section('content')
<div class="container-fluid">
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Prospects List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gestionnaire du Prospect</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Titre</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Statut du Prospect</th>
                            <th>Chiffre d’affaires</th>
                            <th>Nombre d'employés</th>
                            <th>Address</th>
                            <th>Code postal</th>
                            <th>Fichier PDF</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prospects as $prospect)
                        <tr>
                            <td>{{ $prospect->GestionnaireDuProspect }}</td>
                            <td>{{ $prospect->Prénom }}</td>
                            <td>{{ $prospect->Nom }}</td>
                            <td>{{ $prospect->Titre }}</td>
                            <td>{{ $prospect->{'E-mail'} }}</td>
                            <td>{{ $prospect->Téléphone }}</td>
                            <td>{{ $prospect->StatutduProspect }}</td>
                            <td>{{ $prospect->ChiffreAffaires }}</td>
                            <td>{{ $prospect->Nbredemployes }}</td>
                            <td>{{ $prospect->Address }}</td>
                            <td>{{ $prospect->Codepostal }}</td>
                            <td>
                                @if($prospect->pdf_filename)
                                    <a href="{{ asset('storage/pdf/' . $prospect->pdf_filename) }}" download="{{ $prospect->pdf_filename }}">Télécharger le PDF</a>
                                @else
                                    Aucun fichier PDF
                                @endif
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('prospects.edit', ['prospect' => $prospect->id]) }}" class="btn btn-primary">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('prospects.destroy', ['prospect' => $prospect->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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
