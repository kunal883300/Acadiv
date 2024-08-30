<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/s-favican.png">
    <meta http-equiv="X-UA-Compatible" content="" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="theme-color" content="" />
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
           
        }

        .body {
            padding: 0;
            margin: 0;
            font-family: arial;
            color: #000;
            font-size: 14px;
            line-height: normal;
        }

        .tableone {}

        .tableone td {
            border: 1px solid #000;
            padding: 5px 0
        }

        .denifittable th {
            border-top: 1px solid #999;
        }

        .denifittable th,
        .denifittable td {
            border-bottom: 1px solid #999;
            border-collapse: collapse;
            border-left: 1px solid #999;
        }

        .denifittable tr th {
            padding: 10px 10px;
            font-weight: bold;
        }

        .denifittable tr td {
            padding: 10px 10px;
            font-weight: bold;
        }

        .tcmybg {
                background:top center;
                background-size: 100% 100%;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 0;
            }


        table {
            border-collapse: collapse;
        }
        
        tr,
        td {
            border: solid thin #000000;
        }

        .heading {
            font-weight: bold;

        }

        .fontLable {
            font-size: 15px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 2fr 8fr 2fr;
            gap: 10px; /* Optional: space between the columns */
            height: 150px; /* Optional: full height of the viewport */
        }
        .grid-container2 {
            display: grid;
            grid-template-columns:2fr 8fr 2fr;
            gap: 10px; /* Optional: space between the columns */
            height: 135px; /* Optional: full height of the viewport */
        }
        .grid-item {
            padding: 20px;
            text-align: center;
        }
        .grid-item2 {
            margin : 20px;
            text-align: center;
        }
        .grid-container3 {
            display: grid;
            grid-template-columns: repeat(2, 1fr) 3fr repeat(2, 2fr);
            gap: 10px; /* Optional: space between the columns */
        }
        .grid-item3 {
            padding: 5px;
            text-align: left;
        }
        
        #info {
            margin: 20px;
            font-weight: bold;
        }

        h2 {
            font-family: 'Cormorant SC', serif;
            font-weight: bold;
        }

        #tab {
            width: 100%;
            border-collapse: collapse; /* Ensure no gaps between cells */
        }

        th,
        .td {
            text-align: left;
            padding: 8px; /* Optional: add some padding for better spacing */
            width: 120px;
        }

        
    </style>

</head>

<body class="body">

<?php
if ($marksheet->background_img != "") {
    ?>
            <img src="http://sbpublicschool.localhost/acadiv-school/uploads/backs.jpeg" class="tcmybg" width="100%" height="100%" />
            <?php
}
?>
 <?php if ($marksheet->header_type == "1") { ?>
        <?php if ($marksheet->header_image) { ?>
            <img src="<?php echo $this->media_storage->getImageURL('uploads/marksheet/' . $marksheet->header_image); ?>"
                width="100%" height="250px;">
                <?php }
             }else{?>
<div style="width: 100%; margin: 0 auto; border:1px solid #000; padding: 10px 5px 5px;position: relative;">
<?php if ($marksheet->left_logo && $marksheet->right_logo ) { ?>
<div class="grid-container">
        <div class="grid-item left"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" ></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2><?php echo $marksheet->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $marksheet->exam_center?></h6></div></div>
        <div class="grid-item right"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" ></div>
    </div>
    <?php }else if($marksheet->left_logo && !$marksheet->right_logo ){?>
        <div class="grid-container">
        <div class="grid-item left"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" ></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2><?php echo $marksheet->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $marksheet->exam_center?></h6></div></div>
        <div class="grid-item right"></div>
    </div>
    <?php }else if(!$marksheet->left_logo && $marksheet->right_logo ){?>
        <div class="grid-container">
        <div class="grid-item left"></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2><?php echo $marksheet->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $marksheet->exam_center?></h6></div></div>
        <div class="grid-item right"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" ></div>
    </div>

        <?php }else{?>
            <div class="grid-container">
        <div class="grid-item left"></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2><?php echo $marksheet->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $marksheet->exam_center?></h6></div></div>
        <div class="grid-item right"></div>
    </div>
            <?php } ?>
<div class="grid-container2">

<div class="grid-item left"></div>
        <div class="grid-item2 middle " style="margin-top:50px;"> 
             <div class="ad2"><h5>Record of Academic Performance</h5></div>
             <div class="ad3"><h6>2024-2025</h6></div></div>
             <?php if($marksheet->is_photo){?>
        <div class="grid-item2 right"><img src="http://sbpublicschool.localhost/acadiv-school/uploads/no_image.png" ></div>
        <?php }else{ ?>
            <div class="grid-item2 right"></div>
            <?php } ?>
    </div>

    <div id="info">
    <table id="tab" style="width:100%; border-collapse: collapse;">
        <tr>
            <?php if($marksheet->is_name){ ?>
                <th style="text-align: left; padding: 5px;"><h6>Name :</h6></th>
                <td id="fname1" class="td" style="padding: 5px;">Acadiv ERP</td>
            <?php } ?>
            <?php if($marksheet->is_admission_no){ ?>
                <th style="text-align: left; padding: 5px;"><h6>Admission No. :</h6></th>
                <td id="rollno1" class="td" style="padding: 5px;">5405/2024</td>
            <?php } ?>
        </tr>
        <tr>
            <?php if($marksheet->is_father_name){ ?>
                <th style="text-align: left; padding: 5px;"><h6>Father Name :</h6></th>
                <td id="faname1" class="td" style="padding: 5px;">Mr. ERP Senior Acadiv</td>
            <?php } ?>
            <?php if($marksheet->is_roll_no){ ?>
                <th style="text-align: left; padding: 5px;"><h6>Roll No. :</h6></th>
                <td id="bod1" class="td" style="padding: 5px;">2808</td>
            <?php } ?>
        </tr>
        <tr>
            <?php if($marksheet->is_mother_name){ ?>
                <th style="text-align: left; padding: 5px;"><h6>Mother's Name :</h6></th>
                <td id="iname1" class="td" style="padding: 5px;">Mrs. Acadiv</td>
            <?php } ?>
            <?php if($marksheet->is_class){ ?>
                <th style="text-align: left; padding: 5px;"><h6>Class :</h6></th>
                <td id="batch1" class="td" style="padding: 5px;">IIIrd</td>
            <?php } ?>
        </tr>
        <tr>
            <th style="text-align: left; padding: 5px;"><h6>Address :</h6></th>
            <td id="ename1" class="td" style="padding: 5px;">Gwalior, India</td>
            <?php if($marksheet->is_dob){ ?>
                <th style="text-align: left; padding: 5px;"><h6>DOB:</h6></th>
                <td id="seat1" class="td" style="padding: 5px;">28/10/2002</td>
            <?php } ?>
        </tr>
    </table>
</div>


  
       <?php
     }?>

       
    <!-- <tr>
        <td valign="top">
            <table cellpadding="0" cellspacing="0" width="100%" class="" style="margin-top: 4px;">
                <tr>
                    <td valign="top">
                        <table cellpadding="0" cellspacing="0" width="100%" class="denifittable" >
                            <tr>
                                <?php
                                if ($marksheet->is_admission_no) {
                                    ?>
                                    <th valign="top" style="text-align: center; text-transform: uppercase;">
                                        <?php echo $this->lang->line('admission_no') ?>
                                    </th>
                                    <?php
                                }
                                ?>

                                <?php
                                if ($marksheet->is_roll_no) {
                                    ?>
                                    <th valign="top"
                                        style="text-align: center; text-transform: uppercase; border-right:1px solid #999">
                                        <?php echo $this->lang->line('roll_number') ?>
                                    </th>
                                    <?php
                                }
                                ?>

                            </tr>
                            <tr>
                                <?php
                                if ($marksheet->is_admission_no) {
                                    ?>
                                    <td valign="" style="text-transform: uppercase;text-align: center;">XXXXXX</td>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($marksheet->is_roll_no) {
                                    ?>
                                    <td valign=""
                                        style="text-transform: uppercase;text-align: center;border-right:1px solid #999">
                                        XXXXXX</td>
                                    <?php
                                }
                                ?>
                            </tr>

                        </table>
                    </td>
                    <?php
                    if ($marksheet->is_photo) {
                        ?>
                        <td width="100" valign="top" align="center" style="padding-left: 5px;">
                            <img src="<?php echo $this->media_storage->getImageURL('uploads/student_images/no_image.png'); ?>"
                                width="100" height="100" />
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        </td>
    </tr> -->


   
    </table>
    <table cellpadding="0" cellspacing="0" width="100%">

<?php if ($marksheet->section == 1) { ?>
<tr>
    <table cellpadding="0" cellspacing="0" width="100%" border="0">
        <tr>
            <td height="37" class="heading" style="width:40%;text-align:center;font-size:19px">SUBJECT</td>
            <td height="37" class="heading" style="width:60%;text-align:center">
                <table style="width:100%">
                    <tr>
                        <td style="width:100%;font-size:19px" colspan="6">ANNUAL</td>
                    </tr>
                    <tr>
                        <td style="width:17%;font-size:19px" colspan="2">THEORY</td>
                        <td style="width:17%;font-size:19px" colspan="2">ORAL</td>
                        <td style="width:17%;font-size:19px" colspan="2">TOTAL</td>
                    </tr>
                    <tr>
                        <td style="width:17%">M.M.</td>
                        <td style="width:17%">M.O.</td>
                        <td style="width:17%">M.M.</td>
                        <td style="width:17%">M.O.</td>
                        <td style="width:17%">M.M.</td>
                        <td style="width:17%">M.O.</td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <?php
        $marks = array(
            (object) array(
                'subject' => 'e.vs',
               
            ),
            (object) array(
                'subject' => 'english',
               
            ),
            (object) array(
                'subject' => 'general knowledge',
              
            ),
            (object) array(
                'subject' => 'hindi',
              
            ),
            (object) array(
                'subject' => 'mathematics',
           
            ),
            (object) array(
                'subject' => 'moral science',
                
            )
        );
        ?>
        
        <?php foreach ($marks as $r): ?>
        <tr>
            <td style="width:40%;padding-left:10px;" class="heading"><?php echo ucwords($r->subject) ?></td>
            <td style="width:60%">
                <table border="0" cellspacing="0" cellpadding="0" style="width:100%">
                    <tr>
                        <td height="30" style="text-align:center;width:17%">0</td>
                        <td height="30" style="text-align:center;width:17%">0</td>
                        <td height="30" style="text-align:center;width:17%">0</td>
                        <td height="30" style="text-align:center;width:17%">0</td>
                        <td height="30" style="text-align:center;width:17%">0</td>
                        <td height="30" style="text-align:center;width:17%">0</td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr style='font-weight:bold;font-size:16px'>
                        <td height="30" class="heading" style="width:28%;padding-left:10px">Total </td>
                        <td height="30" style="width:24%;text-align:center">
                            <?php 
                            echo "x";
                            ?>
                            
                            </td>
                        
                    </tr>
        <tr style='font-weight:bold;font-size:16px'>
                        <td height="30" class="heading" style="width:28%;padding-left:10px">Grand Total </td>
                        <td height="30" style="width:24%;text-align:center">
                            <?php 
                            echo "x";
                            ?>
                            
                            </td>
                        
                    </tr>
        <tr style='font-weight:bold;font-size:16px'>
                        <td height="30" class="heading" style="width:28%;padding-left:10px">Grade </td>
                        <td height="30" style="width:24%;text-align:center">
                            <?php 
                            echo "x";
                            ?>
                            
                            </td>
                        
                    </tr>
        <tr style='font-weight:bold;font-size:16px'>
                        <td height="30" class="heading" style="width:28%;padding-left:10px">Result </td>
                        <td height="30" style="width:24%;text-align:center">
                            <?php 
                            echo "x";
                            ?>
                            
                            </td>
                        
                    </tr>
        <tr style='font-weight:bold;font-size:16px'>
                        <td height="30" class="heading" style="width:28%;padding-left:10px">Remark </td>
                        <td height="30" style="width:24%;text-align:center">
                            <?php 
                            echo "x";
                            ?>
                            
                            </td>
                        
                    </tr>
        <!-- <tr>
            <td valign="top" colspan="5" style="font-weight: normal; text-align: left; border-right: 1px solid #999;">
                <?php echo $this->lang->line('grand_total_in_words') ?>: 
                <span style="text-align: left;font-weight: bold; padding-left: 30px;">Two hundred eighty-four</span>
            </td>
        </tr>
        
        <?php if ($marksheet->is_division) { ?>
        <tr>
            <td valign="top" colspan="5" style="font-weight: normal; text-align: left; border-top:0;border-right: 1px solid #999;">
                <?php echo $this->lang->line('result'); ?>
                <span style="text-align: left;font-weight: bold; padding-left: 30px;">
                    <?php echo $this->lang->line('pass_in_second_division'); ?>
                </span>
            </td>
        </tr>
        <?php } ?> -->
    </table>
</tr>
<?php } ?>
</table>


            <p style="padding:15px;margin:5px;font-size:15px;text-align:center; color:#000000;">PART-2 : Co-Scholastic Activities</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="4" style="margin-top:10px;border-right-style:hidden;border-left-style:hidden;">
        <tr style="background:#00B8FC;color:#fff">
          <td style="width:50%;font-weight:bold;text-align:center">Activity</td>
          <td style="width:50%;text-align:center;font-weight:bold;text-align:center">Grade</td>
        </tr>
        <tr>
          <td>Work Education </td>
          <td style="text-align:center;text-transform:uppercase"><?php echo "X"?></td>
         
        </tr>
        <tr>
          <td>Art Education </td>
          <td style="text-align:center;text-transform:uppercase"><?php echo "X"?></td>
         
        </tr>
        <tr>
          <td>Health & Physical Education</td>
          <td style="text-align:center;text-transform:uppercase"><?php echo "X"?></td>
          
        </tr>
      </table>   


            <tr>
                <td valign="top" height="10"></td>
            </tr>
            <?php
            if ($marksheet->date != "") {
                ?>
                <tr>
                    <td valign="top" style="font-weight: bold; padding-left: 30px; padding-top: 10px;">
                        <?php echo $marksheet->date; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
    <td valign="top" height="30"></td>
</tr>
<?php
if ($marksheet->content_footer != "") {
    ?>
    <tr>
        <td valign="top" style="text-transform: uppercase; padding-bottom: 15px; line-height: normal;">
            <?php echo $marksheet->content_footer; ?>
        </td>
    </tr>
    <?php
}
?>

<tr>
    <td valign="top">
        <div style="text-align: center; width: 100%; margin-top:40px;">
            <?php if ($marksheet->left_sign != "") { ?>
                <div style="display: inline-block; text-transform: uppercase; margin: 0 50px;">
                    <img src="<?php echo $this->media_storage->getImageURL('uploads/marksheet/' . $marksheet->left_sign); ?>" width="100" height="50">
                    <div>Teacher Signature</div>
                </div>
            <?php } ?>

            <?php if ($marksheet->middle_sign != "") { ?>
                <div style="display: inline-block; text-transform: uppercase; margin: 0 50px;">
                    <img src="<?php echo $this->media_storage->getImageURL('uploads/marksheet/' . $marksheet->middle_sign); ?>" width="100" height="50">
                    <div>Principal Signature</div>
                </div>
            <?php } ?>

            <?php if ($marksheet->right_sign != "") { ?>
                <div style="display: inline-block; text-transform: uppercase; margin: 0 50px;">
                    <img src="<?php echo $this->media_storage->getImageURL('uploads/marksheet/' . $marksheet->right_sign); ?>" width="100" height="50">
                    <div>Head Master Signature</div>
                </div>
            <?php } ?>
        </div>
    </td>
</tr>

<tr>
    <td valign="top" height="20"></td>
</tr>



    </div>
</body>

</html>