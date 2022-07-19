<form method="post" action="<?= base_url() ?>/admin/category" id="category_insert">
      <div class="form-group">
      <label>Name<span class="text--danger">*</span></label>
      <input type="text" name="category_name" class="form-control" placeholder="category Name">
       <small style="color:red;" class="text-danger">
      <span id="mgs1" style="color:red;"></span> 
     </div><br>

 <label>Icon<span class="text--danger">*</span></label>
  <div class="input-group mb-3">
<input data-placement="bottomRight"  type="text" class="form-control  icp demo" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="category_icon">

<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
</div>
<span id="mgs2" style="color:red;"></span>
</form>