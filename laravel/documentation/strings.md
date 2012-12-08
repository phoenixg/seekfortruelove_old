# 处理字符串

## 内容

- [大小写, 等等.](#capitalization)
- [单词 & 字符限制](#limits)
- [生成随机字符串](#random)
- [单数 & 复数](#singular-and-plural)
- [Slugs](#slugs)

<a name="capitalization"></a>
## 大小写等等

**Str** 类还提供了三种方便的方法来操纵字符串的大小写：**upper**, **lower**, 和 **title** 。 这些是更加智能的针对PHP[strtoupper](http://php.net/manual/en/function.strtoupper.php), [strtolower](http://php.net/manual/en/function.strtolower.php), 和 [ucwords](http://php.net/manual/en/function.ucwords.php) 的版本。 之所以更智能是因为如果安装了 [multi-byte string](http://php.net/manual/en/book.mbstring.php) PHP扩展，它们就可以处理UTF-8输入。 要使用它们，只要传递给该方法一个字符串：

	echo Str::lower('I am a string.');

	echo Str::upper('I am a string.');

	echo Str::title('I am a string.');

<a name="limits"></a>
## 单词 & 字符限制

#### 限制字符串的字符数量:

	echo Str::limit($string, 10);

#### 限制字符串的单词数量:

	echo Str::words($string, 10);

<a name="random"></a>
## 生成随机字符串

#### 生成一个字母-数字结合的随机字符串:

	echo Str::random(32);

#### 生成一个纯字母字符的随机字符串:

	echo Str::random(32, 'alpha');

<a name="singular-and-plural"></a>
## 单数 & 复数

String类有能力将你的字符串从单数转成复数， 反之亦然。 

#### 获取单词的复数形式:

	echo Str::plural('user');

#### 获取单词的单数形式:

	echo Str::singular('users');

#### 当给定值大于某个值时，获取它的复数形式:

	echo Str::plural('comment', count($comments));

<a name="slugs"></a>
## Slugs

#### 生成一个 URL 友好的 slug:

	return Str::slug('My First Blog Post!');

#### 生成一个 URL 友好的 slug， 使用给定的分隔符:

	return Str::slug('My First Blog Post!', '_');

