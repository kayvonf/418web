"""
Django settings for pyweb418 project.

Generated by 'django-admin startproject' using Django 3.1.1.

For more information on this file, see
https://docs.djangoproject.com/en/3.1/topics/settings/

For the full list of settings and their values, see
https://docs.djangoproject.com/en/3.1/ref/settings/
"""

from pathlib import Path
import os

# Build paths inside the project like this: BASE_DIR / 'subdir'.
BASE_DIR = Path(__file__).resolve().parent.parent


LOCAL_PREFIX = ''
LOCAL_CONFIG = {
    'prefix': LOCAL_PREFIX,
    'allowed_hosts': [],
    'secret_key': 'e5xj$ejn160m^rvl-x-2b%m5c=ii@gahp7ay%95aq+h4jux$4*',
    'db_path': BASE_DIR / 'db.sqlite3',
    'static_url': '/static/',
    'static_root': os.path.expanduser('~/pyweb418_static'),
    'media_url': '/media/',
    'media_root': os.path.expanduser('~/pyweb418_media'),
    'magick_cmd': 'magick convert',
}

PREFIX = LOCAL_PREFIX
CONFIG = LOCAL_CONFIG

if False:
    PROD_PREFIX = 'fall20-dev'
    with open('/etc/pyweb418/{:s}/django_secret.txt'.format(PROD_PREFIX)) as f:
        skey = f.read()

    PROD_CONFIG = {
        'prefix': PROD_PREFIX,
        'allowed_hosts': ['cs149.stanford.edu', '35.227.169.186'],
        'force_script_name': '{:s}/'.format(PROD_PREFIX),
        'secret_key': skey,
        'db_path': '/etc/pyweb418/{:s}/db.sqlite3'.format(PROD_PREFIX),
        'static_url': '/{:s}content/static'.format(PROD_PREFIX),
        'static_root': '/var/www/cs149/{:s}content/static'.format(PROD_PREFIX),
        'media_url': '/{:s}content/media'.format(PROD_PREFIX),
        'media_root': '/var/www/cs149/{:s}content/media'.format(PROD_PREFIX),
        'magick_cmd': 'convert',
    }

    #EMAIL_BACKEND = 'django.core.mail.backends.smtp.EmailBackend'
    #EMAIL_HOST = 'smtp.gmail.com'
    #EMAIL_USE_TLS = True
    #EMAIL_PORT = 587
    #EMAIL_HOST_USER = 'your_account@gmail.com'
    #EMAIL_HOST_PASSWORD = 'your account’s password'

    PREFIX = PROD_PREFIX
    CONFIG = PROD_CONFIG


# Quick-start development settings - unsuitable for production
# See https://docs.djangoproject.com/en/3.1/howto/deployment/checklist/

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = True

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = CONFIG['secret_key']

ALLOWED_HOSTS = CONFIG['allowed_hosts']
if 'force_script_name' in CONFIG:
    FORCE_SCRIPT_NAME = CONFIG['force_script_name']


# Application definition

INSTALLED_APPS = [
    'lectures.apps.LecturesConfig',
    'students.apps.StudentsConfig',
    'django_comments',
    'django.contrib.sites',
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
]

MIDDLEWARE = [
    'django.middleware.security.SecurityMiddleware',
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'django.middleware.clickjacking.XFrameOptionsMiddleware',
]

ROOT_URLCONF = 'pyweb418.urls'

TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': [BASE_DIR / 'pyweb418/templates'],
        'APP_DIRS': True,
        'OPTIONS': {
            'context_processors': [
                'django.template.context_processors.debug',
                'django.template.context_processors.request',
                'django.contrib.auth.context_processors.auth',
                'django.contrib.messages.context_processors.messages',
                'django.template.context_processors.media',
            ],
        },
    },
]

WSGI_APPLICATION = 'pyweb418.wsgi.application'


# Database
# https://docs.djangoproject.com/en/3.1/ref/settings/#databases

DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.sqlite3',
        'NAME': CONFIG['db_path'],
    }
}

# Email
EMAIL_BACKEND = 'django.core.mail.backends.console.EmailBackend'
DEFAULT_FROM_EMAIL="noreply@cs149.stanford.edu"

# Password validation
# https://docs.djangoproject.com/en/3.1/ref/settings/#auth-password-validators

AUTH_PASSWORD_VALIDATORS = [
    {
        'NAME': 'django.contrib.auth.password_validation.UserAttributeSimilarityValidator',
    },
    {
        'NAME': 'django.contrib.auth.password_validation.MinimumLengthValidator',
    },
    {
        'NAME': 'django.contrib.auth.password_validation.CommonPasswordValidator',
    },
    {
        'NAME': 'django.contrib.auth.password_validation.NumericPasswordValidator',
    },
]

# Login url
LOGIN_URL = '/students/login'

# Internationalization
# https://docs.djangoproject.com/en/3.1/topics/i18n/

LANGUAGE_CODE = 'en-us'

TIME_ZONE = 'UTC'

USE_I18N = True

USE_L10N = True

USE_TZ = True

# For Sites app
SITE_ID = 1

# Static files (CSS, JavaScript, Images)
# https://docs.djangoproject.com/en/3.1/howto/static-files/

STATIC_URL = CONFIG['static_url']
STATIC_ROOT = CONFIG['static_root']

STATICFILES_DIRS = [
    BASE_DIR / "pyweb418" / "static",
]

MEDIA_ROOT = CONFIG['media_root']
MEDIA_URL = CONFIG['media_url']

# Students app settings
STUDENTS_SIGNUP_CODE = 'cs149remote'

# Lecture app settings

LECTURES_CONVERT_COMMAND = CONFIG['magick_cmd']

LECTURES_IMAGES_DIR = 'images'
LECTURES_IMAGE_PATH_PREFIX = 'slide'

LECTURES_THUMBS_DIR = 'thumbs'
LECTURES_THUMB_PATH_PREFIX = 'thumb'

LECTURES_SLIDE_IMAGE_HEIGHT = 600
LECTURES_SLIDE_IMAGE_QUALITY = 85

LECTURES_SLIDE_THUMB_HEIGHT = 130
LECTURES_SLIDE_THUMB_QUALITY = 95
