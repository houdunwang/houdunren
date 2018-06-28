# 数据库
在Laravel框架提供的丰富的数据库、模型操作基础上扩展了一些实用的功能。

## 操作

#### 组件方法

表操作使用 [doctrine/dbal](`https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#configuration)  组件库完成，下面是一个获取数据表结构的例子，其他丰富的功能请查看官方文档。

```
dd(User::getDoctrineConnection()->getSchemaManager()->listTableColumns('configs'));
```

项目中的模型都继承了 Doctrine 这个 trait ，所以都可以方便的实例化出 doctrine 对象。然后调用相应方法即可。

#### 获取字段列表

系统封装了获取字段信息的方法

```
dd(User::find(1)->listTableColumns());
```

