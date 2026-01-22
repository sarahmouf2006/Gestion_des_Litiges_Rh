@extends('layouts.app')

@section('title', 'Créer un Litige')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card-modern">
                <h2 class="text-center mb-4">
                    <i class="fas fa-plus-circle me-2"></i>Créer un nouveau litige
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Erreurs détectées :</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('litiges.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre :</label>
                        <input type="text" 
                               id="titre" 
                               name="titre" 
                               class="form-control" 
                               value="{{ old('titre') }}" 
                               required
                               placeholder="Entrez le titre du litige">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea id="description" 
                                  name="description" 
                                  class="form-control" 
                                  required
                                  placeholder="Décrivez le litige en détail">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut :</label>
                        <input type="text" 
                               id="statut" 
                               name="statut" 
                               class="form-control" 
                               value="{{ old('statut') }}" 
                               required
                               placeholder="Statut du litige">
                    </div>

                    <div class="mb-3">
                        <label for="attribue_a" class="form-label">Attribué à :</label>
                        <input type="text" 
                               id="attribue_a" 
                               name="attribue_a" 
                               class="form-control" 
                               value="{{ old('attribue_a') }}"
                               placeholder="Nom de la personne responsable">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
