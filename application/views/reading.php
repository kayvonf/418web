
<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>


<p>This page contains lecture slides, videos, and recommended readings for the Spring 2016 offering of 15-418/618.

The full listing of lecture videos is available on the Panopto site
<a href="https://scs.hosted.panopto.com/Panopto/Pages/Sessions/List.aspx#folderID=%22f62c2297-de88-4e63-aff2-06641fa25e98%22" target="_blank">here</a>.</p>

</p>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('whyparallelism'); ?>">Lecture 1:
     Why Parallelism</a></div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=d0795ff8-76aa-4e24-a7cc-e8126025720c" target="_blank">Watch the Lecture</a></div>
     </div>


     <div>Further Reading:</div>
     <ul>
     <li><a href="http://queue.acm.org/detail.cfm?id=1095418" target="_blank">The Future of Microprocessors</a>. by K. Olukotun and L. Hammond, ACM Queue 2005</li>
          <li><a href="http://dl.acm.org/citation.cfm?id=621693" target="_blank">Power: A First-Class Architectural Design Constraint</a>. by Trevor Mudge IEEE Computer 2001</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('basicarch'); ?>">Lecture 2: A Modern Multi-Core Processor</a></div>
     <div class="colored_text book_lecture_subtitle">(forms of parallelism + understanding Latency and BW)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=66c4b4cc-5dbd-425c-87ed-5d0d217c20b3" target="_blank">Watch the Lecture</a></div>
     </div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://queue.acm.org/detail.cfm?id=2181798" target="_blank">CPU DB: Recording Microprocessor History</a>. A. Danowitz, K. Kelley, J. Mao, J.P. Stevenson, M. Horowitz, ACM Queue 2005. (You can also take a peak at the <a href="http://cpudb.stanford.edu/">CPU DB</a> website)</li>
     <li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics</a>. Intel Technical Report, 2015  (a very nice description of a modern throughput processor)</li>
     <li><a href="http://www.realworldtech.com/haswell-cpu/" target="_blank">Intel's Haswell CPU Microarchitecture</a>. D. Kanter, 2013 (realworldtech.com article)</li>
     <li><a href="http://international.download.nvidia.com/geforce-com/international/pdfs/GeForce_GTX_980_Whitepaper_FINAL.PDF" target="_blank">NVIDIA GeForce GTX 980 Whitepaper</a>. NVIDIA Technical Report 2014</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progabstractions'); ?>">Lecture 3: Parallel Programming Models</a></div>
     <div class="colored_text book_lecture_subtitle">(ways of thinking about parallel programs, and their corresponding hardware implementations)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=1d93f5a8-d435-4e4a-8219-05536d53886a" target="_blank">Watch the Lecture</a></div>
     </div>

     <!--
     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     -->
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progbasics'); ?>">Lecture 4: Parallel Programming Basics</a></div>
     <div class="colored_text book_lecture_subtitle">(the thought process of parallelizing a program)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=55cb2ba2-10ad-40c3-8315-0c8598e64977" target="_blank">Watch the Lecture</a></div>
     </div>

     <!--
     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     -->
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('gpuarch'); ?>">Lecture 5: GPU Architecture and CUDA Programming</a></div>
     <div class="colored_text book_lecture_subtitle">(CUDA programming abstractions, and how they are implemented on modern GPUs)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=c802ccf7-c8bc-4feb-83da-19ef17f1ee90" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li>You may enjoy the free Udacity Course: <a href="https://www.udacity.com/course/cs344">Intro to Parallel Programming Using CUDA</a>, by Luebke and Owens</li>
     <li>The <a href="http://thrust.github.io/" target="_blank">Thrust Library</a> is a useful collection library for CUDA.</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/blythe08_riseofgpu.pdf">Rise of the Graphics Processor</a>. D. Blythe (Proceedings of IEEE 2008)
     a nice overview of GPU history.</li>
     <li><a href="http://international.download.nvidia.com/geforce-com/international/pdfs/GeForce_GTX_980_Whitepaper_FINAL.PDF" target="_blank">NVIDIA GeForce GTX 980 Whitepaper</a>. NVIDIA Technical Report 2014</li>
     <li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics</a>. Intel Technical Report, 2015  (a very nice description of a modern Intel integrated GPU)</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progperf1'); ?>">Lecture 6: Performance Optimization I: Work Distribution and Scheduling</a></div>
     <div class="colored_text book_lecture_subtitle">(good work balance while minimizing the overhead of making the assignment, scheduling Cilk programs with work stealing)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=f0b01804-2bb2-418a-b436-e5446822ebf4" target="_blank">Watch the Lecture</a></div>
     </div>
     

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://www.cilkplus.org/">CilkPlus documentation</a></li>
     <li><a href="http://supertech.csail.mit.edu/papers/steal.pdf" target="_blank">Scheduling Multithreaded Computations by Work Stealing</a>. by Blumofe and Leiserson, JACM 1999</li>
     <li><a href="http://supertech.csail.mit.edu/papers/cilk5.pdf" target="_blank">Implementation of the Cilk 5 Multi-Threaded Language</a>. by Frigo et al. PLDI 1998</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progperf2'); ?>">Lecture 7: Performance Optimization II: Locality, Communication, and Contention</a></div>
     <div class="colored_text book_lecture_subtitle">(message passing, async vs. blocking sends/receives, pipelining, techniques to increase arithmetic intensity, avoiding contention)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=6915770a-6986-45f9-a3a8-8978a5ff5465" target="_blank">Watch the Lecture</a></div>
     </div>

     <!--
     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     -->
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('casestudies'); ?>">Lecture 8: Parallel Programming Case Studies</a></div>
     <div class="colored_text book_lecture_subtitle">(examples of optimizing parallel programs)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=6772161b-61d8-4091-bba1-c95ef3360b85" target="_blank">Watch the Lecture</a></div>
     </div>

     <!--
     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     -->
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('perfeval'); ?>">Lecture 9: Workload-Driven Performance Evaluation</a></div>
     <div class="colored_text book_lecture_subtitle">(hard vs. soft scaling, memory-constrained scaling, scaling problem size, tips for analyzing code performance)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=7dd2d111-09e4-44d6-b953-885fa679d3a1" target="_blank">Watch the Lecture</a></div>
     </div>

     <!--
     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     -->

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('snoopcoherence'); ?>">Lecture 10: Snooping-Based Cache Coherence</a></div>
     <div class="colored_text book_lecture_subtitle">(definition of memory coherence, invalidation-based coherence using MSI and MESI, maintaining coherence with multi-level caches, false sharing)</div>

     <!--
     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     </div>
     -->
</div>


<!--
<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url(''); ?>">Lecture 1:</a></div>
     <div class="colored_text book_lecture_subtitle">XXXX</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="" target="_blank"></a>. by XXXX</li>
     </ul>
     </div>
</div>
-->


<p>&nbsp;</p>

</div>


