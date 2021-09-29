<?php
/**
 * Define the metabox and field configurations.
 */
class Brewers_Meta_Boxes {

	public function __construct() {
		$this->register_meta_box();
	}

	public function add_custom_meta_box() {
	    $brewers_screens = [ 'brewers', 'wporg_cpt' ];
	    foreach ( $brewers_screens as $brewers_screen ) {
	        add_meta_box(
	            'wporg_box_id', 
	            'Brewer Fields',
	            array( $this, 'brewers_meta_box_html'), 
	            $brewers_screen 
	        );
	    }
	}

	public function brewers_meta_box_html( $post ) {
	    $brewer_id_value = get_post_meta( $post->ID, '_brewer_id', true );
	    $brewery_type_value = get_post_meta( $post->ID, '_brewer_type', true );
	    $brewery_street_value = get_post_meta( $post->ID, '_brewer_street', true );
	    $address_2_value = get_post_meta( $post->ID, '_brewer_address_2', true );
	    $address_3_value = get_post_meta( $post->ID, '_brewer_address_3', true );
	    $city_value = get_post_meta( $post->ID, '_brewer_city', true );
	    $state_value = get_post_meta( $post->ID, '_brewer_state', true );
	    $county_province_value = get_post_meta( $post->ID, '_brewer_county_province', true );
	    $postal_code_value = get_post_meta( $post->ID, '_brewer_postal_code', true );
	    $country_value = get_post_meta( $post->ID, '_brewer_country', true );
	    $longitude_value = get_post_meta( $post->ID, '_brewer_longitude', true );
	    $latitude_value = get_post_meta( $post->ID, '_brewer_latitude', true );
	    $phone_value = get_post_meta( $post->ID, '_brewer_phone', true );
	    $website_url_value = get_post_meta( $post->ID, '_brewer_website_url', true );
	    $updated_at_value = get_post_meta( $post->ID, '_brewer_updated_at', true );
	    $created_at_value = get_post_meta( $post->ID, '_brewer_created_at', true );
	    ?>
	    <div class="tutis-field-box">
		    <label for="offering_id">Brewer ID</label>
		    <input type="text" name="brewer_id" id="brewer_id" class="postbox" value="<?php echo $brewer_id_value; ?>">
		</div>
	    <div class="tutis-field-box">
		    <label for="brewery_type">Brewery Type</label>
		    <input type="text" name="brewery_type" id="brewery_type" class="postbox" value="<?php echo $brewery_type_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="street">Street</label>
		    <input type="text" name="street" id="street" class="postbox" value="<?php echo $brewery_street_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="address_2">Address 2</label>
		    <input type="text" name="address_2" id="address_2" class="postbox" value="<?php echo $address_2_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="address_3">Address 3</label>
		    <input type="text" name="address_3" id="address_3" class="postbox" value="<?php echo $address_3_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="city">City</label>
		    <input type="text" name="city" id="city" class="postbox" value="<?php echo $city_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="state">State</label>
		    <input type="text" name="state" id="state" class="postbox" value="<?php echo $state_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="county_province">Country Province</label>
		    <input type="text" name="county_province" id="county_province" class="postbox" value="<?php echo $county_province_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="postal_code">Postal Code</label>
		    <input type="text" name="postal_code" id="postal_code" class="postbox" value="<?php echo $postal_code_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="country">Country</label>
		    <input type="text" name="country" id="country" class="postbox" value="<?php echo $country_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="longitude">Longitude</label>
		    <input type="text" name="longitude" id="longitude" class="postbox" value="<?php echo $longitude_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="latitude">Latitude</label>
		    <input type="text" name="latitude" id="latitude" class="postbox" value="<?php echo $latitude_value; ?>">
		</div>
	
		<div class="tutis-field-box">
		    <label for="phone">Phone</label>
		    <input type="text" name="phone" id="phone" class="postbox" value="<?php echo $phone_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="website_url">Website URL</label>
		    <input type="text" name="website_url" id="website_url" class="postbox" value="<?php echo $website_url_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="updated_at">Updated At</label>
		    <input type="text" name="updated_at" id="updated_at" class="postbox" value="<?php echo $updated_at_value; ?>">
		</div>

		<div class="tutis-field-box">
		    <label for="created_at">Created At</label>
		    <input type="text" name="created_at" id="created_at" class="postbox" value="<?php echo $created_at_value; ?>">
		</div>
		
	    <?php
	}
	public function save_meta_box( $post_id ) {

	    if ( array_key_exists( 'brewery_type', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_type',
	            $_POST['brewery_type']
	        );
	    }

	    if ( array_key_exists( 'street', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_street',
	            $_POST['street']
	        );
	    }

	    if ( array_key_exists( 'address_2', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_address_2',
	            $_POST['address_2']
	        );
	    }

	    if ( array_key_exists( 'address_3', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_address_3',
	            $_POST['address_3']
	        );
	    }

	    if ( array_key_exists( 'city', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_city',
	            $_POST['city']
	        );
	    }

	    if ( array_key_exists( 'county_province', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_county_province',
	            $_POST['county_province']
	        );
	    }

	    if ( array_key_exists( 'longitude', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_longitude',
	            $_POST['longitude']
	        );
	    }

	    if ( array_key_exists( 'latitude', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_latitude',
	            $_POST['latitude']
	        );
	    }

	    if ( array_key_exists( 'phone', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_phone',
	            $_POST['phone']
	        );
	    }

	    if ( array_key_exists( 'website_url', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_website_url',
	            $_POST['website_url']
	        );
	    }

	    if ( array_key_exists( 'updated_at', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_updated_at',
	            $_POST['updated_at']
	        );
	    }

	    if ( array_key_exists( 'created_at', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_created_at',
	            $_POST['created_at']
	        );
	    }

	   	if ( array_key_exists( 'state', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_state',
	            $_POST['state']
	        );
	    }

	    if ( array_key_exists( 'postal_code', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_postal_code',
	            $_POST['postal_code']
	        );
	    }

	    if ( array_key_exists( 'country', $_POST ) ) {
	        update_post_meta(
	            $post_id,
	            '_brewer_country',
	            $_POST['country']
	        );
	    }

	}

	public function register_meta_box() {
		add_action( 'save_post', array( $this, 'save_meta_box' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_custom_meta_box' ) );
	}

}

$brewers_meta_box = new Brewers_Meta_Boxes();