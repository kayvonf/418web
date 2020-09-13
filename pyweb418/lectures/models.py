from django.db import models
from django.conf import settings
import os

# Create your models here.
def lecture_upload_path(instance, filename):
    return os.path.join(instance.short_name, filename)

class Lecture(models.Model):
    short_name = models.CharField(max_length=200, unique=True)
    title = models.CharField(max_length=300)
    subtitle = models.TextField()
    readings  = models.TextField(null=True, blank=True)
    date = models.DateField()
    number = models.CharField(max_length=10, unique=True)
    num_slides = models.IntegerField()
    published = models.BooleanField(default=False)
    scheduling_dummy = models.BooleanField(default=False)
    pdf = models.FileField(upload_to=lecture_upload_path, max_length=300,
                           null=True, blank=True)

class LectureSlide(models.Model):
    lecture = models.ForeignKey(Lecture, on_delete=models.CASCADE)
    slide_number = models.IntegerField()
    image_url = models.CharField(max_length=300)
    thumb_url = models.CharField(max_length=300)
    num_comments = models.IntegerField()

    
