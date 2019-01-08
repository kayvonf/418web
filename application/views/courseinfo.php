
<?php

function make_url($first, $second) {
  return $first . '/' . $second;
}

?>

<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS248, Winter 2019</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">INTERACTIVE COMPUTER GRAPHICS</div>

     <div>Tues/Thurs noon-1:30</div>
     <div>Room: Gates B1</div>
     <div style="padding-bottom: 20px;">Instructor:
     <a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a>
     </div>

<div class="overview_main_item overview_ruled_element">Course Description</div>


<p style="padding-bottom: .15em">
This course provides a comprehensive introduction to computer
graphics, focusing on fundamental concepts and techniques, as well as
their cross-cutting relationship to multiple problem domains in
interactive graphics (such as rendering, animation, geometry, image
processing). Topics include: 2D and 3D drawing, sampling,
interpolation, rasterization, image compositing, the GPU graphics
pipeline (and parallel rendering), geometric transformations, curves
and surfaces, geometric data structures, subdivision, meshing, spatial
hierarchies, image processing, compression, time integration,
physically-based animation, and inverse kinematics.

</p>


<div class="overview_main_item overview_ruled_element">Instructors and CAs</div>

<div class="indented_block">

<div>
  <img src="<?php echo make_url($staff_photos_url,'kayvonf.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
  <div><a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a></div>
  <div>[kayvonf at cs.stanford] </div>
  <div>Gates 366</div>
  <div>Office hours: TBD, or by appointment</div>
  <div style="clear: both;">&nbsp;</div>
</div>

<div class="overview_minor_item" style="clear: both; padding-top: 2em; padding-bottom: 2em;">Your fun and helpful CAs:</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'colin.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Colin Dolese</div>
<div>[cdolese at stanford]</div>
<div class="bold_text">Office hours:</div>
<div>TBD</div>
<div>Location: TBD</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'nikki.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Nikki Nikolenko</div>
<div>[liubov at stanford]</div>
<div class="bold_text">Office hours:</div>
<div>TBD</div>
<div>Location: TBD</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'katherine.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Katherine Sun</div>
<div>[ksun97 at stanford]</div>
<div class="bold_text">Office hours:</div>
<div>TBD</div>
<div>Location: TBD</div>
<div style="clear: both;">&nbsp;</div>
</div>


<div style="width: 360px; float: left;">
<img src="<?php echo make_url($staff_photos_url, 'elbert.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Elbert Lin</div>
<div>[el168 at stanford]</div>
<div class="bold_text">Office hours:</div>
<div>TBD</div>
<div>Location: TBD</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

</div>

<div class="overview_main_item overview_ruled_element">Announcements via Piazza</div>

<p>All class announcements will be made via our <a href="http://piazza.com/stanford/winter2019/cs248/home" target="_blank">class Piazza Page</a>.
  Please make sure you <a href="http://piazza.com/stanford/winter2019/cs248" target="_blank">sign up</a> for the course on Piazza.</p>

<div class="overview_main_item overview_ruled_element">Prerequisites</div>

<p>CS248 <span class="bold_text">DOES NOT</span> depend upon CS148 as a prereq.  However, we expect you to be a proficient C/C++ programmer to complete the required programming assignments. (We expect you've taken CS107).  We also assume basic understanding of linear algebra (MATH 51) and 3D calculus.</p>

<div class="overview_main_item overview_ruled_element">Textbook</div>

<p>There is no required textbook for CS248, though a variety of books may provide good supplementary material:</p>

<p>
<div>Pete Shirley and Steve Marschner with Michael Ashikhmin, Michael Gleicher, Naty Hoffman, Garrett Johnson, Tamara Munzner, Erik Reinhard, Kelvin Sung, William B. Thompson, Peter Willemsen, and Bryan Wyvill</div>
<div><span class="bold_text">Fundamentals of Computer Graphics. A K Peters, 2009</div>
<div><a href="https://www.amazon.com/Fundamentals-Computer-Graphics-Fourth-Marschner/dp/1482229390/ref=dp_ob_title_bk">[ On Amazon ]</a></div>
</p>

<p>
<div>John F. Hughes, Andries van Dam, Morgan McGuire, David F. Sklar, James D. Foley, Steven K. Feiner, and Kurt Akeley</div>
<div><span class="bold_text">Computer Graphics: Principles and Practice</span></div>
<div><a href="https://www.amazon.com/Computer-Graphics-Principles-Practice-3rd/dp/0321399528/ref=sr_1_2?s=books&ie=UTF8&qid=1440872554&sr=1-2&keywords=foundations+of+3d+computer+graphics">[ On Amazon ]</a></div>
</p>

<div class="overview_main_item overview_ruled_element">Grading / What You Will Do</div>

<p>
All students will be expected to perform:
<ul>
  <li>Participation in and out of class: Make comments on the course web site (one per lecture):  <span class="bold_text colored_text">5&#37;</span></li>

  <li>Three programming assignments:  <span class="bold_text colored_text">45&#37;</span></li>
  <li>Self-selected final project: <span class="bold_text colored_text">25&#37;</span></li>
  <li>Two exams: <span class="bold_text colored_text">25&#37;</span> (one in class, one take-home)</li>
</ul>
</p>

<p>Programming assigments and the final project can be completed in teams of up to two students.</p>

<p>
<span class="italic_text"Late hand-in policy.</span> Each student is allotted a total of five late-day points for the semester. Late-day points are for use on the three programming assignments only. Late-day points work as follows:

<ul>
<li>A one-person team can extend a programming assignment deadline by one day using one point.</li>
<li>A two-person team can extend a programming assignment deadline by one day using two points.
  (e.g., one point from each student)</li>
<li>If a team does not have remaining late day points, late hand-ins will incur a 10% penalty per day
(up to three days per assignment).</li>
<li>No assignments will be accepted more than three days after the deadline. This is true whether or not the student has late-day points remaining.</li>
</ul>

<div class="overview_main_item overview_ruled_element">Collaboration Policy</div>

<p>
Students in CS248 are absolutely encouraged to talk to each other, to
the TAs, to the instructors, or to anyone else about course
assignments. Any assistance, though, must be limited to discussion of
the problems and sketching general approaches to a solution. Each
student should write their own code and produce their own
writeup. Consulting another student's solution is prohibited and
submitted solutions may not be copied from any source. These and any
other form of collaboration on assignments constitute cheating. If you
have any question about whether some activity would constitute
cheating, just be cautious and ask the instructors before proceeding!
</p>

<p>You may not supply code, assignment writeups, or exams you complete
during CS248 to other students in future instances of this course
or make these items available (e.g., on the web) for use in future
instances of this course (just as you may not use work completed by
students who've taken the course previously). Make sure to make
repositories private if you use public source control hosts like
github.
</p>


<p>&nbsp;</p>

