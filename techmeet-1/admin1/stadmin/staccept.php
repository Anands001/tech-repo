
<?php
include '../dbconnect.php';
$sid=$_GET['stid'];
$req=$_GET['req'];

if($req=='true'){
    $sql="update staff set status = 'idle' where staff_id=$sid";
    $sql1="select * from staff where staff_id=$sid";
    $result=mysqli_query($con,$sql1);
    if(isset($result)){
        while ($row=mysqli_fetch_assoc($result)){
            $email=$row['gmail'];
            $name=$row['name'];
        }
    }
    echo '<script>let email="'.$email.'";</script>';
    echo '<script>let name="'.$name.'";</script>';
    ?>

<?php
    if(mysqli_query($con,$sql)){
//        header('Location:../index.php?inc=staff.php');
    }

}else{
    $sql="delete from staff where staff_id=$sid";
    if(mysqli_query($con,$sql)){
        header('Location:../index.php?inc=staff.php');
    }
}
?>
<script src="https://smtpjs.com/v3/smtp.js"></script>

<script>

    function sendmail(smail) {
        console.log(smail);

        if(smail!=null){

            Email.send({
                Host: "smtp.elasticemail.com",
                Username: "sxcicapo23@gmail.com",
                Password: "EFF957EE16F798508EE8DDD5AAC04B8059E1",
                To: smail,
                From: "sxcicapo23@gmail.com",
                Subject: "ICAPO",
                Body: `
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We're thrilled to have you here! Get ready to dive into your new account.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h6 style="font-size: 48px; font-weight: 400; margin: 2;">Hello ${name}</h6> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Your request has been accepted You can login using this link</p><br><a href="http://localhost/techmeet-1/admin1/stadmin/login.php">Login</a>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="mailto:email" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Reply</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->

                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Email!</h2>
                            <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFA73B;">email</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</body>
`
            }).then( (msg) =>{
                    // alert("success");
                window.location.href = "../index.php?inc=staff.php";
                }
            );
        }
    }
</script>
<!--<script type="text/javascript" src="../js/mail.js"></script>-->
<script>sendmail(email);</script>
