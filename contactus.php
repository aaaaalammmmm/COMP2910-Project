<?php include 'header.php';?>
<div id="message">
  <form class="form-horizontal center-block" id="contact" action="email.php" method="post">
    <div class="form-group">
      <label class="control-label">Name:</label>
      <div>
        <input class="contact-input" type="text" maxlength = "30" placeholder="Enter name" name="Name"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Email:</label>
      <div>
        <input class="contact-input" type="text" maxlength="30" placeholder="Enter email" name="Email"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Comment:</label>
      <div>
        <textarea rows="5" name="Comment" placeholder="Type a comment"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div>
        <button type="submit" class="btn btn-default" name="send" onClick="">Submit</button>
      </div>
    </div>
  </form>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Submission Successful</h4>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php';?>

<script>
  $(function() {
    $("#contact").on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr("action"),
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
          document.getElementById("contact").reset();
          $("#myModal").modal();
        }
      });
    });
  });
</script>