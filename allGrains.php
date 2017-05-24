<script>
// Adds the ajax liveload to the ajax history
dhtmlHistory.add("allGrains","allGrains");
</script>
<script type="text/javascript">
$(document).ready(function() {

  $("a.transition").click(function(event){
      event.preventDefault();
      linkLocation = this.href;
      $("body").fadeOut(1500, redirectPage);
  });

  function redirectPage() {
      window.location = linkLocation;
  }
});
</script>
<!-- This page loads all the grains  -->
<div class="row text-center block-center">
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('bread','grains')" class="transition">
      <figure>
        <img src="images/bread.png" alt="Bread"/>
        <figcaption>Bread</figcaption>
      </figure>

    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('pasta','grains')" class="transition">
      <figure>
        <img src="images/pasta.png" alt="Pasta"/>
        <figcaption>Pasta</figcaption>
      </figure>

    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('quinoa','grains')" class="transition">
      <figure>
        <img src="images/quinoa.png" alt="Quinoa"/>
        <figcaption>Quinoa</figcaption>
      </figure>

    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('rice','grains')" class="transition">
      <figure>
        <img src="images/rice.png" alt="Rice"/>
        <figcaption>Rice</figcaption>
      </figure>
    </a>
  </div>
</div>
