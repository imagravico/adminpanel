<!-- checklist edition modal -->
<div id="modal-checklist-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-list"></i> Checklist</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="checklist-content form-horizontal form-bordered">
                    
                    <div class="form-group">
                        <div id="InputsWrapper">
                            
                        </div>
                    </div>  
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default btn-cl-close" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm btn-primary save-checklist" data-belong-to="<?php echo $belong_to; ?>" data-cowid="<?php echo \Yii::$app->request->get('id'); ?>">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>