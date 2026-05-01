<?php

/**
 * Eloquent — pense-bête
 *
 * `php artisan tinker` pour tester ces requêtes.
 * Remplacez `YourModel` par votre modèle.
 */

use App\Models\YourModel;

// --- Lire ---

YourModel::all();
YourModel::paginate(10);
YourModel::find(1);
YourModel::first();
YourModel::latest()->first();

// --- Filtrer ---

YourModel::where('name', 'like', '%mot%')->get();
YourModel::whereNotNull('image')->get();
YourModel::whereNull('image')->get();
YourModel::where('votes', '>', 100)->get();
YourModel::whereBetween('votes', [10, 50])->get();

// --- Trier ---

YourModel::orderBy('name', 'asc')->get();
YourModel::orderBy('votes', 'desc')->limit(5)->get();
YourModel::latest()->get();

// --- Agrégats ---

YourModel::sum('votes');
YourModel::average('votes');
YourModel::count();
YourModel::min('votes');
YourModel::max('votes');

// --- Modifier ---

YourModel::where('id', 1)->increment('votes');
YourModel::where('id', 1)->where('votes', '>', 0)->decrement('votes');
YourModel::where('id', 1)->update(['name' => 'Nouveau']);
YourModel::where('votes', '<=', 0)->delete();

// --- Créer ---

YourModel::create(['name' => '...']);

// --- Vérifier ---

YourModel::where('name', 'X')->exists();
