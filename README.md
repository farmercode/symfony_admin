symfony_admin
=============
在执行下面bin/console命令之前,请切换至项目根目录,切配置好symfony的doctrine数据库信息,并且执行**composer install**来安装所依赖的库

创建数据库
-------------

    bin/console doctrine:database:create

此步骤如果失败,请手动添加数据库执行后续命令

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

至此基本完成了项目的安装工作.默认登陆账户为admin,密码为123456,初始化脚本在data/init_admin.sql中._
