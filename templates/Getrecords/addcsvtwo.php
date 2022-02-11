<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Getrecords'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="getrecords form content">
            <?php echo $this->Form->create($csvEntity, ['name' => 'add_post', 'class' => 'was-validated',
                'enctype' => 'multipart/form-data']) ?>
            <div class="form-group">
                <h4>Wybierz imię klienta</h4>
                <?php
                echo $this->Form->select('id', $clientsKeyValue);
                //echo $this->Form->control('id', $clientsKeyValue);
                ?>
            </div>
            <div class="form-group">
                <br>    </br>
                <h4>Załącz plik z danymi</h4>
                <?= $this->Form->control('csv_spreadsheet', ['type' => 'file', 'class' => 'form-control', 'required' => true]); ?>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Save</button>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
