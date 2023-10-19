# SortingAPI 
## Vue d'ensemble
Cette API a ete realisee dans le cadre d'un exercice donne lors du module PHP.
Elle consiste a trier des tableaux avec differents algorithmes.

## Structure du projet
- `.htaccess`: fichier de configuration pour le serveur Apache
- `composer.json`: defini les regles d'autoloading
- sous-dossier `public`: point d'entree
  - sous-dossier `BubbleSort`: endpoint pour l'action Bubble Sort
  - sous-dossier `QuickSort`: endpoint pour l'action Quick Sort
- sous-dossier `src`: code source de l'API
- `vendor`: dependances du projet installees par Composer

## Composants principaux
### Request (`src/Request.php)
Gere les requetes API entrantes. Une requete `GET` est attendue avec du JSON en guise de donnee entree.

### Router (`src/Router.php)
Route les requetes entrantes vers leur endpoints ou handlers appropries.

### BubbleSortService (`src/BubbleSortService.php`)
Implementation du Bubble Sort.

### QuickSortService (`src/QuickSortService.php`)
Implementation du Quick Sort.

### Response (`src/Response.php)
Gere les reponses de l'API. L'API renvoie les reponses au format JSON.

## Utilisation
Pour utiliser l'API, il faut envoyer une requete GET avec les donnees JSON (dans ce cas, le tableau a trier) vers l'endpoint voulu (pour l'instant, soit `bubbleSort` ou `quickSort`. La reponse rendra le tableau trie au format JSON.