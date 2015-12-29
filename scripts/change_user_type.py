import os
import sys
import argparse

import course_config

def execute(cmd):
    print "Executing: %s" % cmd;
    if os.system(cmd) != 0:
        print "ERROR EXECUTING %s: ABORTING" % cmd;
        sys.exit(-1);
        
           
if __name__ == "__main__":
    
    parser = argparse.ArgumentParser(description="Update a website user type");
    parser.add_argument("username", help="user to modify");
    parser.add_argument("usertype", help="set user to the specified type");

    args = parser.parse_args();

    if not (args.usertype == "ta" or args.usertype == "instructor" or args.usertype == "student"):
        parser.error("Please specify a valid user type. [instructor, ta, student]");

    mysql_commands =  "update users set type='%s' where username='%s';" % (args.usertype, args.username);

    execute("mysql --user %s -p %s -e \"%s\"" % (course_config.database_user, course_config.database_name, mysql_commands));

