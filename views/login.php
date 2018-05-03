<?php include ('header.php') ?>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <div class="content">
        Log-in to your account
      </div>
    </h2>
    <form method="post" action="/login.php" class="ui large form">
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
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="ui fluid large primary submit button">Login</button>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      New to us? <a href="/?page=register">Sign Up</a>
    </div>
  </div>
</div>


<?php include ('footer.php') ?>
