
<?php

function make_url($first, $second) {
  return $first . '/' . $second;
}

?>

<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS348K, Spring 2020</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>

     <div>Tues/Thurs 3:00-4:20 (virtual only)</div>
     <div style="padding-bottom: 20px;">Instructor:
     <a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a>
     </div>

<div class="overview_main_item overview_ruled_element">Course Description</div>

<p style="padding-bottom: .15em">
Visual computing tasks such as computational imaging, image/video
understanding, and real-time 3D graphics are key responsibilities of
modern computer systems ranging from sensor-rich smart phones,
autonomous robots, and large datacenters. These workloads demand
exceptional system efficiency and this course examines the key ideas,
techniques, and challenges associated with the design of parallel,
heterogeneous systems that accelerate visual computing
applications.</p>

<p>This course is intended for systems students interested in
architecting efficient graphics, image processing, and computer vision
platforms (both new hardware architectures and domain-optimized
programming frameworks for these platforms) and for graphics, vision,
and machine learning students that wish to understand throughput
computing principles so they can design new algorithms that map
efficiently to these machines.
</p>

<p style="padding-bottom: .15em">
</p>


<div class="overview_main_item overview_ruled_element">Instructors and CAs</div>

<div class="indented_block">

<div>
  <img src="<?php echo make_url($staff_photos_url,'kayvonf.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
  <div><a href="http://graphics.stanford.edu/~kayvonf">Kayvon Fatahalian</a></div>
  <div>Office Hours: by appointment</div>
  <div style="clear: both;">&nbsp;</div>
</div>

<div>
<img src="<?php echo make_url($staff_photos_url, 'dillon.jpg'); ?>" width="100" height="100" style="float: left; margin-right: 20px; border: #808080 1px solid;" />
<div class="ta-name">Dillon Huff</div>
<div>Office Hours: by appointment</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div style="clear: both;">&nbsp;</div>

<div class="overview_main_item overview_ruled_element">Announcements via Piazza</div>

<p>All class announcements will be made via our <a href="https://piazza.com/stanford/spring2020/cs348k/home" target="_blank">class Piazza Page</a>.
  Please make sure you <a href="https://piazza.com/stanford/spring2020/cs348k" target="_blank">sign up</a> for the course on Piazza.</p>

<div class="overview_main_item overview_ruled_element">Grading / What You Will Do</div>

<p>
All students will be expected to:
<ul>
  <li>Perform academic paper readings approximately every class
(and be prepared to summarize aspects of the paper and participate in the paper discussions we have in class). <span class="bold_text \
colored_text">(40&#37;)</span>
  </li>
  <li>Complete two programming assignments that are designed to give a brief, but first-hand experience with course topics in the first section of the course. <span class="bold_text colored_text">(20&#37;)</span>
  </li>
  <li>Complete a self-selected term project.  Students may work in
  teams of two for the final project. <span class="bold_text colored_text">(40&#37;)</li>
</ul>
</p>

<div class="overview_main_item overview_ruled_element">Prerequisites and How to Prepare</div>

<p>
Hello there. I'm glad you are interested in cs348K. This course
focuses on the design of computing systems that efficiently meet the
aggressive performance demands of visual computing
applications. Specifically we'll be concerned with digital camera
image processing, image/video understanding (largely deep learning
based methods), and real-time 3D graphics. Since designing highly
efficient systems requires in-depth knowledge of the workloads to
execute, we will cover key algorithms used in each of these
domains. That is, you will certainly learn some advanced
graphics/vision. Conversely, to execute with high performance, algorithms
must be mapped efficiently to hardware resources, and to do so, we
will talk extensively about the characteristics of modern parallel
architecture, and how that impacts the choice of algorithms used. That
is, we will also be discussing parallel computer architecture is this
class. A key theme of this course is that, to achieve the most
efficient solutions, modern systems architects should simultaneously
consider opportunities for innovation in the design of algorithms, the
programming frameworks used to express them, and the capabilities of
the underlying hardware architecture. Regardless of whether you are an
application developer, systems software programmer, or hardware
architect, I want to you leave this course with a better understanding
of how to think end-to-end.</p>

<p>It is likely that you may have a strong background in parallel
architecture or in algorithms for either computer graphics/computer
vision, but not in both. <span class="bold_text">Do not
panic, but please read the tips below.</span></p>

<p>This is a graduate-level course but advanced undergraduates are
  certainly welcome. (You are responsible for determining whether you
  can keep up with the course). <span class="bold_text">For
  undergraduates CS110 (or equivalent) is a strict
  prerequisite.</span> Although the programming assignments in this
  class are short, you need to have a strong systems programming
  background to do the assignments, as well has have enough systems
  programming experience to understand the papers we read.  The more
  prior implementation experience the better.  </p>

<p>On the parallel systems side, I recommend having some background in
modern parallel computing at the level of <a
href="http://cs149.stanford.edu">CS149</a>, or a computer architecture
course such as EE282.  <span class="bold_text">You may wish to review
some of the lectures in my own prior course on parallel computing at
CMU</span>, from which you can find public online lectures <a
href="http://15418.courses.cs.cmu.edu/spring2017/">here (2017)</a> and
<a href="http://15418.courses.cs.cmu.edu/spring2017/">here (2016)</a>
(newer content in 2017, better videos in 2016).</p>

<p>On the graphics, computer vision, and deep learning side of the
fence, I recommend you have some background implementing algorithms in
at least one of these areas.  For 3D computer graphics, that would be
at the level of <a href="http://cs248.stanford.edu/">CS248</a>, for
computer vision it is CS231A or <A
href="http://cs231n.stanford.edu/">CS231N</a> (CS231N is very relevant
to our discussions), and for image processing: CS232/EE368.
Graduate-level systems and computer architecture students without
substantial graphics/computer vision experience are welcome in CS348K
(in fact the course is designed for you!), but you must be willing to
familiarize yourselves with key graphics/visual computing concepts
during the course.  You can't design good systems unless you really
understand the workloads.

<p>If you are still unsure if you're prepared to take the course, just come talk to
 your <a href="http://graphics.stanford.edu/~kayvonf">friendly
 instructor</a> before the start of the course.
</p>

<p>&nbsp;</p>
