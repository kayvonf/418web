import argparse
import sys
import os

import course_config

# This script assumes that slide names will be somename_somenumber where
# somenumber will always be 3 digits, 0 padded on the left.
QUERY = '''
UPDATE
    comments
    INNER JOIN
        (SELECT
            id,
            parent_item,
            SUBSTRING_INDEX(parent_item, '_', 1) AS slide_prefix,
            CAST(SUBSTRING_INDEX(parent_item, '_', -1) AS UNSIGNED INTEGER) AS slide_num
        FROM comments) temp
    ON comments.id = temp.id
    INNER JOIN
        (SELECT id, shortname FROM lectures) lec
    ON comments.parent_id = lec.id
SET comments.parent_item = CONCAT(temp.slide_prefix, '_', LPAD(temp.slide_num + {0.increment}, 3, '0'))
WHERE
    comments.parent_type = 'LECTURE' AND
    lec.shortname = '{0.lecture}' AND
    temp.slide_num >= {0.slide}
'''

def execute(cmd):
    print "Executing: %s" % cmd;
    if os.system(cmd) != 0:
        print "ERROR EXECUTING %s: ABORTING" % cmd;
        sys.exit(-1);

def geq(num):
    def pred(value):
        ivalue = int(value)
        if ivalue < num:
            raise argparse.ArgumentTypeError("%s is not greater than or equal to %d" % (value, num))
        return ivalue
    return pred

if __name__ == "__main__":
    parser = argparse.ArgumentParser(description="Shift lecture slide comments")
    parser.add_argument("lecture", help="shortname of lecture to update")
    parser.add_argument("slide", type=geq(0), help="starting slide to shift (inclusive)")
    parser.add_argument("increment", help="amount to shift")

    args = parser.parse_args()

    mysql_commands = QUERY.format(args)
    execute("mysql --user %s -p %s -e \"%s\"" % (course_config.database_user, course_config.database_name, mysql_commands));
