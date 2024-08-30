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
            width: 100%;
            height:100%;
            display:flex;

        }

       

        .tcmybg {
                background:top center;
                background-size: 100% ;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 0;
            }


        table {
            border-collapse: collapse;
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
            height: auto /* Optional: full height of the viewport */
        }
        .grid-container2 {
            display: grid;
            grid-template-columns:2fr 8fr 2fr;
            gap: 10px; /* Optional: space between the columns */
            height: auto; /* Optional: full height of the viewport */
        }
        .grid-item {
            
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

        table, th, td {
  border:1px solid black;
  border-collapse: collapse ;
  
}

        
    </style>

</head>

<body class="body">
   


<?php
if ($template->background_img != ""){
    ?>
            <img src="http://sbpublicschool.localhost/acadiv-school/uploads/backs.jpeg" class="tcmybg" width="100%" height="100%" />
            <?php
}
?>
 <?php if ($template->header_type == "1") { ?>
        <?php if ($template->header_image) { ?>
            <img src="<?php echo $this->media_storage->getImageURL('uploads/marksheet/' . $template->header_image); ?>"
                width="100%" height="250px;">
                <?php }
             }else{?>
<div style="width: 100%; height:auto; margin: 0 auto; border:1px solid #000; padding: 10px 5px 5px;position: relative;">
<?php if ($template->left_logo && $template->right_logo ) { ?>
<div class="grid-container">
        <div class="grid-item left"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="80%"></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2 ><?php echo $template->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. <?php echo $sch_setting->phone?>, <?php echo $sch_setting->email;?>  <?php if($sch_setting->web_url != "") Website: echo $sch_setting->web_url?></b></div>
             <div class="ad3"><h6><?php echo $template->exam_center?></h6></div></div>
        <div class="grid-item right"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="80%"></div>
    </div>
    <?php }else if($template->left_logo && !$template->right_logo ){?>
        <div class="grid-container">
        <div class="grid-item left"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="50%"></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2><?php echo $template->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $template->exam_center?></h6></div></div>
        <div class="grid-item right"></div>
    </div>
    <?php }else if(!$template->left_logo && $template->right_logo ){?>
        <div class="grid-container">
        <div class="grid-item left"></div>
        <div class="grid-item middle"> <div class="schoolName"> <h2><?php echo $template->school_name?></h2></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $template->exam_center?></h6></div></div>
        <div class="grid-item right"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" ></div>
    </div>

        <?php }else{?>
            <div class="grid-container">
        <div class="grid-item left"></div>
        <div class="grid-item middle"> <div class="schoolName"> <h1><?php echo $template->school_name?></h1></div>
             <div class="ad1" ><h5>Ramtala A.B Road, Distt. Shivpuri</h5></div> 
             <div class="ad2"><b>Ph. 7000253850, kphs_kis@rediffmail.com, Website: www.kpsschool.org</b></div>
             <div class="ad3"><h6><?php echo $template->exam_center?></h6></div></div>
        <div class="grid-item right"></div>
    </div>
            <?php } ?>

<div class="grid-container2">

<div class="grid-item left"></div>
        <div class="grid-item2 middle " style="margin-top:50px;"> 
             <div class="ad2"><h3><?php echo $template->exam_name?></h3></div>
             <div class="ad3"><h4><?php echo $exam->session?></h4></div></div>
             <?php if($template->is_photo){?>
        <div class="grid-item2 right"><img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="100%"></div>
        <?php }else{ ?>
            <div class="grid-item2 right"></div>
            <?php } ?>
    </div>
<?php $student_info= $marksheet['student']?>
    <div id="info">
    <table border="1"  id="tab" style="width:100%; border-collapse: collapse;">
        <tr>
            <?php if($template->is_name){ ?>
                <th  style="text-align: left; padding: 5px; font-size:18px"><h6>Name :</h6></th>
                <td id="fname1" class="td" style="padding: 5px;"><?php echo $student_info['firstname']." ".$student_info['middlename']." ".$student_info['lastname']?></td>
            <?php } ?>
            <?php if($template->is_admission_no){ ?>
                <th style="text-align: left; padding: 5px; font-size:18px"><h6>Admission No. :</h6></th>
                <td id="rollno1" class="td" style="padding: 5px;"><?php echo $student_info['admission_no']?></td>
            <?php } ?>
        </tr>
        <tr>
            <?php if($template->is_father_name){ ?>
                <th style="text-align: left; padding: 5px; font-size:18px"><h6>Father Name :</h6></th>
                <td id="faname1" class="td" style="padding: 5px;"><?php echo $student_info['father_name']?></td>
            <?php } ?>
            <?php if($template->is_roll_no){ ?>
                <th style="text-align: left; padding: 5px; font-size:18px"><h6>Roll No. :</h6></th>
                <td id="bod1" class="td" style="padding: 5px;"><?php echo $student_info['student_roll_no']?></td>
            <?php } ?>
        </tr>
        <tr>
            <?php if($template->is_mother_name){ ?>
                <th style="text-align: left; padding: 5px; font-size:18px"><h6>Mother's Name :</h6></th>
                <td id="iname1" class="td" style="padding: 5px;"><?php echo $student_info['mother_name']?></td>
            <?php } ?>
            <?php if($template->is_class){ ?>
                <th style="text-align: left; padding: 5px; font-size:18px"><h6>Class :</h6></th>
                <td id="batch1" class="td" style="padding: 5px;"><?php echo $student_info['class']?></td>
            <?php } ?>
        </tr>
        <tr>
            <th style="text-align: left; padding: 5px; font-size:18px"><h6>Address :</h6></th>
            <td id="ename1" class="td" style="padding: 5px;"><?php echo $student_info['current_address'] ?></td>
            <?php if($template->is_dob){ ?>
                <th style="text-align: left; padding: 5px; font-size:18px"><h6>DOB:</h6></th>
                <td id="seat1" class="td" style="padding: 5px;"><?php echo $student_info['dob']?></td>
            <?php } ?>
        </tr>
    </table>
</div>


  
    <?php
    }?>

       
 
<!-- 
<table border="" cellpadding="0" cellspacing="0" width="100%" >

<tr >
<table border=""  cellpadding="0" cellspacing="0" width="100%" >
        <tr>
            <td height="37" class="heading" style="width:40%;text-align:center;font-size:19px">SUBJECT</td>
            <td height="37" class="heading" style="width:60%;text-align:center">
                <table  style="width:100% " cellpadding="0" cellspacing="0" border="1">
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
            <td style="width:50%;padding-left:10px;" class="heading"><?php echo ucwords($r->subject) ?></td>
            <td style="width:50%">
                <table border="1"   style="width:100%">
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
      
    </table>
</tr>
</table> -->
<?php 
                    // Assuming $results is your array of objects

// Initialize an array to store the organized results
$organizedResults = [];

// Iterate through each result object
foreach ($marksheet['result'] as $result) {
    // Define keys for grouping
    $groupKey = $result->exam_group_class_batch_exams_id . '-' . $result->subject_id;
    
    // Check if the group already exists, if not, initialize it
    if (!isset($organizedResults[$groupKey])) {
        $organizedResults[$groupKey] = [
            'exam_group_class_batch_exams_id' => $result->exam_group_class_batch_exams_id,
            'subject_id' => $result->subject_id,
            'subject_name' => $result->name, // Assuming 'name' is the subject name
            'theory' => null,
            'oral' => null,
        ];
    }
    
    // Assign marks based on subject_type (3 for oral, 1 for theory)
    if ($result->subject_type == 3) { // Oral
        $organizedResults[$groupKey]['oral'] = [
            'marks' => $result->get_marks,
            'max_marks' => $result->max_marks,
            'attendance' => $result->attendance,
            'note' => $result->note,
        ];
    } elseif ($result->subject_type == 1) { // Theory
        $organizedResults[$groupKey]['theory'] = [
            'marks' => $result->get_marks,
            'max_marks' => $result->max_marks,
            'attendance' => $result->attendance,
            'note' => $result->note,
        ];
    }
}

// Convert associative array to indexed array for output (optional)
$finalResults = array_values($organizedResults);

// Output the final structured results
                    ?>

<div style="display:flex; justify-content:center; align-items:center; margin-top:30px; padding-right: 20px; padding-left: 20px;">
    <table cellspacing="1" cellpadding="10px" style="width:100%; border-collapse: collapse;">
        <tr>
            <th style="text-align:center;height:30px;width: 40%;">SUBJECT</th>
            <th colspan="2" style="text-align:center;width: 20%;">THEORY</th>
            <th colspan="2" style="text-align:center;width: 20%;">ORAL</th>
            <th colspan="2" style="text-align:center;width: 20%;">TOTAL</th>
        </tr>
        <tr>
            <th style="padding-left: 8px;width: 20%;">Subject List</th>
            <th style="text-align:center;">M.M.</th>
            <th style="text-align:center;">M.O.</th>
            <th style="text-align:center;">M.M.</th>
            <th style="text-align:center;">M.O.</th>
            <th style="text-align:center;">M.M.</th>
            <th style="text-align:center;">M.O.</th>
        </tr>
        <?php
        $theory_mm =0;
        $theory_mo =0;
        $oral_mm =0;
        $oral_mo =0;
        ?>
        <?php foreach ($finalResults as $r): ?>
            <tr>
                <td style="padding-left: 8px;width: 20%;"><b><?php echo ucwords($r['subject_name']); ?></b></td>
                <td style="padding:2px;text-align:center;"><?php echo $r['theory']['max_marks']; 
                $theory_mm += $r['theory']['max_marks'];
                ?></td>
                <td style="text-align:center;"><?php echo $r['theory']['marks'];
                 $theory_mo += $r['theory']['marks'];
                ?></td>
                <td style="text-align:center;"><?php echo $r['oral']['max_marks'];
                $oral_mm += $r['oral']['max_marks'];
                ?></td>
                <td style="text-align:center;"><?php echo $r['oral']['marks']; 
                 $oral_mo += $r['oral']['marks'];
                ?></td>
                <td style="text-align:center;"><?php echo $r['theory']['max_marks'] + $r['oral']['max_marks'];
                 $mm += $r['theory']['max_marks'] + $r['oral']['max_marks'];
                ?></td>
                <td style="text-align:center;"><?php echo $r['theory']['marks'] + $r['oral']['marks'];
                 $mo += $r['theory']['marks'] + $r['oral']['marks'];
                 ?></td>
            </tr>
        <?php endforeach; ?>
     
    </table>
   
</div>
<div style="display:flex; justify-content:center; align-items:center; margin-top:20px ;padding-right: 20px; padding-left: 20px;" >

<table cellspacing="1"  style="width:40%; border-right-style:hidden; ">
  
  <tr>
    <td style="padding-left: 8px;width: 20%;" colspan="0" ><b>Total:</b></td>
  </tr>
  <tr>
    <td style="padding-left: 8px;width: 20%;"colspan="0" ><b>Grand Total</b></td>
  </tr>

</table>



<table cellpadding="10px" style="width:60%" border-collapse: collapse;">
  
  <tr>
    <td colspan="3" style="text-align:center;" ><b>Theory: <?php echo $theory_mo ."/".$theory_mm?></b></td>
    <td colspan="3" style="text-align:center;" ><b>Oral: <?php echo $oral_mo ."/".$oral_mm?></b> </td>

  </tr>
  <tr>
    <td colspan="6" style="text-align:center;" ><b><?php echo $mm."/".$mo?></b></td>
    
  </tr>

</table>

</div>




<div style="display:flex; justify-content:center; align-items:center; margin-top:30px; padding-right: 20px; padding-left: 20px;">

<table cellspacing="1" cellpadding="10px" style="width:100%; border-collapse: collapse;">

 <tr style='font-weight:bold;font-size:16px; '>
    <th style="text-align:center;" >Grade</th>
    <th style="text-align:center;"  >Result</th>
    <th style="text-align:center;"  >Remark</th>
        
 </tr>
 <tr style='font-weight:bold;font-size:16px; '>
    <td style="text-align:center;" >X</td>
    <td style="text-align:center;">X</td>
    <td style="text-align:center;"><?php echo $student_info['teacher_remark']?></td>
        
 </tr>  
    
    </table>
        </div>

            <p style="padding:15px;margin:5px;font-size:15px;text-align:center; color:#000000; margin-top:3% ">PART-2 : Co-Scholastic Activities</p>
            <div style="display:flex; justify-content:center; align-items:center;  padding-right: 20px; padding-left: 20px;">      
            <table border="1" width="100%"  cellspacing="0" cellpadding="0" >
        <tr style="background:#00B8FC;color:#fff">
          <td style="width:50%;font-weight:bold;text-align:center">Activity</td>
          <td style="width:50%;text-align:center;font-weight:bold;text-align:center">Grade</td>
        </tr>
        <tr>
          <td style="padding-left: 8px;width: 20%;">Work Education </td>
          <td style="text-align:center;text-transform:uppercase"><?php echo $student_info['work_ex']?></td>
         
        </tr>
        <tr>
          <td style="padding-left: 8px;width: 20%;">Health & Physical Education </td>
          <td style="text-align:center;text-transform:uppercase"><?php echo $student_info['physical']?></td>
         
        </tr>
        <tr>
          <td style="padding-left: 8px;width: 20%;">Student Attendance</td>
          <td style="text-align:center;text-transform:uppercase"><?php echo $student_info['attendance']?></td>
          
        </tr>
      </table>   
        </div>


            <tr>
                <td valign="top" height="10"></td>
            </tr>
            <?php
            if ($template->date != "") {
                ?>
                <tr>
                    <td valign="top" style="font-weight: bold; padding-left: 30px; padding-top: 10px;">
                        <?php echo $template->date; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
    <td valign="top" height="30"></td>
</tr>
<?php
if ($template->content_footer != "") {
    ?>
    <tr>
        <td valign="top" style="text-transform: uppercase; padding-bottom: 15px; line-height: normal;">
            <?php echo $template->content_footer; ?>
        </td>
    </tr>
    <?php
}
?>

<tr>
    <td valign="">
        <div style="display:flex; align-items:center; justify-content:space-evenly; width: 100%; margin-top:18%; font-size:10px; ">
            <?php if ($template->left_sign != "") { ?>
                <div style="display: inline-block; text-transform: uppercase; margin: 0 50px;">
                    <img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="100" height="45">
                    <div>Teacher Signature</div>
                </div>
            <?php } ?>

            <?php if ($template->middle_sign != "") { ?>
                <div style="display: inline-block; text-transform: uppercase; margin: 0 50px;">
                    <img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="100" height="45">
                    <div>Principal Signature</div>
                </div>
            <?php } ?>

            <?php if ($template->right_sign != "") { ?>
                <div style="display: inline-block; text-transform: uppercase; margin: 0 50px;">
                    <img src="https://schoolerpindia.co.in/school/simpkinspublic/uploads/f2023110718logo.jpg" width="100" height="45">
                    <div style="margin-left:-10px" >Head Master Signature</div>
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