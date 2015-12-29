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
<title>New comment on <?php echo $plaintext_desc ?></title>
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
                        <td class="content-wrap">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        <strong><?php echo $author ?></strong> commented on <?php echo $desc ?> <em>(<?php echo $date ?>)</em>:
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block quote">
                                        <?php echo $html ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">You are receiving this email because you are subscribed to <?php echo $desc ?></td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>
