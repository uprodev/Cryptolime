<?php
$symbol = get_field('symbol');
$meta = get_field('meta');
$api = new Api();
$data = $api->get_currency_data($symbol);
$decimals = $data->$symbol->quote->USD->price < 1 ? 4 : 2;
$price_change = $data->data->$symbol->quote->USD->price - $data->data->$symbol->quote->USD->price * $data->data->$symbol->quote->USD->percent_change_24h;

//print_r($data);


get_header(); ?>


    <div class="container">

        <?php get_template_part('parts/breadcrumbs') ?>

        <div class="coin-single">
            <div class="coin-card">
                <div class="inner">
                    <div class="coin-card-title">
                        <span class="coin-card-icon"><img src="<?= $meta->logo ?>" alt=""></span>
                        <div class="coin-card-text">
                            <p><?php the_title() ?></p>
                            <span><?= get_field('symbol') ?></span>
                        </div>
                        <div class="coin-card-links">

                            <a target="_blank" href="<?= $meta->urls->website[0] ?>">Веб-сайт</a>
                            <a target="_blank" href="https://Etherscan.io">Etherscan.io</a></div>
                    </div>
                    <div class="coin-card-price">
                        <div class="d-flex align-items-center">
                            <div class="coin-card-price-main"><?=  number_format($data->data->$symbol->quote->USD->price , $decimals, '.', ''); ?> $</div>
                            <div class="coin-card-price-dif <?= $data->data->$symbol->quote->USD->percent_change_24h > 0 ? 'plus' : 'minus' ?>">
                                <?= number_format($data->data->$symbol->quote->USD->percent_change_24h , 2, '.', ''); ?> %</div>
                        </div>
                        <div class="coin-card-price-change <?= $price_change > 0 ? 'plus' : 'minus' ?>"><?= number_format($price_change , $decimals, '.', '') ?> $</div>
                    </div>
                    <div class="coin-card-data">
                        <ul>
                            <li>
                                <div class="coin-card-data-title">Рыночная капитализация</div>
                                <div class="coin-card-data-value">$<?= number_format($data->data->$symbol->quote->USD->market_cap , 0, '.', ' '); ?></div>
                            </li>
                            <li>
                                <div class="coin-card-data-title">Объем <span>24 часа</span></div>
                                <div class="coin-card-data-value">$<?= number_format($data->data->$symbol->quote->USD->volume_24h , 0, '.', ' '); ?></div>
                            </li>
                            <li>
                                <div class="coin-card-data-title">Оборотное снабрежние</div>
                                <div class="coin-card-data-value"><?= number_format($data->data->$symbol->total_supply , 0, '.', ' '); ?> <?= $symbol ?></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-nav-wrapper">
                <h2 class="h1">МОНЕТА</h2>
                <ul class="tab-nav">
                    <li class="active"><a href="#tab1">Обзор</a></li>
                    <li class=""><a href="#tab2">Новости</a></li>
                    <li class=""><a href="#tab3">Рынки</a></li>
                </ul>
            </div>

            <div class="page-layout-2col">
                <div class="column-left">
                    <div id="tab1" class="tab-panel active  ">
                        <div class="coin-image-main">
                            <div id="priceSpark"></div>
                        </div>
                        <div class="tabs-inner">
                            <div class="inner">
                                <ul class="tab-nav-inner">
                                    <li class="active"><a href="#tab11">Статистика цены</a></li>
                                    <li class=""><a href="#tab12">История цен</a></li>
                                    <li class=""><a href="#tab13">Обзор</a></li>
                                </ul>
                                <div id="tab11" class="tab-panel-inner active" style="display: block;">
                                    <div class="panel-title">Статистика цены</div>
                                    <ul>
                                        <li><span>Цена</span><span>$<?=  number_format($data->data->$symbol->quote->USD->price , $decimals, '.', ''); ?> <?= number_format($data->data->$symbol->quote->USD->percent_change_24h , 2, '.', ''); ?>%</span></li>
                                        <li><span>Рейтинг</span><span><?= $data->data->$symbol->cmc_rank ?></span></li>
                                        <li><span>Рыночная каптилизация</span><span>$<?= number_format($data->data->$symbol->quote->USD->market_cap , 0, '.', ' '); ?></span></li>
                                        <li><span>Объем торгов за 24 часа</span><span>$<?= number_format($data->data->$symbol->quote->USD->volume_24h , 0, '.', ' '); ?></span></li>
                                        <li><span>Доминирование по р. кап.</span><span><?= number_format($data->data->$symbol->quote->USD->market_cap_dominance , 0, '.', ' '); ?></span></li>
                                        <li><span>24ч Мин:</span><span>838.53.54</span></li>
                                        <li><span>24ч Макс:</span><span>838.53.54</span></li>
                                    </ul>
                                </div>
                                <div id="tab12" class="tab-panel-inner" style="display: none;">
                                    <div class="panel-title">История цен</div>
                                    <ul>
                                        <li><span>7 д Мин:</span><span>$2.838.53 -2.54</span></li>
                                        <li><span>7 д Макс:</span><span>$2.838.53 -2.54</span></li>
                                        <li><span>30 д Мин</span><span>$2.838.53 -2.54</span></li>
                                        <li><span>30 д Макс:</span><span>$2.838.53 -2.54</span></li>
                                        <li><span>Абсолютный минимум</span><span>$2.838.53 -2.54</span></li>
                                        <li><span>Абсолютный максимум</span><span>$2.838.53 -2.54</span></li>
                                    </ul>
                                </div>
                                <div id="tab13" class="tab-panel-inner" style="display: none;">
                                    <div class="panel-title">Обращение</div>
                                    <ul>
                                        <li><span>Общее обращение </span><span>$<?= number_format($data->data->$symbol->circulating_supply , 0, '.', ' '); ?></span></li>
                                        <li><span>Общее предложение:</span><span>$<?= number_format($data->data->$symbol->total_supply , 0, '.', ' '); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="article">

                            <?= $meta->description ?>

                             <div class="text-more">
                             <?php the_content() ?>
                             </div>
                            <a href="#" class="read-more-btn">Читать польностью</a>
                        </div>
                    </div>

                    <div id="tab2" class="tab-panel">
                        <div class="post-list view-type-list" data-class="view-type-list">
                            <div class="view-type d-lg-none">
                                <button type="button" data-type="view-type-box">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.3125 15.75H9.5625V9.5625H15.75V13.3125C15.75 13.959 15.4932 14.579 15.0361 15.0361C14.579 15.4932 13.959 15.75 13.3125 15.75ZM15.75 8.4375H9.5625V2.25H13.3125C13.959 2.25 14.579 2.50681 15.0361 2.96393C15.4932 3.42105 15.75 4.04103 15.75 4.6875V8.4375ZM8.4375 8.4375V2.25H4.6875C4.04103 2.25 3.42105 2.50681 2.96393 2.96393C2.50681 3.42105 2.25 4.04103 2.25 4.6875V8.4375H8.4375ZM2.25 9.5625V13.3125C2.25 13.959 2.50681 14.579 2.96393 15.0361C3.42105 15.4932 4.04103 15.75 4.6875 15.75H8.4375V9.5625H2.25Z" fill="#2B2B2E"></path>
                                    </svg>
                                </button>
                                <button type="button" class="active" data-type="view-type-list">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.33333 11.6667H5C5.45833 11.6667 5.83333 11.2917 5.83333 10.8333V9.16666C5.83333 8.70832 5.45833 8.33332 5 8.33332H3.33333C2.875 8.33332 2.5 8.70832 2.5 9.16666V10.8333C2.5 11.2917 2.875 11.6667 3.33333 11.6667ZM3.33333 15.8333H5C5.45833 15.8333 5.83333 15.4583 5.83333 15V13.3333C5.83333 12.875 5.45833 12.5 5 12.5H3.33333C2.875 12.5 2.5 12.875 2.5 13.3333V15C2.5 15.4583 2.875 15.8333 3.33333 15.8333ZM3.33333 7.49999H5C5.45833 7.49999 5.83333 7.12499 5.83333 6.66666V4.99999C5.83333 4.54166 5.45833 4.16666 5 4.16666H3.33333C2.875 4.16666 2.5 4.54166 2.5 4.99999V6.66666C2.5 7.12499 2.875 7.49999 3.33333 7.49999ZM7.5 11.6667H16.6667C17.125 11.6667 17.5 11.2917 17.5 10.8333V9.16666C17.5 8.70832 17.125 8.33332 16.6667 8.33332H7.5C7.04167 8.33332 6.66667 8.70832 6.66667 9.16666V10.8333C6.66667 11.2917 7.04167 11.6667 7.5 11.6667ZM7.5 15.8333H16.6667C17.125 15.8333 17.5 15.4583 17.5 15V13.3333C17.5 12.875 17.125 12.5 16.6667 12.5H7.5C7.04167 12.5 6.66667 12.875 6.66667 13.3333V15C6.66667 15.4583 7.04167 15.8333 7.5 15.8333ZM6.66667 4.99999V6.66666C6.66667 7.12499 7.04167 7.49999 7.5 7.49999H16.6667C17.125 7.49999 17.5 7.12499 17.5 6.66666V4.99999C17.5 4.54166 17.125 4.16666 16.6667 4.16666H7.5C7.04167 4.16666 6.66667 4.54166 6.66667 4.99999Z" fill="#2B2B2E"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="post-item">
                                <div class="post-item-image">
                                    <figure>
                                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img10.png" alt=""></a>
                                    </figure>
                                </div>
                                <div class="post-item-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="post-item-tags">
                                            <a href="#">Биткоин</a>
                                        </div>
                                        <button class="btn-plus"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-plus.svg" alt=""></button>
                                    </div>
                                    <div class="post-item-title">
                                        <a href="#">Лучшими криптоактивами за 7 дней стали HT и QNT</a>
                                    </div>
                                    <p>FTX Group подала заявление о несостоятельности в соответствии с Главой 11 Кодекса США о банкротстве. Сэм Бэнкман-Фрид ушел с поста CEO.</p>
                                    <a href="#" class="news-author">
                                        <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava02.png" alt=""></span>
                                        <span class="news-author-text">Михаил Теткин<span>08.10.2022</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-item-image">
                                    <figure>
                                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img11.png" alt=""></a>
                                    </figure>
                                </div>
                                <div class="post-item-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="post-item-tags">
                                            <a href="#">Биткоин</a>
                                        </div>
                                        <button class="btn-plus"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-plus.svg" alt=""></button>
                                    </div>
                                    <div class="post-item-title">
                                        <a href="#">Лучшими криптоактивами за 7 дней стали HT и QNT</a>
                                    </div>
                                    <p>FTX Group подала заявление о несостоятельности в соответствии с Главой 11 Кодекса США о банкротстве. Сэм Бэнкман-Фрид ушел с поста CEO.</p>
                                    <a href="#" class="news-author">
                                        <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava02.png" alt=""></span>
                                        <span class="news-author-text">Михаил Теткин<span>08.10.2022</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-item-image">
                                    <figure>
                                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img12.png" alt=""></a>
                                    </figure>
                                </div>
                                <div class="post-item-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="post-item-tags">
                                            <a href="#">Биткоин</a>
                                        </div>
                                        <button class="btn-plus"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-plus.svg" alt=""></button>
                                    </div>
                                    <div class="post-item-title">
                                        <a href="#">Лучшими криптоактивами за 7 дней стали HT и QNT</a>
                                    </div>
                                    <p>FTX Group подала заявление о несостоятельности в соответствии с Главой 11 Кодекса США о банкротстве. Сэм Бэнкман-Фрид ушел с поста CEO.</p>
                                    <a href="#" class="news-author">
                                        <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava02.png" alt=""></span>
                                        <span class="news-author-text">Михаил Теткин<span>08.10.2022</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-item-image">
                                    <figure>
                                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img13.png" alt=""></a>
                                    </figure>
                                </div>
                                <div class="post-item-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="post-item-tags">
                                            <a href="#">Биткоин</a>
                                        </div>
                                        <button class="btn-plus"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-plus.svg" alt=""></button>
                                    </div>
                                    <div class="post-item-title">
                                        <a href="#">Лучшими криптоактивами за 7 дней стали HT и QNT</a>
                                    </div>
                                    <p>FTX Group подала заявление о несостоятельности в соответствии с Главой 11 Кодекса США о банкротстве. Сэм Бэнкман-Фрид ушел с поста CEO.</p>
                                    <a href="#" class="news-author">
                                        <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava02.png" alt=""></span>
                                        <span class="news-author-text">Михаил Теткин<span>08.10.2022</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-item-image">
                                    <figure>
                                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img14.png" alt=""></a>
                                    </figure>
                                </div>
                                <div class="post-item-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="post-item-tags">
                                            <a href="#">Биткоин</a>
                                        </div>
                                        <button class="btn-plus"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-plus.svg" alt=""></button>
                                    </div>
                                    <div class="post-item-title">
                                        <a href="#">Лучшими криптоактивами за 7 дней стали HT и QNT</a>
                                    </div>
                                    <p>FTX Group подала заявление о несостоятельности в соответствии с Главой 11 Кодекса США о банкротстве. Сэм Бэнкман-Фрид ушел с поста CEO.</p>
                                    <a href="#" class="news-author">
                                        <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava02.png" alt=""></span>
                                        <span class="news-author-text">Михаил Теткин<span>08.10.2022</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="post-item d-none d-lg-flex">
                                <div class="post-item-image">
                                    <figure>
                                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img15.png" alt=""></a>
                                    </figure>
                                </div>
                                <div class="post-item-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="post-item-tags">
                                            <a href="#">Биткоин</a>
                                        </div>
                                        <button class="btn-plus"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-plus.svg" alt=""></button>
                                    </div>
                                    <div class="post-item-title">
                                        <a href="#">Лучшими криптоактивами за 7 дней стали HT и QNT</a>
                                    </div>
                                    <p>FTX Group подала заявление о несостоятельности в соответствии с Главой 11 Кодекса США о банкротстве. Сэм Бэнкман-Фрид ушел с поста CEO.</p>
                                    <a href="#" class="news-author">
                                        <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava02.png" alt=""></span>
                                        <span class="news-author-text">Михаил Теткин<span>08.10.2022</span></span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-lg-none">
                                <nav class="pagination">
                                    <ul>
                                        <li class="pagination-prev">
                                            <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-pager-prev.svg" alt=""></a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><span>...</span></li>
                                        <li class="pagination-current"><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">6</a></li>
                                        <li><span>...</span></li>
                                        <li class="pagination-next">
                                            <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-pager-next.svg" alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div id="tab3" class="tab-panel ">
                        <div class="stocks-table-wrapper">
                            <div class="inner">
                                <div class="stocks-table">
                                    <div class="scroller-controls">
                                        <div class="scroller-left"></div>
                                        <div class="scroller-right"></div>
                                    </div>
                                    <div class="scroller" tabindex="2" style="overflow: hidden; outline: none; cursor: grab;">
                                        <ul class="table">
                                            <li class="stocks-table-head">
                                                <div class="cell fix">Биржи</div>
                                                <div class="cell">Обзор/сайт</div>
                                                <div class="cell">Рейтинг</div>
                                                <div class="cell">SC</div>
                                                <div class="cell">Способы пополн. депозита</div>
                                                <div class="cell">Комиссия</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                        Binance
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT, GUSD, DAI</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.02 - 0.5 %</div>
                                            </li>
                                            <li class="stocks-table-row">
                                                <div class="cell fix">
                                                    <div class="title">
                                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                        Bittrex
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                                </div>
                                                <div class="cell">
                                                    <div class="stock-rate">
                                                        <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                        <span>4.0</span>
                                                    </div>
                                                </div>
                                                <div class="cell">USDT</div>
                                                <div class="cell">Криптовалюта</div>
                                                <div class="cell">0.036 - 0.4 %</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="clone">
                                        <li class="stocks-table-head">
                                            <div class="cell fix">Биржи</div>
                                            <div class="cell">Обзор/сайт</div>
                                            <div class="cell">Рейтинг</div>
                                            <div class="cell">SC</div>
                                            <div class="cell">Способы пополн. депозита</div>
                                            <div class="cell">Комиссия</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                    </ul><ul class="invisible">
                                        <li class="stocks-table-head">
                                            <div class="cell fix">Биржи</div>
                                            <div class="cell">Обзор/сайт</div>
                                            <div class="cell">Рейтинг</div>
                                            <div class="cell">SC</div>
                                            <div class="cell">Способы пополн. депозита</div>
                                            <div class="cell">Комиссия</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt=""></span>
                                                    Binance
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT, GUSD, DAI</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.02 - 0.5 %</div>
                                        </li>
                                        <li class="stocks-table-row">
                                            <div class="cell fix">
                                                <div class="title">
                                                    <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt=""></span>
                                                    Bittrex
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="links"><a href="#">Обзор</a><a href="#">Веб-сайт</a></div>
                                            </div>
                                            <div class="cell">
                                                <div class="stock-rate">
                                                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-star-gray.svg" alt="">
                                                    <span>4.0</span>
                                                </div>
                                            </div>
                                            <div class="cell">USDT</div>
                                            <div class="cell">Криптовалюта</div>
                                            <div class="cell">0.036 - 0.4 %</div>
                                        </li>
                                    </ul></div>
                            </div>
                        </div>
                    </div>

                    <div class="banner-promo">
                        <picture>
                            <source media="(min-width: 768px)" srcset="assets/img/banner03.png">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/banner-m.png" alt="">
                        </picture>
                    </div>
                </div>

                <div class="column-right">
                    <div class="convertion">
                        <div class="inner">
                            <h2 class="h1">КОНВЕРТИРОВАТЬ</h2>
                            <!-- Crypto Converter ⚡ Widget -->
                            <crypto-converter-widget     live
                                                     background-color="transparent"
                                                     border-radius="0"
                                                         font-size="10"
                                                     fiat="united-states-dollar"
                                                     crypto="<?= $post->post_name ?>" amount="1" decimal-places="2">

                            </crypto-converter-widget>



                            <script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script><!-- /Crypto Converter ⚡ Widget -->
                        </div>
                    </div>

                    <div class="sidebar-banner d-none d-lg-block">
                        <a href="#">
                            <picture>
                                <source media="(min-width: 768px)" srcset="assets/img/banner01.png">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/banner-m.png" alt="">
                            </picture>
                        </a>
                    </div>

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
                            <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img06.png" alt="" /></a>
                        </div>
                        <div class="news-item-text">
                            <a class="news-item-title" href="#">Bloomberg исключил Сэма Бэнкмана-Фрида из списка </a>
                            <a href="#" class="news-author">
                                <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt="" /></span>
                                <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="news-item news-item--image-wide">
                        <div class="news-item-img">
                            <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img07.png" alt="" /></a>
                        </div>
                        <div class="news-item-text">
                            <a class="news-item-title" href="#">Британская криптобиржа Archax привлекла $28,5 млн</a>
                            <a href="#" class="news-author">
                                <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt="" /></span>
                                <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="news-item news-item--image-wide">
                        <div class="news-item-img">
                            <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img08.png" alt="" /></a>
                        </div>
                        <div class="news-item-text">
                            <a class="news-item-title" href="#">Bitget запустила сервис для публикации торговых идей и прог..</a>
                            <a href="#" class="news-author">
                                <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt="" /></span>
                                <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="news-item news-item--image-wide">
                        <div class="news-item-img">
                            <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img09.png" alt="" /></a>
                        </div>
                        <div class="news-item-text">
                            <a class="news-item-title" href="#">Президент Сальвадора назвал FTX противоположностью биткоина</a>
                            <a href="#" class="news-author">
                                <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt="" /></span>
                                <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/cryptocharts"></script>
<script>
    CryptoCharts.priceHistory({
        chart_id: "priceSpark",
        cryptocompare_tickers: ["<?= get_field('symbol') ?>"],
        last_days: 180,
        axes: true,
        loading_indicator: {
            colors: ['red']
        },

    });
</script>


<?php get_footer(); ?>



