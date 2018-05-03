<?php include ('header.php') ?>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <div class="content">
        Registering with VEX... <br/> <span class="small-text">...is a smart move</span>
      </div>
    </h2>
    <form action="/register.php" method="post" class="ui large form">
        <?= error() ?>
      <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="username" placeholder="Username">
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
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="match-password" placeholder="Repeat password">
          </div>
        </div>
        <button class="ui fluid large primary submit button">Login</button>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      Have account already? <a href="/page=login">Sign In</a>
    </div>
  </div>
</div>


<?php include ('footer.php') ?>
