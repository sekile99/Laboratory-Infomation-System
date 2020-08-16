<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Student's Submission Information
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body table-responsive no-padding p-0">
                  <table class="table table-bordered table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date/Time</th>
                            <th>Title</th>
                            <th>Objectives</th>
                            <th>Results</th>
                            <th>Submissions</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        if(!empty($subRecords)){
                            foreach($subRecords as $record){
                            $counter++;
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo date("d/m/Y H:m:s", strtotime($record->date)); ?></td>
                            <td><?php echo $record->title; ?></td>
                            <td><?php echo $record->objectives; ?></td>
                            <td><?php echo $record->results; ?></td>
                            <td><?php echo $record->submission; ?></td><!-- Instructor -->
                            <?php if($role != ROLE_STUDENT){ ?>
                            <td class="text-center"> 
                                <a class="btn btn-sm btn-success" download="<?php echo $record->title; ?>" href="<?php echo base_url($record->docUrl); ?>" title="Downloads"><i class="fa fa-download"></i>
                            </td>
                            <?php } ?>
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
    });
</script>