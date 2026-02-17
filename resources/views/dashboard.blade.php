@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<!-- Welcome Header -->
<div class="welcome-header">
    <div class="welcome-text">
        <h1>Tableau de Bord</h1>
        <p class="lead">Bienvenue, <strong>{{ auth()->user()->name ?? 'Administrateur' }}</strong>. Gestion des litiges RH en temps réel.</p>
    </div>
    <div class="date-display">
        <div class="current-date">{{ now()->format('l, d F Y') }}</div>
        <div class="current-time">{{ now()->format('H:i') }}</div>
    </div>
</div>

<div class="dashboard-grid">
    <!-- ========== RIGHT SIDEBAR - QUICK ACTIONS ========== -->
    <aside class="sidebar-left">
        <div class="sidebar-content">
            <div class="sidebar-section">
                <h4 class="sidebar-title">
                    <i class="fas fa-bolt"></i>
                    🚀 Actions Rapides
                </h4>
                <div class="quick-actions">
                    <a href="{{ route('litiges.create') }}?type=منازعة" class="action-btn">
                        <i class="fas fa-file-contract"></i>
                        Nouveau Litige
                    </a>
                    <a href="{{ route('litiges.create') }}?type=التظلم" class="action-btn">
                        <i class="fas fa-comment-medical"></i>
                        Nouveau Témoignage
                    </a>
                    <a href="{{ route('litiges.create') }}?type=حكم قضائي" class="action-btn">
                        <i class="fas fa-balance-scale"></i>
                        Nouveau Jugement
                    </a>
                    <a href="{{ route('litiges.index') }}" class="action-btn">
                        <i class="fas fa-search"></i>
                        Rechercher Dossier
                    </a>
                    <a href="{{ route('profile') }}" class="action-btn">
                        <i class="fas fa-user-cog"></i>
                        Mon Profil
                    </a>
                    <a href="{{ route('support') }}" class="action-btn">
                        <i class="fas fa-headset"></i>
                        Support
                    </a>
                </div>
            </div>

            <div class="sidebar-section">
                <h4 class="sidebar-title">
                    <i class="fas fa-filter"></i>
                    🔍 Filtres Rapides
                </h4>
                <div class="quick-actions">
                    <a href="{{ route('litiges.index') }}?status=urgent" class="action-btn">
                        <i class="fas fa-exclamation-circle"></i>
                        Dossiers Urgents
                    </a>
                    <a href="{{ route('litiges.index') }}?status=en_cours" class="action-btn">
                        <i class="fas fa-clock"></i>
                        En Cours
                    </a>
                    <a href="{{ route('litiges.index') }}?status=resolu" class="action-btn">
                        <i class="fas fa-check-circle"></i>
                        Résolus
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- ========== MAIN CONTENT AREA (LEFT SIDE) ========== -->
    <main class="main-content-area">

        <!-- Search Bar -->
        <div class="search-section">
            <form action="{{ route('litiges.index') }}" method="GET" class="search-form">
                <div class="search-input-group">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text"
                           name="search"
                           class="search-input"
                           placeholder="Rechercher par: nom, numéro de dossier, type, statut..."
                           value="{{ request('search') }}">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-gavel"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalLitiges }}</div>
                    <div class="stat-label">Total Litiges</div>
                    <div class="stat-trend positive">
                        <i class="fas fa-arrow-up"></i> En temps réel
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $enCours }}</div>
                    <div class="stat-label">En Cours</div>
                    <div class="stat-trend warning">
                        <i class="fas fa-arrow-right"></i> Non exécutés
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $resolus }}</div>
                    <div class="stat-label">Résolus</div>
                    <div class="stat-trend positive">
                        <i class="fas fa-arrow-up"></i> Exécutés
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $enRetard }}</div>
                    <div class="stat-label">En Retard</div>
                    <div class="stat-trend negative">
                        <i class="fas fa-arrow-down"></i> Date dépassée
                    </div>
                </div>
            </div>
        </div>


        <!-- Recent Litiges Table -->
        <div class="content-card">
            <div class="card-header">
                <h3>
                    <i class="fas fa-history me-2"></i>
                    Litiges Récents
                </h3>
                <a href="{{ route('litiges.index') }}" class="view-all-link">
                    Voir tous
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>N° Dossier</th>
                            <th>Nom & Prénom</th>
                            <th>Type</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentLitiges as $litige)
                        <tr>
                            <td class="fw-bold">#{{ $litige->{'رقم تأجير'} ?? 'N/A' }}</td>
                            <td>{{ $litige->{'الاسم و النسب'} ?? 'N/A' }}</td>
                            <td>
                                <span class="badge badge-{{ 
                                    $litige->{'نوع السجل'} == 'منازعة' ? 'primary' : 
                                    ($litige->{'نوع السجل'} == 'التظلم' ? 'warning' : 'info') 
                                }}">
                                    {{ $litige->{'نوع السجل'} ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-{{ $litige->{'منفذة أو غير منفذة'} ? 'success' : 'warning' }}">
                                    {{ $litige->{'منفذة أو غير منفذة'} ? 'Résolu' : 'En cours' }}
                                </span>
                            </td>
                            <td>{{ $litige->{'تاريخ التسوية'} ? \Carbon\Carbon::parse($litige->{'تاريخ التسوية'})->format('d/m/Y') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('litiges.edit', $litige->id) }}" class="btn-icon" title="Éditer">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                <p class="text-muted">Aucun litige trouvé</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </main>
</div>





@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update current time every minute
    function updateTime() {
        const now = new Date();
        const timeElement = document.querySelector('.current-time');
        if (timeElement) {
            timeElement.textContent = now.toLocaleTimeString('fr-FR', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    }

    updateTime();
    setInterval(updateTime, 60000);
});
</script>
@endpush

@endsection
