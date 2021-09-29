<?php
class Brewers_Settings {

    public function __construct() {
        $this->register_settings();
    }

    public function register_settings() {
        add_action('admin_menu', array( $this, 'create_menu') );
    }

    public function create_menu() {

        //create new top-level menu
        add_menu_page('Brewers Settings', 'Brewers Settings', 'administrator', 'brewers-settings', array( $this, 'settings_page' ) );

        //call register settings function
        add_action( 'admin_init', array( $this, 'plugin_settings' ) );
    }

    public function plugin_settings() {
        //register our settings
        register_setting( 'brewers-settings-group', 'brewers_api_url' );
    }

    public function sync_form() {
        echo '<form class="sync-form" id="sync-form1" method="POST" action="'. admin_url( "admin-ajax.php" ) . '">
            <input type="hidden" name="action" value="adminwsfilter"> 
            <input type="hidden" name="sync_input" value="1">  
        </form>';
    }

    public function settings_page() {
        $this->sync_form();
    ?>
        <div class="wrap">
            <?php
            if ( isset( $_GET['settings-updated'] ) ) {
                echo "<div class='updated'><p>Settings updated!.</p></div>";
            } 
            if ( isset( $_GET['reload'] ) ) {
                echo "<div class='updated'><p>Reload Successfuly done!</p></div>";
            } 
            ?>
            <div class="loader"></div>
            <div id="adminresult1" class="adminresult"></div> 
            <h3>Brewers API Settings (Set to 100 brewers per reload)</h3>
            <form method="post" action="options.php" id="option-form1">
                <?php settings_fields( 'brewers-settings-group' ); ?>
                <?php do_settings_sections( 'tutis-settings-group' ); ?>
                <table class="form-table" summary="API Settings">
                    <tr valign="top">
                    <th scope="row">API URL</th>
                    <td><input type="url" name="brewers_api_url" value="<?php echo esc_attr( get_option('brewers_api_url') ); ?>" required/></td>
                    </tr>
                </table>  
                <p class="submit"><input type="submit" name="submit" id="submit5" class="button button-primary" value="Save Changes" style="margin-right: 10px;"><input type="submit" name="submit" id="submit" class="button button-sync button-primary"  value="Reload" form="sync-form1" id="reload1"></p>
            </form>
        </div>
    <?php 
    } 
}

if( is_admin() ) {
    $brewers_settings = new Brewers_Settings();
}
?>