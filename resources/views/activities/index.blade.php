@extends('theme.default')

@section('content')
    <div class="container-fluid">
        <h1>Activities</h1>

        <div class="row">
            @forelse ($activities as $activity)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                    <form action="{{ route('activity.destroy', $activity->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                        <div class="card-body">
                            <h4 class="card-title">{{ $activity->title }}</h4>
                            <hr>
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
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info">No activities found.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
