-- Requêtes SQL utiles pour la table "votes"

-- 1. Tous les votes
SELECT * FROM votes;

-- 2. Trier par nombre de votes (du plus grand au plus petit)
SELECT * FROM votes ORDER BY nombre_de_vote DESC;

-- 3. Top 5 les plus votés
SELECT titre, nombre_de_vote FROM votes ORDER BY nombre_de_vote DESC LIMIT 5;

-- 4. Total de tous les votes
SELECT SUM(nombre_de_vote) AS total_votes FROM votes;

-- 5. Moyenne des votes
SELECT AVG(nombre_de_vote) AS moyenne_votes FROM votes;

-- 6. Votes sans photo
SELECT * FROM votes WHERE photo IS NULL OR photo = '';

-- 7. Rechercher par titre
SELECT * FROM votes WHERE titre LIKE '%recherche%';

-- 8. Votes ayant plus de X votes
SELECT * FROM votes WHERE nombre_de_vote > 100;

-- 9. Incrémenter le nombre de votes d'un élément
UPDATE votes SET nombre_de_vote = nombre_de_vote + 1, updated_at = datetime('now') WHERE id = 1;

-- 10. Décrémenter (sans passer en dessous de 0)
UPDATE votes SET nombre_de_vote = nombre_de_vote - 1, updated_at = datetime('now') WHERE id = 1 AND nombre_de_vote > 0;

-- 11. Insérer un nouveau vote
INSERT INTO votes (titre, nombre_de_vote, created_at, updated_at) VALUES ('Nouveau vote', 0, datetime('now'), datetime('now'));

-- 12. Supprimer les votes à 0
DELETE FROM votes WHERE nombre_de_vote <= 0;

-- 13. Nombre total d'enregistrements
SELECT COUNT(*) AS total_enregistrements FROM votes;

-- 14. Min / Max des votes
SELECT MIN(nombre_de_vote) AS min_votes, MAX(nombre_de_vote) AS max_votes FROM votes;
