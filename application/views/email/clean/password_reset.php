<!--
  Thanks https://github.com/mailgun/transactional-email-templates
  Note: This template CANNOT be used. It must be run through a style inliner
  (ex. Premailer) beforehand.
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>15-418/618 Password Reset</title>
<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr><td class="banner">&nbsp;</td></tr>
                    <tr><td class="banner_underline">&nbsp;</td></tr>
                    <tr>
                        <td class="alert alert-bad">
                            Password Reset
                        </td>
                    </tr>
                    <tr>
                        <td class="content-wrap">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block quote">
<p>A request to reset your password has been made. If you did not make this
request, you may ignore this email. If you did make this request, just click
the link below within 24 hours. After 24 hours, the link will expire.</p>

<p><a href="<?php echo $reset_url ?>"><?php echo $reset_url ?></a></p>

<p>If the above link does not work, try copying and pasting it into your browser.
If you have any further issues, please contact the instructors.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>
