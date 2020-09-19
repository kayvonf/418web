from django.shortcuts import render, get_object_or_404, get_list_or_404
from django.http import HttpResponse
from django.urls import reverse
from django.conf import settings
from .models import Lecture, LectureSlide

# Create your views here.
def index(request):
    lectures = Lecture.objects.filter(published=True).order_by('date')
    return render(request, 'lectures/index.html', {'lectures': lectures})

def lecture(request, lecture_shortname):
    lecture = get_object_or_404(Lecture, short_name=lecture_shortname)
    lecture_slides = LectureSlide.objects.filter(lecture=lecture.pk).order_by('slide_number')
    first_slide = lecture_slides.first()
    aspect_ratio = first_slide.image_height / first_slide.image_width
    thumbnail_height = settings.LECTURES_SLIDE_THUMB_HEIGHT
    thumbnail_width = settings.LECTURES_SLIDE_THUMB_HEIGHT / aspect_ratio
    horiz_spacing = thumbnail_width + 7
    return render(request, 'lectures/lecture.html', {
        'lecture': lecture,
        'lecture_slides': lecture_slides,
        'lecture_slide_thumbnail_height': thumbnail_height,
        'lecture_slide_thumbnail_width': thumbnail_width,
        'slide_thumbnail_horiz_spacing': horiz_spacing,
    })

def slide(request, lecture_shortname, slide_number):
    lecture = get_object_or_404(Lecture, short_name=lecture_shortname)
    lecture_slide = get_object_or_404(LectureSlide, lecture=lecture.pk, slide_number=slide_number)
    aspect_ratio = lecture_slide.image_height / lecture_slide.image_width
    slide_width = settings.LECTURES_SLIDE_IMAGE_HEIGHT / aspect_ratio
    slide_height = settings.LECTURES_SLIDE_IMAGE_HEIGHT
    params = {'lecture': lecture,
              'lecture_slide': lecture_slide,
              'slide_image_width': slide_width,
              'slide_image_height': slide_height}
    return render(request, 'lectures/lecture_slide.html', params)
