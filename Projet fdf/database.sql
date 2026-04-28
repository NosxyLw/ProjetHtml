
-- On supprime la base si elle existe déjà (pour repartir proprement)
DROP DATABASE IF EXISTS fdf;
-- Création de la base avec l'encodage UTF-8 (accents, etc.)
CREATE DATABASE fdf CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- On sélectionne la base pour la suite du script
USE fdf;
-- ============================================================
-- TABLE : TYPE_PRESTATION
-- Stocke les catégories de prestations (Pratique libre, Stage, Tournoi)
-- ============================================================
CREATE TABLE TYPE_PRESTATION (
    id_type INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique auto-incrémenté
    libelle_type VARCHAR(100) NOT NULL -- Nom du type, obligatoire
);
-- ============================================================
-- TABLE : PRESTATION
-- Stocke les offres proposées par FDF (stages, créneaux, tournois)
-- ============================================================
CREATE TABLE PRESTATION (
    code_prestation VARCHAR(20) PRIMARY KEY, -- Code unique ex: 'PL-01'
    description TEXT, -- Description longue de la prestation
    nb_places_max INT NOT NULL DEFAULT 20, -- Nombre max de participants
    prix DECIMAL(8,2) NOT NULL DEFAULT 0, -- Tarif en euros (ex: 12.50)
    age_limite INT DEFAULT 0, -- 0 = pas de limite d'âge
    id_type INT, -- Clé étrangère vers TYPE_PRESTATION
    -- La FOREIGN KEY assure qu'on ne peut pas mettre un id_type inexistant
    -- ON DELETE SET NULL : si le type est supprimé, id_type passe à NULL
    CONSTRAINT fk_prestation_type FOREIGN KEY (id_type)
        REFERENCES TYPE_PRESTATION(id_type) ON DELETE SET NULL
);
-- ============================================================
-- TABLE : ADHERENT
-- Stocke les membres inscrits sur l'application FDF
-- ============================================================
CREATE TABLE ADHERENT (
    id_adherent INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique
    nom VARCHAR(50) NOT NULL, -- Nom de famille
    prenom VARCHAR(50) NOT NULL, -- Prénom
    adresse VARCHAR(200), -- Adresse postale (optionnel)
    telephone VARCHAR(15), -- Téléphone (optionnel)
    email VARCHAR(100) NOT NULL UNIQUE, -- Email = identifiant de connexion (unique)
    mot_de_passe VARCHAR(255) NOT NULL, -- Mot de passe HACHÉ (jamais en clair)
    est_admin TINYINT(1) DEFAULT 0, -- 0 = adhérent, 1 = responsable admin
    date_inscription DATETIME DEFAULT NOW() -- Date et heure d'inscription automatique
);
-- ============================================================
-- TABLE : SEANCE
-- Représente une session concrète d'une prestation (date + heure)
-- Ex : le stage 'STAGE-ENF' se déroule le 10/07 de 9h à 12h
-- ============================================================
CREATE TABLE SEANCE (
    id_seance INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique
    date_seance DATE NOT NULL, -- Date de la séance (format AAAA-MM-JJ)
    heure_debut TIME NOT NULL, -- Heure de début (format HH:MM:SS)
    heure_fin TIME NOT NULL, -- Heure de fin
    code_prestation VARCHAR(20), -- Prestation à laquelle appartient cette séance
    -- ON DELETE CASCADE : si la prestation est supprimée, ses séances le sont aussi
    CONSTRAINT fk_seance_prestation FOREIGN KEY (code_prestation)
        REFERENCES PRESTATION(code_prestation) ON DELETE CASCADE
);
-- ============================================================
-- TABLE : RESERVATION
-- Lien entre un adhérent et une séance (table de jonction)
-- Chaque ligne = 'tel adhérent a réservé telle séance'
-- ============================================================
CREATE TABLE RESERVATION (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    date_reservation DATETIME DEFAULT NOW(), -- Horodatage automatique de la réservation
    id_adherent INT NOT NULL, -- Qui a réservé
    id_seance INT NOT NULL, -- Quelle séance
    -- Un adhérent ne peut pas réserver deux fois la même séance
    UNIQUE KEY unicite_reservation (id_adherent, id_seance),
    CONSTRAINT fk_resa_adherent FOREIGN KEY (id_adherent)
        REFERENCES ADHERENT(id_adherent) ON DELETE CASCADE,
    CONSTRAINT fk_resa_seance FOREIGN KEY (id_seance)
        REFERENCES SEANCE(id_seance) ON DELETE CASCADE
);
-- ============================================================
-- DONNÉES DE TEST (jeu d'essai)
-- ============================================================
-- 3 types de prestations
INSERT INTO TYPE_PRESTATION (libelle_type) VALUES
    ('Pratique libre'),
    ('Stage'),
    ('Tournoi');
-- 3 prestations exemples
INSERT INTO PRESTATION VALUES
    ('PL-ADULTE', 'Créneau libre adulte, terrain réservé 1h', 20, 8.00, 0, 1),
    ('STAGE-ENF', 'Stage enfant vacances scolaires (5 jours)', 12, 60.00, 14, 2),
    ('TOURN-ETE', 'Tournoi estival inter-clubs, format 5v5', 40, 15.00, 0, 3);
-- 1 compte administrateur (mot de passe : 'admin123' haché avec password_hash)
-- En production, générer ce hash avec : echo password_hash('votremdp', PASSWORD_DEFAULT);
INSERT INTO ADHERENT (nom, prenom, email, mot_de_passe, est_admin) VALUES
    ('Dupont', 'Marie', 'admin@fdf.fr',
     '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1);
-- Note : ce hash correspond au mot de passe 'password' (exemple Laravel)
-- Remplacez-le par votre propre hash !
-- 2 adhérents de test (mot de passe : 'Test1234')
INSERT INTO ADHERENT (nom, prenom, adresse, telephone, email, mot_de_passe) VALUES
    ('Martin', 'Lucas', '12 rue des lilas, 75001 Paris', '0612345678',
     'lucas@mail.fr', '$2y$10$TKh8H1.PfTf3tHrXZjLqm.h0zLmEjP9s7x2j9F1WqC0zJxKJHqHGW'),
    ('Bernard', 'Emma', '5 av Victor Hugo, 91300 Massy', '0698765432',
     'emma@mail.fr', '$2y$10$TKh8H1.PfTf3tHrXZjLqm.h0zLmEjP9s7x2j9F1WqC0zJxKJHqHGW');
-- Séances pour PL-ADULTE
INSERT INTO SEANCE (date_seance, heure_debut, heure_fin, code_prestation) VALUES
    ('2026-05-05', '18:00:00', '19:00:00', 'PL-ADULTE'),
    ('2026-05-07', '20:00:00', '21:00:00', 'PL-ADULTE'),
    ('2026-05-12', '19:00:00', '20:00:00', 'PL-ADULTE');
-- Séances pour STAGE-ENF
INSERT INTO SEANCE (date_seance, heure_debut, heure_fin, code_prestation) VALUES
    ('2026-07-07', '09:00:00', '12:00:00', 'STAGE-ENF'),
    ('2026-07-08', '09:00:00', '12:00:00', 'STAGE-ENF');
-- Séances pour TOURN-ETE
INSERT INTO SEANCE (date_seance, heure_debut, heure_fin, code_prestation) VALUES
    ('2026-08-15', '10:00:00', '18:00:00', 'TOURN-ETE');
-- Réservation de test : Lucas réserve la 1ère séance PL-ADULTE
INSERT INTO RESERVATION (id_adherent, id_seance) VALUES (2, 1);
