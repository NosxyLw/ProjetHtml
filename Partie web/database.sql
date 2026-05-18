DROP DATABASE IF EXISTS fdf;

CREATE DATABASE fdf CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE fdf;

CREATE TABLE COMPTE (
    email VARCHAR(100) PRIMARY KEY,
    mot_de_passe VARCHAR(255) NOT NULL,
    est_admin INT(1) DEFAULT 0
);

CREATE TABLE TYPE_PRESTATION (
    id_type INT AUTO_INCREMENT PRIMARY KEY,
    libelle_type VARCHAR(100) NOT NULL
);

CREATE TABLE PRESTATION (
    code_prestation VARCHAR(20) PRIMARY KEY,
    description TEXT,
    nb_places_max INT NOT NULL DEFAULT 20,
    prix DECIMAL(8,2) NOT NULL DEFAULT 0,
    age_limite INT DEFAULT 0,
    id_type INT,
    CONSTRAINT fk_prestation_type FOREIGN KEY (id_type)
        REFERENCES TYPE_PRESTATION(id_type) ON DELETE SET NULL
);

CREATE TABLE ADHERENT (
    id_adherent INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    genre VARCHAR(20),
    adresse VARCHAR(200),
    telephone VARCHAR(15),
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    est_admin TINYINT(1) DEFAULT 0,
    date_inscription DATETIME DEFAULT NOW()
);

CREATE TABLE SEANCE (
    id_seance INT AUTO_INCREMENT PRIMARY KEY,
    date_seance DATE NOT NULL,
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    code_prestation VARCHAR(20),
    CONSTRAINT fk_seance_prestation FOREIGN KEY (code_prestation)
        REFERENCES PRESTATION(code_prestation) ON DELETE CASCADE
);

CREATE TABLE RESERVATION (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    date_reservation DATETIME DEFAULT NOW(),
    id_adherent INT NOT NULL,
    id_seance INT NOT NULL,
    UNIQUE KEY unicite_reservation (id_adherent, id_seance),
    CONSTRAINT fk_resa_adherent FOREIGN KEY (id_adherent)
        REFERENCES ADHERENT(id_adherent) ON DELETE CASCADE,
    CONSTRAINT fk_resa_seance FOREIGN KEY (id_seance)
        REFERENCES SEANCE(id_seance) ON DELETE CASCADE
);

INSERT INTO TYPE_PRESTATION (libelle_type) VALUES
    ('Pratique libre'),
    ('Stage'),
    ('Tournoi');

INSERT INTO PRESTATION VALUES
    ('PL-ADULTE', 'Créneau libre adulte, terrain réservé 1h', 20, 8.00, 0, 1),
    ('STAGE-ENF', 'Stage enfant vacances scolaires (5 jours)', 12, 60.00, 14, 2),
    ('TOURN-ETE', 'Tournoi estival inter-clubs, format 5v5', 40, 15.00, 0, 3);

INSERT INTO ADHERENT (nom, prenom, email, mot_de_passe, est_admin) VALUES
    ('Dupont', 'Marie', 'admin@fdf.fr', 'admin123', 1);

INSERT INTO ADHERENT (nom, prenom, adresse, telephone, email, mot_de_passe) VALUES
    ('Martin', 'Lucas', '12 rue des lilas, 75001 Paris', '0612345678', 'lucas@mail.fr', 'Test1234'),
    ('Bernard', 'Emma', '5 av Victor Hugo, 91300 Massy', '0698765432', 'emma@mail.fr', 'Test1234');

INSERT INTO SEANCE (date_seance, heure_debut, heure_fin, code_prestation) VALUES
    ('2026-05-05', '18:00:00', '19:00:00', 'PL-ADULTE'),
    ('2026-05-07', '20:00:00', '21:00:00', 'PL-ADULTE'),
    ('2026-05-12', '19:00:00', '20:00:00', 'PL-ADULTE');

INSERT INTO SEANCE (date_seance, heure_debut, heure_fin, code_prestation) VALUES
    ('2026-07-07', '09:00:00', '12:00:00', 'STAGE-ENF'),
    ('2026-07-08', '09:00:00', '12:00:00', 'STAGE-ENF');

INSERT INTO SEANCE (date_seance, heure_debut, heure_fin, code_prestation) VALUES
    ('2026-08-15', '10:00:00', '18:00:00', 'TOURN-ETE');

INSERT INTO RESERVATION (id_adherent, id_seance) VALUES (2, 1);