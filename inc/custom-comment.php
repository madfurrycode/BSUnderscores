<?php

function bsunderscores_comment( $comment, $args, $depth ) {
    ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

        <?php
            $bsunderscores_gravatar_url = get_avatar_url( $comment );
        ?>
        <article class="media bsunderscores-comment">
            <?php if (! empty( $bsunderscores_gravatar_url ) ) : ?>
                <img class="d-flex align-self-start mr-4 comment-img rounded" src="<?php echo esc_url( $bsunderscores_gravatar_url ); ?>" alt="<?php echo esc_attr( get_comment_author() ); ?>" width="60">
            <?php endif; ?>
            <div class="media-body">
                <h6 class="mt-0 mb-0 comment-author">
                    <?php echo get_comment_author_link(); ?>
                    <?php if ( $comment->comment_author_email == get_the_author_meta( 'email' ) ) : ?>
                        <small class="bsunderscores-comment-by-author ml-2 text-muted"><?php echo esc_html__( '&#8226; Post Author &#8226;', 'bsunderscores' ) ?></small>
                    <?php endif; ?>
                </h6>
                <small class="date text-muted"><?php printf( // WPCS: XSS OK.
                                                        /* translators: %1 %2: date and time. */
                                                        esc_html__('%1$s at %2$s', 'bsunderscores'),
                                                        get_comment_date(),
                                                        get_comment_time()
                                                    ); ?></small>
                <?php if ($comment->comment_approved == '0') : ?>
					<small><em class="comment-awaiting text-muted"><?php esc_html_e('Comment is awaiting approval', 'bsunderscores'); ?></em></small>
					<br />
				<?php endif; ?>

                <div class="mt-3">
                    <?php comment_text(); ?>
                </div>

                <?php
                    $args['before'] = '';
                ?>

                <small class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'bsunderscores' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ), $comment->comment_ID ); ?>
					<?php edit_comment_link( esc_html__( 'Edit', 'bsunderscores' ) ); ?>
				</small>
            </div>
            <!-- /.media-body -->
        </article>

    <?php
}
