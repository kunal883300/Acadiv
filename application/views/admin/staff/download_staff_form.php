<?php error_reporting(0) ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        .school_heading {
            font-family: calibri;
            font-size: 20px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            /* Add this line for bold text */
        }

        sup {
            font-family: calibri;
            font-size: 12px;
        }

        .small_heading {
            font-family: calibri;
            font-size: 12px;
        }

        .form_label {
            font-family: calibri;
            font-size: 12px;
        }

        .border {
            border: 1px solid #000;
            color: #E6E6E6;
            font-size: 12px;
            font-family: calibri;
            padding-left: 1px;
            padding-right: 1px;
        }
    </style>
    <title>Admission Form</title>
</head>

<body>
    <table width="100%" style="padding:10px" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="20%">
                            <img style="object-fit:cover;width:100px;height:100px"
                                src="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_small_logo/'.$this->setting_model->getAdminsmalllogo()) ?>" />
                            <p style="margin:3px;margin-left:0px;font-weight:bold;font-size:14px;font-family:calibri;">
                            <p style="margin:3px;margin-left:0px;font-weight:bold;font-size:14px;font-family:calibri;">
                                Registration No. 121</p>
                        </td>
                        <td style="text-align:center;text-transform:capitalize"><span
                                class="school_heading"><?php echo $data[0]['name'] ?></span><br />
                            <span class="small_heading"
                                style="text-transform:capitalize"><?php echo $data[0]['address'] ?></span><br />
                            <span class="small_heading">Email Id: <?php echo $data[0]['email'] ?>/Phone:
                                <?php echo $data[0]['phone'] ?></span><br />
                                <br>
                            <span
                                style="background:black;color:#fff;font-family:calibri;font-size:18px;font-weight:bold;padding-left:20px;padding-right:20px;margin-top:3px">STAFF
                                FORM</span>
                                <td width="15%" style="text-align:center;font-family:calibri;font-size:16px;font-weight:bold">&nbsp;Dise Code<p style="margin:0px">456</p></td>
                        </td>

                    </tr>
                </table>
                <hr />
            </td>
        </tr>
        <tr>
            <td><span style="font-family:calibri;font-size:14px">Note: Please fillup form in the Capital Letter
                    only.</span></td>
        </tr>
    </table>
    <span class="small_heading" style="font-weight:bold; margin-left:12px;">PERSONAL DETAILS</span>
    <hr>
    <br>
    <table width='100%' style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px">
        <tr>
            <td style="width:33%" class="form_label">First Name</td>
            <td style="width:33%" class="form_label">Middle Name</td>
            <td style="width:33%" class="form_label">Last Name</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>
    </table>
    <table width='100%' style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px" style="margin-top:9px">
        <tr>
            <td style="width:15%" class="form_label">DOB</td>
            <td style="width:19%" class="form_label">Gender</td>
            <td style="width:32%" class="form_label">Category</td>
            <td style="width:34%" class="form_label">&nbsp;Martial Status</td>

        </tr>
        <tr>
            <td style="width:15%;padding-top:14px" class="form_label"><span class="border">DD</span> <span
                    class="border">MM</span> <span class="border">YYYY</span></td>
            <td style="width:19%;padding-top:14px" class="form_label">Male <span class="border">M</span> Female <span
                    class="border">&nbsp;F&nbsp;</span></td>
            <td style="width:32%;padding-top:14px" class="form_label">ST <span
                    class="border">&nbsp;&nbsp;&nbsp;&nbsp;</span> SC <span
                    class="border">&nbsp;&nbsp;&nbsp;&nbsp;</span> OBC <span
                    class="border">&nbsp;&nbsp;&nbsp;&nbsp;</span> General <span
                    class="border">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            <td style="width:19%;padding-top:14px" class="form_label">Single <span
                    class="border">&nbsp;&nbsp;&nbsp;</span> Married <span class="border">&nbsp;&nbsp;&nbsp;</span>
                Other <span class="border">&nbsp;&nbsp;&nbsp;</span></td>
        </tr>
    </table>
    <br>
    <table width='100%' style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px"
        style="margin-top:9px;margin-bottom:9px">
        <tr>
            <td style="width:33%" class="form_label">Nationality</td>
            <td style="width:33%" class="form_label">Phone/Whatsapp No. (Student)</td>
            <td style="width:33%" class="form_label">Email</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>
    </table>
    <br>
    <span class="small_heading" style="font-weight:bold; margin-left:12px;">EDUCATIONAL BACKGROUND</span>
    <hr>
    <table width='100%' style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px"
        style="margin-top:9px;margin-bottom:9px">
        <tr>
            <td style="width:33%" class="form_label">High School</td>
            <td style="width:33%" class="form_label">Location</td>
            <td style="width:33%" class="form_label">Graduation Year</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>
        <tr>
            <td style="width:33%" class="form_label">Undergraduate Degree</td>
            <td style="width:33%" class="form_label">Institution</td>
            <td style="width:33%" class="form_label">Graduation Year</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>
        <tr>
            <td style="width:33%" class="form_label">Postgraduate Degree</td>
            <td style="width:33%" class="form_label">Institution</td>
            <td style="width:33%" class="form_label">Graduation Year</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>

    </table>


    <br>
    <span class="small_heading" style="font-weight:bold;margin-left:12px;">PROFFESIONAL EXPERIENCE</span>
    <hr>
    <table width="100%" style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px"
        style="margin-top:9px;margin-bottom:9px">
        <tr>
            <td style="width:33%;padding-top:9px" class="form_label">Previous Employer</td>
            <td style="width:33%;padding-top:9px" class="form_label">Address</td>
            <td style="width:33%;padding-top:9px" class="form_label">Contact</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>
        <tr>
            <td style="width:25%;padding-top:9px" class="form_label">Job Title:</td>
            <td style="width:25%;padding-top:9px" class="form_label">Dates of Employment</td>
            <td style="width:25%;padding-top:9px" class="form_label">Duties and Responsibilities</td>
            <td style="width:25%;padding-top:9px" class="form_label">Reason for Leaving</td>
        </tr>
        <tr>
            <td style="width:25%;padding-top:9px" class="form_label">
                .................................................................</td>
            <td style="width:25%;padding-top:9px" class="form_label">
                .................................................................</td>
            <td style="width:25%;padding-top:9px" class="form_label">
                .................................................................</td>
            <td style="width:25%;padding-top:9px" class="form_label">
                .................................................................</td>
        </tr>
    </table>
    <br>
    
    
    <span class="small_heading" style="font-weight:bold;margin-left:12px;">RESIDENTIAL ADDRESS DETAILS</span>
    <hr>
    <table width="100%" style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px" style="margin-top:9px">
        <tr>
            <td style="width:100%" style="margin-left: 20px;" class="form_label">Full Address</td>
        </tr>
        <tr>
            <td style="width:100%;padding-top:14px" style="margin-left: 20px;" class="form_label">
                ..................................................................................................................................................................................................................................
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px"
        style="margin-top:9px;margin-bottom:9px">
        <tr>
            <td style="width:33%;padding-top:9px" class="form_label">State</td>
            <td style="width:33%;padding-top:9px" class="form_label">City</td>
            <td style="width:33%;padding-top:9px" class="form_label">Pincode</td>
        </tr>
        <tr>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
            <td style="width:33%;padding-top:14px" class="form_label">
                .................................................................</td>
        </tr>
    </table>
    <br>
    <span class="small_heading" style="font-weight:bold;margin-left:12px;">REFERENCES</span>
    <hr>
    <table width="100%" style="margin-left: 20px;" border="0" cellspacing="0" cellpadding="0px"
        style="margin-top:9px;margin-bottom:9px">
        <tr>
            <td style="width:20%;padding-top:9px" class="form_label">Reference Name </td>
            <td style="width:20%;padding-top:9px" class="form_label">Relationship</td>
            <td style="width:20%;padding-top:9px" class="form_label">Contact Information</td>
            <td style="width:20%;padding-top:9px" class="form_label">Years Known</td>
        </tr>
        <tr>
            <td style="width:20%;padding-top:9px" class="form_label">
                .............................................................</td>
            <td style="width:20%;padding-top:9px" class="form_label">
                ................................................................</td>
            <td style="width:20%;padding-top:9px" class="form_label">
                .........................................................</td>
            <td style="width:20%;padding-top:9px" class="form_label">
                .............................................................</td>

        </tr>

    </table>
    <br>
    <span class="small_heading" style="font-weight:bold;margin-left:12px;">DECLARATION</span>
    <hr>
    <ul>
        <li>I consent to a criminal background check: Yes / No</li>
        <li>I declare that I am medically fit to work: Yes / No</li>
        <li>I authorize the school to verify the information provided: Yes / No</li>
    </ul>
    <br>
    <table style="margin-top:14px;margin-left:15px;" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><span style="font-family:calibri;font-size:14px">LIST OF ENCLOSURES TO BE ATTACHED WITH THE APPLICATION
                    FORM</span></td>
        </tr>
        <tr>
            <td><span style="font-family:calibri;font-size:14px">&nbsp;(1)&nbsp;Passport size photograph</span></td>
        </tr>
        <?php $i = 2;
        foreach ($doc->result() as $d): ?>
            <tr>
                <td><span style="font-family:calibri;font-size:14px">&nbsp;(<?php echo $i;
                $i++; ?>)&nbsp;<?php echo ucfirst($d->document_name) ?></span>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <hr />
    <div style="margin-top:100px;font-family:calibri;font-size:14px">
        <h2 style="text-align:right; margin-right: 15px;">SIGNATURE</h2>
    </div>
</body>

</html>