<div class="messages view">
    <h2><?php 
    $created = new DateTime($message['Message']['created']);    
    echo h($message['Message']['title']); ?></h2><?php echo " ".'<span class="label label-success">'.$created->format('d/m/Y').'</span>'; ?>
    <dl>
        <dt></dt>
        <dd>
            <?php echo ($message['Message']['content']); ?>
            &nbsp;
        </dd>

    </dl>
</div>
