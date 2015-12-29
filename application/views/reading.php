
<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>


<p>This page contains lecture slides, videos, and recommended readings for the Spring 2015 offering of 15-418/618.   The full listing of lecture videos is available on the Panopto site <a href="https://scs.hosted.panopto.com/Panopto/Pages/Sessions/List.aspx#folderID=%22a5862643-2416-49ef-b46b-13465d1b6df0%22" target="_blank">here</a>.</p>
</p>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('whyparallelism'); ?>">Lecture 1:
     Why Parallelism</a></div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=b40a163a-9e0f-41d7-bd1f-eb508a695d5a" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://queue.acm.org/detail.cfm?id=1095418" target="_blank">The Future of Microprocessors</a>. by K. Olukotun and L. Hammond, ACM Queue 2005</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('basicarch'); ?>">Lecture 2: A Modern Multi-Core Processor</a></div>
<div class="colored_text book_lecture_subtitle">(forms of parallelism + understanding Latency and BW)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=11e89f91-6ae0-44bc-bfc7-cea41b1af542" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://delivery.acm.org/10.1145/2190000/2181798/p10-horowitz.pdf" target="_blank">CPU DB: Recording Microprocessor History</a>. A. Danowitz, K. Kelley, J. Mao, J.P. Stevenson, M. Horowitz, ACM Queue 2005. (You can also take a peak at the <a href="http://cpudb.stanford.edu/">CPU DB</a> website)</li>
     </ul>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('progmodels'); ?>">Lecture 3: Parallel Programming Models</a></div>
<div class="colored_text book_lecture_subtitle">(and their corresponding hardware implementations)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=a2c2c5d8-2b39-427e-bb11-79cd497504ee" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('progbasics'); ?>">Lecture 4: Parallel Programming Basics</a></div>
<div class="colored_text book_lecture_subtitle">(the thought process of parallelizing a program)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=85f0a0f3-a42e-4d1d-9b9a-aeb025e1ddf8" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('gpuarch'); ?>">Lecture 5: GPU Architecture and CUDA Programming</a>
     </div>
     <div class="colored_text book_lecture_subtitle">(CUDA programming abstractions, and how they are implemented on modern GPUs)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=acffbc9a-15cb-4529-903b-e27c92a071ff" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li>You may enjoy the free Coursera Course <a href="https://www.udacity.com/course/cs344">Intro to Parallel Programming Using CUDA</a> by Luebke and Owens</li>
     <li>The <a href="http://thrust.github.io/" target="_blank">Thrust Library</a> is a useful collection library for CUDA.</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/blythe08_riseofgpu.pdf">Rise of the Graphics Processor</a>. D. Blythe (Proceedings of IEEE 2008)
     is for a nice overview of GPU history.</li>
     </ul>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('progperf1'); ?>">Lecture 6: Program Optimization I: Work Assignment</a>
     </div>
<div class="colored_text book_lecture_subtitle">(the tension between achieving good work balance and minimizing the overhead of making the assignment)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=49596d5a-3809-4132-ac96-4009df1a51fb" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('progperf2'); ?>">Lecture 7: Program Optimization II: Locality, Communication, and Contention</a>
     </div>
<div class="colored_text book_lecture_subtitle">(techniques for reducing communication and contention, inherent vs. artifactual communication)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=289b2f58-d926-407b-8615-04218d61597d" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('casestudies'); ?>">Lecture 8: Parallel Application Case Studies</a>
     </div>
<div class="colored_text book_lecture_subtitle">(a few examples of parallelizing algorithms)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=9d35093d-08e4-4354-a40e-abf040a0f033
" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('perfeval'); ?>">Lecture 9: Workload-Driven Performance Evaluation</a>
     </div>
<div class="colored_text book_lecture_subtitle">(evaluating program performance, how to scale performance analysis "up" and "down")</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=9d0ea1ae-9fe7-48ce-9881-c1ab675c6e8e" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('cachecoherence1'); ?>">Lecture 10: Snooping-Based Cache Coherence I</a>
     </div>
<div class="colored_text book_lecture_subtitle">(the basics of cache coherence, the MSI and MESI protocols)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=215768ac-3a0b-4e7a-ae51-1a046a0becba" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('cachecoherence2'); ?>">Lecture 11: Snooping-Based Cache Coherence II</a>
     </div>
<div class="colored_text book_lecture_subtitle">(evaluating the performance of snooping implementations, coherence in a multi-level cache hierarchy)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=f2bd1483-57c3-4f83-a546-03c2a46f8d86" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('directorycoherence'); ?>">Lecture 12: Directory-Based Cache Coherence</a>
     </div>
<div class="colored_text book_lecture_subtitle">(why directories enable scalable cache coherence, reducing the overhead of directory storage)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=f9ae4513-003c-41c7-b8a5-af4c045c5ec0" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>

</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('consistency'); ?>">Lecture 13: Relaxed Memory Consistency</a>
     </div>
     <div class="colored_text book_lecture_subtitle">(the motivation for and implications of relaxed consistency memory models)</div>


     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=e152f2c8-dc26-4dec-84da-eb6eef4984dd" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('webscaling'); ?>">Lecture 14: Scaling a Web Site</a>
     </div>
     <div class="colored_text book_lecture_subtitle">(scale-out parallelism, elasticity, and significant amounts of caching)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=a1d674fa-e428-4f05-9011-90b7ade9890c" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://highscalability.com/" target="_blank">Highscalability.com</a> is a great web site with case studies.  (Check our their "real-life architectures" section.)</li>
     <li><a href="http://perspectives.mvdirona.com/">James Hamilton's Blog</a></li>
     </ul>
     </div>

</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('snoopimpl'); ?>">Lecture 15: A Basic Snooping-Based Multi-Processor Implementation</a>
     </div>
<div class="colored_text book_lecture_subtitle">(the challenges of implementing invalidation-based coherence in a real system)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=84f58bee-2929-45e3-be17-1914fb00ebe9" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('synchronization'); ?>">Lecture 16: Implementing Basic Synchronization</a>
     </div>
<div class="colored_text book_lecture_subtitle">(implementing locks and barriers)</div>


     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=cda3eef6-cae2-4ba4-b161-c0346ae2cd0c" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('lockfree'); ?>">Lecture 17: Fine-Grained Synchronization and Lock-Free Programming</a>
     </div>
<div class="colored_text book_lecture_subtitle">(challenges of fine-grained locking, basics of lock-free data structures)</div>


     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=038eaf5b-ff0c-4150-aa69-7480a44b7442" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('interconnects'); ?>">Lecture 18: Interconnection Networks</a>
     </div>
<div class="colored_text book_lecture_subtitle">(network-on-a-chip topologies and flow-control algorithms)</div>


     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=689fe84d-7cb4-42c8-bc41-b24342822dae" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('transactionalmem'); ?>">Lecture 19: Transactional Memory</a>
     </div>
<div class="colored_text book_lecture_subtitle">(motivation for transactional memory, the design space of implementations)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=2a45ad9b-d018-4df8-839e-eebc89544ce7" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('forkjoin'); ?>">Lecture 20: Scheduling Fork-Join Parallelism</a>
     </div>
<div class="colored_text book_lecture_subtitle">(the basics of Cilk's locality-aware, work-stealing scheduler)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=d77e2fe7-2ffd-4fc0-9cae-4abc42f802e4" target="_blank">Watch the Lecture</a></div>
     </div>
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://supertech.csail.mit.edu/papers/cilk5.pdf" target="_blank">The Implementation of the Cilk-5 Multithreaded Language</a>. Frigo et al. PLDI 1998</li>
     <li><a href="http://supertech.csail.mit.edu/papers/steal.pdf" target="_blank">Scheduling Multithreaded Computations by Work Stealing</a>. Blumofe et al. Journal of the ACM 1999</li> 
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('heterogeneity'); ?>">Lecture 21: Heterogeneous Parallelism and Hardware Specialization</a>
     </div>
<div class="colored_text book_lecture_subtitle">(area and energy-efficient computing via heterogeneous parallel processors)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=89f89d6b-50ba-49fc-9ada-edf906bfcde9" target="_blank">Watch the Lecture</a></div>
     </div>
     <div>Further Reading:</div>     
     <ul>
     <li><a href="http://research.cs.wisc.edu/multifacet/papers/ieeecomputer08_amdahl_multicore.pdf">Amdahl's Law in the Multi-Core Era</a>, Hill and Marty, IEEE Computer 2008.</li>
     <li><a href="http://www.cc.gatech.edu/~hadi/doc/paper/2012-toppicks-dark_silicon.pdf">Dark Silicon and the End of Multi-Core Scaling</a>, Esmaeilzadeh et al. ISCA 2011.</li>
     <li><a href="http://www.nvidia.com/content/gtc/documents/sc09_dally.pdf">The Future of GPU Computing</a>, Supercomputing 2009 Conference talk by Bill Dally (contains interesting slides on power consumption)</li>
     </ul>
</div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('dsl'); ?>">Lecture 22: Domain-Specific Parallel Programming Systems</a>
     </div>
<div class="colored_text book_lecture_subtitle">(motivation for domain-specific systems, two example systems: Liszt and Halide)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=569b6b13-eac2-42ec-8b15-99fca7b2dccf" target="_blank">Watch the Lecture</a></div>
     </div>
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/hackliszt/">Liszt: A DSL for solving mesh-based PDEs</a></li>
     <li><a href="http://halide-lang.org/">Halide: a language for image processing and computational photography</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('graphdsl'); ?>">Lecture 23: Domain-Specific Programming Systems for Graph Processing</a>
     </div>
<div class="colored_text book_lecture_subtitle">(examples from GraphLab, Ligra, and Green-Marl, discussion of what makes a good programming system)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=85031c43-f7b4-4457-b87d-8735a5dd01c5" target="_blank">Watch the Lecture</a></div>
     </div>
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://spark.apache.org/graphx/">Spark GraphX Project Page</a></li>
     <li><a href="https://www.cs.cmu.edu/~jshun/ligra.pdf">Ligra: A Lightweight Graph Processing Framework for Shared Memory</a> Shun et al. PPoPP 13</li>
     <li><a href="http://select.cs.cmu.edu/publications/paperdir/osdi2012-kyrola-blelloch-guestrin.pdf">GraphChi: Large-Scale Graph Computation on Just a PC</a> A. Kyrola et al. OSDI 12</li>
     </ul>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('databasescaling'); ?>">Lecture 24: Database Systems Do Not Scale to 1,000 CPU Cores</a>
     </div>
<div class="colored_text book_lecture_subtitle">(parallelization issues in modern databases, a lecture by Andy Pavlo)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=6fc46f18-bacc-42fa-ba48-315533490190" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('spark'); ?>">Lecture 25: Parallel Computing With Spark</a>
     </div>
<div class="colored_text book_lecture_subtitle">(the RDD abstraction and how it enables efficient, distributed processing)</div>

     <div class="book_lecture_indent">
     
     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=f6a7ae1b-f2fa-4d64-8070-dd581b9d4458" target="_blank">Watch the Lecture</a></div>
     </div>
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://spark.apache.org">Spark Project Page</a></li>
     <li><a href="">Resilient Distributed Datasets: A Fault-Tolerant Abstraction for In-Memory Cluster Computing</a>. M. Zaharia et al. NSDI 2012</li>
     </ul>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('memory'); ?>">Lecture 26: Addressing the Memory Wall</a>
     </div>
<div class="colored_text book_lecture_subtitle">(how DRAM works and modern hardware approaches to improving locality and bandwidth)</div>

     <div class="book_lecture_indent">
    
     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=597deac2-7934-47b7-9984-f0f43fea7752" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('rendering'); ?>">Lecture 27: Parallel Triangle Rendering on a Modern GPU</a>
     </div>
<div class="colored_text book_lecture_subtitle">(triangle rasterization as a sampling problem, parallel rasterization, HW z-buffer compression)</div>

  <div class="resources"><div style="font-style: italic;">This lecture was a bonus lecture and was not recorded.</div></div>

</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px;">
     <a href="<?php echo lecture_url('wrapup'); ?>">Lecture 28: Course Wrap Up and Project Presentation Tips</a>
     </div>
<div class="colored_text book_lecture_subtitle">(Exam 2 review, how to give a good talk, course summary)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=4b40c84e-9ba1-4cf0-9df9-b8d43178268e" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>
</div>

<p>&nbsp;</p>

</div>


