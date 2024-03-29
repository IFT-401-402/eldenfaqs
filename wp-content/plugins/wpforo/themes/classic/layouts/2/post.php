<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="wpfl-2">

    <div class="wpforo-post-head">
        <div class="wpf-left">&nbsp;
            <a href="<?php echo esc_url( wpforo_post( $topic['last_post'], 'url' ) ); ?>" class="wpfcl-2"><i class="far fa-caret-square-down wpfsx wpfcl-3"></i> &nbsp; <span class="wpfcl-3"><?php wpforo_phrase( 'Last Post' ); ?></span></a>
			<?php do_action( 'wpforo_topic_head_left', $forum, $topic ) ?>
        </div>
        <div class="wpf-right">
			<?php do_action( 'wpforo_topic_head_right', $forum, $topic ) ?>
			<?php wpforo_post_buttons( 'icon-text', 'tools', $forum ); ?>&nbsp;
			<?php wpforo_feed_link(); ?>
        </div>
        <div class="wpf-clear"></div>
    </div>
	<?php wpforo_moderation_tools(); ?>

	<?php foreach( $posts as $key => $post ) : ?>

		<?php $member = wpforo_member( $post );
		$post_url     = wpforo_post( $post['postid'], 'url' ); ?>
        <div id="post-<?php echo wpforo_bigintval( $post['postid'] ) ?>" data-postid="<?php echo wpforo_bigintval( $post['postid'] ) ?>" data-userid="<?php echo wpforo_bigintval( $member['userid'] ) ?>" data-mention="<?php echo esc_attr( ( wpforo_setting( 'profiles', 'mention_nicknames' ) ? $member['user_nicename'] : '' ) ) ?>" data-isowner="<?php echo esc_attr( (int) (bool) wpforo_is_owner( $member['userid'] ) ) ?>"
             class="post-wrap wpfn-<?php echo( $key + 1 ); ?><?php if( $post['is_first_post'] ) echo ' wpfp-first' ?>">
			<?php wpforo_share_toggle( $post_url, $post['body'] ); ?>
            <div class="wpforo-post wpfcl-1">
                <div class="wpf-left">
					<?php if( WPF()->usergroup->can( 'va' ) && wpforo_setting( 'profiles', 'avatars' ) ): ?>
                        <div class="author-avatar"><?php echo WPF()->member->avatar( $member, 'alt="' . esc_attr( $member['display_name'] ) . '"', 110 ) ?></div>
					<?php endif; ?>
                    <div class="author-data">
                        <div class="author-name"><span><?php WPF()->member->show_online_indicator( $member['userid'] ) ?></span>&nbsp;<?php wpforo_member_link( $member ); ?></div>
						<?php wpforo_member_nicename( $member, '@' ); ?>
                        <div class="wpf-member-profile-buttons">
							<?php WPF()->tpl->member_buttons( $member ) ?>
                        </div>
                        <div class="author-title">
							<?php wpforo_member_title( $member ) ?>
                        </div>
						<?php wpforo_member_badge( $member ) ?>
                    </div>
                    <div class="wpf-clear"></div>
                </div><!-- left -->
                <div class="wpf-right">
                    <div class="wpforo-post-content-top">
                        <div class="wpf-post-actions">
							<?php if( $post['is_first_post'] ) {
								$buttons = [ 'solved', 'sticky', 'private', 'close', 'report', 'delete', 'link' ];
							} else {
								$buttons = [ 'report', 'delete', 'link' ];
							}
							wpforo_post_buttons( 'icon-text', $buttons, $forum, $topic, $post );
							?>
                        </div>
						<?php wpforo_share_toggle( $post_url, $post['body'], 'top' ); ?>
                    </div>
                    <div class="wpforo-post-content">
						<?php wpforo_content( $post ); ?>
						<?php wpforo_post_edited( $post ); ?>
						<?php do_action( 'wpforo_tpl_post_loop_after_content', $post, $member ) ?>
						<?php if( wpforo_setting( 'profiles', 'signature' ) ): ?>
							<?php if( $member['signature'] ): ?>
                                <div class="wpforo-post-signature"><?php wpforo_signature( $member ) ?></div><?php endif; ?>
						<?php endif; ?>
                        <div class="wpf-post-button-actions">
							<?php
							$buttons = [ 'reply', 'quote', 'approved', 'edit' ];
							wpforo_post_buttons( 'icon-text', $buttons, $forum, $topic, $post );
							?>
							<?php if( $post['status'] ): ?>
                                <span class="wpf-mod-message"><i class="fas fa-exclamation-circle" aria-hidden="true"></i> <?php wpforo_phrase( 'Awaiting moderation' ) ?></span>
							<?php endif; ?>
                        </div>
                        <?php do_action( 'wpforo_post_content_end', $post, $topic, $forum, 2 ); ?>
                    </div>
                    <div class="wpforo-post-content-bottom">
                        <div class="cbleft wpfcl-0">
							<?php wpforo_topic_starter( $topic, $post ) ?>
							<?php wpforo_phrase( 'Posted' ) ?> : <?php wpforo_date( $post['created'], 'd/m/Y g:i a' ) ?>
	                        <?php do_action( 'wpforo_post_bottom_end', $post, $topic, $forum, 2 ); ?>
                        </div>
                        <div class="wpf-clear"></div>
                    </div>
                </div><!-- right -->
                <div class="wpf-clear"></div>
            </div><!-- wpforo-post -->
        </div><!-- post-wrap -->

		<?php if( $post['is_first_post'] ): ?>
            <div class="wpforo-topic-meta">
				<?php wpforo_tags( $topic ); ?>
            </div>
		<?php endif; ?>

		<?php do_action( 'wpforo_loop_hook', $key ) ?>

	<?php endforeach; ?>
</div><!-- wpfl-2 -->
