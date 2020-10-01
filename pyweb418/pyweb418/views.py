from django.shortcuts import render,get_list_or_404
from lectures.models import Lecture, LectureSlide
from django_comments.models import Comment

# Create your views here.
def index(request):
    lectures = Lecture.objects.filter().order_by('date')
    return render(request, 'home.html', {'lectures': lectures})


def courseinfo(request):
    return render(request, 'courseinfo.html')


def newsfeed(request):
    recent_comments = [
        (c, LectureSlide.objects.get(pk=c.object_pk))
        for c in Comment.objects.filter(is_removed=False).order_by('-submit_date')[:100]
    ]
    return render(request, 'newsfeed.html',
                  {'recent_comments': recent_comments})
