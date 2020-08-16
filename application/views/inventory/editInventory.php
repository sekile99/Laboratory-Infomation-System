<?php
$id       = $inventoryInfo->inventoryId;
$name     = $inventoryInfo->inventoryName;
$type     = $inventoryInfo->inventoryType;
$barcode  = $inventoryInfo->barcode;
$size     = $inventoryInfo->inventorySize;
$quantity = $inventoryInfo->count;
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-table"></i> Invetory Information
            <small>Edit Inventory</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Inventory Details</h3>
                    </div><!-- /.box-header -->
                    <form role="form" action="<?php echo base_url('editInventory')?>" method="post" id="editInventory" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Inventory Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $name;?>" id="name" name="name" maxlength="128">
                                        <input type="hidden" value="<?php echo $id;?>" name="inventoryId" id="inventoryId" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Inventory Type</label>
                                        <input type="text" class="form-control required" id="type" value="<?php echo $type;?>" name="type" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <input type="text" class="form-control required digits" id="size" value="<?php echo $size;?>" name="size" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Quantity / Count</label>
                                        <input type="number" class="form-control required digits" id="quantity" value="<?php echo $quantity;?>" name="qty" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" class="form-control" id="barcode" value="<?php echo $barcode;?>" name="barcode">
                                        <small>Scan the barcode on the Tool, leave empty if not available</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
<?php
$this->load->helper('form');
$error = $this->session->flashdata('error');
if ($error) {
	?>
	<div class="alert alert-danger alert-dismissable">
		                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $this->session->flashdata('error');?>
	</div>
	<?php }?>
                <?php
$success = $this->session->flashdata('success');
if ($success) {
	?>
	<div class="alert alert-success alert-dismissable">
		                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $this->session->flashdata('success');?>
	</div>
	<?php }?>
<div class="row">
                    <div class="col-md-12">
<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url();?>assets/js/editUser.js" type="text/javascript"></script>