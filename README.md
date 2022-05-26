<div id="top"></div>

[![Maintainability](https://api.codeclimate.com/v1/badges/5801c40dbc2f93e6b1b8/maintainability)](https://codeclimate.com/github/maleyn/Tica/maintainability)



<h1 align="center">TICA</h1>


<details>
  <summary>Sommaire</summary>
  <ol>
    <li>
      <a href="#A propos du projet">A propos du projet</a>
      <ul>
        <li><a href="#Langages utilisés">langages utilisés</a></li>
      </ul>
    </li>
    <li>
      <a href="#commencer">Commencer</a>
      <ul>
        <li><a href="#prerequis">Prérequis</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Utilisation</a></li>
    <li><a href="#roadmap">Feuille de route</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>





## A propos du projet



Site de partage d'oeuvres de différents artistes avec une page galerie regroupant les peintures , page de blog avec des tutos et des infos sur la peinture, page artistes avec les infos des différents artistes partenaire.

Evolution :

- Ajout de compte utilisateur permettant de laisser des commentaires
- Ajout d'une partie vente de tableaux.

<p align="right">(<a href="#top">back to top</a>)</p>



#### Langages utilisés

* PHP
* HTML
* CSS
* JAVASCRIPT

<p align="right">(<a href="#top">back to top</a>)</p>

#### Utilitaires / Plugins utilisés

[TinyMCE](https://www.tiny.cloud/) pour la partie administration du site

## Commencer

Le site est aussi en ligne à cette adresse : https://www.tica.go.yj.fr/

Renommez le fichier **.env.example** situé à la raçine du projet en **.env**   

Modifiez ce fichier en changeant les différentes variables.

Importer la base de donnée "dump.sql" à la raçine avec *phpmyadmin* par exemple



#### Prerequis

* npm
  
  ```sh
  npm install npm@latest -g
  ```

- composer

  https://getcomposer.org/doc/00-intro.md#installation-windows

  

#### Installation

Dans un terminal et dans le dossier de votre choix

1. Cloner le dépôt
   ```sh
   git clone https://github.com/maleyn/Tica.git
   ```

2. Installer les paquets NPM
   ```sh
   npm install
   ```

3. Installer Dotenv

   ```shell
   composer require vlucas/phpdotenv
   ```

4. Installer TinyMCE

   ```shell
   npm install tinymce@^6
   ```

   

5. Mettre à jour composer

   ```shell
   composer update
   ```


<p align="right">(<a href="#top">back to top</a>)</p>



## Utilisation

Pour accéder à la partie administration tapez dans l'url : localhost/tica/indexAdmin.php

<p align="right">(<a href="#top">back to top</a>)</p>



## Feuille de route

- [x] Administration du site
    - [x] Tableau de bord
    - [x] Mails
    - [x] Page accueil
    - [x] Page Galerie
    - [x] Page Blog
    - [x] Page Artistes
    - [x] Catégories
    - [x] Gestion de compte
    
- [x] Partie Front
    - [x] Accueil
    
    - [x] Galerie
        - [x] Peintures
    
    - [x] Blog
      
      - [x] Article
      
    - [x] Artistes
    
        - [x] Artiste
    
    - [x] Contact
    
    - [x] Rejoindre nos artistes
    
    - [x] Mentions Légales
    
        


<p align="right">(<a href="#top">back to top</a>)</p>


## Contact

Renaud Maleyran - maleyran.ren@hotmail.fr

Lien du projet: [https://github.com/maleyn/Tica](https://github.com/maleyn/Tica)

Lien du site en ligne : https://www.tica.go.yj.fr/

<p align="right">(<a href="#top">back to top</a>)</p>



