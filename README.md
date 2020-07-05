Tigran SLAMA

In `App\Infra\Constant.php` config `API_KEY` with a valid key from riot apis

Create a `.env.local` file with your database properties

unable doctrine to create database `php bin/console doctrine:database:create`

install composer dependencies `composer install`

run project : `symfony server:start`


Le projet permet de visualiser les champions disponibles de lol (gratuit ou non), il permet de voir les statistiques d'un utilisateur et d'enregrister un compte afin de sauvegarder son utilisateur. 

J'ai choisi d'implementer mon projet en separant l'infrastructure de l'utilisation. En effet, on peut retrouver dans le package Infra toutes les classes effectuants des calculs / communications avec l'extérieure. Nous avons ensuite les Services, qui permettent de déléguer à la place des controlleurs afin de pouvoir débuger le plus facilement possible. J'ai essayé au maximum de respecter les règles des objets calisthenics afin de rendre le code facilement lisible. L'utilisation d'un ORM comme Doctrine ici permet de gérer facilement notre base de données via l'intermédiaire d'objets. Le mot de passe n'est pas encodé, mais la possibilité de pouvoir le crypter est facilement implémentable.




