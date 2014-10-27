<?php
add_action('admin_init', 'netcraft_extra_fields', 1);
function netcraft_extra_fields() {
  add_meta_box('extra_services_other', 'Other', 'netcraft_extra_services_other_box', 'services', 'normal', 'high');
  add_meta_box('extra_portfolio_other', 'Other', 'netcraft_extra_portfolio_other_box', 'portfolio', 'normal', 'low');
}

// Services Other
function netcraft_extra_services_other_box($post) {
  wp_nonce_field( plugin_basename(__FILE__), 'extra_fields_nonce' );
  ?>
  <table class="form-table">
    <tr valign="top">
      <th scope="row">H1 Title</th>
      <td>
        <input name="extra[alttitle]" type="text" id="extra[alttitle]" value="<?php echo esc_attr(get_post_meta($post->ID, 'alttitle', true)); ?>" class="regular-text" />
        <p class="description">If this field empty, default page title will be used</p>
      </td>
    </tr>
  </table>
  <?php
}

// Portfolio Other
function netcraft_extra_portfolio_other_box($post) {
  wp_nonce_field( plugin_basename(__FILE__), 'extra_fields_nonce' );
  ?>
  <table class="form-table">
    <tr valign="top">
      <th scope="row">Company Info</th>
      <td>
        <input name="extra[info]" type="text" id="extra[info]" value="<?php echo esc_attr(get_post_meta($post->ID, 'info', true)); ?>" class="regular-text" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">Link</th>
      <td>
        <input name="extra[link]" type="text" id="extra[link]" value="<?php echo esc_attr(get_post_meta($post->ID, 'link', true)); ?>" class="regular-text" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">Logo</th>
      <td>
        <input name="extra[logo]" type="text" id="extra[logo]" value="<?php echo esc_attr(get_post_meta($post->ID, 'logo', true)); ?>" class="large-text" />
        <p class="description">URL to logo</p>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">Screenshot</th>
      <td>
        <input name="extra[screen]" type="text" id="extra[screen]" value="<?php echo esc_attr(get_post_meta($post->ID, 'screen', true)); ?>" class="large-text" />
        <p class="description">URL to screenshot, <code>width: 520px</code></p>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">Images for slider</th>
      <td>
        <textarea name="extra[slider]" id="extra[slider]" rows="8" class="large-text"><?php echo esc_attr(get_post_meta($post->ID, 'slider', true)); ?></textarea>
        <p class="description">One URL per line, <code>1235px*760px</code></p>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">Large Logo</th>
      <td>
        <input name="extra[largelogo]" type="text" id="extra[largelogo]" value="<?php echo esc_attr(get_post_meta($post->ID, 'largelogo', true)); ?>" class="large-text" />
        <p class="description">URL to logo, <code>max-width: 450px</code></p>
      </td>
    </tr>
  </table>
  <?php
}

add_action('save_post', 'ideus_extra_fields_update');
function ideus_extra_fields_update($post_id) {
  if (!$_POST || !isset($_POST['extra_fields_nonce']) || !wp_verify_nonce($_POST['extra_fields_nonce'], plugin_basename(__FILE__))) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  if (!current_user_can('edit_post', $post_id)) return $post_id;
  if (!isset($_POST['extra'])) return $post_id;

  $_POST['extra'] = array_map('trim', $_POST['extra']);
  foreach($_POST['extra'] as $key=>$value) {
    if(empty($value)) continue delete_post_meta($post_id, $key);
    update_post_meta($post_id, $key, $value);
  }
  return $post_id;
}
?>