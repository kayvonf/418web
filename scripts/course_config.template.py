
#
# Main course web site configuration file.  This must be customized
# for each instance of the site.
#
# Edit accordingly and then save as: course_config.py
#

##################################################
# Git code repo parameters
##################################################

# There is a script scripts/deploy.py that automatically pulls the
# latest copy of your source tree and copies it into your web tree. If
# you use this script, it will pull from this branch of the repo

repo_url = "ssh://mygitserver/path/to/repo.git";

repo_branch = "release";

##################################################
# Database parameters
##################################################

# Database authentication

database_name = 'YOUR_DATABASE_NAME';

database_user = 'root';

database_passwd = 'YOUR_DATABASE_PASSWORD';

##################################################
# Apache configuration
##################################################

# Local Linux group that will own all code/content directories. By
# default www-data

webserver_group = 'www-data';

# base directory of the site relative to the web host's root.  e.g.,
# if your site is to be located at http://www.foo.com/mysite, then set
# site_base_dir to '/mysite'

site_code_base_url = '/mysite';

# base directory for storing uploaded content.  It is recommended you
# make this different from the base directory of the code itself to
# allow the uploaded content to be hosted elsewhere if need be. This
# separation makes it easy to update the site's code without worrying
# about losing uploaded data -- just wax the code tree and
# re-checkout/deploy a code update.
#
# e.g., # if you want content hosted from
# http://www.foo.com/mysitecontent, then set content_site_base_dir to
# '/mysitecontent'
#
# By convention, I've been adopting the following policy for my url
# structure in 418: if the site is deployed to
# http://www.foo.com/mysite/, then I place the uploaded content in
# http://www.foo.com/mysitecontent/

site_content_base_url = '/mysitecontent';

##################################################
# Local File System Paths
##################################################

# The next two variables are local file system paths for the base
# directories of deployed code and uploaded site content.

site_local_code_base_dir = '/var/www' + site_code_base_url;

site_local_content_base_dir = '/var/www' + site_content_base_url;

# If a site_backup_dir is specified, then the deploy script backs up
# the current site to this location prior to updating the live site
# (the script will create the directory for you if it does not exist)

site_backup_dir = '';

##################################################
# Miscellaneous configuration
##################################################

# Course web site name: string used in the title of generated pages

site_name = 'MY COURSE NAME : Spring 2015';

# This is a 'secret code' required to create an account.  It's a small
# amount of security to prevent anyone on the web from signing up.  I
# typically tell my students the code on the first day of class.  If
# the value is the empty string, then no code is required.

site_signup_code = '';

# Course system email: used in anytime an email is sent by the site

course_email = 'EMAIL@SERVER.COM';

# Name that displays in the from field of emails

email_display_name = 'MY COURSE News';

# If you want to use Google analytics on this site.  Add your site id here

google_analytics_id = ''; 
