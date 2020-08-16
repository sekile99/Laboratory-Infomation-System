<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Report Information
      </h1>
    </section>
    <section class="content">
        <div class="row">
          <form action="<?php echo base_url('reports'); ?>" method="POST" id="searchList">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
              <div class="input-group">
                <span class="input-group-addon"><label for="fromDate"><i class="fa fa-calendar"></i></label></span>
                <input id="fromDate" type="date" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date" autocomplete="off" />
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
              <div class="input-group">
                <span class="input-group-addon"><label for="toDate"><i class="fa fa-calendar"></i></label></span>
                <input id="toDate" type="date" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date" autocomplete="off" />
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
              <select class="form-control required" name="type">
                  <option>SELECT TYPE</option>
                  <option value="elearning" <?php echo $type == 'elearning' ? "selected" : ''; ?>>Elearning</option>
                  <option value="inventory" <?php echo $type == 'inventory' ? "selected" : ''; ?>>Inventory</option>
                  <?php if ($role == ROLE_ADMIN): ?>
                        <option value="users" <?php echo $type == 'users' ? "selected" : ''; ?>>Users</option>
                        <option value="access" <?php echo $type == 'access' ? "selected" : ''; ?>>Access Log</option>
                  <?php endif ?>
              </select>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button class="btn btn-md btn-default btn-block pull-right resetFilters"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </div>
          </form>
        </div>
        <?php if (empty($userRecords) && empty($accessRecords) && empty($elearningRecords) && empty($inventoryRecords)): ?>
             <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Report</h3>
                    </div>
                    <div class="box-body table-responsive no-padding p-0">
                      <table class="table table-bordered table-hover table-head-fixed">
                        <tbody>
                            <tr>
                                <td>
                                    <center>
                                        <h3>No results have been returned</h3>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                  </div>
                </div>
            </div>
        <?php endif ?>
        <?php if (!empty($userRecords) && $role  == ROLE_ADMIN): ?>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Report</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding p-0">
                      <table class="table table-bordered table-hover table-head-fixed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>Created On</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            if(!empty($userRecords)){
                                foreach($userRecords as $record){
                                $counter++;
                            ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $record->name ?></td>
                                <td><?php echo $record->email ?></td>
                                <td><?php echo $record->mobile ?></td>
                                <td><?php echo $record->role ?></td>
                                <td><?php echo date("d/m/Y", strtotime($record->createdDtm)) ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('login-history/'.$record->userId); ?>" title="Login history"><i class="fa fa-history"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                  </div>
                </div>
            </div>
        <?php endif ?>

        <?php if (!empty($inventoryRecords)): ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Inventory List</h3>
                        </div>
                        <div class="box-body table-responsive no-padding p-0">
                            <table class="table table-bordered table-hover table-head-fixed">
                                <thead>
                                    <tr>
                                        <th width="3%">No.</th>
                                        <th width="15%">Name</th>
                                        <th width="10%">Type</th>
                                        <th width="10%">Barcode</th>
                                        <th width="8%">Size</th>
                                        <th width="8%">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $counter = 0;
                            if(!empty($inventoryRecords)){
                                foreach($inventoryRecords as $record){
                                $counter++;
                            ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $record->inventoryName; ?></td>
                                        <td><?php echo $record->inventoryType;  ?></td>
                                        <td><?php echo $record->barcode; ?></td>
                                        <td><?php echo $record->inventorySize; ?></td>
                                        <td><?php echo $record->count; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if (!empty($elearningRecords)): ?>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Document List</h3>
                    </div>
                    <div class="box-body table-responsive no-padding p-0">
                      <table class="table table-bordered table-hover table-head-fixed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date/Time</th>
                                <th>Title</th>
                                <th>Module</th>
                                <th>Venue</th>
                                <th>Instructor</th>
                                <th>Program</th>
                                <th>Class</th>
                                <th>Semester</th>
                                <th>Academic Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            if(!empty($elearningRecords)){
                                foreach($elearningRecords as $record){
                                $counter++;
                            ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo date("d/m/Y H:m:s", strtotime($record->date)); ?></td>
                                <td><?php echo $record->title; ?></td>
                                <td><?php echo $record->module; ?></td>
                                <td><?php echo $record->venue; ?></td>
                                <td><?php echo $record->name; ?></td><!-- Instructor -->
                                <td><?php echo $record->program; ?></td>
                                <td><?php echo $record->class; ?></td>
                                <td><?php echo $record->semester; ?></td>
                                <td><?php echo $record->ac_year; ?></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                  </div>
                </div>
            </div>
        <?php endif ?>    
        <?php if (!empty($accessRecords) && $role  == ROLE_ADMIN): ?>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>Date-Time</th>
                          <th>Platform</th>
                          <th>IP Address</th>
                          <th>Session Data</th>
                          <th>User Agent</th>
                          <th>Agent Full String</th>
                        </tr>
                        <?php
                        if(!empty($accessRecords)){
                            foreach($accessRecords as $record){
                        ?>
                        <tr>
                          <td><?php echo date("d/m/Y H:m:s", strtotime($record->createdDtm)) ?></td> 
                          <td><?php echo $record->platform ?></td> 
                          <td><?php echo $record->machineIp ?></td>
                          <td><?php echo $record->sessionData ?></td>
                          <td><?php echo $record->userAgent ?></td>
                          <td><?php echo $record->agentString ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                      </table>
                      
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                  </div><!-- /.box -->
                </div>
            </div>
        <?php endif ?>        
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "inventory/" + value);
            jQuery("#searchList").submit();
        });
        jQuery('.resetFilters').click(function(){
          $(this).closest('form').find("input[type=date]").val("");
          $(this).closest('form').find("input[type=select]").val("SELECT TYPE");
        })
    });
</script>