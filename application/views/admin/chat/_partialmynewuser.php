<?php
$response_json = isJSON($new_user_list);
if ($response_json) {

    $userList = (json_decode($new_user_list));
    if (!empty($userList)) {
        foreach ($userList->chat_users as $user_key => $user_value) {
            //if (!empty($user_value->messages)) {
                $count_noti = getConnectionNotification($userList, $user_value->id);
                ?>
				
				<?php
				if ($user_value->user_details->image == "") {
					$img =  "uploads/staff_images/no_image.png";
				} else {
					$img = ($user_value->user_details->user_type == "staff") ? "uploads/staff_images/" . $user_value->user_details->image : base_url() . $user_value->user_details->image;
				}
				?>
				
				<li class="contact chat-item" data-chat-connection-id="<?php echo $user_value->id; ?>">
					<a class="chat-link chat-open current">
						<div class="chat-media user-avatar bg-purple">
							<span><img src="<?php echo $this->media_storage->getImageURL($img); ?>"></span>
						</div>
						<div class="chat-info">
							<div class="chat-from">
								<div class="name"><?php
                                echo $user_value->user_details->name;
                                echo ($user_value->user_details->user_type == "staff") ? " (" . $this->lang->line('staff') . ")" : " (" . $this->lang->line('student') . ")";
                                ?></div>
								<!--span class="time">Now</span-->
							</div>
							<div class="chat-context">
								<div class="text"><?php
                                if ($chat_user->id != $user_value->messages->chat_user_id) {
                                    echo "<span>" . $this->lang->line('you') . " </span>";
                                }
                                ?>:<?php echo $user_value->messages->message; ?></div>
								<div class="status delivered">
									 <?php
										if ($count_noti > 0) {
											?>
											<span class="chatbadge notification_count"><?php echo $count_noti; ?></span> 
											<?php
										} else {
											?>
											<span class="chatbadge notification_count displaynone">0</span> 
											<?php
										}
										?>
								</div>
							</div>
						</div>
					</a>
				</li><!-- .chat-item -->

                <?php
            //}
        }
    }
}

function getConnectionNotification($userList, $chat_connection_id) {
    if (!empty($userList->chat_user_notification)) {
        foreach ($userList->chat_user_notification as $notifiction_key => $notifiction_value) {
            if ($notifiction_value->chat_connection_id == $chat_connection_id) {
                return $notifiction_value->no_of_notification;
            }
        }
    }
    return 0;
}
?>