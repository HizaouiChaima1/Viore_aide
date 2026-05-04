<x-auth-session-status class="mb-4" :status="session('status')" />

<!DOCTYPE html>
<html lang="fr" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Administration | Slims</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('slims.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    
    <style>
        :root {
            --primary-brand: #E31E24;
            --dark-brand: #1a1a1a;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --transition-smooth: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            font-family: 'Public Sans', sans-serif;
            overflow-x: hidden;
            background: #fff;
        }

        h1, h2, h3, .app-brand-text {
            font-family: 'Outfit', sans-serif;
        }

        /* Partie Gauche : On ne change RIEN à la photo */
        .auth-cover-bg {
            background-color: #fff !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Partie Droite : On applique le style "Non-Admin" */
        .auth-form-side {
            position: relative;
            overflow: hidden;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Mesh Gradient spécifique au côté droit */
        .side-mesh-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            background-image: 
                radial-gradient(at 0% 0%, rgba(227, 30, 36, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(227, 30, 36, 0.08) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(227, 30, 36, 0.04) 0px, transparent 50%);
            filter: blur(40px);
            animation: mesh-float 20s ease-in-out infinite alternate;
        }

        @keyframes mesh-float {
            0% { transform: scale(1) translate(0, 0); }
            100% { transform: scale(1.05) translate(2%, 1%); }
        }

        .glass-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.1);
        }

        .logo-img {
            height: 40px;
            width: auto;
            margin-bottom: 1rem;
        }

        .welcome-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark-brand);
            margin-bottom: 0.3rem;
        }

        .welcome-subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #475569;
            margin-bottom: 0.4rem;
            display: block;
        }

        .input-container {
            position: relative;
            margin-bottom: 1rem;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            z-index: 5;
        }

        .input-custom {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.8rem;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid transparent;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: var(--transition-smooth);
        }

        .input-custom:focus {
            outline: none;
            border-color: var(--primary-brand);
            background: #fff;
            box-shadow: 0 8px 16px rgba(227, 30, 36, 0.08);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            z-index: 5;
        }

        .btn-submit {
            width: 100%;
            padding: 0.9rem;
            background: var(--dark-brand);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-smooth);
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background: var(--primary-brand);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(227, 30, 36, 0.2);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #94a3b8;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider::before { margin-right: 1rem; }
        .divider::after { margin-left: 1rem; }

        .social-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }

        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.7rem;
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            background: #fff;
            color: #475569;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .social-button:hover {
            background: #f8fafc;
            transform: translateY(-1px);
        }

        @media (max-width: 991px) {
            .glass-card { margin: 1rem; }
        }
    </style>
</head>

<body>
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            
            <!-- PARTIE GAUCHE (PHOTO INTACTE) -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg w-100">
                    <img src="{{ asset('Orderfood.png') }}" alt="Admin" class="img-fluid my-5 auth-illustration" width="600">
                </div>
            </div>

            <!-- PARTIE DROITE (DESIGN COMME NON-ADMIN) -->
            <div class="d-flex col-12 col-lg-5 align-items-center auth-form-side p-sm-5 p-4">
                <!-- Fond Mesh uniquement sur la droite -->
                <div class="side-mesh-bg"></div>

                <div class="glass-card">
                    <div class="text-center">
                        <img src="{{ asset('slims.png') }}" alt="Slims" class="logo-img">
                    </div>

                    <h3 class="welcome-title text-center">Espace Admin</h3>
                    <p class="welcome-subtitle text-center">Connectez-vous pour gérer Slims 👋</p>

                    <form action="{{ route('admin.authenticate') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-container">
                                <i class="ti ti-mail input-icon"></i>
                                <input type="email" name="email" class="input-custom" placeholder="votre@email.com" value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <div class="input-container">
                                <i class="ti ti-lock input-icon"></i>
                                <input id="password" type="password" name="password" class="input-custom" placeholder="••••••••" required>
                                <i class="ti ti-eye password-toggle" id="togglePassword"></i>
                            </div>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                            <label class="form-check-label text-muted" for="remember-me">Se souvenir de moi</label>
                        </div>

                        <button type="submit" class="btn-submit">
                            Connexion Administration
                        </button>
                    </form>

                    @if (session('error'))
                        <div class="alert alert-danger mt-3 py-2 small">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="divider">ou</div>

                    <div class="social-grid">
                        <a href="#" class="social-button">
                            <i class="fa-brands fa-facebook-f text-primary"></i>
                            Facebook
                        </a>
                        <a href="#" class="social-button">
                            <i class="fa-brands fa-google text-danger"></i>
                            Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                const password = $('#password');
                const type = password.attr('type') === 'password' ? 'text' : 'password';
                password.attr('type', type);
                $(this).toggleClass('ti-eye ti-eye-off');
            });
        });
    </script>
</body>
</html>
