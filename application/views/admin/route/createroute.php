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
            <?php if ($this->rbac->hasPrivilege('routes', 'can_add')) {
    ?>
                <div class="col-md-4">
                    <div class="box box-primary" >
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('create_route'); ?></h5>
                            <hr>
                            
                        </div>
                        <form id="form1" action="<?php echo site_url('admin/route/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                            <div class="card card-bordered h-100 " >
                        <div class="card-inner">
                                <?php if ($this->session->flashdata('msg')) {?>
                                    <?php echo $this->session->flashdata('msg');
        $this->session->unset_userdata('msg'); ?>
                                <?php }?>
                                <?php
if (isset($error_message)) {
        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
    }
    ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('route_title'); ?></label><small class="text-danger"> *</small>
                                    <input autofocus="" id="route_title" name="route_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('route_title'); ?>" />
                                    <span class="text-danger"><?php echo form_error('route_title'); ?></span>
                                </div>
                            </div>
                            <div class="box-footer mx-3 my-3">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
</div>
                </div>
            <?php }?>
            <div class="col-md-<?php
if ($this->rbac->hasPrivilege('routes', 'can_add')) {
    echo "8";
} else {
    echo "12";
}
?>">
                <div class="box box-primary" id="route">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('route_list'); ?></h5>
                        <hr>
                    </div>
                    <div class="box-body">
                    <div class="card card-bordered h-100 " >
                        <div class="card-inner">
                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('route_list'); ?></div>
                            <div class="table-responsive overflow-visible">
                                <table class="nowrap table example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('id'); ?></th>
                                            <th><?php echo $this->lang->line('route_title'); ?></th>
                                            <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($listroute)) {
    ?>

                                            <?php
} else {
    $count = 1;
    foreach ($listroute as $data) {
        ?>
                                                <tr>
                                                    <td class="mailbox-name"> <?php echo $data['id'] ?></td>
                                                    <td class="mailbox-name"> <?php echo $data['route_title'] ?></td>
                                                    <td class="mailbox-date  no-print">
                                                        <?php if ($this->rbac->hasPrivilege('routes', 'can_edit')) {?>
                                                            <a href="<?php echo base_url(); ?>admin/route/edit/<?php echo $data['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <em class="ni ni-edit"></em>
                                                            </a>
                                                        <?php }if ($this->rbac->hasPrivilege('routes', 'can_delete')) {?>
                                                            <a href="<?php echo base_url(); ?>admin/route/delete/<?php echo $data['id'] ?>"class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <em class="ni ni-cross"></em>
                                                            </a>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                                <?php
}
    $count++;
}
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