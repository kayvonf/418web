
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS149, Winter 2019</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">PARALLEL COMPUTING</div>

<!--
<div>
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/teaser.jpg'); ?>" width="800" height="125"></a>
</div>
-->

<p style="padding-bottom: .15em">
From smart phones, to multi-core
CPUs and GPUs, to the world's largest supercomputers and web sites,
parallel processing is ubiquitous in modern computing. The goal of
this course is to provide a deep understanding of the fundamental
principles and engineering trade-offs involved in designing modern
parallel computing systems as well as to teach parallel programming
techniques necessary to effectively utilize these machines. Because
writing good parallel programs requires an understanding of key
machine performance characteristics, this course will cover both
parallel hardware and software design.
</p>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Tues/Thurs 4:30-6:00pm</div>
<div>Room 420-040</div>
<div>Instructors: <a href="https://engineering.stanford.edu/people/kunle-olukotun">Kunle Olukotun</a> and <a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a></div>

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

  lecture_def('Jan 8', 'Course Introduction + Why Parallelism?', '', 'bold',
              array('Motivations for parallel chip decisions, challenges of parallelizing code')),

  lecture_def('Jan 10', 'A Modern Multi-Core Processor', '', 'bold',
              array('Forms of parallelism: multicore, SIMD, threading + understanding latency and bandwidth')),

  lecture_def('Jan 15', 'Parallel Programming Models and their Corresponding HW/SW Implementations', '', 'bold',
              array('ways of thinking about parallel programs, and their corresponding hardware implementations, ISPC programming')),

  lecture_def('Jan 17', 'Parallel Programming Basics', '', 'bold',
              array('Thought process of parallelizing a program in data parallel and shared address space models')),

  lecture_def('Jan 22', 'Program Optimization 1: Work Distribution and Scheduling', '', 'bold',
              array('Achieving good work distribution while minimizing overhead, scheduling Cilk programs with work stealing')),

  lecture_def('Jan 24', 'Program Optimization 2: Locality and Communication', '', 'bold',
              array('Message passing, async vs. blocking sends/receives, pipelining, increasing arithmetic intensity, avoiding contention')),

  lecture_def('Jan 29', 'GPU architecture and CUDA Programming', '', 'bold',
              array('CUDA programming abstractions, and how they are implemented on modern GPUs')),

  lecture_def('Jan 31', 'Data-Parallel Programming', '', 'bold',
              array('Data parallel thinking: map, reduce, scan, prefix sum, groupByKey')),

  lecture_def('Feb 5', 'Snooping-Based Cache Coherence', '', 'bold',
              array('Definition of memory coherence, invalidation-based coherence using MSI and MESI, false sharing')),

  lecture_def('Feb 7', 'Memory Consistency', '', 'bold',
              array('Consistency vs. coherence, relaxed consistency models and their motivation, acquire/release semantics')),

  lecture_def('Feb 12', 'Midterm Exam', '', 'bold', array('')),

  lecture_def('Feb 14', 'Implementing Synchronization', '', 'bold',
              array('Machine-level atomic operations, implementing locks, implementing barriers, deadlock/livelock/starvation')),

  lecture_def('Feb 19', 'Fine-Grained Synchronization and Lock-Free Programming', '', 'bold',
              array('Fine-grained snychronization via locks, basics of lock-free programming: single-reader/writer queues, lock-free stacks, the ABA problem, hazard pointers')),

  lecture_def('Feb 21', 'Transactional memory', '', 'bold',
              array('Motivation for transactions, design space of transactional memory implementations, lazy-optimistic HTM')),

  lecture_def('Feb 26', 'Distributed Computing using Spark', '', 'bold',
              array('producer-consumer locality, RDD abstraction, Spark implementation and scheduling')),

  lecture_def('Feb 28', 'Heterogeneous Parallelism and Hardware Specialization', '', 'bold',
              array('Energy-efficient computing, motivation for heterogeneous processing, fixed-function processing, FPGAs, mobile SoCs')),

  lecture_def('Mar 5', 'Domain-Specific Programming Systems', '', 'bold',
              array('Motivation for DSLs, case studies on Halide and TBD DSL')),

  lecture_def('Mar 7', 'Domain-Specific Programming for Parallel Graph Processing', '', 'bold',
              array('GraphLab, Ligra, and GraphChi, streaming graph processing, graph compression')),

  lecture_def('Mar 12', 'Applications Talk TBD', '', 'bold',
              array('Topic TBD: scaling a web site, DNN performance tuning, etc.')),

  lecture_def('Mar 14', 'Course Wrap Up', '', 'bold',
              array('Have a great spring break!'))

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
    <td class="schedule_date">Jan 17</td><td class="schedule_lecture"><span class="bold_text">Assignment 1: Analyzing Parallel Program Performance on a Quad-Core CPU</span>
</td>
</tr>

<tr>
<td class="schedule_date">Jan 29</td><td class="schedule_lecture"><span class="bold_text">Assignment 2: A Multi-Threaded Web Server</span></td>
</tr>

<tr>
 <td class="schedule_date">Feb 11</td><td class="schedule_lecture"><span class="bold_text">Assignment 3: Parallel Graph Processing</span></td>
</tr>

<tr>
 <td class="schedule_date">Feb 26</td><td class="schedule_lecture"><span class="bold_text">Assignment 4: A Simple Renderer in CUDA</span></td>
</tr>

<tr>
 <td class="schedule_date">Mar 7</td><td class="schedule_lecture"><span class="bold_text">Assignment 5: Big Data Processing in Spark</span></td>
</tr>

</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
