<style type="text/css">
.small-box>.inner {
    padding: 30px !important;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        </h1>
    </section>
    <section class="content" style="min-height: 50px !important">
        <div class="row">
            <?php if ($role == ROLE_ADMIN) : ?>
            <div class="col-lg-3 col-xs-6">
                <a href="<?php echo base_url('users'); ?>">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $totalUsers; ?></h3>
                            <p>All Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
                <a href="<?php echo base_url('elearning'); ?>">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $totalDocuments; ?></h3>
                            <p>Documents</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
                <a href="<?php echo base_url('inventory'); ?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $totalInventory; ?></h3>
                            <p>Instruments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-table"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
                <a href="<?php echo base_url('reports'); ?>">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>4</h3>
                            <p>Report</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-copy"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($role == ROLE_MANAGER) : ?>
            <div class="col-lg-6 col-xs-8">
                <a href="<?php echo base_url('inventory'); ?>">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $totalInventory; ?></h3>
                            <p>Total Inventory</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-table"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-8">
                <a href="<?php echo base_url('elearning'); ?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $totalDocuments; ?></h3>
                            <p>Total Documents</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($role == ROLE_TEACHER) : ?>
            <div class="col-lg-4 col-xs-12">
                <a href="<?php echo base_url('elearning'); ?>">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $totalDocuments; ?></h3>
                            <p>Total Documents</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-xs-12">
                <a href="<?php echo base_url('inventory'); ?>">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $totalInventory; ?></h3>
                            <p>Total Instruments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-table"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-xs-12">
                <a href="<?php echo base_url('reports'); ?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Total Reports</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($role == ROLE_STUDENT) : ?>
            <div class="col-lg-6 col-xs-8">
                <a href="<?php echo base_url('elearning'); ?>">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $totalDocuments; ?></h3>
                            <p>Documents</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-8">
                <a href="<?php echo base_url('inventory'); ?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $totalInventory; ?></h3>
                            <p>Instruments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-table"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Useful Links</h3>
                    </div>
                    <div class="box-body table-responsive no-padding p-0">
                        <table class="table table-bordered table-hover table-head-fixed">
                            <thead>
                                <tr>
                                    <th width="3%">No.</th>
                                    <th width="15%">Title</th>
                                    <th width="10%">Link</th>
                                    <th width="10%">Added By</th>
                                    <th width="8%">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $counter = 0;
                if (!empty($linkRecords)) {
                  foreach ($linkRecords as $record) {
                    $counter++;
                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $record->title; ?></td>
                                    <td>
                                        <a href="<?php echo $record->url; ?>" target="_blank">
                                            <?php echo $record->url; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $record->name; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($record->date)); ?> </td>
                                </tr>
                                <?php
                  }
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
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
                if (!empty($documentRecords)) {
                  foreach ($documentRecords as $record) {
                    $counter++;
                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo date("d/m/Y H:i", strtotime($record->date)); ?></td>
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
                </div>
            </div>
        </div>
    </section>
</div>