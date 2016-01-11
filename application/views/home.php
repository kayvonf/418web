
<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>


<div class="bold_text colored_text">

<p style="font-size: 14pt;">NOTE TO STUDENTS ON THE SPRING 2016 WAITLIST:</p>

<p>We are excited that so many students are interested in 418/618, but
unfortunately we are not going to be able to accommodate all
students.</p>

<p style="font-size: 14pt;">YOUR ORDER ON THE WAITLIST IN SIO DOES NOT MATTER.</p>

<p>After handling special requests and students with a particular need
to take 418/618 (please come talk to us if you're one of those folks),
it is the instructors' policy to clear the waitlist in the order of
students that hand in "A-quality" implementations of assignment 1
prior to the course add deadline (the end of the second week of
class).  We make changes to assignments each year, but the best way to
get a good jump on this year's assignment is to take a look at last
year's assignment 1 (good luck!): <a
href="http://15418.courses.cs.cmu.edu/spring2015/article/1">http://15418.courses.cs.cmu.edu/spring2015/article/1</a></p>
</div>

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
<div>Mon/Wed 3:00 - 4:20pm</div>
<div>GHC 4401 (Rashid Auditorium)</div>
<div>Instructors: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a> and <a href="http://www.cs.cmu.edu/~bryant/">Randy Bryant</a></div>
<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on policies and logistics.</div>
</div>

<div class="overview_main_item overview_ruled_element">Spring 2016 Schedule</div>

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

  lecture_def('Jan 11', 'Why Parallelism?', lecture_url('whyparallelism')),

  lecture_def('Jan 13', 'A Modern Multi-Core Processor: Forms of Parallelism + Understanding Latency and BW', '', 'bold', array('Assignment 1 out')),

  lecture_def('Jan 18', 'No Class (CMU MLK holiday)', '', 'bold'),

  lecture_def('Jan 20', 'Parallel Programming Models and their Corresponding HW/SW Implementations', '', 'bold',
              array('Quiz 1 due (on Fri Jan 22)')),

  lecture_def('Jan 25', 'Parallel Programming Basics (the parallelization thought process)', '', 'bold',
              array('Assignment 1 due (on Mon Jan 25)')),
 
  lecture_def('Jan 27', 'GPU Architecture and CUDA Programming', '', 'bold', array('Assignment 2 out')),

  lecture_def('Feb 1', 'Performance Optimization I: Work Distribution', '', 'bold'),

  lecture_def('Feb 3', 'Performance Optimization II: Locality, Communication, and Contention', '', 'bold', array('Quiz 2 due (on Fri Feb 5)')),

  lecture_def('Feb 8', 'Parallel Application Case Studies', '', 'bold'),

  lecture_def('Feb 10', 'Workload-Driven Performance Evaluation', '', 'bold', array('Assignment 2 due', 'Assignment 3 out (on Thu Feb 12)')),

  lecture_def('Feb 15', 'Snooping-Based Cache Coherence', '', 'bold'),

  lecture_def('Feb 17', 'Directory-Based Cache Coherence', '', 'bold', array('Quiz 3 due (on Fri Feb 19)')),

  lecture_def('Feb 22', 'Memory Consistency', '', 'bold'),

  lecture_def('Mar 24', 'Basic Snooping-Based Multiprocessor Implementation  (+ Course-So-Far Review)', '', 'bold',
              array('Assignment 3 due (on Thu Feb 26)')),
  
  lecture_def('Feb 29', 'Exam I', '', 'bold'),

  lecture_def('Mar 2', 'Scaling a Web Site: Scale-Out Parallelism, Elasticity, and Caching', '', 'bold',
              array('Assignment 4 out (on Wed Mar 2)')),

  lecture_def('Mar 7-11', 'Spring Break. Partaaay!', '', 'bold'),

  lecture_def('Mar 14', 'Topic TBD', '', 'bold'),

  lecture_def('Mar 16', 'Implementing Synchronization', '', 'bold', array('Quiz 4 due (on Fri Mar 18)')),

  lecture_def('Mar 21', 'Fine-Grained Synchronization and Lock-Free Programming', '', 'bold'),

  lecture_def('Mar 23', 'Interconnection Networks', '', 'bold', array('Assignment 4 due (on Fri Mar 27)')),

  lecture_def('Mar 28', 'Transactional Memory', '', 'bold'),

  lecture_def('Mar 30', 'Scheduling Fork-Join Parallelism', '', 'bold',
             array('Quiz 5 due (on Fri Apr 1)', 'Project Proposal Due (on Fri Apr 1)')),
                        
  lecture_def('Apr 4', 'Heterogeneous Parallelism and Hardware Specialization', '', 'bold'),

  lecture_def('Apr 6', 'Domain-Specific Parallel Programming Systems', '', 'bold'),

  lecture_def('Apr 11', 'Domain-Specific Frameworks for Parallel Graph Processing', '', 'bold'),

  lecture_def('Apr 13', 'Topic TBD', '', 'bold',
              array('Quiz 6 due (on Fri Apr 15)', 'Project Checkpoint Due (on Thu Apr 15)')),
              
  lecture_def('Apr 18', 'In-Memory Distributed Computing in Spark', '', 'bold'),

  lecture_def('Apr 20', 'Addressing the Memory Wall', '', 'bold'),

  lecture_def('Apr 25', 'Exam II (and a Bonus Lecture on Parallel 3D Graphics)', '', 'bold'),

  lecture_def('Apr 27', 'Course Wrap Up and Project Presentation Tips (How to Give a Clear Talk)', '', 'bold'),

  lecture_def('TBD', '5th Annual Parallelism Competition', '', 'bold', array('text'=> 'Final Projects Due'))
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
    <td class="schedule_date">due TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 1: Analyzing Parallel Program Performance on a Quad-Core CPU</span></td>
</tr>
<tr>
    <td class="schedule_date">due TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 2: A Simple Renderer in CUDA</span></td>
</tr>
<tr>
<td class="schedule_date">due TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 3: to be announced</span></td>
</tr>
<tr>
    <td class="schedule_date">due TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 4: A Simple, Elastic Web Server</span></td>
</tr>

<tr>
    <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Final Project / Parallelism Competition</span></td>
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
