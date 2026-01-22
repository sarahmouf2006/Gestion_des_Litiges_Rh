<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un compte | Gestion des Litiges RH</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo-brand" href="#">
                    <i class="fas fa-balance-scale me-2"></i>
                    <span>Gestion des Litiges RH</span>
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>Connexion
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Register Container -->
    <main class="main-content">
        <div class="form-container">
            <div class="text-center mb-4">
                <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                <h2>Créer un compte</h2>
                <p class="subtitle">Application Gestion des Litiges – Ressources Humaines<br>
                <small class="text-muted">Ministère de l'Éducation Nationale - Maroc</small></p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}" class="login-form">
                @csrf

                <div class="mb-3">
                    <label for="nom" class="form-label">
                        <i class="fas fa-user me-2"></i>Nom complet :
                    </label>
                    <input id="nom" 
                           type="text" 
                           name="nom" 
                           class="form-control" 
                           placeholder="Votre nom complet" 
                           value="{{ old('nom') }}" 
                           required>
                    @error('nom')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email :
                    </label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="Votre email" 
                           value="{{ old('email') }}" 
                           required>
                    @error('email')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">
                        <i class="fas fa-lock me-2"></i>Mot de passe :
                    </label>
                    <input id="mot_de_passe" 
                           type="password" 
                           name="mot_de_passe" 
                           class="form-control" 
                           placeholder="Mot de passe" 
                           required>
                    @error('mot_de_passe')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mot_de_passe_confirmation" class="form-label">
                        <i class="fas fa-lock me-2"></i>Confirmer le mot de passe :
                    </label>
                    <input id="mot_de_passe_confirmation" 
                           type="password" 
                           name="mot_de_passe_confirmation" 
                           class="form-control" 
                           placeholder="Confirmez le mot de passe" 
                           required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    <i class="fas fa-user-plus me-2"></i>Créer le compte
                </button>
            </form>

            <div class="extra-links text-center">
                <a href="{{ route('login') }}" class="btn-create">
                    <i class="fas fa-sign-in-alt me-1"></i>Déjà un compte ? Connectez-vous
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        © 2025 - Application Gestion des Litiges RH
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        <i class="fas fa-graduation-cap me-2"></i>
                        Ministère de l'Éducation Nationale - Maroc
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

