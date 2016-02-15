
<?php

function make_url($first, $second) {
  return $first . '/' . $second;
}

?>

<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>

<div>CMU 15-418/618, Spring 2016</div>
     <div><Mon/Wed 3:00 - 4:20pm</div>
     <div>GHC 4401 (Rashid Auditorium)</div>
     <div style="padding-bottom: 20px;">Instructors: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a> and <a href="http://www.cs.cmu.edu/~bryant/">Randal Bryant</a></div>

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
<div>[kayvonf at cs] </div>
<div>Smith Hall 225</div>
<div>Office hours: Tue 4-5pm,<br/>Fri 4-5pm, or by appointment</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'randy.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div><a href="http://www.cs.cmu.edu/~bryant/">Randal Bryant</a></div>
<div>[bryant at cs]</div>
<div>GHC 9125</div>
<div>Office hours: Mon 1:30-2:30pm</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url,'bpr.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div><a href="http://www.cs.cmu.edu/~bpr">Brian Railing</a></div>
<div>[bpr at andrew] </div>
<div>GHC 6025</div>
<div>Office hours: Thu 12-1pm,<br/>or by appointment</div>
<div style="clear: both;">&nbsp;</div>
</div>


<div class="overview_minor_item" style="clear: both; padding-top: 2em; padding-bottom: 2em;">Your fun and helpful TAs:</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'grose.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Gregory Rose</div>
<div>grose at andrew</div>
<div class="bold_text">Office hours:</div>
<div> Mon 4:30-5:30pm</div>
<div>Location: Gates Collaborative Commons (5th floor)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'cacay.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Josh Acay</div>
<div>cacay at andrew</div>
<div class="bold_text">Office hours:</div>
<div>Tue 2-3pm</div>
<div>Location: Gates Collaborative Commons (5th floor)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'oguz.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Oguz Ulgen</div>
<div>oulgen at andrew</div>
<div class="bold_text">Office hours:</div>
<div>Wed 1:30-2:30pm</div>
<div>Location: Gates Collaborative Commons (5th floor)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'kcma.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Karima Ma</div>
<div>kcma at andrew</div>
<div class="bold_text">Office hours:</div>
<div>Thu 4-5pm</div>
<div>Location: Gates Collaborative Commons (5th floor)</div>
<div style="clear: both;">&nbsp;</div>
</div>


<div style="clear: both;">&nbsp;</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'kku.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Kevin Ku</div>
<div>kevinku at cmu</div>
<div class="bold_text">Office hours:</div>
<div>Wed 5:30-6:30, Fri 1-2pm</div>
<div>Location: Gates Collaborative Commons (5th floor)</div>
<div style="clear: both;">&nbsp;</div>
</div>



<div style="clear: both;">&nbsp;</div>

</div> <!-- indented -->

<div class="overview_main_item overview_ruled_element">Prerequisites</div>

<p> <span class="bold_text">15-213/513 (Intro to Computer Systems) is
a strict prerequisite for this course.</span> We
will build directly upon the material presented in 15-213, including
memory hierarchies, memory management, basic networking, etc. While
18-447 (Intro to Computer Architecture) would be helpful for
understanding the material in this course, it is not a prerequisite.
Students are expected to be strong C/C++ programmers as there will be
exposure to a variety of "C-like" parallel programming languages in
this course.  Previous experience with operating systems (15-410),
distributed systems (15-440), or compilers (15-411) may prove to be
very helpful.  </p>

<div class="overview_main_item overview_ruled_element">Textbook</div>

<p> There is no required textbook for 15-418/618. However, the following
two textbooks will be put on reserve in the library for your use.</p>

<p>
<div>David E. Culler and Jaswinder Pal Singh, with Anoop Gupta</div>
<div>Parallel Computer Architecture: A Hardware/Software Approach. Morgan Kaufmann, 1998</div>
<div><a href="http://www.amazon.com/Parallel-Computer-Architecture-Hardware-Software/dp/1558603433" target="_blank">[ On Amazon ]</a></div>
</p>

<p>
<div>John L. Hennessy and David A. Patterson</div>
<div>Computer Architecture, Fifth Edition: A Quantitative Approach. Morgan Kaufmann, 2011</div>
<div><a href="http://www.amazon.com/gp/product/012383872X" target="_blank">[ On Amazon ]</a></div>
</p>

<div class="overview_main_item overview_ruled_element">Discussion Boards</div>

<p>We will be using Piazza for general class announcements. The
15-418/618 Piazza page is located <a
href="http://piazza.com/cmu/spring2016/15418618/home"
target="_blank">here</a>.</p>

<div class="overview_main_item overview_ruled_element">Assignments, Projects, and Exams (What you'll be doing!)</div>

<p>
<span class="italic_text">Programming assignments.</span> Students
will complete four programming assignments.  Assignment 1 will be
performed individually. The remaining three assignments may be
performed in groups of at most two. Although it is not necessary to
have a partner in 15-418/618, it is highly recommended.
</p>

<p><span class="italic_text">Take home quizzes.</span> Students will
complete take-home quizzes assigned every two weeks (six in
total). Quizzes will be released on Wed night and be due the next
Friday at 10am. These quizzes must be completed individually without
discussion with other students, but will be graded on a participation
basis only.  </p>

<p><span class="italic_text">Making per-lecture comments.</span> Each
student must individually contribute one interesting comment per
lecture using the course web site.</p>

<p><span class="italic_text">Final project.</span> Over the last six
weeks of the course students will propose and complete a self-selected
final project.  The final project can be performed individually or in
groups of two. Each team will present the project orally during the
15-418/618 Parallelism Competition and produce a detailed write-up
describing their work and results.</p>

<p>
<span class="italic_text">Exams.</span> There will be two in-class exams.
</p>

<div class="overview_main_item overview_ruled_element">Grading</div>

<ul>
<li>Programming Assignments (4): 7&#37; + 10&#37; + 12&#37; + 10&#37; = <span class="colored_text">39&#37;</span></li>
<li>Exams (2):  <span class="colored_text">28&#37;</span></li>
<li>Final Project: <span class="colored_text">28&#37;</span></li>
<li>Participation (quizzes and on-line comments): <span class="colored_text">5&#37;</span></li>
</ul>

<p>

<span class="italic_text">Late hand-in policy.</span> Each student is
allotted a total of <span class="bold_text">five late-day
points</span> for the semester. Late-day points are for use on
programming assignments only. (They cannot be used for quizzes or
final projects) Late-day points work as follows:</p>

<ul>
<li>A one-person team can extend a programming assignment deadline by one day using one point.</li>
<li>A two-person team can extend a programming assignment deadline by one day using two points. <br/>(e.g., one point from each student)</li>
<li>If a team does not have remaining late day points, late hand-ins will incur a 10&#37; penalty per day <br/>(up to three days per assignment).</li>
<li> No assignments will be accepted more than three days after the deadline.</li>
</ul>

<div class="overview_main_item overview_ruled_element">Collaboration Policy</div>

<p> Students in 15-418/618 are absolutely encouraged to talk to each
other, to the TAs, to the instructors, or to anyone else about course
assignments. Any assistance, though, must be limited to discussion of
the problems and sketching general approaches to a solution. Each
programming project team must write their own code and produce their
own writeup.

<span class="bold_text colored_text">Consulting another student's or
team's solution, or solutions from the internet, is prohibited. These
and any other form of collaboration on assignments constitute
cheating.</span> If you have any question about whether some activity
would constitute cheating, just be cautious and ask the instructors
before proceeding!</p>

<p> You may not supply code, assignment writeups, or exams you
complete during 15-418/618 to other students in future instances of
this course or make these items available (e.g., on the web) for use
in future instances of this course (just as you may not use work
completed by students who've taken the course previously).  Make sure
to make repositories private if you use public source control hosts
like github.  </p>

<p>&nbsp;</p>

</div>
