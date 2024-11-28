@extends('theme.default')
@section('content')
<div class="container-fluid">
<div class="container-fluid">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('clients.create', ['id' => $id]) }}" class="btn btn-primary">Ajouter un nouveau client</a>
    </div>
    <!-- Your other content goes here -->
</div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Clients</h4>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>E-mail</th>
                            <th>Telephone</th>
                            <th>NomDuFournisseur</th>
                            <th>Département</th>
                            <th>Telecopie</th>
                            <th>Adresse</th>
                            <th>CodePostal</th>
                            <th>Description</th>
                            <th>GestionnaireDuContact</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($clients as $attribute)
                        <tr>
                       
                                <td>{{ $attribute->Nom }}</td>
                                <td>{{ $attribute->Prenom }}</td>
                                <td>{{ $attribute->{'E-mail'} }}</td>
                                <td>{{ $attribute->Telephone }}</td>
                                <td>{{ $attribute->NomDuFournisseur }}</td>
                                <td>{{ $attribute->Département }}</td>
                                <td>{{ $attribute->Telecopie }}</td>
                                <td>{{ $attribute->Adresse }}</td>
                                <td>{{ $attribute->CodePostal }}</td>
                                <td>{{ $attribute->Description }}</td>
                                <td>{{ $attribute->GestionnaireDuContact }}</td>

                           
                            <td> <a href="{{ route('activities.createForClient', ['client_id' => $attribute->id]) }}" class="btn btn-primary">Add Activity</a></td>
                            <td> <a href="{{ route('clients.show', ['id' => $attribute->id]) }}" class="btn btn-primary">details</a></td>
                                <td><a href="#">Modifier</a></td>
                            <td>
                                <form action="{{ route('clients.destroy', ['id' => $attribute->id , 'idd' => $attribute->idSecteur]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" data-delete-url="{{ route('clients.destroy', ['id' => $attribute->id , 'idd' => $attribute->idSecteur]) }}" onclick="confirmDelete(this)">Supprimer</button>
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
