php app/console cache:clear
php app/console doctrine:schema:drop --force
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
#php app/console init:acl
#php app/console fos:user:installAces
