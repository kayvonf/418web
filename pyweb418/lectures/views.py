from django.shortcuts import render, get_object_or_404, get_list_or_404
from django.http import HttpResponse
from django.urls import reverse
from .models import Lecture, LectureSlide

# Create your views here.
def index(request):
    lectures = get_list_or_404(Lecture)
    return render(request, 'lectures/index.html', {'lectures': lectures})

def lecture(request, lecture_shortname):
    lecture = get_object_or_404(Lecture, short_name=lecture_shortname)
    lecture_slides = LectureSlide.objects.filter(lecture=lecture.pk).order_by('slide_number')
    return render(request, 'lectures/lecture.html', {
        'lecture': lecture,
        'lecture_slides': lecture_slides}
    )

def slide(request, lecture_shortname, slide_number):
    lecture = get_object_or_404(Lecture, short_name=lecture_shortname)
    lecture_slide = get_object_or_404(LectureSlide, lecture=lecture.pk, slide_number=slide_number)
    params = {'lecture': lecture,
              'lecture_slide': lecture_slide,
              'slide_image_width': 100,
              'slide_image_height': 100}
    return render(request, 'lectures/lecture_slide.html', params)

