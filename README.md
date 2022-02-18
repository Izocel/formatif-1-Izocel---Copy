# Formatif 1
Services Web 420-4A4-VI  
Hiver 2022

## Directives
- Vous avez droit à toutes vos notes et Internet.
- Aucune communication n'est permise (messagerie, courriel, etc.). Un élève pris en flagrant délit se verra attribuer la note de 0 pour plagiat. 
- La durée de l'examen est de 1h50.
- Vous devez cloner ce projet et implémenter chacun des points demandés.
- Une fois l'examen terminé, faites un git push de votre projet pour me le remettre.

**hint**  
N'oubliez pas de faire un **composer update** avant de commencer!!

-----------------------

## Contexte
L'équipe du Grand Défi de Victoriaville fait appel à vos services pour développer un service web qui leur permettra de mieux gérer leurs courses.

----------------------------
## Points évalués  

### Point #1 - Création de la base de données (15 points)
- Créer une nouvelle base de données appelée **ServicesWeb_Formatif1**
- Rouler les scripts du répertoire **ressource/sql** pour créer les tables et inclure les données.
  - athlète.sql
  - epreuve.sql
  - resultat.sql
- Apporter les modifications nécessaires au code pour accéder à la nouvelle base de données.
----------------------------
### Point #2 - Sélection d'un athlète (25 points)
- Créer la structure nécessaire pour afficher les informations d'un athlète selon son id (séparation de la logique et des données).
- Le id doit être spécifié dans la route. (ex. **/athletes/id**).
- Ajouter les entrées nécessaires de cette route dans la documentation openAPI. Il y a déjà un fichier de débuté (formatif1_servicesweb_v1.yaml).
- La réponse doit être formatée comme suit : 
```
{
    "id": "1",
    "nom": "Millward",
    "prenom": "Marie-françoise",
    "date_naissance": "1925-11-04",
    "adresse": "2712 Vernon Park",
    "ville": "Bedford",
    "province": "Québec",
    "pays": "Canada",
    "courriel": "gmillward0@bbb.org"
}
```
----------------------------

### Point #3 - Ajout d'un résultat (25 points)
- Créer la structure nécessaire pour pouvoir ajouter un résultat (séparation de la logique et des données).
- Les informations doivent être spécifiées dans le body de la requête.
- Ajouter un message dans un fichier de log nommé **Transaction.log** depuis la classe repository pour indiquer l'ajout du résultat. Le message doit avoir la structure suivante : 
```
[2021-03-11T10:28:20.287054-05:00] ResultatCreateRepository.INFO: Résultat ID [901] inséré pour l'athlète ID [1]  
```
- La réponse doit être formatée comme suit : 
```
{
    "message": "Le résultat a été ajouté",
    "resultatId": 901
}
```
----------------------------

### Point #4 - Modification d'un athlète (25 points)
- Créer la structure nécessaire pour pouvoir modifier les informations d'un athlète selon son id (séparation de la logique et des données).
- Le id de l'athlète doit être dans la route et toutes les informations de l'athlète doivent se retrouver dans le body de la requête.
- Retourner le code d'état 201 quand la modification est faite ou 404 si le id spécifié n'est pas trouvé.
- La réponse doit être formatée comme suit : 
```
{
    "message": "Les informations de l'athlète ID [1] ont été modifiés"
}
```
ou 
```
{
    "message": "Le id 10000000000 est invalide"
}
```
----------------------------

### Point #5 - Affichage de la liste des athlètes filtrées par ville (10 points)
- Créer la structure nécessaire pour afficher la liste de tous les athlètes d'une ville (séparation de la logique et des données).
- Le filtre doit se retrouver dans la section *query* de l'url : exemple .../athlètes?ville=Warwick
- Les résultats doivent être affichés en ordre croissant de nom et prénom.
- La réponse doit être formatée comme suit : 
```
[
    {
        "id": "198",
        "nom": "Abbotts",
        "prenom": "Lóng",
        "courriel": "cabbotts5h@bloglines.com"
    },
    {
        "id": "109",
        "nom": "Kelwick",
        "prenom": "Mélanie",
        "courriel": "bkelwick30@printfriendly.com"
    }
]
```
----------------------------

## Commit final et remise
- Une fois l'examen terminé, faire un dernier commit avec la mention **Commit final**
- Ensuite, faire un **git push** pour me remettre l'examen. (Je ne corrigerai rien de plus récent que le commit final)

----------------------------

## Bon succès!!



