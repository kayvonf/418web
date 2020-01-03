
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS248, Winter 2020</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">INTERACTIVE COMPUTER GRAPHICS</div>


<div>
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/teaser.jpg'); ?>" width="800" height="125"></a>
</div>

<p style="padding-bottom: .15em">

This course provides a comprehensive introduction to computer
graphics, focusing on fundamental concepts and techniques, as well as
their cross-cutting relationship to multiple problem domains in
interactive graphics (such as rendering, animation, geometry, image
processing). Topics include: 2D and 3D drawing, sampling,
interpolation, rasterization, image compositing, the GPU graphics
pipeline (and parallel rendering), geometric transformations, curves
and surfaces, geometric data structures, subdivision, meshing, spatial
hierarchies, image processing, compression, time integration,
physically-based animation, and inverse kinematics.
</p>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Tues/Thurs noon-1:30pm</div>
<div>Room: Gates B1</div>
<div>Instructor: <a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a></div>

<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on course policies and logistics.</div>

</div>


<div class="overview_main_item overview_ruled_element">Winter 2020 Schedule</div>

<table>

<?php

function lecture_def($date, $title, $link, $fmt='', $topics_arg=array(), $deadlines_arg=array()) {
    return array('date' => $date,
                 'title' => $title,
                 'link' => $link,
                 'format' => $fmt,
                 'topics' => $topics_arg,
		 'deadlines' => $deadlines_arg);
}

/*
 * ======================================================================
 * =========== BEGIN LECTURES ARRAY =====================================
 * ======================================================================
 * 
 * Make a list of lectures here:
 *
 * Format of lecture_def() is:
 *     - Date of lecture (as a string)
 *     - Lecture Name
 *     - Url for lecture (If the lecture has been given, this is link to lecture summary page, else it's just '')
 *     - optional formatting options (only 'bold' is supported)
 *     - Array of sublines (often used for due dates)
 *
 * Here are some examples:
 * 
 * A lecture with a url:
 *    lecture_def('Jan 12', 'Why Parallelism?', lecture_url('whyparallelism'))
 * 
 * A lecture with no url since the lecture has not been given yet:
 *    lecture_def('Jan 12', 'Why Parallelism?', '', 'bold')
 *
 * More complicated:
 *
 * A lecture with multiple assignment due dates on the same day:
 *    lecture_def('Jan 21', 'Parallel Programming Models and their Corresponding HW/SW Implementations', lecture_url('progmodels'), '',
 *                array('Quiz 1 due (on Thu Jan 22)', 'Assignment 1 due (on Fri Jan 23)') )
 *
 * =======================================================================
 */

$lectures = array(

  lecture_def('Jan 7', 'Course Introduction + Intro to Drawing', '', 'bold',
              array('Breadth of graphics applications, simple drawing of lines')),

  lecture_def('Jan 9', 'Drawing a Triangle + Basics of Sampling Theory', '', 'bold',
              array('Drawing a triangle via point sampling, point-in-triangle testing, aliasing, Fourier interpretation of aliasing, anti-aliasing'),
	      array('- Programming Assignment 1 Released')),

  lecture_def('Jan 14', 'Cooordinate Spaces and Transformations', '', 'bold',
              array('Definition of linear transforms, basic geometric transforms, homogeneous coordinates, transform hierarchies, perspective projection')),

  lecture_def('Jan 16', 'Perspective Projection and Texture Mapping', '', 'bold',
              array('Perspective projection, texture coordinate space, bilinear/trilinear interpolation, how aliasing arises during texture sampling, prefiltering as an anti-aliasing technique')),

  lecture_def('Jan 21', 'The Rasterization Pipeline', '', 'bold',
              array('Z-buffer algorithm, image compositing, end-to-end 3D graphics pipeline as implemented by modern GPUs')),

  lecture_def('Jan 23', 'Introduction to Geometry', '', 'bold',
              array('Properties of surfaces (manifold, normal, curvature), implicit vs. explicit representations, basic representations such as triangle meshes, bezier curves and patches'),
	      array('- Programming Assignment 1 Due', '- Programming Assignment 2 Released')),

  lecture_def('Jan 28', 'Mesh Representations and Geometry Processing', '', 'bold',
              array('Half-edge mesh structures, mesh operations such as tessellation and simplification')),

  lecture_def('Jan 30', 'Geometric Queries', '', 'bold',
              array('Closest point, ray-triangle intersection, ray-mesh intersection, the relationship between rasterization and ray tracing')),

  lecture_def('Feb 4', 'Accelerating Geometric Queries', '', 'bold',
              array('Acceleration structures such as bounding volume hierarchies, K-D trees, uniform grids')),

  lecture_def('Feb 6', 'Materials, Lighting, and Shading', '', 'bold',
              array('Common material models, use of texture for lighting (bump mapping, environment mapping, prebaked lighting), motivating need for shaders on modern GPUs'),
	      array('- Programming Assignment 2 Due', '- Programming Assignment 3 Released')),

  lecture_def('Feb 11', 'Introduction to Animation', '', 'bold',
              array('Animation examples, splines, keyframing')),

  lecture_def('Feb 13', 'Kinematics and Motion Capture', '', 'bold',
              array('Optimization basics, inverse kinematics, motion graphs, methods of capturing human motion (motion capture suits, Kinect, computer vision methods)')),

  lecture_def('Feb 18', 'Dynamics and Time Integration', '', 'bold',
              array('basic numerical integration, forward Euler, mass-spring systems (e.g., for cloth simulation), particle systems')),

  lecture_def('Feb 20', 'Theory of Color', '', 'bold',
              array('How the eye works, color spaces, brightness and lightness, motivation for Gamma correction'),
	      array('- Programming Assignment 3 Due')),

  lecture_def('Feb 25', 'Image Compression and Basic Image Processing', '', 'bold',
              array('JPG image compression, image filtering via convolution (sharpening/blurring), non-linear filters')),


  lecture_def('Feb 27', 'Image Processing for Digital Photography', '', 'bold',
              array('Multi-resolution techniques, tone adjustment, trends in deep learning-based image manipulation'),
	      array('- Project Proposal Due')),

  lecture_def('Mar 3', 'Modern Rendering Techniques for the Real-Time Graphics Pipeline', '', 'bold',
              array('Shadow mapping, reflections, ambient occlusion, precomputed lighting, deferred shading, parallel rasterization'),
	      array('- Evening Exam')),

  lecture_def('Feb 5', 'Rendering Challenges of Virtual and Augmented Reality', '', 'bold',
              array('VR Headset hardware, how head-mounted displays cause challenges for renderers, resolution and latency requirements, judder, foveated rendering')),

  lecture_def('Mar 10', 'Efficient 3D Graphics on Mobile GPUs', '', 'bold',
              array('Energy efficient rendering on mobile phones, overview of recent research topics in computer graphics')),

  lecture_def('Mar 12', 'Course Recap', '', 'bold',
              array('Have a great Spring Break!')),

);


/*
 * ===================================================================
 * =========== END OF LECTURES ARRAY =================================
 * ===================================================================
 */


foreach ($lectures as $lecture)
{

?>

<tr>
<td class="schedule_date">
     <?php echo $lecture['date']; ?>
</td>

<td class="schedule_lecture">
     <div>
     <?php if (strlen($lecture['link']) > 0) { ?>

        <a href="<?php echo $lecture['link']; ?>"><?php echo $lecture['title']; ?></a>

     <?php } else { ?>

      <?php if ($lecture['format'] == 'bold') { ?>
           <span class="bold_text"><?php echo $lecture['title']; ?></span>
      <?php } else { ?>
        <?php echo $lecture['title']; ?>
     <?php } ?>

     <?php } ?>
     </div>

     <?php if (count($lecture['topics']) > 0) {
        foreach($lecture['topics'] as $topic) { ?>
     <div class="small_text colored_text">
     <?php echo $topic; ?>
     </div>
     <?php } } ?>

     <?php if (count($lecture['deadlines']) > 0) { ?>
        <div style="padding-left: 1em;">
        <?php foreach($lecture['deadlines'] as $deadline) { ?>
           <div class="small_text colored_text bold_text">
           <?php echo $deadline; ?>
           </div>
        <?php } ?>
        </div>
     <?php } ?>


</td>

</tr>

<?php
}
?>

</table>

<div class="overview_main_item overview_ruled_element">Programming Assignments</div>

<table>
<tr>
    <td class="schedule_date">Jan 23</td><td class="schedule_lecture"><span class="bold_text">Assignment 1: Write Your own SVG Renderer</span>
</td>
</tr>

<tr>
<td class="schedule_date">Feb 6</td><td class="schedule_lecture"><span class="bold_text">Assignment 2: A Mini 3D Triangle Mesh Editor</span>
</td>
</tr>

<tr>
 <td class="schedule_date">Feb 20</td><td class="schedule_lecture"><span class="bold_text">Assignment 3: Lighting and Materials In GLSL</span></td>
</tr>

<tr>
 <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 4: Self-Selected Final Project</span></td>
</tr>

</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
