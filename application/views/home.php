
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS348K, Fall 2018</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>

<div>
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/teaser.jpg'); ?>" width="800" height="125"></a>
</div>

<p style="padding-bottom: .15em">
Visual computing tasks such as computational imaging, image/video
understanding, and real-time 3D graphics are key responsibilities of
modern computer systems ranging from sensor-rich smart phones,
autonomous robots, and large datacenters. These workloads demand
exceptional system efficiency and this course examines the key ideas,
techniques, and challenges associated with the design of parallel,
heterogeneous systems that accelerate visual computing
applications. This course is intended for systems students interested
in architecting efficient graphics, image processing, and computer
vision platforms (both new hardware architectures and domain-optimized
programming frameworks for these platforms) and for graphics, vision,
and machine learning students that wish to understand throughput
computing principles to design new algorithms that map efficiently to
these machines.
</p>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Tues/Thurs 1:30-2:50pm</div>
<div>Room 60-109</div>
<div>Instructor: <a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a></div>

<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on course policies, logistics, and how to prepare for the course.</div>

</div>


<div class="overview_main_item overview_ruled_element">Fall 2018 Schedule</div>

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

  lecture_def('Sep 25', 'Course Introduction + Review of Throughput Hardware Design Principles', lecture_url('introreview'), '',
              array('How superscalar, multi-core, SIMD, and hardware multi-threading are used in CPUs,
	             GPUs; understanding latency and bandwidth constraints')),

  lecture_def('Sep 27', 'The Digital Camera Processing Pipeline', lecture_url('camerapipeline'), '',
              array('Algorithms for taking raw sensor pixels to an RGB image: demosaicing, sharpening,
	             correcting lens aberrations, multi-shot alignment/merging, image filtering')),

  lecture_def('Oct 2', 'Modern Smartphone Camera Processing (such as in the Pixel 2 Phone)', lecture_url('camerapipeline2'), '',
             array('Multi-scale processing with Gaussian and Laplacian pyramids, HDR/local tone mapping,
	            portrait mode in the Pixel 2 camera')),

  lecture_def('Oct 4', 'Efficiently Scheduling Image Processing Algorithms on Parallel Hardware', lecture_url('imagesched'), '',
              array('Balancing locality, parallelism, and work, fusion and tiling,
              design of the Halide domain-specific language, automatically scheduling image processing pipelines')),

  lecture_def('Oct 9', 'Specialized Hardware for Efficient Image Processing', lecture_url('imagehw'), '',
              array('Benefits of fixed-function processing, comparing GPUs, DSPs, Image Signal Processors,
	             and FPGAs for image processing, 
		     domain-specific languages for hardware synthesis such as
		     Darkroom/Rigel, compiling Halide to hardware')),

  lecture_def('Oct 11', 'Lossy Image and Video Compression', lecture_url('compression'), '',
              array('JPG compression. H.264 video representation/encoding, parallel encoding,
	             motivations for ASIC acceleration,
	             emerging opportunities for compression when machines,
		     not humans, will observe most images')),

  lecture_def('Oct 16', 'The Light Field and Capture for VR Display', lecture_url('lightfield_vr'), '',
              array('Light field representation, light-field cameras, computational challenges
	             of synthesizing video streams for VR output, Google\'s Jump VR pipeline')),

  lecture_def('Oct 18', 'Efficient DNN Inference (for Image Analysis)', lecture_url('dnneval'), '',
              array('popular DNN trunks and topologies, design of MobileNet,
	             challenges of direct implementation, where the compute lies in modern networks,
		     DNN pruning, neural architecture search')),

  lecture_def('Oct 23', 'Algorithms for Parallel DNN Training at Scale', lecture_url('dnntrain'), '',
              array('Footprint challenges of training, model vs. data parallelism,
	             asynchronous vs. synchronous training debate, parameter server designs,
		     key optimizations for parallel training')),

  lecture_def('Oct 25', 'Hardware Accelerators for DNN Inference', lecture_url('dnnhw'), '',
              array('GPUs, Google TPU, special instructions for DNN evaluation,
	             choice of precision in arithmetic, recent ISCA/MICRO papers on DNN acceleration')),

  lecture_def('Oct 30', 'Algorithmic Optimization: Examples of Task-Motivated DNN Structure', lecture_url('dnnstructure'), '',
              array('Neural module networks, discussion on value of modularity vs. end-to-end learning')),

  lecture_def('Nov 1', 'Algorithmic Optimizations for DNN-Based Video Analysis', lecture_url('dnnvideo'), '',
              array('Exploiting temporal coherence in video, pipelined networks,
	             specialization to scene and camera viewpoint,
		     sharing computations across applications and users')),

  lecture_def('Nov 6', 'Video Stream Processing at Cloud Scale', lecture_url('cloudvideo'), '',
              array('Facebook SVE/Lumos, Scanner, processing as a service')),

  lecture_def('Nov 8', 'The GPU-Accelerated Real-Time Graphics Pipeline', lecture_url('gfxpipeline'), '',
              array('3D graphics pipeline as a machine architecture (abstraction),
	             pipeline semantics/functionality, contrasting graphics pipeline architecture with
		     compute-mode GPU architecture')),

  lecture_def('Nov 13', 'Efficiently Accessing Memory: Hardware for Texture Mapping and Depth Buffering', lecture_url('gfxmemory'), '',
              array('Texture sampling basics, hardware texture compression, depth-and-color buffer compression,
	             motivations for hardware multi-threading for latency hiding in modern GPUs')),

  lecture_def('Nov 15', 'Scheduling the Graphics Pipeline onto a GPU', lecture_url('schedulinggfx'), '',
              array('Molnar sorting taxonomy, dataflow scheduling under data amplification,
	             tiled rendering for bandwidth-efficiency, deferred shading as a scheduling decision')),

  lecture_def('Nov 27', 'Guest Lecture: Bill Mark (Google)', '', 'bold',
              array('Topic: specialized hardware for deep learning and computational photography at Google')),

  lecture_def('Nov 29', 'Domain-Specific Languages for Shading (with Tim Foley, NVIDIA)', '', 'bold',
              array('Renderman Shading Language and Cg: contrasting two different levels of
	             abstraction for shading languages, Slang')),

  lecture_def('Dec 4', 'Misc topics: Design of ML Frameworks / VR Rendering', lecture_url('mlframe_vr'), '',
              array('Mapping shaders to GPUs, Design of platform for ML computations, rendering concerns of VR')),

  lecture_def('Dec 6', 'The Fusion of Rendering and Deep Learning', lecture_url('rtrt'), '',
              array('How deep learning and hardware specialization stand to make real-time raytracing feasible'))
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

<div class="overview_main_item overview_ruled_element">Assignments and Projects</div>

<table>
<tr>
    <td class="schedule_date">optional</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs348k/asst0">Optional Assignment 0: Analyzing Parallel Program Performance on a Quad-Core CPU</a>
    </br>
    All CVS348K students are encouraged to attempt this assignment during or before the first week of the course to check their background in parallel systems.</td>
</tr>

<tr>
<td class="schedule_date">Oct 22</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs348k/camera_asst">Assignment 1:</a> Burst Mode HDR Camera RAW Processing for the kPhone 348</td>
</tr>
<tr>
 <td class="schedule_date">optional</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs348v/asst3">Optional Assignment 2: Implementing a Separable Conv Layer in Halide</a></td>

</tr>

<tr>
    <td class="schedule_date">Dec 11</td><td class="schedule_lecture"><a href="<?php echo article_url('2'); ?>">Final Project Guidelines</a>: students will complete a substantial term project on a course-relevant topic of their choosing.</td>
</tr>

</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
