<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-table"></i> Inventory Information
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url('addInventory'); ?>">
                        <i class="fa fa-plus"></i>
                        Add New
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Inventory List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url('inventory'); ?>" method="POST" id="searchList">
                                <div class="input-group">
                                    <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search | scan barcode" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                    <?php if ($role == ROLE_MANAGER) : ?>
                                        <th class="text-center" width="10%">Actions</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                if (!empty($inventoryRecords)) {
                                    foreach ($inventoryRecords as $record) {
                                        $counter++;
                                ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $record->inventoryName; ?></td>
                                            <td><?php echo $record->inventoryType;  ?></td>
                                            <td><?php echo $record->barcode; ?></td>
                                            <td><?php echo $record->inventorySize; ?></td>
                                            <td><?php echo $record->count; ?></td>
                                            <?php if ($role == ROLE_MANAGER) : ?>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-info" href="<?php echo base_url('editOInventory/' . $record->inventoryId); ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-sm btn-danger deleteInventory" href="#" data-inventoryid="<?php echo $record->inventoryId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            <?php endif ?>
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