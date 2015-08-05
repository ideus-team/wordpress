<?php if(is_singular() && comments_open() && !is_preview()): ?>
  <div class="l-comments">
    <div class="b-comments" id="commentsbox">
      <?php comments_template('', true); ?>
    </div>
  </div>
<?php endif; ?>