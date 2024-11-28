@extends('theme.default')
@section('content')
<div class="container-fluid">
    <!-- Add Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Employee</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('employes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom:</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="E-mail" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="poste">Poste:</label>
                    <input type="text" name="Poste" id="poste" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone:</label>
                    <input type="text" name="Telephone" id="telephone" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Employee</button>
            </form>
        </div>
    </div>

  
</div>
@endsection