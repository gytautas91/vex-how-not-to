
<?php
    if (userId() === 0)
        redirect(build_url(['page' => 'login', 'error' => 'Area which you are trying to read requires authentication.']));
?>


<div class="ui blue three  inverted menu">
  <div class="header item">VEX</div>
  <a href="<?= build_url(['page' => 'documents'])?>" class="<?= is_page_active('documents') ?> item">
    Documents
  </a>
  <a href="<?= build_url(['page' => 'contacts'])?>" class="<?= is_page_active('contacts') ?> item">
    Contacts
  </a>
  <div class="right menu">
    <a href="/index?page=home" class="ui item">
      Logout
    </a>
  </div>
</div>
