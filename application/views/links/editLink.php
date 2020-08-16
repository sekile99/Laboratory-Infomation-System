<?php
$experimentId = $experimentInfo->experimentId;
$name = $experimentInfo->experimentName;
$lab = $experimentInfo->labName;
$tools = $experimentInfo->tools;
$items = $experimentInfo->items;
$hazards = $experimentInfo->hazards;
$ppe = $experimentInfo->ppe;
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-table"></i> Experiment Information
            <small>Edit Experiment</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Experiment Details</h3>
                    </div><!-- /.box-header -->
                    <form role="form" action="<?php echo base_url('editExperiment') ?>" method="post"
                        id="editExperiment" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Experiment Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $name; ?>"
                                            id="name" name="experimentName" maxlength="128">
                                        <input type="hidden" value="<?php echo $experimentId; ?>" name="experimentId">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Laboratory Name</label>
                                        <input type="text" class="form-control required" id="type"
                                            value="<?php echo $lab; ?>" name="laboratoryName" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tools">Tools</label>
                                        <textarea name="tools" class="form-control required" id="tools" cols="30"
                                            rows="5">
                                         <?php echo htmlspecialchars($tools); ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="items">Chemicals/Items</label>
                                        <textarea name="items" class="form-control required" id="tools" cols="30"
                                            rows="5">
                                            <?php echo htmlspecialchars($items); ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hazards">Hazards</label>
                                        <textarea name="hazards" class="form-control required" id="hazards" cols="30"
                                            rows="5">
                                         <?php echo htmlspecialchars($hazards); ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ppe">PPEs (Personal Protective Equipments)</label>
                                        <textarea name="ppe" class="form-control required" id="tools" cols="30"
                                            rows="5">
                                             <?php echo htmlspecialchars($ppe); ?>
                                        </textarea>
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

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>