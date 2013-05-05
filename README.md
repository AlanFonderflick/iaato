#Useful commands
###Update fixtures in database
php app/console doctrine:fixture:load
###Create a user in db 
Edit UserBundle/DataFixtures/ORM/Users.php
###Update doctrine db
 php app/console doctrine:schema:update --force 
###See sql possible update for doctrine db
php app/console doctrine:schema:update --dump-sql 
###Create doctrine db
php app/console doctrine:database:create
###Generate entity
php app/console doctrine:generate:entity
###Generate getters/setters 
php app/console doctrine:generate:entities Path-of-Entity


#BUGS
- Get all fos users not working (empy array)
