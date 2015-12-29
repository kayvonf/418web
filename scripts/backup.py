import os
import sys

from optparse import OptionParser
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

SQL_DUMP_FILENAME    = "db_dump.sql";
DB_PASSWORD          = "";

DEFAULT_LOGIN        = "kayvonf@linux.gp.cs.cmu.edu";

DEFAULT_DB_NAME     = "15418_spr13";
DEFAULT_CONTENT_DIR = "/var/www/15418_www/spring2013content";

DEFAULT_REMOTE_BACKUP_DIR = "/afs/cs/academic/class/15418-s13/private/website_backup";
DEFAULT_LOCAL_BACKUP_DIR  = "/home/admin_user/15418_website_backup";


##########################################################################
##########################################################################



if __name__ == "__main__":
    
    parser = OptionParser("usage: %prog [options]");
    parser.add_option("-u", "--user", dest="userinfo", help="use this to specify how to login: e.g., foo@linux.andrew.cmu.edu", default=DEFAULT_LOGIN);
    
    (options,args) = parser.parse_args();

    login = options.userinfo;

    local_backup_dir = DEFAULT_LOCAL_BACKUP_DIR;
    remote_backup_dir = DEFAULT_REMOTE_BACKUP_DIR;
    content_dir = DEFAULT_CONTENT_DIR;
    db_name = DEFAULT_DB_NAME;
    
    # really hacky way to generate a unique filename
    archive_filename = "15418_spr13_backup_%s" % (datetime.now());
    archive_filename = archive_filename.replace(" ", "___");
    archive_filename = archive_filename.replace(":", "-");
    archive_filename += ".tgz";

    local_path = os.path.join(local_backup_dir, archive_filename);
    remote_path = "%s:%s" % (login, os.path.join(remote_backup_dir, archive_filename));
    
    # remove any old checkout and staging directories, if they exist 
    os.system("rm -rf %s" % SQL_DUMP_FILENAME);
    
    ##############################################################
    ## Okay, here we go:
    ##############################################################
    
    print "";
    print "******************************************************";
    print "This script performs a backup of 15418 site content:";
    print "The backup includes both the mysql database and the";
    print "contents of the site's content directory";
    print "";
    print "Backing up current site locally to:";
    print "   %s" % local_path;
    print "";
    print "Backup up current site remotely to:";
    print "   %s" % remote_path;
    print "";
    print "******************************************************";

    # create the DB dump
    execute("mysqldump -u root --password=\"%s\" %s > %s" % (DB_PASSWORD, db_name, SQL_DUMP_FILENAME));
    
    # create the full archive
    execute("tar -czf %s %s %s" % (archive_filename, content_dir, SQL_DUMP_FILENAME));

    # make local copy
    execute("cp %s %s" % (archive_filename, local_path));
    
    # copy to server
    execute("scp %s %s" % (archive_filename, remote_path));
