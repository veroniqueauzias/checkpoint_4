### Concept
Ce site est réalisé sous Symfony
Faire connaître le Bugey aux touristes et futurs arrivants.
Des articles sont accessibles par catégories pour connaître les activités, les spécialités locales, et les structures à contacer.

### installation

1 Cloner le projet: git clone https://github.com/veroniqueauzias/checkpoint_4.git
2 Lancer `composer install`
3 Lancer `yarn install`
4 Lancer `yarn encore dev`
5 installation de la base de données:
- Copier la ligne suivante du fichier .env : `DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name`. 
- A la racine, créer un nouveau fichier .env.local et y coller la ligne.
Remplacer les valeurs comme suit :
- `db_user` = nom d'utilisateur courant en base de données
- `db_password` = mot de passe habituel
- `db_name` = nom de la base de données (au choix)
6 Lancer dans l'ordre suivant :
   - `php bin/console doctrine:database:create`
   - `php bin/console doctrine:migration:migrate`
   - `php bin/console doctrine:fixtures:load`
   
### Mise en route
1. Lancer `symfony server:start` pour démarrer le serveur local
2. Lancer `yarn run dev --watch` pour charger les assets

### ENJOY

