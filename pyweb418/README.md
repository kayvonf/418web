
# 1. Clone repo
# 2. Create directory /etc/cs149fall23
# 3. Put sendgrid.env in that directory
# 4. Generate unique django secret key

How to create a unique django secret key:
https://humberto.io/blog/tldr-generate-django-secret-key/

From a django environment, such as the one in:
/home/kayvonf/courses/websites-mar22-venv

python -c 'from django.core.management.utils import get_random_secret_key; print(get_random_secret_key())'

# 5. Set ownership of /etc/pyweb418/cs149fall23 to www-data  (chown -R www-data:www-data cs149fall23)

# 6. Update /etc/apache2/sites-available/000-default.conf
     (restart apache: service apache2 restart
# 7. Update /var/www/cs149/.htaccess

# 8. Generate the site:
       sudo python3 manage.py collectstatic
       sudo python3 manage.py makemigrations lectures
       sudo python3 manage.py migrate
       sudo python3 manage.py createsuperuser

# 9. Make the database file writable to www-data
# 10. Make the /var/www/cs149/fall23content writable to www-data

# 11. In admin console, change name of site from example.com to cs149.stanford.edu


## Getting the website setup

Setup the SMTP server for sending email

```
sudo apt-get update
sudo apt install mailutils
sed /etc/postfix/main.cf
```

Set the secret key in `settings.py` to the development secret key

```
mkdir ~/pyweb418_media                     # Create the default uploaded media directory
python3 manage.py collectstatic
python3 manage.py makemigrations lectures  # Setup the database tables
python3 manage.py migrate                  # Setup the database tables
python manage.py createsuperuser           # Create an admin account
```

## When changing any model files

```
python3 manage.py makemigrations
```

then

```
python3 manage.py migrate
```

## When adding or changing any static files

```
python3 manage.py collectstatic
```
