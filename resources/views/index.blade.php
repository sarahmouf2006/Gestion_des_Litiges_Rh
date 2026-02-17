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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background Shapes */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: float 25s infinite ease-in-out reverse;
            z-index: 0;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        /* Header */
        .main-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px 0;
            position: relative;
            z-index: 10;
        }

        .navbar-brand {
            color: white !important;
            font-size: 1.4rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand i {
            font-size: 1.8rem;
            background: linear-gradient(135deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

        /* Login Card - Glassmorphism */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 50px 40px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15), 
                        0 0 0 1px rgba(255, 255, 255, 0.3) inset;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
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

        /* Login Header */
        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3); }
            50% { box-shadow: 0 10px 40px rgba(102, 126, 234, 0.5); }
        }

        .login-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .login-header h2 {
            font-size: 1.9rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #6b7280;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .login-header p small {
            display: block;
            margin-top: 8px;
            color: #9ca3af;
            font-size: 0.85rem;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.95rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #dc2626;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #059669;
        }

        .alert i {
            font-size: 1.2rem;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .form-label i {
            color: #667eea;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            font-size: 1rem;
            background: #f9fafb;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .error {
            display: block;
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error::before {
            content: '\f071';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 0.8rem;
        }

        /* Submit Button */
        .btn-login {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            margin-bottom: 25px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        /* Extra Links */
        .extra-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .forgot-password {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #667eea;
        }

        .btn-create {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
            color: white;
        }

        /* Footer */
        .main-footer {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .main-footer p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .main-footer i {
            margin-right: 8px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 35px 25px;
                margin: 0 15px;
            }

            .login-header h2 {
                font-size: 1.6rem;
            }

            .extra-links {
                flex-direction: column;
                text-align: center;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-balance-scale"></i>
                <span>Gestion des Litiges RH</span>
            </a>
        </div>
    </header>

    <!-- Login Container -->
    <main class="main-content">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="fas fa-user-lock"></i>
                </div>
                <h2>Se connecter</h2>
                <p>Application Gestion des Litiges – Ressources Humaines<br>
                <small>Ministère de l'Éducation Nationale - Maroc</small></p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email
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

                <div class="form-group">
                    <label for="mot_de_passe" class="form-label">
                        <i class="fas fa-lock"></i>
                        Mot de passe
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

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Connexion
                </button>

                <div class="extra-links">
                    <a href="#" class="forgot-password">
                        <i class="fas fa-key"></i>
                        Mot de passe oublié ?
                    </a>
                    <a href="{{ route('register') }}" class="btn-create">
                        <i class="fas fa-user-plus"></i>
                        Créer un compte
                    </a>
                </div>
            </form>
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
