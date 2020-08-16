<?php
$docId = $documentInfo->docId;
$name = $documentInfo->title;
$type = $documentInfo->docType;
$subject = $documentInfo->subject;

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> Document Information
            <small>Edit Document</small>
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Document Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url('editDocument') ?>" method="post" id="editUser"
                        role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Document Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $name; ?>"
                                            id="name" name="name" maxlength="128">
                                        <input type="hidden" name="docId">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Document Type</label>
                                        <select name="type" id="type" class="form-control required">
                                            <option> SELECT TYPE</option>
                                            <option value="Notes">Notes</option>
                                            <option value="Assignment">Assignment</option>
                                            <option value="Material">Material</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <select name="subject" id="subject" class="form-control required">
                                            <option> SELECT SUBJECT</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Biology">Biology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file">Select Document File</label>
                                        <!-- NOTE: Limit only documents to be uploaded -->
                                        <input type="file" name="document"
                                            accept=".pdf, .doc, .docx, .csv, .xml, .html, .xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div><!-- /.box-body -->

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