<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Gestion des Litiges RH') - Ministère de l'Éducation Nationale</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Google Fonts - Arabic & French Support -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
    @stack('styles')
</head>
<body>

    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo-brand" href="{{ route('dashboard') }}">
                    <i class="fas fa-balance-scale me-2"></i>
                    <span>Gestion des Litiges RH</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-home me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jugements.index') }}">
                                <i class="fas fa-gavel me-1"></i> Jugement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">
                                <i class="fas fa-user me-1"></i> Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('support') }}">
                                <i class="fas fa-headset me-1"></i> Support
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <!-- Section À propos -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="fas fa-info-circle me-2"></i>À propos
                            </h5>
                            <p class="footer-text">
                                Application de gestion des litiges RH développée spécialement pour le Département des Ressources Humaines et Formation des Cadres du Ministère de l'Éducation Nationale.
                            </p>
                            <div class="footer-logo">
                                <i class="fas fa-balance-scale fa-2x"></i>
                                <span>Gestion des Litiges RH</span>
                            </div>
                        </div>
                    </div>

                    <!-- Section Liens rapides -->
                    <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="fas fa-link me-2"></i>Liens rapides
                            </h5>
                            <ul class="footer-links">
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        <i class="fas fa-chevron-left me-2"></i>Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('jugements.index') }}">
                                        <i class="fas fa-chevron-left me-2"></i>Gestion des Jugements
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile') }}">
                                        <i class="fas fa-chevron-left me-2"></i>Mon Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('support') }}">
                                        <i class="fas fa-chevron-left me-2"></i>Support
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('jugements.create') }}">
                                        <i class="fas fa-chevron-left me-2"></i>Nouveau Dossier
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Section Contact -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="fas fa-address-card me-2"></i>Contact
                            </h5>
                            <ul class="footer-contact">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Ministère de l'Éducation Nationale<br>
                                    Avenue Allal Ben Abdellah<br>
                                    Rabat, Maroc</span>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <span>+212 XXX XXX XXX</span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span>contact@education.gov.ma</span>
                                </li>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    <span>Lun - Ven: 8h00 - 17h00</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Section Réseaux sociaux & Newsletter -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="fas fa-share-alt me-2"></i>Suivez-nous
                            </h5>
                            <p class="footer-text mb-3">
                                Restez connecté avec nous sur les réseaux sociaux pour les dernières actualités et mises à jour.
                            </p>
                            <div class="social-links">
                                <a href="#" class="social-link" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link" title="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="social-link" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="newsletter mt-4">
                                <h6 class="mb-2">
                                    <i class="fas fa-bell me-2"></i>Newsletter
                                </h6>
                                <p class="footer-text small mb-2">Recevez les dernières actualités</p>
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-sm" placeholder="Votre email">
                                    <button class="btn btn-primary btn-sm" type="button">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">
                            <i class="fas fa-shield-alt me-2"></i>
                            © 2025 - Application Gestion des Litiges RH | Tous droits réservés
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0">
                            <i class="fas fa-graduation-cap me-2"></i>
                            Ministère de l'Éducation Nationale - Royaume du Maroc
                        </p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-center">
                        <div class="footer-legal-links">
                            <a href="#">Politique de confidentialité</a>
                            <span class="separator">|</span>
                            <a href="#">Conditions d'utilisation</a>
                            <span class="separator">|</span>
                            <a href="#">Mentions légales</a>
                            <span class="separator">|</span>
                            <a href="#">Plan du site</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>
</html>
