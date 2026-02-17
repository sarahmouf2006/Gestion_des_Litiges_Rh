@extends('layouts.app')

@section('title', 'Profil Utilisateur')

@section('content')
<div class="profile-container">
    <!-- Profile Hero Section -->
    <div class="profile-hero">
        <div class="profile-hero-content">
            <div class="profile-avatar-large">
                <div class="avatar-circle">
                    <i class="fas fa-user"></i>
                </div>
                <div class="avatar-status online"></div>
            </div>
            <div class="profile-info">
                <h1>{{ $user->nom ?? 'Utilisateur' }}</h1>
                <p class="profile-role">{{ $grade }} • {{ $direction }}</p>
                <div class="profile-meta">
                    <span><i class="fas fa-id-card"></i> {{ $matricule }}</span>
                    <span><i class="fas fa-clock"></i> Dernière connexion: {{ $lastLogin }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Stats Grid - Add this section -->
<div class="stats-grid-modern">
    <div class="stat-card-modern">
        <div class="stat-icon blue">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-content">
            <span class="stat-label">Présences ce mois</span>
            <span class="stat-value">18</span>
            <span class="stat-trend positive">
                <i class="fas fa-arrow-up"></i> +12%
            </span>
        </div>
    </div>
    
    <div class="stat-card-modern">
        <div class="stat-icon green">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-content">
            <span class="stat-label">Documents</span>
            <span class="stat-value">24</span>
            <span class="stat-trend neutral">
                <i class="fas fa-minus"></i> stable
            </span>
        </div>
    </div>
    
    <div class="stat-card-modern">
        <div class="stat-icon orange">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <span class="stat-label">Congés restants</span>
            <span class="stat-value">15</span>
            <span class="stat-trend warning">
                <i class="fas fa-exclamation-triangle"></i> 5 jours
            </span>
        </div>
    </div>
    
    <div class="stat-card-modern">
        <div class="stat-icon purple">
            <i class="fas fa-tasks"></i>
        </div>
        <div class="stat-content">
            <span class="stat-label">Tâches en cours</span>
            <span class="stat-value">5</span>
            <span class="stat-trend">
                <i class="fas fa-clock"></i> 3 urgentes
            </span>
        </div>
    </div>
</div>

    <div class="profile-grid">
        <!-- Left Column -->
        <div class="profile-sidebar">
            <!-- Contact Card -->
            <div class="profile-card">
                <div class="card-icon blue">
                    <i class="fas fa-address-card"></i>
                </div>
                <h3>Contact</h3>
                <div class="contact-list">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <label>Email</label>
                            <span>{{ $user->email ?? 'Non défini' }}</span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <label>Téléphone</label>
                            <span>{{ $telephone_bureau ?: 'Non défini' }}</span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <label>Bureau</label>
                            <span>{{ $bureau ?: 'Non défini' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="profile-card actions">
                <h3>Actions Rapides</h3>
                <a href="{{ route('profile.change-password') }}" class="action-link">
                    <i class="fas fa-key"></i>
                    <span>Modifier mot de passe</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="{{ route('profile.two-factor') }}" class="action-link">
                    <i class="fas fa-shield-alt"></i>
                    <span>Double authentification</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="{{ route('profile.connection-history') }}" class="action-link">
                    <i class="fas fa-history"></i>
                    <span>Historique de connexion</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
        </div>

        <!-- Right Column -->
        <div class="profile-main">
            <!-- Professional Info -->
            <div class="profile-card main-card">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h2>Informations Professionnelles</h2>
                </div>
                
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="info-content">
                            <label>Nom complet</label>
                            <span>{{ $user->nom ?? 'À compléter' }}</span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-id-badge"></i>
                        </div>
                        <div class="info-content">
                            <label>Matricule RH</label>
                            <span>{{ $matricule }}</span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="info-content">
                            <label>Grade</label>
                            <span>{{ $grade }}</span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="info-content">
                            <label>Direction</label>
                            <span>{{ $direction }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Status -->
            <div class="profile-card main-card">
                <div class="card-header">
                    <div class="header-icon green">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h2>Sécurité du Compte</h2>
                </div>
                
                <div class="security-status">
                    <div class="status-item success">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <span class="status-title">Mot de passe</span>
                            <span class="status-desc">À jour • Modifié il y a 30 jours</span>
                        </div>
                    </div>
                    <div class="status-item warning">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <span class="status-title">Double authentification</span>
                            <span class="status-desc">Non activée • Recommandée</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Profile Page Styles */
.profile-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 30px;
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Hero Section - Modern Glassmorphism */
.profile-hero {
    background: linear-gradient(135deg, #0F2A4A 0%, #1a3a5a 50%, #0d2137 100%);
    border-radius: 24px;
    padding: 50px;
    margin-bottom: 40px;
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(15, 42, 74, 0.3);
}

.profile-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(100, 181, 246, 0.15) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 4s ease-in-out infinite;
}

.profile-hero::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -5%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
    border-radius: 50%;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 0.8; }
}


.profile-hero-content {
    display: flex;
    align-items: center;
    gap: 35px;
    position: relative;
    z-index: 1;
}

.profile-avatar-large {
    position: relative;
    transition: transform 0.3s ease;
}

.profile-avatar-large:hover {
    transform: scale(1.05);
}

.avatar-circle {
    width: 120px;
    height: 120px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    border: 4px solid rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}

.avatar-circle:hover {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.4);
    box-shadow: 0 12px 40px rgba(0,0,0,0.3);
}

.avatar-status {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 3px solid #0F2A4A;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

.avatar-status.online {
    background: linear-gradient(135deg, #4CAF50, #45a049);
    animation: pulseStatus 2s ease-in-out infinite;
}

@keyframes pulseStatus {
    0%, 100% { box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.4); }
    50% { box-shadow: 0 0 0 10px rgba(76, 175, 80, 0); }
}


.profile-info h1 {
    font-size: 2.4rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    letter-spacing: -0.5px;
}

.profile-role {
    font-size: 1.2rem;
    opacity: 0.95;
    margin-bottom: 20px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile-role::before {
    content: '';
    width: 8px;
    height: 8px;
    background: #D4AF37;
    border-radius: 50%;
    display: inline-block;
}

.profile-meta {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.profile-meta span {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.95rem;
    opacity: 0.9;
    background: rgba(255,255,255,0.1);
    padding: 8px 16px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.profile-meta span:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
}


/* Grid Layout */
.profile-grid {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 30px;
}

/* Cards - Modern Design */
.profile-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid rgba(233, 236, 239, 0.5);
    margin-bottom: 25px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.profile-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #0F2A4A, #64B5F6);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.profile-card:hover::before {
    transform: scaleX(1);
}

.profile-card h3 {
    font-size: 1.2rem;
    color: #0F2A4A;
    margin-bottom: 25px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}


.card-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.card-icon.blue {
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.2), rgba(100, 181, 246, 0.1));
    color: #64B5F6;
    box-shadow: 0 4px 15px rgba(100, 181, 246, 0.3);
}

.profile-card:hover .card-icon.blue {
    transform: scale(1.1) rotate(5deg);
}


/* Contact List - Modern */
.contact-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: 12px;
    transition: all 0.3s ease;
    background: #F8F9FA;
}

.contact-item:hover {
    background: white;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transform: translateX(-5px);
}

.contact-item > i {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #0F2A4A, #1a3a5a);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
    box-shadow: 0 4px 10px rgba(15, 42, 74, 0.3);
    transition: all 0.3s ease;
}

.contact-item:hover > i {
    transform: scale(1.1);
    box-shadow: 0 6px 15px rgba(15, 42, 74, 0.4);
}

.contact-item div {
    flex: 1;
}

.contact-item label {
    display: block;
    font-size: 0.8rem;
    color: #6C757D;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 5px;
    font-weight: 600;
}

.contact-item span {
    font-size: 1rem;
    color: #0F2A4A;
    font-weight: 600;
}


/* Action Links - Modern */
.profile-card.actions {
    padding: 25px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.action-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 20px;
    border-radius: 14px;
    color: #2C3E50;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-bottom: 12px;
    background: white;
    border: 1px solid #E9ECEF;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.action-link:last-child {
    margin-bottom: 0;
}

.action-link:hover {
    background: #0F2A4A;
    color: white;
    transform: translateX(-8px);
    box-shadow: 0 8px 25px rgba(15, 42, 74, 0.25);
    border-color: #0F2A4A;
}

.action-link i:first-child {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.15), rgba(100, 181, 246, 0.05));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64B5F6;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.action-link:hover i:first-child {
    background: rgba(255,255,255,0.2);
    color: white;
    transform: scale(1.1);
}

.action-link span {
    flex: 1;
    font-size: 1rem;
    font-weight: 600;
}

.action-link .fa-chevron-left {
    color: #ADB5BD;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.action-link:hover .fa-chevron-left {
    color: white;
    transform: translateX(-5px);
}


/* Main Cards - Enhanced */
.profile-card.main-card {
    padding: 0;
    overflow: hidden;
    border-radius: 20px;
}

.card-header {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 25px 30px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border-bottom: 1px solid #E9ECEF;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #0F2A4A, #1a3a5a);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    box-shadow: 0 4px 15px rgba(15, 42, 74, 0.3);
    transition: all 0.3s ease;
}

.profile-card:hover .header-icon {
    transform: rotate(10deg) scale(1.1);
}

.header-icon.green {
    background: linear-gradient(135deg, #28a745, #218838);
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.card-header h2 {
    font-size: 1.3rem;
    color: #0F2A4A;
    font-weight: 700;
    margin: 0;
}


/* Info Grid - Modern */
.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 30px;
    border-bottom: 1px solid #E9ECEF;
    transition: all 0.3s ease;
}

.info-item:hover {
    background: #F8F9FA;
}

.info-item:nth-last-child(-n+2) {
    border-bottom: none;
}

.info-item:nth-child(odd) {
    border-left: 1px solid #E9ECEF;
}

.info-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.15), rgba(100, 181, 246, 0.05));
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64B5F6;
    font-size: 1.4rem;
    transition: all 0.3s ease;
}

.info-item:hover .info-icon {
    transform: scale(1.1) rotate(5deg);
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.25), rgba(100, 181, 246, 0.1));
}

.info-content {
    flex: 1;
}

.info-content label {
    display: block;
    font-size: 0.85rem;
    color: #6C757D;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 6px;
    font-weight: 600;
}

.info-content span {
    font-size: 1.15rem;
    color: #0F2A4A;
    font-weight: 700;
}


/* Security Status - Enhanced */
.security-status {
    padding: 30px;
}

.status-item {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 22px;
    border-radius: 16px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.status-item:hover {
    transform: translateX(5px);
}

.status-item:last-child {
    margin-bottom: 0;
}

.status-item.success {
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.05));
    border-color: rgba(40, 167, 69, 0.2);
}

.status-item.success i {
    color: #28a745;
    font-size: 1.8rem;
    filter: drop-shadow(0 2px 4px rgba(40, 167, 69, 0.3));
}

.status-item.warning {
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05));
    border-color: rgba(255, 193, 7, 0.2);
}

.status-item.warning i {
    color: #ffc107;
    font-size: 1.8rem;
    filter: drop-shadow(0 2px 4px rgba(255, 193, 7, 0.3));
    animation: pulseWarning 2s ease-in-out infinite;
}

@keyframes pulseWarning {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.status-item div {
    flex: 1;
}

.status-title {
    display: block;
    font-weight: 700;
    color: #0F2A4A;
    margin-bottom: 5px;
    font-size: 1.05rem;
}

.status-desc {
    font-size: 0.95rem;
    color: #6C757D;
    font-weight: 500;
}


/* Enhanced Stats Grid for Profile */
.stats-grid-modern {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin: 30px 0;
}

.stat-card-modern {
    background: white;
    border-radius: 20px;
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 18px;
    border: 1px solid #E9ECEF;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    position: relative;
    overflow: hidden;
}

.stat-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, #64B5F6, #0F2A4A);
    transform: scaleY(0);
    transform-origin: top;
    transition: transform 0.3s ease;
}

.stat-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.stat-card-modern:hover::before {
    transform: scaleY(1);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.stat-icon.blue {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    color: #1976d2;
    box-shadow: 0 4px 15px rgba(25, 118, 210, 0.2);
}

.stat-icon.green {
    background: linear-gradient(135deg, #e8f5e8, #c8e6c9);
    color: #388e3c;
    box-shadow: 0 4px 15px rgba(56, 142, 60, 0.2);
}

.stat-icon.orange {
    background: linear-gradient(135deg, #fff3e0, #ffe0b2);
    color: #f57c00;
    box-shadow: 0 4px 15px rgba(245, 124, 0, 0.2);
}

.stat-icon.purple {
    background: linear-gradient(135deg, #f3e5f5, #e1bee7);
    color: #7b1fa2;
    box-shadow: 0 4px 15px rgba(123, 31, 162, 0.2);
}

.stat-card-modern:hover .stat-icon {
    transform: scale(1.15) rotate(10deg);
}

.stat-content {
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.85rem;
    color: #6C757D;
    margin-bottom: 8px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-value {
    display: block;
    font-size: 1.9rem;
    font-weight: 800;
    color: #0F2A4A;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-trend {
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 5px;
    font-weight: 600;
}

.stat-trend.positive {
    color: #28a745;
}

.stat-trend.warning {
    color: #f57c00;
}

.stat-trend.neutral {
    color: #6C757D;
}

/* Responsive */
@media (max-width: 1200px) {
    .stats-grid-modern {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .profile-grid {
        grid-template-columns: 1fr;
    }
    
    .profile-hero-content {
        flex-direction: column;
        text-align: center;
    }
    
    .profile-meta {
        justify-content: center;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .info-item:nth-child(odd) {
        border-left: none;
    }
    
    .info-item:not(:last-child) {
        border-bottom: 1px solid #E9ECEF;
    }
    
    .stats-grid-modern {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .profile-hero {
        padding: 30px;
        border-radius: 20px;
    }
    
    .profile-info h1 {
        font-size: 1.8rem;
    }
    
    .profile-container {
        padding: 15px;
    }
    
    .avatar-circle {
        width: 90px;
        height: 90px;
        font-size: 2.2rem;
    }
    
    .stats-grid-modern {
        grid-template-columns: 1fr;
    }
    
    .profile-card {
        padding: 20px;
    }
    
    .action-link {
        padding: 14px 16px;
    }
}

</style>
@endsection
