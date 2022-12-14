# Feuille de présence 
 
**Objectif**

Créer une nouvelle application Symfony qui permettra de choisir la personne qui ira chercher la feuille de présence tous les jours.

**Fonctionnalités**

* Un espace d'administration permettra de gérer les élèves : ajouter, éditer, supprimer, accessible uniquement aux formateurs

* Seuls les utilisateurs (élèves, formateurs) disposant d'un compte pourront aller sur l'application.

* Un élève est rattaché à une promotion (CDA-22-23 par exemple), et ne pourra pas voir les autres promotions.

* Toutes les fins de semaine, il faut pouvoir lancer une requête qui permet de tirer au sort un/une élève de la classe qui aura la charge de chercher la feuille de présence le lundi matin

* Lorsque cet/cette élève est tiré(e) au sort, un mail est envoyé dans sa boite mail afin qu'il sache que c'est lui/elle qui est en charge de la feuille de présence le lundi matin

* Les élèves et formateurs peuvent voir qui est en charge de la feuille de présence.

* Un/une élève ne peut pas être tiré(e) au sort plus d'une fois par 3 fois de suite.

* Il faut avoir un historique des élèves tiré(es) au sort, avec la date à laquelle ils ont été choisit.

* Un/une élève pourra spécifier si oui ou non, il a bien cherché la feuille de présence.

* Il/elle pourra spécifier et le nombre de pas qu'il/elle a parcourue.

* Dans son espace, un/une élève peut voir les statistiques du nombre de fois dans l'année où il/elle a cherché(e) la feuille de présence et les statistiques de ses camarades, et le nombre total de pas parcouru.

* Idem dans l'espace dédié aux formateurs.

* À la fin d'une journée, un formateur peut spécifier si la feuille de présence à été signé par tout le monde (elle aura donc les états: feuille présente, non signée, signée).

**Contraintes**

+ Utiliser les services pour envoyer des mails (Symfony - Les services – StackTrace)

* Utiliser Webpack pour gérer les CSS et les JS (Managing CSS and JavaScript (Symfony Docs))

* Utiliser les événements Doctrine et Symfony

* Prévoir un système de traduction

* Utiliser les workflows pour gérer les états de la feuille de présence

* Faire des tests unitaires et fonctionnels (Testing (Symfony Docs)) (Symfony - Tests unitaires)

* Utiliser GIT et faites des commit atomiques

* Utiliser la console de Symfony pour la fonctionnalité de recherche des élèves aléatoire et l'envoie d'email. Cette commande sera executer en tâche CRON toutes les fins de semaines (Console Commands (Symfony Docs))


