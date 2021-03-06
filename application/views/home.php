
<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>

<!--

<div class="bold_text colored_text">

<p style="font-size: 14pt;">NOTE TO STUDENTS ON THE SPRING 2017 WAITLIST:</p>

<p>We are excited that so many students are interested in 418/618.
This year, we expect to be able to accommodate approximately 200
students in 15-418/618.</p>

<p style="font-size: 14pt;">YOUR ORDER ON THE WAITLIST IN S3 DOES NOT MATTER.</p>

<p>After handling special requests and students with a particular need
to take 418/618 to graduate (please come talk to us if you're one of
those folks), it is Prof. Kayvon and Prof. Bryant's policy to clear
the waitlist in the order that interested students hand in "A-quality"
implementations of assignment 1 prior to the course add deadline (the
end of the second week of class).  Assignment 1 is out and available
below.  Lecture 2 material is necessary to complete the assignment.
</p> </div>

-->

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

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Mon/Wed 1:30-2:50pm (recitation on Fri 1:30-2:50pm)</div>
<div>GHC 4401 (Rashid Auditorium)</div>
<div>Instructors: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a> and <a href="http://www.cs.cmu.edu/~bryant">Randy Bryant</a></div>
<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on policies and logistics.</div>
</div>

<div class="overview_main_item overview_ruled_element">Spring 2017 Schedule</div>

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

  lecture_def('Jan 16', 'No Class (CMU MLK holiday)', '', 'bold'),

  lecture_def('Jan 18', 'Why Parallelism? Why Efficiency?', lecture_url('whyparallelism'), '',
                   array('Assignment 1 out')),

  lecture_def('Jan 20', 'A Modern Multi-Core Processor: Forms of Parallelism + Understanding Latency and BW', lecture_url('basicarch'), ''),

  lecture_def('Jan 23', 'Parallel Programming Models and their Corresponding HW/SW Implementations', lecture_url('progmodels'), ''),

  lecture_def('Jan 25', 'Parallel Programming Basics (the parallelization thought process)', lecture_url('progbasics'), '',
                        array('Exercise 1 due (on Fri Jan 27)')),
 
  lecture_def('Jan 30', 'GPU Architecture and CUDA Programming', lecture_url('gpuarch'), '',
                         array('Assignment 1 due', 'Assignment 2 out')),

  lecture_def('Feb 1', 'Performance Optimization I: Work Distribution and Scheduling', lecture_url('progperf1'), ''),

  lecture_def('Feb 6', 'Performance Optimization II: Locality, Communication, and Contention', lecture_url('progperf2'), ''),

  lecture_def('Feb 8', 'Parallel Application Case Studies', lecture_url('casestudies'), '',
                       array('Exercise 2 due (on Fri Feb 10)')),

  lecture_def('Feb 13', 'Workload-Driven Performance Evaluation', lecture_url('perfeval'), ''),

  lecture_def('Feb 15', 'Snooping-Based Cache Coherence', lecture_url('cachecoherence1'), '',
                       array('Assignment 2 due', 'Assignment 3 out')),

  lecture_def('Feb 20', 'Directory-Based Cache Coherence', lecture_url('directorycoherence'), ''),

  lecture_def('Feb 22', 'Basic Snooping-Based Multiprocessor Implementation', lecture_url('snoopimpl'), '',
                          array('Exercise 3 due (on Fri Feb 24)')),

  lecture_def('Feb 27', 'Memory Consistency (+ Course-So-Far Review)', lecture_url('consistency'), ''),
  
  lecture_def('Mar 1', 'Exam I', '', 'bold'),

  lecture_def('Mar 6', 'Scaling a Web Site: Scale-Out Parallelism, Elasticity, and Caching', lecture_url('websitescaling'), ''),

  lecture_def('Mar 8', 'Interconnection Networks', lecture_url('interconnects'), '',
                        array('Assignment 3 due')),
   
  lecture_def('Mar 13-17', 'Spring Break. Partaaay!', '', 'bold'),
  
  lecture_def('Mar 20', 'Implementing Synchronization', lecture_url('synchronization'), ''),
  
  lecture_def('Mar 22', 'Fine-Grained Synchronization and Lock-Free Programming', lecture_url('lockfree'), '',
                        array('Exercise 4 due (on Fri Mar 24)')),

  lecture_def('Mar 27', 'Transactional Memory', lecture_url('transactionalmem'), ''),

  lecture_def('Mar 29', 'Heterogeneous Parallelism and Hardware Specialization', lecture_url('heterogeneity'), ''),

  lecture_def('Apr 3', 'Domain-Specific Parallel Programming Systems', lecture_url('dsl'), '',
                        array('Assignment 4 due (on Tues Apr 4)')),
                        
  lecture_def('Apr 5', 'Domain-Specific Programming Frameworks for Analyzing Graphs', lecture_url('graphdsl'), '',
                        array('Exercise 5 due (on Fri Apr 7)')),

  lecture_def('Apr 10', 'In-Memory Distributed Computing in Spark', lecture_url('spark'), '',
                        array('Project Proposal due')),

  lecture_def('Apr 12', 'Efficiently Evaluating Deep Neural Networks', lecture_url('dnn'), ''),

  lecture_def('Apr 17', 'Parallel Deep Neural Network Training', lecture_url('dnntraining'), ''),
              
  lecture_def('Apr 19', 'Addressing the Memory Wall', lecture_url('memory'), ''),
              
  lecture_def('Apr 24', 'The Future of High Performance Computing', lecture_url('hpcfuture'), '',
             array('Project checkpoint due (on Tues April 25)')),

  lecture_def('Apr 26', 'Database Systems Do Not Scale to 1,000 CPU Cores (guest lecture by Andy Pavlo)', lecture_url('dbscaling'), '',
            array('Exercise 6 due (on Fri April 28)')),

  lecture_def('May 1', 'Exam 2 (evening exam)', '', 'bold'),
  
  lecture_def('May 3', 'Course Wrap Up and Project Presentation Tips (How to Give a Clear Talk)', lecture_url('finaltips'), ''),

  lecture_def('May 12', '6th Annual Parallelism Competition', '', 'bold', array('text'=> 'Final Projects Due'))

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
    <td class="schedule_date">Jan 30</td><td class="schedule_lecture"><a href="<?php echo article_url('3'); ?>">Assignment 1: Analyzing Parallel Program Performance on an Eight-Core CPU</a></td>
</tr>
<tr>
    <td class="schedule_date">Feb 15</td><td class="schedule_lecture"><a href="<?php echo article_url('4'); ?>">Assignment 2: A Simple Renderer in CUDA</a></td>
</tr>
<tr>
    <td class="schedule_date">Mar 8</td><td class="schedule_lecture"><a href="<?php echo article_url('7'); ?>">Assignment 3: Processing Big Graphs on the Xeon Phi</a></td>
</tr>
<tr>
    <td class="schedule_date">Apr 4</td><td class="schedule_lecture"><a href="<?php echo article_url('15'); ?>">Assignment 4: A Simple, Elastic Web Server<//a></td>
</tr>
<tr>
    <td class="schedule_date">May 12</td><td class="schedule_lecture"><a href="<?php echo article_url('13'); ?>">Final Project / Parallelism Competition</a></td>
</tr>
<tr>
    <td class="schedule_date">weekly</td><td class="schedule_lecture"><a href="<?php echo article_url('1'); ?>">Guidelines and Tips for Making Good Lecture Comments</a></td>
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
