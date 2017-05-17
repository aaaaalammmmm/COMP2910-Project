<?php include 'header.php';?>
<div>
  <form class="form-horizontal center-block" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">Name:</label>
      <div class="col-sm-10">
        <input type="text" maxlength = "30" placeholder="Enter name" name="Name"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="text" maxlength="30" placeholder="Enter email" name="Email"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Comment:</label>
      <div class="col-sm-10">
        <textarea rows="5" name="Comment" placeholder="Type a comment"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="send">Submit</button>
      </div>
    </div>
  </form>
</div>

</div>
<?php include 'footer.php';?>
