from django.http import HttpResponseRedirect
from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from django.core.exceptions import ValidationError
from django.contrib.auth.models import User
from django.urls import reverse

from .models import Student

from .forms import CreateForm, EditForm

def create(request):
    form = CreateForm()
    return render(request, 'students/create.html', {'form': form})


def do_create(request):
    form = CreateForm(request.POST, request.FILES)
    try:
        if not form.is_valid():
            raise ValidationError('')
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

        return HttpResponseRedirect(reverse('students:edit'))
    except ValidationError:
        # Redisplay the question voting form.
        return render(request, 'students/create.html', {
            'form': form
        })



def login(request):
    return render(request, 'students/login.html')


def do_login(request):
    return render(request, 'students/login.html')


@login_required
def logout(request):
    return render(request, 'students/logout.html')


@login_required
def edit(request):
    form = EditForm()
    return render(request, 'students/edit.html', {'form': form})


@login_required
def do_edit(request):
    form = EditForm(request.POST, request.FILES)
    try:
        if not form.is_valid():
            raise ValidationError('')
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

        return HttpResponseRedirect(reverse('students:edit'))
    except ValidationError:
        # Redisplay the question voting form.
        return render(request, 'students/edit.html', {
            'form': form
        })
