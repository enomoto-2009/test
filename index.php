<?php get_header(); ?>
<main>
    <h1>投稿一覧</h1>
    <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>
            <hr>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p>投稿日：<time datetime="<?php the_time('Y-m-j'); ?>"><?php the_time('Y年n月j日'); ?></time></p>
                <p><?php the_content(); ?></p>
                <?php
                    $author = get_userdata( $post->post_author );
                    if( get_current_user_id() === $author->ID ):
                ?>
                    <p><a href="/post-delete-confirm/?del=<?= $post->ID ?>"><button type="button">削除</button></a></p>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>