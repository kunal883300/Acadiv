
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/editors/summernote.css?ver=3.2.3">
<script src="<?php echo base_url(); ?>assets/js/libs/editors/summernote.js?ver=3.2.3"></script>
<script src="<?php echo base_url(); ?>assets/js/editors.js?ver=3.2.3"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/dragula.js?ver=3.2.3"></script>
<script src="<?php echo base_url(); ?>assets/js/example-dragula.js?ver=3.2.3"></script>

<script src="<?php echo base_url(); ?>assets/js/libs/fullcalendar.js?ver=3.2.3"></script>
<!--script src="<?php echo base_url(); ?>assets/js/apps/calendar.js?ver=3.2.3"></script-->

<footer class="main-footer">
    &copy;  <?php echo date('Y'); ?>
    <?php echo $this->customlib->getAppName(); ?>
</footer>
<div class="control-sidebar-bg"></div>
		</div><!-- close nk-wrap -->
	</div><!-- close nk-main -->
</div><!-- close nk--root -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<?php
$language      = $this->customlib->getLanguage();
$language_name = $language["short_code"];

$feesinbackdate = $this->customlib->getfeesinbackdate();

?>

<!--link href="<?php echo base_url(); ?>backend/toast-alert/toastr.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>backend/toast-alert/toastr.js"></script-->
<!--script src="<?php echo base_url(); ?>backend/bootstrap/js/bootstrap.min.js"></script-->
<!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/select2/select2.min.css"-->
<!--script src="<?php echo base_url(); ?>backend/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script-->
<!--script src="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.js"></script-->
<script src="<?php echo base_url(); ?>backend/dist/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript">
    $('body').tooltip({
        selector: '[data-toggle]',
        trigger: 'click hover',
        placement: 'top',
        delay: {
            show: 50,
            hide: 400
        }
    })
</script>
<!--language js-->
<!--script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/bootstrap-select.min.js"></script-->

<script type="text/javascript">
    /*$(function () {
        $('.languageselectpicker').selectpicker();
    });*/
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".studentsidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('.studentsideclose, .overlay').on('click', function () {
            $('.studentsidebar').removeClass('active');
            $('.overlay').fadeOut();
        });

        $('#sidebarCollapse').on('click', function () {
            $('.studentsidebar').addClass('active');
            $('.overlay').fadeIn();
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<!--script src="<?php echo base_url(); ?>backend/plugins/iCheck/icheck.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script-->
<?php
if ($language_name != 'en') {
    ?>
    <!--script src="<?php echo base_url(); ?>backend/plugins/datepicker/locales/bootstrap-datepicker.<?php echo $language_name ?>.js"></script-->

<?php }?>

<!--script src="<?php echo base_url(); ?>backend/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/fastclick/fastclick.min.js"></script>
<script src="<?php echo base_url(); ?>backend/dist/js/app.min.js"></script-->
<!--nprogress-->
<!--script src="<?php echo base_url(); ?>backend/dist/js/nprogress.js"></script-->
<!--file dropify-->
<!--script src="<?php echo base_url(); ?>backend/dist/js/dropify.min.js"></script-->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.buttons.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jszip.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/pdfmake.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/vfs_fonts.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.html5.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.print.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.colVis.min.js" ></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.responsive.min.js" ></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/ss.custom.js" ></script>

<script src="<?php echo base_url(); ?>assets/js/libs/datatable-btns.js?ver=3.2.3"></script>

</body>
</html>
<!-- jQuery 3 -->
<!--script src="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.min.js"></script-->
<!--script src="<?php echo base_url() ?>backend/fullcalendar/dist/locale-all.js"></script-->
<script type="text/javascript">

    $(document).ready(function () {

<?php
if ($this->session->flashdata('success_msg')) {
    ?>
            successMsg("<?php echo $this->session->flashdata('success_msg'); ?>");
            $this->session->unset_userdata('success_msg');
    <?php
} else if ($this->session->flashdata('error_msg')) {
    ?>
            errorMsg("<?php echo $this->session->flashdata('error_msg'); ?>");
            $this->session->unset_userdata('error_msg');
    <?php
} else if ($this->session->flashdata('warning_msg')) {
    ?>
            infoMsg("<?php echo $this->session->flashdata('warning_msg'); ?>");
            $this->session->unset_userdata('warning_msg');
    <?php
} else if ($this->session->flashdata('info_msg')) {
    ?>
            warningMsg("<?php echo $this->session->flashdata('info_msg'); ?>");
            $this->session->unset_userdata('info_msg');
    <?php
}
?>
    });

    function complete_event(id, status) {
        $.ajax({
            url: "<?php echo site_url("admin/calendar/markcomplete/") ?>" + id,
            type: "POST",
            data: {id: id, active: status},
            dataType: 'json',
            success: function (res)
            {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function (index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(res.message);
                    window.location.reload(true);
                }
            }
        });
    }

    function markc(id) {
        $('#newcheck' + id).change(function () {
            if (this.checked) {
                complete_event(id, 'yes');
            } else {
                complete_event(id, 'no');
            }
        });
    }

</script>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="row">
    <div class="modal fade zoom" id="sessionModal" tabindex="-1" role="dialog" aria-labelledby="sessionModalLabel">
        <form action="<?php echo site_url('admin/admin/activeSession') ?>" id="form_modal_session" class="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="sessionModalLabel"><?php echo $this->lang->line('current_session'); ?></h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
                    </div>
                    <div class="modal-body sessionmodal_body">
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary submit_session" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('layout/routine_update');?>
<?php $this->load->view('layout/addon_update');?>
<?php  if (($this->module_lib->hasModule('multi_branch') && $this->module_lib->hasActive('multi_branch')) || $this->db->multi_branch)  { ?>
<?php $this->load->view('layout/multi_branch');?>
<?php } ?>

<script type="text/javascript">
    var calendar_date_time_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'DD', 'm' => 'MM', 'M' => 'MMM', 'Y' => 'YYYY']) ?>';

    var datetime_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(true, true), ['d' => 'DD', 'm' => 'MM', 'Y' => 'YYYY', 'H' => 'hh', 'i' => 'mm']) ?>';

    var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy', 'M' => 'M']) ?>';
	var language_format = '<?php echo $language_name ?>';

    function savedata(eventData) {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/calendar/saveevent',
            type: 'POST',
            data: eventData,
            dataType: "json",
            success: function (msg) {
                alert(msg);

            }
        });
    }

    $calendar = $('#calendar');
    var base_url = '<?php echo base_url() ?>';
    today = new Date();
    y = today.getFullYear();
    m = today.getMonth();
    d = today.getDate();
    var viewtitle = 'month';
    var pagetitle = "<?php
if (isset($title)) {
    echo $title;
}
?>";

    if (pagetitle == "Dashboard") {
        viewtitle = 'agendaWeek';
    }

   /* $('#calendar').fullCalendar({
        viewRender: function (view, element) {

        },

        header: {
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
            left: 'prev,next,today'
        },
        firstDay: start_week,
        defaultDate: today,
        defaultView: viewtitle,
        selectable: true,
        selectHelper: true,
        views: {
            month: {// name of view
                titleFormat: 'MMMM YYYY'
                        // other view-specific options here
            },
            week: {
                titleFormat: " MMMM D YYYY"
            },
            day: {
                titleFormat: 'D MMM, YYYY'
            }
        },
        timezone: 'UTC',
        draggable: false,
        locale: '<?php echo $language_name ?>',
        editable: false,
        eventLimit: false, // allow "more" link when too many events

        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: {
            url: base_url + 'admin/calendar/getevents'

        },

        eventRender: function (event, element) {

            element.attr('title', event.title);
            element.attr('onclick', event.onclick);
            element.attr('data-toggle', 'tooltip');
            if ((!event.url) && (event.event_type != 'task')) {
                element.attr('title', event.title + '-' + event.description);
                element.click(function () {
                    view_event(event.id);
                });
            }

        },
        dayClick: function (date, jsEvent, view) {
           console.log('Clicked on the entire day: ' + date.format());


<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_add')) {?>
                var newEventModal= $('#newEventModal');
                $("#input-field").val('');
                $("#desc-field").text('');
                var event_start_from = new Date(date);
                console.log(event_start_from.toISOString());
                $('.event_from',newEventModal).data("DateTimePicker").date(event_start_from);
                $('.event_to',newEventModal).data("DateTimePicker").date(event_start_from);
                $('#newEventModal').modal('show');

<?php
}?>
            return false;
        }

    });*/

    function view_event(id) {

        $('.selectevent').find('.cpicker-big').removeClass('cpicker-big').addClass('cpicker-small');
        var base_url = '<?php echo base_url() ?>';
        if (typeof (id) == 'undefined') {
            return;
        }
        $.ajax({
            url: base_url + 'admin/calendar/view_event/' + id,
            type: 'POST',
            //data: '',
            dataType: "json",
            success: function (msg) {

                $("#event_title").val(msg.event_title);
                $("#event_desc").text(msg.event_description);

                $('#eventid').val(id);
                if (msg.event_type == 'public') {
                    $('input:radio[name=eventtype]')[0].checked = true;

                } else if (msg.event_type == 'private') {
                    $('input:radio[name=eventtype]')[1].checked = true;

                } else if (msg.event_type == 'sameforall') {
                    $('input:radio[name=eventtype]')[2].checked = true;

                } else if (msg.event_type == 'protected') {
                    $('input:radio[name=eventtype]')[3].checked = true;

                }
                //===========

                var __viewModal=$('#viewEventModal');
 var event_start_from = new Date(msg.start_date);
 $('.event_from',__viewModal).data("DateTimePicker").date(event_start_from);

  var event_end_to = new Date(msg.end_date);
 $('.event_to',__viewModal).data("DateTimePicker").date(event_end_to);
                //============

                $("#event_color").val(msg.event_color);
                $("#delete_event").attr("onclick", "deleteevent(" + id + ",'Event')");
                $("#" + msg.colorid).removeClass('cpicker-small').addClass('cpicker-big');
                $('#viewEventModal').modal('show');
            }
        });
    }

    $(document).ready(function (e) {
        $("#addevent_form").on('submit', (function (e) {

            e.preventDefault();

            $(".submit_addevent").prop("disabled", true);

            $.ajax({
                url: "<?php echo site_url("admin/calendar/saveevent") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {

                    if (res.status == "fail") {

                        var message = "";
                        $.each(res.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);

                        window.location.reload(true);
                    }
                    $(".submit_addevent").prop("disabled", false);
                }
            });
        }));
    });

    $(document).ready(function (e) {
        $("#editEventForm").on('submit', (function (e) {

            e.preventDefault();
            $(".submit_update").prop("disabled", true);
            $.ajax({
                url: "<?php echo site_url("admin/calendar/updateevent") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {
                    if (res.status == "fail") {
                        var message = "";
                        $.each(res.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);
                        window.location.reload(true);
                    } $(".submit_update").prop("disabled", false);
                }
            });
        }));
    });

    function deleteevent(id, msg) {
        if (typeof (id) == 'undefined') {
            return;
        }
		$.ajax({
			url: base_url + 'admin/calendar/delete_event/' + id,
			type: 'POST',
			dataType: "json",
			success: function (res) {
				if (res.status == "fail") {
					errorMsg(res.message);
				} else {
					successMsg(msg + " <?php echo $this->lang->line('delete_message'); ?>");
					window.location.reload(true);
				}
			}
		})
    }

    $("body").on('click', '.cpicker', function () {
        var color = $(this).data('color');
        // Clicked on the same selected color
        if ($(this).hasClass('cpicker-big')) {
            return false;
        }

        $(this).parents('.cpicker-wrapper').find('.cpicker-big').removeClass('cpicker-big').addClass('cpicker-small');
        $(this).removeClass('cpicker-small', 'fast').addClass('cpicker-big', 'fast');
        if ($(this).hasClass('kanban-cpicker')) {
            $(this).parents('.panel-heading-bg').css('background', color);
            $(this).parents('.panel-heading-bg').css('border', '1px solid ' + color);
        } else if ($(this).hasClass('calendar-cpicker')) {
            $("body").find('input[name="eventcolor"]').val(color);
        }
    });

    $(document).ready(function () {
        moment.lang('en', {
          week: { dow: start_week }
        });

        /*$("body").delegate(".date", "focusin", function () {
            $(this).datepicker({
                todayHighlight: false,
                format: date_format,
                autoclose: true,
                weekStart : start_week,
                language: language_format
            });
        });*/

        $("body").delegate(".datetime", "focusin", function () {
            $(this).datetimepicker({
                format: calendar_date_time_format + ' hh:mm a'

            });
        });

        $('body').on('focus',".date_fee", function(){
        $(this).datepicker({
            format: date_format,
            autoclose: true,
            language: '<?php echo $language_name; ?>',
            endDate: '+0d',
            startDate: '<?php if ($feesinbackdate == 0) {echo "-0m";}
;?>',
            weekStart : start_week,
            todayHighlight: true
        });
      });

        /*$('.datetime_twelve_hour').datetimepicker({
               format:  calendar_date_time_format + ' hh:mm a'
        });*/


            /*$("#event_date").daterangepicker({
            timePickerIncrement: 5,
            locale: {
            format: calendar_date_time_format
            }
           });

///================

        $('.event_from').datetimepicker({
               format:  calendar_date_time_format + ' hh:mm A',
        });

        $('.event_to').datetimepicker({
               format:  calendar_date_time_format + ' hh:mm A',
        });*/

//==============

    });

    function loadDate() {

        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';

        $('.date').datetimepicker({
            format: datetime_format,
            locale:
                    '<?php echo $language_name ?>',

        });
    }

    // showdate('this_year');

    function showdate(type) {

<?php
if (isset($_POST['date_from']) && $_POST['date_from'] != '' && isset($_POST['date_to']) && $_POST['date_to'] != '') {
    ?>
            var date_from = '<?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->datetostrtotime($_POST['date_from'])); ?>';
            var date_to = '<?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->datetostrtotime($_POST['date_to'])); ?>';


    <?php
} else {
    ?>
            var date_from = '<?php echo date($this->customlib->getSchoolDateFormat()); ?>';
            var date_to = '<?php echo date($this->customlib->getSchoolDateFormat()); ?>';
    <?php
}
?>

        if (type == 'period') {

            $.ajax({
                url: base_url + 'Report/get_betweendate/' + type,
                type: 'POST',
                data: {date_from: date_from, date_to: date_to},
                success: function (res) {

                    $('#date_result').html(res);

                    loadDate();
                }

            });

        } else {
            $('#date_result').html('');
        }

    }
</script>
<script type="text/javascript">
    $(document).on('change','#currencySwitcher',function(e){
            $.ajax({
                type: 'POST',
                url: baseurl+'admin/currency/change_currency',
                data: {currency_id: $(this).val()},
                dataType: 'JSON',
                beforeSend: function() {

                },
                success: function(data) {

                    successMsg(data.message);
                    if(data.status){

                  window.location.reload('true');
                    }
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");

                },
                complete: function() {

                }
            });
    });

    $calendar_event = $('#calendar_event');

   /* $calendar_event.fullCalendar({
        viewRender: function (view, element) {

        },

        header: {
            center: 'title',
            right: '',
            left: 'prev,next'
        },
        firstDay: start_week,
        displayEventTime : false,
        defaultDate: today,
        defaultView: viewtitle,
        selectable: true,
        selectHelper: true,
        views: {
            month: {// name of view
                titleFormat: 'MMMM YYYY'
                        // other view-specific options here
            }
        },
        timezone: 'UTC',
        draggable: false,
        locale: '<?php echo $language_name ?>',
        editable: false,
        eventLimit: false, // allow "more" link when too many events

        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: {
            url: base_url + 'admin/alumni/getevent'

        },

        eventRender: function (event, element) {

            element.attr('title', event.title);
            element.attr('data-toggle', 'tooltip');
            element.click(function () {

                view_event_data(event.id);
            });
        }

    });*/
</script>

<script>
    function set_languages(lang_id){
        $.ajax({
        type: "POST",
        url: base_url + "admin/language/user_language/"+lang_id,
        data: {},
        success: function (data) {
            successMsg("<?php echo $this->lang->line('status_change_successfully'); ?>");
            window.location.reload('true');
        }
        });
    }
	
	var $cat = $('.category');
	var $li = $cat.find('li');
	function myFunction(){
		 var inputValue = document.getElementById("myInput").value;
		  var rgx = new RegExp(inputValue, "i"); // Case insensitive
		  // Handle LI elements visibility first
		  $li.show().filter(function() {
			return ! rgx.test($(this).text())
		  }).hide();
		  
		  // Then handle .category wrappers
		  $cat.show().filter(function() {
			return ! $(this).find("li:visible").length;
		  }).hide();

	}
	
	
	
	var $side_cat = $('.side_category');
	var $side_li = $side_cat.find('li');
	
	function searchFunction(){
		 var inputValue = document.getElementById("searchInput").value;
		 var search_rgx = new RegExp(inputValue, "i"); // Case insensitive
		  // Handle LI elements visibility first
		  $side_li.show().filter(function() {
			  if(!search_rgx.test($(this).text())){
				  $(this).removeClass('li_visible');
			  }else{
				   $(this).addClass('li_visible');
			  }
			return ! search_rgx.test($(this).text())
		  }).hide();
		  
		  // Then handle .category wrappers
		  $side_cat.show().filter(function() {
			  if($(this).find(".li_visible").length){
				  $side_cat.addClass('active');
			  }
			  if(inputValue.length == 0){
				 $side_cat.removeClass('active');
			 }
			return ! $(this).find(".li_visible").length;
		  }).hide();
		  
		/*
		$('.side_category li').each(function() {
            var menuItemText = $(this).text().toLowerCase();
            if (menuItemText.includes(inputValue)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
		*/

	}
	
	
	// Drag Container
  var dragContainer = document.querySelector("#dragContainer");
  var drake = dragula([dragContainer]);
  
  function getCurrentOrder() {
		var items = dragContainer.children;
		var itemTexts = [];

		// Iterate over the items and store their text content in the array
		for (var i = 0; i < items.length; i++) {
			itemTexts.push(items[i]);
		}

		return itemTexts;
	}
  
	// Log all items in the drag-and-drop container
	function logItems() {
		
		var data = $(this).sortable('toArray');
		/*$.ajax({
			type: "POST",
			url: base_url + "admin/customfield/updateorder",
			data: {"items": data, "belong_to": record_name},
			dataType: "json",

			beforeSend: function () {
				$('#fade,#modal').show();
			},
			success: function (data) {
				if (data.status) {
					successMsg(data.msg);
				} else {
					errorMsg(data.msg);
				}
				$('#fade,#modal').css({'display': 'none'});
			},
			error: function (xhr) { // if error occured
				alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
				$('#fade,#modal').css({'display': 'none'});
			},
			complete: function () {
				$('#fade,#modal').css({'display': 'none'});
			}
		});
		
		var items = getCurrentOrder();
		console.log("Items in the drag-and-drop container:");
		for (var i = 0; i < items.length; i++) {
			console.log(items[i].textContent);
		}*/
	}

	// Call logItems when any changes happen in the container
	drake.on('drag', logItems);
	//drake.on('drop', logItems);

	// Log items initially
	logItems();

	
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66aca8a71601a2195b9fe6fa/1i4975m4m';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
