<?php
class Brewers_Shortcode {

  public function __construct() {
    $this->register_shortcodes();
  }

  public function get_brewers() {
    $args = array(
      'post_type'     => 'brewers',
      'post_status'   => 'publish',
      'posts_per_page' => -1,
    );

    $wp_query = new WP_Query( $args );
    if ( $wp_query->have_posts() ) { 
      echo '<table class="brewer-table">
              <tr>
                <th>Name</th>
                <th>Brewer ID</th>
                <th>Brewery Type</th>
                <th>Street</th>
                <th>Address 2</th>
                <th>Address 3</th>
                <th>City</th>
                <th>State</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Long</th>
                <th>Lat</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Updated AT</th>
                <th>Created AT</th>
              </tr>';
      while ( $wp_query->have_posts() ) {
        $wp_query->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $bid = get_post_meta( $post_id, '_brewer_id', true );
        $btype = get_post_meta( $post_id, '_brewer_type', true );
        $bstreet = get_post_meta( $post_id, '_brewer_street', true );
        $baddress2 = get_post_meta( $post_id, '_brewer_address_2', true );
        $baddress3 = get_post_meta( $post_id, '_brewer_address_3', true );
        $bcity = get_post_meta( $post_id, '_brewer_city', true );
        $bstate = get_post_meta( $post_id, '_brewer_state', true );
        $bprovince = get_post_meta( $post_id, '_brewer_county_province', true );
        $bpostal = get_post_meta( $post_id, '_brewer_postal_code', true );
        $bcountry = get_post_meta( $post_id, '_brewer_country', true );
        $blong = get_post_meta( $post_id, '_brewer_longitude', true );
        $blat = get_post_meta( $post_id, '_brewer_latitude', true );
        $bphone = get_post_meta( $post_id, '_brewer_phone', true );
        $bwebsite = get_post_meta( $post_id, '_brewer_website_url', true );
        $bupdated = get_post_meta( $post_id, '_brewer_updated_at', true );
        $bcreated = get_post_meta( $post_id, '_brewer_created_at', true );
        echo '<tr>';
          echo '<td>' . $title . '</td>';
          echo '<td>' . $bid . '</td>';
          echo '<td>' . $btype . '</td>';
          echo '<td>' . $bstreet . '</td>';
          echo '<td>' . $baddress2 . '</td>';
          echo '<td>' . $baddress3 . '</td>';
          echo '<td>' . $bcity . '</td>';
          echo '<td>' . $bstate . '</td>';
          echo '<td>' . $bprovince . '</td>';
          echo '<td>' . $bpostal . '</td>';
          echo '<td>' . $bcountry . '</td>';
          echo '<td>' . $blong . '</td>';
          echo '<td>' . $blat . '</td>';
          echo '<td>' . $bphone . '</td>';
          echo '<td>' . $bwebsite . '</td>';
          echo '<td>' . $bupdated . '</td>';
          echo '<td>' . $bcreated . '</td>';
        echo '</tr>';
      }
      echo '</table>';
    }
    else {
      echo '<p>Error: No data Found!</p>';
    }
  }

  public function brewers_output( $atts ) {
    ob_start();
      $this->get_brewers();
    return ob_get_clean();
  }

  public function register_shortcodes() {
    add_shortcode( 'brewers', array( $this, 'brewers_output' ) );
  }

}

$brewers_shortcode = new Brewers_Shortcode();
?>