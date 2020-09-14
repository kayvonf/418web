from django.db import models
from django.conf import settings
from django.contrib.auth.models import User

# Create your models here.
def student_upload_path(instance, filename):
    return os.path.join(instance.user.username, filename)

class Student(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    suid = models.CharField(max_length=30)
    major = models.CharField(max_length=100)
    year = models.CharField(max_length=10)
    photo = models.ImageField(upload_to=student_upload_path,
                              null=True, blank=True)
