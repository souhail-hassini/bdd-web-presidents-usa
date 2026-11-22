-- =============================================================
--  Présidents des États-Unis – Requêtes d'exemple
--  Exécuter après 01_schema.sql et 02_donnees.sql
-- =============================================================

-- 1. Liste chronologique des présidents avec leurs dates de mandat
SELECT m.numero_mandat, d.prenom, d.nom, d.parti, m.date_debut, m.date_fin
FROM MANDAT m
JOIN DIRIGEANT d ON d.id_dirigeant = m.id_dirigeant
ORDER BY m.date_debut;

-- 2. Durée totale au pouvoir de chaque président (en années), du plus long au plus court
SELECT d.prenom, d.nom,
       ROUND(SUM(m.date_fin - m.date_debut) / 365.25, 1) AS annees_au_pouvoir,
       COUNT(*) AS nb_mandats
FROM MANDAT m
JOIN DIRIGEANT d ON d.id_dirigeant = m.id_dirigeant
GROUP BY d.id_dirigeant, d.prenom, d.nom
ORDER BY annees_au_pouvoir DESC;

-- 3. Les vice-présidents de chaque président
SELECT p.prenom || ' ' || p.nom   AS president,
       vp.prenom || ' ' || vp.nom AS vice_president,
       a.date_debut_vp, a.date_fin_vp, a.motif_fin
FROM ASSISTE a
JOIN MANDAT m     ON m.id_mandat = a.id_mandat
JOIN DIRIGEANT p  ON p.id_dirigeant = m.id_dirigeant
JOIN DIRIGEANT vp ON vp.id_dirigeant = a.id_dirigeant
ORDER BY a.date_debut_vp;

-- 4. Vice-présidents devenus présidents
SELECT DISTINCT d.prenom, d.nom
FROM DIRIGEANT d
WHERE d.id_dirigeant IN (SELECT id_dirigeant FROM ASSISTE)
  AND d.id_dirigeant IN (SELECT id_dirigeant FROM MANDAT)
ORDER BY d.nom;

-- 5. Présidents arrivés au pouvoir par succession (décès ou démission du président)
SELECT d.prenom, d.nom, a.date_fin_vp AS date_prise_de_fonction
FROM ASSISTE a
JOIN DIRIGEANT d ON d.id_dirigeant = a.id_dirigeant
WHERE a.motif_fin = 'Succession'
ORDER BY a.date_fin_vp;

-- 6. Présidents morts en fonction
SELECT d.prenom, d.nom, d.date_deces
FROM MANDAT m
JOIN DIRIGEANT d ON d.id_dirigeant = m.id_dirigeant
WHERE d.date_deces = m.date_fin
ORDER BY d.date_deces;

-- 7. Nombre de présidents par parti
SELECT d.parti, COUNT(DISTINCT d.id_dirigeant) AS nb_presidents
FROM DIRIGEANT d
JOIN MANDAT m ON m.id_dirigeant = d.id_dirigeant
GROUP BY d.parti
ORDER BY nb_presidents DESC;

-- 8. États de naissance ayant donné le plus de présidents
SELECT d.etat_origine, COUNT(DISTINCT d.id_dirigeant) AS nb_presidents
FROM DIRIGEANT d
JOIN MANDAT m ON m.id_dirigeant = d.id_dirigeant
GROUP BY d.etat_origine
ORDER BY nb_presidents DESC, d.etat_origine
LIMIT 5;

-- 9. Âge de chaque président à sa première prise de fonction (du plus jeune au plus âgé)
SELECT d.prenom, d.nom,
       DATE_PART('year', AGE(MIN(m.date_debut), d.date_naissance)) AS age_entree
FROM DIRIGEANT d
JOIN MANDAT m ON m.id_dirigeant = d.id_dirigeant
GROUP BY d.id_dirigeant, d.prenom, d.nom, d.date_naissance
ORDER BY age_entree;

-- 10. Présidents ayant exercé des mandats non consécutifs (un autre président entre les deux)
SELECT DISTINCT d.prenom, d.nom
FROM MANDAT m1
JOIN MANDAT m2   ON m2.id_dirigeant = m1.id_dirigeant AND m2.date_debut > m1.date_fin
JOIN DIRIGEANT d ON d.id_dirigeant = m1.id_dirigeant
WHERE EXISTS (
    SELECT 1 FROM MANDAT x
    WHERE x.id_dirigeant <> m1.id_dirigeant
      AND x.date_debut >= m1.date_fin
      AND x.date_fin   <= m2.date_debut
);
