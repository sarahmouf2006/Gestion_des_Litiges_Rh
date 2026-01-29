@extends('layouts.app')

@section('title', 'Modifier le mot de passe')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card-modern">
                <div class="card-header-custom">
                    <h3 class="mb-0">
                        <i class="fas fa-key me-2"></i>
                        Modifier le mot de passe
                    </h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.change-password.post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-lock me-2"></i>Mot de passe actuel
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="current_password"
                                   name="current_password"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-key me-2"></i>Nouveau mot de passe
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   name="password"
                                   required
                                   minlength="6">
                            <div class="form-text">Le mot de passe doit contenir au moins 6 caractères.</div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-key me-2"></i>Confirmer le nouveau mot de passe
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('profile') }}" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-arrow-left me-2"></i>Retour au profil
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Modifier le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card-header-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem;
    border-radius: 0.5rem 0.5rem 0 0 !important;
    margin: -1rem -1rem 1rem -1rem;
}

.card-modern {
    border: none;
    border-radius: 0.75rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.btn {
    border-radius: 0.5rem;
    font-weight: 500;
}
</style>
@endsection
