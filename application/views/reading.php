
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

          <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=5481e0db-ded7-41af-9cff-3bc1ac3cb889" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>


</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('dircoherence'); ?>">Lecture 11: Directory-Based Cache Coherence</a></div>
     <div class="colored_text book_lecture_subtitle">(scaling problem of snooping, implementation of directories, directory storage optimization)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=36177ab3-22ce-4b11-bf06-eabedf306e26" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('snoopimpl'); ?>">Lecture 12: A Basic Snooping-Based Multi-Processor Implementation</a></div>
     <div class="colored_text book_lecture_subtitle">(deadlock, livelock, starvation, implementation of coherence on an atomic and split-transaction bus)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=ccef6fd3-916a-426a-b28e-2feec7cab663" target="_blank">Watch the Lecture</a></div>
     </div>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('consistency'); ?>">Lecture 13: Memory Consistency</a></div>
     <div class="colored_text book_lecture_subtitle">(consistency vs. coherence, relaxed consistency models and their motivation, acquire/release semantics)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=d08db410-12b9-4079-aa97-e00557bd081f" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://lagunita.stanford.edu/c4x/Engineering/CS316/asset/A_Primer_on_Memory_Consistency_and_Coherence.pdf" target="_blank">A Primer on Memory Consistency and Coherence</a>. by Sorin, Hill, and Wood.</li>
     <li><a href="http://www.cl.cam.ac.uk/~pes20/weakmemory" target="_blank">A Useful Page with Links to a Bunch of Resources on Relaxed Memory Models</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('webscaling'); ?>">Lecture 14: Scaling a Web Site</a></div>
     <div class="colored_text book_lecture_subtitle">(scale out, load balancing, elasticity, caching)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=3bb2f332-fbdb-4434-9f3b-0c2b3f9668c8" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.highscalability.com" target="_blank">www.highscalability.com</a>. A cool site with many case studies (see "All Time Favorites" section)</li>
     <li><a href="http://perspectives.mvdirona.com" target="_blank">James Hamilton's Blog</li></ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('interconnects'); ?>">Lecture 15: Interconnection Networks</a></div>
     <div class="colored_text book_lecture_subtitle">(network properties, topology, basics of flow control)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=20d21b98-4359-4188-a374-2983cecc2b38" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('synchronization'); ?>">Lecture 16: Implementing Synchronization</a></div>
     <div class="colored_text book_lecture_subtitle">(machine-level atomic operations, implementing locks, implementing, barriers)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=0553fcc3-8278-4d59-bd31-dd7f608f2b43" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('lockfree'); ?>">Lecture 17: Fine-Grained Synchronization and Lock-Free Programming</a></div>
     <div class="colored_text book_lecture_subtitle">(fine-grained snychronization via locks, basics of lock-free programming: single-reader/writer queues, lock-free stacks, the ABA problem, hazard pointers)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=535b2461-438a-44e2-9e7b-028ffec7f44a" target="_blank">Watch the Lecture</a></div>
     </div>

     
     <div>Further Reading:</div>
     <ul>
       <li><a href="https://www.cl.cam.ac.uk/research/srg/netos/papers/2001-caslists.pdf" target="_blank">A Pragmatic Implementation of
          Non-Blocking Linked-Lists</a>. by T. Harris, 2001</li>
       <li><a href="http://www.cse.yorku.ca/~ruppert/papers/lfll.pdf" target="_blank">Lock-Free Linked Lists and Skip Lists</a>. by M. Fomitchev and E. Ruppert, 2004</li>
       <li><a href="https://www.research.ibm.com/people/m/michael/ieeetpds-2004.pdf" target="_blank">Hazard Pointers: Safe Memory Reclamation for
     Lock-Free Objects</a>. by M. Michael, IEEE Trans on Parallel and Distributed Systems, 2004</li>
       <li><a href="http://www.drdobbs.com/lock-free-data-structures-with-hazard-po/184401890" target="_blank">Lock-Free Data Structures with Hazard pointers</a>. by A. Alexandrescu and M. Michael, Dr. Dobbs, 2004</li>
     </ul>
     
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('transactionalmem'); ?>">Lecture 18: Transactional Memory</a></div>
     <div class="colored_text book_lecture_subtitle">(motivation for transactions, design space of transactional memory implementations, lazy-optimistic HTM)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=22b2da9a-b1f4-4084-9077-aa9bfc85427c" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('heterogeneity'); ?>">Lecture 19: Heterogeneous Parallelism and Hardware Specialization</a></div>
     <div class="colored_text book_lecture_subtitle">(energy-efficient computing, motivation for heterogeneous processing, fixed-function processing, FPGAs, what's in a modern SoC)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=82747e8c-e3c4-4448-94df-3798ceef0ce8" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('dsl'); ?>">Lecture 20: Domain-Specific Programming Systems</a></div>
     <div class="colored_text book_lecture_subtitle">(motivation for DSLs, case studies on Lizst and Halide)</div>

     <div class="book_lecture_indent">

     <!--
     <div class="resources">
     <div><a href="" target="_blank">Watch the Lecture</a></div>
     </div>
     -->
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/hackliszt/" target="_blank">Lizst: A DSL for solving mesh-based PDEs</a></li>
     <li><a href="http://halide-lang.org/" target="_blank">Halide: a language for image processing and computational photography</a></li>
     <li><a href="http://graphics.stanford.edu/papers/darkroom14/" target="_blank">Darkroom: Darkroom: Compiling High-Level Image Processing Code into Hardware Pipelines</a>. Hegarty et al. SIGGRAPH 2014</li>
     <li><a href="http://people.csail.mit.edu/jrk/simit.pdf" target="_blank">Simit:  A Language for Physical Simulation</a>. Kjolstad et al. 2015</li>
     </ul>
     </div>
    
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('graphdsl'); ?>">Lecture 21: Domain-Specific Programming on Graphs</a></div>
     <div class="colored_text book_lecture_subtitle">(GraphLab abstractions, GraphLab implementation, streaming graph processing, graph compression)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=b608f28f-bc2d-451b-b5b9-53fed153e095" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://dato.com/products/create/open_source.html" target="_blank">GraphLab Documentation</a></li>
     <li><a href="http://www.eecs.berkeley.edu/~jshun/ligra.html" target="_blank">Ligra: A Lightweight Graph Processing Framework for Shared Memory</a>. by Shun and Blelloch, PPOPP 13</li>
     <li><a href="http://www.cs.cmu.edu/~pavlo/courses/fall2013/static/papers/osdi2012-graphchi.pdf" target="_blank">GraphChi: Large-Scale Graph Computation on Just a PC</a>. by Kyrola et al. OSDI 12

     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('spark'); ?>">Lecture 22: In-Memory Distributed Computing using Spark</a></div>
     <div class="colored_text book_lecture_subtitle">(producer-consumer locality, RDD abstraction, Spark implementation and scheduling)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=f10f5d5a-74c9-4253-aefa-dc4769ea7b96" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://spark.apache.org" target="_blank">Apache Spark Web Site</a></li>
     <li><a href="https://www.usenix.org/system/files/conference/nsdi12/nsdi12-final138.pdf" target="_blank"></a>. by Zaharia et al. NSDI 2012</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('memory'); ?>">Lecture 23: Addressing the Memory Wall</a></div>
     <div class="colored_text book_lecture_subtitle">(how DRAM works, cache compression, DRAM compression, upgoing memory technologies)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=4068f6f4-d2c2-4812-9cc7-ccff02fe2a09" target="_blank">Watch the Lecture</a></div>
     </div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://users.ece.cmu.edu/~omutlu/pub/bdi-compression_pact12.pdf" target="_blank">Base-Delta-Immediate Compression: Practical Data Compression for On-Chip Caches</a>. by Pekhimenko et al. PACT 2012</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('hpcfuture'); ?>">Lecture 24: The Future of High-Performance Computing</a></div>
     <div class="colored_text book_lecture_subtitle">(supercomputing vs. distributed computing/analytics, design philosophy of both systems)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="http://15418.courses.cs.cmu.edu/spring2016content/lectures/24_hpcfuture/24_hpcfuture_slides.pdf" target="_blank">Watch the Lecture</a></div>
     </div>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('dnneval'); ?>">Lecture 25: Efficiently Evaluating Deep Networks</a></div>
     <div class="colored_text book_lecture_subtitle">(intro to deep networks, what convolution does, mapping convolutin to matrix multiplication, deep network compression)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=b1addcfa-d051-4c7b-8279-60b245491fc8" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('paralleltraining'); ?>">Lecture 26: Parallel Deep Network Training</a></div>
     <div class="colored_text book_lecture_subtitle">(basics of gradient descent and backpropagation, memory footpring issues, asynchronous parallel implementations of gradient descent)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=c22a3cac-a493-43d2-9922-ec0b5cdcc93e" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('gfxpipeline'); ?>">Lecture 27: Parallelizing the 3D Graphics Pipeline</a></div>
     <div class="colored_text book_lecture_subtitle">(parallel rasterization, Z/color-buffer compression, tiled rendering, sort-everywhere parallel rendering)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=91194a11-4805-45cd-9269-d214153aefcf" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo lecture_url('wrapup'); ?>">Lecture 28: Course Wrap Up + How to Give a Talk</a></div>
     <div class="colored_text book_lecture_subtitle">(tips for giving a clear talk, a bit of philosophy)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=aa1df0ed-1d47-4084-8ae4-3802ffd80e6e" target="_blank">Watch the Lecture</a></div>
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
     <a href="<?php echo site_url('projects'); ?>">Student Final Projects</a></div>
     <div class="colored_text book_lecture_subtitle">(the students explore high-performance and high-efficiency topics of their choosing)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     <div><a href="https://scs.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=1f3986ba-3389-4b6f-8832-58a6887cda24" target="_blank">Watch the Parallelism Competition Finalists</a></div>
     </div>
     </div>
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


