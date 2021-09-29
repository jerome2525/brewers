<?php

class Brewers_Form_Ajax {

    public function __construct() {
        $this->load_hooks();
    }

    public function load_hooks() {
        add_action( 'wp_ajax_adminwsfilter', array( $this, 'display_result' ) ); 
        add_action( 'wp_ajax_nopriv_adminwsfilter', array( $this, 'display_result' ) );
    }

    public function check_existing_brewers( $id ) {
        if( $id ) {
            $args = array(
                'post_type'     => 'brewers',
                'post_status'   => 'publish',
                'posts_per_page' => -1,
                'meta_key'     => '_brewer_id',
                'meta_value'   => $id, 
                'meta_compare' => '=',
            );

            $wp_query = new WP_Query( $args );
            if ( $wp_query->have_posts() ) { 
                while ( $wp_query->have_posts() ) {
                    $wp_query->the_post();
                    return get_the_ID();
                }
            }
        }
    }

    public function update_brewers( $id, $name, $type, $address_2, $address_3, $city, $state, $county_province, $postal_code, $country, $longitude, $latitude, $phone, $website_url, $updated_at, $created_at, $street, $post_id ) {
        if( $id && $name && $post_id ) {
            $brewers_args = array(
                'ID'           =>  $post_id,
                'post_title'    => $name,
                'post_content'  => 'brewers test content',
                'post_status'   => 'publish',
                'post_type'   => 'brewers',
            );
             
            // Insert the post into the database.
            $post_id = wp_update_post( $brewers_args );
            if( !is_wp_error( $post_id ) ) {            
                update_post_meta( $post_id, '_brewer_id', $id );
                update_post_meta( $post_id, '_brewer_type', $type );
                update_post_meta( $post_id, '_brewer_street', $street );
                update_post_meta( $post_id, '_brewer_address_2', $address_2 );
                update_post_meta( $post_id, '_brewer_address_3', $address_3 );
                update_post_meta( $post_id, '_brewer_city', $city );
                update_post_meta( $post_id, '_brewer_state', $state );
                update_post_meta( $post_id, '_brewer_county_province', $county_province );
                update_post_meta( $post_id, '_brewer_postal_code', $postal_code );
                update_post_meta( $post_id, '_brewer_country', $country );
                update_post_meta( $post_id, '_brewer_longitude', $longitude );
                update_post_meta( $post_id, '_brewer_latitude', $latitude );
                update_post_meta( $post_id, '_brewer_phone', $phone );
                update_post_meta( $post_id, '_brewer_website_url', $website_url );
                update_post_meta( $post_id, '_brewer_updated_at', $updated_at );
                update_post_meta( $post_id, '_brewer_created_at', $created_at );
            }
            else {
                //there was an error in the post insertion, 
                echo $post_id->get_error_message();
            }
        }
    }

    public function insert_brewers( $id, $name, $type, $address_2, $address_3, $city, $state, $county_province, $postal_code, $country, $longitude, $latitude, $phone, $website_url, $updated_at, $created_at, $street ) {
        if( $id && $name ) {
            $brewers_args = array(
                'post_title'    => $name,
                'post_content'  => 'brewers test content',
                'post_status'   => 'publish',
                'post_type'   => 'brewers',
            );
             
            // Insert the post into the database.
            $post_id = wp_insert_post( $brewers_args );
            if( !is_wp_error( $post_id ) ) {            
                add_post_meta( $post_id, '_brewer_id', $id, true );
                add_post_meta( $post_id, '_brewer_type', $type, true );
                add_post_meta( $post_id, '_brewer_street', $street, true );
                add_post_meta( $post_id, '_brewer_address_2', $address_2, true );
                add_post_meta( $post_id, '_brewer_address_3', $address_3, true );
                add_post_meta( $post_id, '_brewer_city', $city, true );
                add_post_meta( $post_id, '_brewer_state', $state, true );
                add_post_meta( $post_id, '_brewer_county_province', $county_province, true );
                add_post_meta( $post_id, '_brewer_postal_code', $postal_code, true );
                add_post_meta( $post_id, '_brewer_country', $country, true );
                add_post_meta( $post_id, '_brewer_longitude', $longitude, true );
                add_post_meta( $post_id, '_brewer_latitude', $latitude, true );
                add_post_meta( $post_id, '_brewer_phone', $phone, true );
                add_post_meta( $post_id, '_brewer_website_url', $website_url, true );
                add_post_meta( $post_id, '_brewer_updated_at', $updated_at, true );
                add_post_meta( $post_id, '_brewer_created_at', $created_at, true );
            }
            else {
                //there was an error in the post insertion, 
                echo $post_id->get_error_message();
            }
        }
    }

    public function display_body( $part ) {
        $api_url = get_option('brewers_api_url');
        if( $api_url && $part ) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url . '?per_page=50&page='. $part );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

            $headers = array();
            $headers[] = 'Accept: application/json';
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
        
            if ( curl_errno( $ch ) ) {
                echo 'Error:' . curl_error( $ch );
            }
            else {
                $result = curl_exec( $ch );
                $obj = json_decode( $result, true );
                //echo '<pre>' . var_dump($obj) .'</pre>';
                if( $obj ) {
                    foreach( $obj as $key => $entry ) { 
                        $id = $entry['id'];
                        $name = $entry['name'];
                        $type = $entry['brewery_type'];
                        $address_2 = $entry['address_2'];
                        $address_3 = $entry['address_3'];
                        $city = $entry['city'];
                        $state = $entry['state'];
                        $county_province = $entry['county_province'];
                        $postal_code = $entry['postal_code'];
                        $country = $entry['country'];
                        $longitude = $entry['longitude'];
                        $latitude = $entry['latitude'];
                        $phone = $entry['phone'];
                        $website_url = $entry['website_url'];
                        $updated_at = $entry['updated_at'];
                        $created_at = $entry['created_at'];
                        $street = $entry['street'];
                        //echo '<p>'. $name .'</p>';
                        if( $this->check_existing_brewers( $id ) ) {

                            $this->update_brewers( $id, $name, $type, $address_2, $address_3, $city, $state, $county_province, $postal_code, $country, $longitude, $latitude, $phone, $website_url, $updated_at, $created_at, $street, $this->check_existing_brewers( $id ) );
                        }
                        else {
                            $this->insert_brewers( $id, $name, $type, $address_2, $address_3, $city, $state, $county_province, $postal_code, $country, $longitude, $latitude, $phone, $website_url, $updated_at, $created_at, $street );
                        }
                    }
                }
            }
            
            curl_close($ch);
        }
    }

    public function display_result() {
        if( isset( $_POST['sync_input'] ) ) {
            $this->display_body(1);
            $this->display_body(2);
        }
        die();
    }

}


$brewers_form_ajax = new Brewers_Form_Ajax();