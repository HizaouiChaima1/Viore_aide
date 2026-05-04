<!doctype html>
<html lang="fr" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Partenariat | Viore Digital</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('slims.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&family=Outfit:wght@400;600;800&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />

    <style>
        :root {
            --primary-brand: #E31E24;
            --primary-light: #ffebec;
            --dark-brand: #1a1a1a;
            --glass-bg: rgba(255, 255, 255, 0.75);
            --glass-border: rgba(255, 255, 255, 0.4);
            --transition-smooth: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            font-family: 'Public Sans', sans-serif;
            margin: 0;
            padding: 1rem;
            min-height: 100vh;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        /* Fixed Background Container to prevent overflow */
        .bg-fixed-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        /* Creative Mesh Gradient Background */
        .mesh-bg {
            position: absolute;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background-color: #fff;
            background-image:
                radial-gradient(at 0% 0%, rgba(227, 30, 36, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(26, 26, 26, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(227, 30, 36, 0.08) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(26, 26, 26, 0.06) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(227, 30, 36, 0.04) 0px, transparent 50%);
            filter: blur(60px);
            animation: mesh-float 20s ease-in-out infinite alternate;
        }

        @keyframes mesh-float {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(2%, 2%) scale(1.05);
            }
        }

        h1,
        h2,
        h3,
        .app-brand-text {
            font-family: 'Outfit', sans-serif;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 780px;
            padding: 0.5rem;
            z-index: 1;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 1.25rem 2rem;
            box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.1);
            transition: var(--transition-smooth);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .logo-img {
            height: 40px;
            width: auto;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.05));
        }

        .header-section {
            text-align: center;
            margin-bottom: 1.2rem;
        }

        .welcome-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark-brand);
            letter-spacing: -0.5px;
            margin-bottom: 0.15rem;
        }

        .welcome-subtitle {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Form Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 0.4rem;
        }

        .form-label {
            display: block;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #475569;
            margin-bottom: 0.4rem;
            padding-left: 0.2rem;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: #94a3b8;
            font-size: 1rem;
            transition: var(--transition-smooth);
        }

        .input-custom {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.5rem;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--dark-brand);
            transition: var(--transition-smooth);
        }

        .input-custom::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .input-custom:focus {
            outline: none;
            background: #fff;
            border-color: var(--primary-brand);
            box-shadow: 0 8px 16px -4px rgba(227, 30, 36, 0.1);
        }

        .input-custom:focus+.input-icon {
            color: var(--primary-brand);
        }

        select.input-custom {
            appearance: none;
            cursor: pointer;
        }

        .form-actions {
            max-width: 400px;
            margin: 0 auto;
        }

        .btn-submit {
            width: 100%;
            padding: 0.75rem;
            background: var(--dark-brand);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
            margin: 1rem 0;
            color: #94a3b8;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        .social-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.65rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #fff;
            color: #475569;
            font-weight: 600;
            font-size: 0.8rem;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .social-button:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .footer-text {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.8rem;
            color: #64748b;
        }

        .footer-text a {
            color: var(--primary-brand);
            text-decoration: none;
            font-weight: 800;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.4;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary-brand);
            top: -100px;
            right: -100px;
            filter: blur(100px);
        }

        .shape-2 {
            width: 400px;
            height: 400px;
            background: var(--dark-brand);
            bottom: -150px;
            left: -150px;
            filter: blur(120px);
        }

        .alert-custom {
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .auth-wrapper {
                max-width: 460px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 1rem 0;
            }

            .auth-wrapper {
                padding: 1rem;
            }

            .glass-card {
                padding: 1.25rem;
                border-radius: 20px;
            }

            .shape {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Background Elements -->
    <div class="bg-fixed-container">
        <div class="mesh-bg"></div>
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="auth-wrapper">
        <div class="glass-card">
            <!-- Logo -->
            <div class="logo-section">
                <a href="https://vioredigital.com/">
                    <img src="{{ asset('logo viore.png') }}" alt="Logo" class="logo-img">
                </a>
            </div>

            <div class="header-section">
                <h2 class="welcome-title">Bienvenue sur Slims Digital 🚀</h2>
                <p class="welcome-subtitle">Devenez partenaire et boostez votre activité</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-custom">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('msg'))
                <div class="alert alert-danger alert-custom">
                    {{ session('msg') }}
                </div>
            @endif

            <form id="formAuthentication" action="{{ route('restaurant.store') }}" method="POST">
                @csrf
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="customerName" class="form-label">Nom et Prénom</label>
                        <div class="input-container">
                            <i class="ti ti-user input-icon"></i>
                            <input type="text" class="input-custom" id="customerName" name="customerName"
                                placeholder="Votre nom complet" value="{{ old('customerName') }}" required autofocus />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomrestau" class="form-label">Nom du Restaurant</label>
                        <div class="input-container">
                            <i class="ti ti-building-store input-icon"></i>
                            <input type="text" class="input-custom" id="nomrestau" name="nomrestau"
                                placeholder="Nom de votre établissement" value="{{ old('nomrestau') }}" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customerContact" class="form-label">Numéro de Téléphone</label>
                        <div class="input-container">
                            <i class="ti ti-phone input-icon"></i>
                            <input type="tel" class="input-custom" id="customerContact" name="customerContact"
                                 placeholder="Votre numéro de contact" value="{{ old('customerContact') }}" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customerEmail" class="form-label">Adresse Email</label>
                        <div class="input-container">
                            <i class="ti ti-mail input-icon"></i>
                            <input type="email" class="input-custom" id="customerEmail" name="customerEmail"
                                placeholder="nom@exemple.com" value="{{ old('customerEmail') }}" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customerAddress1" class="form-label">Adresse du Restaurant</label>
                        <div class="input-container">
                            <i class="ti ti-map-pin input-icon"></i>
                            <input type="text" class="input-custom" id="customerAddress1" name="customerAddress1"
                                placeholder="Localisation de votre restaurant" value="{{ old('customerAddress1') }}" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pays" class="form-label">Pays</label>
                        <div class="input-container">
                            <i class="ti ti-world input-icon"></i>
                            <select id="pays" name="pays" class="input-custom" required>
                                <option value="" disabled selected>Sélectionnez votre pays</option>
                                <option value="Tunisia" {{ old('pays') == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                                <option value="France" {{ old('pays') == 'France' ? 'selected' : '' }}>France</option>
                                <option value="Germany" {{ old('pays') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                <option value="Canada" {{ old('pays') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                <option value="United States" {{ old('pays') == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="United Arab Emirates" {{ old('pays') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                <option value="Italy" {{ old('pays') == 'Italy' ? 'selected' : '' }}>Italy</option>
                                <option value="Spain" {{ old('pays') == 'Spain' ? 'selected' : '' }}>Spain</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        Envoyer ma demande
                    </button>
                    
                    <div class="divider">ou nous suivre sur</div>

                    <div class="social-grid">
                        <a href="https://www.facebook.com/viore.digital" class="social-button">
                            <i class="fa-brands fa-facebook-f text-primary"></i>
                            Facebook
                        </a>
                        <a href="https://vioredigital.com/" class="social-button">
                            <i class="fa-brands fa-google text-danger"></i>
                            Site Web
                        </a>
                    </div>

                    <p class="footer-text">
                        Déjà partenaire ? <a href="{{ route('login') }}">Se connecter</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
</body>

</html>