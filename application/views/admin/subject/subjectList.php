<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>

<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
   
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('subject', 'can_add')) {
                ?>     
                   
                <div class="col-md-4">    
                <div class="card card-bordered h-90 " >
                        <div class="card-inner">        
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('add_subject'); ?></h5>
                            <hr>
                        </div>
                        <form id="form1" action="<?php echo site_url('admin/subject') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg');
                                    $this->session->unset_userdata('msg'); ?>
                                <?php } ?>     
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('subject_name'); ?></label><small class="text-danger"> *</small>
                                    <input autofocus="" id="category" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                <?php
                                foreach ($subject_types as $subject_type_key => $subject_type_value) {
                                    ?>

                                    <label class="radio-inline">
                                        <input type="radio" value="<?php echo $subject_type_key ?>" name="type" <?php echo set_radio('type', $subject_type_key, set_value('type')); ?> ><?php echo $subject_type_value; ?> 
                                    </label>
                                    <?php
                                }
                                ?>
                                <span class="text-danger"><?php echo form_error('type'); ?></span>

                                <div class="form-group"><br>
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('subject_code'); ?></label>
                                    <input id="category" name="code" placeholder="" type="text" class="form-control"  value="<?php echo set_value('code'); ?>" />
                                    <span class="text-danger"><?php echo form_error('code'); ?></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                        </div>
                    
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('subject', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">    
             <div class="card card-bordered h-90 " >
                        <div class="card-inner">          
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('subject_list'); ?></h5>
                        <hr>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('subject_list'); ?></div>
                            <table class=" nowrap table example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('subject'); ?></th>
                                        <th><?php echo $this->lang->line('subject_code'); ?></th>
                                        <th><?php echo $this->lang->line('subject_type'); ?></th>
                                        <th class="text-right no-print noExport"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($subjectlist as $subject) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $subject['name'] ?></td>
                                            <td class="mailbox-name"><?php echo $subject['code'] ?></td>
                                            <td class="mailbox-name"><?php echo ucfirst($subject['type']) ?></td>
                                            <td class="mailbox-date  no-print">
                                                <?php
                                                if ($this->rbac->hasPrivilege('subject', 'can_edit')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>admin/subject/edit/<?php echo $subject['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <em class="ni ni-edit"></em>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('subject', 'can_delete')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>admin/subject/delete/<?php echo $subject['id'] ?>"class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <em class="ni ni-cross  "></em>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $count++;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   

<script type="text/javascript">
    $(document).ready(function () {
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>

<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);

        return true;
    }
</script>