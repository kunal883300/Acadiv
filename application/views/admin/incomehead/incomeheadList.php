<style type="text/css">
    @media print {

        .no-print,
        .no-print * {
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

                                <!-- Main content -->
                                <section class="content">
                                    <div class="row">
                                        <?php
                                        if ($this->rbac->hasPrivilege('income_head', 'can_add')) {
                                        ?>
                                            <div class="col-md-4">
                                                <!-- Horizontal Form -->
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('add_income_head'); ?></h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <!-- form start -->
                                                    <div class="card card-bordered h-100 shadow-none  ">
                                                        <div class="card-inner">
                                                            <form action="<?php echo site_url('admin/incomehead/create') ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                                                                <div class="box-body">
                                                                    <?php if ($this->session->flashdata('msg')) {
                                                                    ?>
                                                                        <?php echo $this->session->flashdata('msg');
                                                                        $this->session->unset_userdata('msg'); ?>
                                                                    <?php } ?>
                                                                    <?php echo $this->customlib->getCSRF(); ?>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('income_head'); ?></label><small class="text-danger"> *</small>
                                                                        <input autofocus="" id="incomehead" name="incomehead" placeholder="" type="text" class="form-control" value="<?php echo set_value('incomehead'); ?>" />
                                                                        <span class="text-danger"><?php echo form_error('incomehead'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                        <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description'); ?></textarea>
                                                                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                                    </div>
                                                                </div><!-- /.box-body -->
                                                                <div class="box-footer">
                                                                    <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--/.col (right) -->
                                            <!-- left column -->
                                        <?php } ?>
                                        <div class="col-md-<?php
                                                            if ($this->rbac->hasPrivilege('income_head', 'can_add')) {
                                                                echo "8";
                                                            } else {
                                                                echo "12";
                                                            }
                                                            ?>">
                                            <!-- general form elements -->
                                            <div class="box box-primary" id="exphead">
                                                <div class="box-header with-border">
                                                    <h5 class="box-title"><?php echo $this->lang->line('income_head_list'); ?></h5>
                                                    <hr>
                                                </div><!-- /.box-header -->
                                                <div class="card card-bordered h-100 shadow-none  ">
                                                    <div class="card-inner">
                                                        <div class="box-body">

                                                            <div class="table-responsive mailbox-messages ">
                                                            <table class="datatable-init-export nowrap table income-list"> 
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo $this->lang->line('income_head'); ?></th>
                                                                            <th><?php echo $this->lang->line('description'); ?></th>
                                                                            <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if (!empty($categorylist)) {

                                                                            $count = 1;
                                                                            foreach ($categorylist as $category) {
                                                                        ?>
                                                                                <tr>
                                                                                    <td class="mailbox-name"><?php echo $category['income_category'] ?></td>
                                                                                    <td class="mailbox-name"><?php echo $category['description']; ?></td>
                                                                                    <td class="mailbox-date  no-print">
                                                                                        <?php
                                                                                        if ($this->rbac->hasPrivilege('income_head', 'can_edit')) {
                                                                                        ?>
                                                                                            <a href="<?php echo base_url(); ?>admin/incomehead/edit/<?php echo $category['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                                            <em class="ni ni-edit"></em>
                                                                                            </a>
                                                                                        <?php
                                                                                        }
                                                                                        if ($this->rbac->hasPrivilege('income_head', 'can_delete')) {
                                                                                        ?>
                                                                                            <a href="<?php echo base_url(); ?>admin/incomehead/delete/<?php echo $category['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                                            <em class="ni ni-cross"></em>
                                                                                            </a>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                        <?php
                                                                            }
                                                                            $count++;
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table><!-- /.table -->
                                                            </div><!-- /.mail-box-messages -->
                                                        </div><!-- /.box-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- right column -->
                                    </div> <!-- /.row -->
                                </section><!-- /.content -->
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#btnreset").click(function() {
            $("#form1")[0].reset();
        });
    });
</script>

<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';

    function Popup(data) {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
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
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);

        return true;
    }

    $("#print_div").click(function() {
        Popup($('#exphead').html());
    });
</script>