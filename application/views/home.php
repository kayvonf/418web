
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

  lecture_def('Aug 31', 'Course Introduction + Parallel Hardware Architecture Review', lecture_url('introhwreview'), '',
  array('History of visual computing, review of multi-core, multi-threading, SIMD, heterogeneity via CPUs/GPUs/ASICs/FPGAs')),
    
  lecture_def('Sep 5', 'No Class (Labor Day Holiday)', '', 'bold'),

  lecture_def('', 'Part 1: High-Efficiency Image Processing', '', 'bold2'),
  
  lecture_def('Sep 7', 'The Digital Camera Image Processing Pipeline: Part I', lecture_url('camerapipeline1'), '',
  array('From raw sensor measurements to an RGB image: demosaicing, correcting aberrations, color space conversions')),

  lecture_def('Sep 9', 'The Digital Camera Image Processing Pipeline: Part II', lecture_url('camerapipeline2'), '',
  array('JPG image compression, auto-focus/auto-exposure, high-dynamic range processing')),

  lecture_def('Sep 12', 'Efficiently Scheduling Image Processing Algorithms on Multi-Core Hardware', lecture_url('halidefcam'), '',
  array('Balancing parallelism/local/extra work, programming using Halide')),

  lecture_def('Sep 14', 'Image Processing Algorithm Grab Bag', lecture_url('imageprocessing'), '',
  array('Fast bilateral filter and median filters, bilateral grid, optical flow')),

  lecture_def('Sep 19', 'No class -- Kayvon out of town', '', 'bold'),

  lecture_def('Sep 21', 'No class -- Kayvon out of town', '', 'bold'),

  lecture_def('Sep 26', 'Specializing Hardware for Image Processing', lecture_url('imagehardware'), '',
  array('Contrasting efficiency of GPUs, DSPs, Image Signal Processors, and FGPAs for image processing')),  

  lecture_def('Sep 28', 'H.264 Video Compression', lecture_url('videocompression'), '',
  array('Basics of H.264 video stream encoding')),

  lecture_def('', 'Part 2: Trends in Deep Network Acceleration', '', 'bold2'),
  
  lecture_def('Oct 3', 'Basics of Deep Neural Network Evaluation', lecture_url('dnneval'), '',
  array('DNN topology, reduction to dense linear algebra, challenges of direct implementation')),

  lecture_def('Oct 5', 'Parallel DNN Training', lecture_url('dnntraining'), '',
    array('basics of back-prop, stochastic gradient descent (SGD), memory footprint issues, parallelizing SGD')),

  lecture_def('Oct 10', 'Performance/Accuracy Optimization Case Study: End-to-End Training for Object Detection', lecture_url('detectioncasestudy'), '',
  array('R-CNN, Fast R-CNN, and then Faster R-CNN')),

  lecture_def('Oct 12', 'Optimizing DNN Inference via Approximation', lecture_url('dnnapprox'), '',
  array('pruning and sparsification techniques, precision reduction, temporal rate reductions')),

  lecture_def('Oct 19', 'Imposing Structure on DNN Topology', lecture_url('dnnstructure'), '',
  array('image compression networks, cross-stitch networks, spatial transformer networks, convolutional pose machines')),

  lecture_def('Oct 21', 'Hardware Accelerators for Deep Neural Network Evaluation', '', 'bold',
  array('A comparison of the various recent hardware accelerator papers',
         'Oct 23: Exam 1 Released (take home exam)')),
      
  lecture_def('', 'Part 3: Systems Challenges of 3D Reconstruction', '', 'bold2'),
  
  lecture_def('Oct 24', 'Real-Time 3D Reconstruction', '', 'bold', array('Space vs. dense methods, KinectFusion') ),

  lecture_def('Oct 26', 'Large-Scale 3D Reconstruction', '', 'bold', array('City-scale reconstruction') ),

  lecture_def('Oct 31', '3D Reconstruction Topic TBD', '', 'bold', array('Probably VR video')),

  lecture_def('', 'Part 4: The Design and Implementation of 3D Graphics Systems', '', 'bold2'),
  
  lecture_def('Nov 2', 'Architecture of the GPU-Accelerated Real-Time 3D Graphics Pipeline', '', 'bold',
  array('Graphics pipeline abstractions, scheduling challenges')),

  lecture_def('Nov 7', 'Rasterization and Occlusion', '', 'bold',
  array('Hardware acceleration, depth and color compression algorithms')),

  lecture_def('Nov 9', 'Texture Mapping', '', 'bold',
  array('Texture sampling and prefiltering, texture compression, data layout optimizations')),

  lecture_def('Nov 14', 'Parallel Scheduling of the Graphics Pipeline', '', 'bold',
  array('Molnar taxonomy, scheduling under data amplification, tiled rendering')),

  lecture_def('Nov 16', 'Deferred Shading and Image-Space Rendering Techniques', '', 'bold',
  array('Deferred shading as a scheduling decision, image-space anti-aliasing')),

  lecture_def('Nov 21', 'Hardware-Accelerated Ray Tracing', '', 'bold',
  array('Ray-tracing as an alternative to rasterization, what does modern ray tracing HW do?')),

  lecture_def('Nov 28', 'Shading Language Design', '', 'bold',
  array('Contrasting different shading languages, is CUDA a DSL?')),

  lecture_def('Nov 30', 'Case Study: The Spire Shading Language', '', 'bold',
  array('Discussion of relationship to other recent DSLs')),

  lecture_def('', 'Part 5: Miscellaneous Topics', '', 'bold2'),
  
  lecture_def('Dec 5', 'DSLs for Physical Simulation: Lizst and Ebb', '', 'bold',
  array('Open research questions on high-performance DSL design')),

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
  <td class="schedule_date">Sep 28</td><td class="schedule_lecture"><a href="<?php echo article_url('2'); ?>">Assignment 1: The kPhone Camera Pipeline</a></td>
</tr>
<tr>
  <td class="schedule_date">Nov 4</td><td class="schedule_lecture"><span class="bold_text">Assignment 2: Implementing a Mini-DNN Framework</span></td>
</tr>

</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
