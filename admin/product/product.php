<div class="container" style="margin-top: 30px;">

<div class="row">
    <div class="col-sm">
    
<div class="card">
  <div class="card-body">
  <h3>Products</h3>
  <div style="margin-bottom: 20px;">
  <label>Product Name</label>
  <input type="text" id="prodname" class="form-control" />
</div>
<div style="margin-bottom: 20px;">
  <label>Product Price</label>
  <input type="number" id="prodprice" class="form-control" />
</div>
<div style="margin-bottom: 20px;">
  <label for="form1">Product Quantity</label>
  <input type="number" id="prodquantity" class="form-control" />
</div>
<div class="form-outline" style="margin-bottom: 20px;">
  <textarea class="form-control" id="proddescription" rows="4"></textarea>
  <label class="form-label" for="textAreaExample">Product Description</label>
</div>
<div style="margin-bottom: 20px;">
<select id="selectedcategory" class="browser-default custom-select">
<option selected>Please select categories</option>
<?php
require_once "../database/config.php";
$QL = "
SELECT * FROM categories
";
if($result = $pdo->query($QL)){
    if($result->rowCount() > 0){
        
        while($row = $result->fetch()){
            $cname = $row['category_name'];
            
       ?>
      
      
      <option value="<?php echo $cname ?>"><?php echo $cname; ?></option>
      
       <?php 
        }
        
        unset($result);
    }
}
unset($pdo);
?>
       </select>
</div>
<div style="margin-bottom: 20px;">
    <input type="file" style="width: 100%;" id="file" name="file" class="btn btn-primary"/>
</div>
<div style="margin-bottom: 20px; float: right;">
    <button class="btn btn-info" id="oncreateproduct">Create Product</button>
</div>
  </div>
  
</div>
    </div>
    <div class="col-sm">
    <div class="card">
  <div class="card-body">
      <h3>Product List</h3> <p>Deprecated from the list(Product Description)</p>
      <?php include('server/productlist.php'); ?>
</div>
</div>
    </div>
</div>


<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
     

      <div style="margin-bottom: 20px;">
  <label>Product Name</label>
  <input type="text" id="editprodname" class="form-control" />
</div>
<div style="margin-bottom: 20px;">
  <label>Product Price</label>
  <input type="number" id="editprodprice" class="form-control" />
</div>
<div style="margin-bottom: 20px;">
  <label for="form1">Product Quantity</label>
  <input type="number" id="editprodquantity" class="form-control" />
</div>
<div class="form-outline" style="margin-bottom: 20px;">
  <textarea class="form-control" id="editproddescription" rows="4"></textarea>
  <label class="form-label" for="textAreaExample">Product Description</label>
</div>
<div style="margin-bottom: 20px;">
<label>Product Category</label>
  <input type="text" id="editcategory" class="form-control" /> 
</div>
<!-- DEPRECATED IMAGE UPDATE -->
<!-- <div style="margin-bottom: 20px;">
    <input type="file" style="width: 100%;" id="filefile" name="filefile" class="btn btn-primary"/>
</div> -->


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary" id="editonsaveupdate">Save changes</button>
      </div>
    </div>
  </div>
</div>





</div>