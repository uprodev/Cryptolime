<?php
/*
Template Name: News
*/
?>

<?php get_header(); ?>

<div class="container">

	<?php get_template_part('parts/breadcrumbs') ?>

	<div class="news-all">
		<div class="news-filter-wrapper d-lg-flex">
			<h2 class="h1"><?php the_title() ?></h2>

			<?php 
			$terms = get_terms( [
				'taxonomy' => 'category',
				'hide_empty' => false,
			] ); 
			?>

			<?php if ($terms): ?>

				<div class="news-filter">
					<div class="inner">
						<div class="news-categories">

							<?php if ($field = get_field('link_news', 'option')): ?>
								<a href="<?= $field['url'] ?>" class="news-category active"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
							<?php endif ?>

							<?php foreach ($terms as $term): ?>
								<a href="<?= get_term_link($term->term_id) ?>" class="news-category"><?= $term->name ?></a>
							<?php endforeach ?>

						</div>
					</div>
				</div>

			<?php endif ?>
		</div>

		<div class="page-layout-2col">
			<div class="column-left">
				<div class="post-list view-type-list" data-class="view-type-list">
					<div class="view-type d-lg-none">
						<button type="button" data-type="view-type-box">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.3125 15.75H9.5625V9.5625H15.75V13.3125C15.75 13.959 15.4932 14.579 15.0361 15.0361C14.579 15.4932 13.959 15.75 13.3125 15.75ZM15.75 8.4375H9.5625V2.25H13.3125C13.959 2.25 14.579 2.50681 15.0361 2.96393C15.4932 3.42105 15.75 4.04103 15.75 4.6875V8.4375ZM8.4375 8.4375V2.25H4.6875C4.04103 2.25 3.42105 2.50681 2.96393 2.96393C2.50681 3.42105 2.25 4.04103 2.25 4.6875V8.4375H8.4375ZM2.25 9.5625V13.3125C2.25 13.959 2.50681 14.579 2.96393 15.0361C3.42105 15.4932 4.04103 15.75 4.6875 15.75H8.4375V9.5625H2.25Z" fill="#2B2B2E" />
							</svg>
						</button>
						<button type="button" class="active" data-type="view-type-list">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
								d="M3.33333 11.6667H5C5.45833 11.6667 5.83333 11.2917 5.83333 10.8333V9.16666C5.83333 8.70832 5.45833 8.33332 5 8.33332H3.33333C2.875 8.33332 2.5 8.70832 2.5 9.16666V10.8333C2.5 11.2917 2.875 11.6667 3.33333 11.6667ZM3.33333 15.8333H5C5.45833 15.8333 5.83333 15.4583 5.83333 15V13.3333C5.83333 12.875 5.45833 12.5 5 12.5H3.33333C2.875 12.5 2.5 12.875 2.5 13.3333V15C2.5 15.4583 2.875 15.8333 3.33333 15.8333ZM3.33333 7.49999H5C5.45833 7.49999 5.83333 7.12499 5.83333 6.66666V4.99999C5.83333 4.54166 5.45833 4.16666 5 4.16666H3.33333C2.875 4.16666 2.5 4.54166 2.5 4.99999V6.66666C2.5 7.12499 2.875 7.49999 3.33333 7.49999ZM7.5 11.6667H16.6667C17.125 11.6667 17.5 11.2917 17.5 10.8333V9.16666C17.5 8.70832 17.125 8.33332 16.6667 8.33332H7.5C7.04167 8.33332 6.66667 8.70832 6.66667 9.16666V10.8333C6.66667 11.2917 7.04167 11.6667 7.5 11.6667ZM7.5 15.8333H16.6667C17.125 15.8333 17.5 15.4583 17.5 15V13.3333C17.5 12.875 17.125 12.5 16.6667 12.5H7.5C7.04167 12.5 6.66667 12.875 6.66667 13.3333V15C6.66667 15.4583 7.04167 15.8333 7.5 15.8333ZM6.66667 4.99999V6.66666C6.66667 7.12499 7.04167 7.49999 7.5 7.49999H16.6667C17.125 7.49999 17.5 7.12499 17.5 6.66666V4.99999C17.5 4.54166 17.125 4.16666 16.6667 4.16666H7.5C7.04167 4.16666 6.66667 4.54166 6.66667 4.99999Z"
								fill="#2B2B2E"
								/>
							</svg>
						</button>
					</div>

					<?php $wp_query = new WP_Query(array('post_type' => 'post', 'paged' => get_query_var('paged')));
					$counter = 1;
					while ($wp_query->have_posts()): $wp_query->the_post(); ?>

						<div class="post-item<?php if($counter > $wp_query->post_count - 3) echo ' d-none d-lg-flex' ?>">
							<div class="post-item-image">
								<figure>
									<a href="<?php the_permalink() ?>">
										<?php the_post_thumbnail('full') ?>
									</a>
								</figure>
							</div>
							<div class="post-item-text">
								<div class="d-flex justify-content-between align-items-center">

									<?php $term = wp_get_object_terms(get_the_ID(), 'category')[0] ?>

									<?php if ($term): ?>
										<div class="post-item-tags">
											<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
										</div>
									<?php endif ?>
									
									<button class="btn-plus"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-plus.svg" alt="" /></button>
								</div>
								<div class="post-item-title">
									<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
								</div>
								<?php the_excerpt() ?>
								<a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="news-author">

									<?php if ($field = get_field('avatar', 'user_' . get_the_author_meta('ID'))): ?>
										<span class="news-author-icon">
											<?= wp_get_attachment_image($field['ID'], 'full') ?>
										</span>
									<?php endif ?>

									<span class="news-author-text"><?= get_the_author_meta('first_name') ?> <?= get_the_author_meta('last_name') ?><span><?= get_the_date('d.m.Y') ?></span></span>
								</a>
							</div>
						</div>

						<?php 
						$counter++;
					endwhile; 

					$args = array(
						'show_all'     => false,
						'end_size'     => 1,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => '<img src="' . get_template_directory_uri() . '/assets/img/icons/ico-pager-prev.svg" alt="" />',
						'next_text'    => '<img src="' . get_template_directory_uri() . '/assets/img/icons/ico-pager-next.svg" alt="" />',
						'add_args'     => false,
						'add_fragment' => '',
						'screen_reader_text' => __( 'Posts navigation' ),
						'type' => 'list',
					); ?>

					<div class="d-lg-none">
						<?php the_posts_pagination($args); ?>
					</div>

					<?php wp_reset_query(); ?>

				</div>
			</div>

			<div class="column-right">
				<div class="recommended-list">
					<div class="inner">

						<?php if ($field = get_field('recommended_title')): ?>
							<h2 class="h1"><?= $field ?></h2>
						<?php endif ?>
						
						<?php
						$featured_posts = get_field('recommended_posts');
						if($featured_posts): ?>

							<ul>

								<?php foreach($featured_posts as $post): 

									setup_postdata($post); ?>
									<li>
										<a href="<?php the_permalink() ?>" class="recommended-list-item">
											<span><?= get_the_date() ?></span>
											<?php the_title() ?>
										</a>
									</li>
								<?php endforeach; ?>

								<?php wp_reset_postdata(); ?>

							</ul>

						<?php endif; ?>

					</div>
				</div>

				<?php if ($field = get_field('banner')): ?>
					<div class="sidebar-banner"><?= $field ?></div>
				<?php endif ?>

				<?php if ($field = get_field('tweet')): ?>
					<div class="block-twitter"><?= $field ?></div>
				<?php endif ?>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>