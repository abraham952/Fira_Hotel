
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FiraHotel | Luxury Boutique Hotel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@1,400;1,500&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-emerald: #0F3D2E;
            --color-forest: #0B2F23;
            --color-gold: #E6C79C;
            --color-gold-muted: #C9A96A;
            --color-cream: #F6F2EB;
            --color-gray: #B7B7B7;
            --shadow-deep: 0px 12px 30px rgba(0, 0, 0, 0.25);
            --radius-sm: 12px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 32px;
            --max-width: 1200px;
            --gutter-desktop: 64px;
            --gutter-tablet: 40px;
            --gutter-mobile: 24px;
            --space-1: 4px;
            --space-2: 8px;
            --space-3: 16px;
            --space-4: 24px;
            --space-5: 32px;
            --space-6: 48px;
            --space-7: 64px;
            --space-8: 96px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--color-forest);
            color: var(--color-cream);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        body.no-scroll {
            overflow: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(230, 199, 156, 0.08), transparent 55%),
                radial-gradient(circle at 80% 10%, rgba(201, 169, 106, 0.08), transparent 40%),
                radial-gradient(circle at 50% 90%, rgba(15, 61, 46, 0.5), transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 var(--gutter-desktop);
        }

        .skip-link {
            position: absolute;
            top: -40px;
            left: 16px;
            background: var(--color-gold);
            color: #0B2F23;
            padding: 8px 12px;
            border-radius: 8px;
            z-index: 1000;
            transition: top 0.2s ease;
        }

        .skip-link:focus {
            top: 16px;
        }

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .utility-bar {
            background: rgba(11, 47, 35, 0.9);
            border-bottom: 1px solid rgba(230, 199, 156, 0.12);
        }

        .utility-grid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-4);
            padding: 12px 0;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--color-gray);
        }

        .utility-links {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            flex-wrap: wrap;
        }

        .utility-link {
            position: relative;
            padding-bottom: 2px;
        }

        .utility-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 1px;
            background: var(--color-gold-muted);
            transition: width 0.2s ease;
        }

        .utility-link:hover::after {
            width: 100%;
        }
        .main-nav {
            height: 88px;
            display: flex;
            align-items: center;
            background: transparent;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .site-header.is-sticky .main-nav {
            background: rgba(15, 61, 46, 0.96);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .nav-grid {
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: var(--space-4);
        }

        .logo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid var(--color-gold);
            display: grid;
            place-items: center;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: var(--color-gold);
        }

        .primary-nav {
            display: flex;
            justify-content: center;
        }

        .nav-list {
            list-style: none;
            display: flex;
            gap: var(--space-4);
            align-items: center;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.12em;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            position: relative;
            padding: 8px 0;
            color: var(--color-cream);
            transition: color 0.2s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 1px;
            background: var(--color-gold-muted);
            transition: width 0.2s ease;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: var(--color-gold-muted);
        }

        .nav-link:hover::after,
        .nav-link:focus::after {
            width: 100%;
        }

        .dropdown {
            position: absolute;
            top: calc(100% + 16px);
            left: -8px;
            background: rgba(11, 47, 35, 0.98);
            border: 1px solid rgba(230, 199, 156, 0.2);
            border-radius: var(--radius-md);
            padding: 16px;
            min-width: 220px;
            box-shadow: var(--shadow-deep);
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .nav-item:hover .dropdown,
        .nav-item:focus-within .dropdown {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .dropdown a {
            display: block;
            padding: 8px 10px;
            border-radius: 8px;
            color: var(--color-cream);
            font-size: 0.75rem;
            letter-spacing: 0.08em;
        }

        .dropdown a:hover {
            background: rgba(230, 199, 156, 0.1);
            color: var(--color-gold);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        .btn {
            height: 44px;
            padding: 0 24px;
            border-radius: 24px;
            border: none;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease, color 0.25s ease;
        }

        .btn-gold {
            background: var(--color-gold);
            color: #0B2F23;
            box-shadow: 0 10px 22px rgba(230, 199, 156, 0.2);
        }

        .btn-gold:hover {
            transform: scale(1.05);
            background: #d9b984;
            box-shadow: 0 16px 34px rgba(230, 199, 156, 0.28);
        }

        .btn-ghost {
            background: transparent;
            color: var(--color-gold);
            border: 1px solid var(--color-gold);
        }

        .btn-ghost:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-deep);
        }

        .btn-dark {
            background: rgba(15, 61, 46, 0.9);
            color: var(--color-cream);
            border: 1px solid rgba(230, 199, 156, 0.2);
        }

        .btn-dark:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-deep);
        }

        .btn-sm {
            height: 36px;
            padding: 0 18px;
            font-size: 0.75rem;
        }

        .btn-block {
            width: 100%;
        }

        .menu-toggle {
            display: none;
            background: transparent;
            border: 1px solid rgba(230, 199, 156, 0.4);
            color: var(--color-gold);
            height: 40px;
            width: 40px;
            border-radius: 12px;
            position: relative;
        }

        .menu-toggle span,
        .menu-toggle span::before,
        .menu-toggle span::after {
            display: block;
            width: 18px;
            height: 2px;
            background: var(--color-gold);
            margin: 0 auto;
            position: relative;
            transition: transform 0.2s ease;
        }

        .menu-toggle span::before,
        .menu-toggle span::after {
            content: "";
            position: absolute;
            left: 0;
        }

        .menu-toggle span::before {
            top: -6px;
        }

        .menu-toggle span::after {
            top: 6px;
        }

        main {
            position: relative;
            z-index: 1;
        }

        section {
            padding: var(--space-8) 0;
        }

        .section-alt {
            background: rgba(15, 61, 46, 0.5);
        }

        .section-head {
            margin-bottom: var(--space-6);
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }

        .eyebrow {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.22em;
            color: var(--color-gold-muted);
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 500;
            color: var(--color-gold);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: clamp(3rem, 6vw, 4.5rem);
            letter-spacing: 0.02em;
            line-height: 1.1;
        }

        h2 {
            font-size: clamp(2rem, 3.5vw, 2.625rem);
            letter-spacing: 0.04em;
        }

        h3 {
            font-size: 1.4rem;
        }

        p {
            color: var(--color-cream);
        }

        .muted {
            color: var(--color-gray);
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 180px;
            background: linear-gradient(180deg, #0F3D2E 0%, #0B2F23 100%);
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 70% 20%, rgba(230, 199, 156, 0.12), transparent 50%);
            pointer-events: none;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: var(--space-6);
            align-items: center;
        }

        .hero-frame {
            border: 2px solid var(--color-gold);
            border-radius: var(--radius-xl);
            padding: var(--space-4);
            display: inline-block;
            margin: var(--space-4) 0;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-3);
            margin-top: var(--space-4);
        }

        .hero-notes {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-3);
            margin-top: var(--space-5);
        }

        .note {
            padding: 10px 16px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(230, 199, 156, 0.2);
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .hero-widget {
            background: rgba(11, 47, 35, 0.8);
            border: 1px solid rgba(230, 199, 156, 0.2);
            border-radius: var(--radius-lg);
            padding: var(--space-5);
            box-shadow: var(--shadow-deep);
        }

        .hero-widget h3 {
            margin-bottom: var(--space-3);
        }

        .form-grid {
            display: grid;
            gap: var(--space-3);
        }

        .form-row {
            display: grid;
            gap: var(--space-3);
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        }

        label {
            font-size: 0.7rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--color-gray);
        }

        input,
        select,
        textarea {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(230, 199, 156, 0.2);
            border-radius: var(--radius-sm);
            color: var(--color-cream);
            padding: 12px 14px;
            font-size: 0.95rem;
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(246, 242, 235, 0.6);
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: var(--color-gray);
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(230, 199, 156, 0.12);
            border-radius: var(--radius-md);
            padding: var(--space-4);
            box-shadow: var(--shadow-deep);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.35);
        }

        .image-card {
            overflow: hidden;
        }

        .image-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: var(--radius-md);
            transition: transform 0.4s ease;
        }

        .image-card:hover img {
            transform: scale(1.05);
        }

        .image-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.45) 100%);
            opacity: 0.5;
        }

        .grid-3 {
            display: grid;
            gap: var(--space-5);
            grid-template-columns: repeat(3, 1fr);
        }

        .grid-2 {
            display: grid;
            gap: var(--space-5);
            grid-template-columns: repeat(2, 1fr);
        }

        .features-list {
            display: grid;
            gap: var(--space-4);
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }

        .feature-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .icon {
            width: 24px;
            height: 24px;
            color: var(--color-gold);
            flex-shrink: 0;
        }

        .quote-block {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--color-cream);
            border-left: 3px solid var(--color-gold);
            padding-left: var(--space-4);
        }

        .cta-section {
            text-align: center;
            background: rgba(11, 47, 35, 0.85);
        }

        .cta-section h2 {
            margin-bottom: var(--space-3);
        }

        .gallery-grid {
            display: grid;
            gap: var(--space-4);
            grid-template-columns: repeat(3, 1fr);
        }

        .gallery-grid .image-card img {
            height: 220px;
        }

        .reservation-grid {
            display: grid;
            gap: var(--space-5);
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 18px;
            border: 1px solid rgba(230, 199, 156, 0.3);
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--color-gold);
        }

        .detail-grid {
            display: grid;
            gap: var(--space-3);
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            margin-top: var(--space-3);
        }

        .detail-grid span {
            display: block;
        }

        .detail-grid .label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--color-gray);
        }

        .highlight-card {
            background: rgba(15, 61, 46, 0.9);
            border: 1px solid rgba(230, 199, 156, 0.2);
            border-radius: var(--radius-md);
            padding: var(--space-4);
        }

        .message-block {
            white-space: pre-line;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.85rem;
            background: rgba(0, 0, 0, 0.35);
            padding: var(--space-3);
            border-radius: var(--radius-sm);
            border: 1px solid rgba(230, 199, 156, 0.2);
            color: var(--color-cream);
        }

        .live-feed {
            list-style: none;
            display: grid;
            gap: var(--space-2);
            margin-top: var(--space-3);
        }

        .live-feed li {
            font-size: 0.85rem;
            color: var(--color-gray);
        }
        .floating-parking {
            position: fixed;
            right: 32px;
            bottom: 32px;
            background: var(--color-gold);
            color: #0B2F23;
            padding: 12px 18px;
            border-radius: 24px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            box-shadow: var(--shadow-deep);
            z-index: 998;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .floating-parking:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.4);
        }

        .footer {
            background: var(--color-forest);
            padding: var(--space-8) 0 var(--space-6);
            border-top: 1px solid rgba(230, 199, 156, 0.15);
        }

        .footer-grid {
            display: grid;
            gap: var(--space-5);
            grid-template-columns: repeat(4, 1fr);
        }

        .footer h4 {
            font-size: 1.1rem;
            margin-bottom: var(--space-3);
        }

        .footer ul {
            list-style: none;
            display: grid;
            gap: var(--space-2);
        }

        .footer a {
            color: var(--color-gray);
            font-size: 0.9rem;
        }

        .footer a:hover {
            color: var(--color-gold);
        }

        .footer-bottom {
            margin-top: var(--space-6);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-4);
            color: var(--color-gray);
            font-size: 0.85rem;
        }

        .newsletter {
            display: grid;
            gap: var(--space-2);
        }

        .socials {
            display: flex;
            gap: 12px;
            margin-top: var(--space-2);
        }

        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(230, 199, 156, 0.3);
            display: grid;
            place-items: center;
            color: var(--color-gold);
        }

        .map-card {
            margin-top: var(--space-3);
            height: 120px;
            border-radius: var(--radius-md);
            border: 1px solid rgba(230, 199, 156, 0.2);
            background: linear-gradient(135deg, rgba(230, 199, 156, 0.2), rgba(15, 61, 46, 0.7));
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-size: 0.7rem;
            color: var(--color-gold);
        }

        .mobile-menu {
            position: fixed;
            inset: 0;
            background: rgba(2, 8, 6, 0.8);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 1000;
        }

        .mobile-menu.is-open {
            opacity: 1;
            pointer-events: auto;
        }

        .mobile-menu-inner {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: min(92vw, 380px);
            background: var(--color-forest);
            padding: var(--space-5);
            display: flex;
            flex-direction: column;
            gap: var(--space-4);
            border-left: 1px solid rgba(230, 199, 156, 0.2);
        }

        .mobile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            color: var(--color-gold);
        }

        .menu-close {
            background: transparent;
            border: 1px solid rgba(230, 199, 156, 0.3);
            color: var(--color-gold);
            padding: 8px 14px;
            border-radius: 16px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.7rem;
        }

        .mobile-actions {
            display: grid;
            gap: var(--space-3);
        }

        .mobile-actions a {
            padding: 12px 16px;
            border-radius: 16px;
            border: 1px solid rgba(230, 199, 156, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.75rem;
        }

        details {
            border: 1px solid rgba(230, 199, 156, 0.2);
            border-radius: 16px;
            padding: 12px 16px;
        }

        details summary {
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.75rem;
            color: var(--color-gold);
        }

        details a {
            display: block;
            margin-top: 10px;
            color: var(--color-gray);
            font-size: 0.85rem;
        }

        .mobile-select {
            display: grid;
            gap: var(--space-2);
        }

        .mobile-bar {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(11, 47, 35, 0.96);
            border-top: 1px solid rgba(230, 199, 156, 0.2);
            padding: 12px 16px;
            display: none;
            z-index: 997;
        }

        .mobile-bar-inner {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: var(--space-3);
            align-items: center;
        }

        .mobile-bar a {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            padding: 10px 14px;
            border-radius: 18px;
            border: 1px solid rgba(230, 199, 156, 0.2);
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 5, 0.8);
            display: grid;
            place-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 1001;
        }

        .modal.is-open {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-card {
            background: var(--color-forest);
            border: 1px solid rgba(230, 199, 156, 0.2);
            border-radius: var(--radius-lg);
            padding: var(--space-5);
            width: min(90vw, 420px);
            box-shadow: var(--shadow-deep);
        }

        .modal-card h3 {
            margin-bottom: var(--space-2);
        }

        .status-message {
            margin-top: var(--space-3);
            padding: 12px 16px;
            border-radius: 16px;
            border: 1px solid rgba(230, 199, 156, 0.2);
            font-size: 0.85rem;
        }

        @media (max-width: 1024px) {
            .container {
                padding: 0 var(--gutter-tablet);
            }

            .nav-list {
                gap: var(--space-3);
                font-size: 0.7rem;
            }

            .hero-grid {
                grid-template-columns: 1fr;
            }

            .grid-3 {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .utility-bar {
                display: none;
            }

            .primary-nav {
                display: none;
            }

            .menu-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .grid-3,
            .grid-2,
            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 140px;
            }

            .hero-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .hero-notes {
                flex-direction: column;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }

            .mobile-bar {
                display: block;
            }

            body {
                padding-bottom: 80px;
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 0 var(--gutter-mobile);
            }
        }
    </style>
</head>
<body>
    <a href="#main-content" class="skip-link">Skip to content</a>
    <header class="site-header" id="top">
        <div class="utility-bar">
            <div class="container utility-grid">
                <div>FiraHotel | Modern luxury above the caldera</div>
                <div class="utility-links" aria-label="Secondary Navigation">
                    <a class="utility-link" href="#reservations">Check Availability</a>
                    <a class="utility-link" href="#manage-booking">Manage Booking</a>
                    <a class="utility-link" href="#gift-cards">Gift Cards</a>
                    <a class="utility-link" href="#contact">Contact Us</a>
                    <a class="utility-link" href="#location">Location & Directions</a>
                    <a class="utility-link" href="#faq">FAQ / Help</a>
                    <a class="btn btn-gold btn-sm" href="#reservations">Book Now</a>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container nav-grid">
                <a class="logo" href="#top" aria-label="FiraHotel">FH</a>
                <nav class="primary-nav" aria-label="Primary Navigation">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a class="nav-link" href="#rooms">Rooms & Suites</a>
                            <div class="dropdown">
                                <a href="#rooms-types">Room Types</a>
                                <a href="#suites">Suites Collection</a>
                                <a href="#room-features">Room Features</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#dining">Dining</a>
                            <div class="dropdown">
                                <a href="#restaurants">Restaurants</a>
                                <a href="#bars">Bars & Lounges</a>
                                <a href="#room-service">Room Service</a>
                                <a href="#menus">Menus</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservations">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#amenities">Amenities & Services</a>
                            <div class="dropdown">
                                <a href="#spa">Spa & Wellness</a>
                                <a href="#pool">Pool & Fitness</a>
                                <a href="#business">Business Center</a>
                                <a href="#concierge">Concierge Services</a>
                                <a href="#parking">Parking</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#events">Events & Meetings</a>
                            <div class="dropdown">
                                <a href="#meeting-rooms">Meeting Rooms</a>
                                <a href="#weddings">Wedding Venues</a>
                                <a href="#conference">Conference Facilities</a>
                                <a href="#event-planning">Event Planning</a>
                                <a href="#request-quote">Request a Quote</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#offers">Special Offers</a>
                            <div class="dropdown">
                                <a href="#packages">Packages & Deals</a>
                                <a href="#seasonal">Seasonal Offers</a>
                                <a href="#last-minute">Last Minute Deals</a>
                                <a href="#loyalty">Loyalty Discounts</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="nav-actions">
                    <a class="btn btn-gold" href="#reservations">Book Now</a>
                    <button class="menu-toggle" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
        <div class="mobile-menu-inner">
            <div class="mobile-header">
                <div class="mobile-logo">FiraHotel</div>
                <button class="menu-close" type="button">Close</button>
            </div>
            <a class="btn btn-gold btn-block" href="#reservations">Book Now</a>
            <div class="mobile-actions">
                <a href="tel:+15550123">Call Hotel</a>
                <a href="https://maps.google.com/?q=FiraHotel" target="_blank" rel="noreferrer">Get Directions</a>
                <a href="#checkin">Check-in/Check-out Times</a>
            </div>
            <details>
                <summary>Quick Links</summary>
                <a href="#rooms">Rooms & Suites</a>
                <a href="#gallery">Gallery</a>
                <a href="#dining">Dining</a>
                <a href="#amenities">Amenities & Services</a>
                <a href="#events">Events & Meetings</a>
                <a href="#offers">Special Offers</a>
                <a href="#faq">FAQ / Help</a>
            </details>
            <details>
                <summary>Reservations</summary>
                <a href="#reservations">Reserve Now</a>
                <a href="#manage-booking">Manage Booking</a>
                <a href="#gift-cards">Gift Cards</a>
            </details>
            <div class="mobile-select">
                <label for="language">Language Selector</label>
                <select id="language">
                    <option>English</option>
                    <option>French</option>
                    <option>Spanish</option>
                </select>
            </div>
            <div class="mobile-select">
                <label for="currency">Currency Selector</label>
                <select id="currency">
                    <option>USD</option>
                    <option>EUR</option>
                    <option>GBP</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mobile-bar" aria-label="Mobile Actions">
        <div class="mobile-bar-inner">
            <a class="btn btn-gold" href="#reservations">Book Now</a>
            <a href="tel:+15550123">Call Hotel</a>
            <a href="https://maps.google.com/?q=FiraHotel" target="_blank" rel="noreferrer">Directions</a>
        </div>
    </div>

    <main id="main-content">
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <div class="eyebrow">Luxury Boutique Hotel</div>
                    <h1>FiraHotel</h1>
                    <div class="hero-frame">
                        <p>Modern-classic hospitality, panoramic Aegean views, and a sanctuary of calm in the heart of Fira.</p>
                    </div>
                    <p class="muted">Deep emerald interiors, champagne accents, and curated experiences designed for discerning travelers.</p>
                    <div class="hero-actions">
                        <a class="btn btn-gold" href="#reservations">Reserve Your Room</a>
                        <a class="btn btn-ghost" href="#gallery">Explore Gallery</a>
                    </div>
                    <div class="hero-notes">
                        <div class="note" id="checkin">Check-in 3:00 PM - 10:00 PM</div>
                        <div class="note">Payment at hotel, no pre-charge</div>
                        <div class="note">Concierge on call 24/7</div>
                    </div>
                </div>
                <div class="hero-widget">
                    <h3>Check Availability</h3>
                    <form id="hero-availability" class="form-grid">
                        <div class="form-row">
                            <div>
                                <label for="hero-arrival">Arrival</label>
                                <input type="date" id="hero-arrival" name="arrival" required>
                            </div>
                            <div>
                                <label for="hero-departure">Departure</label>
                                <input type="date" id="hero-departure" name="departure" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <label for="hero-guests">Guests</label>
                                <select id="hero-guests" name="guests">
                                    <option>1 Adult</option>
                                    <option selected>2 Adults</option>
                                    <option>3 Adults</option>
                                    <option>4 Adults</option>
                                </select>
                            </div>
                            <div>
                                <label for="hero-room">Room</label>
                                <select id="hero-room" name="room">
                                    <option>Deluxe King</option>
                                    <option>Ocean Suite</option>
                                    <option>Caldera Penthouse</option>
                                    <option>Garden Double</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-gold" type="submit">Check Availability</button>
                    </form>
                </div>
            </div>
        </section>
        <section id="rooms" class="section-alt reveal" data-reveal>
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Rooms & Suites</div>
                    <h2>Suites crafted for cinematic stays</h2>
                    <p class="muted">Impeccable detail, discreet luxury, and bespoke services tailored to your rhythm.</p>
                </div>
                <div class="grid-3" id="rooms-types">
                    <div class="card image-card">
                        <img src="{{ asset('Images/rooms/deluxe-suite.svg') }}" alt="Deluxe King">
                        <h3>Deluxe King</h3>
                        <p class="muted">Caldera views, handcrafted textiles, and a private balcony.</p>
                        <p>From $356 / night</p>
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/rooms/executive-suite.svg') }}" alt="Ocean Suite">
                        <h3>Ocean Suite</h3>
                        <p class="muted">Double-height windows, soaking tub, and sunrise ritual service.</p>
                        <p>From $520 / night</p>
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/rooms/presidential-suite.svg') }}" alt="Caldera Penthouse">
                        <h3>Caldera Penthouse</h3>
                        <p class="muted">Private terrace pool, personal butler, and curated dining.</p>
                        <p>From $880 / night</p>
                    </div>
                </div>

                <div class="grid-2" id="suites" style="margin-top: var(--space-6);">
                    <div class="card">
                        <h3>Suites Collection</h3>
                        <p class="muted">Each suite is a signature composition of marble, linen, and warm light. Choose from Ocean View, Sunset, or Heritage collections.</p>
                        <div class="features-list" style="margin-top: var(--space-3);">
                            <div class="feature-item">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="12" cy="12" r="9" />
                                    <path d="M8 12h8" />
                                    <path d="M12 8v8" />
                                </svg>
                                <div>
                                    <strong>Butler Service</strong>
                                    <p class="muted">Dedicated host for every suite stay.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M4 10h16" />
                                    <path d="M6 6h12" />
                                    <path d="M6 14h12" />
                                    <path d="M8 18h8" />
                                </svg>
                                <div>
                                    <strong>Private Terraces</strong>
                                    <p class="muted">Outdoor lounges with golden hour views.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="room-features">
                        <h3>Room Features</h3>
                        <div class="features-list" style="margin-top: var(--space-3);">
                            <div class="feature-item">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M4 12h16" />
                                    <path d="M4 7h16" />
                                    <path d="M4 17h16" />
                                </svg>
                                <div>
                                    <strong>Signature bedding</strong>
                                    <p class="muted">Plush linens and curated pillow menu.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M6 19h12" />
                                    <path d="M9 15h6" />
                                    <path d="M12 4v8" />
                                </svg>
                                <div>
                                    <strong>Smart controls</strong>
                                    <p class="muted">Lighting, temperature, and privacy presets.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M3 12h18" />
                                    <path d="M7 6h10" />
                                    <path d="M7 18h10" />
                                </svg>
                                <div>
                                    <strong>In-suite dining</strong>
                                    <p class="muted">Chef-curated menus and sommelier pairings.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="gallery" class="reveal" data-reveal>
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Gallery</div>
                    <h2>Visual stories of a refined escape</h2>
                </div>
                <div class="gallery-grid">
                    <div class="card image-card">
                        <img src="{{ asset('Images/IMG_6113.PNG') }}" alt="Suite interior">
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/IMG_6114.PNG') }}" alt="Infinity pool">
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/IMG_6116.PNG') }}" alt="Restaurant ambiance">
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/IMG_6117.PNG') }}" alt="Lobby">
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/IMG_6119.PNG') }}" alt="Spa treatment">
                    </div>
                    <div class="card image-card">
                        <img src="{{ asset('Images/IMG_6120.PNG') }}" alt="Evening terrace">
                    </div>
                </div>
            </div>
        </section>
        <section class="section-alt reveal" data-reveal id="dining">
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Dining</div>
                    <h2>Epicurean moments at every hour</h2>
                </div>
                <div class="grid-3">
                    <div class="card" id="restaurants">
                        <h3>Restaurants</h3>
                        <p class="muted">Mediterranean tasting menus, seasonal plates, and chef collaborations.</p>
                        <p>Open 6:30 PM - 11:00 PM</p>
                    </div>
                    <div class="card" id="bars">
                        <h3>Bars & Lounges</h3>
                        <p class="muted">Crafted cocktails, rare spirits, and sunset lounge performances.</p>
                        <p>Open 4:00 PM - 1:00 AM</p>
                    </div>
                    <div class="card" id="room-service">
                        <h3>Room Service</h3>
                        <p class="muted">24-hour curated menu, private dining setups, and bespoke pairings.</p>
                        <p>Available 24/7</p>
                    </div>
                </div>
                <div class="card" id="menus" style="margin-top: var(--space-5);">
                    <h3>Menus</h3>
                    <p class="muted">Explore breakfast rituals, chef tasting menus, vegan wellness selections, and late-night indulgences.</p>
                    <a class="btn btn-ghost" href="#reservations" style="margin-top: var(--space-3);">Reserve a Table</a>
                </div>
            </div>
        </section>
        <section class="reveal" data-reveal id="amenities">
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Amenities & Services</div>
                    <h2>Dedicated to seamless comfort</h2>
                </div>
                <div class="grid-3">
                    <div class="card" id="spa">
                        <h3>Spa & Wellness</h3>
                        <p class="muted">Thermal suites, signature massages, and restorative rituals.</p>
                    </div>
                    <div class="card" id="pool">
                        <h3>Pool & Fitness</h3>
                        <p class="muted">Infinity pool, sunrise yoga, and performance training studio.</p>
                    </div>
                    <div class="card" id="business">
                        <h3>Business Center</h3>
                        <p class="muted">Private work lounges, printing, and concierge support.</p>
                    </div>
                    <div class="card" id="concierge">
                        <h3>Concierge Services</h3>
                        <p class="muted">Tailored itineraries, yacht bookings, and cultural access.</p>
                    </div>
                    <div class="card" id="parking">
                        <h3>Parking</h3>
                        <p class="muted">Valet service, secure garage, and EV charging stations.</p>
                    </div>
                    <div class="card">
                        <h3>Guest Services</h3>
                        <p class="muted">Housekeeping twice daily, turndown service, and bespoke requests.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-alt reveal" data-reveal id="events">
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Events & Meetings</div>
                    <h2>Elevated gatherings with panoramic views</h2>
                </div>
                <div class="grid-2">
                    <div class="card" id="meeting-rooms">
                        <h3>Meeting Rooms</h3>
                        <p class="muted">Technology-forward salons for executive retreats.</p>
                    </div>
                    <div class="card" id="weddings">
                        <h3>Wedding Venues</h3>
                        <p class="muted">Golden hour ceremonies with bespoke styling.</p>
                    </div>
                    <div class="card" id="conference">
                        <h3>Conference Facilities</h3>
                        <p class="muted">Hybrid-ready spaces with curated hospitality.</p>
                    </div>
                    <div class="card" id="event-planning">
                        <h3>Event Planning</h3>
                        <p class="muted">Dedicated planners, floral design, and culinary teams.</p>
                    </div>
                </div>
                <div class="card" id="request-quote" style="margin-top: var(--space-5);">
                    <h3>Request a Quote</h3>
                    <form class="form-grid">
                        <div class="form-row">
                            <div>
                                <label for="event-type">Event Type</label>
                                <select id="event-type">
                                    <option>Conference</option>
                                    <option>Wedding</option>
                                    <option>Private Dinner</option>
                                    <option>Corporate Retreat</option>
                                </select>
                            </div>
                            <div>
                                <label for="event-date">Preferred Date</label>
                                <input type="date" id="event-date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <label for="event-guests">Guests</label>
                                <input type="number" id="event-guests" placeholder="120">
                            </div>
                            <div>
                                <label for="event-contact">Contact Email</label>
                                <input type="email" id="event-contact" placeholder="events@firahotel.com">
                            </div>
                        </div>
                        <button class="btn btn-gold" type="button">Request a Quote</button>
                    </form>
                </div>
            </div>
        </section>
        <section class="reveal" data-reveal id="reservations">
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Reservations</div>
                    <h2>Reserve Your Room</h2>
                    <p class="muted">Fast, secure, and no payment required today. Pay on arrival or through a secure link 24 hours before check-in.</p>
                </div>
                <div class="reservation-grid">
                    <form class="card" id="booking-form">
                        <h3>Reserve Your Room</h3>
                        <div class="form-row" style="margin-top: var(--space-3);">
                            <div>
                                <label for="arrival">Arrival</label>
                                <input type="date" id="arrival" name="arrival" required>
                            </div>
                            <div>
                                <label for="departure">Departure</label>
                                <input type="date" id="departure" name="departure" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <label for="room">Room</label>
                                <select id="room" name="room">
                                    <option>Deluxe King</option>
                                    <option>Ocean Suite</option>
                                    <option>Caldera Penthouse</option>
                                    <option>Garden Double</option>
                                </select>
                            </div>
                            <div>
                                <label for="guests">Guests</label>
                                <select id="guests" name="guests">
                                    <option>1 Adult</option>
                                    <option selected>2 Adults</option>
                                    <option>3 Adults</option>
                                    <option>4 Adults</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Jane Smith" required>
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="jane@email.com" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" placeholder="555-0123" required>
                            </div>
                            <div>
                                <label for="requests">Special Requests</label>
                                <input type="text" id="requests" name="requests" placeholder="Early check-in if possible">
                            </div>
                        </div>
                        <div class="checkbox-row">
                            <input type="checkbox" id="policy" required>
                            <label for="policy">I agree to the cancellation policy</label>
                        </div>
                        <button class="btn btn-gold" type="submit">Reserve Now - No Payment Required</button>
                        <div class="status-message" id="booking-status">Complete the form to check availability and reserve instantly.</div>
                    </form>
                    <div class="card" id="booking-confirmation">
                        <h3>Instant Confirmation</h3>
                        <div class="status-pill">Confirmed - Payment Pending</div>
                        <div class="detail-grid">
                            <div>
                                <span class="label">Confirmation #</span>
                                <span id="confirmation-id">FH-7294</span>
                            </div>
                            <div>
                                <span class="label">Dates</span>
                                <span id="confirmation-dates">June 15-17, 2024</span>
                            </div>
                            <div>
                                <span class="label">Room</span>
                                <span id="confirmation-room">Deluxe King Ocean View</span>
                            </div>
                            <div>
                                <span class="label">Guests</span>
                                <span id="confirmation-guests">2 Adults</span>
                            </div>
                            <div>
                                <span class="label">Rate</span>
                                <span id="confirmation-rate">$356 / night</span>
                            </div>
                            <div>
                                <span class="label">Estimated Total</span>
                                <span id="confirmation-total">$712</span>
                            </div>
                        </div>
                        <p class="muted" style="margin-top: var(--space-3);">No payment has been taken. Pay on arrival or through the secure link sent 24 hours before check-in.</p>
                        <div class="hero-actions">
                            <button class="btn btn-ghost" type="button" id="open-payment">Pay Now (Optional)</button>
                            <button class="btn btn-dark" type="button" id="send-confirmation">Send Confirmation</button>
                        </div>
                    </div>

                    <div class="card" id="live-updates">
                        <h3>Live Updates</h3>
                        <div class="highlight-card" id="last-booking">
                            <strong>Last Booking Confirmation</strong>
                            <p style="margin-top: 8px;" id="last-booking-detail">Room reserved! Jane just reserved Deluxe King for June 15-17.</p>
                            <p class="muted" id="next-available">Next available: June 18</p>
                            <p class="muted" id="inventory-note">Only 3 rooms left this weekend.</p>
                        </div>
                        <div style="margin-top: var(--space-4);">
                            <strong>Recent Reservations</strong>
                            <ul class="live-feed" id="recent-reservations"></ul>
                            <p class="muted" id="popular-room" style="margin-top: var(--space-3);">Most Popular: Deluxe King (Booked 12x this week)</p>
                        </div>
                    </div>
                </div>

                <div class="grid-2" style="margin-top: var(--space-6);">
                    <div class="card">
                        <h3>SMS Sent Within 60 Seconds</h3>
                        <div class="message-block">SUBJECT: Your Reservation Confirmation - FiraHotel

Dear Jane,

Thank you for your reservation!

RESERVATION DETAILS:
- Confirmation #: FH-7294
- Dates: June 15-17, 2024 (2 nights)
- Room: Deluxe King Ocean View
- Guests: 2 adults
- Rate: $356/night
- Estimated Total: $712

IMPORTANT: This is a reservation only. No payment has been taken.

TO COMPLETE YOUR BOOKING:
1. Payment required at hotel
2. Check-in: 3:00 PM - 10:00 PM
3. Early check-in: subject to availability

CANCELLATION POLICY:
- Cancel 48+ hours before: No charge
- Cancel within 48 hours: 1 night charge
- No-show: Full stay charge

Need to modify or cancel?
Use this link: hotel.com/manage/FH-7294

Questions? Call 555-6789
See you soon!
FiraHotel Team</div>
                    </div>
                    <div class="card" id="manage-booking">
                        <h3>Backend Dashboard</h3>
                        <div class="message-block">TODAY'S RESERVATION

RESERVATION #: FH-7294
STATUS: CONFIRMED (Payment Pending)
GUEST: Jane Smith
PHONE: 555-0123 | EMAIL: jane@email.com
DATES: June 15-17 | NIGHTS: 2
ROOM: Deluxe King Ocean View
RATE: $356/night | TOTAL: $712
SPECIAL REQUESTS:
- Early check-in if possible

ACTIONS:
[ASSIGN ROOM] [ADD NOTES] [MARK PAID] [CANCEL]</div>
                        <div class="message-block" style="margin-top: var(--space-3);">CALENDAR VIEW

June 2024
15 | Deluxe King - Jane Smith (FH-7294)
16 | Deluxe King - Jane Smith (FH-7294)</div>
                    </div>
                </div>
                <div class="grid-3" style="margin-top: var(--space-6);">
                    <div class="card">
                        <h3>Payment Process at Hotel</h3>
                        <div class="message-block">FRONT DESK SYSTEM

GUEST: Jane Smith
RESERVATION: FH-7294
ROOM: 507
BALANCE DUE: $712.00
STATUS: PAYMENT PENDING

[TAKE PAYMENT]
[ADD INCIDENTALS]
[CHECK IN]</div>
                    </div>
                    <div class="card">
                        <h3>Automated Reminders</h3>
                        <div class="message-block">24 HOURS BEFORE CHECK-IN
"Hi Jane, your room is ready for tomorrow!
Check-in: 3 PM. Balance due: $712.
We accept Visa, MasterCard, Amex, cash."

DAY OF CHECK-IN
"Welcome! We're expecting you today.
Check-in until 10 PM. Safe travels!"</div>
                    </div>
                    <div class="card">
                        <h3>Cancellation Management</h3>
                        <div class="message-block">Guest clicks cancel link
"Cancel your reservation?"
Confirm -> instant cancellation email
Room becomes available immediately

NO-SHOW PROTECTION
3:00 PM: Mark as No-show risk
6:00 PM: Call guest
10:00 PM: Auto-mark no-show</div>
                    </div>
                </div>
                <div class="grid-2" style="margin-top: var(--space-6);">
                    <div class="card">
                        <h3>Mobile Payment Option</h3>
                        <div class="message-block">"Jane, your room is ready! Check in anytime after 3 PM.

Pay now for faster check-in:
[PAY $712 NOW - SECURE LINK]

Or pay at front desk."

Mobile Payment Page
The FiraHotel
Reservation FH-7294
Jane Smith - June 15-17
Total Due: $712.00</div>
                        <button class="btn btn-gold" type="button" style="margin-top: var(--space-3);" id="open-payment-secondary">Pay $712 Now</button>
                    </div>
                    <div class="card" id="benefits">
                        <h3>Benefits of This System</h3>
                        <ul class="live-feed">
                            <li>No payment processing fees online</li>
                            <li>Less fraud risk and simple cancellation</li>
                            <li>Personal interaction with guests</li>
                            <li>Guests book in 30 seconds without card</li>
                            <li>Pay how they want at check-in</li>
                        </ul>
                        <div style="margin-top: var(--space-3);">
                            <strong>Setup You Need</strong>
                            <ul class="live-feed">
                                <li>Booking form on website</li>
                                <li>Email service for confirmations</li>
                                <li>Simple database or spreadsheet</li>
                                <li>Text messaging service for reminders</li>
                                <li>Payment link provider for mobile pay</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-top: var(--space-6);" id="display-website">
                    <h3>Display on Website</h3>
                    <div class="grid-2" style="margin-top: var(--space-4);">
                        <div class="highlight-card">
                            <strong>Last Booking Confirmation</strong>
                            <p class="muted" style="margin-top: 8px;">"Room reserved!" Jane just reserved Deluxe King for June 15-17.</p>
                            <p class="muted">Next available: June 18</p>
                            <p class="muted">Only 3 rooms left this weekend.</p>
                        </div>
                        <div class="highlight-card">
                            <strong>Recent Reservations</strong>
                            <ul class="live-feed" style="margin-top: 8px;">
                                <li>John D. - Deluxe King - Tomorrow</li>
                                <li>Maria G. - Ocean Suite - This Friday</li>
                                <li>David C. - Double Room - Next Week</li>
                            </ul>
                            <p class="muted" style="margin-top: var(--space-2);">Most Popular: Deluxe King (Booked 12x this week)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-alt reveal" data-reveal id="offers">
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Special Offers</div>
                    <h2>Exclusive packages and limited-time escapes</h2>
                </div>
                <div class="grid-3">
                    <div class="card" id="packages">
                        <h3>Packages & Deals</h3>
                        <p class="muted">Suite upgrades, dining credits, and spa rituals.</p>
                    </div>
                    <div class="card" id="seasonal">
                        <h3>Seasonal Offers</h3>
                        <p class="muted">Autumn serenity, winter retreats, and spring wellness.</p>
                    </div>
                    <div class="card" id="last-minute">
                        <h3>Last Minute Deals</h3>
                        <p class="muted">Curated stays for spontaneous escapes.</p>
                    </div>
                    <div class="card" id="loyalty">
                        <h3>Loyalty Discounts</h3>
                        <p class="muted">Private member rates and suite privileges.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta-section reveal" data-reveal id="contact">
            <div class="container">
                <div class="section-head">
                    <div class="eyebrow">Your Stay Awaits</div>
                    <h2>Reserve a sanctuary of understated luxury</h2>
                    <p class="muted">Our team crafts every detail so your stay is effortless.</p>
                </div>
                <div class="hero-actions" style="justify-content: center;">
                    <a class="btn btn-gold" href="#reservations">Book Now</a>
                    <a class="btn btn-ghost" href="#location">Contact Concierge</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer" id="location">
        <div class="container footer-grid">
            <div>
                <h4>Hotel Information</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Management Team</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">Awards & Recognition</a></li>
                    <li><a href="#">Press Room</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div>
                <h4>Policies & Information</h4>
                <ul>
                    <li><a href="#">Guest Services</a></li>
                    <li><a href="#checkin">Check-in/Check-out Times</a></li>
                    <li><a href="#">Pet Policy</a></li>
                    <li><a href="#">Accessibility</a></li>
                    <li><a href="#">Parking Information</a></li>
                    <li><a href="#">Internet Access</a></li>
                    <li><a href="#">Cancellation Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
            <div>
                <h4>Experiences</h4>
                <ul>
                    <li><a href="#dining">Dining</a></li>
                    <li><a href="#spa">Spa & Wellness</a></li>
                    <li><a href="#events">Events & Meetings</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#offers">Special Offers</a></li>
                    <li><a href="#reservations">Reservations</a></li>
                </ul>
            </div>
            <div>
                <h4>Connect</h4>
                <p class="muted">Phone: +1 (555) 678-9012</p>
                <p class="muted">Email: concierge@firahotel.com</p>
                <p class="muted">Address: 77 Caldera View, Fira, Santorini</p>
                <div class="map-card">Map Preview</div>
                <div class="socials">
                    <div class="social-icon">Fb</div>
                    <div class="social-icon">Ig</div>
                    <div class="social-icon">X</div>
                    <div class="social-icon">In</div>
                    <div class="social-icon">Yt</div>
                    <div class="social-icon">Pi</div>
                </div>
                <div class="newsletter" style="margin-top: var(--space-4);">
                    <label for="newsletter">Newsletter Signup</label>
                    <input id="newsletter" type="email" placeholder="your@email.com">
                    <button class="btn btn-gold" type="button" id="gift-cards">Join the List</button>
                </div>
            </div>
        </div>
        <div class="container footer-bottom">
            <span>? <span id="year"></span> FiraHotel. All rights reserved.</span>
            <span id="faq">Need help? Contact us 24/7.</span>
        </div>
    </footer>

    <a class="floating-parking" href="#parking">Parking</a>

    <div class="modal" id="payment-modal" aria-hidden="true">
        <div class="modal-card">
            <h3>Secure Payment</h3>
            <p class="muted">Pay now for faster check-in. Your reservation stays confirmed either way.</p>
            <div class="form-grid" style="margin-top: var(--space-3);">
                <button class="btn btn-gold" type="button">Pay with Apple Pay</button>
                <button class="btn btn-dark" type="button">Pay with Card</button>
                <button class="btn btn-ghost" type="button" id="close-payment">Pay at Hotel Instead</button>
            </div>
        </div>
    </div>
    <script>
        const header = document.querySelector('.site-header');
        const menuToggle = document.querySelector('.menu-toggle');
        const mobileMenu = document.querySelector('#mobile-menu');
        const menuClose = document.querySelector('.menu-close');
        const yearSpan = document.querySelector('#year');

        const revealItems = document.querySelectorAll('[data-reveal]');
        revealItems.forEach((item) => item.classList.add('reveal'));

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        revealItems.forEach((item) => observer.observe(item));

        window.addEventListener('scroll', () => {
            header.classList.toggle('is-sticky', window.scrollY > 80);
        });

        const openMenu = () => {
            mobileMenu.classList.add('is-open');
            mobileMenu.setAttribute('aria-hidden', 'false');
            menuToggle.setAttribute('aria-expanded', 'true');
            document.body.classList.add('no-scroll');
        };

        const closeMenu = () => {
            mobileMenu.classList.remove('is-open');
            mobileMenu.setAttribute('aria-hidden', 'true');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('no-scroll');
        };

        menuToggle.addEventListener('click', openMenu);
        menuClose.addEventListener('click', closeMenu);
        mobileMenu.addEventListener('click', (event) => {
            if (event.target === mobileMenu) {
                closeMenu();
            }
        });
        mobileMenu.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

        if (yearSpan) {
            yearSpan.textContent = new Date().getFullYear();
        }

        const paymentModal = document.querySelector('#payment-modal');
        const openPayment = document.querySelector('#open-payment');
        const openPaymentSecondary = document.querySelector('#open-payment-secondary');
        const closePayment = document.querySelector('#close-payment');

        const togglePayment = (open) => {
            paymentModal.classList.toggle('is-open', open);
            paymentModal.setAttribute('aria-hidden', open ? 'false' : 'true');
        };

        openPayment.addEventListener('click', () => togglePayment(true));
        openPaymentSecondary.addEventListener('click', () => togglePayment(true));
        closePayment.addEventListener('click', () => togglePayment(false));
        paymentModal.addEventListener('click', (event) => {
            if (event.target === paymentModal) {
                togglePayment(false);
            }
        });

        const heroForm = document.querySelector('#hero-availability');
        const bookingForm = document.querySelector('#booking-form');
        const bookingStatus = document.querySelector('#booking-status');
        const confirmationId = document.querySelector('#confirmation-id');
        const confirmationDates = document.querySelector('#confirmation-dates');
        const confirmationRoom = document.querySelector('#confirmation-room');
        const confirmationGuests = document.querySelector('#confirmation-guests');
        const confirmationRate = document.querySelector('#confirmation-rate');
        const confirmationTotal = document.querySelector('#confirmation-total');
        const lastBookingDetail = document.querySelector('#last-booking-detail');
        const nextAvailable = document.querySelector('#next-available');
        const inventoryNote = document.querySelector('#inventory-note');
        const recentReservations = document.querySelector('#recent-reservations');
        const popularRoom = document.querySelector('#popular-room');
        const sendConfirmation = document.querySelector('#send-confirmation');

        const roomRates = {
            'Deluxe King': 356,
            'Ocean Suite': 520,
            'Caldera Penthouse': 880,
            'Garden Double': 280
        };

        const roomInventory = {
            'Deluxe King': 6,
            'Ocean Suite': 4,
            'Caldera Penthouse': 2,
            'Garden Double': 8
        };

        let reservations = [
            { id: 'FH-7294', name: 'Jane Smith', room: 'Deluxe King', start: '2024-06-15', end: '2024-06-17', guests: '2 Adults' },
            { id: 'FH-8431', name: 'John D.', room: 'Deluxe King', start: '2024-06-18', end: '2024-06-19', guests: '2 Adults' },
            { id: 'FH-6523', name: 'Maria G.', room: 'Ocean Suite', start: '2024-06-21', end: '2024-06-23', guests: '2 Adults' },
            { id: 'FH-3198', name: 'David C.', room: 'Garden Double', start: '2024-06-28', end: '2024-06-30', guests: '2 Adults' }
        ];

        const parseDate = (value) => new Date(`${value}T00:00:00`);

        const formatDateRange = (startDate, endDate) => {
            const options = { month: 'short', day: 'numeric' };
            const startText = startDate.toLocaleDateString('en-US', options);
            const endText = endDate.toLocaleDateString('en-US', options);
            const year = startDate.getFullYear();
            return `${startText}-${endText}, ${year}`;
        };

        const nightsBetween = (startDate, endDate) => {
            const ms = endDate - startDate;
            return Math.max(1, Math.round(ms / (1000 * 60 * 60 * 24)));
        };

        const overlaps = (startA, endA, startB, endB) => startA < endB && endA > startB;

        const countOverlaps = (room, startDate, endDate) => {
            return reservations.filter((reservation) => {
                return reservation.room === room && overlaps(startDate, endDate, parseDate(reservation.start), parseDate(reservation.end));
            }).length;
        };

        const updateRecentReservations = () => {
            recentReservations.innerHTML = '';
            reservations.slice(0, 3).forEach((reservation) => {
                const item = document.createElement('li');
                const start = parseDate(reservation.start);
                item.textContent = `${reservation.name} - ${reservation.room} - ${start.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}`;
                recentReservations.appendChild(item);
            });

            const counts = reservations.reduce((acc, reservation) => {
                acc[reservation.room] = (acc[reservation.room] || 0) + 1;
                return acc;
            }, {});
            const mostPopular = Object.entries(counts).sort((a, b) => b[1] - a[1])[0];
            if (mostPopular) {
                popularRoom.textContent = `Most Popular: ${mostPopular[0]} (Booked ${mostPopular[1]}x this week)`;
            }
        };

        updateRecentReservations();

        heroForm.addEventListener('submit', (event) => {
            event.preventDefault();
            bookingForm.arrival.value = heroForm.arrival.value;
            bookingForm.departure.value = heroForm.departure.value;
            bookingForm.guests.value = heroForm.guests.value;
            bookingForm.room.value = heroForm.room.value;
            document.querySelector('#reservations').scrollIntoView({ behavior: 'smooth' });
        });

        sendConfirmation.addEventListener('click', () => {
            bookingStatus.textContent = 'Confirmation sent. SMS and email delivered within 60 seconds.';
        });

        bookingForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const startValue = bookingForm.arrival.value;
            const endValue = bookingForm.departure.value;
            const room = bookingForm.room.value;
            const guests = bookingForm.guests.value;
            const name = bookingForm.name.value.trim();
            const email = bookingForm.email.value.trim();

            if (!startValue || !endValue) {
                bookingStatus.textContent = 'Please select arrival and departure dates.';
                return;
            }

            const startDate = parseDate(startValue);
            const endDate = parseDate(endValue);
            if (endDate <= startDate) {
                bookingStatus.textContent = 'Departure must be after arrival.';
                return;
            }

            const overlapping = countOverlaps(room, startDate, endDate);
            const inventory = roomInventory[room] || 1;
            if (overlapping >= inventory) {
                bookingStatus.textContent = `${room} is not available for these dates. Please adjust your stay.`;
                return;
            }

            const confirmation = `FH-${Math.floor(1000 + Math.random() * 9000)}`;
            const nights = nightsBetween(startDate, endDate);
            const rate = roomRates[room] || 0;
            const total = rate * nights;

            const newReservation = {
                id: confirmation,
                name: name || 'Guest',
                room,
                start: startValue,
                end: endValue,
                guests
            };
            reservations = [newReservation, ...reservations];

            bookingStatus.textContent = `Room reserved! Confirmation ${confirmation} sent to ${email}.`;
            confirmationId.textContent = confirmation;
            confirmationDates.textContent = formatDateRange(startDate, endDate);
            confirmationRoom.textContent = room;
            confirmationGuests.textContent = guests;
            confirmationRate.textContent = `$${rate} / night`;
            confirmationTotal.textContent = `$${total}`;

            lastBookingDetail.textContent = `Room reserved! ${newReservation.name} just reserved ${room} for ${formatDateRange(startDate, endDate)}.`;
            const nextAvailableDate = new Date(endDate.getTime() + 24 * 60 * 60 * 1000);
            nextAvailable.textContent = `Next available: ${nextAvailableDate.toLocaleDateString('en-US', { month: 'long', day: 'numeric' })}`;
            const remaining = Math.max(0, inventory - overlapping - 1);
            inventoryNote.textContent = `Only ${remaining} rooms left this weekend.`;

            updateRecentReservations();
            bookingForm.reset();
        });
    </script>
</body>
</html>


