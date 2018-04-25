<aside class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3" role="complementary">
    <?php if(!is_mobile()) :?>
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowSearch', $this->options->sidebarBlock)): ?>
        <section class="widget widget_search">
            <h3>文章搜索</h3>
            <form id="search" method="post" action="./" role="search">
                <input type="text" name="s" class="text" autocomplete="off" placeholder="输入关键字搜索" />
                <hr/><hr/><button type="submit" class="submit"></button>
            </form>
        </section>
        <?php endif; ?> 
    <?php endif; ?> 

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3>文章分类</h3>
            <ul class="mdc-list mdc-list--dense">
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while ($category->next()): ?>
                    <li class="mdc-list-item"<?php if ($this->is('post')): ?>
                        <?php if ($this->category == $category->slug): ?> class="current"<?php endif; ?>
                        <?php else: ?><?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>
                        <?php endif; ?>>
                        <a href="<?php $category->permalink(); ?>"><?php $category->name(); ?>(<?php $category->count(); ?>)</a>
                    </li>
                    <li class="mdc-list-divider" role="separator"></li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if(!is_mobile()) :?>
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3>最新文章</h3>
            <ul class="mdc-list mdc-list--dense">
                <?php $this->widget('Widget_Contents_Post_Recent','pageSize=5')
                ->parse('<li class="mdc-list-item"><a href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </section>
        <?php endif; ?>

        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
            <section class="widget">
                <h3>归档</h3>
                <ul class="mdc-list">
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                    ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                </ul>
            </section>
        <?php endif; ?>

        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowTags', $this->options->sidebarBlock)): ?>
            <section class="widget widget-tag">
                <h3>热门标签</h3>
                <div class="tag-cloud">
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=true&limit=30') ->parse('<a href="{permalink}" class="tag-link-{count}">{name} ({count})</a>'); ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
</aside>