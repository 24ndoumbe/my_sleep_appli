# Suivi du Sommeil - CakePHP 5  

## 📌 Objectif  
Ce projet vise à étendre un développement en **CakePHP 5** pour permettre le suivi de votre sommeil et de votre bien-être après chaque nuit.  

L'application permettra de **saisir les heures de coucher et de lever** et de calculer différents indicateurs liés à la qualité du sommeil.  

## ✨ Fonctionnalités  

### 💤 Suivi quotidien  
- **Enregistrement des heures de coucher et de lever**.  
- **Calcul du nombre de cycles de sommeil complétés** (un cycle = 1h30).  
- **Indicateur de qualité** :
  - Passe au **vert** si le nombre de cycles est proche d'un nombre entier (+/- 10 min).  
  - Passe au **vert** si l'utilisateur atteint **5 cycles** dans la nuit.  
- **Saisie des siestes** (après-midi et/ou soir - 18h/19h).  
- **Évaluation du réveil** :
  - Sélection d'un score (0 à 10) pour l'état de forme.  
  - Ajout d'un commentaire personnel.  
- **Activité physique** :
  - Indication si du sport a été pratiqué ce jour-là.  

### 📊 Suivi hebdomadaire  
- **Calcul du total de cycles de sommeil** sur **7 jours**.  
- **Indicateurs de régularité** :
  - Passe au **vert** si l'utilisateur atteint **42 cycles/semaine**.  
  - Passe au **vert** si **4 jours consécutifs** comportent au moins **5 cycles de sommeil**.  

### 📈 Visualisation des données  
- Graphiques intégrés avec **Chart.js** :
  - Évolution du nombre de cycles complets par jour.  
  - Évolution de l’état de forme au réveil.  
  - Autres indicateurs pertinents.  

##  Auteur  
DIEYE Ndoumbe
