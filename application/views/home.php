
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS348K, Spring 2020</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>


<div>
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/teaser.jpg'); ?>" width="800" height="125"></a>
</div>

<p style="padding-bottom: .15em">
Visual computing tasks such as computational imaging, image/video understanding, and real-time 3D graphics are key responsibilities of modern computer systems ranging from sensor-rich smart phones, autonomous robots, and large datacenters. These workloads demand exceptional system efficiency and this course examines the key ideas, techniques, and challenges associated with the design of parallel, heterogeneous systems that accelerate visual computing applications. This course is intended for systems students interested in architecting efficient graphics, image processing, and computer vision platforms (both new hardware architectures and domain-optimized programming frameworks for these platforms) and for graphics, vision, and machine learning students that wish to understand throughput computing principles to design new algorithms that map efficiently to these machines.
</p>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Tues/Thurs 3:00-4:30pm (virtual class only)</div>
<div>Instructor: <a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a></div>

<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on course policies and logistics.</div>

</div>


<div class="overview_main_item overview_ruled_element">Spring 2020 Schedule</div>

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

  lecture_def('Apr 7', 'Course Introduction + Throughput Computing Review', lecture_url('intro'), '',
      array('How superscalar, multi-core, SIMD, and hardware multi-threading are used in CPUs/GPUs,
      understanding latency and bandwidth constraints')),
      
  lecture_def('Apr 9', 'The Digital Camera Processing Pipeline (Basics)', lecture_url('camerabasics'), '',
      array('Algorithms for taking raw sensor pixels to an RGB image: demosaicing, sharpening,
             correcting lens aberrations, multi-shot alignment/merging, image filtering')),
	     
  lecture_def('Apr 14', 'Modern Smartphone Camera Processing', lecture_url('camerapipeline2'), '',
      array('Multi-scale processing with Gaussian and Laplacian pyramids, HDR/local tone mapping,
             portrait mode in the Pixel 2 camera')),
	     
  lecture_def('Apr 16', 'Efficiently Scheduling Image Processing Algorithms to Parallel Hardware', lecture_url('halide'), '',
      array('Balancing locality, parallelism, and work, fusion and tiling, design of the Halide domain-specific language,
             automatically scheduling image processing pipelines')),
	     
  lecture_def('Apr 21', 'Efficient DNN Inference (for Image Analysis)', lecture_url('dnneval'), '',
      array('popular DNN trunks and topologies, design of MobileNet, challenges of direct implementation,
             where the compute lies in modern networks, DNN pruning, neural architecture search')),

  lecture_def('Apr 23', 'Hardware Accelerators for DNN Workloads', lecture_url('dnnhardware'), '',
      array('GPUs, Google TPU, special instructions for DNN evaluation,
             choice of precision in arithmetic, recent ISCA/MICRO papers on DNN acceleration, flexibility vs efficiency trade-offs')),

  lecture_def('Apr 28', 'Algorithms for Parallel DNN Training at Scale', lecture_url('dnntrain'), '',
      array('Footprint challenges of training, model vs. data parallelism,
             asynchronous vs. synchronous training debate, parameter server designs,
	     key systems optimizations for parallel training')),

  lecture_def('Apr 30', 'Raising the Level of Abstraction in Machine Learning', lecture_url('highlevelml'), ''),

  lecture_def('May 5', '(The Lack of) System Support for Generating Supervision', lecture_url('supervision'), '',
      array('If the most important step of ML is acquiring training data, why don\'t we have systems for it?')),

  lecture_def('May 7', 'Efficient Inference on Video via Specialization', lecture_url('videospecialization'), '',
      array('Exploiting temporal coherence in video, specialization to scene and camera viewpoint')),

  lecture_def('May 12', 'Video Compression', lecture_url('videocompression'), '',
      array('H.264 video representation/encoding, parallel encoding, motivations for ASIC acceleration,
      emerging opportunities for compression when machines, not humans, will observe most images')),

  lecture_def('May 14', 'Miscellaneous Video Topics', lecture_url('videomisc'), '',
      array('Parallel video encoding, video ingest at Facebook, discussion of ethics of continuous capture')),

  lecture_def('May 19', 'The Real-Time Graphics Pipeline Workload', lecture_url('gfxpipeline'), '',
      array('3D graphics pipeline as a machine architecture (abstraction), pipeline semantics/functionality, contrasting graphics pipeline architecture with compute-mode GPU architecture')),

  lecture_def('May 21', 'Scheduling the Real-Time 3D Graphics Pipeline onto GPU Hardware', lecture_url('gfxscheduling'), '',
      array('3D graphics pipeline as a machine architecture (abstraction), Molnar sorting taxonomy, dataflow scheduling under data amplification, tiled rendering for bandwidth-efficiency, deferred shading as a scheduling decision')),

  lecture_def('May 26', 'Domain-Specific Languages for Shading', lecture_url('shadinglang'), '',
      array('Renderman Shading Language and Cg: contrasting two different levels of abstraction for shading languages, Slang')),

  lecture_def('May 28', 'Platform Support for Real-Time Ray Tracing', lecture_url('rtrt'), '',
      array('DXR ray tracing APIs, hardware acceleration of raytracing')),

  lecture_def('Jun 2', 'Class Discussion', '', 'bold'),

  lecture_def('Jun 4', 'Rendering for Learning: Designing Renderers to Support Model Training', lecture_url('renderlearn'), '',
      array('How might we architects renderers differently to support the needs of training, rather than game engines?')),

  lecture_def('Jun 9', 'Project Presentations', '', 'bold',
      array('')),




  

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

<div class="overview_main_item overview_ruled_element">Assignments</div>

<table>
<tr>
    <td class="schedule_date">Apr 23</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs348k/camera_asst">Burst Mode HDR Camera RAW Processing</a>
</td>
</tr>

<tr>
    <td class="schedule_date">May 5</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs348k/asst2-convlayer">Optimizing a Conv Layer in Halide (Making Students Appreciate cuBLAS)</a>
</td>
</tr>


 <td class="schedule_date">Jun 9</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs348k/project">Self-Selected Term Project</a></td>
</tr>

</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
