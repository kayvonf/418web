
<div class="home_container">

<div class="home_title">VISUAL COMPUTING SYSTEMS</div>

<p>This page contains lecture slides, videos, and recommended readings for the Fall 2016 offering of 15-769.</p>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('introhwreview'); ?>">Lecture 1:
     History of Visual Computing + Throughput Architecture Review</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics Gen9</a>, Intel Technical Whitepaper </li>
     </ul>

     <div class="instructions">

<p>The required reading for this class is not an academic technical
paper, but a whitepaper from Intel describing the architectural
geometry of their latest GPU. This processor is particularly notable
because it is the integrated GPU that will be in most mid-2016 and
later Core i5 or i7 processors -- the marketing name is HD Graphics
530 (or larger).</p>

<p>I'd like to you read the whitepaper, focusing on the description of
the processor in Sections 5.3-5.5.  Then, given your knowledge of the
concepts discussed in lecture (such as superscalar, multi-core,
multi-threading, etc), I'd like you to describe the features of the
processor (using terms from the lecture, not Intel terms).</p>

<p>Pro tip: Consider your favorite data-parallel language, such as
GLSL/HLSL shading languages, CUDA, OpenCL, ISPC, or just an OpenMP
#pragma parallel for, and make sure you can think through how an
embarrassingly parallel for loop can be lowered to these
architectures. (You don't need to write this down, but you could.)
</p>

<p>Students wanting to go farther might also be interested in also
  reading the NVIDIA P100 or GTX 980 whitepapers also linked below.
  Then you could make a table contrasting the geometry of: a modern
  AVX-capable Intel CPU, Intel Integrated Graphics (Gen9), NVIDIA
  GPUs, and any other processor you might be interested in, such as
  Intel Knights Corner, AMD GPUs, etc.  </p>
  
</div>
     
     <div>Further Reading:</div>
     <ul>
     <li>The point of this review lecture was to get you ready for 15-769. You may wish to review content from 15-418/618 Spring 2016 <a href="http://15418.courses.cs.cmu.edu/spring2016/lecture/basicarch">lecture 2</a>, in particular <a href="http://15418.courses.cs.cmu.edu/spring2016/lecture/gpuarch">lecture 5</a>, and <a href="http://15418.courses.cs.cmu.edu/spring2016/lecture/heterogeneity">lecture 19</a>. Lecture videos are online. <a href="http://15418.courses.cs.cmu.edu/spring2016/exercises">Practice excercises 1 and 2</a> are applicable to this material, as well as many of the questions on the exam practice problems.</li>
     
     <li>I highly recommend that all students complete <a href="http://15418.courses.cs.cmu.edu/spring2016/article/3">15-418/618 Assignment 1</a> as an exercise if you have not taken 418 in ths past.  This is a quick assignment that should only take an afternoon or two.</li>
     <li><a href="https://images.nvidia.com/content/pdf/tesla/whitepaper/pascal-architecture-whitepaper.pdf">NVIDIA Tesla P100 Whitepaper</a>, 2016</li>
     <li><a href="http://international.download.nvidia.com/geforce-com/international/pdfs/GeForce_GTX_980_Whitepaper_FINAL.PDF">NVIDIA GeForce GTX 980 Whitepaper</a>, 2014</li>
     <li><a href="http://international.download.nvidia.com/pdf/tegra/Tegra-X1-whitepaper-v1.0.pdf">NVIDIA Tegra X1 Whitepaper</a></li>
     <li><a href="http://www.cs.cmu.edu/~kayvonf/papers/mobilevc_ieee16.pdf" target="_blank">The Rise of Mobile Visual Computing Systems</a>, by K. Fatahalian, IEEE Mobile Computing 2016</li>
     <li><a href="http://www.frankmcsherry.org/assets/COST.pdf">Scalability! But at What COST?</a>, by F. McSherry, M. Isard, D. Murray. HotOS 2015 (The arguments in this paper are very consistent with the way we think about performance in the visual computing domain.)</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('camerapipeline1'); ?>">Lecture 2:
     The Camera Image Processing Pipeline (Part I)</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>

     <div>Further Reading:</div>
     <ul>
     <li>The Stanford CS448A <a href="http://graphics.stanford.edu/courses/cs448a-10/" target="_blank">course notes</a> are very good reference camera image processing pipeline algorithms and issues.</li>
     <li>The <a href="http://graphics.stanford.edu/courses/cs178-11/applets/applets.html" target="_blank">interactive demos</a> on the Stanford CS178 course site are very well done (some were shown in class)</li>
     <li><a href="http://www.clarkvision.com/articles/index.html">Clarkvision.com</a> has some very interesting material on cameras.</li>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('camerapipeline2'); ?>">Lecture 3:
     The Camera Image Processing Pipeline (Part II)</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/adams10_fcam.pdf" target="_blank">The Frankencamera: An Experimental Platform for Computational Photography</a>. A. Adams et al. SIGGRAPH 2010</li>
     <li><a href="http://www.hdrplusdata.org/hdrplus_preprint.pdf">Burst Photography for High Dynamic Range and Low-light Imaging
     on Mobile Cameras</a>. by S. Hasinoff et al. SIGGRAPH Asia 2016</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('halide'); ?>">Lecture 4:
     Productive, High-Performance Image Processing Using Halide</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://people.csail.mit.edu/jrk/jrkthesis.pdf" target="_blank">Decoupling Algorithms from the Organization of Computation for High Performance Image Processing</a> (please read Chapters 1, 4, 5, and 6.1), by J. Ragan-Kelley (MIT Ph.D. thesis, 2014)</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/halidesched/" target="_blank">Automatically Scheduling Halide Image Processing Pipelines</a>, by R. Mullapudi et al. SIGGRAPH 2016</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://halide-lang.org/" target="_blank">Halide Language Website</a> (contains documentation and many tutorials)</li>
     </ul>
     </div>
</div>



<!--
<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url(''); ?>">Lecture 1:
     XXXXX</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a></li>
     </ul>

     
     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a></li>
     </ul>
     </div>
</div>
-->

<p>&nbsp;</p>

</div>


