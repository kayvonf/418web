import os
import sys

import course_config

def mkdirDashP(dir):
    if not os.path.exists(dir):
        os.mkdir(dir);

def execute(cmd):
    print "Executing: %s" % cmd;
    if os.system(cmd) != 0:
        print "ERROR EXECUTING %s: ABORTING" % cmd;
        sys.exit(-1);
        
            
##########################################################################
##########################################################################

INIT_DB_SCRIPT = "create_db.sql"

LECTURES_DIR = "lectures"
UPLOADS_DIR = "uploads"
PROFILE_PICS_DIR = "profile_pictures"
ARTICLE_IMAGES_DIR = "article_images";


##########################################################################
##########################################################################



if __name__ == "__main__":
    
    if os.path.exists(course_config.site_local_content_base_dir):
        print "Aborting... specified content directory (%s) already exists." % os.path.abspath(course_config.site_local_content_base_dir);
        print "Delete it before proceeding. (Script does not overwrite to prevent anything bad from happening...)";
        sys.exit(-1);

    print "";
    print "Initializing course web site..."
    print "   mysql database name:  %s" % course_config.database_name;
    print "   content directory:    %s" % os.path.abspath(course_config.site_local_content_base_dir);
    print ""
    print "You will be prompted twice for your SQL database password...";
    print "";
   
    # create the initial database
     
    mysql_commands =  "create database %s;" % course_config.database_name;

    execute("mysql --user %s -p -e '%s'" % (course_config.database_user, mysql_commands));
    execute("mysql --user %s -p %s < %s" % (course_config.database_user, course_config.database_name, INIT_DB_SCRIPT));

    # create directories
    mkdirDashP(course_config.site_local_content_base_dir);
    mkdirDashP(os.path.join(course_config.site_local_content_base_dir, LECTURES_DIR));
    mkdirDashP(os.path.join(course_config.site_local_content_base_dir, UPLOADS_DIR));
    mkdirDashP(os.path.join(course_config.site_local_content_base_dir, PROFILE_PICS_DIR));
    mkdirDashP(os.path.join(course_config.site_local_content_base_dir, ARTICLE_IMAGES_DIR));

    # Give apache permissions to write to the content directory
    execute("chown -R %s:%s %s" % (course_config.webserver_user, course_config.webserver_user, course_config.site_local_content_base_dir));

    print ""
    print "SUCCESS! CREATED CONTENT DIR AND NEW DATABASE!"
    print ""
    print "This is a good time to ensure that:"
    print "  -- Imagemagick is installed on this machine."
    print "  -- The value of upload_max_filesize in php5/apache2/php.ini is large enough for your slide uploads. (The PHP default is 2MB)";
    print ""
