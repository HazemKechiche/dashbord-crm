@extends('theme.clientMap')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="map" style="width: 100%; height: 500px;"></div>
            <div class="card mt-4">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Propositions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($proposals as $proposal)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">{{ $proposal->title }}</h6>
                                            <form action="{{ route('proposals.destroy', ['client_id' => $proposal->client_id, 'proposal_id' => $proposal->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <p>Description: {{ $proposal->description }}</p>
                                            @if ($proposal->presentation_file_content)
                                                <p>Présentation File: <a href="{{ asset('storage/pdf/' . $proposal->presentation_file_content) }}" target="_blank" download="{{ $proposal->presentation_file_content }}">View File</a></p>
                                            @else
                                                <p>Présentation File: Not available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
        <a href="{{ route('proposals.create', ['client_id' => $client->id]) }}" class="btn btn-primary">Add New</a>
    </div>
                       
                    </div>
                </div>
            </div>
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

        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">{{ $client->Nom }} {{ $client->Prenom }}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Client Details</h5>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> {{ $client->{'E-mail'} }}</li>
                        <li><strong>Phone:</strong> {{ $client->Telephone }}</li>
                    </ul>
                </div>
            </div>
           

            <div class="mt-4">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Activities</h5>
                    </div>
                    <div class="card-body">
                        @foreach($activity as $activity)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $activity->title }}</h5>
                                    <p class="card-text"><strong>Type:</strong> {{ ucfirst($activity->type) }}</p>
                                    <p class="card-text"><strong>Date and Time:</strong> {{ $activity->date_time }}</p>
                                    @if ($activity->description)
                                        <p class="card-text"><strong>Description:</strong> {{ $activity->description }}</p>
                                    @endif
                                    @if ($activity->prospect)
                                        <p class="card-text"><strong>Prospect:</strong> {{ $activity->prospect->name }}</p>
                                    @endif
                                    @if ($activity->client)
                                        <p class="card-text"><strong>Client:</strong> {{ $activity->client->Nom }}</p>
                                    @endif
                                </div>
                                <div class="card-footer text-muted text-right">
                                    <small>{{ $activity->created_at->format('M d, Y') }}</small>
                                    <form action="{{ route('activity.destroy', $activity->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
        <a href="{{ route('activities.createForClient', ['client_id' => $client->id]) }}" class="btn btn-primary">Add New</a>
    </div>
                </div>
            </div>
            <div class="mt-4">
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Scripts</h5>
        </div>
        <div class="card-body">
            @foreach($coms as $t)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>Subject: {{ $t->subject }}</p>
                        <p>Content: {{ $t->content }}</p>
                    </div>
                    <div class="card-footer text-muted text-right">
                        <form action="{{ route('communication_templates.destroy', $t->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
        <a href="{{ route('communication_templates.create', ['client_id' => $client->id]) }}" class="btn btn-primary">Add New</a>
    </div>
        </div>
    </div>
</div>


            
            <div class="mt-4">
                <!-- Empty space for better layout balance -->
            </div>
        </div>
    </div>
</div>

<script>
    // Your map script here
</script>
@endsection
