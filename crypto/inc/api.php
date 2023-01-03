<?php


class Api
{

    public $headers;



    public function __construct()
    {

        $this->headers  = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: a84a7678-2227-483f-827b-0d1bb1069611'
        ];

    }


    public function init() {

        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '50',
            'convert' => 'USD'
        ];
        $headers = $this->headers;



        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response


      //  print_r(    ($response));

        echo '<pre>';
        print_r(json_decode($response)); // print json decoded response
        curl_close($curl); // Close request
    }


    /**
     * ticker
     */

    public function ticker() {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '30',
            'convert' => 'USD'
        ];


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $this->headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response);

        foreach ($data->data as $cur) {
            $ids[] = $cur->id;
        }
        $ids = implode(',', $ids);
        $logos = $this->logo($ids);

        foreach ($data->data as $cur) {

            ?>

            <div class="item">
                <div class="item-content-mobile">
                    <div class="col">
                        <div class="coin">
                            <span class="coin-icon"><img src="<?= $logos[$cur->id] ?>" alt="" /></span>
                            <span class="coin-title"><?= $cur->symbol ?></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="coin-price">$<?= number_format($cur->quote->USD->price , 2, '.', ''); ?></div>
                        <div class="coin-dynamics">


                            <?php if ($cur->quote->USD->percent_change_24h > 0) { ?>
                                <span class="coin-dynamics-arrow"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-arrow-up.svg" alt="" /></span>
                                <span class="coin-dynamics-graph"><img src="<?php bloginfo('template_directory'); ?>/assets/img/graph-up.png" alt="" /></span>
                            <?php } else { ?>
                                <span class="coin-dynamics-arrow"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-arrow-down.svg" alt="" /></span>
                                <span class="coin-dynamics-graph"><img src="<?php bloginfo('template_directory'); ?>/assets/img/graph-down.png" alt="" /></span>
                            <?php } ?>



                        </div>
                    </div>
                </div>
                <div class="item-content-desktop">
                    <div class="col">
                        <div class="coin">
                            <span class="coin-icon"><img width="32" src="<?= $logos[$cur->id] ?>" alt="" /></span>
                            <span class="coin-title"><?= $cur->symbol ?></span>

                            <?php if ($cur->quote->USD->percent_change_24h > 0) { ?>
                                <span class="coin-dynamics-arrow"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-arrow-up.svg" alt="" /></span>
                            <?php } else { ?>
                                <span class="coin-dynamics-arrow"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-arrow-down.svg" alt="" /></span>
                            <?php } ?>
                        </div>
                        <div class="coin-price">$<?= number_format($cur->quote->USD->price , 2, '.', ''); ?></div>
                    </div>
                    <div class="col">
                        <?php if ($cur->quote->USD->percent_change_24h > 0) { ?>
                            <span class="coin-dynamics-graph"><img src="<?php bloginfo('template_directory'); ?>/assets/img/graph-up.png" alt="" /></span>
                        <?php } else { ?>
                            <span class="coin-dynamics-graph"><img src="<?php bloginfo('template_directory'); ?>/assets/img/graph-down.png" alt="" /></span>
                        <?php } ?>



                    </div>
                </div>
            </div>



            <?php
        }
    }


    /**
     * logo
     */
    public function logo($ids) {


        if (get_transient('logos'))
            return get_transient('logos');

        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info';
        $parameters = [
            'id' => $ids,
        ];
        $headers = $this->headers;


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response


        $data = json_decode($response); // print json decoded response

        foreach ($data->data as $cur) {
            $logos[$cur->id] = $cur->logo;
        }


        set_transient('logos', $logos);

        curl_close($curl); // Close request

        return $logos;
    }


    /**
     * import
     */

    public function import() {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '200',
            'convert' => 'USD'
        ];


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $this->headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response);

        print_r($data);

        foreach ($data->data as $cur) {
            $ids[] = $cur->id;
        }
        $ids = implode(',', $ids);

        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info';
        $parameters = [
            'id' => $ids,
        ];
        $headers = $this->headers;


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response


        $data_meta = json_decode($response); // print json decoded response

        foreach ($data_meta->data as $cur) {
            $logos[$cur->id] = $cur->logo;
            $metas[$cur->id] = $cur;
        }



        foreach ($data->data as $cur) {
            $q = new WP_Query([
                'post_type' => 'coin',
                'meta_key' => 'id',
                'meta_value' => $cur->id
            ]);

            if ($q->found_posts > 0)
                continue;

            $post_id = wp_insert_post([
                'post_title' => $cur->name,
                'post_status' => 'publish',
                'post_type' => 'coin',
                'meta_input'    => [
                    'id'=>$cur->id,
                    'symbol' => $cur->symbol
                ],
            ]);

            update_field('logo', $logos[$cur->id], $post_id);
            update_field('meta', $metas[$cur->id], $post_id);
        }
    }


    /**
     * get_currency_data
     */

    public function get_currency_data($curr='GALA') {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
        $parameters = [

            'convert' => 'USD',
            'symbol' => $curr
        ];


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $this->headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response);

        return  $data;


    }


    /**
     * get_prices
     */

    public function get_prices($curr='BTC') {
        $url = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/price-performance-stats/latest';
        $parameters = [
            'time_period' => '7d',
            'convert' => 'USD',
            'symbol' => $curr
        ];


        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $this->headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response);

        return  $data;

    }



}


add_action('init', function(){

    if ($_GET['import']) {
        $api = new Api();
        $api->import();
    }

    if ($_GET['test']) {
        $api = new Api();

        echo '<pre>';

        print_r($api->get_prices());

        die();
    }


});