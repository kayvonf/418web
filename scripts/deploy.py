import os
import sys
import argparse

import course_config

from datetime import datetime

def MakePath(str):
    if hasattr(os.path, "relpath"):
        return os.path.relpath(str);
    else:
        return str;

    
def mkdirDashP(dir):
    if not os.path.exists(dir):
        os.mkdir(dir);

def execute(cmd):
    print "Executing: %s" % cmd;
    if os.system(cmd) != 0:
        print "ERROR EXECUTING %s: ABORTING" % cmd;
        sys.exit(-1);
        
class CopyAction:
    def __init__(self, src, dst=""):
        self.src = src;
        if dst == "":
            self.dst = self.src;
        else:
            self.dst = dst;

            
##########################################################################
##########################################################################

# script intermediates
DEFAULT_TMP_DIR      = "tmp_deploy";            
DEFAULT_STAGING_DIR  = "tmp_staging";
DEFAULT_CHECKOUT_DIR = "git_checkout";

LOGS_DIRECTORY = "application/logs"

WHITELIST = [
    CopyAction("application"),
    CopyAction("assets"),
    CopyAction("system"),
    CopyAction("index.php"),
    CopyAction("deploy/.htaccess", ".htaccess")
    ]


##########################################################################
##########################################################################


if __name__ == "__main__":

    parser = argparse.ArgumentParser(description="Deploy website to live server");
    parser.add_argument("-c", "--checkoutdir", default="", help="pull code from local directory rather than checkout from git");
    
    args = parser.parse_args();

    login = course_config.repo_url;
    requires_checkout = args.checkoutdir == "";

    tmp_dir = DEFAULT_TMP_DIR;
    staging_dir = os.path.join(tmp_dir, DEFAULT_STAGING_DIR);
    
    if requires_checkout:
        checkout_dir = os.path.join(tmp_dir, DEFAULT_CHECKOUT_DIR);
    else:
        checkout_dir = args.checkoutdir;

    deploy_dir = course_config.site_local_code_base_dir;

    # remove any old checkout and staging directories within tmp_dir,
    # if they exist
    os.system("rm -rf %s" % tmp_dir);

    # if necessary, make new temp directories
    mkdirDashP(tmp_dir);
    mkdirDashP(staging_dir);

    # if necessary, check out the top of the release tree
    if requires_checkout:
        if requires_checkout:
            mkdirDashP(checkout_dir);
        cmd = "git clone -b %s %s %s" % (course_config.repo_branch, course_config.repo_url, checkout_dir);
        execute(cmd);

    # now copy to deployment site
    for action in WHITELIST:
        cmd = "cp -rf %s %s" % (os.path.join(checkout_dir, action.src),
                                os.path.join(staging_dir, action.dst));
        execute(cmd);

    ##############################################################
    ## Configuring the source tree:
    ##
    ## FIXME(kayvonf): This should be better done using a proper
    ## configuration system in the source)
    ##############################################################

    # allow multiple sites from same host
    base_config_file = os.path.join(staging_dir, "application/config/config.php");
    execute("sed -i 's/MY_SITE_CODE_BASE_URL/%s/' %s" % (course_config.site_code_base_url.replace("/", "\\/"), base_config_file))

    # point deployed site at the production database
    db_config_file = os.path.join(staging_dir, "application/config/database.php");
    execute("sed -i 's/MY_DATABASE_USERNAME/%s/' %s" % (course_config.database_user.replace("/", "\\/"), db_config_file))
    execute("sed -i 's/MY_DATABASE_PASSWORD/%s/' %s" % (course_config.database_passwd.replace("/", "\\/"), db_config_file))
    execute("sed -i 's/MY_DATABASE_NAME/%s/' %s" % (course_config.database_name.replace("/", "\\/"), db_config_file))

    course_config_file = os.path.join(staging_dir, "application/config/mycourse.php");
    execute("sed -i 's/MY_WEBSITE_NAME/%s/' %s" % (course_config.site_name.replace("/", "\\/"), course_config_file))
    execute("sed -i 's/MY_WEBSITE_SIGNUP_CODE/%s/' %s" % (course_config.site_signup_code.replace("/", "\\/"), course_config_file))
    execute("sed -i 's/MY_CONTENT_PATH/%s/' %s" % (course_config.site_local_content_base_dir.replace("/", "\\/"), course_config_file))
    execute("sed -i 's/MY_CONTENT_BASE_URL/%s/' %s" % (course_config.site_content_base_url.replace("/", "\\/"), course_config_file))
    execute("sed -i 's/MY_COURSE_EMAIL/%s/' %s" % (course_config.course_email.replace("/", "\\/"), course_config_file))
    execute("sed -i 's/MY_EMAIL_DISPLAY_NAME/%s/' %s" % (course_config.email_display_name.replace("/", "\\/"), course_config_file))
    execute("sed -i 's/MY_GOOGLE_ANALYTICS_ID/%s/' %s" % (course_config.google_analytics_id.replace("/", "\\/"), course_config_file))

    # get the url rewriting correct in the .htaccess file.  These
    # rewrite rules are necessary to remove the ugly index.php part of
    # the codeignighter urls
    htaccess_file = os.path.join(staging_dir, ".htaccess");
    execute("sed -i 's/MY_WEBSITE_BASE_DIRECTORY/%s/' %s" % (course_config.site_code_base_url.replace("/", "\\/"), htaccess_file))

    ##############################################################
    ## Okay, here we go. Now deploy the site.
    ##############################################################

    do_backup = False;
    backup_target_dir = '';

    # if a backup is needed construct a target directory for the
    # backup based on the current time
    if course_config.site_backup_dir != '':
        do_backup = True;
        backup_target_dir = os.path.join(course_config.site_backup_dir, "backup_%s" % datetime.now());
        backup_target_dir = backup_target_dir.replace(" ", "___");
        backup_target_dir = backup_target_dir.replace(":", "-");

    print "";
    print "******************************************************";
    print "";
    if do_backup:
        print "Backing up current site to:";
        print "   %s" % backup_target_dir;
        print "";
    print "Deploying site live to:";
    print "   %s" % deploy_dir;
    print "";
    print "******************************************************";

    # move current deployment to backup
    if do_backup and os.path.exists(deploy_dir):
        mkdirDashP(course_config.site_backup_dir);
        execute("mv -f %s %s" % (deploy_dir, backup_target_dir));
    else:
        # or remove the existing deployment
        execute("rm -rf %s" % deploy_dir);

    # copy over code tree + set permissions to make the new site live
    execute("mv -f %s %s" % (staging_dir, deploy_dir));
    execute("chmod -R g+wrx %s" % deploy_dir);
    execute("chmod -R o-wrx %s" % deploy_dir);
    execute("chgrp -R %s %s" % (course_config.webserver_group, deploy_dir));
