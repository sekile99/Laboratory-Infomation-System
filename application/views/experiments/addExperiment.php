<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-table"></i> Experiment Information
            <small>Add Experiment</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Experiment Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addExperiment" action="<?php echo base_url('addNewExperiment'); ?>"
                        method="POST" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Experiment Name</label>
                                        <input type="text" class="form-control required"
                                            value="<?php echo set_value('experimentName'); ?>" id="name"
                                            name="experimentName" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Laboratory Name</label>
                                        <input type="text" class="form-control required" id="type"
                                            value="<?php echo set_value('laboratoryName'); ?>" name="laboratoryName"
                                            maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tools">Tools</label>
                                        <textarea name="tools" value="<?php echo set_value('tools'); ?>"
                                            class="form-control required" id="tools" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="items">Chemicals/Items</label>
                                        <textarea name="items" value="<?php echo set_value('items'); ?>"
                                            class="form-control required" id="tools" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hazards">Hazards</label>
                                        <textarea name="hazards" value="<?php echo set_value('hazards'); ?>"
                                            class="form-control required" id="hazards" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ppe">PPEs (Personal Protective Equipments)</label>
                                        <textarea name="ppe" value="<?php echo set_value('ppe'); ?>"
                                            class="form-control required" id="tools" cols="30" rows="5"></textarea>
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
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <?php
                $success = $this->session->flashdata('success');
                if ($success) {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script type="text/javascript">
$(document).ready(function() {
    var addUserForm = $("#addExperiment");
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
                type: "Please enter valid Experiment Type",
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