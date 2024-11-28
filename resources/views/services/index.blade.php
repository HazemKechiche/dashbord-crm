@extends('theme.default')
@section('content')
<div class="container-fluid">
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Secteur </h6>
       
            <div class="card-body">
        <!-- Your card content goes here -->
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('services.create') }}" class="btn btn-primary">Créer un nouveau secteur</a>
    </div>
    
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom du Secteur</th>
                            <th>Client</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{ $service->nom}}</td>
                            <td><a href="{{ route('clients.index', ['id' => $service->id]) }}">Clients</a></td>
                            <td><a href="{{ route('services.edit', ['id' => $service->id]) }}">Modifier</a></td>
                            
                            <td>
                            <form action="{{ route('services.destroy', ['id' => $service->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" data-delete-url="{{ route('services.destroy', ['id' => $service->id]) }}" onclick="confirmDelete(this)">Supprimer</button>

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
