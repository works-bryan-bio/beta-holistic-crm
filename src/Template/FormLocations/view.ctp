
<section class="content-header">
    <h1><?= __('View Form Location') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($formLocation->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formLocation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($formLocation->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($formLocation->modified) ?></td>
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
    <div class="related">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Related Source Email Recipients') ?></h3>
            </div>
        </div>        
        <?php if (!empty($formLocation->source_email_recipients)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Source Id') ?></th>
                <th><?= __('Form Location Id') ?></th>
                <th><?= __('Emails') ?></th>
                <th><?= __('Fields') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formLocation->source_email_recipients as $sourceEmailRecipients): ?>
            <tr>
                <td><?= h($sourceEmailRecipients->id) ?></td>
                <td><?= h($sourceEmailRecipients->source_id) ?></td>
                <td><?= h($sourceEmailRecipients->form_location_id) ?></td>
                <td><?= h($sourceEmailRecipients->emails) ?></td>
                <td><?= h($sourceEmailRecipients->fields) ?></td>
                <td><?= h($sourceEmailRecipients->created) ?></td>
                <td><?= h($sourceEmailRecipients->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'SourceEmailRecipients', 'action' => 'view', $sourceEmailRecipients->id], ['class' => 'btn btn-info', 'escape' => false]) ?>

                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'SourceEmailRecipients', 'action' => 'edit', $sourceEmailRecipients->id], ['class' => 'btn btn-success', 'escape' => false]) ?>

                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'SourceEmailRecipients', 'action' => 'delete', $sourceEmailRecipients->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $sourceEmailRecipients->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
