<?php include ('header.php') ?>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <div class="content">
        Registering with VEX... <br/> <span class="small-text">...is a smart move</span>
      </div>
    </h2>
    <form action="/contact.php" method="post" class="ui large form">
        <?= error() ?>
      <?= success() ?>
      <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="name" placeholder="Name">
            </div>
          </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="phone" placeholder="Phone">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <textarea rows="2" name="message" placeholder="Message"></textarea>
          </div>
        </div>
        <button class="ui fluid large primary submit button">Login</button>
      </div>

      <div class="ui error message"></div>

    </form>

  </div>
</div>


<?php include ('footer.php') ?>
