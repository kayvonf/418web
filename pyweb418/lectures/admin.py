from django.contrib import admin
from django.conf import settings
from .models import Lecture, LectureSlide
from PIL import Image

import os
import shutil

admin.site.register(LectureSlide)

def im_convert(input_path, image_height, image_quality, output_path):
    cmd = (
        '{exe:s} {input_path:s} '
        '-resize x{image_height:d} '
        '-quality {image_quality:d} '
        '-scene 1 {output_path:s}').format(
            exe=settings.LECTURES_CONVERT_COMMAND,
            input_path=input_path,
            image_height=image_height,
            image_quality=image_quality,
            output_path=output_path,
        )
    os.system(cmd)

@admin.register(Lecture)
class LectureAdmin(admin.ModelAdmin):
    exclude=("num_slides ",)
    readonly_fields=('num_slides', )

    def save_model(self, request, obj, form, change):
        is_new_obj = obj._state.adding
        super().save_model(request, obj, form, change)
        # Process pdf into images
        if 'pdf' in form.changed_data:
            pdf_dir = os.path.dirname(obj.pdf.name)
            abs_pdf_path = os.path.join(settings.MEDIA_ROOT, obj.pdf.name)
            slide_images_dir = os.path.join(
                pdf_dir,
                settings.LECTURES_IMAGES_DIR) # Relative to MEDIA_ROOT
            output_path_template = os.path.join(
                settings.MEDIA_ROOT,
                slide_images_dir,
                settings.LECTURES_IMAGE_PATH_PREFIX + '_%03d.jpg')
            abs_slide_images_dir = os.path.join(settings.MEDIA_ROOT, slide_images_dir)
            if os.path.exists(abs_slide_images_dir):
                shutil.rmtree(abs_slide_images_dir)
            os.makedirs(abs_slide_images_dir)
            im_convert(
                input_path=abs_pdf_path,
                image_height=settings.LECTURES_SLIDE_IMAGE_HEIGHT,
                image_quality=settings.LECTURES_SLIDE_IMAGE_QUALITY,
                output_path=output_path_template)
            # Get list of pdf pages
            thumb_images_dir = os.path.join(
                pdf_dir,
                settings.LECTURES_THUMBS_DIR)
            image_paths = os.listdir(os.path.join(settings.MEDIA_ROOT, slide_images_dir))
            slides = {}
            for path in image_paths:
                if not path.endswith('.jpg'):
                    continue
                slide_number = int(path.split('_')[1][:3])
                slides[slide_number] = {'image_path': os.path.join(slide_images_dir, path)}
            # Create thumbnails for each image
            abs_thumb_images_dir = os.path.join(settings.MEDIA_ROOT, thumb_images_dir)
            if os.path.exists(abs_thumb_images_dir):
                shutil.rmtree(abs_thumb_images_dir)
            os.makedirs(abs_thumb_images_dir)
            for slide_number, slide in slides.items():
                image_path = slide['image_path']
                thumb_path = os.path.join(
                    thumb_images_dir,
                    settings.LECTURES_THUMB_PATH_PREFIX + '_{:03d}.jpg'.format(slide_number))
                input_path = os.path.join(settings.MEDIA_ROOT, image_path)
                im_convert(
                    input_path=input_path,
                    image_height=settings.LECTURES_SLIDE_THUMB_HEIGHT * 2,
                    image_quality=settings.LECTURES_SLIDE_THUMB_QUALITY,
                    output_path=os.path.join(settings.MEDIA_ROOT, thumb_path))
                slide['thumb_path'] = thumb_path
                im = Image.open(input_path)
                width, height = im.size
                slide['image_width'] = width
                slide['image_height'] = height

            # Create lecture slide for each pdf page
            if obj.num_slides is None: # Check if num slides has been set, which means slides have been created
                obj.num_slides = len(slides)
                obj.save()
                for i in range(1, obj.num_slides + 1):
                    slide_obj = LectureSlide(
                        lecture=obj,
                        slide_number=i,
                        num_comments=0)
                    slide_obj.save()

            for slide_number, slide in slides.items():
                slide_obj = LectureSlide.objects.get(lecture=obj, slide_number=slide_number)
                slide_obj.image_url = slide['image_path']
                slide_obj.image_width = slide['image_width']
                slide_obj.image_height = slide['image_height']
                slide_obj.thumb_url = slide['thumb_path']
                slide_obj.save()
