<?php include 'general-header.php'; ?>


<div class="center-block">

  <img id="fridge_image" src="Images/fridge2.png" border="0" width="650" height="900" orgWidth="650" orgHeight="900" usemap="#image-maps-2017-05-17-162637" alt="fridge image" onclick="console.log('aasdf')" class="center-block"/>
  <map name="image-maps-2017-05-17-162637" id="fridge_map">
    <area id="shelf_1" alt="deli" title="url_1"shape="rect" coords="326,108,600,198" style="outline:none;" target="_self"
          onclick="console.log('shelf1');get_fridge_info(1);console.log('done calling function')"/>
    <area id="shelf_2" alt="leftovers" title="shelf_2" shape="rect" coords="57,102,313,289" style="outline:none;" target="_self"
          onclick="console.log('shelf2');get_fridge_info(2);console.log('done calling function')"/>
    <area id="shelf_4" alt="meats/raw" title="shelf_4" shape="rect" coords="52,475,598,662" style="outline:none;" target="_self"
          onclick="console.log('shelf4');get_fridge_info(4);console.log('done calling function')"/>
    <area id="shelf_5" alt="crisper" title="shelf_5" shape="rect" coords="50,672,317,856" style="outline:none;" target="_self"
          onclick="console.log('shelf5');get_fridge_info(5);console.log('done calling function')"/>
    <area id="shelf_6" alt="ethylene" title="shelf_6" shape="rect" coords="331,674,593,859" style="outline:none;" target="_self"
          onclick="console.log('shelf6');get_fridge_info(6);console.log('done calling function')"/>
    <area shape="rect" coords="648,898,650,900" alt="Image Map" style="outline:none;" title="Image Map" />
    <area id="shelf_3" alt="dairy/other" title="shelf_3" shape="poly" coords="329,252,331,311,52,314,53,451,590,454,592,250" style="outline:none;" target="_self"
          onclick="console.log('shelf3');get_fridge_info(3);console.log('done calling function')"/>
  </map>
  <h6 class="text-center">
    <b>Tap on a section of the fridge to find out more about which foods should be stored there!</b>
  </h6>
  <br />
  <div id="fridge_info">
    <h4>Your Fridge</h4>
    <p>
      Many consumers don't use their fridge properly. The shelves and compartments of the fridge are
      designed to hold specific foods, and storing food improperly can actually reduce their shelf life.
      <br />

      <!--<script>
        $('fridge_info').animate({'opacity':0}, 400, function() {
          $(this).html('asdf').animate({'opacity':1}, 400);
        });
      </script>-->
    </p>
  </div>
</div>
<script src="js/jquery.rwdImageMaps.js"></script>
<script>
  $(document).ready(function(e) {
      $('img[usemap]').rwdImageMaps();
  });
</script>

<?php
if (isset($_GET['f'])) {
  $food = $_GET['f'];
  if ($food == 'f') {
    echo "<script type='text/javascript'>resizeBtn('allFruits');</script>";
  } else if ($food == 'v') {
    echo "<script type='text/javascript'>resizeBtn('allVeggies');</script>";
  } else if ($food == 'g') {
    echo "<script type='text/javascript'>resizeBtn('allGrains');</script>";
  }
}

include 'footer.php'; ?>
