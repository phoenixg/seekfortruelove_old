# 分页

## 内容

- [基础](#the-basics)
- [使用Qeury Builder](#using-the-query-builder)
- [添加至分页链接](#appending-to-pagination-links)
- [手动创建分页器](#creating-paginators-manually)
- [分页样式](#pagination-styling)

<a name="the-basics"></a>
## 基础

Laravel的分页器（paginator）被设计成减少注入分页的痛苦。

<a name="using-the-query-builder"></a>
## 使用Qeury Builder

让咱们看看完整的使用[Fluent Query Builder](/docs/database/fluent)在做分页的例子：

#### 拉取来自query的分页结果:

	$orders = DB::table('orders')->paginate($per_page);

#### 在视图里显示结果:

	<?php foreach ($orders->results as $order): ?>
		<?php echo $order->id; ?>
	<?php endforeach; ?>

#### 生成分页链接:

	<?php echo $orders->links(); ?>

这个links方法会创建智能的页面列表，看上去像这样子：

	Previous 1 2 ... 24 25 26 27 28 29 30 ... 78 79 Next

分页器会自动判断你所处的是哪个页面，并自动更新相应的结果和链接。

还可以生成"next"和"previous"链接：

#### 生成简单的"previous" 和 "next"链接:

	<?php echo $orders->previous().' '.$orders->next(); ?>

*更多阅读:*

- *[Fluent Query Builder](/docs/database/fluent)*

<a name="appending-to-pagination-links"></a>
## 添加至分页链接

你可以想添加更多的项目进分页链接的查询字符串中， 比如你正在排序的字段。

#### 添加查询字符串的分页链接:

	<?php echo $orders->appends(array('sort' => 'votes'))->links();

这会生成像这样的URLs：

	http://example.com/something?page=2&sort=votes

<a name="creating-paginators-manually"></a>
## 手动创建分页器

有时候你想要手动创建一个分页器实例，而不使用query builder。 那么这样做：

#### 手动创建一个分页器实例:

	$orders = Paginator::make($orders, $total, $per_page);

<a name="pagination-styling"></a>
## 分页样式

所有分页链接元素都可以使用CSS classes来样式化。 下面是生成的链接方法的HTML元素的例子：

    <div class="pagination">
        <a href="foo" class="previous_page">Previous</a>

        <a href="foo">1</a>
        <a href="foo">2</a>

        <span class="dots">...</span>

        <a href="foo">11</a>
        <a href="foo">12</a>

        <span class="current">13</span>

        <a href="foo">14</a>
        <a href="foo">15</a>

        <span class="dots">...</span>

        <a href="foo">25</a>
        <a href="foo">26</a>

        <a href="foo" class="next_page">Next</a>
    </div>

当你在结果的第一个页面时， "Previous"链接会禁用。 同样， 当你在结果的最后一个页面时， "Next" 链接会禁用。 生成的HTML像这样：

	<span class="disabled prev_page">Previous</span>