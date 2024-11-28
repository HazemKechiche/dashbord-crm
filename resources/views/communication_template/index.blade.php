@extends('theme.default')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($communicationTemplates as $template)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $template->type }}</h6>
                        <form action="{{ route('communication_templates.destroy', $template->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <p>Subject: {{ $template->subject }}</p>
                        <p>Content: {{ $template->content }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
