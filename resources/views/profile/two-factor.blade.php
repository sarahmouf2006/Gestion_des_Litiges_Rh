@extends('layouts.app')

@section('title', 'Double authentification')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card-modern">
                <div class="card-header-custom">
                    <h3 class="mb-0">
                        <i class="fas fa-mobile-alt me-2"></i>
                        Double authentification
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

                    <div class="text-center mb-4">
                        <div class="mb-3">
                            @if($twoFactorEnabled)
                                <i class="fas fa-shield-alt fa-4x text-success"></i>
                                <h4 class="mt-3 text-success">Activée</h4>
                                <p class="text-muted">La double authentification est actuellement activée pour votre compte.</p>
                            @else
                                <i class="fas fa-shield-alt fa-4x text-warning"></i>
                                <h4 class="mt-3 text-warning">Désactivée</h4>
                                <p class="text-muted">La double authentification n'est pas activée pour votre compte.</p>
                            @endif
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle me-2"></i>À propos de la double authentification</h6>
                        <p class="mb-0">La double authentification ajoute une couche de sécurité supplémentaire à votre compte en exigeant un code de vérification en plus de votre mot de passe.</p>
                    </div>

                    <form method="POST" action="{{ route('profile.two-factor.post') }}">
                        @csrf
                        <div class="d-grid gap-2">
                            @if($twoFactorEnabled)
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-times me-2"></i>
                                    Désactiver la double authentification
                                </button>
                            @else
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-check me-2"></i>
                                    Activer la double authentification
                                </button>
                            @endif
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('profile') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Retour au profil
                        </a>
                    </div>
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
