# Crudify Example

Projet exemple pour [Crudify](https://github.com/devalade/crudify), un package Laravel qui génère un CRUD complet avec Livewire v4.

## Ce projet

Ce dépôt est un starter kit Laravel + Livewire + Flux dans lequel un CRUD **Vote** a été généré avec Crudify.

### Fichier YAML utilisé

```yaml
model: Vote

fields:
  titre:
    type: string

  nombre_de_vote:
    type: integer

  photo:
    type: image
```

### Commande exécutée

```bash
php artisan crudify:generate --file=vote.yaml
php artisan migrate
```

### Résultat

Pages CRUD générées dans `resources/views/pages/votes/` :

| Page | URL |
|---|---|
| `index.blade.php` | `/votes` |
| `create.blade.php` | `/votes/create` |
| `edit.blade.php` | `/votes/{vote}/edit` |
| `show.blade.php` | `/votes/{vote}` |

Ainsi que :

- `app/Models/Vote.php`
- `app/Policies/VotePolicy.php`
- `database/migrations/*_create_votes_table.php`
- `database/factories/VoteFactory.php`
- `database/seeders/VoteSeeder.php`

## Lancer le projet

```bash
git clone https://github.com/devalade/crudify-example.git
cd crudify-example

composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install && npm run build

php artisan db:seed
```

Puis visiter `/votes`.

## Crudify

[Crudify](https://github.com/devalade/crudify) est un package Composer qui génère automatiquement modèles, migrations, factories, seeders, policies, et pages CRUD (Volt ou Livewire classique) à partir d'une commande CLI ou d'un fichier YAML.

```bash
composer require devalade/crudify --dev
php artisan crudify:install
```

Plus d'infos : [github.com/devalade/crudify](https://github.com/devalade/crudify)
