<style>
.profile-shown{
	padding-right : 0px !important;
}
</style>
<div class="nk-content p-0">
	<div class="nk-content-inner">
		<div class="nk-content-body">
			<div class="nk-chat">
				<div class="nk-chat-aside">
					<div class="nk-chat-aside-head">
						<div class="nk-chat-aside-user">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle">
									<!--div class="user-avatar">
										<img src="./images/avatar/b-sm.jpg" alt="">
									</div-->
									<h6 class="title"><?php echo $this->lang->line('chat_system'); ?></h6>
								</a>
							</div>
						</div><!-- .nk-chat-aside-user -->
						<ul class="nk-chat-aside-tools g-2">
							<li>
								<button class="btn btn-round btn-icon btn-success" id="addcontact" data-bs-toggle="modal" data-bs-target="#myModal"><em class="icon ni ni-plus"></em></button>
							</li>
						</ul><!-- .nk-chat-aside-tools -->
					</div><!-- .nk-chat-aside-head -->
					<div class="nk-chat-aside-body" data-simplebar>
						<input type="hidden" name="chat_connection_id" value="0">
                        <input type="hidden" name="chat_to_user" value="0">
                        <input type="hidden" name="last_chat_id" value="0">
						<!--div class="nk-chat-aside-search">
							<div class="form-group">
								<div class="form-control-wrap">
									<div class="form-icon form-icon-left">
										<em class="icon ni ni-search"></em>
									</div>
									<input type="text" class="form-control form-round" id="default-03" placeholder="Search by name">
								</div>
							</div>
						</div><!-- .nk-chat-aside-search -->
						<div class="nk-chat-list" id="contacts">
							<h6 class="title overline-title-alt">Messages</h6>
							<ul class="chat-list">
								
							</ul><!-- .chat-list -->
						</div><!-- .nk-chat-list -->
					</div>
				</div><!-- .nk-chat-aside -->
				<div class="nk-chat-body profile-shown">
					<div class="nk-chat-head">
						<ul class="nk-chat-head-info">
							<li class="nk-chat-body-close">
								<a href="#" class="btn btn-icon btn-trigger nk-chat-hide ms-n1"><em class="icon ni ni-arrow-left"></em></a>
							</li>
							<li class="nk-chat-head-user">
								<div class="user-card">
									<div class="user-avatar bg-purple contact-profile-img">
										<img src="<?php echo $this->media_storage->getImageURL('uploads/student_images/no_image.png'); ?>" alt="" />
									</div>
									<div class="user-info">
										<div class="lead-text contact-profile-name"><p><?php echo $this->lang->line('select_any_user_to_start_your_chat') ?></p></div>
										<!--div class="sub-text"><span class="d-none d-sm-inline me-1">Active </span> 35m ago</div-->
									</div>
								</div>
							</li>
						</ul>
						<!--div class="nk-chat-head-search">
							<div class="form-group">
								<div class="form-control-wrap">
									<div class="form-icon form-icon-left">
										<em class="icon ni ni-search"></em>
									</div>
									<input type="text" class="form-control form-round" id="chat-search" placeholder="Search in Conversation">
								</div>
							</div>
						</div><!-- .nk-chat-head-search -->
					</div><!-- .nk-chat-head -->
					<div class="nk-chat-panel messages" style="background-color:#edecef;" data-simplebar>
						
					</div><!-- .nk-chat-panel -->
					<div class="nk-chat-editor">
						<!--div class="nk-chat-editor-upload  ms-n1">
							<!--a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt" data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a>
							<div class="chat-upload-option" data-content="chat-upload">
								<ul class="">
									<li><a href="#"><em class="icon ni ni-img-fill"></em></a></li>
									<li><a href="#"><em class="icon ni ni-camera-fill"></em></a></li>
									<li><a href="#"><em class="icon ni ni-mic"></em></a></li>
									<li><a href="#"><em class="icon ni ni-grid-sq"></em></a></li>
								</ul>
							</div>
						</div-->
						<div class="nk-chat-editor-form message-input">
							<div class="form-control-wrap">
								<input type="text" class="form-control no-resize chat_input" style="border-radius: 20px;border:1px solid darkgray;" placeholder="Type your message..."/>
							</div>
						</div>
						<ul class="nk-chat-editor-tools g-2">
							<li>
								<button class="btn btn-round btn-success btn-icon input_submit"><em class="icon ni ni-arrow-up"></em></button>
							</li>
						</ul>
					</div><!-- .nk-chat-editor -->
				</div><!-- .nk-chat-body -->
			</div><!-- .nk-chat -->
		</div>
	</div>
</div>

<div id="myModal" class="modal fade zoom" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form id="addUser" action="<?php echo site_url('admin/chat/adduser') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title"><?php echo $this->lang->line('add_contact'); ?><small style="color:red;"> *</small></h4>
					<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <div id="custom-search-input">
                        <div>
                            <input type="text" class="search-query form-control" placeholder="<?php echo $this->lang->line('search'); ?>" />
                        </div>
                    </div>
                    <div class="usersearchlist">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    var timestamp = '<?php echo time(); ?>';
    var branch_base_url = '<?php echo $branch_base_url; ?>';
    var date_time_temp = "";
    function updateTime() {
        date_time_temp = js_yyyy_mm_dd_hh_mm_ss(Date(timestamp));
        timestamp++;
    }

$(document).on('input','.chat_input',function(){
     if ($.trim($(this).val()) == '') {
        $('.input_submit').prop('disabled', true);
    }else{
        $('.input_submit').prop('disabled', false);
    }
});

    $(document).on('click', '.input_submit', function (e) {
        message = $(".message-input input").val();
        if ($.trim(message) == '') {
            return false;
        }
        newChatMessage();
        e.preventDefault(); // To prevent the default
    });

    $(function () {
        setInterval(updateTime, 1000);
    });
    
    $(".messages").animate(
            {
                scrollTop: $(document).height()
            },
            "fast"
            );

    $("#profile-img").click(function () {
        $("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function () {
        $("#profile").toggleClass("expanded");
        $("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function () {
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        $(this).addClass("active");

        if ($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        }
        ;

        $("#status-options").removeClass("active");
    });

    var interval;
    var intervalchat;
    var intervalchatnew;
    $(document).on('keyup', '.search-query', function () {
        $this = $(this);
        var keyword = $(this).val();

        if (keyword.length >= 2) {

            $.ajax({
                type: "POST",
                url: base_url + 'admin/chat/searchuser',
                data: {'keyword': keyword},
                dataType: "JSON",
                beforeSend: function () {
                    $this.addClass('dropdownloading');

                },
                success: function (data) {
                    $('.usersearchlist').html("").html(data.page);
                    $this.removeClass('dropdownloading');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $this.removeClass('dropdownloading');
                },
                complete: function (data) {
                    $this.removeClass('dropdownloading');
                }
            })
        } else if (keyword.length >= 0) {
            $('.usersearchlist').html("")
        }
    });

    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: base_url + 'admin/chat/myuser',
            data: {},
            dataType: "JSON",
            beforeSend: function () {
                $('.chatloader').css({display: 'block'});
            },
            success: function (data) {
                $("#contacts ul").html(data.page);
                if (data.status === "1") {
                    clearInterval(intervalchat);
                    intervalchat = setInterval(getChatNotification, 15000);

                    clearInterval(intervalchatnew);
                    intervalchat = setInterval(mynewUser, 25000);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('.chatloader').css({display: 'none'});
            },
            complete: function (data) {
                $('.chatloader').css({display: 'none'});
            }
        });
    });

    $(document).on('click', '.contact', function () {
        var chat_connection_id = $(this).data('chatConnectionId');
        var $this = $(this);
        $.ajax({
            type: "POST",
            url: base_url + 'admin/chat/getChatRecord',
            data: {'chat_connection_id': chat_connection_id},
            dataType: "JSON",
            beforeSend: function () {
                $('.chatloader').css({display: 'block'});
                $(".chat_input").val("");
                $('.contact-profile-name').find('p').html($this.find('.name').text());
                $('.contact-profile-img').find('img').attr("src", $this.find('img').attr('src'));
                $this.addClass('active').siblings().removeClass('active');
            },
            success: function (data) {
                $this.find('span.notification_count').css("display", "none");
                $(".messages").html(data.page);
                $("input[name='chat_connection_id']").val(data.chat_connection_id);
                $("input[name='chat_to_user']").val(data.chat_to_user);
                $("input[name='last_chat_id']").val(data.user_last_chat.id);
                $('.messages').animate({
                    scrollTop: $('.messages')[0].scrollHeight}, "slow"
                        );
                clearInterval(interval);
                interval = setInterval(getChatsUpdates, 2000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('.chatloader').css({display: 'none'});
            },
            complete: function (data) {
                $('.chatloader').css({display: 'none'});
            }
        })
    });

    $(document).on('keydown', '.chat_input', function (e) {
        switch (e.which) {
            case 13:
                newChatMessage();
                break;
        }
    });

    function htmlEncode(str) {
        return String(str).replace(/[^\w. ]/gi, function (c) {
            return '&#' + c.charCodeAt(0) + ';';
        });
    }

    function newChatMessage() {
        message = htmlEncode($(".message-input input").val());
        //$('.input_submit').prop('disabled', true);
        if ($.trim(message) == '') {
            return false;
        }

        var chat_connection_id = $("input[name='chat_connection_id']").val();
        var chat_to_user = $("input[name='chat_to_user']").val();
        if (chat_connection_id > 0 && chat_to_user > 0) {

            $.ajax({
                type: "POST",
                url: base_url + 'admin/chat/newMessage',
                data: {'chat_connection_id': chat_connection_id, 'message': message, 'chat_to_user': chat_to_user, 'time': date_time_temp},
                dataType: "JSON",
                beforeSend: function () {

                },
                success: function (data) {
                    var last_chat_id = $("input[name='last_chat_id']").val(data.last_insert_id);
                    $('<div class="chat is-me"><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg">' + message + '</div></div></div><ul class="chat-meta"><li>' + date_time_temp + '</li></ul></div>').appendTo($('.messages'));
                    $('.chat_input').val(null);
                    $('.contact.active .preview').html('<span><?php echo $this->lang->line('you'); ?> </span>' + message);
                    $('.messages').animate({
                        scrollTop: $('.messages')[0].scrollHeight}, "slow");

                },
                error: function (jqXHR, textStatus, errorThrown) {

                },
                complete: function (data) {

                }
            })
        }
    };

    function getChatsUpdates() {
        var end_reach = false;
        var chat_connection_id = $("input[name='chat_connection_id']").val();
        var chat_to_user = $("input[name='chat_to_user']").val();
        var last_chat_id = $("input[name='last_chat_id']").val();
        $.ajax({
            type: "POST",
            url: base_url + 'admin/chat/chatUpdate',
            data: {'chat_connection_id': chat_connection_id, 'chat_to_user': chat_to_user, 'last_chat_id': last_chat_id},
            dataType: "JSON",
            beforeSend: function () {

            },
            success: function (data) {
                var scrollTop = $('.messages').scrollTop();
                if (scrollTop + $('.messages').innerHeight() >= $('.messages')[0].scrollHeight) {
                    end_reach = true;
                }
                $("input[name='last_chat_id']").val(data.user_last_chat.id);
                $('.messages').append(data.page);
                if (end_reach) {
                    $('.messages').animate({
                        scrollTop: $('.messages')[0].scrollHeight}, "slow");

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            },
            complete: function (data) {

            }
        })
    }

    $(document).on('click', '.usersearchlist ul li', function () {
        $this = $(this);
        $this.addClass('active').siblings().removeClass('active');
    });

    $("#addUser").submit(function (event) {
        event.preventDefault();
        var img = "";
        var userrecord = $('.usersearchlist').find("ul li.active");
        var userId = userrecord.data('userId');
        var userType = userrecord.data('userType');
        var $form = $(this),
                url = $form.attr('action');
        var $button = $form.find("button[type=submit]:focus");
        $.ajax({
            type: "POST",
            url: url,
            data: {'user_type': userType, 'user_id': userId},
            dataType: "JSON",

            beforeSend: function () {
                $button.button('loading');

            },
            success: function (data) {
                if (data.status == 0) {
                    var message = "";
                    $.each(data.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {

                    $("#contacts ul").prepend(newUserLi(data.new_user, data.chat_connection_id)).find('li').addClass('active').siblings().not('li:first').removeClass('active');
                    $(".messages").html(data.chat_records);
                    $("input[name='chat_connection_id']").val(data.chat_connection_id);
                    $("input[name='chat_to_user']").val(data.new_user.chat_user_id);
                    $("input[name='last_chat_id']").val(data.user_last_chat.id);
                    $(".chat_input").val("");

                    if (data.new_user.user_type == "student") {
                        new_user_type = " (Student)";
                        username = data.new_user.name + new_user_type;
                        img = branch_base_url + data.new_user.image;
                    } else if (data.new_user.user_type == "staff") {
                        new_user_type = " (Staff)";
                        username = data.new_user.name + new_user_type;
                        img = branch_base_url + "./uploads/staff_images/" + data.new_user.image;
                    }
                    $('.contact-profile-name').find('p').html(username);
                    
                    $('.contact-profile-img').find('img').attr("src", img);
                    $('.messages').animate({
                        scrollTop: $('.messages')[0].scrollHeight}, "slow"
                            );
                    clearInterval(interval);
                    interval = setInterval(getChatsUpdates, 2000);

                    $('#myModal').modal('hide');
                    successMsg(data.message);
                }
                $button.button('reset');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $button.button('reset');
            },
            complete: function (data) {
                $button.button('reset');
            }
        });

    });
    
    $('#myModal').on('hidden.bs.modal', function (e) {
        $('.usersearchlist').html("");
        $('#addUser').trigger("reset");
    });

    function newUserLi(user_array, chat_connection_id) {
        var new_user_type = "Staff";
        var img = "";
        if (user_array.user_type == "student") {
            new_user_type = "Student";
            img = branch_base_url + user_array.image;
        } else if (user_array.user_type == "staff") {
            new_user_type = "Staff";
            img = branch_base_url + "./uploads/staff_images/" + user_array.image;

        }
        var newli = "<li class='contact chat-item' data-chat-connection-id='" + chat_connection_id + "'>";
        newli += "<a class='chat-link chat-open current'><div class='chat-media user-avatar bg-purple'>";
        newli += "<span><img src='" + img + "' alt=''></span></div>";
        newli += "<div class='chat-info'><div class='chat-from'>";
        newli += "<div class='name'>" + user_array.name + " (" + new_user_type + ")" + "</div>";
        newli += "</div><div class='chat-context'><div class='status delivered'>";
        newli += "0</div></div></div></a>";
        newli += "</li>";
        return newli;
    }

    function getChatNotification() {
        $.ajax({
            type: "POST",
            url: base_url + 'admin/chat/mychatnotification',
            data: {},
            dataType: "JSON",
            beforeSend: function () {

            },
            success: function (data) {
                var active_user = $('#contacts').find("ul li.active");
                if (data.notifications.length > 0) {
                    $.each(data.notifications, function (index, value) {
                        if (active_user.data('chatConnectionId') != value.chat_connection_id) {

                            $('#contacts').find("ul li[data-chat-connection-id='" + value.chat_connection_id + "']").find('span.notification_count').text(value.no_of_notification).css("display", "block");
                        }
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            },
            complete: function (data) {

            }
        })
    }

    function js_yyyy_mm_dd_hh_mm_ss(now) {

        var date_format = '<?php echo $this->customlib->getSchoolDateFormat() ?>';
        var new_str = date_format;
        var month_String = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        now = new Date();
        var day = String(now.getDate()).padStart(2, '0');
        var month = String(now.getMonth() + 1).padStart(2, '0'); //January is 0!
        var year = now.getFullYear();
        hour = "" + now.getHours();
        if (hour.length == 1) {
            hour = "0" + hour;
        }
        minute = "" + now.getMinutes();
        if (minute.length == 1) {
            minute = "0" + minute;
        }
        second = "" + now.getSeconds();
        if (second.length == 1) {
            second = "0" + second;
        }
        var inputAttr = {};
        inputAttr["m"] = month;
        inputAttr["M"] = month_String[now.getMonth()];
        inputAttr["d"] = day;
        inputAttr["Y"] = year;
        for (var key in inputAttr) {
            if (!inputAttr.hasOwnProperty(key)) {
                continue;
            }
            new_str = new_str.replace(key, inputAttr[key]);
        }
        return new_str + " " + hour + ":" + minute + ":" + second;
    }

    function mynewUser() {
        var users_Array = []; // more efficient than new Array()
        $("#contacts ul li").each(function (n) {
            var as = $(this).data('chatConnectionId');
            users_Array.push(as);
        });

        $.ajax({
            type: "POST",
            url: base_url + 'admin/chat/mynewuser',
            data: {'users': users_Array},
            dataType: "JSON",
            beforeSend: function () {

            },
            success: function (data) {
                $("#contacts ul").prepend(data.new_user_list);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            },
            complete: function (data) {

            }
        })
    }
</script>