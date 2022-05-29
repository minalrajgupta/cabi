<?php
/**
Plugin Name: CABI API
description: Pulls data from CABI API
Version: 1.0
Author: Minal Raj Gupta
Text Domain: cabi-api
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugin activate hook.
 */
register_activation_hook( __FILE__ , 'cabi_api_activate' );
function cabi_api_activate() {
  // Activation code here...
}

/**
 * Plugin deactivate hook.
 */
register_deactivation_hook( __FILE__ , 'cabi_api_deactivate' );
function cabi_api_deactivate() {
  // Deactivation code here...
}

/**
 * Getting data from cabi API.
 * shorcode created.
 */
function cabi_api_get_send_data() {

    //External API.
    $url = 'https://datausa.io/api/data?drilldowns=Nation&measures=Population ';
    $arguments = array(
        'method' => 'GET'
    );

    /**
     * GET method and returns its response.
     *
     * @param string $url URL to retrieve.
     * @param array $arguments Request arguments.
     */
    $response = wp_remote_get( $url, $arguments );
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        return "Something went wrong: $error_message";
    }

    // Getting appropriate php type data from json formate.
    $results = json_decode( wp_remote_retrieve_body( $response ) );
    ?>
    <div class="container">
        <table class="table table-light table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID Nation</th>
              <th scope="col">Nation</th>
              <th scope="col">ID Year</th>
              <th scope="col">Year</th>
              <th scope="col">Population</th>
              <th scope="col">Slug Nation</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ( $results->data as $key => $result ) { ?>
              <tr>
                <th scope="row"><?php echo $key = $key + 1; ?></th>
                <td><?php echo $result->{'ID Nation'} ?></td>
                <td><?php echo $result->{'Nation'} ?></td>
                <td><?php echo $result->{'ID Year'} ?></td>
                <td><?php echo $result->{'Year'} ?></td>
                <td><?php echo $result->{'Population'} ?></td>
                <td><?php echo $result->{'Slug Nation'} ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
    <?php
}
add_shortcode('cabi_api','cabi_api_get_send_data');
