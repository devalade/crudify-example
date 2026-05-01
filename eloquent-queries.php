<?php

/**
 * Requêtes Eloquent utiles — pense-bête pour le modèle Vote.
 *
 * Ce fichier n'est qu'un aide-mémoire, il n'est pas chargé par l'application.
 * Utilisez `php artisan tinker` pour tester ces requêtes en live.
 */

use App\Models\Vote;

// --- Lire ---

// Tous les votes
Vote::all();

// Pagination (10 par page)
Vote::paginate(10);

// Trouver par ID
Vote::find(1);
Vote::findOrFail(1);

// Premier / dernier
Vote::first();
Vote::latest()->first();

// --- Filtrer ---

// Par titre
Vote::where('titre', 'like', '%recherche%')->get();
Vote::where('titre', 'Mon vote')->first();

// Avec un minimum de votes
Vote::where('nombre_de_vote', '>', 100)->get();

// Avec photo
Vote::whereNotNull('photo')->get();

// Sans photo
Vote::whereNull('photo')->get();

// Plage de valeurs
Vote::whereBetween('nombre_de_vote', [10, 50])->get();

// --- Trier ---

// Par nombre de votes décroissant
Vote::orderBy('nombre_de_vote', 'desc')->get();

// Les 5 plus votés
Vote::orderBy('nombre_de_vote', 'desc')->limit(5)->get();

// Plus récents d'abord
Vote::latest()->get();

// Plus anciens d'abord
Vote::oldest()->get();

// --- Agrégats ---

// Total des votes
Vote::sum('nombre_de_vote');

// Moyenne
Vote::average('nombre_de_vote');

// Nombre d'enregistrements
Vote::count();

// Min / Max
Vote::min('nombre_de_vote');
Vote::max('nombre_de_vote');

// --- Modifier ---

// Incrémenter le nombre de vote
Vote::where('id', 1)->increment('nombre_de_vote');

// Décrémenter (avec vérification que c'est > 0)
Vote::where('id', 1)->where('nombre_de_vote', '>', 0)->decrement('nombre_de_vote');

// Mise à jour simple
Vote::where('id', 1)->update(['titre' => 'Nouveau titre']);

// Supprimer les votes à zéro
Vote::where('nombre_de_vote', '<=', 0)->delete();

// --- Créer ---

Vote::create([
    'titre'          => 'Mon vote',
    'nombre_de_vote' => 0,
]);

// --- Existence ---

// Vérifier qu'un vote existe
Vote::where('titre', 'Mon vote')->exists();
Vote::where('nombre_de_vote', '>', 100)->exists();

// --- Sélection partielle ---

// Seulement certains champs
Vote::select('id', 'titre', 'nombre_de_vote')->get();

// Compter les votes par plage
Vote::selectRaw("
    CASE
        WHEN nombre_de_vote = 0 THEN 'Aucun'
        WHEN nombre_de_vote < 10 THEN '1-9'
        WHEN nombre_de_vote < 50 THEN '10-49'
        ELSE '50+'
    END as plage,
    COUNT(*) as total
")->groupBy('plage')->get();
