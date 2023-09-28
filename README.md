. INSTALLATION DU LOGICIEL
Ce manuel d'installation devrait vous guider de manière plus détaillée et claire à travers le processus d'installation de votre projet. 
Assurez-vous d'avoir tous les prérequis en place avant de commencer, et suivez les étapes une par une pour garantir une configuration correcte.
Pour mettre en place notre projet, suivez ces étapes :
1. Cloner le projet depuis GitHub 
Tout d'abord, vous devez cloner le projet en utilisant le lien suivant : https://github.com/kalaladibala/mini_projet
git clone https://github.com/kalaladibala/mini_projet
2. Installer les prérequis 
Assurez-vous d'avoir les éléments suivants installés sur votre système :
-PHP: Téléchargez et installez une version récente de PHP à partir de https://www.php.net/downloads.php ou  https://windows.php.net/download#php-8.2- 
- Composer : Vous pouvez obtenir Composer à partir de https://getcomposer.org/.
- Un serveur Web local : Vous avez le choix entre plusieurs options, comme XAMPP, WampServer, ou Laragon. Pour une installation simple, nous recommandons XAMPP.
- Symfony : Installez Symfony en suivant les instructions sur https://symfony.com/download
3. Configuration de la base de données 
Une fois les prérequis installés, vous devez configurer la base de données. Suivez ces étapes :
- Ouvrez un terminal et placez-vous dans la racine du projet :
  cd chemin/vers/le/projet
- Créez la base de données en utilisant la commande suivante :
  php bin/console doctrine:database:create --if-not-exists ou symfony console doctrine:database:create
- Générez les tables de la base de données :
  php bin/console doctrine:schema:update –force ou symfony console make:migration puis symfony console doctrine:migrations:migrate
4. Lancement du serveur 
Pour lancer le serveur local, utilisez l'une des commandes suivantes :
- Avec Symfony CLI : symfony serve
- Ou avec PHP :  php -S localhost :8000 -t public
Vous pourrez ensuite accéder à la page de configuration du site à partir du lien suivant : http://localhost:8000/personne/ ou http://127.0.0.1:8000/personne/.

2. UTILISATION DE L’APPLICATION
	2.1. Page de configuration
La "Page de Configuration" est une composante cruciale du site web, car elle permet aux utilisateurs d'ajuster divers aspects de l'application pour répondre aux besoins spécifiques de l'utilisateur.
Voici une analyse plus détaillée de cette fonctionnalité réalisée par rapport à celle attendue :
 Gestion des Listes (Objets, Personnes et Emprunts)
La gestion des listes doit permettre aux utilisateurs d’accéder à  la liste des objets disponibles, la liste des personnes ainsi que l'association entre les objets et les personnes (liste des emprunts).
Cette fonctionnalité est essentielle pour maintenir la base de données du site à jour.
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/7671313e-9d06-4d50-8b5e-4f0b4e2c1d75)
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/5f5a4e68-d15c-4471-a400-e4c34a4ff47c)
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/6f36c38e-30aa-4419-8106-1f2c23669634)

2.2 Gestions des personnes et des objets 
La gestion des personnes et des objets est l'une des fonctionnalités centrales du site, permettant aux utilisateurs de maintenir une liste précise des objets disponibles pour l'emprunt. 
Voici une analyse détaillée de cette fonctionnalité
Affichage des personnes et des objets :
Les personnes et les objets sont présentés de manière claire et organisée, offrant une vue d'ensemble complète de toutes les personnes et objets disponibles. 
Chaque personne est accompagnée d'informations telles que son nom, prénom, email et numéro de téléphone, et chaque objet est accompagné d'informations telles que son nom et sa description.
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/7aa311c5-d1bc-4e65-b516-e36c34c4df21)
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/1c2c6ddb-66a6-4a20-9756-d82a2820055b)


Ajout de personnes et d'objets :
Les utilisateurs autorisés ont la possibilité d'ajouter de nouvelles personnes et de nouveaux objets à la liste. L'ajout d’une personne implique la saisie d'informations pertinentes, 
telles que le nom, le prénom, l’email et le numéro de téléphone, et celui d'un objet implique la saisie d'informations sur le nom de l'objet et une description. 
Cette fonctionnalité garantit que de nouvelles personnes et de nouveaux objets peuvent être facilement intégrés à la base de données.
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/ff6d9fd1-7b4e-4b1d-a855-d4ea3d8699d6)
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/766b8d50-58c3-486f-b370-733184f3f207)
                  
Modification de personnes et d'objets :
Les personnes et les objets existants peuvent être modifiés en cas de changements dans leurs informations. Par exemple, si la description d'une personne doit être mise à jour,
cette fonctionnalité permet aux utilisateurs de le faire. La modification de personnes et d'objets assure que les informations restent à jour et précises, améliorant ainsi la qualité des données sur le site.
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/a6c3a7fe-c011-4895-a2a1-534275ec8878)
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/cb15106d-c293-4101-a961-08a19e3cf1b5)

Suppression de personnes et d'objets :
Si une personne ou un objet doit être retiré de la liste, les utilisateurs ont la possibilité de le supprimer de la base de données. 
La suppression de personnes et d'objets maintient la liste propre et pertinente, en évitant la confusion ou l'affichage d'objets qui ne sont plus disponibles.
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/2e8ef08c-1b1f-47a2-bd58-09b917f2f8a6)
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/9c540706-fe0d-436c-bfe6-ce0b0fa3da5c)


         
Emprunt des objets 
L'une des fonctionnalités cruciales liées à la gestion des objets est la capacité pour les utilisateurs de demander à emprunter un objet. 
Cette fonctionnalité permet à un utilisateur de signaler son intention d'emprunter un objet particulier. Lorsqu'un utilisateur souhaite emprunter un objet, 
il peut sélectionner cet objet depuis la liste des objets disponibles. Après avoir choisi l'objet, l'utilisateur peut soumettre une demande d'emprunt,
indiquant la période pendant laquelle il souhaite emprunter l'objet et en fournissant éventuellement des informations supplémentaires.
![image](https://github.com/kalaladibala/mini_projet/assets/97503506/77c43345-4035-44da-b38e-9c0d81700dbb)

 



