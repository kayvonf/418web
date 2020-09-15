from django.apps import AppConfig


class LecturesConfig(AppConfig):
    name = 'lectures'

    def ready(self):
        import lectures.signals.handlers #noqa
