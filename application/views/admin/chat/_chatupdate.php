<?php
if (!empty($updated_chat)) {
    foreach ($updated_chat as $chat_key => $chat_value) {
        $chat_type = ($chat_value->chat_user_id == $chat_user_id) ? 'is-me' : 'is-you';
        $date_time = ($chat_value->chat_user_id == $chat_user_id) ? 'time_date_send' : 'time_date';
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
					<li class="<?php echo $date_time; ?>"> <?php echo $this->customlib->dateyyyymmddToDateTimeformat($chat_value->created_at); ?></li>
				</ul>
			</div>
        </div>

        <?php
    }
}
?>