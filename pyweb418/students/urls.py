from django.urls import path

from . import views

app_name='students'
urlpatterns = [
    path('create', views.create, name='create'),
    path('do_create', views.do_create, name='do_create'),
    path('login', views.login, name='login'),
    path('do_login', views.do_login, name='do_login'),
    path('logout', views.logout, name='logout'),
    path('edit', views.edit, name='edit'),
    path('do_edit', views.do_edit, name='do_edit'),
    path('reset_password', views.reset_password, name='reset_password'),
]
