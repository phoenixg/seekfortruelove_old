# 加密

## 内容

- [基础](#the-basics)
- [加密一个字符串](#encrypt)
- [解密一个字符串](#decrypt)

<a name="the-basics"></a>
## 基础

Laravel的  **Crypter** 类提供了简单的对处理安全、双向加密的接口。 默认地， Crypter类通过Mcrypt PHP 扩展提供了强大的AES-256加密和解密能力。 

> **注意:** 不要忘记在你的服务器上安装Mcrypt PHP 扩展.

<a name="encrypt"></a>
## 加密一个字符串

#### 加密一个给定的字符串:

	$encrypted = Crypter::encrypt($value);

<a name="decrypt"></a>
## 解密一个字符串

#### 解密一个字符串:

	$decrypted = Crypter::decrypt($encrypted);

> **注意:** 极为重要的是， 解密方法只有办法解密你用 **你的** application key所加密的东西.