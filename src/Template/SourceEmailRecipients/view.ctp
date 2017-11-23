
<section class="content-header">
    <h1><?= __('View Source Email Recipient') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Source') ?></th>
            <td><?= $sourceEmailRecipient->has('source') ? $this->Html->link($sourceEmailRecipient->source->name, ['controller' => 'Sources', 'action' => 'view', $sourceEmailRecipient->source->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Form Location') ?></th>
            <td><?= $sourceEmailRecipient->has('form_location') ? $this->Html->link($sourceEmailRecipient->form_location->name, ['controller' => 'FormLocations', 'action' => 'view', $sourceEmailRecipient->form_location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sourceEmailRecipient->id) ?></td>
        </tr>
    <tr>
        <th><?= __('Emails') ?></th>
        <td><?= $this->Text->autoParagraph(h($sourceEmailRecipient->emails)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Fields') ?></th>
        <td><?= $this->Text->autoParagraph(h($sourceEmailRecipient->fields)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($sourceEmailRecipient->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($sourceEmailRecipient->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
</section>
