from django.urls import path

from . import views

app_name='lectures'
urlpatterns = [
    path('', views.index, name='index'),
    path('<slug:lecture_shortname>/', views.lecture, name='lecture'),
    path('<slug:lecture_shortname>/slide_<int:slide_number>', views.slide, name='lecture_slide'),
]
