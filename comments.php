<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 */
 
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?> 
 
<div class="comment-box comments">

	<?php if ( have_comments() ) : ?>
	  <div class="comment-wrap">
		<div class="title">
			<h3><?php comments_number(esc_attr__('No comments', 'rich-consulting'), esc_attr__('1 comment', 'rich-consulting'), esc_attr__('% comments', 'rich-consulting')); ?>
			</h3>
		</div> 

		<ul class="comment-list">
			<?php wp_list_comments( 'callback=richconsulting_comment_callback&reply_text=Reply' ); ?>
		</ul><!-- .comment-list -->

		<?php richconsulting_comment_nav(); ?>
      </div>
	<?php endif;?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'rich-consulting' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

    $com_log = '';
    if (is_user_logged_in()){
        $com_log = '<div class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . esc_attr__( 'Comment *'  , 'rich-consulting' ) . '</span></label><textarea id="comment" class="form-control-textarea" name="comment" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Enter Comment here...'  , 'rich-consulting' ) . '"></textarea></div>';
    }else{
        $com_log = '';
    }
	$fields =  array(
		'author' => '<div class="comment-form-author"><label for="author"><span class="screen-reader-text">' . esc_attr__( 'Name *'  , 'rich-consulting' ) . '</span></label><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Enter Name here...'  , 'rich-consulting' ) . '"/></div>',
		'email'  => '<div class="comment-form-email"><label for="email"><span class="screen-reader-text">' . esc_attr__( 'Email *'  , 'rich-consulting' ) . '</span></label><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Enter email here...'  , 'rich-consulting' ) . '"/></div>',
		'url'  => '<div class="comment-form-url"><label for="url"><span class="screen-reader-text">' . esc_attr__( 'Website *'  , 'rich-consulting' ) . '</span></label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Enter Your Website...'  , 'rich-consulting' ) . '"/></div>',
        'comment_field' => '<div class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . esc_attr__( 'Comment *'  , 'rich-consulting' ) . '</span></label><textarea id="comment" class="form-control-textarea" name="comment" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Enter Comment here...'  , 'rich-consulting' ) . '"></textarea></div>',

    );
	$required_text = esc_attr__(' Required fields are marked ', 'rich-consulting').' <span class="required">*</span>';
	?>
	<?php comment_form( array( 
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' , 'rich-consulting' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s" title="Log out of this account">Log out?</a>'  , 'rich-consulting' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_notes_before' => '',
		'title_reply' => esc_attr__( 'Leave a Comment'  , 'rich-consulting' ),
		'title_reply_to' => esc_attr__( 'Leave a reply to %s'  , 'rich-consulting' ),
		'cancel_reply_link' => esc_attr__( 'Cancel reply'  , 'rich-consulting' ) . '',
		'label_submit' => esc_attr__( 'Post Comment'  , 'rich-consulting' ),
        'comment_field' => $com_log,
	));
	?>	

</div><!-- #comments -->

