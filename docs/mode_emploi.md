# Mode d'emploi du site

## Navigation
Depuis l'accueil, choisissez une table dans le menu déroulant puis cliquez sur **Afficher**.
Les liens d'insertion sont visibles en haut de la page. Chaque ligne d'une table propose trois actions :
**Détailler**, **Modifier** et **Supprimer**.

## Ordre d'insertion
Les clés étrangères imposent cet ordre :

1. **DIRIGEANT**
2. **MANDAT** (nécessite l'identifiant d'un dirigeant existant)
3. **ASSISTE** (nécessite l'identifiant d'un mandat et celui du dirigeant vice-président)

## Exemples de saisie

**Ajouter un dirigeant**

| Champ | Exemple |
| --- | --- |
| Nom | Washington |
| Prénom | George |
| Date de naissance | 1732-02-22 |
| Date de décès | 1799-12-14 (laisser vide si la personne est vivante) |
| Parti | Sans parti |
| État d'origine | Virginie |

**Ajouter un mandat**

| Champ | Exemple |
| --- | --- |
| Numéro du mandat | 1 |
| Date de début | 1789-04-30 |
| Date de fin | 1793-03-04 |
| ID du dirigeant | identifiant du président dans la table DIRIGEANT |

**Ajouter une vice-présidence (ASSISTE)**

| Champ | Exemple |
| --- | --- |
| ID du mandat | identifiant du mandat dans la table MANDAT |
| ID du dirigeant VP | identifiant du vice-président dans la table DIRIGEANT |
| Date de début VP | 1789-04-21 |
| Date de fin VP | 1793-03-04 |
| Motif de fin | Fin normale / Décès / Démission / Succession / En cours |

## Modifier et supprimer
- **Modifier** : cliquez sur *Modifier* sur la ligne, changez les champs puis cliquez sur *Mettre à jour*.
- **Supprimer** : cliquez sur *Supprimer* puis confirmez. Supprimer un dirigeant supprime aussi ses mandats et les vice-présidences liées.
