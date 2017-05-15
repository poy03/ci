<!DOCTYPE html>
<html>
<head>
<?php echo '<title>'.$title.'</title>'.$meta_scripts.$css_scripts; ?>
<style>

</style>
</head>
<body>
<?php echo $navbar_scripts; ?>
<?php echo $announcements; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
        <label>Controls:</label>
        <button class="btn btn-primary btn-block" onclick="$('#add-items-modal').modal('show')"></span> Add Items</button> 
        <button class="btn btn-primary btn-block" type="button"><span class="glyphicon glyphicon-edit"></span> Edit Items</button>
        <button class="btn btn-danger btn-block" type="button" id="delete"><span class="glyphicon glyphicon-trash"></span> Delete Items</button>


        <label>Category:</label>
        <select class="form-control" id="cat">
          <option value="all">All</option>
        </select>

        <label>Supplier:</label>
        <select class="form-control" id="supplier">
          <option value="all">All</option>
        </select>



        <label>Sort:</label>
        <select class="form-control" id="sort">
          <option value="A-Z" selected>A-Z</option>
          <option value="Z-A" >Z-A</option>
          <option value="Q-R" >Quantity < Reorder Level</option>
          <option value="Q-D" >Quantity DESC</option>
          <option value="Q-A" >Quantity ASC</option>
        </select>


          <label>Export to Excel Including:</label>
          <input type="hidden" name="category" value="">
          <input type="hidden" name="supplier" value="">
          <div class="col-md-12">
              <label><input type="checkbox" name="sub_costprice" value="1" checked> Sub Cost Price</label>
            </div>
          <div class="col-md-12">
              <label><input type="checkbox" name="costprice" value="1" checked> Total Cost Price</label>
          </div>
          <div class="col-md-12">
              <label><input type="checkbox" name="srp" value="1" checked> WPP</label>
          </div>
          <div class="col-md-12">
              <label><input type="checkbox" name="std_price_to_trade_terms" value="1" checked> STD Price to Terms</label>
          </div>
            <div class="col-md-12">
              <label><input type="checkbox" name="std_price_to_trade_cod" value="1" checked> STD Price to COD</label>
          </div>
            <div class="col-md-12">
              <label><input type="checkbox" name="price_to_distributors" value="1" checked> Price to Distributors</label>
          </div>
            <button class="btn btn-block btn-primary" name="export" type="submit"><span class="glyphicon glyphicon-file"></span> Export</button>

    </div>
    <div class="col-sm-10">
      <div class="table-responsive">
      <table class='table table-hover' id='items-table'>
        <thead>
          <tr>
            <th class='prints'><input type="checkbox" id="select-all" value='all'> All</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>UOM</th>
            <th>Remaining Quantity</th>
            <th>Sub Cost Price</th>
            <th>Total Cost Price</th>
            <th>WPP</th>
            <th>STD Price to Trade (Terms):</th>
            <th>STD Price to Trade (COD):</th>
            <th>Price to Distributors:</th>
            <th class='prints'>Reorder Level</th>
          </tr>
        </thead>
        <tbody>

        </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
<?php echo $modaljs_scripts; ?>


<!--Add Items -->
<div id="add-items-modal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Add Items</h4>
    </div>
      <div class="modal-body">
        <p>
        <?php echo form_open("item_ajax/add",'class="form-horizontal" id="add-items-form"'); ?>
        <div class='form-group ui-widget'>
          <label for="category" class='col-sm-4'>Category:</label>
        <div class='col-sm-8'>
          <input type='text' class='form-control search' id='category' name='category' placeholder='Category' autocomplete='off'>
          <p class="help-block" id="category-help-block"></p>
        </div>
        </div>

        <div class='form-group'>
          <label for="itemname" class='col-sm-4'>Item Name:</label>
        <div class='col-sm-8'>
          <input type='text' class='form-control' name='itemname' placeholder='Item Name'>
          <p class="help-block" id="itemname-help-block"></p>
        </div>
        </div>


        <div class='form-group'>
          <label for="item_code" class='col-sm-4'>Item Code:</label>
        <div class='col-sm-8'>
          <input type='text' class='form-control' name='item_code' placeholder='Item Code'>
          <p class="help-block" id="item_code-help-block"></p>
        </div>
        </div>

        <div class='form-group'>
          <label for="supplier" class='col-sm-4'>Supplier:</label>
        <div class='col-sm-8'>
          <select name="supplier" class="form-control">
            <option value="">Select Supplier</option>
          </select>
        </div>
        <p class="help-block" id="supplier-help-block"></p>
        </div>

        <div class='form-group'>
          <label for="unit_of_measure" class='col-sm-4'>Unit of Measurement:</label>
        <div class='col-sm-8'>
          <input type='text' class='form-control' name='unit_of_measure' placeholder='Unit of Measurement'>
          <p class="help-block" id="unit_of_measure-help-block"></p>
        </div>
        </div>

        <div class='form-group'>
          <label for="sub_costprice" class='col-sm-4'>Sub Cost Price:</label>
        <div class='col-sm-8'>
          <input step='0.01' min='0' max='99999999' type='number' class='form-control' name='sub_costprice' placeholder='Sub Cost Price'>
        </div>
        </div>

        <div class='form-group'>
          <label for="srp" class='col-sm-4'>WPP:</label>
        <div class='col-sm-8'>
          <input step='0.01' min='0' max='99999999' type='number' class='form-control' name='srp' placeholder='WPP'>
        </div>
        </div>

        <div class='form-group'>
          <label for="std_price_to_trade_terms" class='col-sm-4'>STD Price to Trade (Terms):</label>
        <div class='col-sm-8'>
          <input step='0.01' min='0' max='99999999' type='number' class='form-control' name='std_price_to_trade_terms' placeholder='STD Price to Trade (Terms)'>
        </div>
        </div>

        <div class='form-group'>
          <label for="std_price_to_trade_cod" class='col-sm-4'>STD Price to Trade (COD):</label>
        <div class='col-sm-8'>
          <input step='0.01' min='0' max='99999999' type='number' class='form-control' name='std_price_to_trade_cod' placeholder='STD Price to Trade (COD)'>
        </div>
        </div>

        <div class='form-group'>
          <label for="price_to_distributors" class='col-sm-4'>Price to Distributors:</label>
        <div class='col-sm-8'>
          <input step='0.01' min='0' max='99999999' type='number' class='form-control' name='price_to_distributors' placeholder='Price to Distributors'>
        </div>
        </div>

        <div class='form-group'>
          <label for="quantity" class='col-sm-4'>Quantity:</label>
        <div class='col-sm-8'>
          <input min='0' max='99999999' type='number' class='form-control' name='quantity' placeholder='Quantity'>
        </div>
        </div>

        <div class='form-group'>
          <label for="quantity" class='col-sm-4'>Reorder Level:</label>
        <div class='col-sm-8'>
          <input min='0' max='99999999' type='number' class='form-control' name='reorder' placeholder='Reorder Level'>
        </div>

        </form>
        </p>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="add-items-form">Save</button>
      </div>
    </div>

  </div>
</div>

<?php echo $js_scripts; ?>
<script>

</script>
</body>
</html>