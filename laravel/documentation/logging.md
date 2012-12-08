# 错误 & 日志

## 内容

- [基本配置](#basic-configuration)
- [日志](#logging)
- [日志类](#the-logger-class)

<a name="basic-configuration"></a>
## 基本配置

所有跟错误和日志有关的配置选项都位于 **application/config/errors.php** 文件。 我们直接去看看吧。

### 忽略错误

**ignore**选项包含了Laravel应该忽视掉的错误等级数组。 通过"ignored"，我们不会停止执行这些错误脚本。 然而，如果日志开启的话，它们还是会被日志下来。


### 错误明细

**detail**选项指明了当发生错误时，框架是否应该显示错误消息和stack trace信息。 开发时， 你希望设置成**true**。 然而， 在生产环境中， 应该设置成 **false**。 当禁用时， 位于**application/views/error/500.php**的错误视图会显示， 它包括了一个通用的错误消息。


<a name="logging"></a>
## 日志

要启用日志，就设置**log**选项为"true"。 当启用时， 一旦发生错误， **logger** 配置项目里定义的闭包会执行。 这给了你错误如何被日志下来的完全地灵活性。 你设置可以e-mail错误给你的开发团队！

默认地， 日志存储在 **storage/logs** 目录， 每天创建一个新的日志文件。 这样就防止你的日志过大。 


<a name="the-logger-class"></a>
## 日志类

有时候你想使用Laravel的 **Log** 类来调试， 或者仅仅是日志一些信息消息。 这样来使用它：

#### 书写一条消息进日志:

	Log::write('info', '这只是一条信息消息！');

#### 使用魔术方法来指定日志消息类型:

	Log::info('这只是一条信息消息！');