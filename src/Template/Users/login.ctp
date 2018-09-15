<?= $this->Html->css(['bootstrap', 'custom.min', 'font-awesome.min']) ?>
<body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <h1>RMM Meatshop</h1>
              <div>

                <?= $this->Flash->render() ?>
              	<?= $this->Form->create()	?>

                <?= $this->Form->input('username', ['class' => 'form-control', 'required' => true])	?>

              </div>
              <div>

                <?=	$this->Form->input('password',['class' => 'form-control', 'required' => true, 'type' => 'password'])	?>

              </div>
              <div><br>

                <?=	$this->Form->button('Log in',['class' => 'form-control btn btn-success', 'required' => true])	?>

                <?=	$this->Form->end()	?>

              </div>

              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
          </section>
        </div>
      </div>
    </div>
  </body>