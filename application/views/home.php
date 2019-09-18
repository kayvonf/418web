
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS149, Winter 2019</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">PARALLEL COMPUTING</div>

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

  lecture_def('Jan 8', 'Course Introduction + Why Parallelism?', lecture_url('whyparallelism'), '',
              array('Motivations for parallel chip decisions, challenges of parallelizing code')),

  lecture_def('Jan 10', 'A Modern Multi-Core Processor', lecture_url('basicarch'), '',
              array('Forms of parallelism: multicore, SIMD, threading + understanding latency and bandwidth')),

  lecture_def('Jan 15', 'Parallel Programming Models and their Corresponding HW/SW Implementations', lecture_url('progmodels'), '',
              array('ways of thinking about parallel programs, and their corresponding hardware implementations, ISPC programming')),

  lecture_def('Jan 17', 'Parallel Programming Basics', lecture_url('progbasics'), '',
              array('Thought process of parallelizing a program in data parallel and shared address space models')),

  lecture_def('Jan 22', 'Program Optimization 1: Work Distribution and Scheduling', lecture_url('perfopt1'), '',
              array('Achieving good work distribution while minimizing overhead, scheduling Cilk programs with work stealing')),

  lecture_def('Jan 24', 'Program Optimization 2: Locality and Communication', lecture_url('perfopt2'), '',
              array('Message passing, async vs. blocking sends/receives, pipelining, increasing arithmetic intensity, avoiding contention')),

  lecture_def('Jan 29', 'GPU architecture and CUDA Programming', lecture_url('gpuarch'), '',
              array('CUDA programming abstractions, and how they are implemented on modern GPUs')),

  lecture_def('Jan 31', 'Snooping-Based Cache Coherence', lecture_url('cachecoherence'), '',
              array('Definition of memory coherence, invalidation-based coherence using MSI and MESI, false sharing')),

  lecture_def('Feb 5', 'Memory Consistency', lecture_url('consistency'), '',
              array('Consistency vs. coherence, relaxed consistency models and their motivation, acquire/release semantics')),

  lecture_def('Feb 7', 'Directory-Based Coherence + Implementing Synchronization', lecture_url('synchronization'), '',
              array('Directory-based coherence, machine-level atomic operations, implementing locks, implementing barriers')),

  lecture_def('Feb 12', 'Midterm Exam', '', 'bold', array('')),

  lecture_def('Feb 14', 'Data-Parallel Thinking', lecture_url('dataparallel'), '',
              array('Data parallel thinking: map, reduce, scan, prefix sum, groupByKey')),

  lecture_def('Feb 19', 'Distributed Computing using Spark', lecture_url('spark'), '',
              array('producer-consumer locality, RDD abstraction, Spark implementation and scheduling')),

  lecture_def('Feb 21', 'Fine-Grained Synchronization and Lock-Free Programming', lecture_url('lockfree'), '',
              array('Fine-grained snychronization via locks, basics of lock-free programming: single-reader/writer queues, lock-free stacks, the ABA problem, hazard pointers')),

  lecture_def('Feb 26', 'Transactional memory', lecture_url('tm'), '',
              array('Motivation for transactions, design space of transactional memory implementations, lazy-optimistic HTM')),

  lecture_def('Feb 28', 'Heterogeneous Parallelism and Hardware Specialization', lecture_url('heterogeneity'), '',
              array('Energy-efficient computing, motivation for heterogeneous processing, fixed-function processing, FPGAs, mobile SoCs')),

  lecture_def('Mar 5', 'Domain-Specific Programming Systems', lecture_url('dsl'), '',
              array('Motivation for DSLs, OptiML, Delite, case study on Halide')),

  lecture_def('Mar 7', 'Parallel Graph Processing Frameworks + How DRAM Works', lecture_url('graphmemory'), '',
              array('GraphLab, Ligra, and GraphChi, streaming graph processing, graph compression')),

  lecture_def('Mar 12', 'Efficienly Evaluating DNNs', lecture_url('dnneval'), '',
              array('Scheduling convlayers, exploiting precision and sparsity, DNN acelerators (e.g., GPU TensorCores, TPU)')),

  lecture_def('Mar 14', 'Parallel DNN Training + Course Wrap Up', lecture_url('dnntrain'), '',
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
<td class="schedule_date">Jan 18</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs149/asst1">Assignment 1: Analyzing Parallel Program Performance on a Quad-Core CPU</a>
</td>
</tr>

<tr>
<td class="schedule_date">Feb 1</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs149/asst2">Assignment 2: A Multi-Threaded Web Server in Java</a></td>
</tr>

<tr>
 <td class="schedule_date">Feb 17</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs149/asst3">Assignment 3: Big Graph Processing in OpenMP</a></td>
</tr>

<tr>
 <td class="schedule_date">Mar 1</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs149/asst4">Assignment 4: A Simple Renderer in CUDA</a></td>
</tr>

<tr>
 <td class="schedule_date">Mar 14</td><td class="schedule_lecture"><a href="https://github.com/stanford-cs149/asst5">Assignment 5: Big Data Processing in Spark</a></td>
</tr>

</table>

<div class="overview_main_item overview_ruled_element">Written Assignments</div>

<table>
<tr>
<td class="schedule_date">Jan 25</td><td class="schedule_lecture"><a href="<?php echo $exercises_base_url . '/asst1.pdf' ?>">Written Assignment 1: Multi-threading Scheduling + The Most ALUs Wins + Angry Students</a>
</td>
</tr>

<tr>
<td class="schedule_date">Feb 5</td><td class="schedule_lecture"><a href="<?php echo $exercises_base_url . '/asst2.pdf' ?>">Written Assignment 2: Sending Messages + Processing Pipeline + Be a Processor Architect</a></td>
</tr>

<tr>
 <td class="schedule_date">Feb 20</td><td class="schedule_lecture"><a href="<?php echo $exercises_base_url . '/asst3.pdf' ?>">Written Assignment 3: Spin Locks + PKPU + Data Parallel Thinking</a></td>
</tr>

<tr>
 <td class="schedule_date">Feb 27</td><td class="schedule_lecture"><a href="<?php echo $exercises_base_url . '/asst4.pdf' ?>">Written Assignment 4: Spark Memory Footprint + Concurrent Hashtables and Graphs</a></td>
</tr>

<tr>
 <td class="schedule_date">Mar 8</td><td class="schedule_lecture"><a href="<?php echo $exercises_base_url . '/asst5.pdf' ?>">Written Assignment 5: Comparing and Swapping + Transactions on Trees</a></td>
</tr>
</table>


<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
