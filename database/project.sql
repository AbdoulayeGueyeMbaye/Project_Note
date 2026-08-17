-- Active: 1785149650992@@127.0.0.1@5432@gestion_rh
-- =============================================================================
-- SCRIPT SQL COMPLETE - BASE DE DONNEES (POSTGRESQL) : gestion_notes
-- Système de Gestion des Notes - Groupe Scolaire Al Amal
-- SGBD : PostgreSQL
-- Contient : 
--   1. Création des tables (DDL) selon la nouvelle modélisation UML
--   2. Insertions des données (DML)
--   3. Requêtes SELECT complexes (Calculs de moyennes, etc.)
--   4. Exemples de Transactions SQL (ACID)
-- =============================================================================

-- Nettoyage des tables existantes (Cascade pour gérer les dépendances)

DROP TABLE IF EXISTS transferts CASCADE;
DROP TABLE IF EXISTS inscriptions CASCADE;
DROP TABLE IF EXISTS eleves CASCADE;
DROP TABLE IF EXISTS classes CASCADE;
DROP TABLE IF EXISTS utilisateurs CASCADE;
DROP TABLE IF EXISTS roles CASCADE;
DROP TABLE IF EXISTS annees_scolaires CASCADE;



CREATE TABLE annees_scolaires (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL, 
    est_active BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50) UNIQUE NOT NULL 
);


CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role_id INT REFERENCES roles(id) ON DELETE SET NULL
);


CREATE TABLE classes (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);


CREATE TABLE inscriptions (
   id SERIAL PRIMARY KEY,
    matricule varchar(50) UNIQUE NOT NULL,
    eleve_id INT NOT NULL REFERENCES eleves(id) ON DELETE CASCADE,
    classe_id INT NOT NULL REFERENCES classes(id) ON DELETE CASCADE,
    annee_scolaire_id INT NOT NULL REFERENCES annees_scolaires(id) ON DELETE CASCADE,
    date_inscription DATE DEFAULT CURRENT_DATE,
    CONSTRAINT unique_eleve_classe_annee UNIQUE (eleve_id, classe_id, annee_scolaire_id)
);


CREATE TABLE eleves (
    id SERIAL PRIMARY KEY,
    matricule VARCHAR(50) UNIQUE NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL
);

CREATE TABLE transferts (
    id SERIAL PRIMARY KEY,
    eleve_id INT NOT NULL REFERENCES eleves(id) ON DELETE CASCADE,
    classe_origine_id INT NOT NULL REFERENCES classes(id) ON DELETE CASCADE,
    classe_destination_id INT NOT NULL REFERENCES classes(id) ON DELETE CASCADE,
    date_transfert DATE DEFAULT CURRENT_DATE,
    motif TEXT DEFAULT NULL
);



INSERT INTO annees_scolaires (id, libelle, est_active) VALUES 
(1, '2024-2025', FALSE),
(2, '2025-2026', TRUE);

INSERT INTO roles (id, libelle) VALUES 
(1, 'ADMIN'),
(2, 'ENSEIGNANT');

INSERT INTO utilisateurs (id, nom, email, mot_de_passe, role_id) VALUES 
(1, 'Fatou Sall', 'fatou.sall@alamal.sn', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFwWqI0qXk3/e8fCg', 1),
(2, 'M. Diop ', 'diop@alamal.sn', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFwWqI0qXk3/e8fCg', 2),
(3, 'Mme. Ndiaye ', 'ndiaye@alamal.sn', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFwWqI0qXk3/e8fCg', 2);

INSERT INTO classes (id, nom) VALUES 
(1, 'CM2 A'),
(2, 'CM2 B'),
(3, 'CP A'),
(4, 'CI B');


INSERT INTO eleves (id, matricule, nom, prenom) VALUES 
(1, 'JE-26002', 'Fall', 'Moussa'),
(2, 'JE-26003', 'Ndiaye', 'Fatou'),
(3, 'JE-26004', 'Diallo', 'Ibrahima'),
(4, 'JE-26005', 'Sow', 'Khadija'),
(5, 'JE-26006', 'Faye', 'Ousmane');

INSERT INTO inscriptions (id, matricule, eleve_id, classe_id, annee_scolaire_id) VALUES 
(1, 'JE-26002', 1, 1, 2),
(2, 'JE-26003', 2, 1, 2),
(3, 'JE-26004', 3, 1, 2),
(4, 'JE-26005', 4, 1, 2),
(5, 'JE-26006', 5, 1, 2);


INSERT INTO transferts (id, eleve_id, classe_origine_id, classe_destination_id, date_transfert, motif) VALUES 
(1, 3, 1, 2, '2025-01-15', 'Changement de classe pour raisons académiques'),
(2, 4, 1, 3, '2025-02-10', 'Transfert vers une autre section'),
(3, 5, 1, 4, '2025-03-05', 'Transfert pour raisons personnelles');



