[![Travis](https://img.shields.io/travis/rust-lang/rust.svg)]()

## Name：《博客系统》（BlogSystem）


[在线预览](http://www.ihouwei.com/myBlog)


## 开发背景
  第一版（旧）开发是为了学习原生php，算是一个实战的项目，从数据库设计到最终的实现对完整的前后端开发有了第一次体会，对系统的架构和具体的实现有了新的体会。不仅在后端php开发知识层面上有了很好的学习，同时对开发一个系统的流程有了很好认识，是一次难得的经历。
  第二版（新）是在旧版的基础上学习php框架——CodeIgniter，使用该框架不仅是因为丰富的php类库支持，也是因为其MVC架构。因此为了更好的学习php-ci改进旧版博客系统，使用ci框架重新实现基本功能。


## 系统说明
  本系统有两个版本，第一个版本（旧）采用原生php+mysql开发，结合html+css+js，辅以jQuery，bootstrap等框架构建页面。第二个版本是基于php的CodeIgniter框架，按照MVC模式开发。
  
  
## 系统环境
采用XAMPP集成环境
* XAMPP Version: `5.6.32`
* phpStorm `2017.3.2`
* Navicat Premium `10.0.11`

## 设计

### 基于键的数据模型
![](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/key-model.png)

### 系统用例模型
![](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/model.png)

### 物理数据库设计
![](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/db.png)


## 界面 & 功能

### 主页
>主页显示按时间倒序排列的最近的文章列表和按浏览量排序的热门推荐列表。在右上方的搜索功能可以按文章的关键字查询文章。导航栏右侧提供游客登录的入口。

![主页](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/1.png)

### 登录界面
>用户输入用户名和密码后先前台校验用户名和密码的规范，然后提交至后台数据库校验正确，若正确登录；否则提示用户账号或密码错误。

![登录](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/2.png)

### 个人空间
>个人空间界面主要由添加文章，显示博主文章的评论列表，显示博主所有文章列表的功能。如果登录用户是博主，则可以对文章进行删除和修改的功能。

![个人空间](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/5.png)

### 文章详情
>文章详情界面左侧显示该文章的评论，如果是博主访问（已登录）该界面会显示删除评论的功能。同时在左侧下方会显示添加评论的输入框，如果未登录会提示先登录再添加评论。另外在右侧点击作者可以进入该作者的个人空间查看文章和热门评论。

![文章](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/3.png)

### 添加文章
>添加文章部分分为添加文章标题和添加文章内容两部分。添加文章正文部分可以使用上方的工具栏添加加粗，高亮，段落等效果。输入完成后可以点击下方的“提交内容”按钮提交，也可以使用Ctrl + Enter快捷键提交。

![主页](https://github.com/Houweix/BlogSystem/raw/master/myBlog/img/4.png)

### 遇到的问题 & 如何解决





