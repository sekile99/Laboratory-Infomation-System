<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Document Information
        <small>Add Document</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Document Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addDocument" action="<?php echo base_url('addNewDocument'); ?>" method="POST" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('title'); ?>" id="title" name="title" placeholder="physics" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">       
                                    <div class="form-group">
                                        <label for="module">Module</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('module'); ?>" id="module" name="module" placeholder="Fundamentals of Electronics" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">    
                                    <div class="form-group">
                                        <label for="program">Program</label>
                                        <input type="program" class="form-control required" value="<?php echo set_value('program'); ?>" id="program" name="program" placeholder="Computer Engineering" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">      
                                    <div class="form-group">
                                        <label for="class">class</label>
                                        <input type="text" class="form-control required" placeholder="COE1" value="<?php echo set_value('class'); ?>" id="class" name="class" maxlength="128">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="venue">Venue</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('venue'); ?>" id="venue" name="venue" placeholder="TT6" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">          
                                    <div class="form-group">
                                        <label for="date">Date and Time</label>
                                        <input type="datetime-local" class="form-control required" value="<?php echo set_value('date'); ?>" id="date" name="date" maxlength="128">
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ac_year">Academic Year</label>
                                        <select name="ac_year" id="ac_year" class="form-control required" >
                                            <option value="2019/2020">2019/2020</option>
                                            <option value="2020/2021">2020/2021</option>
                                            <option value="2021/2022">2021/2022</option>
                                            <option value="2022/2023">2022/2023</option>
                                            <option value="2023/2024">2023/2024</option>
                                            <option value="2024">2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select name="semester" id="semester" class="form-control required" >
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file">Select Document File</label>
                                        <input type="file" name="document" required>
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
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
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
    $(document).ready(function(){
    
    var addUserForm = $("#addDocument");
    
    var validator = addUserForm.validate({
        rules:{
            name :{ required : true },
            type : { required : true, type : true},
            size : { required : true, digits : false },
            status : { required : true, selected : true}
        },
        messages:{
            name :{ required : "This field is required" },
            type : { required : "This field is required", type : "Please enter valid Document Type",},
            size : { required : "This field is required", digits : "Please enter valid size" },
            status : { required : "This field is required", selected : "Please select atleast one option" }           
        }
    });
});

</script>