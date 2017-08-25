
<?php

function make_url($first, $second) {
  return $first . '/' . $second;
}

?>

<div class="home_title">Computer Graphics <span style="font-size: 12pt;">(CMU 15-462/662)</span> </div>


<div>CMU 15-462/662, Fall 2017</div>
     <div>Time: TBD</div>
     <div>Location: TBD</div>
<div style="padding-bottom: 20px;">Instructor: TBD 

<div class="overview_main_item overview_ruled_element">Course Description</div>

<p> 
This course provides a comprehensive introduction to computer graphics. Focuses on fundamental concepts and techniques, and their cross-cutting relationship to multiple problem domains in graphics (rendering, animation, geometry, imaging). Topics include: sampling, aliasing, interpolation, rasterization, geometric transformations, parameterization, visibility, compositing, filtering, convolution, curves & surfaces, geometric data structures, subdivision, meshing, spatial hierarchies, ray tracing, radiometry, reflectance, light fields, geometric optics, Monte Carlo rendering, importance sampling, camera models, high-performance ray tracing, differential equations, time integration, numerical differentiation, physically-based animation, optimization, numerical linear algebra, inverse kinematics, Fourier methods, data fitting, example-based synthesis.
</p>

<div class="overview_main_item overview_ruled_element">Instructors</div>

<div class="indented_block">


<div style="width: 380px; float: left;">
<img src="<?php echo base_url('assets/images/staff/kmcrane.jpg') ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div><a href="http://keenan.is/here">Keenan Crane</a></div>
<div>[kmcrane@cs.cmu.edu] </div>
<div>Smith Hall 215</div>
<div>Office hours: drop by anytime, or by appointment</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo base_url('assets/images/staff/stelian.png') ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div><a href="http://www.cs.cmu.edu/~scoros">Stelian Coros</a></div>
<div>[scoros@cmu.edu] </div>
<div>Smith Hall 229</div>
<div>Office hours: drop by anytime, or by appointment</div>
<div style="clear: both;">&nbsp;</div>
</div>


<div style="clear: both;">&nbsp;</div>

<div class="overview_minor_item" style="clear: both; padding-top: 2em; padding-bottom: 2em;">Your fun and helpful TAs:</div>


<div style="width: 360px; float: left;">
<img src="<?php echo base_url('assets/images/staff/zach.jpg') ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Zachary Shearer</div>
<div>zshearer@andrew.cmu.edu</div>
<div class="bold_text">Office hours:</div>
<div>Tue 3pm-5pm</div>
<div>Location: <a href="http://www.cs.cmu.edu/~gkesden/ghc5/">Citadel Commons</a> (5th floor GHC, near Pausch Bridge)</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 380px; float: left;">
<img src="<?php echo base_url('assets/images/staff/L6052930.JPG') ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Qiuyi Jia</div>
<div>qiuyij@andrew.cmu.edu</div>
<div class="bold_text">Office hours:</div>
<div>Mon 4:30pm-6:30pm</div>
<div>Location: TBD</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>


<div style="width: 360px; float: left;">
<img src="<?php echo base_url('assets/images/staff/Se-Joon.JPG') ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Se-Joon Chung</div>
<div>sejoonc@cmu.edu</div>
<div class="bold_text">Office hours:</div>
<div>Wed 3-5pm</div> 
<div>Location: GHC 6004</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

</div> <!-- indented -->


<div class="overview_main_item overview_ruled_element">Prerequisites</div>

<p> Course prerequisites are (15-213, 21-259, and 21-240) or (15-213,
21-259, and 21-241) or (18-213 and 18-202).  Basic vector calculus and
linear algebra will be an important component of this course.
Previous exposure to basic C/C++ programming is very helpful as course
programming assignments will involve significant implementation
effort.</p>

<div class="overview_main_item overview_ruled_element">Textbook</div>

<p> There is no required textbook for 15-462, though a variety of books may provide good supplementary material:</p>

<p>
<div>Pete Shirley and Steve Marschner with Michael Ashikhmin, Michael Gleicher, Naty Hoffman, Garrett Johnson, Tamara Munzner, Erik Reinhard, Kelvin Sung, William B. Thompson, Peter Willemsen, and Bryan Wyvill</div>
<div><span class="bold_text">Fundamentals of Computer Graphics</span>. A K Peters, 2009</div>
<div><a href="http://www.amazon.com/Fundamentals-Computer-Graphics-Peter-Shirley/dp/1568814690" target="_blank">[ On Amazon ]</a></div>
</p>

<p>
<div>John F. Hughes, Andries van Dam, Morgan McGuire, David F. Sklar, James D. Foley, Steven K. Feiner, and Kurt Akeley</div>
<div class="bold_text">Computer Graphics: Principles and Practice</div>
<div><a href="http://www.amazon.com/Computer-Graphics-Principles-Practice-3rd/dp/0321399528/ref=sr_1_2?s=books&ie=UTF8&qid=1440872554&sr=1-2&keywords=foundations+of+3d+computer+graphics" target="_blank">[ On Amazon ]</a></div>
</p>

<p>
<div>Matt Pharr and Greg Humphreys</div>
<div class="bold_text">Physically Based Rendering: From Theory to Implementation</div>
<div><a href="http://www.amazon.com/gp/product/0123750792?ie=UTF8&tag=pharr-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=0123750792" target="_blank">[ On Amazon ]</a></div>
<div>This book (PBRT) is <span class="bold_text">the book</span> for learning about modern ray tracing techniques. It has a <a href="http://www.pbrt.org">great website</a> with full source code online for an advanced physically-based ray tracer. It even won an <a href="https://www.youtube.com/watch?v=7d9juPsv1QU">oscar</a> for its impact on the film industry!</div>
</p>

<div class="overview_main_item overview_ruled_element">Discussion Boards</div>

<p>We will be using Piazza for announcements. The 15-462/662 Piazza page is located <a href="https://piazza.com/cmu/fall2016/1546215662/home" target="_blank">here</a>.</p>

<div class="overview_main_item overview_ruled_element">Grading</div>

<p>
<span class="italic_text">(5&#37;) Written Assignment.</span>
Students will be given a written assignment to test their understanding of mathematical concepts that are core to computer graphics.
</p>

<p>
<span class="italic_text">(60&#37;) Programming Assignments.</span>
Students will complete four programming assignments, plus one &ldquo;go further&rdquo; final assignment that extends one of the first four assignments with an advanced technique.  Each assignment will be worth 20&#37; of the programming component of the course, or 12.5&#37; of the overall course grade.  The first four assignments will be done individually; the final assignment can be done in pairs.
</p>


<p><span class="italic_text">(7&#37;) Take Home Quizzes.</span>
Following each lecture, students will complete a (very) short take-home quiz that reinforces the most essential concepts from the lecture.  These quizzes will be graded primarily on effort: was an earnest effort made to answer the questions?  Quizzes <span class="italic_text">must be turned in by the student, at the beginning of the next lecture</span>.  To mitigate potential absences (sick days, etc.), students can omit up to <span class="bold_text">six quizzes without penalty</span>.  Students are encouraged to discuss concepts with their peers, but final quiz answers must be written independently and individually.
</p>

<p><span class="italic_text">(25&#37;) Midterm / Final.</span>
There will be a midterm and a final, each worth 12.5&#37; of the overall course grade.  Both exams will cover the cumulative material seen in the course so far.
</p>

<p><span class="italic_text">(3&#37;) Class Participation.</span> At the discretion of the instructors, based on consistent attempts at in-class comments, website comments, and other contributions to the class.</p>


<p>
<span class="italic_text">Late hand-in policy.</span> Each student is allotted a total of <span class="bold_text">five late-day points</span> for the semester. Late-day points are for use on the first four programming assignments only. Late-day points work as follows:</p>

<ul>
<li>A student can extend a programming assignment deadline by one day using one point.</li>
<li>If a student does not have remaining late day points, late hand-ins will incur a 10&#37; penalty per day (10% of max points on the assignment).</li>
<li> <span class="colored_text">No assignments will be accepted more than three days after the deadline.  This is true whether or not the student has late-day points remaining.</span></li>
</ul>

<div class="overview_main_item overview_ruled_element">Collaboration Policy</div>

<p> Students in 15-462 are absolutely encouraged to talk to each
other, to the TAs, to the instructors, or to anyone else about course
assignments. Any assistance, though, must be limited to discussion of
the problems and sketching general approaches to a solution. Each
student should write their own code and produce their
own writeup.

Consulting another student's solution is prohibited and
submitted solutions may not be copied from any source. <span
class="colored_text">These and any other form of collaboration on
assignments constitute cheating.</span> If you have any question about
whether some activity would constitute cheating, just be cautious and
ask the instructors before proceeding!</p>

<p> You may not supply code, assignment writeups, or exams you
complete during 15-462/662 to other students in future instances of
this course or make these items available (e.g., on the web) for use
in future instances of this course (just as you may not use work
completed by students who've taken the course previously).  Make sure
to make repositories private if you use public source control hosts
like github.</p>

<p>&nbsp;</p>

</div>

