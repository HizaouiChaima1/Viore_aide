<x-auth-session-status class="mb-4" :status="session('status')" />

<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Register | Viore Digital</title>

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
            padding: 2rem 1rem;
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
            max-width: 440px;
            padding: 1rem;
            z-index: 1;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 1.25rem 1.75rem;
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.1);
            transition: var(--transition-smooth);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 0.8rem;
        }

        .logo-img {
            height: 40px;
            width: auto;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.05));
        }

        .header-section {
            text-align: center;
            margin-bottom: 0.8rem;
        }

        .welcome-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--dark-brand);
            letter-spacing: -0.5px;
            margin-bottom: 0.1rem;
        }

        .welcome-subtitle {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 0.7rem;
        }

        .form-label {
            display: block;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #475569;
            margin-bottom: 0.4rem;
            padding-left: 0.25rem;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1.1rem;
            color: #94a3b8;
            font-size: 1rem;
            transition: var(--transition-smooth);
        }

        .input-custom {
            width: 100%;
            padding: 0.6rem 1rem 0.6rem 2.6rem;
            background: rgba(255, 255, 255, 0.6);
            border: 1.5px solid rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 10px 20px -5px rgba(227, 30, 36, 0.15);
        }

        .input-custom:focus+.input-icon {
            color: var(--primary-brand);
        }

        .password-toggle {
            position: absolute;
            right: 1.25rem;
            color: #94a3b8;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .password-toggle:hover {
            color: var(--dark-brand);
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
            margin-top: 0.4rem;
        }

        .btn-submit:hover {
            background: var(--primary-brand);
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(227, 30, 36, 0.25);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 0.8rem 0;
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
            margin-right: 1.5rem;
        }

        .divider::after {
            margin-left: 1.5rem;
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
            border: 1.5px solid rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            background: #fff;
            color: #475569;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .social-button:hover {
            border-color: #e2e8f0;
            background: #f8fafc;
            transform: translateY(-2px);
        }

        .footer-text {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        .footer-text a {
            color: var(--primary-brand);
            text-decoration: none;
            font-weight: 800;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Floating shapes for extra creativity */
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

        @media (max-width: 576px) {
            body {
                padding: 1rem 0;
            }

            .auth-wrapper {
                padding: 1rem;
            }

            .glass-card {
                padding: 1.5rem;
                border-radius: 24px;
            }

            .welcome-title {
                font-size: 1.5rem;
            }

            .shape {
                display: none;
            }

            /* Hide floating shapes on mobile for cleaner look */
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
                    <img src="{{ asset('slims.png') }}" alt="Logo" class="logo-img">
                </a>
            </div>

            <div class="header-section">
                <h2 class="welcome-title">Join us</h2>
                <p class="welcome-subtitle">Create your Slims account 👋</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Name :</label>
                    <div class="input-container">
                        <i class="ti ti-user input-icon"></i>
                        <input id="name" type="text" name="name" class="input-custom" placeholder="Enter your username"
                            value="{{ old('name') }}" required autofocus autocomplete="name">
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email :</label>
                    <div class="input-container">
                        <i class="ti ti-mail input-icon"></i>
                        <input id="email" type="email" name="email" class="input-custom" placeholder="Enter your email"
                            value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password :</label>
                    <div class="input-container">
                        <i class="ti ti-lock input-icon"></i>
                        <input id="password" type="password" name="password" class="input-custom" placeholder="••••••••"
                            required autocomplete="new-password">
                        <i class="ti ti-eye password-toggle toggle-password" data-target="#password"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmation -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password :</label>
                    <div class="input-container">
                        <i class="ti ti-lock-check input-icon"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input-custom"
                            placeholder="Confirm your password" required autocomplete="new-password">
                        <i class="ti ti-eye password-toggle toggle-password" data-target="#password_confirmation"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" class="btn-submit">
                    {{ __('Register') }}
                </button>
            </form>

            <div class="divider">or</div>

            <div class="social-grid">
                <a href="https://www.facebook.com/viore.digital/" class="social-button">
                    <i class="fa-brands fa-facebook-f text-primary"></i>
                    Facebook
                </a>
                <a href="https://vioredigital.com/" class="social-button">
                    <i class="fa-brands fa-google text-danger"></i>
                    Google
                </a>
            </div>

            <p class="footer-text">
                Already have an account? <a href="{{ route('login') }}">Sign in instead</a>
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.toggle-password').on('click', function () {
                const target = $($(this).data('target'));
                const type = target.attr('type') === 'password' ? 'text' : 'password';
                target.attr('type', type);
                $(this).toggleClass('ti-eye ti-eye-off');
            });
        });
    </script>
</body>

</html>
