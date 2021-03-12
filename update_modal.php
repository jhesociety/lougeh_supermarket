<div class="modal fade" id="UpdateModal<?php echo $row['Customer_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <? require_once 'update_customer.php'?>
                <form action='update_customer.php' method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="Customer_id" value="<?php echo $row['Customer_id']?>"/>
                        <label class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" name="upfullname" value="<?php echo $row['Cust_Name']?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address:</label>
                        <input type="text" class="form-control " name="upaddress" value="<?php echo $row['Cust_Address']?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Contact Number:</label>
                        <input type="text" class="form-control " name="upcontactnumber" value="<?php echo $row['Contact_Number']?>" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" name="update">Update</button>

                </div>
                </form>
            </div>
        </div>
    </div>