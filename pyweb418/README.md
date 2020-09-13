## Getting the website setup

```
mkdir ~/pyweb418_media                     # Create the default uploaded media directory
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
