from django.conf import settings
from django.http import HttpResponseRedirect
from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from django.core.exceptions import ValidationError
from django.contrib.auth.models import User
import django.contrib.auth as auth
from django.urls import reverse
from django.views.decorators.cache import never_cache
from django_comments.models import Comment

from .models import Student
from .forms import CreateForm, EditForm, LoginForm

import random
import os
import os.path
import shutil

def create(request):
    form = CreateForm()
    needs_signup_code = settings.STUDENTS_SIGNUP_CODE is not None
    return render(request, 'students/create.html', {
        'form': form,
        'needs_signup_code': needs_signup_code})


def do_create(request):
    needs_signup_code = settings.STUDENTS_SIGNUP_CODE is not None
    form = CreateForm(request.POST, request.FILES)
    try:
        if not form.is_valid():
            raise ValidationError('')

        if needs_signup_code:
            signup_code = form.cleaned_data['secretcode']
            if signup_code != settings.STUDENTS_SIGNUP_CODE:
                error = ValidationError('Signup code is not correct.')
                form.add_error('secretcode', error)
                raise error

        pass1 = form.cleaned_data['password1']
        pass2 = form.cleaned_data['password2']
        if pass1 != pass2:
            error = ValidationError('Passwords do not match.')
            form.add_error('password1', error)
            raise error

        username = form.cleaned_data['username']
        first_name = form.cleaned_data['firstname']
        last_name = form.cleaned_data['lastname']
        email = form.cleaned_data['email']
        password = form.cleaned_data['password1']
        suid = form.cleaned_data['suid']
        major = form.cleaned_data['major']
        year = form.cleaned_data['year']
        photo = form.cleaned_data['photo']

        if User.objects.filter(username=username).first():
            error = ValidationError('Username already taken.')
            form.add_error('username', error)
            raise error

        if photo is None:
            rand_int = random.randint(1, 5)
            default_image_path = os.path.join(settings.BASE_DIR, 'pyweb418/static/images/robot{:d}.jpg'.format(rand_int))
            media_dir = os.path.join('users', username)
            abs_media_dir = os.path.join(settings.MEDIA_ROOT, media_dir)
            os.makedirs(abs_media_dir, exist_ok=True)
            img_path = os.path.join(abs_media_dir, 'profile.jpg')
            shutil.copy(default_image_path, img_path)
            photo = os.path.join(media_dir, 'profile.jpg')

        user = User.objects.create_user(
            username=username,
            first_name=first_name,
            last_name=last_name,
            email=email,
            password=password,
        )
            
        student = Student(
            user=user,
            suid=suid,
            major=major,
            year=year,
            photo=photo)
        student.save()

        auth.login(request, user)

        return HttpResponseRedirect(reverse('students:edit') + "?created=true")
    except ValidationError:
        # Redisplay the question voting form.
        return render(request, 'students/create.html', {
            'form': form,
            'needs_signup_code': needs_signup_code
        })



def login(request):
    return render(request, 'students/login.html', {'form': LoginForm()})


def do_login(request):
    form = LoginForm(request.POST, request.FILES)
    try:
        if not form.is_valid():
            raise ValidationError('')

        username = form.cleaned_data['username']
        password = form.cleaned_data['password']
        user = auth.authenticate(request, username=username, password=password)
        if user is not None:
            auth.login(request, user)
            return HttpResponseRedirect(reverse('students:edit'))
        else:
            if User.objects.filter(username=username).first() is None:
                err = ValidationError('User does not exist.')
                form.add_error('username', err)
                raise err
            err = ValidationError('Password is incorrect.')
            form.add_error('password', err)
            raise err
    except ValidationError:
        # Redisplay the question voting form.
        return render(request, 'students/login.html', {
            'form': form
        })


@login_required
@never_cache
def logout(request):
    auth.logout(request)
    return HttpResponseRedirect(reverse('students:login'))


@login_required
@never_cache
def edit(request):
    user = request.user
    form_data = {
        'firstname': user.first_name,
        'lastname': user.last_name,
        'email': user.email,
    }
    student = Student.objects.filter(user=user).first()
    if student:
        form_data.update({
            'suid': student.suid,
            'major': student.major,
            'year': student.year,
            'photo': student.photo,
        })
    form = EditForm(form_data)

    template_data = {'form': form}

    print(request.GET.get('created'))
    if request.GET.get('created', None) == 'true':
        template_data['created'] = True

    if request.GET.get('updated', None) == 'true':
        template_data['updated'] = True

    template_data['num_comments'] = len(Comment.objects.filter(user=user))

    return render(request, 'students/edit.html', template_data)


@login_required
def do_edit(request):
    form = EditForm(request.POST, request.FILES)
    try:
        if not form.is_valid():
            raise ValidationError('')
            raise error

        first_name = form.cleaned_data['firstname']
        last_name = form.cleaned_data['lastname']
        email = form.cleaned_data['email']
        suid = form.cleaned_data['suid']
        major = form.cleaned_data['major']
        year = form.cleaned_data['year']
        photo = form.cleaned_data['photo']

        user = request.user

        user.first_name = first_name
        user.last_name = first_name
        user.email = email
        
        student = Student.objects.get(user=user)
        student.suid = suid
        student.major = major
        student.year = year
        if photo:
            student.photo = photo

        user.save()
        student.save()

        return HttpResponseRedirect(reverse('students:edit') + '?updated=true')
    except ValidationError:
        # Redisplay the question voting form.
        return render(request, 'students/edit.html', {
            'form': form
        })


def reset_password(request):
    pass
