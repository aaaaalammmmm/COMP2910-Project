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
<!-- This page loads all the fruits  -->
<div class="row text-center center-block">
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('apple','fruit')" class="transition">
      <figure>
        <img src="Images/Apple.png" alt="Apple" class="image-size-limit"/>
        <figcaption>Apple</figcaption>
      </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('banana','fruit')" class="transition">
      <figure>
        <img src="images/Banana.png" alt="Banana" class="image-size-limit"/>
        <figcaption>Banana</figcaption>
      </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('blueberry','fruit')" class="transition">
      <figure>
        <img src="Images/Blueberry.png" alt="Blueberry" class="image-size-limit"/>
        <figcaption>Blueberry</figcaption>
      </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('lemon','fruit')" class="transition">
      <figure>
        <img src="images/Lemon.png" alt="Lemon" class="image-size-limit"/>
        <figcaption>Lemon</figcaption>
      </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('lime','fruit')" class="transition">
      <figure>
        <img src="images/Lime.png" alt="Lime" class="image-size-limit"/>
        <figcaption>Lime</figcaption>
      </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('orange','fruit')" class="transition">
      <figure>
        <img src="Images/Orange.png" alt="Orange" class="image-size-limit"/>
        <figcaption>Orange</figcaption>
      </figure>
    </a>
  </div>
  <div class="col-lg-2 col-md-3 col-xs-4">
    <a href="javascript:pageLoad('strawberry','fruit')" class="transition">
      <figure>
        <img src="Images/Strawberry.png" alt="Strawberry" class="image-size-limit"/>
        <figcaption>Strawberry</figcaption>
      </figure>
    </a>
  </div>
</div>
