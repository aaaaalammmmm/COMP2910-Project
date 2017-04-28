<div class="text-center col-xs-12">
  <img src="" alt="Banana" />
  <div>
    <h3>Storage</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae dolor dolor. Morbi dapibus risus euismod tortor vestibulum, eget bibendum nisl ultrices. Integer ornare mattis est, et maximus velit tincidunt a. Integer non dapibus enim. Suspendisse nisl urna, molestie sit amet elit a, accumsan commodo nisi. Morbi lacinia dui ipsum. Sed bibendum nisl vitae tortor convallis dapibus eu nec nunc.</p>
  </div>
  <div>
    <h3>Revival</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae dolor dolor. Morbi dapibus risus euismod tortor vestibulum, eget bibendum nisl ultrices. Integer ornare mattis est, et maximus velit tincidunt a. Integer non dapibus enim. Suspendisse nisl urna, molestie sit amet elit a, accumsan commodo nisi. Morbi lacinia dui ipsum. Sed bibendum nisl vitae tortor convallis dapibus eu nec nunc.</p>
  </div>
  <div>
    <div class="col-xs-4">
      <a href='javascript:ripenessLoad("green-banana")' style="cursor: pointer;"><img src="" alt="Green Banana" /></a><div>Green Banana</div>
    </div>
    <div class="col-xs-4">
      <a href='javascript:ripenessLoad("yellow-banana")' style="cursor: pointer;"><img src="" alt="Yellow/Ripe Banana" /></a><div>Yellow/Ripe Banana</div>
    </div>
    <div class="col-xs-4">
      <a href='javascript:ripenessLoad("black-banana")' style="cursor: pointer;"><img src="" alt="Black/Over-ripe Banana" /></a><div>Black/Over-ripe Banana</div>
    </div>
  </div>
  <script>
  function ripenessLoad(str) {
    document.getElementById("search-box").value="";
    $("#livesearch").load(str+'.php');
  }
  </script>
</div>
