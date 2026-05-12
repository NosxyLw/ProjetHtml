<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - FDF | Fou De Foot</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="prestation.php">Mon espace</a></li>
                <li><a href="prestation.php">Prestations</a></li>
                <li><a href="../Reservation/reservation.php">Mes réservations</a></li>
                <li><a href="../../index.php" class="btn btn-danger" style="margin-left: 1rem;">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="hero" style="min-height: 40vh;">
        <div class="hero-content">
            <h1>BIENVENUE,<br><span class="hero-accent">LUCAS MARTIN</span></h1>
            <p>Votre espace personnel FDF | Gérez vos réservations et découvrez de nouvelles prestations</p>
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success">✅ Bon retour, Lucas Martin !</div>

        <div class="stats-grid">
            <div class="stat-card"><div class="stat-number">8</div><div class="stat-label">Réservations effectuées</div></div>
            <div class="stat-card"><div class="stat-number">3</div><div class="stat-label">Séances à venir</div></div>
            <div class="stat-card"><div class="stat-number">12</div><div class="stat-label">Prestations disponibles</div></div>
            <div class="stat-card"><div class="stat-number">96h</div><div class="stat-label">Temps de jeu total</div></div>
        </div>

        <section class="section">
            <div class="section-header">
                <h2>Mes Prochaines Séances</h2>
                <p>Vos réservations à venir</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Horaires</th>
                        <th>Prestation</th>
                        <th>Prix</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>05/05/2026</strong></td>
                        <td>18:00 – 19:00</td>
                        <td>Créneau libre adulte, terrain réservé 1h</td>
                        <td>8,00 €</td>
                        <td><span class="badge badge-reserved">Réservé</span></td>
                    </tr>
                    <tr>
                        <td><strong>07/05/2026</strong></td>
                        <td>20:00 – 21:00</td>
                        <td>Créneau libre adulte, terrain réservé 1h</td>
                        <td>8,00 €</td>
                        <td><span class="badge badge-reserved">Réservé</span></td>
                    </tr>
                    <tr>
                        <td><strong>15/08/2026</strong></td>
                        <td>10:00 – 18:00</td>
                        <td>Tournoi estival inter-clubs, format 5v5</td>
                        <td>15,00 €</td>
                        <td><span class="badge badge-reserved">Réservé</span></td>
                    </tr>
                </tbody>
            </table>

            <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="prestation.php" class="btn btn-primary">Voir toutes les prestations</a>
                <a href="../Reservation/reservation.php" class="btn btn-secondary">Toutes mes réservations</a>
            </div>
        </section>

        <section class="section">
            <div class="section-header">
                <h2>Prestations Disponibles</h2>
                <p>Découvrez ce que nous proposons cette semaine</p>
            </div>

            <div class="cards-grid">
                <div class="card">
                    <div class="card-header">
                        <h3>PRATIQUE LIBRE</h3>
                        <span class="card-badge">Mardi 20h</span>
                    </div>
                    <div class="card-body">
                        <div class="card-info"><span class="card-info-icon">📅</span><span>06/05/2026</span></div>
                        <div class="card-info"><span class="card-info-icon">👥</span><span>15/20 places disponibles</span></div>
                        <div class="card-info"><span class="card-info-icon">✅</span><span class="badge badge-available">Disponible</span></div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">8,00 €</div>
                        <a href="../Reservation/reservation.php" class="btn btn-primary" style="padding: 0.6rem 1.2rem;">Réserver</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>STAGE ENFANT</h3>
                        <span class="card-badge">Vacances été</span>
                    </div>
                    <div class="card-body">
                        <div class="card-info"><span class="card-info-icon">📅</span><span>07-11 Juillet 2026</span></div>
                        <div class="card-info"><span class="card-info-icon">👥</span><span>8/12 places disponibles</span></div>
                        <div class="card-info"><span class="card-info-icon">✅</span><span class="badge badge-available">Disponible</span></div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">60,00 €</div>
                        <a href="../Reservation/reservation.php" class="btn btn-primary" style="padding: 0.6rem 1.2rem;">Réserver</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>PRATIQUE LIBRE</h3>
                        <span class="card-badge">Jeudi 19h</span>
                    </div>
                    <div class="card-body">
                        <div class="card-info"><span class="card-info-icon">📅</span><span>08/05/2026</span></div>
                        <div class="card-info"><span class="card-info-icon">👥</span><span>20/20 places</span></div>
                        <div class="card-info"><span class="card-info-icon">❌</span><span class="badge badge-full">Complet</span></div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">8,00 €</div>
                        <button class="btn btn-secondary" style="padding: 0.6rem 1.2rem; opacity: 0.6;" disabled>Complet</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="background: linear-gradient(135deg, var(--noir-profond) 0%, var(--gris-beton) 100%); padding: 3rem; border: 4px solid var(--vert-terrain); margin-top: 3rem;">
            <h2 style="color: var(--vert-terrain); text-align: center; margin-bottom: 2rem;">Actions Rapides</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                <a href="../Reservation/reservation.php" class="btn btn-primary" style="padding: 1.2rem; text-align: center;">🏟 Réserver une séance</a>
                <a href="../Reservation/reservation.php" class="btn btn-secondary" style="padding: 1.2rem; text-align: center;">📋 Mes réservations</a>
                <a href="prestation.php" class="btn btn-secondary" style="padding: 1.2rem; text-align: center;">⚙️ Mon profil</a>
                <a href="prestation.php" class="btn btn-secondary" style="padding: 1.2rem; text-align: center;">📊 Mon historique</a>
            </div>
        </section>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FOU DE FOOT</h3>
                <p>Votre club de futsal préféré depuis 2020.</p>
            </div>
            <div class="footer-section">
                <h3>Navigation</h3>
                <p><a href="../../index.php">Accueil</a></p>
                <p><a href="prestation.php">Mon espace</a></p>
                <p><a href="../Reservation/reservation.php">Mes réservations</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>📞 <a href="tel:0123456789">01 23 45 67 89</a></p>
                <p>📧 <a href="mailto:contact@fdf.fr">contact@fdf.fr</a></p>
            </div>
            <div class="footer-section">
                <h3>Horaires</h3>
                <p>Lun-Ven: 9h-22h<br>Sam-Dim: 10h-20h</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 FOU DE FOOT - Tous droits réservés</p>
        </div>
    </footer>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.card, .stat-card, table').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>
