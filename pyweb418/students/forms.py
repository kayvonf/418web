from django import forms

class StyledForm(forms.Form):
    def __init__(self, *args, **kwargs):
        super(StyledForm, self).__init__(*args, **kwargs)
        for visible in self.visible_fields():
            if visible.name == 'photo':
                continue
            visible.field.widget.attrs['class'] = 'form_input_box'


class CreateForm(StyledForm):
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


class LoginForm(StyledForm):
    username = forms.CharField()
    password = forms.CharField(widget=forms.PasswordInput)


class EditForm(StyledForm):
    firstname = forms.CharField()
    lastname = forms.CharField()
    email = forms.EmailField()
    suid = forms.CharField()
    major = forms.CharField()
    year = forms.CharField()
    photo = forms.ImageField(required=False)
