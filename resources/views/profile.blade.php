@extends('layouts.app')

@section('title', 'Profil Utilisateur')

@section('content')
<div class="profile-container">
    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-header-content">
            <div class="avatar-section">
                <div class="avatar-circle">
                    <i class="fas fa-user"></i>
                    <div class="status-badge online"></div>
                </div>
            </div>
            
            <div class="profile-info">
                <h1>{{ $user->nom ?? 'Utilisateur' }}</h1>
                <p class="profile-subtitle">{{ $grade }} • {{ $direction }}</p>
                
                <div class="profile-meta">
                    <span class="meta-tag">
                        <i class="fas fa-id-card"></i>
                        {{ $matricule }}
                    </span>
                    <span class="meta-tag">
                        <i class="fas fa-clock"></i>
                        Dernière connexion: {{ $lastLogin }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">18</span>
                <span class="stat-label">Présences ce mois</span>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 85%"></div>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">24</span>
                <span class="stat-label">Documents</span>
                <div class="progress-bar">
                    <div class="progress-fill green" style="width: 60%"></div>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fas fa-umbrella-beach"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">15</span>
                <span class="stat-label">Congés restants</span>
                <div class="progress-bar">
                    <div class="progress-fill orange" style="width: 40%"></div>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">5</span>
                <span class="stat-label">Tâches en cours</span>
                <div class="progress-bar">
                    <div class="progress-fill purple" style="width: 75%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="profile-content-grid">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <!-- Contact Card -->
            <div class="info-card">
                <h3><i class="fas fa-address-card"></i> Contact</h3>
                
                <div class="contact-list">
                    <div class="contact-row">
                        <div class="contact-icon email">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <small>Email</small>
                            <span>{{ $user->email ?? 'Non renseigné' }}</span>
                        </div>
                    </div>
                    
                    <div class="contact-row">
                        <div class="contact-icon phone">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <small>Téléphone</small>
                            <span>{{ $telephone_bureau ?? 'Non renseigné' }}</span>
                        </div>
                    </div>
                    
                    <div class="contact-row">
                        <div class="contact-icon location">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <small>Bureau</small>
                            <span>{{ $bureau ?? 'Non renseigné' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="info-card">
                <h3><i class="fas fa-bolt"></i> Actions Rapides</h3>
                
                <a href="{{ route('profile.change-password') }}" class="quick-action">
                    <div class="action-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <span>Modifier mot de passe</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                
                <a href="{{ route('profile.two-factor') }}" class="quick-action">
                    <div class="action-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Double authentification</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                
                <a href="{{ route('profile.connection-history') }}" class="quick-action">
                    <div class="action-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <span>Historique de connexion</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="quick-action logout-action w-100 border-0 bg-transparent text-start">
                        <div class="action-icon logout-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span>Déconnexion</span>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </form>
            </div>

        </div>

        <!-- Right Content -->
        <div class="main-content">
            <!-- Professional Info -->
            <div class="info-card">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h2>Informations Professionnelles</h2>
                </div>
                
                <div class="info-list">
                    <div class="info-row">
                        <div class="row-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="row-content">
                            <small>Nom complet</small>
                            <span>{{ $user->nom ?? 'À compléter' }}</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="row-icon">
                            <i class="fas fa-id-badge"></i>
                        </div>
                        <div class="row-content">
                            <small>Matricule RH</small>
                            <span class="highlight">{{ $matricule }}</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="row-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="row-content">
                            <small>Grade</small>
                            <span>{{ $grade }}</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="row-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="row-content">
                            <small>Direction</small>
                            <span>{{ $direction }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Status -->
            <div class="info-card">
                <div class="card-header">
                    <div class="header-icon green">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h2>Sécurité du Compte</h2>
                </div>
                
                <div class="security-list">
                    <div class="security-row secure">
                        <div class="security-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="security-content">
                            <span>Mot de passe</span>
                            <small>À jour • Modifié il y a 30 jours</small>
                        </div>
                        <span class="status-badge secure">Sécurisé</span>
                    </div>
                    
                    <div class="security-row warning">
                        <div class="security-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="security-content">
                            <span>Double authentification</span>
                            <small>Non activée • Recommandée</small>
                        </div>
                        <span class="status-badge warning">Activer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* ===== CLEAN MODERN PROFILE STYLES ===== */

.profile-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 30px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* Profile Header */
.profile-header {
    background: linear-gradient(135deg, #0F2A4A 0%, #1a3a5a 50%, #2C3E50 100%);
    border-radius: 24px;
    padding: 40px;
    margin-bottom: 30px;
    color: white;
    box-shadow: 0 10px 40px rgba(15, 42, 74, 0.3);
}

.profile-header-content {
    display: flex;
    align-items: center;
    gap: 30px;
}

.avatar-section {
    flex-shrink: 0;
}

.avatar-circle {
    width: 120px;
    height: 120px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #0F2A4A;
    position: relative;
    box-shadow: 0 8px 30px rgba(0,0,0,0.2);
}

.status-badge {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 3px solid white;
}

.status-badge.online {
    background: #10b981;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
    50% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
}

.profile-info h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.profile-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 20px;
}

.profile-meta {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.meta-tag {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.2);
    padding: 10px 18px;
    border-radius: 50px;
    font-size: 0.95rem;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.meta-tag:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-2px);
}

/* Stats Row */
.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

/* Modern Dark Grey for stat icons - not too dark */
.stat-icon.blue { background: linear-gradient(135deg, #4A5568, #5A6578); }
.stat-icon.green { background: linear-gradient(135deg, #10b981, #059669); }
.stat-icon.orange { background: linear-gradient(135deg, #f59e0b, #d97706); }
.stat-icon.purple { background: linear-gradient(135deg, #5A6578, #4A5568); }

.stat-info {
    flex: 1;
}

.stat-value {
    display: block;
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
    margin-bottom: 5px;
}

.stat-label {
    display: block;
    font-size: 0.9rem;
    color: #6b7280;
    margin-bottom: 10px;
}

.progress-bar {
    height: 6px;
    background: #e5e7eb;
    border-radius: 3px;
    overflow: hidden;
}

/* Modern Dark Grey for progress bars */
.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #4A5568, #5A6578);
    border-radius: 3px;
    transition: width 0.5s ease;
}

.progress-fill.green { background: linear-gradient(90deg, #10b981, #059669); }
.progress-fill.orange { background: linear-gradient(90deg, #f59e0b, #d97706); }
.progress-fill.purple { background: linear-gradient(90deg, #5A6578, #4A5568); }

/* Main Grid */
.profile-content-grid {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 25px;
}

/* Cards */
.info-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid #e5e7eb;
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.info-card:hover {
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.info-card h3 {
    font-size: 1.2rem;
    color: #1f2937;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
}

.info-card h3 i {
    color: #D4AF37;
}

/* Card Header */
.card-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e5e7eb;
}

/* Modern Dark Grey for header icons */
.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #4A5568, #5A6578);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #D4AF37;
    font-size: 1.3rem;
}

.header-icon.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.card-header h2 {
    font-size: 1.3rem;
    color: #1f2937;
    font-weight: 600;
}

/* Contact List */
.contact-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.contact-row {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #f9fafb;
    border-radius: 14px;
    transition: all 0.3s ease;
}

.contact-row:hover {
    background: #f3f4f6;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transform: translateX(-5px);
}

.contact-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* Modern Dark Grey for email icon */
.contact-icon.email { background: linear-gradient(135deg, #4A5568, #5A6578); }
.contact-icon.phone { background: linear-gradient(135deg, #10b981, #059669); }
.contact-icon.location { background: linear-gradient(135deg, #f59e0b, #d97706); }

.contact-details {
    flex: 1;
}

.contact-details small {
    display: block;
    font-size: 0.75rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 3px;
}

.contact-details span {
    font-size: 1rem;
    color: #1f2937;
    font-weight: 600;
}

/* Quick Actions */
.quick-action {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px;
    background: #f9fafb;
    border-radius: 14px;
    margin-bottom: 12px;
    text-decoration: none;
    color: #374151;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.quick-action:last-child {
    margin-bottom: 0;
}

/* Modern Dark Grey for hover - perfect shade, not too dark */
.quick-action:hover {
    background: linear-gradient(135deg, #4A5568, #5A6578);
    color: white;
    transform: translateX(-8px);
    box-shadow: 0 8px 25px rgba(74, 85, 104, 0.3);
}

.action-icon {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #4A5568;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.quick-action:hover .action-icon {
    background: rgba(255,255,255,0.2);
    color: white;
    transform: scale(1.1);
}

.quick-action span {
    flex: 1;
    font-weight: 600;
}

.quick-action .fa-chevron-left {
    color: #9ca3af;
    transition: all 0.3s ease;
}

.quick-action:hover .fa-chevron-left {
    color: white;
    transform: translateX(-5px);
}

/* Logout Button Specific Styles */
.logout-action {
    color: #dc2626;
}

.logout-action .logout-icon {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #dc2626;
}

.logout-action:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
}

.logout-action:hover .logout-icon {
    background: rgba(255,255,255,0.2);
    color: white;
}

.logout-action:hover .fa-chevron-left {
    color: white;
}

/* Info List */
.info-list {
    display: flex;
    flex-direction: column;
}

.info-row {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 20px;
    border-bottom: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.info-row:last-child {
    border-bottom: none;
}

.info-row:hover {
    background: #f9fafb;
    border-radius: 12px;
    margin: 0 -10px;
    padding: 20px 30px;
}

/* Modern Dark Grey for row icons */
.row-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, rgba(74, 85, 104, 0.1), rgba(90, 101, 120, 0.1));
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #4A5568;
    font-size: 1.3rem;
    transition: all 0.3s ease;
}

/* Modern Dark Grey for hover */
.info-row:hover .row-icon {
    background: linear-gradient(135deg, #4A5568, #5A6578);
    color: #D4AF37;
    transform: scale(1.1) rotate(5deg);
}

.row-content {
    flex: 1;
}

.row-content small {
    display: block;
    font-size: 0.8rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}

.row-content span {
    font-size: 1.1rem;
    color: #1f2937;
    font-weight: 600;
}

/* Modern Dark Grey for highlight text */
.row-content span.highlight {
    background: linear-gradient(90deg, #4A5568, #5A6578);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Security List */
.security-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.security-row {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 20px;
    border-radius: 16px;
    transition: all 0.3s ease;
}

.security-row.secure {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.security-row.warning {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.08), rgba(245, 158, 11, 0.04));
    border: 1px solid rgba(245, 158, 11, 0.2);
}

.security-row:hover {
    transform: translateX(5px);
}

.security-icon {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.security-row.secure .security-icon {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.security-row.warning .security-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    animation: iconPulse 2s infinite;
}

@keyframes iconPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.security-content {
    flex: 1;
}

.security-content span {
    display: block;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 5px;
    font-size: 1.05rem;
}

.security-content small {
    color: #6b7280;
    font-size: 0.9rem;
}

.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.secure {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.status-badge.warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    animation: badgePulse 2s infinite;
}

@keyframes badgePulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
    50% { box-shadow: 0 0 0 10px rgba(245, 158, 11, 0); }
}

/* Responsive */
@media (max-width: 1200px) {
    .stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .profile-content-grid {
        grid-template-columns: 320px 1fr;
    }
}

@media (max-width: 992px) {
    .profile-content-grid {
        grid-template-columns: 1fr;
    }
    
    .profile-header-content {
        flex-direction: column;
        text-align: center;
    }
    
    .profile-meta {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .profile-container {
        padding: 15px;
    }
    
    .stats-row {
        grid-template-columns: 1fr;
    }
    
    .profile-header {
        padding: 25px;
    }
    
    .profile-info h1 {
        font-size: 1.8rem;
    }
    
    .avatar-circle {
        width: 90px;
        height: 90px;
        font-size: 2.2rem;
    }
}
</style>
@endsection
