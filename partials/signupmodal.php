<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Signup for Code Forum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/Forum/partials/handlesignup.php" method="post">
          <div class="modal-body">
                  <div class="form-group">
                    <i class="fa fa-user icon"></i> <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name ="username" placeholder="Enter username" required>
                  </div>
                  <div class="form-group">
                    <i class="fa fa-envelope icon"></i> <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <i class="fa fa-key icon"></i> <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name ="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <i class="fa fa-key icon"></i> <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Confirm Password" required>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </form>
    </div>
  </div>
</div>