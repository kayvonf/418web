from django import forms

class CreateForm(forms.Form):
    secretcode = forms.CharField(max_length=100, required=False)
    username = forms.CharField(max_length=300)
    firstname = forms.CharField()
    lastname = forms.CharField()
    password1 = forms.CharField(widget=forms.PasswordInput)
    password2 = forms.CharField(widget=forms.PasswordInput)
    email = forms.EmailField()
    suid = forms.CharField()
    major = forms.CharField()
    year = forms.CharField()
    photo = forms.ImageField(required=False)

    def __init__(self, *args, **kwargs):
        super(CreateForm, self).__init__(*args, **kwargs)
        for visible in self.visible_fields():
            if visible.name == 'photo':
                continue
            visible.field.widget.attrs['class'] = 'form_input_box'


class EditForm(forms.Form):
    firstname = forms.CharField()
    lastname = forms.CharField()
    email = forms.EmailField()
    suid = forms.CharField()
    major = forms.CharField()
    year = forms.CharField()
    photo = forms.ImageField(required=False)

    def __init__(self, *args, **kwargs):
        super(EditForm, self).__init__(*args, **kwargs)
        for visible in self.visible_fields():
            if visible.name == 'photo':
                continue
            visible.field.widget.attrs['class'] = 'form_input_box'
