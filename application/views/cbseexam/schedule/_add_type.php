<div id="<?php echo $delete_string;?>">
     <hr>
     <div class="row">
         <div class="col-md-2">
             <div class="form-group" >
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label> <small class="text-danger"> *</small>
                  <input type="hidden" name="assessment_type_id[]" value="<?php echo $result['id']?>">
                  <input class="form-control" value="<?php echo $result['name']?>" name="type_name[]" />
                                
             </div>
         </div>
         <div class="col-md-2">
              <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('code'); ?></label>
                                    <input class="form-control" value="<?php echo $result['code']?>" name="code[]" /> 
                                </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('maximum_marks'); ?></label> <small class="text-danger"> *</small>
                                    <input value="<?php echo $result['maximum_marks']?>" class="form-control" name="maximum_marks[]" />                        
                                </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('pass_percentage'); ?></label> <small class="text-danger"> *</small>
                                    <input value="<?php echo $result['pass_percentage']?>" class="form-control" name="pass_percentage[]" />                            
                                </div>
         </div>
         <div class="col-md-3">
             <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label> 
                                    <input value="<?php echo $result['description']?>" class="form-control" name="type_description[]" />                            
                                </div>
         </div>
         <div class="col-md-1">
             <div class="form-group">
                                      <span <?php if(empty($result)){ ?> onclick="remove('<?php echo $delete_string;?>')" <?php }else{ ?> onclick="remove_edit('<?php echo $delete_string;?>')" <?php }?>  class="section_id_error text-danger">&nbsp;<i class="fa fa-remove"></i></span>
                            
                                </div>
         </div>
     </div>                     
</div>