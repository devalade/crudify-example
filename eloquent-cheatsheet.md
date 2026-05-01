# Eloquent — pense-bête

Remplace `YourModel` par ton modèle.

```php
// Lire
YourModel::all();
YourModel::paginate(10);
YourModel::find(1);
YourModel::first();

// Filtrer
YourModel::where('name', 'like', '%mot%')->get();
YourModel::where('votes', '>', 100)->get();

// Trier
YourModel::orderBy('votes', 'desc')->get();
YourModel::latest()->limit(5)->get();

// Agrégats
YourModel::sum('votes');
YourModel::count();
YourModel::min('votes');
YourModel::max('votes');

// Modifier
YourModel::where('id', 1)->increment('votes');
YourModel::where('id', 1)->where('votes', '>', 0)->decrement('votes');
YourModel::where('id', 1)->update(['name' => '...']);

// Créer
YourModel::create(['name' => '...']);

// Vérifier
YourModel::where('name', 'X')->exists();
```
