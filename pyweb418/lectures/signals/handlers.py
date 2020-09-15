from django.conf import settings
from django.contrib.sites.shortcuts import get_current_site
from django_comments.signals import comment_was_posted
from django.dispatch import receiver
from django.core.mail import send_mail
from django.template import loader
from django.urls import reverse
from smtplib import SMTPException
from lectures.models import LectureSlide

@receiver(comment_was_posted)
def handle_comment_was_posted(sender, **kwargs):
    comment = kwargs['comment']
    request = kwargs['request']

    content_object = comment.content_object

    content_object_uri = ''
    if isinstance(content_object, LectureSlide):
        lecture_slide = content_object
        content_object_uri = request.build_absolute_uri(reverse(
            'lectures:lecture_slide', args=(lecture_slide.lecture.short_name, lecture_slide.slide_number)))
    c = {
        'comment': comment,
        'content_object': content_object,
        'content_object_uri': content_object_uri
    }

    all_users = set()
    for comment in sender.objects.filter(content_type=comment.content_type, object_pk=comment.object_pk):
        all_users.add(comment.user)

    recipient_list = [user.email for user in all_users]

    t = loader.get_template('comments/comment_notification_email.txt')

    # Email all users about new comment
    print(content_object)
    subject = ('[{site:s}] New comment posted on "{obj:s}"'.format(
        site=get_current_site(request).name,
        obj=str(content_object)
    ))
    message = t.render(c)

    try:
        send_mail(subject, message, settings.DEFAULT_FROM_EMAIL, recipient_list)
    except SMTPException as e:
        print(e)
    print('sent mail')
