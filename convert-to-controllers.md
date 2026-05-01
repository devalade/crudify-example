# Passer des Volt SFC aux contrôleurs

Par défaut, Crudify génère des Volt SFC (`resources/views/pages/votes/`). Pour repasser en contrôleurs classiques :

## Option 1 — Régénérer avec `--livewire`

```bash
php artisan crudify:generate --file=vote.yaml --livewire --force
```

Cela remplace les SFC par :
- `app/Http/Controllers/VotesController.php`
- `app/Http/Requests/StoreVoteRequest.php`
- `app/Http/Requests/UpdateVoteRequest.php`
- `app/Livewire/Pages/Votes/*.php`
- `resources/views/livewire/pages/votes/*.blade.php`
- Routes dans `routes/web.php`

## Option 2 — Éjecter les routes existantes

Si tu veux garder les Volt SFC mais contrôler les routes :

```bash
php artisan crudify:eject-routes
```

Les routes sont copiées dans `routes/web.php` et tu peux les protéger :

```php
Route::middleware(['auth'])->group(function () {
    Route::livewire('/votes', 'pages::votes.index')->name('votes.index');
    Route::livewire('/votes/create', 'pages::votes.create')->name('votes.create');
    Route::livewire('/votes/{vote}/edit', 'pages::votes.edit')->name('votes.edit');
    Route::livewire('/votes/{vote}/show', 'pages::votes.show')->name('votes.show');
});
```
