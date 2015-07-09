    <head>

<link href=<?php echo site_url('css/bootstrap.css'); ?> rel="stylesheet">
<link href=<?php echo site_url('css/styles.css'); ?> rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script src=<?php echo site_url('js/bootstrap.js'); ?>></script> 
<script src=<?php echo site_url('js/slider.js'); ?>></script>
<script src=<?php echo site_url('js/app.js'); ?>></script> 

         <title>HTML Checkbox</title>
    </head>
    <body>
    <style>
        input[type="checkbox"] {
         // i just remove this part..
        }
        .checkbox {
          margin: 30px 0 0 0;
        }
    </style>
         <h2> Pick your most favorite fruits: </h2>
         <div class="text-center">
         Hello
         </div>
         <form name="fruitcheckbox" class= "text-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
           <input type="checkbox" name="fruit[]" value="orange"> Orange
           <input type="checkbox" name="fruit[]" value="apple"> Apple
           <input type="checkbox" name="fruit[]" value="grapefruit"> Grapefruit
           <input type="checkbox" name="fruit[]" value="banana"> Banana
           <input type="checkbox" name="fruit[]" value="watermelon"> Watermelon
           <br>
           <input type="submit" value="Save" name="btnsave">
         </form>

          <div class="container-fluid">
          <div class="row-fluid">
            <div class="span3">
              <label>label 1</label>
              <input type="text" />
            </div>
            <div class="span3" style="float: left;">
              <label>label 2</label>
              <input type="text" />
            </div>
            <div class="span3 checkbox">
                <input type="checkbox" />test description
            </div>
          </div>
        </div>


        <div class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-2 control-label">With label text</label>
          <div class="col-sm-10">
            <div class="checkbox">
              <label>
                  <input type="checkbox"> label text
              </label>
            </div>
          </div>
    </div>
  <div class="form-group">
      <label class="col-sm-2 control-label">Without label text</label>
          <div class="col-sm-10">
            <div class="checkbox">
              <label>
                  <input type="checkbox">
              </label>
            </div>
          </div>
    </div>
</div>

    </body>
</html>