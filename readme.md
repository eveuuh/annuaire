# Projet d'annuaire pour l'association des Poney Fringants

Ce projet entre dans le cadre d'un brief d'évaluation finale. C'est une application VueJs(3) servi en PHP, et utilisant une BDD MySQL. Afin de faciliter le développement de cette application Web, j'ai fait le choix de prendre Vue comme framework et de l'installer via Node. Afin de faire communiquer le client et serveur j'ai utilisé l'API Fetch pour les requêtes.

Pour le développement j'ai utilisé un serveur apache pour servir les fichiers. Pour se faire j'ai fait deux dossiers un front et un back; chacun exécuté sur une adresse locale différente, mais qui me permettra avec l'API d'appeler le back. 
Grâce à Node il suffit alors de lancer ```npm run serve ``` qui éxécutera mes scripts sur une adresse locale configurée dans les fichiers de config Apache http://www.poney.local:8081/ .

La mise en place du projet s'est fait aprés le wireframe et maquettage de celui ci sur Figma, retrouvable à cette adresse : https://www.figma.com/file/IjDGexkKkpsqpAE2UTNo3z/Wireframe-Poney-Fringants?node-id=33%3A95 

## Done
### Front
    Formulaire :
        -[x] Login 
        -[x] Register
    Membres:
        -[X] cards /members: avatar , pseudo, prénom, countdown registered
        -[x] Avatar par défaut avec initiale et couleur random
        -[x] barre de recherche
    [x] Navbar responsive
    Profil :
    -[X]dropdown de selection d'interets
### Back
     Formulaire
        -[x] Login 
        -[x] Register
        -[x] upload photo de profil max 1Mo 
     Membres:
        -[x] list all members from sql
        -[X] si profil sans photo mettre image par defaut API 
        -[X]barre de recherche fonctionnelle
        -[X]Pagination
     Profil
        -[X] bouton se deconnecter navbar
    Projet
        -[x] Création d'une base de données Mysql "Poney" dans un fichier ```poney.sql``` 

### TODO

## Formulaire :
    -[] S'inscrire avec numero adhérent (n° unique),
    -[] Se logguer avec numero adhérent + MDP
    -[] Verif mdp + format + rempli
    -[] Si 1ere connexion redirigé vers profil et selection des centres d'interets 3/8 pour valider inscription.
## Profil:    
    -[]UX page profil
    -[]choisir interets 
## Membres:
    -[]si profil non rempli : grisé non cliquable, else consultable 
    -[]recherche par liste d'interets.
## statistiques

- [] Back + front 


## Gestion du projet

- [x] Elaboration d'un wireframe puis d'une maquette sur Figma.
- [x] Mise en place d'un serveur Apache pour faire tourner l'appli sur un serveur local. 
- [X] Création du dossier de travail.
- [x] Création d'une app en VueJS
- [x]Creer Repo sur Github et versionning de code 
- [X] Fichier Readme pour voir l'évolution du travail   
- [] Finir wireframe/maquette pour le rendu
- [] Commenter le code
- [] Verif html css au validator
- [] Heberger le site sur un serveur et le deployer


## En cours bug:
  

