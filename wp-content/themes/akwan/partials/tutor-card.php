<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$image = get_field('image', $post_id);
$role = get_field('role', $post_id);
$education = get_field('education', $post_id);
$subjects = get_field('subjects', $post_id);
$philosophy_quote = get_field('philosophy_quote', $post_id);
$passions = get_field('passions', $post_id);
?>
<div class="tutor-card">
  <div class="top-information">
    <?php if (!empty($image) && is_array($image)) { ?>
      <picture class="tutor-image">
        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
      </picture>
    <?php } ?>
    <h4 class="tutor-name salute-h4 fw-600"><?= get_the_title($post_id); ?></h4>
    <?php if ($role): ?>
      <div class="tutor-role paragraph-18 fw-300"><?= $role ?></div>
    <?php endif; ?>
  </div>
  <div class="information">
    <?php if ($education): ?>
      <div class="tutor-education paragraph-18 tutor-text">
        🎓 <strong>Education:</strong> <?= $education ?>
      </div>
    <?php endif; ?>
    <?php if ($subjects): ?>
      <div class="tutor-subjects paragraph-18 tutor-text">
        🗂️ <strong>Subjects:</strong> <?= $subjects ?>
      </div>
    <?php endif; ?>
    <?php if ($philosophy_quote): ?>
      <div class="tutor-philosophy paragraph-18 tutor-text">
        🍎 <strong>Philosophy:</strong> <?= $philosophy_quote ?>
      </div>
    <?php endif; ?>
    <?php if ($passions): ?>
      <div class="tutor-passions paragraph-18 tutor-text">
        💛 <strong>Passions:</strong> <?= $passions ?>
      </div>
    <?php endif; ?>
  </div>
</div>
