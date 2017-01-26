# Zoo
Projet BDD - Cnam 2016/2017

## Description du dépôt ##

Zoo est un projet étudiant réalisé dans le cadre de la formation "Programmation de site web", diplôme délivré par le [CNAM](https://www.cnam-bretagne.fr/).
Les objectifs étaient de se former à la gestion de bases de données par le biais d'un petit projet à mener en parrèle avec le module BDD du CNAM.

## Language et outils ##

Les différents language de programmation et outils utilisés sont listés ci-dessous :

  * Wamp x86
  * MySQL 5.6
  * PHP 5.6
  * APACHE 2.4
  * Composer 1.2 (Package manager PHP) - [Documentation](https://getcomposer.org/doc/)
  * HTML5 / CSS3 / JS
  * Framework PHP MINIII 3 - [Repository](https://github.com/panique/mini3)
  * Framework CSS Bootstrap 3 - [Documentation](http://getbootstrap.com/css/)
  * Template CSS AdminLTE - [Documentation](https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html) - [Demo](https://almsaeedstudio.com/themes/AdminLTE/index2.html)


## Structure du projet

![folder_structure.jpg](http://www.filedropper.com/sanstitre1_1)

## Installation du projet

### 1 - Cloner le dépot

~~~Bash
  cd [WWW Folder]
  git clone https://github.com/MaeBzh/Zoo.git
~~~

### 2 - Installer des dépendances

Dépendances Composer
~~~Bash
  // A éxécuter à la racine du projet : zoo/
  php composer install
~~~

### 3 - Installer la base de données

Le script SQL d'installation est présent dans : 

```
application/sql/zoo.sql

```

### 4 - Configurer le projet

Créer (ou éditer si existant) le fichier /application/config/config.php et configurer votre accès base de données
~~~PHP
<?php
[...]
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'zoo');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');
~~~

## Me contacter
* Email du développeur : maelenn.picaud@gmail.com
