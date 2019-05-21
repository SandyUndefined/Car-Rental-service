
<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="margin-right: 150px;">Login</h3>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" action="includes/login_regs_get.php">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*">
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="login" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <p  class="mr-5">Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
      </div>
    </div>
  </div>
</div>