<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Locação de Cassetes</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
                line-height: 1.6;
                color: #1a1a1a;
                background: #fafafa;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                padding: 20px;
            }

            @media (prefers-color-scheme: dark) {
                body {
                    background: #0a0a0a;
                    color: #e5e5e5;
                }
            }

            header {
                display: flex;
                justify-content: flex-end;
                gap: 16px;
                margin-bottom: 40px;
            }

            header a {
                padding: 8px 16px;
                border: 1px solid #e0e0e0;
                border-radius: 6px;
                text-decoration: none;
                color: inherit;
                font-size: 14px;
                transition: all 0.15s ease;
            }

            header a:hover {
                background: #fff;
                border-color: #ccc;
            }

            @media (prefers-color-scheme: dark) {
                header a {
                    border-color: #333;
                }
                header a:hover {
                    background: #161616;
                    border-color: #555;
                }
            }

            .container {
                max-width: 1000px;
                margin: 0 auto;
                flex: 1;
                display: flex;
                align-items: center;
            }

            main {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 40px;
                width: 100%;
            }

            @media (max-width: 768px) {
                main {
                    grid-template-columns: 1fr;
                    gap: 32px;
                }
            }

            .content {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            h1 {
                font-size: 32px;
                font-weight: 600;
                margin-bottom: 8px;
                letter-spacing: -0.5px;
            }

            .subtitle {
                color: #666;
                font-size: 15px;
                margin-bottom: 32px;
            }

            @media (prefers-color-scheme: dark) {
                .subtitle {
                    color: #999;
                }
            }

            .features {
                list-style: none;
                margin-bottom: 32px;
            }

            .feature {
                padding: 16px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .feature:last-child {
                border-bottom: none;
            }

            @media (prefers-color-scheme: dark) {
                .feature {
                    border-bottom-color: #222;
                }
            }

            .feature-title {
                font-weight: 600;
                margin-bottom: 4px;
                font-size: 15px;
            }

            .feature-description {
                color: #666;
                font-size: 14px;
            }

            @media (prefers-color-scheme: dark) {
                .feature-description {
                    color: #999;
                }
            }

            .cta {
                display: inline-block;
                padding: 12px 24px;
                background: #1a1a1a;
                color: white;
                border: 1px solid #1a1a1a;
                border-radius: 6px;
                text-decoration: none;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.15s ease;
                align-self: flex-start;
            }

            .cta:hover {
                background: #333;
                border-color: #333;
            }

            .cta:active {
                transform: scale(0.98);
            }

            @media (prefers-color-scheme: dark) {
                .cta {
                    background: white;
                    color: #1a1a1a;
                    border-color: white;
                }
                .cta:hover {
                    background: #e5e5e5;
                    border-color: #e5e5e5;
                }
            }

            .hero-section {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 60px;
                background: white;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                position: relative;
                overflow: hidden;
            }

            @media (prefers-color-scheme: dark) {
                .hero-section {
                    background: #161616;
                    border-color: #333;
                }
            }

            .cassette-icon {
                width: 200px;
                height: 200px;
                position: relative;
            }

            .cassette {
                width: 100%;
                height: 100%;
                background: #1a1a1a;
                border-radius: 8px;
                position: relative;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            @media (prefers-color-scheme: dark) {
                .cassette {
                    background: #e5e5e5;
                }
            }

            .cassette-window {
                position: absolute;
                top: 30px;
                left: 20px;
                right: 20px;
                height: 80px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 4px;
                overflow: hidden;
            }

            .cassette-reel {
                position: absolute;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: #666;
                border: 3px solid #333;
            }

            @media (prefers-color-scheme: dark) {
                .cassette-reel {
                    background: #999;
                    border-color: #ccc;
                }
            }

            .reel-left {
                left: 15px;
                top: 15px;
            }

            .reel-right {
                right: 15px;
                top: 15px;
            }

            .cassette-label {
                position: absolute;
                bottom: 30px;
                left: 20px;
                right: 20px;
                height: 40px;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 4px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                font-weight: 600;
                color: #1a1a1a;
            }

            @media (prefers-color-scheme: dark) {
                .cassette-label {
                    background: rgba(0, 0, 0, 0.3);
                    color: #1a1a1a;
                }
            }

            @media (max-width: 768px) {
                header {
                    margin-bottom: 24px;
                }

                h1 {
                    font-size: 24px;
                }

                .subtitle {
                    font-size: 14px;
                    margin-bottom: 24px;
                }

                .hero-section {
                    padding: 40px;
                    order: -1;
                }

                .cassette-icon {
                    width: 150px;
                    height: 150px;
                }
            }
        </style>
    </head>
    <body>
        @if (Route::has('login'))
            <header>
                @auth
                    <a href="{{ url('/dashboard') }}">Painel</a>
                @else
                    <a href="{{ route('login') }}">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar</a>
                    @endif
                @endauth
            </header>
        @endif

        <div class="container">
            <main>
                <div class="content">
                    <h1>Locação de Cassetes</h1>
                    <p class="subtitle">Sua coleção de música vintage, gerenciada digitalmente</p>

                    <ul class="features">
                        <li class="feature">
                            <div class="feature-title">Navegar Coleção</div>
                            <div class="feature-description">Explore nossa extensa biblioteca de cassetes clássicos</div>
                        </li>
                        <li class="feature">
                            <div class="feature-title">Locações Fáceis</div>
                            <div class="feature-description">Alugue e devolva cassetes com apenas alguns cliques</div>
                        </li>
                        <li class="feature">
                            <div class="feature-title">Histórico</div>
                            <div class="feature-description">Acompanhe todas as suas locações e favoritos</div>
                        </li>
                    </ul>

                    @auth
                        <a href="{{ url('/dashboard') }}" class="cta">Ir para o Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="cta">Começar</a>
                    @endauth
                </div>

                <div class="hero-section">
                    <div class="cassette-icon">
                        <div class="cassette">
                            <div class="cassette-window">
                                <div class="cassette-reel reel-left"></div>
                                <div class="cassette-reel reel-right"></div>
                            </div>
                            <div class="cassette-label">SISTEMA DE LOCAÇÃO</div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>