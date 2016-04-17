symfony_admin
=============
创建数据库
-------------
bin/console doctrine:database:create

创建数据表
-------------
bin/console doctrine:schema:create
 更新用
bin/console doctrine:schema:update --force

初始化登陆用户
--------------
bin/console doctrine:query:sql "`cat data/init_admin.sql`"

