from django.shortcuts import render,get_list_or_404
from lectures.models import Lecture, LectureSlide

# Create your views here.
def index(request):
    lectures = Lecture.objects.filter().order_by('date')
    return render(request, 'home.html', {'lectures': lectures})

def courseinfo(request):
    return render(request, 'courseinfo.html')
