<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<?php $this->load->view('attendencereports/_attendance'); ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
        <div class="row">   
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull"></div>
                    <div class="box-header with-border">
                        <br>
                        <h5 class="box-title"><i class=""></i> <?php echo $this->lang->line('select_criteria'); ?></h5>
                    </div>
                    <form id='form1' action="<?php echo site_url('attendencereports/daily_attendance_report') ?>"  method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?></label><span class="text-danger"> *</span>
                                        <input type="text" name="date" value="<?php echo set_value('date', $date); ?>" class="form-control date-picker">

                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div>  
                                </div>
                            </div>
                        </div>  
                    </form>
                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header ptbnull">
                            <h5 class="box-title titlefix"><i class=""></i>
                                <?php echo $this->lang->line('daily_attendance_report') ?></h5>
                        </div>
                        <div class="box-body table-responsive">
                   
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr> 
                                        <th><?php echo $this->lang->line('class_section'); ?></th>
                                        <th><?php echo $this->lang->line('total_present'); ?></th>
                                        <th><?php echo $this->lang->line('total_absent'); ?></th>
                                        <th><?php echo $this->lang->line('present') . " %"; ?></th>
                                        <th><?php echo $this->lang->line('absent') . " %"; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($result)) {
                                        foreach ($resultlist as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['class_section'] ?></td>
                                                <td><?php echo $value['total_present'] ?></td>
                                                <td><?php echo $value['total_absent'] ?></td>
                                                <td><?php echo $value['present_percent'] ?></td>
                                                <td><?php echo $value['absent_persent'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                         <tr style="font-weight: bold;">
                                            <td></td>
                                            <td><?php echo $all_present ?></td>
                                            <td><?php echo $all_absent ?></td>
                                            <td><?php echo $all_present_percent ?></td>
                                            <td><?php echo $all_absent_percent ?></td>
                                        </tr>                                      
                                </tbody>                                 
                                    <?php } ?>
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