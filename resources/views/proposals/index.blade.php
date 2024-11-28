@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($proposals as $proposal)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $proposal->title }}</h6>
                        <form action="{{ route('proposals.destroy', ['client_id' => $client_id, 'proposal_id' => $proposal->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <p>Description: {{ $proposal->description }}</p>
                        @if ($proposal->presentation_file_content)
                            <p>Présentation File: <a href="{{ asset('storage/pdf/' . $proposal->presentation_file_content) }}" target="_blank"download="{{ $proposal->presentation_file_content }}">View File</a></p>
                        @else
                            <p>Présentation File: Not available</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
