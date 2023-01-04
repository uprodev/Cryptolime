<?php
/*
Template Name: Exchange
*/


get_header(); ?>


<div class="container">

    <?php get_template_part('parts/breadcrumbs') ?>


    <div class="stocks-all">
        <div class="page-layout-2col">
            <div class="column-left">
                <div class="stock-filter">
                    <div class="inner">
                        <form action="#" class="stock-filter-form">
                            <div class="wrapper">
                                <div class="field">
                                    <label for="s1">Вид площадки</label>
                                    <select class="select" id="s1">
                                        <option value="default">Все</option>
                                        <option value="1">Вид площадки</option>
                                        <option value="2">Вид площадки</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="s2">Вид площадки</label>
                                    <select class="select" id="s2">
                                        <option value="default">Все</option>
                                        <option value="1">Вид площадки</option>
                                        <option value="2">Вид площадки</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="s3">Вид площадки</label>
                                    <select class="select" id="s3">
                                        <option value="default">Все</option>
                                        <option value="1">Вид площадки</option>
                                        <option value="2">Вид площадки</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="s4">Вид площадки</label>
                                    <select class="select" id="s4">
                                        <option value="default">Все</option>
                                        <option value="1">Вид площадки</option>
                                        <option value="2">Вид площадки</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="s5">Вид площадки</label>
                                    <select class="select" id="s5">
                                        <option value="default">Все</option>
                                        <option value="1">Вид площадки</option>
                                        <option value="2">Вид площадки</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="s6">Вид площадки</label>
                                    <select class="select" id="s6">
                                        <option value="default">Все</option>
                                        <option value="1">Вид площадки</option>
                                        <option value="2">Вид площадки</option>
                                    </select>
                                </div>
                            </div>
                            <div class="stock-filter-options d-flex align-items-center justify-content-between justify-content-lg-end">
                                <button type="reset">Очистить фильтры</button>
                                <button type="submit" class="btn btn-lime">Применить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="column-right">
                <div class="stock-card">
                    <div class="inner">
                        <div class="stock-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h2 class="h1">О БИРЖЕ</h2>
                                            <a href="#" class="see-all">Больше о бирже</a>
                                        </div>
                                        <div class="stock-card-title">
                                            <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                            Binance
                                        </div>
                                        <p>Binance одна из самых крупных, высоколиквидных, безопасных и надежных бирж на сегодняшний день.история ее начинается не так давно, а именно в 2017 году, это не мешает бирже быть самой востребованной на рынке.</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h2 class="h1">О БИРЖЕ</h2>
                                            <a href="#" class="see-all">Больше о бирже</a>
                                        </div>
                                        <div class="stock-card-title">
                                            <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                            Binance
                                        </div>
                                        <p>Binance одна из самых крупных, высоколиквидных, безопасных и надежных бирж на сегодняшний день.история ее начинается не так давно, а именно в 2017 году, это не мешает бирже быть самой востребованной на рынке.</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h2 class="h1">О БИРЖЕ</h2>
                                            <a href="#" class="see-all">Больше о бирже</a>
                                        </div>
                                        <div class="stock-card-title">
                                            <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                            Binance
                                        </div>
                                        <p>Binance одна из самых крупных, высоколиквидных, безопасных и надежных бирж на сегодняшний день.история ее начинается не так давно, а именно в 2017 году, это не мешает бирже быть самой востребованной на рынке.</p>
                                    </div>
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
                    </div>
                    class="cell fix"
                </div>
            </div>
        </div>

        <div class="stocks-table-wrapper">
            <div class="inner">
                <div class="stocks-table">
                    <div class="scroller-controls">
                        <div class="scroller-left"></div>
                        <div class="scroller-right"></div>
                    </div>
                    <div class="scroller">
                        <ul class="table">
                            <li class="stocks-table-head">
                                <div class="cell fix">Биржи</div>
                                <div class="cell">Регион</div>
                                <div class="cell">Год запуска</div>
                                <div class="cell">Вид плошадки</div>
                                <div class="cell">К-во&nbsp;торг. пар&nbsp;/&nbsp;валют</div>
                                <div class="cell">Кол-во монет</div>
                                <div class="cell">Ком. торговли%</div>
                                <div class="cell">Моб приложение</div>
                                <div class="cell">Маржинал. торговля</div>
                                <div class="cell">Вн токен биржи,тикер</div>
                                <div class="cell">Мотив. трейдеров</div>
                                <div class="cell">KYC</div>
                                <div class="cell">SC</div>
                                <div class="cell">Способы пополн. депозита</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt="" /></span>
                                        Bittrex
                                    </div>
                                </div>
                                <div class="cell">США</div>
                                <div class="cell">2014</div>
                                <div class="cell">CEX</div>
                                <div class="cell">260/130</div>
                                <div class="cell">240</div>
                                <div class="cell">0.45%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt="" /></span>
                                        Bittrex
                                    </div>
                                </div>
                                <div class="cell">США</div>
                                <div class="cell">2014</div>
                                <div class="cell">CEX</div>
                                <div class="cell">260/130</div>
                                <div class="cell">240</div>
                                <div class="cell">0.45%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt="" /></span>
                                        Bittrex
                                    </div>
                                </div>
                                <div class="cell">США</div>
                                <div class="cell">2014</div>
                                <div class="cell">CEX</div>
                                <div class="cell">260/130</div>
                                <div class="cell">240</div>
                                <div class="cell">0.45%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt="" /></span>
                                        Bittrex
                                    </div>
                                </div>
                                <div class="cell">США</div>
                                <div class="cell">2014</div>
                                <div class="cell">CEX</div>
                                <div class="cell">260/130</div>
                                <div class="cell">240</div>
                                <div class="cell">0.45%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt="" /></span>
                                        Bittrex
                                    </div>
                                </div>
                                <div class="cell">США</div>
                                <div class="cell">2014</div>
                                <div class="cell">CEX</div>
                                <div class="cell">260/130</div>
                                <div class="cell">240</div>
                                <div class="cell">0.45%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-bittrex.svg" alt="" /></span>
                                        Bittrex
                                    </div>
                                </div>
                                <div class="cell">США</div>
                                <div class="cell">2014</div>
                                <div class="cell">CEX</div>
                                <div class="cell">260/130</div>
                                <div class="cell">240</div>
                                <div class="cell">0.45%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                            <li class="stocks-table-row">
                                <div class="cell fix">
                                    <div class="title">
                                        <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-binance.svg" alt="" /></span>
                                        Binance
                                    </div>
                                </div>
                                <div class="cell">Китай</div>
                                <div class="cell">2017</div>
                                <div class="cell">CEX</div>
                                <div class="cell">315/75</div>
                                <div class="cell">120</div>
                                <div class="cell">0.1%-0.2%</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-check-green.svg" alt="" /></div>
                                <div class="cell">BIX</div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-cross.svg" alt="" /></div>
                                <div class="cell">USDT, GUSD, DAI</div>
                                <div class="cell">Криптовалюта</div>
                            </li>
                        </ul>
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
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img06.png" alt=""></a>
                    </div>
                    <div class="news-item-text">
                        <a class="news-item-title" href="#">Bloomberg исключил Сэма Бэнкмана-Фрида из списка </a>
                        <a href="#" class="news-author">
                            <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt=""></span>
                            <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="news-item news-item--image-wide">
                    <div class="news-item-img">
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img07.png" alt=""></a>
                    </div>
                    <div class="news-item-text">
                        <a class="news-item-title" href="#">Британская криптобиржа Archax привлекла $28,5 млн</a>
                        <a href="#" class="news-author">
                            <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt=""></span>
                            <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="news-item news-item--image-wide">
                    <div class="news-item-img">
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img08.png" alt=""></a>
                    </div>
                    <div class="news-item-text">
                        <a class="news-item-title" href="#">Bitget запустила сервис для публикации торговых идей и прог..</a>
                        <a href="#" class="news-author">
                            <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt=""></span>
                            <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="news-item news-item--image-wide">
                    <div class="news-item-img">
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/img/img09.png" alt=""></a>
                    </div>
                    <div class="news-item-text">
                        <a class="news-item-title" href="#">Президент Сальвадора назвал FTX противоположностью биткоина</a>
                        <a href="#" class="news-author">
                            <span class="news-author-icon"><img src="<?= get_template_directory_uri() ?>/assets/img/ava03.png" alt=""></span>
                            <span class="news-author-text">Александр Савельев<span>08.10.2022</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php get_footer(); ?>



