#TODO
- Edit my profile
- Manage conflicts
- Admin tools (create/edit/enable-disable/delete account)
- Notifications in case of edited planning (if concerned)
- Website design
- Csv file upload-download
- Add a explaining text on an edit
- Nice CSS

#BUGS


#Useful commands
###Access website
`http://localhost/IAATO/web/app_dev.php `
###Current fixtures
- username "toto", password "titi"
- username "admin", password "admin", role "admin"

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


