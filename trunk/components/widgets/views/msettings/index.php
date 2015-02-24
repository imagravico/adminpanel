<?php
use app\models\Message;
use app\models\MSetting;

?>
<div class="block">
    <!-- Message Title -->
    <div class="block-title">
        <h2><i class="fa fa-envelope"></i> Messages</h2>
    </div>
    <!-- END Message Title -->

	<span class="help-block">Activate automatically messages which will be sent to the client email address.</span>
	
    <!-- Message Content -->
    <div class="form-horizontal form-bordered" id="setting-messages">
        <?php
            $messages = Message::getMessageBelong($belong_to);
            if (!empty($messages)) {
                foreach ($messages as $key => $message) {
                    if (!empty($message->mschedule)) {

                        $checked = FALSE;
                        $msetting = MSetting::find()
                                    ->where(['clients_or_webs_id' => $idcow, 'belong_to' => $belong_to, 'messages_id' => $message->id])
                                    ->one();
                        if (isset($msetting))
                            $checked = TRUE;
        ?>
                        <div class="form-group">
                            <label class="col-md-6 control-label"><?= $message->subject ?></label>
                            <div class="col-md-6">
                                <label class="switch switch-primary">
                                    <input type="checkbox" id="product-status mswitch-<?php echo $message->id?>" name="product-status" class="switch-action" data-messages-id="<?php echo $message->id?>" data-belong-to="<?php echo $belong_to ?>" <?php if ($checked) echo 'checked'?>><span></span>
                                </label>
                            </div>
                        </div>
        <?php
                    }
                }
            }
        ?>
        
    </div>
    <!-- END Message Content -->
</div>