<section class="content-header">
    <h1><?= __('Edit Source Email Recipient') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-gear'></i>" . __('Source Email Recipients'), ['action' => 'index'],['escape' => false]) ?></li>
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
                    <?= $this->Form->create($sourceEmailRecipient,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                                                            echo "
                                    <div class='form-group'>
                                        <label for='source_id' class='col-sm-2 control-label'>" . __('Source Id') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('source_id', ['class' => 'form-control', 'id' => 'source_id', 'label' => false, 'options' => $sources]);                 
                                    echo " </div></div>";    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='form_location_id' class='col-sm-2 control-label'>" . __('Form Location Id') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('form_location_id', ['class' => 'form-control', 'id' => 'form_location_id', 'label' => false, 'options' => $formLocations]);                 
                                    echo " </div></div>";    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='emails' class='col-sm-2 control-label'>" . __('Emails') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('emails', ['class' => 'form-control', 'id' => 'emails', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='fields' class='col-sm-2 control-label'>" . __('Fields') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('fields', ['class' => 'form-control', 'id' => 'fields', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                ?>
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