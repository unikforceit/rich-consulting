<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post-details'); ?>>
    	<?php the_title( ' <div class="title">
                                <h3>', '</h3></div>') ?>
    <div class="blog-meta">
            <div class="author">
                <span><?php richconsulting_post_author();?></span>
            </div>
            <div class="date">
                <span><?php richconsulting_post_date();?></span>
            </div>
            <div class="comments">
                <span><i class="fas fa-comments"></i> <?php echo get_comments_number(get_the_ID());?></span>
            </div>
    </div>
    <div class="divider"></div>
    <div class="pera-content">
        <?php the_content();?>
    </div>

    <div class="blog-tags-and-social">
      <?php richconsulting_share_tags();?>
    </div>
    <div class="divider"></div>
    <?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	  ?>    
</div>