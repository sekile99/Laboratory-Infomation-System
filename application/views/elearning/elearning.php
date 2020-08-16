<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> E-Learning Information
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <?php if ($role != ROLE_STUDENT) : ?>
                    <a class="btn btn-success" href="<?php echo base_url('viewSubmissions'); ?>"><i
                            class="fa fa-hand-o-right"></i> View Submissions</a>
                    <a class="btn btn-primary" href="<?php echo base_url('addDocument'); ?>"><i class="fa fa-plus"></i>
                        Add New</a>
                    <?php endif ?>
                    <?php if ($role == ROLE_STUDENT) : ?>
                    <a class="btn btn-success" href="<?php echo base_url('submitDocument'); ?>"><i
                            class="fa fa-book"></i> Submit Work</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Document List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url('inventory'); ?>" method="POST" id="searchList">
                                <div class="input-group">
                                    <input type="text" name="searchText" value="<?php echo $searchText; ?>"
                                        class="form-control input-sm pull-right" style="width: 150px;"
                                        placeholder="Search" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                    <th class="text-center" width="13%">Actions</th>
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
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-success"
                                            download="<?php echo str_replace('assets_uploads_documents_', 'lis_', $record->docUrl); ?>"
                                            href="<?php echo base_url($record->docUrl); ?>" title="Downloads"><i
                                                class="fa fa-download"></i></a>
                                        <?php if ($role != ROLE_STUDENT) { ?>
                                        <!--  <a class="btn btn-sm btn-info" href="<?php echo base_url('editODocument/' . $record->docId); ?>" title="Edit"><i class="fa fa-pencil"></i></a> -->
                                        <?php if ($record->userId == $_SESSION['userId']) : ?>
                                        <a class="btn btn-sm btn-danger deleteDocument" href="#"
                                            data-documentid="<?php echo $record->docId; ?>" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                        <?php endif ?>
                                        <?php } ?>
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
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>" charset="utf-8"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('ul.pagination li a').click(function(e) {
        e.preventDefault();
        var link = jQuery(this).get(0).href;
        var value = link.substring(link.lastIndexOf('/') + 1);
        jQuery("#searchList").attr("action", baseURL + "inventory/" + value);
        jQuery("#searchList").submit();
    });
});
</script>