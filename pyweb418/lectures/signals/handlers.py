from django.conf import settings
from django.contrib.sites.shortcuts import get_current_site
from django_comments.signals import comment_was_posted
from django.dispatch import receiver
from django.core.mail import send_mail
from django.template import loader
from django.urls import reverse
from smtplib import SMTPException
from lectures.models import LectureSlide

import os
from sendgrid import SendGridAPIClient
from sendgrid.helpers.mail import Mail

@receiver(comment_was_posted)
def handle_comment_was_posted(sender, **kwargs):
    comment = kwargs['comment']
    request = kwargs['request']

    content_object = comment.content_object

    content_object_uri = ''
    if isinstance(content_object, LectureSlide):
        lecture_slide = content_object
        current_site = get_current_site(request)
        #domain_name = current_site.domain
        domain_name = "35.227.169.186"
        #FIXME(kayvonf):
        content_object_uri = ''.join([
            'http://', domain_name, 
            reverse('lectures:lecture_slide',
                    args=(lecture_slide.lecture.short_name, lecture_slide.slide_number))])
    c = {
        'comment': comment,
        'content_object': content_object,
        'content_object_uri': content_object_uri
    }

    all_users = set()
    for ncomment in sender.objects.filter(content_type=comment.content_type, object_pk=comment.object_pk):
        if ncomment.user.username == comment.user.username:
            continue
        all_users.add(ncomment.user)

    # Filter user if they posted the comment
    recipient_list = [user.email for user in all_users]

    if len(recipient_list) == 0:
        return
    
    t = loader.get_template('comments/comment_notification_email.txt')

    # Email all users about new comment
    subject = ('[{site:s}] New comment posted on "{obj:s}"'.format(
        site=current_site.name,
        obj=str(content_object)
    ))
    html_content = t.render(c)

    message = Mail(
        from_email=settings.SENDGRID_EMAIL,
        to_emails=recipient_list,
        subject=subject,
        html_content=html_content,
        is_multiple=True)

    with open(settings.SENDGRID_KEY_PATH, 'r') as f:
        sendgrid_key = f.read().strip()
    try:
        sg = SendGridAPIClient(sendgrid_key)
        response = sg.send(message)
    except Exception as e:
        print('Could not send mail!!!', e, settings.SENDGRID_EMAIL)
