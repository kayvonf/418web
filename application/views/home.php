
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS248, Winter 2019</div>
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


<div class="overview_main_item overview_ruled_element">Winter 2019 Schedule</div>

<table>

<?php

function lecture_def($date, $title, $link, $fmt='', $extras=array()) {
    return array('date' => $date,
                 'title' => $title,
                 'link' => $link,
                 'format' => $fmt,
                 'deadlines' => $extras);
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

  lecture_def('Jan 8', 'Course Introduction + Intro to Drawing', lecture_url('introduction'), '',
              array('Breadth of graphics, simple drawing of lines')),

  lecture_def('Jan 10', 'Drawing a Triangle + Basics of Sampling Theory', lecture_url('drawtriangle'), '',
              array('Drawing a triangle via point sampling, point-in-triangle testing, aliasing, Fourier interpretation of aliasing, anti-aliasing')),

  lecture_def('Jan 15', 'Cooordinate Spaces and Transformations', lecture_url('transforms'), '',
              array('Definition of linear transform, basic geometric transforms, homogeneous coordinates, transform hierarchies, perspective projection')),

  lecture_def('Jan 17', 'Perspective Projection and Texture Mapping', lecture_url('texture'), '',
              array('perspective projection, texture coordinate space, bilinear/trilinear interpolation, how aliasing arises during texture sampling, prefiltering as an anti-aliasing technique')),

  lecture_def('Jan 22', 'The Rasterization Pipeline', lecture_url('pipeline'), '',
              array('Z-buffer algorithm, image compositing, end-to-end 3D graphics pipeline as implemented by modern GPUs')),

  lecture_def('Jan 24', 'Introduction to Geometry', lecture_url('geometry'), '',
              array('Properties of surfaces (manifold, normal, curvature), implicit vs. explicit representations, basic representations such as triangle meshes, bezier curves and patches')),

  lecture_def('Jan 29', 'Mesh Representations and Geometry Processing', lecture_url('geometryprocessing'), '',
              array('Half-edge mesh structures, mesh operations such as tessellation and simplification')),

  lecture_def('Jan 31', 'Geometric Queries', lecture_url('geometricqueries'), '',
              array('closest point, ray-triangle intersection, ray-mesh intersection, the relationship between rasterization and ray tracing')),

  lecture_def('Feb 5', 'Accelerating Geometric Queries', '', 'bold',
              array('Acceleration structures such as bounding volume hierarchies, K-D trees, uniform grids')),

  lecture_def('Feb 7', 'Materials, Lighting, and Shading', '', 'bold',
              array('Common material models, use of texture for lighting (bump mapping, environment mapping, prebaked lighting), motivating need for shaders on modern GPUs')),

  lecture_def('Feb 12', 'Midterm Exam', '', 'bold',
              array('Good luck!')),

  lecture_def('Feb 14', 'Rendering Challenges of Virtual Reality', '', 'bold',
              array('VR Headset hardware, how head-mounted displays cause challenges for renderers, resolution and latency requirements, judder, foveated rendering')),

  lecture_def('Feb 19', 'Introduction to Animation', '', 'bold',
              array('Animation examples, splines, keyframing')),

  lecture_def('Feb 21', 'Kinematics and Motion Capture', '', 'bold',
              array('Optimization basics, inverse kinematics, motion graphs, methods of capturing human motion (motion capture suits, Kinect, computer vision methods)')),

  lecture_def('Feb 26', 'Dynamics and Time Integration', '', 'bold',
              array('basic numerical integration, forward Euler, mass-spring systems (e.g., for cloth simulation), particle systems')),

  lecture_def('Feb 28', 'Theory of Color', '', 'bold',
              array('How the eye works, color spaces, brightness and lightness, motivation for Gamma correction')),

  lecture_def('Mar 5', 'Image Processing and Image Compression', '', 'bold',
              array('JPG image compression, image filtering via convolution (sharpening/blurring), non-linear filters')),

  lecture_def('Mar 7', 'Modern Rendering Techniques for the Graphics Pipeline', '', 'bold',
              array('Shadow mapping, reflections, ambient occlusion, precomputed lighting, deferred shading, parallel rasterization')),

  lecture_def('Mar 12', 'Efficient 3D Graphics on Mobile GPUs', '', 'bold',
              array('Energy efficient rendering on mobile phones, overview of recent research topics in computer graphics')),

  lecture_def('Mar 14', 'Course Recap', '', 'bold',
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

     <?php if (count($lecture['deadlines']) > 0) {
        foreach($lecture['deadlines'] as $deadline) { ?>
     <div class="small_text colored_text">
     <?php echo $deadline; ?>
     </div>
     <?php } } ?>

</td>

</tr>

<?php
}
?>

</table>

<div class="overview_main_item overview_ruled_element">Programming Assignments</div>

<table>
<tr>
    <td class="schedule_date">Jan 24</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs248/draw-svg">Assignment 1: Write Your own SVG Renderer</a>
</td>
</tr>

<tr>
<td class="schedule_date">Feb 7</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs248/triangle-mesh-editor">Assignment 2: A Mini 3D Triangle Mesh Editor</a></td>
</tr>

<tr>
 <td class="schedule_date">Feb 26</td><td class="schedule_lecture"><span class="bold_text">Assignment 3: Lighting and Materials In GLSL</span></td>
</tr>

<tr>
 <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 4: Self-Selected Final Project</span></td>
</tr>

</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
