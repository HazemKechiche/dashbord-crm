@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($affaires as $affaire)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $affaire->NomAffaire }}</h6>
                        <form action="{{ route('affaires.destroy', $affaire->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <p>Gestionnaire de l'Affaire: {{ $affaire->GestionnaireAffaire }}</p>
                        <p>Nom du Client: {{ $affaire->NomClient }}</p>
                        <p>Type: {{ $affaire->Type }}</p>
                        <p>Origine du Prospect: {{ $affaire->OrigineProspect }}</p>
                        <p>Montant: {{ $affaire->Montant }} €</p>
                        <p>Date d'échéance: {{ $affaire->DateEcheance }}</p>
                        <p>Étape: {{ $affaire->Etape }}</p>
                        <p>Chiffre d'affaires: € {{ number_format($affaire->ChiffreAffaires, 2, ',', ' ') }}</p>
                        <p>Description Attendue: {{ $affaire->DescriptionAttendue }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection