-- =============================================================
--  Présidents des États-Unis – Schéma de la base de données
--  SGBD : PostgreSQL
--  Projet L2 Informatique – Université Le Havre Normandie – Souhail Hassini
-- =============================================================
--  DIRIGEANT : toute personne ayant été président et/ou vice-président
--  MANDAT    : période d'exercice d'un président (un mandat électoral
--              peut être partagé entre deux présidents en cas de décès
--              ou de démission ; ils ont alors le même numero_mandat)
--  ASSISTE   : un vice-président assiste un président pendant un mandat
-- =============================================================

DROP TABLE IF EXISTS ASSISTE;
DROP TABLE IF EXISTS MANDAT;
DROP TABLE IF EXISTS DIRIGEANT;

CREATE TABLE DIRIGEANT (
    id_dirigeant    SERIAL       PRIMARY KEY,
    nom             VARCHAR(50)  NOT NULL,
    prenom          VARCHAR(50)  NOT NULL,
    date_naissance  DATE         NOT NULL,
    date_deces      DATE,                         -- NULL si la personne est vivante
    parti           VARCHAR(50),
    etat_origine    VARCHAR(50),                  -- État de naissance
    CONSTRAINT ck_dirigeant_dates CHECK (date_deces IS NULL OR date_deces > date_naissance)
);

CREATE TABLE MANDAT (
    id_mandat       SERIAL       PRIMARY KEY,
    numero_mandat   INTEGER      NOT NULL CHECK (numero_mandat > 0),  -- n° du mandat électoral (1 = 1789)
    date_debut      DATE         NOT NULL,
    date_fin        DATE         NOT NULL,        -- date de fin prévue pour le mandat en cours
    id_dirigeant    INTEGER      NOT NULL REFERENCES DIRIGEANT (id_dirigeant),
    CONSTRAINT ck_mandat_dates CHECK (date_fin > date_debut)
);

CREATE TABLE ASSISTE (
    id_assiste      SERIAL       PRIMARY KEY,
    id_mandat       INTEGER      NOT NULL REFERENCES MANDAT (id_mandat),
    id_dirigeant    INTEGER      NOT NULL REFERENCES DIRIGEANT (id_dirigeant),  -- le vice-président
    date_debut_vp   DATE         NOT NULL,
    date_fin_vp     DATE         NOT NULL,
    motif_fin       VARCHAR(20)  NOT NULL
        CHECK (motif_fin IN ('Fin normale', 'Deces', 'Demission', 'Succession', 'En cours')),
    CONSTRAINT ck_assiste_dates CHECK (date_fin_vp > date_debut_vp)
);

CREATE INDEX idx_mandat_dirigeant  ON MANDAT  (id_dirigeant);
CREATE INDEX idx_assiste_mandat    ON ASSISTE (id_mandat);
CREATE INDEX idx_assiste_dirigeant ON ASSISTE (id_dirigeant);
