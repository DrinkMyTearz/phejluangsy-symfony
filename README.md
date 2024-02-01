Water Promo
Ce projet est une application Symfony développée pour promouvoir une marque d'eau.

Prérequis
Avant de lancer le projet, assurez-vous d'avoir installé les outils suivants :

PHP 7.4 ou supérieur
Composer
Symfony CLI
Un serveur de base de données (MySQL, PostgreSQL, SQLite, etc.)

Installation
Clonez le dépôt Git :

git clone https://github.com/DrinkMyTearz/phejluangsy-symfony.git

Accédez au répertoire du projet :

cd phejluangsy-symfony

Installez les dépendances du projet à l'aide de Composer :

composer install

Créez la base de données :

php bin/console doctrine:database:create

Appliquez les migrations pour créer les tables de la base de données :

php bin/console doctrine:migrations:migrate

Chargez les fixtures si nécessaire (données de test) :

php bin/console doctrine:fixtures:load

Lancement du serveur
Pour lancer le serveur Symfony en arrière-plan, utilisez la commande suivante :

symfony serve -d

Le serveur sera disponible à l'adresse : http://localhost:8000.
