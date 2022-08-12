<?php
/**
 * Lang switcher for Polylang
 */
?>

<?php if ( function_exists( 'pll_the_languages' ) ) : ?>

  <?php
  $nc_langSwitch = pll_the_languages( array(
    'hide_if_empty' => false,
    'hide_current'  => false,
    'raw'           => true,
  ) );

  if ( $nc_langSwitch ) :
  ?>

    <div class="b-langSwitch js-langSwitch">
      <div class="b-langSwitch__current js-langSwitch__current"><?php echo pll_current_language( 'slug' ); ?></div>

      <ul class="b-langSwitch__list js-langSwitch__list">

        <?php foreach ( $nc_langSwitch as $item ) : ?>

          <li class="b-langSwitch__item -lang_<?php echo $item['slug']; ?><?php if ( $item['current_lang'] ) : ?> -state_current<?php endif; ?><?php if ( $item['no_translation'] ) : ?> -translation_false<?php endif; ?>" style="background-image: url('<?php echo $item['flag']; ?>');">
            <a class="b-langSwitch__link" href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
          </li>

        <?php endforeach; ?>

      </ul>
    </div>

  <?php endif; ?>

<?php endif; ?>
