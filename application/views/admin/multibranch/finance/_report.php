<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary border0 mb0 margesection">
                                        <div class="box-header with-border">
                                            <h5 class="box-title"><i class=""></i>
                                                <?php echo $this->lang->line('finance') ?>
                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <ul class="preview-icon-list g-0">
                                              
                         
                                              <!-- daily_collection_report -->
                       <li class=" <?php echo set_SubSubmenu('multi_branch_daily_collection_report'); ?> "></li>
                                                  <li class="preview-icon-item <?php echo set_SubSubmenu('finance/dailycollectionreport'); ?>">
                                                      <div class="preview-icon-box border-0 py-3">
                                                          <div class="preview-icon-wrap">
                                                          <i class="fa fa-lg fa-file-text-o"></i>
                                                          </div>
                                                          <a href="<?php echo base_url(); ?>admin/multibranch/finance/dailycollectionreport" class="preview-icon-name"> <?php echo $this->lang->line('daily_collection_report'); ?></a>
                                                      </div>
                                                  </li><!-- .icon-item -->
                                                  
                                                                  <!-- payroll_report -->
                                                  <li class="preview-icon-item  <?php echo set_SubSubmenu('finance/payroll'); ?>">
                                                      <div class="preview-icon-box border-0 py-3">
                                                          <div class="preview-icon-wrap">
                                                          <i class="fa fa-lg fa-file-text-o"></i>
                                                          </div>
                                                          <a class="preview-icon-name" href="<?php echo site_url('admin/multibranch/finance/payroll'); ?>"> <?php echo $this->lang->line('payroll_report'); ?></a>
                                                      </div>
                                                  </li><!-- .icon-item -->
                                                  
                                                 
                                                               <!-- income_report       -->
                                                  <li class="preview-icon-item <?php echo set_SubSubmenu('finance/incomereport'); ?>">
                                                      <div class="preview-icon-box border-0 py-3">
                                                          <div class="preview-icon-wrap">
                                                          <i class="fa fa-lg fa-file-text-o"></i>
                                                          </div>
                                                          <a class="preview-icon-name " href="<?php echo base_url(); ?>admin/multibranch/finance/incomereport"><?php echo $this->lang->line('income_report'); ?></a>
                                                      </div>
                                                  </li><!-- .icon-item -->
                                                 
                                                   
                                                               <!-- expense_report -->
                                                  <li class="preview-icon-item <?php echo set_SubSubmenu('finance/expensereport'); ?>">
                                                      <div class="preview-icon-box border-0 py-3">
                                                          <div class="preview-icon-wrap">
                                                          <i class="fa fa-lg fa-file-text-o"></i>
                                                          </div>
                                                          <a  class="preview-icon-name" href="<?php echo base_url() ?>admin/multibranch/finance/expensereport"><?php echo $this->lang->line('expense_report'); ?></a>
                                                      </div>
                                                  </li><!-- .icon-item -->
                                                   
                                                              <!-- user_log_report -->

                                                  <li class="preview-icon-item <?php echo set_SubSubmenu('finance/userlogreport'); ?>">
                                                      <div class="preview-icon-box border-0 py-3">
                                                          <div class="preview-icon-wrap">
                                                          <i class="fa fa-lg fa-file-text-o"></i>
                                                          </div>
                                                          <a class="preview-icon-name"  href="<?php echo base_url(); ?>admin/multibranch/finance/userlogreport"> <?php echo $this->lang->line('user_log_report'); ?></a>
                                                      </div>
                                                  </li><!-- .icon-item -->
                                                  
                                                  
                                                 
                                                 
                                                  
                                              </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>