# GESTION PRODUITS

## Prérequis
Ajouter dans le fichier host `127.0.0.1 seb.local`

Lancer les conteneurs avec la commande `docker-compose up`

_______________________________________________________________
```diff
+ Pour lancer les conteneurs en mode SWARM : 
```


Il faut tout d'abord initialiser le swarm :

```bash
docker swarm init
```
Il faut ensuite créer un registry en local :

```bash
docker service create --name registry --publish published=5000,target=5000 registry:2
```

Il suffit ensuite de push les images sur le registry:

```bash
docker-compose push
```


Enfin on peut lancer le déploiement:

```bash
docker stack deploy --compose-file docker-compose.yml mydockerstack
```

Les services sont tous configurés pour avoir 2 instances, sauf la base de données :

- En effet, je n'ai pas trouvé le moyen de contourner le problème suivant:
	
- Quand le lance une instance MySQL celle-ci verrouille des fichiers comme ibdata1 auquel la seconde instance ne peut pas accéder et n'arrive donc pas à démarrer.
		
Pour supprimer le registry:

```bash
docker service rm registry
```

Pour supprimer le stack:

```bash
docker stack rm mydockerstack
```


Pour quitter le swarm:

```bash
docker swarm leave --force
```





Cette application est compatible `PHP5` et a été testée avec une base de données `MySQL 5.7`.

## Installation
- Copier les fichiers du dossier `www` dans un dossier accessible par le serveur Web.
- Assurez vous que le dossier `uploads` est accessible en lecture et écriture par le serveur Web : `chmod 777 uploads`
- Importez la base de données test à partir du dump SQL `database/gestion_produits.sql`.
- Connectez vous à l'application avec l'url adaptée avec les informations suivantes :
    - Login : `admin`
    - Mot de passe : `password`

## Fonctionnalités
L'application permet de :
- Lister les produits
- Afficher la fiche produit en lecture seule
- Ajouter des produits
- Modifier les produits
- Supprimer les produits
- Pour chaque produit, il est possible d'ajouter autant de photos que nécessaire
