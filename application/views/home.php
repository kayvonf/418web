
<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>

<p style="padding-bottom: .15em"> From smart phones, to multi-core
CPUs and GPUs, to the world's largest supercomputers and web sites,
parallel processing is ubiquitous in modern computing. The goal of
this course is to provide a deep understanding of the fundamental
principles and engineering trade-offs involved in designing modern
parallel computing systems as well as to teach parallel programming
techniques necessary to effectively utilize these machines.  Because
writing good parallel programs requires an understanding of key
machine performance characteristics, this course will cover both
parallel hardware and software design.  </p>

<div class="overview_main_item overview_ruled_element">When We Meet</div>

<div class="" style="padding-bottom: 15px;">
<div>Mon/Wed 3:00 - 4:20pm</div>
<div>Doherty Hall A302</div>
<div>Instructor: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a></div>
</div>

<div class="overview_main_item overview_ruled_element">Spring 2015 Schedule</div>

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

  lecture_def('Jan 12', 'Why Parallelism?', lecture_url('whyparallelism')),

  lecture_def('Jan 14', 'A Modern Multi-Core Processor: Forms of Parallelism + Understanding Latency and BW', lecture_url('basicarch'), '', array('Assignment 1 out')),

  lecture_def('Jan 19', 'No Class (CMU MLK holiday)', '', 'bold'),

  lecture_def('Jan 21', 'Parallel Programming Models and their Corresponding HW/SW Implementations', lecture_url('progmodels'), '',
              array('Quiz 1 due (on Thu Jan 22)', 'Assignment 1 due (on Fri Jan 23)')),

  lecture_def('Jan 26', 'Parallel Programming Basics (the parallelization thought process)', lecture_url('progbasics')),
 
  lecture_def('Jan 28', 'GPU Architecture and CUDA Programming', lecture_url('gpuarch'), '', array('Assignment 2 out')),

  lecture_def('Feb 2', 'Performance Optimization I: Work Distribution', lecture_url('progperf1')),

  lecture_def('Feb 4', 'Performance Optimization II: Locality, Communication, and Contention', lecture_url('progperf2'), '', array('Quiz 2 due (on Fri Feb 6)')),

  lecture_def('Feb 9', 'Parallel Application Case Studies', lecture_url('casestudies')),

  lecture_def('Feb 11', 'Workload-Driven Performance Evaluation', lecture_url('perfeval'), '', array('Assignment 2 due', 'Assignment 3 out (on Thu Feb 12)')),

  lecture_def('Feb 16', 'Snooping-Based Cache Coherence I', lecture_url('cachecoherence1')),

  lecture_def('Feb 18', 'Snooping-Based Cache Coherence II', lecture_url('cachecoherence2'), '', array('Quiz 3 due (on Fri Feb 20)')),

  lecture_def('Feb 23', 'Directory-Based Cache Coherence', lecture_url('directorycoherence')),

  lecture_def('Feb 25', 'Memory Consistency (+ Course-So-Far Review)', lecture_url('consistency'), '', array('Assignment 3 due (on Thu Feb 26)')),

  lecture_def('Mar 2', 'Exam I', '', 'bold'),

  lecture_def('Mar 4', 'Scaling a Web Site: Scale-Out Parallelism, Elasticity, and Caching', lecture_url('webscaling')),

  lecture_def('Mar 9-13', 'Spring Break. Partaaay!', '', 'bold'),

  lecture_def('Mar 16', 'Basic Snooping-Based Multiprocessor Implementation', lecture_url('snoopimpl'), 'bold', array('Assignment 4 out (on Sun Mar 15)')),

  lecture_def('Mar 18', 'Implementing Synchronization', lecture_url('synchronization'), 'bold', array('Quiz 4 due (on Fri Mar 20)')),

  lecture_def('Mar 23', 'Fine-Grained Synchronization and Lock-Free Programming', lecture_url('lockfree')),

  lecture_def('Mar 25', 'Interconnection Networks', lecture_url('interconnects'), 'bold', array('Assignment 4 due (on Fri Mar 27)')),

  lecture_def('Mar 30', 'Transactional Memory', lecture_url('transactionalmem')),

  lecture_def('Apr 1', 'Scheduling Fork-Join Parallelism', lecture_url('forkjoin'), 'bold', array('Project Proposal Due (on Thu Apr 2)')),
                        
  lecture_def('Apr 6', 'Heterogeneous Parallelism and Hardware Specialization', lecture_url('heterogeneity')),

  lecture_def('Apr 8', 'Domain-Specific Parallel Programming Systems', lecture_url('dsl'), 'bold', array('Quiz 5 due (on Fri Apr 10)')),

  lecture_def('Apr 13', 'Domain-Specific Frameworks for Parallel Graph Processing', lecture_url('graphdsl'), 'bold'),

  lecture_def('Apr 15', 'Database Systems Do Not Scale to 1,000 CPU Cores (guest lecture by Andy Palvo)', lecture_url('databasescaling'), '', array('Project Checkpoint Due (on Thu Apr 16)')),

  lecture_def('Apr 20', 'In-Memory Distributed Computing in Spark', lecture_url('spark'), 'bold'),

  lecture_def('Apr 22', 'Addressing the Memory Wall', lecture_url('memory'), 'bold', array('Quiz 6 due (on Fri Apr 24)')),  

  lecture_def('Apr 27', 'Exam II (and a Bonus Lecture on Parallel Triangle Rendering on a GPU)', lecture_url('rendering'), 'bold'),

  lecture_def('Apr 29', 'Course Wrap Up and Project Presentation Tips (How to Give a Clear Talk)', lecture_url('wrapup'), 'bold'),

  lecture_def('May 11', '4th Annual Parallelism Competition', '', 'bold', array('text'=> 'Final Projects Due'))
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
    <td class="schedule_date">due Jan 23</td><td class="schedule_lecture"><a href="<?php echo article_url('1'); ?>">Assignment 1: Analyzing Parallel Program Performance on a Quad-Core CPU</a></td>
</tr>
<tr>
    <td class="schedule_date">due Feb 11</td><td class="schedule_lecture"><a href="<?php echo article_url('4'); ?>">Assignment 2: A Simple Renderer in CUDA</a></td>
</tr>
<tr>
<td class="schedule_date">due Feb 26</td><td class="schedule_lecture"><a href="<?php echo article_url('6'); ?>">Assignment 3: Two Algorithms, Two Programming Models</a></td>
</tr>
<tr>
    <td class="schedule_date">due Mar 27</td><td class="schedule_lecture"><a href="<?php echo article_url('9'); ?>">Assignment 4: A Simple, Elastic Web Server</a></td>
</tr>

<tr>
    <td class="schedule_date">May 11</td><td class="schedule_lecture"><a href="<?php echo article_url('10'); ?>">Final Project / Parallelism Competition</a></td>
</tr>

<tr>
    <td class="schedule_date">weekly</td><td class="schedule_lecture"><a href="<?php echo article_url('3'); ?>">Guidelines and Tips for Making Good Lecture Comments</a></td>
</tr>


</table>

<div class="overview_main_item overview_ruled_element">Acknowledgments</div>

<p> Special thanks to the <a href="http://www.intel.com">Intel
Corporation</a>, the <a href="http://www.nvidia.com">NVIDIA
Corporation</a>, and to <a href="http://www.dell.com">DELL</a> for
equipment donations and/or financial support for course development.
<a href="http://www.cs.cmu.edu/~tcm">Todd Mowry</a> created the
original version of 15-418 and much of the structure of his innovative
course persists today. Thanks to Matt Pharr for technical assistance
with ISPC. Alex Reece, Manish Burman, and Cary Yang developed the
course web site.  </p>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
