<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming</div>

<div style="padding-top: 20px;">
<img src="<?=base_url()?>assets/images/logos/banner_logo.png" width="487" height="70" />
</div>

<p style="padding-bottom: .15em"> From smart phones, to multi-core
CPUs and GPUs, to the world's largest supercomputers and web sites,
parallel processing is ubiquitous in modern computing. The goal of
this course is to provide a deep understanding of the fundamental
principles and engineering trade-offs involved in designing modern
parallel computing systems as well as to teach parallel programming
techniques necessary to effectively utilize these machines.  Because
writing good parallel programs requires an understanding of key
machine performance characteristics, this course will cover both
parallel hardware and software design.  </p>

<p>This course was held at Tsinghua University in Summer 2017. The CMU
version of this course is <a href="http://15418.courses.cs.cmu.edu">15-418/618</a>.</p>

<div class="overview_main_item overview_ruled_element">Course Information</div>

<div style="padding-bottom: 15px;">
<div>Instructors: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a> and <a href="http://hpc.cs.tsinghua.edu.cn/research/cluster/xuewei.html">Wei Xue</a></div>
<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course information</a> page for more info on policies and logistics.</div>

<div style="padding-top:1em;"><a href="http://15418.courses.cs.cmu.edu/tsinghua2017content/misc/class_schedule.pdf">Here is a listing</a> of all lecture times and assignment deadlines.</div>
</div>

<div class="overview_main_item overview_ruled_element">Tsinghua Summer 2017 Lecture Schedule</div>

<table>

<tr>
<td class="schedule_date">Jun 27</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('whyparallelism'); ?>">Why Parallelism? Why Efficiency?</a></div>
   <div class="colored_text home_lecture_subtitle">(motivations for parallel chip decisions, challenges of parallelizing code)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av11726582/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=eanvgGt-D1o&t=10s">Youtube</a></li>
   </ul>
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://queue.acm.org/detail.cfm?id=1095418" target="_blank">The Future of Microprocessors</a>. by K. Olukotun and L. Hammond, ACM Queue 2005</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=621693" target="_blank">Power: A First-Class Architectural Design Constraint</a>. by Trevor Mudge, IEEE Computer 2001</li>
     </ul>
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jun 27<br />Jun 28</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('basicarch'); ?>">A Modern Multi-Core Processor: Forms of Parallelism + Understanding Memory Latency and Bandwidth</a></div>
   <div class="colored_text home_lecture_subtitle">(forms of parallelism + understanding latency and bandwidth)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li>Bilibili: <a href="https://www.bilibili.com/video/av11726582/">part 1</a> (start at 64:20),
   <a href="https://www.bilibili.com/video/av11731633/">part 2</a></li>
   <li>Youtube: <a href="http://www.youtube.com/watch?v=eanvgGt-D1o&t=64m24s">part 1</a>,
    <a href="https://www.youtube.com/watch?v=q9HdafyURqQ&t=115s">part 2</a></li>
  </ul>
  
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="https://queue.acm.org/detail.cfm?id=2181798" target="_blank">CPU DB: Recording Microprocessor History</a>. A. Danowitz, K. Kelley, J. Mao, J.P. Stevenson, M. Horowitz, ACM Queue 2005.</li>
     <li><a href="http://www.realworldtech.com/haswell-cpu/" target="_blank">Intel's Haswell CPU Microarchitecture</a>. D. Kanter, 2013 (realworldtech.com article)</li>
<li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics</a>. Intel Technical Report, 2015  (a very nice description of a modern throughput processor)</li>
     <li><a href="https://images.nvidia.com/content/pdf/tesla/whitepaper/pascal-architecture-whitepaper.pdf" target="_blank">NVIDIA GP100 Pascal Whitepaper</a>. NVIDIA Technical Report 2016</li>     
     </ul>
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jun 28</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('spmd'); ?>">The SPMD Programming Model (Abstraction vs. Implementation)</a></div>
   <div class="colored_text home_lecture_subtitle">(abstraction vs. implementation, how the SPMD programming model maps to SIMD hardware)</div>
   <div class="home_lecture_indent">

<div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av11731633/">Bilibili</a> (start at 59:00)</li>
   <li><a href="http://www.youtube.com/watch?v=q9HdafyURqQ&t=59m10s">Youtube</a></li>
   </ul>

   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="https://ispc.github.io/index.html" target="_blank">ISPC Programmer's Manual</a></li>
     </ul>
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jun 30</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('progbasics'); ?>">Parallel Programming Basics</a></div>
   <div class="colored_text home_lecture_subtitle">(the thought process of parallelizing a program, parallel programming models, Amdahl's law)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av11769267/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=KygniN64UKU">Youtube</a></li>
   </ul>

   
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 3</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('scheduling'); ?>">Performance Optimization I: Work Distribution and Scheduling</a></div>
   <div class="colored_text home_lecture_subtitle">(achieving good work distribution while minimizing overhead, scheduling Cilk programs, work stealing)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av11863862/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=yNP6RsiZNXQ">Youtube</a></li>
   </ul>

     <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="https://www.cilkplus.org/">CilkPlus documentation</a></li>
     <li><a href="http://supertech.csail.mit.edu/papers/steal.pdf" target="_blank">Scheduling Multithreaded Computations by Work Stealing</a>. by Blumofe and Leiserson, JACM 1999</li>
     <li><a href="http://supertech.csail.mit.edu/papers/cilk5.pdf" target="_blank">Implementation of the Cilk 5 Multi-Threaded Language</a>. by Frigo et al. PLDI 1998</li>
     <li><a href="https://www.threadingbuildingblocks.org/" target="_blank">Intel Thread Building Blocks</a></li>
     </ul>
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 5</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('perfanalysis'); ?>">Performance Analysis of Parallel Algorithms</a> (invited lecture by Yan Gu)</div>
   <div class="colored_text home_lecture_subtitle">(analyzing parallel algorithms via work and span)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av11930698/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=Q3CFn1Octj0">Youtube</a></li>
   </ul>

<!--
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="" target="_blank">Watch video of the lecture</a></li>
     <li><a href="" target="_blank"></a>. by </li>
     <li><a href="" target="_blank"></a>. by </li>
     </ul>

     -->
     
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 5</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('gpuarch'); ?>">GPU Architecture and CUDA Programming</a></div>
   <div class="colored_text home_lecture_subtitle">(CUDA programming abstractions, and how they are implemented on modern GPUs)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av11930706/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=-Yie4825kR0&t=679s">Youtube</a></li>
   </ul>
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
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
</td>
</tr>

<tr>
<td class="schedule_date">Jul 6</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('perfopt2'); ?>">Performance Optimization II: Locality, Communication, and Contention</a></div>
   <div class="colored_text home_lecture_subtitle">(message passing, async vs. blocking sends/receives, pipelining, increasing arithmetic intensity, avoiding contention)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av12062739/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=ygQT_jmDcBg">Youtube</a></li>
   </ul>
     
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 10</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('coherence'); ?>">Cache Coherence</a></div>
   <div class="colored_text home_lecture_subtitle">(definition of memory coherence, invalidation-based coherence via MSI/MESI, snooping and directory schemes, false sharing)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av12183329/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=dl6oKeBmrkU">Youtube</a></li>
   </ul>

   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://plrg.eecs.uci.edu/eecs221/lib/exe/fetch.php?media=synth-coherence.pdf" target="_blank">A Primer on Memory Consistency and Coherence</a>. by Sorin, Hill, and Wood. (Ch. 1,2,6,7)</li>
     </ul>

   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 12</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('snoopimpl'); ?>">Basic Snooping-Based Coherence Implementation</a></div>
   <div class="colored_text home_lecture_subtitle">(deadlock, livelock, implementation of coherence on an atomic and split-transaction bus)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av12183343/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=coSLkDiCVqQ&t=118s">Youtube</a></li>
   </ul>
     
   </div>  
</td>
</tr>


<tr>
<td class="schedule_date">Jul 12</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('consistency'); ?>">Memory Consistency</a></div>
   <div class="colored_text home_lecture_subtitle">(consistency vs. coherence, relaxed consistency models and their motivation, acquire/release semantics)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av12183440/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=Mg1S4A_JcaU">Youtube</a></li>
   </ul>

   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://plrg.eecs.uci.edu/eecs221/lib/exe/fetch.php?media=synth-coherence.pdf" target="_blank">A Primer on Memory Consistency and Coherence</a>. by Sorin, Hill, and Wood. (Ch. 1,3,4,5)</li>
     <li><a href="http://www.cl.cam.ac.uk/~pes20/weakmemory" target="_blank">A Useful Page with Links to a Bunch of Resources on Relaxed Memory Models</a></li>
     </ul>
     
   </div>  
</td>
</tr>


<tr>
<td class="schedule_date">Jul 13</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('synchronization'); ?>">Fine-Grained Synchronization and Lock-Free Programming</a></div>
   <div class="colored_text home_lecture_subtitle">(fine-grained snychronization via locks, lock-free programming: single-reader/writer queues, lock-free stacks, the ABA problem, hazard pointers)</div>
   <div class="home_lecture_indent">

   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="https://www.bilibili.com/video/av12183570/">Bilibili</a></li>
   <li><a href="https://www.youtube.com/watch?v=qdiluZ0r9U4">Youtube</a></li>
   </ul>
      
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
       <li><a href="https://www.cl.cam.ac.uk/research/srg/netos/papers/2001-caslists.pdf" target="_blank">A Pragmatic Implementation of
          Non-Blocking Linked-Lists</a>. by T. Harris, 2001</li>
       <li><a href="http://www.cse.yorku.ca/~ruppert/papers/lfll.pdf" target="_blank">Lock-Free Linked Lists and Skip Lists</a>. by M. Fomitchev and E. Ruppert, 2004</li>
       <li><a href="https://www.research.ibm.com/people/m/michael/ieeetpds-2004.pdf" target="_blank">Hazard Pointers: Safe Memory Reclamation for
     Lock-Free Objects</a>. by M. Michael, IEEE Trans on Parallel and Distributed Systems, 2004</li>
       <li><a href="http://www.drdobbs.com/lock-free-data-structures-with-hazard-po/184401890" target="_blank">Lock-Free Data Structures with Hazard pointers</a>. by A. Alexandrescu and M. Michael, Dr. Dobbs, 2004</li>
     </ul>
     
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 17</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('heterogeneity'); ?>">Heterogeneous Parallelism and Hardware Specialization</a></div>
   <div class="colored_text home_lecture_subtitle">(energy-efficient computing, motivation for heterogeneous processing, fixed-function processing, FPGAs, modern SoC's)</div>
   <div class="home_lecture_indent">

   <!-- <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>
   -->
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://international.download.nvidia.com/pdf/tegra/Tegra-X1-whitepaper-v1.0.pdf" target="_blank">NVIDIA Tegra X1 Whitepaper</a></li>
     <li><a href="http://research.cs.wisc.edu/multifacet/papers/ieeecomputer08_amdahl_multicore.pdf" target="_blank">Amdahl's Law in the Multicore Era</a>. by M. Hill and M. Marty. IEEE Computer 2008</li>
     <li><a href="http://csl.stanford.edu/~christos/publications/2010.efficiency.isca.pdf" target="_blank">Understanding Sources of Inefficiency in General-Purpose Chips</a>. by Hameed et al. ISCA 2010</li>
     <li><a href="https://arxiv.org/abs/1704.04760" target="_blank">In-Datacenter Performance Analysis of a Tensor Processing Unit</a>. by Jouppi et al. ISCA 2017</li>
     <li><a href="https://www.hotchips.org/wp-content/uploads/hc_archives/hc25/HC25.70-Mobility-epub/HC25.27.712-Hot%20Chips%202013%20Final%20Presentation%20--%20Qualcomm_Lucian_Codrescu%20v2.pdf" target="_blank">Qualcomm Hexagon DSP: An architecture optimized for mobile multimedia and communications</a>. (HotChips 25, 2013)</li>
     </ul>
   </div>  
</td>
</tr>


<tr>
<td class="schedule_date">Jul 19</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('dsl'); ?>">Domain-Specific Programming Systems</a></div>
   <div class="colored_text home_lecture_subtitle">(motivation for DSLs, case studies on Lizst and Halide)</div>
   <div class="home_lecture_indent">

   <!--
   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>
   -->
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://graphics.stanford.edu/hackliszt/" target="_blank">Lizst: A DSL for solving mesh-based PDEs</a></li>
     <li><a href="http://halide-lang.org/" target="_blank">Halide: a language for image processing and computational photography</a>. J. Ragan-Kelley et al. [2012, 2014]</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/halidesched/" target="_blank">Automatically Scheduling Halide Image Processing Pipelines</a>. Mullapudi et al. 2016</li>
     <li><a href="http://graphics.stanford.edu/papers/rigel/" target="_blank">Rigel: Flexible Multi-Rate Image Processing Hardware</a>. Hegarty et al. SIGGRAPH 2016 (<a href="https://github.com/jameshegarty/rigel" target="_blank">code</a>)</li>
     <li><a href="http://optlang.org/" target="_blank">Opt: A Domain Specific Language for Non-linear Least Squares Optimization in Graphics and Imaging</a>. Z. DeVito et al. 2016</li>
     <li><a href="http://ebblang.org/" target="_blank">Ebb: A DSL for Physical Simulation on CPUs and GPUs</a>. G. Bernstein et al. 2016</li>
     <li><a href="http://people.csail.mit.edu/jrk/simit.pdf" target="_blank">Simit:  A Language for Physical Simulation</a>. Kjolstad et al. 2015</li>
     <li><a href="http://groups.csail.mit.edu/commit/papers/2016/why.pdf" target="_blank">Why New Programming Languages for Simulation?</a>. G. Bernstein and F. Kjolstad, TOG 2016</li>
     </ul>
     
   </div>  
</td>
</tr>


<tr>
<td class="schedule_date">Jul 20</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('graphdsl'); ?>">Domain-Specific Programming for Graphs</a></div>
   <div class="colored_text home_lecture_subtitle">(GraphLab, Ligra, and GraphChi, streaming graph processing, graph compression)</div>
   <div class="home_lecture_indent">

   <!--
   <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>
   -->
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://jshun.github.io/ligra/" target="_blank">Ligra Web Site</a> (see bottom of <a href="http://jshun.github.io/ligra/docs/introduction.html" target="_blank">this page</a> for Ligra papers)</li>
     <li><a href="http://www.cs.cmu.edu/~pavlo/courses/fall2013/static/papers/osdi2012-graphchi.pdf" target="_blank">GraphChi: Large-Scale Graph Computation on Just a PC</a>. by Kyrola et al. OSDI 12
     <li><a href="http://select.cs.cmu.edu/code/graphlab/" target="_blank">GraphLab Documentation</a> (now see <a href="https://turi.com/" target="_blank">Turi's site</a>)</li>
     <li><a href="http://spark.apache.org/graphx/" target="_blank">Apache Spark's GraphX Framework</a></li>
     </ul>     
   </div>  
</td>
</tr>


<tr>
<td class="schedule_date">Jul 20</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><a href="<?php echo lecture_url('spark'); ?>">In-Memory Distributed Computing using Spark</a></div>
   <div class="colored_text home_lecture_subtitle">(producer-consumer locality, RDD abstraction, Spark implementation and scheduling)</div>
   <div class="home_lecture_indent">

   <!-- <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>
-->

   <div>Further Reading:</div>
     <ul class="home_lecture_list">
      <li><a href="http://spark.apache.org" target="_blank">Apache Spark Web Site</a></li>
     <li><a href="https://www.usenix.org/system/files/conference/nsdi12/nsdi12-final138.pdf" target="_blank">Resilient Distributed Datasets: A Fault-Tolerant Abstraction for In-Memory Cluster Computing</a>. by Zaharia et al. NSDI 2012</li>
     <li><a href="https://www.usenix.org/system/files/conference/hotos15/hotos15-paper-mcsherry.pdf" target="_blank">Scalability! But at What COST?</a>. F. McSherry et al. HotOS 2015</li>
     <li><a href="https://www.oreilly.com/learning/accelerating-spark-workloads-using-gpus" target="_blank">Accelerating Spark Workloads Using GPUs</a>. by R. Bordawekar, 2016</li>
     <li><a href="https://cs.stanford.edu/~matei/papers/2017/cidr_weld.pdf" target="_blank">Weld: A Common Runtime for High Performance Data Analytics</a>, by S. Palkar, CIDR 2017</li>
     <li><a href="https://sparkhub.databricks.com/video/deep-dive-into-project-tungsten-bringing-spark-closer-to-bare-metal/" target="_blank">Deep Dive into Project Tungsten: Bringing Apache Spark Closer to Bare Metal</a>. J. Rosen 2015</li>
     </ul>
   </div>  
</td>
</tr>


<tr>
<td class="schedule_date">Jul 24</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><span class="bold_text">Efficiently Evaluating and Training Deep Neural Networks</span></div>
   <div class="colored_text home_lecture_subtitle">(intro to DNNs, what a convolution does, mapping convolution to matrix multiplication, deep network compression, basics of gradient descent and backpropagation, memory footpring issues, asynchronous parallel implementations of gradient descent)</div>
   <div class="home_lecture_indent">

   <!-- <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>

   
   <div>Further Reading on Efficient Evaluation:</div>
     <ul class="home_lecture_list">
     <li><a href="http://cs231n.stanford.edu" target="_blank">Stanford cs231: Convolutional Neural Networks for Visual Recognition</a>. I recommend that you read through the lecture notes for modules 1 and 2 for a very nice explanation of key topics.</li>     
     <li><a href="http://neuralnetworksanddeeplearning.com" target="_blank">Neural Networks and Deep Learning</a>, Nielson, 2016 (a free online book)</li> 
     <li>Check out the <a href="https://www.tensorflow.org/" target="_blank">TensorFlow</a> tutorials and play around in the <a href="http://playground.tensorflow.org" target="_blank">TensorFlow Playground</a></li>
     <li><a href="https://arxiv.org/pdf/1311.2901v1.pdf" target="_blank">Visualizing and Understanding Convolutional Neural Networks</a>, Zeiler and Fergus, ECCV14</li>
     <li><a href="https://papers.nips.cc/paper/4824-imagenet-classification-with-deep-convolutional-neural-networks.pdf" target="_blank">ImageNet Classification with Deep Convolutional Neural Networks</a>. Krizhevsky et al. NIPS 2012 (this is the original "AlexNet" paper)</li>
     <li><a href="https://arxiv.org/abs/1409.4842" target="_blank">Going Deeper with Convolutions</a>, Szegedy et al. CVPR 2015 (this is the original Google Inception paper)</li>
     <li><a href="https://arxiv.org/abs/1602.07360" target="_blank">SqueezeNet: AlexNet-level accuracy with 50x fewer parameters and &lt;0.5MB model size</a>, Iandola et al. 2016</li>
     <li><a href="https://arxiv.org/pdf/1510.00149.pdf" target="_blank">Deep Compression: Compressing Deep Neural Networks with Pruning, Trained Quantization and Huffman Coding</a>, Han et al. ICLR 2016</li>
     <li><a href="https://arxiv.org/abs/1602.01528" target="_blank">EIE: Efficient Inference Engine on Compressed Deep Neural Network</a>, Han et al. ISCA 2016</li>
     <li><a href="https://arxiv.org/abs/1704.04760" target="_blank">In-Datacenter Performance Analysis of a Tensor Processing Unit</a>. Jouppi et al. ISCA 2017</li>     
     </ul>
   <div>Further Reading on Efficient Training:</div>
     <ul class="home_lecture_list">
          <li><a href="https://www.cs.cmu.edu/~muli/file/parameter_server_osdi14.pdf" target="_blank">Scaling Distributed Machine Learning with the Parameter Server</a>, Li et al. OSDI 2014</li>
     <li><a href="https://www.usenix.org/system/files/conference/osdi14/osdi14-paper-chilimbi.pdf" target="_blank">Project Adam: Building an Efficient and Scalable Deep Learning Training System</a>, Chilimbi et al. OSDI 2014</li>
     <li><a href="https://arxiv.org/abs/1511.00175" target="_blank">FireCaffe: Near-linear Acceleration of Deep Neural Network Training on Compute Clusters</a>, Iandola et al. CVPR 2016</li>

</ul>
     
     -->
     
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 26</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><span class="bold_text">Addressing the Memory Wall</span></div>
   <div class="colored_text home_lecture_subtitle">(how DRAM works, cache compression, DRAM compression, 3D stacking)</div>
   <div class="home_lecture_indent">

   <!-- <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="https://users.ece.cmu.edu/~omutlu/pub/bdi-compression_pact12.pdf" target="_blank">Base-Delta-Immediate Compression: Practical Data Compression for On-Chip Caches</a>. by Pekhimenko et al. PACT 2012</li>
     <li><a href="http://www.anandtech.com/show/11002/the-amd-vega-gpu-architecture-teaser/3" target="_blank">AnandTech Article on HBM2</a></li>
     </ul>

     -->
     
   </div>  
</td>
</tr>

<tr>
<td class="schedule_date">Jul 27</td>
<td class="schedule_lecture">
   <div class="home_lecture_title"><span class="bold_text">Scaling a Web Site</span></div>
   <div class="colored_text home_lecture_subtitle">(scale out thinking, load balancing, elasticity, caching)</div>
   <div class="home_lecture_indent">

   <!-- <div class="home_lecture_video">Watch the Lecture:</div>
   <ul class="home_lecture_list">
   <li><a href="">Bilibili</a></li>
   <li><a href="">Youtube</a></li>
   </ul>
   
   <div>Further Reading:</div>
     <ul class="home_lecture_list">
     <li><a href="http://www.highscalability.com" target="_blank">www.highscalability.com</a>. A cool site with many case studies (see "All Time Favorites" section)</li>
     <li><a href="http://perspectives.mvdirona.com" target="_blank">James Hamilton's Blog</li></ul>

     </ul>

     -->
     
   </div>  
</td>
</tr>


</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
