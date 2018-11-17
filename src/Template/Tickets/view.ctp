<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h3><?= $ticket->type . ' #' . $ticket->id . ' - ' . $ticket->subject ?></h3>
      </div>
      <div class="x_content">
        <table class="table table-borderless">
            <tr>
                <th scope="row"><?= __('Filed By:') ?></th>
                <td><?= $ticket->user->first_name . ' ' . $ticket->user->last_name ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Assigned To:') ?></th>
                <td><?= h($ticket->branch->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Status') ?></th>
                <td><?= h($ticket->status) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Description') ?></th>
                <td><?= h($ticket->description) ?></td>
            </tr>
        </table>
        <br>
        <h4>Comments:</h4>
        <?php 
        if (count($ticket->t_reply) == 0) {
            echo "<div class='well'>No reply found...</div>";
        }
        foreach ($ticket->t_reply as $reply) { ?>
            <div class="well">
                <strong><?= $reply->user->first_name . ' ' . $reply->user->last_name ?></strong> <?= $reply->created ?> <br>
                <?= $reply->message ?>
            </div>
        <?php } ?>

        <?= $this->Form->create(''); ?>
        <?= $this->Form->hidden('user_id', ['value' => $auth['id']]); ?>
        <?= $this->Form->hidden('ticket_id', ['value' => $ticket->id]); ?>
        <?= $this->Form->textarea('message', ['placeholder' => 'Write a comment...', 'class' => 'form-control']); ?>
        <?= $this->Form->submit('submit', ['class' => 'col-md-12 btn btn-success']); ?>
        <?= $this->Form->end(); ?>
      </div>
    </div>
</div>
