import markdown
# Use datetime if not localizing timezones
import datetime
# Otherwise use timezone
from django.utils import timezone 

from django import template

register = template.Library()

@register.filter
def days_ago(time, days):
    return time + datetime.timedelta(days=days) < timezone.now() # or timezone.now() if your time is offset-aware


@register.filter
def markdownify(text):
    # safe_mode governs how the function handles raw HTML
    return markdown.markdown(text, safe_mode='escape',
                             extensions=['pymdownx.pathconverter'],
                             extension_configs={
                                 "pymdownx.pathconverter": {
                                     'base_path': '//',
                                     "absolute": True
                                 }})
