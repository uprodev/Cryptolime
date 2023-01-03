<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div class="news-popular-wrapper">
	<div class="container">
		<div class="wrapper">
			<div class="column">
				<div class="news-popular">
					<div class="inner">
						<div class="d-flex align-items-center justify-content-between">

							<?php if ($field = get_field('title_1')): ?>
								<h2 class="h1"><?= $field ?></h2>
							<?php endif ?>
							
							<?php if ($field = get_field('link_1')): ?>
								<a href="<?= $field['url'] ?>" class="see-all"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
							<?php endif ?>

						</div>

						<?php
						$featured_posts = get_field('items_1');
						if($featured_posts): ?>

							<div class="news-popular-slider">
								<div class="swiper">
									<div class="swiper-wrapper">

										<?php foreach($featured_posts as $post): 

											setup_postdata($post); ?>

											<div class="swiper-slide">
												<div class="d-md-flex">
													<div class="news-popular-image">
														<a href="<?php the_permalink() ?>">
															<?php the_post_thumbnail('full') ?>
														</a>
													</div>
													<div class="news-popular-text">
														<h2>
															<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
														</h2>
														<?php the_excerpt() ?>
														<a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="news-author">

															<?php if ($field = get_field('avatar', 'user_' . get_the_author_meta('ID'))): ?>
																<span class="news-author-icon">
																	<?= wp_get_attachment_image($field['ID'], 'full') ?>
																</span>
															<?php endif ?>
															
															<span class="news-author-text"><?= get_the_author_meta('first_name') ?> <?= get_the_author_meta('last_name') ?></span>
														</a>
													</div>
												</div>
											</div>
										<?php endforeach; ?>

										<?php wp_reset_postdata(); ?>

									</div>
								</div>
								<div class="slider-controls">
									<div class="swiper-pagination"></div>
									<div class="swiper-arrows">
										<div class="swiper-button-prev"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>
							</div>

						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="column d-none d-lg-block">

				<?php if ($field = get_field('tweet_1')): ?>
					<div class="block-twitter"><?= $field ?></div>
				<?php endif ?>

			</div>
		</div>
	</div>
</div>

<div class="news-list-wrapper">
	<div class="container">
		<div class="news-filter-wrapper d-lg-flex">

			<?php if ($field = get_field('title_2')): ?>
				<h2 class="h1"><?= $field ?></h2>
			<?php endif ?>

			<div class="news-filter">
				<div class="inner">
					<div class="news-categories">

						<?php if ($field = get_field('link_news', 'option')): ?>
							<a href="<?= $field['url'] ?>" class="news-category active"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
						<?php endif ?>

						<?php 
						$terms = get_terms( [
							'taxonomy' => 'category',
							'hide_empty' => false,
						] ); 
						?>

						<?php if ($terms): ?>
							<?php foreach ($terms as $term): ?>
								<a href="<?= get_term_link($term->term_id) ?>" class="news-category"><?= $term->name ?></a>
							<?php endforeach ?>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>

		<?php if( have_rows('items_2') ): ?>
			<?php while( have_rows('items_2') ): the_row(); ?>

				<div class="wrapper news-card-slider">
					<div class="column-category">
						<div class="news-card">

							<?php $category_id = get_sub_field('category') ?>

							<?php if ($field = get_field('image', 'term_' . $category_id)): ?>
								<div class="news-card-image">
									<?= wp_get_attachment_image($field['ID'], 'full') ?>
								</div>
							<?php endif ?>

							<div class="inner" data-img="<?= $field['url'] ?>">
								<div class="d-flex align-items-center justify-content-lg-between">
									<h2 class="h1"><?= get_term($category_id)->name ?></h2>
									<button class="btn-plus"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-plus.svg" alt="" /></button>
								</div>
							</div>
						</div>
						<div class="link-wrapper">
							<a href="<?= get_term_link($category_id) ?>" class="see-all"><?php _e('See all', 'Crypto') ?></a>
						</div>
						<div class="slider-controls">
							<div class="swiper-pagination"></div>
							<div class="swiper-arrows">
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>
							</div>
						</div>
					</div>

					<?php $wp_query = new WP_Query(array('post_type' => 'post', 'cat' => $category_id, 'posts_per_page' => 12, 'paged' => get_query_var('paged')));
					if ($wp_query->have_posts()):
						$counter = 1;
						?>
						<div class="column-slider">
							<div class="swiper">
								<div class="swiper-wrapper">

									<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

										<?php if (get_row_index() % 2 != 0): ?>

											<?php if ($counter == 1 || $counter == 8): ?>
												<div class="swiper-slide">
												<?php endif ?>

												<?php if ($counter == 1 || $counter == 4 || $counter == 5 || $counter == 8 || $counter == 9 || $counter == 12): ?>
													<div class="column">
													<?php endif ?>

													<?php if ($counter == 1 || $counter == 5 || $counter == 9): ?>
														<div class="news-list">
														<?php endif ?>

														<?php if ($counter != 4 && $counter != 8 && $counter != $wp_query->post_count): ?>
															<div class="news-item">
																<p class="news-item-time"><?= get_the_date() ?></p>
																<a class="news-item-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
															</div>
														<?php endif ?>

														<?php if ($counter == 3 || $counter == 7 || $counter == 11): ?>
														</div>
													<?php endif ?>

													<?php if ($counter == 4 || $counter == 8 || $counter == $wp_query->post_count): ?>
														<div class="news-item news-item--image">
															<div class="news-item-img">
																<a href="<?php the_permalink() ?>">
																	<?php the_post_thumbnail('full') ?>
																</a>
															</div>
															<div class="news-item-text">
																<p class="news-item-time"><?= get_the_date() ?></p>
																<a class="news-item-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
															</div>
														</div>
													<?php endif ?>	

													<?php if ($counter == 3 || $counter == 4 || $counter == 7 || $counter == 8 || $counter == 11 || $counter == $wp_query->post_count): ?>
													</div>
												<?php endif ?>

												<?php if ($counter == 7 || $counter == $wp_query->post_count): ?>
												</div>
											<?php endif ?>

										<?php else: ?>

											<?php if ($counter == 1 || $counter == 6): ?>
												<div class="swiper-slide">
												<?php endif ?>

												<?php if ($counter == 1 || $counter == 2 || $counter == 5 || $counter == 6 || $counter == 9 || $counter == 10): ?>
													<div class="column">
													<?php endif ?>

													<?php if ($counter == 2 || $counter == 6 || $counter == 10): ?>
														<div class="news-list">
														<?php endif ?>

														<?php if ($counter != 1 && $counter != 5 && $counter != 9): ?>
															<div class="news-item">
																<p class="news-item-time"><?= get_the_date() ?></p>
																<a class="news-item-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
															</div>
														<?php endif ?>
														
														<?php if ($counter == 4 || $counter == 8 || $counter == $wp_query->post_count): ?>
														</div>
													<?php endif ?>

													<?php if ($counter == 1 || $counter == 5 || $counter == 9): ?>
														<div class="news-item news-item--image">
															<div class="news-item-img">
																<a href="<?php the_permalink() ?>">
																	<?php the_post_thumbnail('full') ?>
																</a>
															</div>
															<div class="news-item-text">
																<p class="news-item-time"><?= get_the_date() ?></p>
																<a class="news-item-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
															</div>
														</div>
													<?php endif ?>	

													<?php if ($counter == 1 || $counter == 4 || $counter == 5 || $counter == 8  || $counter == 9 || $counter == $wp_query->post_count): ?>
													</div>
												<?php endif ?>

												<?php if ($counter == 5 || $counter == $wp_query->post_count): ?>
												</div>
											<?php endif ?>

										<?php endif ?>

										<?php 
										$counter++;
									endwhile;
									wp_reset_query(); 
									?>

								</div>
							</div>
						</div>
					<?php endif ?>

				</div>

				<?php if (($field = get_field('banner_2')) && get_row_index() == 2): ?>
				<div class="banner-promo"><?= $field ?></div>
			<?php endif ?>

		<?php endwhile; ?>
	<?php endif; ?>

</div>
</div>

<?php if ($field = get_field('tweet_1')): ?>	
	<div class="block-twitter d-lg-none">
		<div class="container">
			<div class="block-twitter"><?= $field ?></div>
		</div>
	</div>
<?php endif ?>

<div class="more-news-wrapper">
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">

			<?php if ($field = get_field('title_3')): ?>
				<h2 class="h1"><?= $field ?></h2>
			<?php endif ?>

			<?php if ($field = get_field('link_3')): ?>
				<a href="<?= $field['url'] ?>" class="see-all"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
			<?php endif ?>

		</div>

		<?php
		$featured_posts = get_field('items_3');
		if($featured_posts): ?>

			<div class="wrapper">

				<?php foreach($featured_posts as $post): 

					setup_postdata($post); ?>
					<div class="column">
						<div class="news-item news-item--image-wide">
							<div class="news-item-img">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail('full') ?>
								</a>
							</div>
							<div class="news-item-text">
								<a class="news-item-title" href="#"><?php the_title() ?></a>
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
					</div>
				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			</div>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>