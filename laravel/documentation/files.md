# 处理文件

## 内容

- [读取文件](#get)
- [写入文件](#put)
- [文件上传](#upload)
- [文件扩展名](#ext)
- [检查文件类型](#is)
- [获取 MIME 类型](#mime)
- [复制目录](#cpdir)
- [移除目录](#rmdir)

<a name="get"></a>
## 读取文件

#### 获取文件的内容:

	$contents = File::get('path/to/file');

<a name="put"></a>
## 写入文件

#### 写入一个文件:

	File::put('path/to/file', 'file contents');

#### 添补一个文件:

	File::append('path/to/file', '添加的文本');

<a name="upload"></a>
## 文件上传

#### 移除一个 $_FILE 到一个永久路径:

	Input::upload('picture', 'path/to/pictures', 'filename.ext');

> **注意:** 你可以轻易验证上传的文件， 使用 [Validator 类](/docs/validation).

<a name="ext"></a>
## 文件扩展名

#### 根据文件名获取文件扩展名:

	File::extension('picture.png');

<a name="is"></a>
## 检查文件类型

#### 判断文件是否是一个给定的类型:

	if (File::is('jpg', 'path/to/file.jpg'))
	{
		//
	}

**is** 方法并不会简单地检查文件扩展名。 而是使用Fileinfo PHP扩展来读取文件内容， 进而判断出实际的MIME类型。 

> **注意:** 你可以给 **is** 方法传递任何在 **application/config/mimes.php** 文件中定义的扩展名.
> **注意:** 该功能是需要Fileinfo PHP 扩展支持的. 更多信息见 [PHP Fileinfo 页面](http://php.net/manual/en/book.fileinfo.php).

<a name="mime"></a>
## 获取 MIME 类型

#### 获取跟扩展名有关的MIME类型:

	echo File::mime('gif');

> **注意:** 该方法只是简单地返回定义在 **application/config/mimes.php** 文件中的扩展名的 MIME类型定义

<a name="cpdir"></a>
## 复制目录

#### 递归地复制一个目录到指定的位置:

	File::cpdir($directory, $destination);

<a name="rmdir"></a>
## 移除目录

#### 递归地删除一个目录:

	File::rmdir($directory);