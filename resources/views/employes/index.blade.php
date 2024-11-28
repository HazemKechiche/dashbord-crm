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
                                      <th>Nom</th>
                                      <th>Prénom</th>
                                      <th>Téléphone</th>
                                      <th>E-mail</th>
                                      <th>Poste</th>
                                      <th>Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach ($employes as $item)
                                
  
                                    <tbody>
                                        <tr>
                                                <td>{{ $item->nom }}</td>
                                                <td>{{ $item->prenom }}</td>
                                                <td>{{ $item->Telephone }}</td>
                                                <td>{{ $item->{"E-mail"} }}</td>
                                                <td>{{ $item->Poste }}</td>
                                                <td>
                        <!-- Delete Button -->
                        <form action="{{ route('employes.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        
                        <!-- Update Button -->
                        <a href="{{ route('employes.edit', ['id' => $item->id]) }}" class="btn btn-primary">Update</a>
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