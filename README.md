symfony_admin
=============
在执行下面bin/console命令之前,请切换至项目根目录,切配置好symfony的doctrine数据库信息

创建数据库
-------------
bin/console doctrine:database:create

创建数据表
-------------
bin/console doctrine:schema:create
更新表结构
-------------
bin/console doctrine:schema:update --force

初始化登陆用户
--------------
bin/console doctrine:query:sql "`cat data/init_admin.sql`"

启动服务器
=====
bin/console server:run

