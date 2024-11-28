@extends('theme.default')   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nouvelle Proposition</div>

                <div class="card-body">
                    <form action="{{ route('proposals.store', ['client_id' => $client_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="presentation_file">Fichier de présentation (PDF/PPT/PPTX)</label>
                            <input type="file" name="presentation_file" id="presentation_file" class="form-control-file" accept=".pdf,.ppt,.pptx" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer Proposition</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
