
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS149, Winter 2019</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">PARALLEL COMPUTING</div>


<p>This page contains lecture slides and recommended readings for the Winter 2019 offering of CS149.</p>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('whyparallelism'); ?>">Lecture 1:
     Why Parallelism? Why Efficiency?</a></div>
     <div class="colored_text book_lecture_subtitle">(motivations for parallel chip decisions, challenges of parallelizing code)</div>
     
     <div class="book_lecture_indent">

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
     <div class="colored_text book_lecture_subtitle">(forms of parallelism: multicore, SIMD, threading + understanding latency and bandwidth)</div>

     <div class="book_lecture_indent">

     <div class="resources>"
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://queue.acm.org/detail.cfm?id=2181798" target="_blank">CPU DB: Recording Microprocessor History</a>. A. Danowitz, K. Kelley, J. Mao, J.P. Stevenson, M. Horowitz, ACM Queue 2005.
     (You can also take a peak at the <a href="http://cpudb.stanford.edu/">CPU DB</a> website)</li>
     <li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics</a>.
     Intel Technical Report, 2015  (a very nice description of a modern throughput processor)</li>
     <li><a href="http://www.realworldtech.com/haswell-cpu/" target="_blank">Intel's Haswell CPU Microarchitecture</a>. D. Kanter, 2013 (realworldtech.com article)</li>
     <li><a href="https://images.nvidia.com/content/pdf/tesla/whitepaper/pascal-architecture-whitepaper.pdf" target="_blank">NVIDIA GP100 Pascal Whitepaper</a>. NVIDIA Technical Report 2016</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progmodels'); ?>">Lecture 3: Parallel Programming Abstractions</a></div>
     <div class="colored_text book_lecture_subtitle">(ways of thinking about parallel programs, and their corresponding hardware implementations)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     
     <div>Further Reading: (some fun systems)</div>
     <ul>
     <li><a href="https://ispc.github.io/index.html" target="_blank">ISPC Programmer's Manual</a></li>
     <li><a href="https://www.threadingbuildingblocks.org/" target="_blank">Thread Building Blocks</a></li>
     <li><a href="https://graphics.stanford.edu/papers/brookgpu/">Brook for GPUs: Stream Computing on Graphics Hardware</a>
     <li><a href="http://groups.csail.mit.edu/cag/streamit/" target="_blank">MIT's StreaMIT Project</a></li>
     </ul>     
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progbasics'); ?>">Lecture 4: Parallel Programming Basics</a></div>
     <div class="colored_text book_lecture_subtitle">(the thought process of parallelizing a program)</div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('perfopt1'); ?>">Lecture 5: Performance Optimization I: Work Distribution and Scheduling</a></div>
     <div class="colored_text book_lecture_subtitle">(achieving good work distribution while minimizing overhead, scheduling Cilk programs with work stealing)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://www.cilkplus.org/">CilkPlus documentation</a></li>
     <li><a href="http://supertech.csail.mit.edu/papers/steal.pdf" target="_blank">Scheduling Multithreaded Computations by Work Stealing</a>. by Blumofe and Leiserson, JACM 1999</li>
     <li><a href="http://supertech.csail.mit.edu/papers/cilk5.pdf" target="_blank">Implementation of the Cilk 5 Multi-Threaded Language</a>. by Frigo et al. PLDI 1998</li>
     <li><a href="https://www.threadingbuildingblocks.org/" target="_blank">Intel Thread Building Blocks</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('perfopt2'); ?>">Lecture 6: Performance Optimization II: Locality, Communication, and Contention</a></div>
     <div class="colored_text book_lecture_subtitle">(message passing, async vs. blocking sends/receives, pipelining, increasing arithmetic intensity, avoiding contention)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://people.eecs.berkeley.edu/~kubitron/cs252/handouts/papers/RooflineVyNoYellow.pdf" target="_blank">Roofline: An Insightful Visual Performance Model for Floating-Point Programs and Multicore Architectures</a></li>
     <li><a href="https://software.intel.com/en-us/vtune" target="_bblank">Intel V-Tune</a></li>
     <li><a href="https://software.intel.com/en-us/articles/intel-performance-counter-monitor" target="_blank">Intel Performance Counter Monitor</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('gpuarch'); ?>">Lecture 7: GPU Architecture and CUDA Programming</a></div>
     <div class="colored_text book_lecture_subtitle">(CUDA programming abstractions, and how they are implemented on modern GPUs)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li>You may enjoy the free Udacity Course: <a href="https://www.udacity.com/course/cs344">Intro to Parallel Programming Using CUDA</a>, by Luebke and Owens</li>
     <li>The <a href="http://thrust.github.io/" target="_blank">Thrust Library</a> is a useful collection library for CUDA.</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/blythe08_riseofgpu.pdf">Rise of the Graphics Processor</a>. D. Blythe (Proceedings of IEEE 2008)
     a nice overview of GPU history.</li>
     <li><a href="http://international.download.nvidia.com/geforce-com/international/pdfs/GeForce_GTX_1080_Whitepaper_FINAL.pdf" target="_blank">NVIDIA GeForce GTX 1080 Whitepaper</a>. NVIDIA Technical Report 2016</li>
     <li><a href="https://images.nvidia.com/content/pdf/tesla/whitepaper/pascal-architecture-whitepaper.pdf" target="_blank">NVIDIA Tesla P100 Whitepaper</a>. NVIDIA Technical Report 2016</li>
     <li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics</a>. Intel Technical Report, 2015  (a very nice description of a modern Intel integrated GPU)</li>
     <li><a href="http://docs.nvidia.com/cuda/pascal-tuning-guide/index.html#axzz4XGAVWs4m" target="_blank">Pascal Tuning Guide</a>. NVIDIA CUDA Documentation</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('cachecoherence'); ?>">Lecture 8: Snooping-Based Cache Coherence</a></div>
     <div class="colored_text book_lecture_subtitle">(definition of memory coherence, invalidation-based coherence using MSI and MESI, maintaining coherence with multi-level caches, false sharing)</div>
</div>



<p>&nbsp;</p>

</div>


