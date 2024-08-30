<?php
if (!empty($chatList)) {
    foreach ($chatList as $chat_key => $chat_value) {
        $chat_type = ($chat_value->chat_user_id != $chat_user->id) ? 'is-me' : 'is-you';
        $date_time = ($chat_value->chat_user_id != $chat_user->id) ? 'time_date_send' : 'time_date';
        ?>
        <?php
        if ($chat_value->is_first) {
            ?>
			<div class="chat-sap">
				<div class="chat-sap-meta"><span><?php echo $this->lang->line('you_are_now_connected_on_chat') ?></span></div>
			</div>
            <?php
        } else {
            ?>
            <div class="chat <?php echo $chat_type; ?>">
				<div class="chat-content">
					<div class="chat-bubbles">
						<div class="chat-bubble">
							<div class="chat-msg">
								<?php echo $chat_value->message; ?>
							</div>
						</div>
					</div>
					<ul class="chat-meta">
						<li><?php echo $this->customlib->dateyyyymmddToDateTimeformat($chat_value->created_at); ?></li>
					</ul>
				</div>
            </div>
            <?php
        }
        ?>
        <?php
    }
}
?>

						