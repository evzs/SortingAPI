# SortingAPI 

## Vue d'ensemble
Cette API a ete realisee dans le cadre d'un exercice donne lors du module PHP.
Elle consiste a trier des tableaux avec differents algorithmes.

## Convention de nommage
(A titre indicatif, je peux aussi fournir l'information a titre justificatif si necessaire)
- Classes: PascalCase
- Methodes et fonctions: camelCase
- Variables: snake_case

## Structure du projet
- `.htaccess`: fichier de configuration pour le serveur Apache
- `composer.json`: defini les regles d'autoloading
- sous-dossier `public`: point d'entree
  - sous-dossier `BubbleSort`: endpoint pour l'action Bubble Sort
  - sous-dossier `QuickSort`: endpoint pour l'action Quick Sort
- sous-dossier `src`: code source de l'API
  - sous-dossier `service`: contient les algorithmes de tri
  - sous-dossier `utils`: contient le code utilitaire
- `vendor`: dependances du projet installees par Composer

## Composants principaux
### Request (`src/Request.php`)
Gere les requetes API entrantes. Une requete `GET` est attendue avec du JSON en guise de donnee entree.

### Router (`src/Router.php`)
Route les requetes entrantes vers leur endpoints ou handlers appropries.

### BubbleSortService (`src/BubbleSortService.php`)
Implementation du Bubble Sort.

### QuickSortService (`src/QuickSortService.php`)
Implementation du Quick Sort.

### Response (`src/Response.php`)
Gere les reponses de l'API. L'API renvoie les reponses au format JSON.

### Service (`src/Service.php`)
Classe abstraite qui sert de blueprint pour les differents services de tri. Encapsule les methodes pour initialiser le routage, gerer les requetes et renvoyer les reponses.
Laisse a ses sous classes l'implementation reelle de `sort`.

### class_instantiation (`src/utils/class_instantiation.php`)
S'implemente dans les index.php des dossiers endpoint en reprenant le nom du dossier dans lequel il se situe pour instancier la classe Service necessaire.

## Utilisation
Pour utiliser l'API, il faut envoyer une requete GET avec les donnees JSON (dans ce cas, le tableau a trier) vers l'endpoint voulu (pour l'instant, soit `bubbleSort` ou `quickSort`). La reponse rendra le tableau trie au format JSON.

#### Exemples pour facilite d'acces et tester directement:</summary>
- <details><summary>Avec 10 valeurs</summary> http://.../SortingAPI/bubbleSort/?data=[23, 89, 2, 5, 76, 1, 9, 12, 6, 45]</details>
- <details><summary>Avec 1000 valeurs</summary> http://.../SortingAPI/quickSort/?data=[193, 326, 967, 646, 633, 341, 756, 777, 494, 383, 786, 886, 27, 185, 434, 398, 38, 551, 519, 507, 595, 498, 492, 93, 421, 836, 190, 201, 708, 512, 981, 624, 666, 236, 439, 282, 116, 341, 43, 307, 213, 646, 395, 201, 531, 567, 741, 890, 540, 779, 737, 660, 472, 653, 387, 717, 816, 74, 82, 831, 58, 167, 137, 233, 996, 600, 883, 919, 277, 38, 229, 739, 669, 145, 549, 98, 178, 682, 690, 528, 990, 319, 357, 233, 153, 673, 908, 2, 885, 65, 15, 951, 793, 717, 725, 588, 28, 960, 537, 572, 655, 256, 332, 172, 542, 210, 970, 72, 788, 320, 969, 261, 301, 40, 342, 204, 628, 289, 200, 406, 901, 803, 902, 257, 865, 232, 874, 949, 487, 612, 26, 329, 768, 439, 661, 90, 311, 586, 629, 346, 554, 337, 96, 806, 57, 0, 163, 577, 986, 398, 45, 723, 34, 348, 12, 250, 656, 18, 35, 785, 809, 474, 949, 463, 793, 564, 621, 138, 275, 510, 215, 161, 177, 671, 734, 686, 909, 747, 456, 253, 323, 233, 724, 138, 385, 479, 742, 5, 22, 65, 573, 230, 96, 247, 290, 464, 357, 995, 496, 359, 386, 540, 506, 132, 918, 485, 465, 875, 456, 775, 931, 982, 718, 790, 783, 132, 121, 408, 849, 344, 308, 51, 289, 441, 738, 716, 392, 447, 686, 678, 643, 252, 630, 241, 720, 948, 347, 722, 616, 525, 741, 658, 473, 519, 237, 399, 671, 611, 38, 276, 934, 659, 175, 755, 790, 988, 373, 804, 357, 160, 113, 720, 946, 681, 271, 526, 838, 460, 733, 664, 767, 203, 25, 594, 766, 826, 537, 646, 147, 560, 117, 994, 734, 531, 504, 669, 791, 413, 67, 186, 979, 189, 11, 126, 408, 549, 475, 784, 512, 782, 694, 235, 580, 270, 802, 905, 901, 260, 671, 130, 511, 480, 552, 794, 623, 401, 396, 202, 729, 889, 416, 953, 376, 468, 334, 816, 414, 284, 781, 313, 467, 837, 502, 168, 429, 924, 724, 128, 562, 566, 993, 432, 834, 917, 633, 631, 146, 778, 682, 919, 235, 496, 907, 270, 637, 815, 944, 572, 775, 637, 722, 826, 650, 741, 619, 385, 422, 335, 854, 714, 163, 610, 445, 182, 103, 607, 399, 168, 364, 675, 812, 424, 186, 176, 955, 261, 153, 664, 981, 219, 805, 902, 110, 207, 605, 166, 338, 647, 132, 445, 633, 802, 206, 144, 218, 986, 894, 749, 152, 916, 17, 898, 513, 484, 595, 285, 405, 304, 83, 894, 849, 751, 536, 446, 254, 302, 846, 715, 76, 380, 622, 820, 840, 777, 734, 443, 338, 714, 578, 411, 133, 632, 474, 573, 578, 978, 437, 898, 332, 187, 485, 785, 66, 486, 708, 302, 992, 784, 844, 449, 391, 333, 304, 849, 592, 693, 890, 129, 524, 309, 176, 849, 207, 540, 75, 411, 334, 170, 212, 89, 873, 553, 500, 538, 180, 126, 725, 57, 965, 364, 298, 567, 668, 83, 907, 935, 928, 859, 192, 364, 777, 32, 766, 512, 606, 10, 571, 563, 124, 48, 8, 752, 298, 857, 944, 947, 247, 899, 50, 178, 975, 841, 984, 548, 529, 1, 374, 556, 490, 375, 480, 631, 377, 997, 730, 670, 673, 1000, 163, 900, 202, 628, 740, 846, 640, 733, 747, 175, 211, 864, 878, 965, 739, 272, 344, 342, 769, 510, 293, 735, 877, 537, 261, 931, 113, 975, 238, 534, 999, 688, 524, 352, 256, 458, 256, 238, 298, 1000, 442, 467, 151, 767, 642, 443, 66, 441, 600, 696, 602, 366, 891, 822, 685, 359, 496, 332, 213, 739, 870, 785, 669, 390, 271, 927, 826, 985, 830, 26, 701, 824, 826, 753, 743, 944, 927, 558, 531, 825, 213, 537, 874, 22, 793, 535, 219, 714, 367, 652, 142, 137, 590, 364, 913, 277, 326, 995, 305, 341, 170, 307, 327, 774, 484, 876, 138, 330, 592, 741, 275, 715, 102, 512, 955, 993, 857, 353, 568, 740, 971, 45, 907, 677, 719, 364, 145, 945, 370, 348, 650, 773, 240, 137, 457, 130, 63, 325, 72, 56, 414, 269, 328, 655, 567, 496, 975, 889, 335, 375, 341, 689, 471, 554, 173, 241, 391, 498, 722, 109, 579, 433, 907, 541, 88, 321, 806, 305, 107, 731, 684, 960, 461, 970, 12, 921, 402, 574, 933, 670, 92, 861, 981, 73, 741, 545, 341, 139, 407, 337, 968, 273, 986, 930, 255, 189, 748, 872, 498, 444, 653, 704, 92, 793, 987, 749, 254, 366, 276, 704, 257, 477, 317, 297, 539, 195, 713, 689, 969, 946, 104, 670, 415, 205, 541, 458, 937, 670, 8, 617, 380, 50, 851, 884, 259, 2, 33, 854, 178, 648, 450, 378, 483, 961, 841, 12, 892, 341, 466, 335, 719, 582, 881, 625, 786, 161, 217, 134, 864, 265, 613, 752, 855, 335, 730, 92, 252, 888, 42, 467, 671, 597, 623, 690, 709, 130, 442, 14, 949, 53, 505, 223, 184, 49, 974, 833, 694, 0, 916, 386, 866, 9, 214, 624, 890, 993, 877, 119, 924, 572, 948, 986, 696, 848, 832, 517, 774, 338, 663, 813, 102, 908, 723, 26, 783, 96, 880, 676, 84, 648, 449, 216, 850, 327, 317, 594, 489, 784, 885, 647, 743, 238, 429, 690, 530, 477, 294, 639, 709, 747, 258, 268, 917, 817, 452, 566, 322, 926, 959, 669, 311, 568, 444, 482, 440, 942, 146, 277, 165, 878, 609, 778, 348, 697, 842, 204, 137, 399, 281, 844, 653, 376, 945, 700, 675, 780, 542, 961, 693, 32, 225, 137, 459, 826, 98, 500, 903, 854, 752, 432, 363, 509, 951, 162, 134, 18, 996, 627, 677, 821, 860, 342, 331, 104, 298, 134, 706, 631, 940, 615, 706, 317, 30, 254, 208, 498, 858, 812, 380, 172, 356, 846, 128, 354, 526, 329, 646, 230, 740, 722, 442, 465, 70, 304, 327, 853, 939, 901, 500, 838, 420, 673, 95, 866, 774, 846, 426, 285, 640, 893, 792, 112, 68, 153, 222, 641, 878, 322, 862, 976, 981, 196]</details>

Lien GitHub: https://github.com/evzs/SortingAPI <br>
L'historique des commits est malheureusement peu complet car j'ai oublie de creer un depot au debut de l'exercice, il y a eu beaucoup de changements cela dit et j'ai sous la main les versions precedentes si besoin (par ex avant le passage a une architecture orientee service)