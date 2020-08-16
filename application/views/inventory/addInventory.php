<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-table"></i> Inventory Information
            <small>Add Inventory</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Inventory Details</h3>
                    </div>
<?php $this->load->helper("form");?>
                    <form role="form" id="addInventory" action="<?php echo base_url('addNewInventory');?>" method="POST" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Inventory Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('name');?>" id="name" name="name" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Inventory Type</label>
                                        <input type="text" class="form-control required" id="type" value="<?php echo set_value('type');?>" name="type" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <input type="text" class="form-control required digits" id="size" value="<?php echo set_value('size');?>" name="size" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Quantity / Count</label>
                                        <input type="number" class="form-control required digits" id="quantity" value="<?php echo set_value('size');?>" name="qty" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" class="form-control" id="barcode" value="<?php echo set_value('barcode');?>" name="barcode">
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
<script type="text/javascript">
    $(document).ready(function() {
        var addUserForm = $("#addInventory");
        var validator = addUserForm.validate({
            rules: {
                name: {
                    required: true
                },
                type: {
                    required: true,
                    type: true
                },
                size: {
                    required: true,
                    digits: false
                },
                status: {
                    required: true,
                    selected: true
                }
            },
            messages: {
                name: {
                    required: "This field is required"
                },
                type: {
                    required: "This field is required",
                    type: "Please enter valid Inventory Type",
                },
                size: {
                    required: "This field is required",
                    digits: "Please enter valid size"
                },
                status: {
                    required: "This field is required",
                    selected: "Please select atleast one option"
                }
            }
        });
    });
</script>