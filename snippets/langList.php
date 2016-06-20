<?php
// Lang list for Polylang
?>
<?php if (function_exists('pll_the_languages')): ?>
  <?php
  $nc_langList = pll_the_languages(array(
    'hide_if_empty' => false,
    'hide_current'  => false,
    'raw'           => true,
  ));
  ?>
  <?php if($nc_langList): ?>
    <ul class="b-langList">
      <?php foreach($nc_langList as $item): ?>
        <li class="b-langList__item -lang_<?php echo $item['slug']; ?><?php if($item['current_lang']):?> -state_current<?php endif; ?><?php if($item['no_translation']):?> -translation_false<?php endif; ?>" style="background-image: url('<?php echo $item['flag']; ?>');">
          <a class="b-langList__link" href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
<?php endif; ?>
