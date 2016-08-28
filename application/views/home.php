
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">CMU 15-769</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>

<div>
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/teaser.jpg'); ?>" width="800" height="\
125"></a>
</div>

<p style="padding-bottom: .15em">

Visual computing tasks such as 2D/3D graphics, image processing, and
image understanding are important responsibilities of modern computer
systems ranging from sensor-rich smart phones to large
datacenters. These workloads demand exceptional system efficiency and
this course examines the key ideas, techniques, and challenges
associated with the design of parallel (and heterogeneous) systems
that serve to accelerate visual computing applications. This course is
intended for graduate and advanced undergraduate-level students
interested in architecting efficient future graphics, image
processing, and computer vision platforms and for students seeking to
develop scalable algorithms for these platforms.  </p>

<p class="colored_text bold_text" style="font-size: 18pt;">
NOTE TO STUDENTS: THE FIRST DAY OF CLASS FOR 15-769 WILL BE WEDNESDAY, AUGUST 31.  SEE YOU THEN!!!!!
</p>

<p class="colored_text bold_text" style="font-size: 18pt;">
Please signup on <a href="http://www.piazza.com/cmu/fall2016/15769">Piazza</a>.
</p>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Mon/Wed 10:30-11:50am</div>
<div>GHC 4303</div>
<div>Instructor: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a></div>
<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on policies and logistics.</div>
</div>

<div class="overview_main_item overview_ruled_element">Fall 2016 Schedule</div>

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

  lecture_def('Aug 31', 'Course Introduction + Parallel Hardware Architecture Review', '', 'bold',
  array('Review of multi-core, multi-threading, SIMD, heterogeneity via CPUs/GPUs/ASICs/FPGAs')),
    
  lecture_def('Sep 5', 'No Class (Labor Day Holiday)', '', 'bold'),

  lecture_def('', 'Part 1: High-Efficiency Image Processing', '', 'bold2'),
  
  lecture_def('Sep 7', 'The Digital Camera Image Processing Pipeline: Part I', '', 'bold',
  array('From raw sensor measurements to an RGB image: demosaicing, correcting aberrations, color space conversions')),

  lecture_def('Sep 9', 'The Digital Camera Image Processing Pipeline: Part II (FRIDAY LECTURE)', '', 'bold',
  array('JPG image compression, high-dynamic range processing')),

  lecture_def('Sep 12', 'Efficiently Scheduling Image Processing Algorithms on Multi-Core Hardware', '', 'bold',
  array('Balancing parallelism/local/extra work, programming using Halide')),

  lecture_def('Sep 14', 'Image Processing Algorithm Grab Bag', '', 'bold',
  array('Bilateral filter, median filter, local Laplacian filtering, optical flow')),

  lecture_def('Sep 19', 'No class -- Kayvon out of town', '', 'bold'),

  lecture_def('Sep 21', 'No class -- Kayvon out of town', '', 'bold'),

  lecture_def('Sep 26', 'Image and Video Processing Hardware', '', 'bold',
  array('Contrasting efficiency of GPUs, DSPs, Image Signal Processors, and FGPAs for image processing')),  

  lecture_def('Sep 28', 'H.264 Video Compression', '', 'bold'),

  lecture_def('', 'Part 2: Trends in Deep Network Acceleration', '', 'bold2'),
  
  lecture_def('Oct 3', 'Efficient Deep Neural Network Evaluation', '', 'bold',
  array('Reduction to dense linear algebra, sparsification and pruning, expression via data flow frameworks (TensorFlow, MxNet)')),

  lecture_def('Oct 5', 'Authoring Deep Networks for Image Analysis', '', 'bold',
    array('Examples of modern deep network design.')),
  
  lecture_def('Oct 10', 'Hardware Accelerators for Deep Neural Network Evaluation', '', 'bold',
  array('A comparison of the various ISCA 2016 hardware accelerator papers')),

  lecture_def('Oct 12', 'Large-scale Parallel DNN Training', '', 'bold',
  array('Asynchronous parameter update, conflicting goals of work efficiency and parallelism')),

  lecture_def('', 'Part 3: Systems Challenges of 3D Reconstruction', '', 'bold2'),
  
  lecture_def('Oct 17', 'Real-Time 3D Reconstruction', '', 'bold', array('Space vs. dense methods, KinectFusion') ),

  lecture_def('Oct 19', 'Large-Scale 3D Reconstruction', '', 'bold', array('City-scale reconstruction') ),

  lecture_def('Oct 24', '3D Reconstruction Topic TBD', '', 'bold', array('Probably VR video')),

  lecture_def('', 'Part 4: The Design and Implementation of 3D Graphics Systems', '', 'bold2'),
  
  lecture_def('Oct 26', 'Architecture of the GPU-Accelerated Real-Time 3D Graphics Pipeline', '', 'bold',
  array('Graphics pipeline abstractions, scheduling challenges')),

  lecture_def('Oct 31', 'Rasterization and Occlusion', '', 'bold',
  array('Hardware acceleration, depth and color compression algorithms')),

  lecture_def('Nov 2', 'Texture Mapping', '', 'bold',
  array('Texture sampling and prefiltering, texture compression, data layout optimizations')),

  lecture_def('Nov 7', 'Parallel Scheduling of the Graphics Pipeline', '', 'bold',
  array('Molnar taxonomy, scheduling under data amplification, tiled rendering')),

  lecture_def('Nov 9', 'Deferred Shading and Image-Space Rendering Techniques', '', 'bold',
  array('Deferred shading as a scheduling decision, image-space anti-aliasing')),

  lecture_def('Nov 14', 'Hardware-Accelerated Ray Tracing', '', 'bold',
  array('Ray-tracing as an alternative to rasterization, what does modern ray tracing HW do?')),

  lecture_def('Nov 16', 'Shading Language Design', '', 'bold',
  array('Contrasting different shading languages, is CUDA a DSL?')),

  lecture_def('Nov 21', 'Case Study: The Spire Shading Language', '', 'bold',
  array('Discussion of relationship to other recent DSLs')),

  lecture_def('', 'Part 5: Miscellaneous Topics', '', 'bold2'),
  
  lecture_def('Nov 28', 'DSLs for Physical Simulation: Lizst and Ebb', '', 'bold',
  array('Open research questions on high-performance DSL design')),

  lecture_def('Nov 30', 'Topic TBD', '', 'bold'),

  lecture_def('Dec 5', 'Topic TBD', '', 'bold'),

  lecture_def('Dec 7', 'Topic TBD', '', 'bold')
  
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

      <?php } else if ($lecture['format'] == 'bold2') { ?>
           <div class="bold_text overview_main_item" style="font-size:14pt;" style="padding: 10px 0px 0px 0px;"><?php echo $lecture['title']; ?></div>
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

<div class="overview_main_item overview_ruled_element">Assignments and Projects</div>

<table>
<tr>
  <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 1: COMING SOON</span></td>
</tr>
<tr>
    <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 2: COMING SOON</span></td>
</tr>
<tr>
    <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 3: COMING SOON</span></td>
</tr>
</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
