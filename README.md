# To-do-list

Ce projet est à faire en binôme dans le cadre de nos cours de PHP du S3 de BUT informatique. 

Il s’agit d’une simple application de listes de tâches et nous devons utiliser le patron MVC. Pour cette application il y aura deux acteurs : les visiteurs (non connectés) et les utilisateurs (connectés). La seule différence entre ces deux acteurs se trouvera au niveau de leurs listes de tâches. En effet, les utilisateurs connectés pourront créer des listes de tâches qui seront privées et qu’eux seuls pourront voir. En revanche les visiteurs ont seulement accès à des listes de tâches publiques.

Voici le fonctionnement de l’application :

Lorsqu’on arrive sur l’application, aucun utilisateur n’est connecté, les listes des tâches publiques sont listées.
Le visiteur peut ajouter/supprimer des listes et les tâches publiques sans se connecter.
Il faut créer un espace pour se connecter à l’application (si vous avez du temps, faire une partie inscription également).
Une fois l’utilisateur connecté, il a accès aux listes publiques (comme le visiteur), mais également à ses listes privées.
Toutes les listes de tâches ajoutées par un utilisateur sont privées par défaut afin de simplifier l’application. Il peut bien entendu supprimer ses listes également. Il faut penser à la relation entre les listes de tâches et l’utilisateur en base de données.
Chaque tâche pourra être complétée via une case à cocher, ajoutez un bouton pour valider en dessous de la liste des tâches. Pour les plus téméraires, essayez de compléter/dé-compléter des tâches via des requêtes AJAX à la place du bouton valider (optionnel).


La gestion des droits sera complète, un visiteur ne doit pas pouvoir accéder aux listes des utilisateurs ou les supprimer, idem pour la complétion des tâches. De plus, chaque liste et chaque tâche sera sauvegardée en base de données. Nous derons aussi nous charger de la gestion des erreurs afin qu'elles soient complète.


