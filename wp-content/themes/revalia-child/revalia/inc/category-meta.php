<?php
function revalia_category_edit_settings( $term, $taxonomy ) {
  $revalia_category_sidebar_onoff  = get_term_meta( $term->term_id, 'revalia_category_sidebar_onoff', true );
  $revalia_category_style  = get_term_meta( $term->term_id, 'revalia_category_style', true );
  $revalia_category_header_image  = get_term_meta( $term->term_id, 'revalia_category_header_image', true );
  $revalia_category_header  = get_term_meta( $term->term_id, 'revalia_category_header', true );
  $revalia_category_text_color  = get_term_meta( $term->term_id, 'revalia_category_text_color', true );
  $revalia_category_bg_color  = get_term_meta( $term->term_id, 'revalia_category_bg_color', true );
  $revalia_category_custom_banner  = get_term_meta( $term->term_id, 'revalia_category_custom_banner', true );
  $revalia_category_custom_banner_link  = get_term_meta( $term->term_id, 'revalia_category_custom_banner_link', true );
  ?>
   <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Sidebar On or Off Style', 'revalia' ); ?></label></th>
    <td>
      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/category-sidebar-1.jpg" alt="">
        <p><input type="radio" name="revalia_category_sidebar_onoff" id="revalia_category_sidebar_onoff-1" value="style1"  class="radio" <?php if($revalia_category_sidebar_onoff === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_sidebar_onoff-1">Sidebar On</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/category-sidebar-2.jpg" alt="">
        <p><input type="radio" name="revalia_category_sidebar_onoff" id="revalia_category_sidebar_onoff-2" value="style2" class="radio" <?php if($revalia_category_sidebar_onoff === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_sidebar_onoff-2">Sidebar Off</label></p>
      </div>
    </td>
  </tr>
  <!--Category Sidebar On Off End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Header Style', 'revalia' ); ?></label></th>
    <td>
      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/header-category-1.jpg" alt="">
        <p><input type="radio" name="revalia_category_header" id="revalia_category_header-1" value="style1"  class="radio" <?php if($revalia_category_header === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_header-1">Style - 1</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/header-category-2.jpg" alt="">
        <p><input type="radio" name="revalia_category_header" id="revalia_category_header-2" value="style2" class="radio" <?php if($revalia_category_header === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_header-2">Style - 2</label></p>
      </div>
    </td>
  </tr>
  <!--Category Header Style End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Header Style 1 Background Image', 'revalia' ); ?></label></th>
    <td>
      <div class="headerimage">
        <input name="revalia_category_header_image" id="revalia_category_header_image" type="text" value="<?php echo get_term_meta($term->term_id, 'revalia_category_header_image', true); ?>" size="40" aria-required="true" />
      </div>

    </td>
  </tr>
  <!--Category Header Image End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Page Header Category Background Color', 'revalia' ); ?></label></th>
    <td>
      <div id="colorpicker">
          <input type="text" name="revalia_category_bg_color" id="revalia_category_bg_color" class="colorpicker" value="<?php echo get_term_meta($term->term_id, 'revalia_category_bg_color', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'Select the category background color.', 'revalia' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category BG Color-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Page Header Category Text Color', 'revalia' ); ?></label></th>
    <td>
      <div id="colorpicker">
          <input type="text" name="revalia_category_text_color" id="revalia_category_text_color" class="colorpicker" value="<?php echo get_term_meta($term->term_id, 'revalia_category_text_color', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'Select the category text color.', 'revalia' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Text Color-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Category Ads URL', 'revalia' ); ?></label></th>
    <td>
      <div id="customads">
      <input type="text" name="revalia_category_custom_banner_link" id="revalia_category_custom_banner_link" value="<?php echo get_term_meta($term->term_id, 'revalia_category_custom_banner_link', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'You can ads banner for link', 'revalia' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Custom Banner Link-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Category Ads', 'revalia' ); ?></label></th>
    <td>
      <div id="customads">
      <input type="text" name="revalia_category_custom_banner" id="revalia_category_custom_banner" value="<?php echo get_term_meta($term->term_id, 'revalia_category_custom_banner', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'You can upload ads banner', 'revalia' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Custom Banner-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Post Style', 'revalia' ); ?></label></th>
    <td>

      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/post-style-1.jpg" alt="">
        <p><input type="radio" name="revalia_category_style" id="revalia_category_style-1" value="style1"  class="radio" <?php if($revalia_category_style === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_style-1">Style - 1</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/post-style-2.jpg" alt="">
        <p><input type="radio" name="revalia_category_style" id="revalia_category_style-2" value="style2" class="radio" <?php if($revalia_category_style === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_style-2">Style - 2</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/post-style-3.jpg" alt="">
        <p><input type="radio" name="revalia_category_style" id="revalia_category_style-3" value="style3" class="radio" <?php if($revalia_category_style === 'style3'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_style-3">Style - 3</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo REVALIA_URL; ?>/assets/images/admin-img/post-style-4.jpg" alt="">
        <p><input type="radio" name="revalia_category_style" id="revalia_category_style-4" value="style4" class="radio" <?php if($revalia_category_style === 'style4'){ echo 'checked="checked"'; } ?>>
        <label for="revalia_category_style-4">Style - 4</label></p>
      </div>

    </td>
  </tr>
  <!--Category Post Style End-->
  <?php
}
add_action( 'category_edit_form_fields', 'revalia_category_edit_settings', 10,2 );

/**
 * Category Custom Save
 */
function revalia_category_settings_save( $term_id, $tt_id, $taxonomy ) {
  if ( isset( $_POST['revalia_category_sidebar_onoff'] ) ) {
    update_term_meta( $term_id, 'revalia_category_sidebar_onoff', $_POST['revalia_category_sidebar_onoff'] );
  }
  if ( isset( $_POST['revalia_category_style'] ) ) {
    update_term_meta( $term_id, 'revalia_category_style', $_POST['revalia_category_style'] );
  }
  if ( isset( $_POST['revalia_category_header'] ) ) {
    update_term_meta( $term_id, 'revalia_category_header', $_POST['revalia_category_header'] );
  }
  if ( isset( $_POST['revalia_category_header_image'] ) ) {
    update_term_meta( $term_id, 'revalia_category_header_image', $_POST['revalia_category_header_image'] );
  }
  if ( isset( $_POST['revalia_category_text_color'] ) ) {
    update_term_meta( $term_id, 'revalia_category_text_color', $_POST['revalia_category_text_color'] );
  }
  if ( isset( $_POST['revalia_category_bg_color'] ) ) {
    update_term_meta( $term_id, 'revalia_category_bg_color', $_POST['revalia_category_bg_color'] );
  }
  if ( isset( $_POST['revalia_category_custom_banner'] ) ) {
    update_term_meta( $term_id, 'revalia_category_custom_banner', $_POST['revalia_category_custom_banner'] );
  }
  if ( isset( $_POST['revalia_category_custom_banner_link'] ) ) {
    update_term_meta( $term_id, 'revalia_category_custom_banner_link', $_POST['revalia_category_custom_banner_link'] );
  }
}
add_action( 'edit_term', 'revalia_category_settings_save', 10,3 );


/*------------- CATEGORY COLOR START -------------*/

  /** Add New Field To Category **/
  function revalia_extra_category_fields_background_color( $tag ) {
      $t_id = $tag->term_id;
      $cat_meta = get_option( "category_$t_id" );
      $cat_text = get_option( "category_$t_id" );
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Label Category Background Color', 'revalia' ); ?></label></th>
        <td>
        <div id="colorpicker">
            <input type="text" name="cat_meta[catBG]" class="colorpicker" size="3" style="min-width:75px; width:20%; text-align:left;" value="<?php echo (isset($cat_meta['catBG'])) ? $cat_meta['catBG'] : '#5679BB'; ?>" />
        </div>
            <br />
        <span class="description"><?php echo esc_html__( 'Select the custom color.', 'revalia' ); ?></span>
            <br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Label Category Text Color', 'revalia' ); ?></label></th>
        <td>
        <div id="colorpicker">
            <input type="text" name="cat_text[catText]" class="colorpicker" size="3" style="min-width:75px; width:20%; text-align:left;" value="<?php echo (isset($cat_text['catText'])) ? $cat_text['catText'] : '#FFF'; ?>" />
        </div>
            <br />
        <span class="description"><?php echo esc_html__( 'Select the custom color.', 'revalia' ); ?></span>
            <br />
        </td>
    </tr>
    <?php
  }
  add_action('category_edit_form_fields','revalia_extra_category_fields_background_color');

  function revalia_save_extra_category_fileds( $term_id ) {

      if ( isset( $_POST['cat_meta'] ) ) {
          $t_id = $term_id;
          $cat_meta = get_option( "category_$t_id");
          $cat_keys = array_keys($_POST['cat_meta']);
              foreach ($cat_keys as $key){
              if (isset($_POST['cat_meta'][$key])){
                  $cat_meta[$key] = $_POST['cat_meta'][$key];
              }
          }
          //save the option array
          update_option( "category_$t_id", $cat_meta );
      }
      if ( isset( $_POST['cat_text'] ) ) {
          $t_id = $term_id;
          $cat_text = get_option( "category_$t_id");
          $cat_keys = array_keys($_POST['cat_text']);
              foreach ($cat_keys as $key){
              if (isset($_POST['cat_text'][$key])){
                  $cat_text[$key] = $_POST['cat_text'][$key];
              }
          }
          //save the option array
          update_option( "category_$t_id", $cat_text );
      }
  }
  add_action ('edited_category', 'revalia_save_extra_category_fileds');
  add_action('created_category', 'revalia_save_extra_category_fileds', 11, 1);


  /*------------- CATEGORY COLOR END -------------*/
