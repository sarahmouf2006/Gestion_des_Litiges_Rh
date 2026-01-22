<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion | Gestion des Litiges RH</title>
    
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
            </div>
        </nav>
    </header>

    <!-- Login Container -->
    <main class="main-content">
        <div class="form-container">
            <div class="text-center mb-4">
                <i class="fas fa-user-lock fa-3x text-primary mb-3"></i>
                <h2>Se connecter</h2>
                <p class="subtitle">Application Gestion des Litiges – Ressources Humaines<br>
                <small class="text-muted">Ministère de l'Éducation Nationale - Maroc</small></p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="login-form">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email :
                    </label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="Entrez votre email" 
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
                           placeholder="Entrez votre mot de passe" 
                           required>
                    @error('mot_de_passe')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    <i class="fas fa-sign-in-alt me-2"></i>Connexion
                </button>

                <div class="extra-links">
                    <a href="#" class="forgot-password">
                        <i class="fas fa-key me-1"></i>Mot de passe oublié ?
                    </a>
                    <a href="{{ route('register') }}" class="btn-create">
                        <i class="fas fa-user-plus me-1"></i>Créer un compte
                    </a>
                </div>
            </form>
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
