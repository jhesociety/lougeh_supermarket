<div class="modal fade" id="UpdateModal<?php echo $row['product_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <? require_once 'update_supplier.php'?>
                <form action='update_supplier.php' method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product View</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="Supplier_ID" value="<?php echo $row['product_id']?>"/>
                        <label class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" name="prodName" value="<?php echo $row['Prod_Desc']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Quatity:</label>
                        <input type="text" class="form-control " name="prodQuan" value="<?php echo $row['Prod_Qty']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Price Cost:</label>
                        <input type="text" class="form-control " name="prodPrice" value="<?php echo $row['Prod_Cost']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Date:</label>
                        <input type="date" class="form-control " name="prodDate" value="<?php echo $row['Prod_Date']?>" disabled>


                    </div>
                    <div class="form-group text-center">

                        <input type="text" class="form-control " name="prodCode" value="BARCODE: <?php echo $row['Prod_Code']?>" disabled>
                        <label style="font-family: 'Libre Barcode 39'; font-size: 100px;"><?php echo $row['Prod_Code']?></label>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>