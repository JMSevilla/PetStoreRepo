<div class="container" style="margin-top: 30px;">
<div class="card" style="margin-bottom: 40px;">
  <div class="card-body" >
      <h3>Categories List</h3> 
      <?php 
        include("server/listcategories.php");
      ?>
     
  </div>

</div>
<div class="card" >
  <div class="card-body">
      <h3>Add categories</h3>
     
  <!-- Name input -->
  <label  >Category Name</label>
  <div class="form-outline mb-4">
  
    <input type="text" id="categoryname" name="categoryname" class="form-control" />
    
  </div>
  <button type="submit" id="oncreate" class="btn btn-primary btn-block mb-4">Create</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
      <div class="form-outline">
        <input type="text" id="categorynameupdate" class="form-control" />
        <label class="form-label" for="categorynameupdate">Category name</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary" id="onsaveupdate">Save changes</button>
      </div>
    </div>
  </div>
</div>



</div>