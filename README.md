# Test technique

## Installation

Lancer tout d'abord la commande suivante pour installer le projet:
git@github.com:Rachid9302/eleven-api-react.git

#####Puis aller dans le dossier eleven-api-react/eleven-api/ et excuter les commandes suivantes:

composer install
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load

#####Puis revenir dans le dossier précédent et aller dans le dossier eleven-react/ et excuter la commande suivante:
npm install
## Test unitaire

Pour lancer les tests unitaire, lancer la commande suivante:
./vendor/bin/simple-phpunit
