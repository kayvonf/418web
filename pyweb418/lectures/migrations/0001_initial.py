# Generated by Django 3.1.1 on 2020-09-13 09:39

from django.db import migrations, models
import django.db.models.deletion
import lectures.models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Lecture',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('short_name', models.CharField(max_length=200, unique=True)),
                ('title', models.CharField(max_length=300)),
                ('subtitle', models.TextField()),
                ('readings', models.TextField(blank=True, null=True)),
                ('date', models.DateField()),
                ('number', models.CharField(max_length=10, unique=True)),
                ('num_slides', models.IntegerField(blank=True, null=True)),
                ('published', models.BooleanField(default=False)),
                ('scheduling_dummy', models.BooleanField(default=False)),
                ('pdf', models.FileField(blank=True, max_length=300, null=True, upload_to=lectures.models.lecture_upload_path)),
            ],
        ),
        migrations.CreateModel(
            name='LectureSlide',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('slide_number', models.IntegerField()),
                ('image_url', models.CharField(max_length=300)),
                ('image_width', models.IntegerField(null=True)),
                ('image_height', models.IntegerField(null=True)),
                ('thumb_url', models.CharField(max_length=300)),
                ('num_comments', models.IntegerField()),
                ('lecture', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='lectures.lecture')),
            ],
        ),
    ]