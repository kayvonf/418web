
<?php

function make_url($first, $second) {
  return $first . '/' . $second;
}

?>

<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming</div>

<div style="padding-top: 20px;">
<img src="<?=base_url()?>assets/images/logos/banner_logo.png" width="487" height="70" />
</div>

<p>This course was held at Tsinghua University in Summer 2017. The CMU version of this course is <a href="http://15418.courses.cs.cmu.edu">15-418/618</a>.</p>

<div class="overview_main_item overview_ruled_element">Course Description</div>

<p>
From smart phones, to multi-core CPUs and GPUs, to the world's largest
supercomputers and web sites, parallel processing is ubiquitous in
modern computing. The goal of this course is to provide a deep
understanding of the fundamental principles and engineering trade-offs
involved in designing modern parallel computing systems as well as to
teach parallel programming techniques necessary to effectively utilize
these machines.  Because writing good parallel programs requires an
understanding of key machine performance characteristics, this course
will cover both parallel hardware and software design.
</p>

<div class="overview_main_item overview_ruled_element">Instructors</div>

<div class="indented_block">

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url,'kayvonf.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div><a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a></div>
<div>(CMU)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'weixue.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div><a href="Wei Xue">Wei Xue</a></div>
<div>(Tsinghua)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>


<div class="overview_minor_item" style="clear: both; padding-top: 2em; padding-bottom: 2em;">Your helpful TAs:</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'yonghe.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name"><a href="http://www.csyong.net/">Yong He</a></div>
<div>(CMU)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'xuji.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Xu Ji</div>
<div>(Tsinghua)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'yangu.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name"><a href="http://www.cs.cmu.edu/~ygu1/">Yan Gu</a></div>
<div>(CMU)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'pingxu.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Ping Xu</div>
<div>(Tsinghua)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

</div> <!-- indented -->

<div class="overview_main_item overview_ruled_element">Prerequisites</div>

<p>Students are expected to be strong C/C++ programmers as there will
be exposure to a variety of "C-like" parallel programming languages in
this course.  The course assumes that students have basic knowledge of
systems level topics, such as the representation of programs as
machine code, how a processor executes an instruction stream, memory
hierarchy design, memory management, and simple networking.  While
some knowledge of computer architecture would be helpful for
understanding the material in this course, it is not a prerequisite.
Previous experience with operating systems, distributed systems, or
compilers may prove to be very helpful.  </p>

<div class="overview_main_item overview_ruled_element">Textbook</div>

<p> There is no required textbook for the course. Luckily, in general
these days there are plenty of great parallel programming resources
available for free on the web.  However, if you wish to obtain a
textbook for additional reading, you may find the following books
helpful.</p>

<p>
<div>David E. Culler and Jaswinder Pal Singh, with Anoop Gupta</div>
<div><span class="italic_text">Parallel Computer Architecture: A Hardware/Software Approach.</span> Morgan Kaufmann, 1998</div>
</p>

<p>
<div>John L. Hennessy and David A. Patterson</div>
<div><span class="italic_text">Computer Architecture, Fifth Edition: A Quantitative Approach</span>. Morgan Kaufmann, 2011</div>
</p>

<p>
<div>Jason Sanders</div>
<div><span class="italic_text">CUDA by Example: An Introduction to General-Purpose GPU Programming</span>. 1st Edition. Addison-Wesley. 2010</div>
</p>

<p>
<div>David Kirk and Wen-mei Hwu</div>
<div><span class="italic_text">Programming Massively Parallel Processors, Second Edition: A Hands-on Approach</span>. 2nd Edition. Morgan Kauffmann. 2012</div>
</p>

<p>
</p>

<div class="overview_main_item overview_ruled_element">Assignments and Homework</div>

<p>There is no final exam for this course.</p>

<p>
<span class="italic_text">Programming assignments.</span>
Students will complete three programming
assignments.  These assignments will involve programming in C-like
languages for CPUs and GPUs such as C, ISPC, and CUDA.  Each
assignment will take about one week. Programming assignment grades
will be based on code performance and will be automatically graded vis
script so that students know an estimate of their grade at the time of
submission.
</p>

<p> <span class="italic_text">Written assignments.</span> Students
will complete four written assignments. These assignments will take
about four days each, and will graded to provide students feedback.
Students will then have one opportunity to correct their original
written handin and resubmit corrected assignments for 90&#37; of the
original credit.  There will be further opportunities for students to
earn up to 100&#37; of the original credit.  </p>

<div class="overview_main_item overview_ruled_element">Grading</div>

<ul>
<li>Programming Assignments (3): 20&#37; + 20&#37; + 20&#37; = <span class="colored_text">60&#37;</span></li>
<li>Written Assignments (4): 10&#37; + 10&#37; + 10&#37; + 10&#37; = <span class="colored_text">40&#37;</span></li>
</ul>

<div class="overview_main_item overview_ruled_element">Collaboration Policy</div>

<p>
Students in this course are absolutely encouraged to talk to each
other, to the TAs, to the instructors, or to anyone else about course
assignments. Any assistance, though, must be limited to discussion of
the problems and sketching general approaches to a solution. Each
student must write their own code and produce their own
writeup.

<span class="bold_text">Consulting another student's solution, or solutions from the
internet, is prohibited on assignments. These and any other form of
collaboration constitute cheating.</span> If you have any question about
whether some activity would constitute cheating, just be cautious and
ask the instructors before proceeding!
</p>

<p>
You may not supply code, assignment writeups, or exams you
complete during the course to other students in future instances of
this course or make these items available (e.g., on the web) for use
in future instances of this course (just as you may not use work
completed by students who've taken the course previously). You are
welcome to use source control hosts like <a href="http://www.github.com">Github</a>
for your assignments, however
please be sure to make your programming assignment repositories
private.
</p>

<p>&nbsp;</p>

</div>
