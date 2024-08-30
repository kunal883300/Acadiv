  <div class="nk-content">
      <div class="container-fluid">
          <div class="nk-content-inner">
              <div class="nk-content-body">
                  <div class="nk-block">
                      <div class="card card-bordered">
                          <div class="card-aside-wrap">
                              <div class="card-inner">
                                  <section class="content">
                                      <div class="row">
                                          <div class="col-md-2 my-5">
                                              <div class="card card-bordered h-70 shadow-none  ">
                                                  <div class="">
                                                      <ul class="link-list-menu">
                                                          <li><a href="<?php echo site_url('admin/visitorspurpose') ?>" class="active">
                                                                  <?php echo $this->lang->line('purpose'); ?>
                                                              </a></li>
                                                          <li><a href="<?php echo site_url('admin/complainttype') ?>">
                                                                  <?php echo $this->lang->line('complaint_type'); ?>
                                                              </a></li>
                                                          <li><a href="<?php echo site_url('admin/source') ?>">
                                                                  <?php echo $this->lang->line('source'); ?>
                                                              </a></li>
                                                          <li><a href="<?php echo site_url('admin/reference') ?>">
                                                                  <?php echo $this->lang->line('reference'); ?>
                                                              </a></li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div><!--./col-md-2-->
                                          <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_add')) { ?>
                                              <div class="col-md-4">
                                                  <!-- Horizontal Form -->
                                                  <div class="box box-primary">
                                                      <div class="box-header with-border">
                                                          <h5 class="box-title"><?php echo $this->lang->line('add_reference'); ?></h5>
                                                      </div><!-- /.box-header -->
                                                      <hr>
                                                      <div class="card card-bordered h-100 shadow-none  ">
                                                          <div class="card-inner">
                                                              <form id="form1" action="<?php echo site_url('admin/reference') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                                  <div class="box-body">
                                                                      <?php echo $this->session->flashdata('msg');
                                                                        $this->session->unset_userdata('msg'); ?>
                                                                      <div class="form-group">
                                                                          <label for="pwd"><?php echo $this->lang->line('reference'); ?></label><small class="text-danger"> *</small>
                                                                          <input class="form-control" id="description" name="reference" value="<?php echo set_value('reference'); ?>" />
                                                                          <span class="text-danger"><?php echo form_error('reference'); ?></span>
                                                                      </div>

                                                                      <div class="form-group">
                                                                          <label for="pwd"><?php echo $this->lang->line('description'); ?></label>
                                                                          <textarea class="form-control" id="description" name="description" rows="3"><?php echo set_value('description'); ?></textarea>
                                                                      </div>
                                                                  </div><!-- /.box-body -->
                                                                  <div class="box-footer my-2">
                                                                      <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div><!--/.col (right) -->
                                          <?php } ?>
                                          <!-- left column -->
                                          <div class="col-md-<?php
                                                                if ($this->rbac->hasPrivilege('setup_font_office', 'can_add')) {
                                                                    echo "6";
                                                                } else {
                                                                    echo "10";
                                                                }
                                                                ?>">
                                              <!-- general form elements -->
                                              <div class="box box-primary">
                                                  <div class="box-header ptbnull">
                                                      <h5 class="box-title titlefix"><?php echo $this->lang->line('reference_list'); ?></h5>
                                                      <div class="box-tools pull-right">
                                                      </div><!-- /.box-tools -->
                                                  </div><!-- /.box-header -->
                                                  <hr>
                                                  <div class="card card-bordered h-100 shadow-none  ">
                                                      <div class="card-inner">
                                                          <div class="box-body">
                                                              <div class="download_label"><?php echo $this->lang->line('reference_list'); ?></div>
                                                              <div class="table-responsive mailbox-messages overflow-visible">
                                                                  <table class="table table-hover table-striped table-bordered example">
                                                                      <thead>
                                                                          <tr>
                                                                              <th><?php echo $this->lang->line('reference'); ?></th>
                                                                              <th><?php echo $this->lang->line('description'); ?></th>
                                                                              <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                          </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                          <?php
                                                                            if (empty($reference_list)) {
                                                                            ?>
                                                                              <?php
                                                                            } else {
                                                                                foreach ($reference_list as $key => $value) {
                                                                                ?>
                                                                                  <tr>
                                                                                      <td class="mailbox-name"><?php echo $value['reference'] ?></td>
                                                                                      <td class="mailbox-name"><?php echo $value['description'] ?></td>
                                                                                      <td class="mailbox-date ">
                                                                                          <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_edit')) { ?>
                                                                                              <a href="<?php echo base_url(); ?>admin/reference/edit/<?php echo $value['id']; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('edit') ?>">
                                                                                              <em class="ni ni-edit"></em>
                                                                                              </a>
                                                                                          <?php }
                                                                                            if ($this->rbac->hasPrivilege('setup_font_office', 'can_delete')) { ?>
                                                                                              <a href="<?php echo base_url(); ?>admin/reference/delete/<?php echo $value['id']; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="<?php echo $this->lang->line('delete') ?>">
                                                                                              <em class="ni ni-cross"></em>
                                                                                              </a>
                                                                                          <?php } ?>

                                                                                      </td>
                                                                                  </tr>
                                                                          <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                      </tbody>
                                                                  </table><!-- /.table -->
                                                              </div><!-- /.mail-box-messages -->
                                                          </div><!-- /.box-body -->
                                                      </div>
                                                  </div>
                                              </div>
                                          </div><!--/.col (left) -->
                                          <!-- right column -->
                                      </div>
                                  </section><!-- /.content -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
      <script>
          $(document).ready(function() {
              $('.detail_popover').popover({
                  placement: 'right',
                  trigger: 'hover',
                  container: 'body',
                  html: true,
                  content: function() {
                      return $(this).closest('td').find('.fee_detail_popover').html();
                  }
              });
          });
      </script>