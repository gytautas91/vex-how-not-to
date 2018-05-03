<?php include ('header.php') ?>


<div class="ui container" xmlns="http://www.w3.org/1999/html">
  <br>
  <?php include ('innerHeader.php'); ?>
  <h1>New document</h1>
  <div class="ui divider"></div>
  <br>
    <?= error() ?>
    <?= success() ?>
  <form class="ui form" action="document_manager.php?<?=http_build_query($_GET)?>" method="post" enctype="multipart/form-data">
  <div class="field">
    <label>Name</label>
    <div class="two fields">
      <div class="field">
        <input type="text" name="document[firstname]" placeholder="First Name">
      </div>
      <div class="field">
        <input type="text" name="document[lastname]" placeholder="Last Name">
      </div>
    </div>
  </div>
  <div class="field">
    <label>Address</label>
    <div class="fields">
      <div class="twelve wide field">
        <input type="text" name="document[address]" placeholder="Address">
      </div>

    </div>
  </div>
  <div class="field">
    <label>Account information</label>
    <div class="fields">
        <div class="four wide field">
            <select name="document[bank]" class="ui fluid dropdown">
              <option value="">Bank</option>
              <option value="SEB">SEB</option>
              <option value="Swedbank">Swedbank</option>
              <option value="DNB">DNB</option>
              <option value="Danske Bank">Danske Bank</option>
              <option value="Šiaulių Bankas">Šiaulių Bankas</option>
            </select>
        </div>
      <div class="five wide field">
        <input type="text" name="document[account_number]" placeholder="Account number">
      </div>
      <div class="three wide field">
        <input type="text" name="document[issued_sum]" placeholder="Sum">
      </div>
      <div class="two wide field">
        <input type="text" name="document[date_from]" placeholder="Date from">
      </div>
      <div class="two wide field">
        <input type="text" name="document[date_until]" placeholder="Date until">
      </div>
    </div>
  </div>
  <div class="field">
    <label>Short comment</label>
    <textarea name="document[comment]" rows="2"></textarea>
  </div>
      <div class="ui field">
  <input type="file" name="attached_document" class="ui basic button"/>
  <label>ID / Passport copy</label>
      </div>
      <div class="container-fat">
          <button type="submit" class="ui button">
              <i class="disk icon"></i>
              Save
          </button>
      </div>
</form>
</div>

</body>
</html>
