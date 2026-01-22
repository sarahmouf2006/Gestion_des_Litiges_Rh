@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card-modern">
                <div class="text-center mb-4">
                    <div class="mb-3">
                        <i class="fas fa-user-circle fa-5x text-primary"></i>
                    </div>
                    <h2>Profil de {{ session('user_nom') ?? 'Utilisateur' }}</h2>
                    <p class="subtitle">Informations de votre compte</p>
                </div>

                <div class="card-modern bg-light">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user fa-2x text-primary me-3"></i>
                                <div>
                                    <strong class="d-block text-muted small">Nom complet</strong>
                                    <span class="fs-5">{{ session('user_nom') ?? 'Non défini' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope fa-2x text-info me-3"></i>
                                <div>
                                    <strong class="d-block text-muted small">Email</strong>
                                    <span class="fs-5">{{ session('user_email') ?? 'Non défini' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-tag fa-2x text-success me-3"></i>
                                <div>
                                    <strong class="d-block text-muted small">Rôle</strong>
                                    <span class="badge bg-primary fs-6">{{ session('user_role') ?? 'Utilisateur' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier le Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
