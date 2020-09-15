from django.db import models
from django.conf import settings
from django.contrib.auth.models import User

import os.path

# Create your models here.
def student_upload_path(instance, filename):
    return os.path.join('users', instance.user.username, 'profile.jpg')

class Student(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    suid = models.CharField(max_length=30)
    major = models.CharField(max_length=100)
    year = models.CharField(max_length=10)
    photo = models.ImageField(upload_to=student_upload_path,
                              null=True, blank=True)

    def __str__(self):
        return '{:s} {:s} (username: {:s}, suid: {:s})'.format(self.user.first_name, self.user.last_name, self.user.username, self.suid)
