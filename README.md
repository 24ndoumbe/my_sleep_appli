# CakePHP Application Skeleton

L’objet de ce projet est d'étendre votre développement CakePHP 5.

Il s'agit de de saisir vos heures de coucher et lever chaque jour  ainsi que différents éléments et de calculer des indicateurs en lien avec votre bien-être après sommeil.



Vous avez la liberté de mettre en forme les éléments demandés comme vous le souhaitez, avec un accent sur l’ergonomie et la facilité d’utilisation et de lecture des données



Vous pouvez tout d'abord réfléchir en dessinant sur papier le storyboard du développement (plus précisément le wireframe)



Pour chaque jour:

vous calculerez le nombre de cycles de sommeil que vous avez complétés.
vous afficherez un petit indicateur qui passera au vert si le nombre de cycles de sommeil par nuit est proche d’un nombre entier de cycles (par ex 6h10 => 4 cycles), à 10 min +/-
Et sił atteint 5 cycles par jour
Vous saisirez également si vous avez fait une sieste l’après midi et/ou le soir (18/19h)
Dans une liste déroulante , avec un score de 0 à 10, vous indiquerez si vous vous sentez en forme au réveil le matin
Ajoutez également un commentaire (selon votre ressenti)
Indiquez également si vous avez fait du sport ce jour
Pour une semaine complète (du lundi au dimanche inclus):

Vous calculerez le nombre total de cycles de sommeil
Vous afficherez un indicateur qui passe au vert si ce nombre >= 42
Intégrez également un indicateur qui passe au vert si vous avez 4 jours d’affilée avec à minima 5 cycles


Suite à ces éléments, vous êtes libres également d’afficher un ou plusieurs graphique (par ex avec Chart JS)

Idées: 

Nombre de cycles complets de sommeil chaque jour
Etat de forme 
Etc










![Build Status](https://github.com/cakephp/app/actions/workflows/ci.yml/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 5.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and set up the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
#   s l e e p _ c a k e _ p h p 
 
 
