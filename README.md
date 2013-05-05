###Update fixtures in database
php app/console doctrine:fixture:load
###Create a user in db for fos
Edit UserBundle/DataFixtures/ORM/Users.php
###Update doctrine db
 php app/console doctrine:schema:update --force 
###See sql possible update for doctrine db
php app/console doctrine:schema:update --dump-sql 
###Create doctrine db
php app/console doctrine:database:create


#BUGS
- Sort by ship/company not working (sql error)
- Get all fos users not working (empy array)
