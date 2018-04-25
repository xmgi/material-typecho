<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&rss1=&rss2=&atom=&commentReply='); ?>

    <?php if($this->options->GA): ?>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create',<?php echo $this->options->GA ?>, 'auto');
    ga('send', 'pageview');
    </script>
    <?php endif;?>

    <title>
        <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' | '); ?>
        <?php $this->options->title(); ?>
        <?php if($this->is('index')){echo " | "; $this->options->description(); }?>
    </title>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('dist/' . 'index' . '.css'); ?>">
</head>

<body>
<!--[if lt IE 11]>
    <div class="browsehappy" role="dialog">当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请<a href="//browsehappy.com/">升级你的浏览器</a></div>
<![endif]-->

<canvas class='connecting-dots'></canvas>

<?php if(is_mobile()) : ?>
    <aside class="mdc-drawer mdc-drawer--persistent mdc-typography">
        <nav class="mdc-drawer__drawer">
            <div class="mdc-drawer__toolbar-spacer"></div>
            <div class="mdc-list-group">
                <nav class="mdc-list">
                    <a class="mdc-list-item mdc-list-item--activated" href="<?php $this->options->siteUrl(); ?>" id="home">首页</a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a href="<?php $pages->permalink(); ?>" class="mdc-list-item"><?php $pages->title(); ?></a>
                    <?php endwhile; ?> 
                </nav>
            </div>
        </nav>
    </aside>
<?php endif;?>

<div class="body-content">
<header id="header">
    <div id="menu-bar" class="container">
        <?php if(is_mobile()) : ?><a id="toggle"><span></span></a><?php endif;?>

        <h1 class="logo"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>

        <?php if(!is_mobile()) : ?>
        <nav id="nav-menu" class="clearfix" role="navigation">
            <a<?php if($this->is('index')): ?> class="current mdc-button mdc-button--unelevated color-filled-button"<?php endif; ?> class="mdc-button mdc-button--unelevated color-filled-button" href="<?php $this->options->siteUrl(); ?>" id="home">首页</a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <a<?php if($this->is('page', $pages->slug)): ?> class="current mdc-button mdc-button--unelevated color-filled-button"<?php endif; ?> class="mdc-button mdc-button--unelevated color-filled-button" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
            <?php endwhile; ?>
        </nav>
        <?php endif;?>

        <?php if(is_mobile()) : ?>
        <div id="search-content">
            <form id="search" method="post" action="./" role="search">
                <input type="text" name="s" class="text" autocomplete="off" placeholder="输入关键字搜索" />
                <hr/><hr/><button type="submit" class="submit"></button>
            </form>
        </div>
        <?php endif;?>
    </div>
</header>

<div class="container mdc-layout-grid">
    <div class="mdc-layout-grid__inner">