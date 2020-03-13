## Installation
Une fois le projet récupéré :
1. Lancer la commande `composer install`
2. Configurer l'accès à la base de donnée le fichier `.env`
```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
``` 
3. Lancer la commande `bin/console doctrine:database:create`

## Création d'un utilisateur
Lancer la commande `bin/console doctrine:fictures:load` ou `bin/console d:f:l`.

Cela va créer un utilisateur qui vous permettra de vous connecter en tant qu'admin avec un accès au backoffice.

- Identifiant: admin
- Mot de passe : admin

## URL d'accès
- Formulaire de contact : `/`
- Connexion back office : `/admin`
- Liste des demandes de contacts : `/admin/contacts`

