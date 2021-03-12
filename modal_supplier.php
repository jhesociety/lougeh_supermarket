<div class="modal fade" id="UpdateModal<?php echo $row['Supplier_ID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <? require_once 'update_supplier.php'?>
                <form action='update_supplier.php' method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Supplier Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="Supplier_ID" value="<?php echo $row['Supplier_ID']?>"/>
                        <label class="col-form-label">Company Name:</label>
                        <input type="text" class="form-control" name="upsuppComp" value="<?php echo $row['Supp_Company']?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Contact Number:</label>
                        <input type="text" class="form-control " name="upsuppContact" value="<?php echo $row['Supp_Contact_No']?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address:</label>
                        <input type="text" class="form-control " name="upsuppAddress" value="<?php echo $row['Supp_address']?>" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" name="update">Update</button>

                </div>
                </form>
            </div>
        </div>
    </div>