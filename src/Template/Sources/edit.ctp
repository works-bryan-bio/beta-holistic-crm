<style>
.form-caption{
    background-color: #3C8DBC;
    color:#ffffff;
    padding: 5px;
}
.box-header{
    background-color: #222D32;
}
.fields-list{
    list-style: none;
}
.fields-list li{
    display: inline-block;
    width:230px;
    margin: 2px;
}
</style>
<section class="content-header">
    <h1><?= __('Edit Source') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-gear'></i>" . __('Sources'), ['action' => 'index'],['escape' => false]) ?></li>
        <li class="active"><?= __('Edit') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header">

                </div>
                <div class="box-body">
                    <?= $this->Form->create($source,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                            echo "
                            <div class='form-group'>
                                <label for='name' class='col-sm-2 control-label'>" . __('Name') . "</label>
                                <div class='col-sm-6'>";
                                echo $this->Form->input('name', ['class' => 'form-control', 'id' => 'name', 'label' => false]);                
                            echo " </div></div>";  
                        ?>
                        <h3 class="form-caption">Form Locations</h3>
                        <div class="box-body">
                        <?php foreach($formLocations as $fl){ ?>
                            <div class="box-group" id="accordion">                                
                                <?php $tabId = "collapse-" . $fl->id; ?>
                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion" style="color:#ffffff !important;" href="#<?php echo $tabId; ?>"><?php echo $fl->name; ?></a>
                                    </h4>
                                  </div>
                                  <div id="<?php echo $tabId; ?>" class="panel-collapse collapse out">
                                    <div class="box-body">
                                        <div class='form-group'>
                                            <label for='email' class='col-sm-2 control-label'>Emails</label>
                                            <div class="col-sm-6">
                                                <input name="emails[<?php echo $fl->id; ?>]" type="text" class="form-control tags-emails" data-role="tagsinput" />
                                            </div>
                                        </div>                                      
                                        <div class="col-sm-12" style="padding:0px;">
                                            <p class="form-caption">Fields</p>
                                            <ul class="fields-list">
                                                <?php foreach($fields as $key => $f){ ?>
                                                    <?php 
                                                        $is_checked = '';
                                                        if( in_array($key, $email_fields[$fl->id]) ){
                                                            $is_checked = 'checked';
                                                        }
                                                    ?>
                                                    <li><label class="checkbox"><input class="" name="fields[<?php echo $fl->id; ?>][<?php echo $key; ?>]" value="<?php echo $f; ?>" type="checkbox" <?php echo $is_checked; ?> /> <?php echo $f; ?></label></li>
                                                <?php } ?>
                                            </ul>                                            
                                        </div>
                                    </div>
                                  </div>                                      
                            </div>
                        <?php } ?>                      
                        </div>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">                            
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue adding'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>                            
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>