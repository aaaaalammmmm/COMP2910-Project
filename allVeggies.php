<script>
// Adds the ajax liveload to the ajax history
dhtmlHistory.add("allVeggies","allVeggies");
</script>
<script type="text/javascript">
$(document).ready(function() {

  $("a.transition").click(function(event){
      event.preventDefault();
      linkLocation = this.href;
      $("body").fadeOut(500, redirectPage);
  });

  function redirectPage() {
      window.location = linkLocation;
  }
});
</script>
<!-- This page loads all the veggies  -->
<div class="row text-center center-block">
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('broccoli','vegetable')" class="transition">
        <figure>
            <img src="Images/Broccoli.png" alt="Broccoli"/>
            <figcaption>Broccoli</figcaption>
        </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('carrot','vegetable')" class="transition">
        <figure>
            <img src="Images/Carrot.png" alt="Carrot"/>
            <figcaption>Carrot</figcaption>
        </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('celery','vegetable')" class="transition">
        <figure>
            <img src="Images/Celery.png" alt="Celery"/>
            <figcaption>Celery</figcaption>
        </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('lettuce','vegetable')" class="transition">
        <figure>
            <img src="Images/Lettuce.png" alt="Lettuce"/>
            <figcaption>Lettuce</figcaption>
        </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('tomato','vegetable')" class="transition">
      <figure>
          <img src="Images/Tomato.png" alt="Tomato"/>
          <figcaption>Tomato</figcaption>
      </figure>
  </a>
  </div>
    <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('potato','vegetable')" class="transition">
        <figure>
            <img src="Images/Potato.png" alt="Potato"/>
            <figcaption>Potato</figcaption>
        </figure>
    </a>
  </div>
</div>
