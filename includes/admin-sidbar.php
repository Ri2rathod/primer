<h1>WordPress Extra Post Info</h1>
<form method="post" action="options.php">
    <?php settings_fields('social_url'); ?>
    <?php do_settings_sections('social_url'); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">faceBook Link</th>
            <td>
                <input type="text" name="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">Twitter Link</th>
            <td>
                <input type="text" name="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">Instagram Link</th>
            <td>
                <input type="text" name="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
            </td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>