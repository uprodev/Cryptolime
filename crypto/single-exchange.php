<?php get_header(); ?>

<div class="container">

	<?php get_template_part('parts/breadcrumbs') ?>

	<div class="stock-single">
		<div class="page-layout-2col">
			<div class="column-left">
				<div class="article">
					<div class="stock-card-wide">
						<div class="inner">
							<div class="stock-card-title">
								<span class="stock-card-icon">
									<?php the_post_thumbnail('full') ?>
								</span>
								<div class="stock-card-text">
									<p><?php the_title() ?></p>

									<?php 
									$terms = wp_get_object_terms(get_the_ID(), 'uexchange_cat');
									?>

									<?php if ($terms): ?>
										<div class="stock-card-links">

											<?php foreach ($terms as $term): ?>
												<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
											<?php endforeach ?>

										</div>
									<?php endif ?>

								</div>
							</div>

							<?php if( have_rows('description') ): ?>

								<div class="stock-card-data">
									<ul>

										<?php while( have_rows('description') ): the_row(); ?>

											<li>
												<div class="stock-card-data-title"><?php the_sub_field('title') ?></div>
												<div class="stock-card-data-value"><?php the_sub_field('text') ?></div>
											</li>

										<?php endwhile; ?>

									</ul>
								</div>

							<?php endif; ?>

						</div>
					</div>
					<h1 class="h2"><?php _e('Exchange information', 'Crypto') ?></h1>
					<?php the_content() ?>
				</div>
				<div class="d-md-flex align-items-center justify-content-between">
					<div class="article-info">
						<div class="article-rating">
							<div class="rating-value">4.0</div>
							<div class="rating-votes">236</div>
							<div class="rate" data-rating="80"><div class="rate-inner"></div></div>
						</div>
						<div class="hash-tags"><span>#Bts</span><span>#Новости</span><span>#Hack</span></div>
					</div>
					<div class="article-share">
						<p>Поделиться</p>
						<ul>
							<li>
								<a class="inner" href="#"><img src="assets/img/icons/ico-twitter-white.svg" alt="" /></a>
							</li>
							<li>
								<a class="inner" href="#"><img src="assets/img/icons/ico-telegram-white.svg" alt="" /></a>
							</li>
							<li>
								<a class="inner" href="#"><img src="assets/img/icons/ico-facebook-white.svg" alt="" /></a>
							</li>
							<li>
								<a class="inner" href="#"><img src="assets/img/icons/ico-linked-white.svg" alt="" /></a>
							</li>
							<li>
								<a class="inner" href="#"><img src="assets/img/icons/ico-vk-white.svg" alt="" /></a>
							</li>
							<li>
								<a class="inner" href="#"><img src="assets/img/icons/ico-chain-white.svg" alt="" /></a>
							</li>
						</ul>
					</div>
				</div>

				<div class="comments-wrapper">
					<div class="inner">
						<div class="comments-form">
							<div class="h1">ОСТАВЬТЕ ОТВЕТ</div>
							<form action="#">
								<textarea placeholder="Комментарий:"></textarea>
								<div class="d-flex align-items-center justify-content-between">
									<div class="form-rate">
										<label>Оцените проэкт</label>
										<select id="rating" name="rating">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<button type="submit" class="btn btn-lime">Опубликовать</button>
								</div>
							</form>
						</div>

						<div id="comments" class="comments-area">
							<h2 class="comments-title">2 comments</h2>

							<ol class="comment-list">
								<li class="comment depth-1">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
												<img alt="" src="assets/img/ava10.png" class="avatar" />
												<b class="fn"><a href="#" class="url" target="_blank">Михаил Теткин</a></b>
												<span class="says">says:</span>
												<div class="comment-author-rating"><span>4.0</span></div>
											</div>

											<div class="comment-metadata">
												<a href="#">20 минут назад</a>
												<a href="#" class="comment-reply">Ответить</a>
											</div>
										</footer>

										<div class="comment-content">
											<p>В начале сентября в другом сибирском регионе – Хакасии – задержали жителя Абакана, который собрал с земляком деньги для покупки майнингового оборудования, а затем скрылся</p>
										</div>
									</article>
								</li>
								<li class="comment depth-2">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
												<img alt="" src="assets/img/ava10.png" class="avatar" />
												<b class="fn"><a href="#" class="url" target="_blank">Михаил Теткин</a></b>
												<span class="says">says:</span>
												<div class="comment-author-rating"><span>4.0</span></div>
											</div>

											<div class="comment-metadata">
												<a href="#">28 минут назад</a>
												<a href="#" class="comment-reply">Ответить</a>
											</div>
										</footer>

										<div class="comment-content">
											<p>А затем скрылся</p>
										</div>
									</article>
								</li>
								<li class="comment depth-2">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
												<img alt="" src="assets/img/ava10.png" class="avatar" />
												<b class="fn"><a href="#" class="url" target="_blank">Михаил Теткин</a></b>
												<span class="says">says:</span>
												<div class="comment-author-rating"><span>4.0</span></div>
											</div>

											<div class="comment-metadata">
												<a href="#">40 минут назад</a>
												<a href="#" class="comment-reply">Ответить</a>
											</div>
										</footer>

										<div class="comment-content">
											<p>В другом сибирском региогне</p>
										</div>
									</article>
								</li>
								<li class="comment depth-1">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
												<img alt="" src="assets/img/ava10.png" class="avatar" />
												<b class="fn"><a href="#" class="url" target="_blank">Михаил Теткин</a></b>
												<span class="says">says:</span>
												<div class="comment-author-rating"><span>4.0</span></div>
											</div>

											<div class="comment-metadata">
												<a href="#">1 час назад </a>
												<a href="#" class="comment-reply">Ответить</a>
											</div>
										</footer>

										<div class="comment-content">
											<p>Задержали жителя Абакана, который собрал с земляком деньги для покупки майнингового оборудования, а затем скрылся</p>
										</div>
									</article>
								</li>
							</ol>
						</div>

						<div class="comments-more">
							<a href="#" class="see-all">Смотреть больше</a>
						</div>
					</div>
				</div>
			</div>

			<div class="column-right">
				<div class="tags-list">
					<div class="inner">
						<h2 class="h1">ТЕГИ</h2>
						<div class="tags">
							<a href="#">Трейдинг и инвестиции</a>
							<a href="#">Ethereum </a>
							<a href="#"> Базовый </a>
							<a href="#">NFT </a>
							<a href="#">Продвин. NFT и метавселенные </a>
							<a href="#">Новости </a>
							<a href="#">Биткоин </a>
							<a href="#">DeFi </a>
							<a href="#">Капитализация </a>
							<a href="#">Альткоин </a>
						</div>
						<a href="#" class="see-all">Читать польностью</a>
					</div>
				</div>

				<div class="sidebar-banner d-none d-lg-block">
					<a href="#">
						<picture>
							<source media="(min-width: 768px)" srcset="assets/img/banner01.png" />
							<img src="assets/img/banner-m.png" alt="" />
						</picture>
					</a>
				</div>

				<div class="block-twitter">
					<a class="twitter-timeline" data-height="490" data-theme="dark" href="https://twitter.com/VitalikButerin?ref_src=twsrc%5Etfw">Tweets by VitalikButerin</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="more-news-wrapper">
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">
			<h2 class="h1">БОЛЬШЕ НОВОСТЕЙ</h2>
			<a href="#" class="see-all">Смотреть все </a>
		</div>
		<div class="wrapper">
			<div class="column">
				<div class="news-item news-item--image-wide">
					<div class="news-item-img">
						<a href="#"><img src="assets/img/img06.png" alt="" /></a>
					</div>
					<div class="news-item-text">
						<a class="news-item-title" href="#">Bloomberg исключил Сэма Бэнкмана-Фрида из списка </a>
						<a href="#" class="news-author">
							<span class="news-author-icon"><img src="assets/img/ava03.png" alt="" /></span>
							<span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
						</a>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="news-item news-item--image-wide">
					<div class="news-item-img">
						<a href="#"><img src="assets/img/img07.png" alt="" /></a>
					</div>
					<div class="news-item-text">
						<a class="news-item-title" href="#">Британская криптобиржа Archax привлекла $28,5 млн</a>
						<a href="#" class="news-author">
							<span class="news-author-icon"><img src="assets/img/ava03.png" alt="" /></span>
							<span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
						</a>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="news-item news-item--image-wide">
					<div class="news-item-img">
						<a href="#"><img src="assets/img/img08.png" alt="" /></a>
					</div>
					<div class="news-item-text">
						<a class="news-item-title" href="#">Bitget запустила сервис для публикации торговых идей и прог..</a>
						<a href="#" class="news-author">
							<span class="news-author-icon"><img src="assets/img/ava03.png" alt="" /></span>
							<span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
						</a>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="news-item news-item--image-wide">
					<div class="news-item-img">
						<a href="#"><img src="assets/img/img09.png" alt="" /></a>
					</div>
					<div class="news-item-text">
						<a class="news-item-title" href="#">Президент Сальвадора назвал FTX противоположностью биткоина</a>
						<a href="#" class="news-author">
							<span class="news-author-icon"><img src="assets/img/ava03.png" alt="" /></span>
							<span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>