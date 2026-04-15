<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDF - Fou De Foot | Futsal & Réservations</title>
    <link rel="stylesheet" href="fdf-modern.css">
</head>
<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-container">
            <a href="index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestation.php">Prestations</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php" class="btn btn-primary" style="margin-left: 1rem;">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h1>FUTSAL.<br><span class="hero-accent">PASSION.</span><br>COMMUNAUTÉ.</h1>
            <p>Réservez vos créneaux de <strong class="hero-accent">pratique libre</strong>, 
               inscrivez-vous aux <strong class="hero-accent">stages</strong> et participez 
               aux <strong class="hero-accent">tournois</strong> les plus intenses de la région.</p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="prestation.php" class="btn btn-primary">Découvrir les prestations</a>
                <a href="inscription.php" class="btn btn-secondary">Créer mon compte</a>
            </div>
        </div>
    </section>

    <!-- PRESTATIONS SECTION -->
    <div class="container">
        <section class="section">
            <div class="section-header">
                <h2>Nos Prestations</h2>
                <p>Choisissez parmi nos différentes offres adaptées à tous les niveaux</p>
            </div>

            <div class="cards-grid">
                <!-- CARD 1: Pratique Libre -->
                <div class="card fade-in">
                    <div class="card-header">
                        <h3>PRATIQUE LIBRE</h3>
                        <span class="card-badge">Tout public</span>
                    </div>
                    <div class="card-body">
                        <div class="card-info">
                            <span class="card-info-icon">⏱</span>
                            <span>Créneaux d'1h disponibles</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">👥</span>
                            <span>20 places maximum par séance</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">🏟</span>
                            <span>Terrain de futsal professionnel</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">✅</span>
                            <span class="badge badge-available">Places disponibles</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">8,00 € <small>/ séance</small></div>
                        <a href="reserver.php?code=PL-ADULTE" class="btn btn-primary" style="padding: 0.6rem 1.2rem;">Réserver</a>
                    </div>
                </div>

                <!-- CARD 2: Stage Enfant -->
                <div class="card fade-in" style="animation-delay: 0.1s;">
                    <div class="card-header">
                        <h3>STAGE ENFANT</h3>
                        <span class="card-badge">-14 ans</span>
                    </div>
                    <div class="card-body">
                        <div class="card-info">
                            <span class="card-info-icon">📅</span>
                            <span>5 jours intensifs</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">👥</span>
                            <span>12 places maximum</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">🎓</span>
                            <span>Encadrement professionnel</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">🎯</span>
                            <span>Progression technique garantie</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">60,00 € <small>/ stage</small></div>
                        <a href="reserver.php?code=STAGE-ENF" class="btn btn-primary" style="padding: 0.6rem 1.2rem;">Réserver</a>
                    </div>
                </div>

                <!-- CARD 3: Tournoi -->
                <div class="card fade-in" style="animation-delay: 0.2s;">
                    <div class="card-header">
                        <h3>TOURNOI ÉTÉ</h3>
                        <span class="card-badge">Format 5v5</span>
                    </div>
                    <div class="card-body">
                        <div class="card-info">
                            <span class="card-info-icon">🏆</span>
                            <span>Compétition inter-clubs</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">👥</span>
                            <span>40 équipes maximum</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">⚡</span>
                            <span>Journée complète d'action</span>
                        </div>
                        <div class="card-info">
                            <span class="card-info-icon">🎁</span>
                            <span>Lots et récompenses</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">15,00 € <small>/ équipe</small></div>
                        <a href="reserver.php?code=TOURN-ETE" class="btn btn-primary" style="padding: 0.6rem 1.2rem;">Réserver</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- STATS SECTION -->
        <section class="section">
            <div class="section-header">
                <h2>FDF en Chiffres</h2>
                <p>Une communauté dynamique et passionnée</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">450+</div>
                    <div class="stat-label">Adhérents actifs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1200+</div>
                    <div class="stat-label">Séances réservées</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24</div>
                    <div class="stat-label">Prestations disponibles</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Satisfaction client</div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="section" style="text-align: center; padding: 4rem 0; background: linear-gradient(135deg, rgba(0, 255, 135, 0.1) 0%, transparent 100%); border: 4px solid var(--noir-profond); margin-top: 3rem;">
            <h2 style="margin-bottom: 1.5rem;">PRÊT À REJOINDRE L'AVENTURE ?</h2>
            <p style="max-width: 600px; margin: 0 auto 2rem; font-size: 1.1rem;">
                Créez votre compte en quelques clics et accédez à toutes nos prestations. 
                Réservation simplifiée, paiement sécurisé, communauté active.
            </p>
            <a href="inscription.php" class="btn btn-primary" style="font-size: 1.2rem; padding: 1.2rem 2.5rem;">
                Créer mon compte gratuitement
            </a>
        </section>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FOU DE FOOT</h3>
                <p>Votre club de futsal préféré depuis 2020.</p>
                <p style="margin-top: 1rem;">
                    <strong>📍 Adresse:</strong><br>
                    15 Avenue du Sport<br>
                    75013 Paris
                </p>
            </div>
            <div class="footer-section">
                <h3>Navigation</h3>
                <p><a href="index.php">Accueil</a></p>
                <p><a href="prestations.php">Prestations</a></p>
                <p><a href="connexion.php">Connexion</a></p>
                <p><a href="inscription.php">Inscription</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>📞 <a href="tel:0123456789">01 23 45 67 89</a></p>
                <p>📧 <a href="mailto:contact@fdf.fr">contact@fdf.fr</a></p>
                <p style="margin-top: 1rem;">
                    <strong>Horaires:</strong><br>
                    Lun-Ven: 9h-22h<br>
                    Sam-Dim: 10h-20h
                </p>
            </div>
            <div class="footer-section">
                <h3>Suivez-nous</h3>
                <p><a href="#">Facebook</a></p>
                <p><a href="#">Instagram</a></p>
                <p><a href="#">Twitter</a></p>
                <p><a href="#">YouTube</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 FOU DE FOOT - Tous droits réservés | Mentions légales | CGV</p>
        </div>
    </footer>

    <script>
        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .stat-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>
