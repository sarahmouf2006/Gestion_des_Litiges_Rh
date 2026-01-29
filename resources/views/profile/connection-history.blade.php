@extends('layouts.app')

@section('title', 'Historique de connexion')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-modern">
                <div class="card-header-custom">
                    <h3 class="mb-0">
                        <i class="fas fa-history me-2"></i>
                        Historique de connexion
                    </h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Historique de vos connexions :</strong><br>
                        Voici la liste de vos dernières connexions à l'application. Pour des raisons de sécurité, seules les 10 dernières connexions sont affichées.
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="fas fa-calendar me-2"></i>Date & Heure</th>
                                    <th><i class="fas fa-globe me-2"></i>Adresse IP</th>
                                    <th><i class="fas fa-desktop me-2"></i>Appareil</th>
                                    <th><i class="fas fa-map-marker-alt me-2"></i>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($connectionHistory as $connection)
                                <tr>
                                    <td>
                                        <i class="fas fa-clock me-2 text-muted"></i>
                                        {{ $connection['date'] }}
                                    </td>
                                    <td>
                                        <code>{{ $connection['ip'] }}</code>
                                    </td>
                                    <td>
                                        <i class="fas fa-mobile-alt me-2 text-primary"></i>
                                        {{ $connection['device'] }}
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>Réussie
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('profile') }}" class="btn btn-primary">
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

.table th {
    border-top: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
}

.btn {
    border-radius: 0.5rem;
    font-weight: 500;
}

.badge {
    font-size: 0.75rem;
}
</style>
@endsection
