@extends('layouts.app')

@section('title', 'Profil Utilisateur')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header Section -->
            <div class="card-modern mb-4">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <div class="profile-avatar">
                            <i class="fas fa-user-circle fa-4x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h1 class="mb-2">Profil Utilisateur</h1>
                        <p class="text-muted mb-0">Bienvenue dans votre espace personnel</p>
                    </div>
                    <div class="col-md-2 text-end">
                        <small class="text-muted">Dernière connexion: {{ $lastLogin }}</small>
                    </div>
                </div>
            </div>

            <!-- Professional Identity Section -->
            <div class="card-modern mb-4">
                <div class="card-header-custom">
                    <h3 class="mb-0">
                        <i class="fas fa-user-tie me-2 text-primary"></i>
                        Identité Professionnelle
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="profile-field">
                                <label class="profile-label">Nom complet</label>
                                <div class="profile-value">{{ $user->nom ?? 'À compléter' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-field">
                                <label class="profile-label">Matricule RH</label>
                                <div class="profile-value">{{ $matricule }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-field">
                                <label class="profile-label">Grade</label>
                                <div class="profile-value">{{ $grade }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-field">
                                <label class="profile-label">Direction</label>
                                <div class="profile-value">{{ $direction }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="profile-field">
                                <label class="profile-label">Email professionnel</label>
                                <div class="profile-value">{{ $user->email ?? 'À compléter' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Contact Section -->
            <div class="card-modern mb-4">
                <div class="card-header-custom">
                    <h3 class="mb-0">
                        <i class="fas fa-phone me-2 text-success"></i>
                        Contact de travail
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="profile-field">
                                <label class="profile-label">Téléphone bureau</label>
                                <div class="profile-value">{{ $telephone_bureau ?: 'Non défini' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-field">
                                <label class="profile-label">Bureau</label>
                                <div class="profile-value">{{ $bureau ?: 'Non défini' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div class="card-modern mb-4">
                <div class="card-header-custom">
                    <h3 class="mb-0">
                        <i class="fas fa-shield-alt me-2 text-warning"></i>
                        Sécurité
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="profile-field">
                                <label class="profile-label">Dernière connexion</label>
                                <div class="profile-value">{{ $lastLogin }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('profile.change-password') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-key me-2"></i>
                                Modifier mot de passe
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('profile.two-factor') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-mobile-alt me-2"></i>
                                Gérer la double authentification
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Connection History Section -->
            <div class="card-modern">
                <div class="card-body text-center">
                    <a href="{{ route('profile.connection-history') }}" class="btn btn-info btn-lg">
                        <i class="fas fa-history me-2"></i>
                        Voir mon historique de connexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-avatar {
    margin-bottom: 1rem;
}

.card-header-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem;
    border-radius: 0.5rem 0.5rem 0 0 !important;
    margin: -1rem -1rem 1rem -1rem;
}

.profile-field {
    margin-bottom: 1.5rem;
}

.profile-label {
    display: block;
    font-weight: 600;
    color: #6c757d;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.profile-value {
    font-size: 1.1rem;
    font-weight: 500;
    color: #495057;
    padding: 0.5rem 0;
    border-bottom: 1px solid #e9ecef;
}

.card-modern {
    border: none;
    border-radius: 0.75rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: box-shadow 0.15s ease-in-out;
}

.card-modern:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.btn {
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.15s ease-in-out;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15);
}
</style>
@endsection
