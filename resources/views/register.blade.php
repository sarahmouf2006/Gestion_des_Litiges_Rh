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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --dark-blue: #0F2A4A;
            --medium-blue: #2C3E50;
            --light-gray: #F8F9FA;
            --border-gray: #E9ECEF;
            --text-dark: #2C3E50;
            --text-light: #6C757D;
            --white: #FFFFFF;
            --gold: #D4AF37;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #0F2A4A 0%, #1a3a5a 50%, #2C3E50 100%);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* Subtle Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
            z-index: 0;
            pointer-events: none;
        }

        /* Header */
        .main-header {
            background: rgba(15, 42, 74, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 15px 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-size: 1.4rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            color: var(--gold);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--gold) !important;
        }

        .nav-link i {
            color: var(--gold);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
            z-index: 5;
        }

        /* Register Card - Professional Design */
        .register-card {
            background: var(--white);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(15, 42, 74, 0.15), 
                        0 0 0 1px rgba(15, 42, 74, 0.05) inset;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
            border-top: 4px solid var(--gold);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Register Header */
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0F2A4A, #2C3E50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 25px rgba(15, 42, 74, 0.25);
        }

        .register-icon i {
            font-size: 2.2rem;
            color: var(--gold);
        }

        .register-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 8px;
        }

        .register-header p {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .register-header p small {
            display: block;
            margin-top: 5px;
            color: var(--text-light);
            font-size: 0.8rem;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: #fee2e2;
            color: #dc2626;
            border-right: 4px solid #dc2626;
        }

        .alert i {
            font-size: 1.1rem;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 0.85rem;
        }

        .form-label i {
            color: var(--dark-blue);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border-gray);
            border-radius: 12px;
            font-size: 0.95rem;
            background: var(--light-gray);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--dark-blue);
            background: white;
            box-shadow: 0 0 0 4px rgba(15, 42, 74, 0.08);
        }

        .form-control::placeholder {
            color: var(--text-light);
        }

        select.form-control {
            appearance: auto;
            padding-right: 30px;
        }

        .error {
            display: block;
            color: #dc2626;
            font-size: 0.8rem;
            margin-top: 6px;
        }

        /* Submit Button */
        .btn-register {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #0F2A4A, #2C3E50);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(15, 42, 74, 0.25);
            margin: 25px 0;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 42, 74, 0.35);
        }

        /* Extra Links */
        .extra-links {
            text-align: center;
        }

        .btn-login-link {
            background: var(--dark-blue);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(15, 42, 74, 0.2);
        }

        .btn-login-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(15, 42, 74, 0.3);
            color: white;
            background: #1a3a5a;
        }

        /* Footer */
        .main-footer {
            background: rgba(15, 42, 74, 0.95);
            backdrop-filter: blur(10px);
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
            z-index: 10;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        .main-footer p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .main-footer i {
            margin-right: 8px;
            color: var(--gold);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-card {
                padding: 30px 20px;
                margin: 0 15px;
            }

            .register-header h2 {
                font-size: 1.5rem;
            }

            .row {
                flex-direction: column;
            }

            .col-md-6 {
                width: 100%;
            }
        }
    </style>
</head>


<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-balance-scale"></i>
                    <span>Gestion des Litiges RH</span>
                </a>
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>
                    Connexion
                </a>
            </div>
        </div>
    </header>

    <!-- Register Container -->
    <main class="main-content">
        <div class="register-card">
            <div class="register-header">
                <div class="register-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2>Créer un compte</h2>
                <p>Application Gestion des Litiges – Ressources Humaines<br>
                <small>Ministère de l'Éducation Nationale - Maroc</small></p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">

                @csrf

                <div class="form-group">
                    <label for="nom" class="form-label">
                        <i class="fas fa-user"></i>
                        Nom complet
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

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           class="form-control"
                           placeholder="Votre email professionnel"
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Professional Identity Fields -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="matricule" class="form-label">
                                <i class="fas fa-id-card"></i>
                                Matricule RH
                            </label>
                            <input id="matricule"
                                   type="text"
                                   name="matricule"
                                   class="form-control"
                                   placeholder="Votre matricule RH"
                                   value="{{ old('matricule') }}">
                            @error('matricule')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="grade" class="form-label">
                                <i class="fas fa-user-tie"></i>
                                Grade
                            </label>
                            <input id="grade"
                                   type="text"
                                   name="grade"
                                   class="form-control"
                                   placeholder="Votre grade"
                                   value="{{ old('grade') }}">
                            @error('grade')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="direction" class="form-label">
                        <i class="fas fa-building"></i>
                        Direction
                    </label>
                    <select id="direction" name="direction" class="form-control">
                        <option value="DRH & Formation des Cadres" {{ old('direction') == 'DRH & Formation des Cadres' ? 'selected' : '' }}>DRH & Formation des Cadres</option>
                        <option value="Direction Régionale" {{ old('direction') == 'Direction Régionale' ? 'selected' : '' }}>Direction Régionale</option>
                        <option value="Direction Provinciale" {{ old('direction') == 'Direction Provinciale' ? 'selected' : '' }}>Direction Provinciale</option>
                        <option value="Autre" {{ old('direction') == 'Autre' ? 'selected' : '' }}>Autre</option>
                    </select>
                    @error('direction')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Work Contact Fields -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone_bureau" class="form-label">
                                <i class="fas fa-phone"></i>
                                Téléphone bureau
                            </label>
                            <input id="telephone_bureau"
                                   type="tel"
                                   name="telephone_bureau"
                                   class="form-control"
                                   placeholder="05XX-XXXXXX"
                                   value="{{ old('telephone_bureau') }}">
                            @error('telephone_bureau')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bureau" class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Bureau
                            </label>
                            <input id="bureau"
                                   type="text"
                                   name="bureau"
                                   class="form-control"
                                   placeholder="Numéro de bureau"
                                   value="{{ old('bureau') }}">
                            @error('bureau')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mot_de_passe" class="form-label">
                                <i class="fas fa-lock"></i>
                                Mot de passe
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mot_de_passe_confirmation" class="form-label">
                                <i class="fas fa-lock"></i>
                                Confirmer
                            </label>
                            <input id="mot_de_passe_confirmation" 
                                   type="password" 
                                   name="mot_de_passe_confirmation" 
                                   class="form-control" 
                                   placeholder="Confirmez" 
                                   required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    Créer le compte
                </button>
            </form>

            <div class="extra-links">
                <a href="{{ route('login') }}" class="btn-login-link">
                    <i class="fas fa-sign-in-alt"></i>
                    Déjà un compte ? Connectez-vous
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p>
                <i class="fas fa-shield-alt"></i>
                © 2025 - Application Gestion des Litiges RH | Ministère de l'Éducation Nationale - Maroc
            </p>
        </div>
    </footer>


    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
