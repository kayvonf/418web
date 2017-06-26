
<div class="home_container">

<div class="home_title">Parallel Computer Architecture and Programming <span style="font-size: 12pt;">(CMU 15-418/618)</span> </div>


<p>This page contains lecture slides, videos, and recommended readings for the Spring 2017 offering of 15-418/618.


The full listing of lecture videos is available
<a href="https://mediatech-stream.andrew.cmu.edu/Mediasite/Catalog/Full/d9502528c9724ad8b726f27a3a10c3a921" target="_blank">here</a>.

</p>

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
     <div class="colored_text book_lecture_subtitle">(forms of parallelism + understanding Latency and BW)</div>

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
     <a href="<?php echo lecture_url('progmodels'); ?>">Lecture 3: Parallel Programming Models</a></div>
     <div class="colored_text book_lecture_subtitle">(ways of thinking about parallel programs, and their corresponding hardware implementations)</div>

     <div class="book_lecture_indent">

     <div class="resources">
     
     <div>Further Reading: (some fun systems)</div>
     <ul>
     <li><a href="https://ispc.github.io/index.html" target="_blank">ISPC Programmer's Manual</a></li>
     <li><a href="https://www.threadingbuildingblocks.org/" target="_blank">Thread Building Blocks</a></li>
     <li><a href="https://graphics.stanford.edu/papers/brookgpu/">Brook for GPUs: Stream Computing on Graphics Hardware</a>
     <li><a href="http://groups.csail.mit.edu/cag/streamit/" target="_blank">MIT's StreaMIT Project</li>
     </ul>     
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('progbasics'); ?>">Lecture 4: Parallel Programming Basics</a></div>
     <div class="colored_text book_lecture_subtitle">(the thought process of parallelizing a program)</div>

     <div class="book_lecture_indent">

     <div class="resources">&nbsp;     
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('gpuarch'); ?>">Lecture 5: GPU Architecture and CUDA Programming</a></div>
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
     <a href="<?php echo lecture_url('progperf1'); ?>">Lecture 6: Performance Optimization I: Work Distribution and Scheduling</a></div>
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
     <a href="<?php echo lecture_url('progperf2'); ?>">Lecture 7: Performance Optimization II: Locality, Communication, and Contention</a></div>
     <div class="colored_text book_lecture_subtitle">(message passing, async vs. blocking sends/receives, pipelining, increasing arithmetic intensity, avoiding contention)</div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('casestudies'); ?>">Lecture 8: Parallel Programming Case Studies</a></div>
     <div class="colored_text book_lecture_subtitle">(examples of optimizing parallel programs)</div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('perfeval'); ?>">Lecture 9: Workload-Driven Performance Evaluation</a></div>
     <div class="colored_text book_lecture_subtitle">(hard vs. soft scaling, memory-constrained scaling, scaling problem size, tips for analyzing code performance)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://people.eecs.berkeley.edu/~waterman/papers/roofline.pdf" target="_blank">Roofline: An Insightful Visual Performance Model for Multicore Architectures</a>. by S. Williams, A. Waterman, D. Patternson. CACM 2009</li>
     <li><a href="http://docs.nvidia.com/cuda/profiler-users-guide/#axzz4YXNizAoc" target="_blank">NVProf Documentation</a></li>
     <li><a href="https://software.intel.com/en-us/intel-vtune-amplifier-xe" target="_blank">Intel vTune</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('cachecoherence1'); ?>">Lecture 10: Snooping-Based Cache Coherence</a></div>
     <div class="colored_text book_lecture_subtitle">(definition of memory coherence, invalidation-based coherence using MSI and MESI, maintaining coherence with multi-level caches, false sharing)</div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('directorycoherence'); ?>">Lecture 11: Directory-Based Cache Coherence</a></div>
     <div class="colored_text book_lecture_subtitle">(scaling problem of snooping, implementation of directories, directory storage optimization)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.88.6826&rep=rep1&type=pdf" target="_blank">Reducing Memory and Traffic Requirements for Scalable Directory-Based Cache Coherence Schemes</a>. A Gupta et al. International Conference on Parallel Processing, 1990</li>
     <li><a href="http://www.hotchips.org/wp-content/uploads/hc_archives/hc27/HC27.25-Tuesday-Epub/HC27.25.70-Processors-Epub/HC27.25.710-Knights-Landing-Sodani-Intel.pdf" target="_blank">Knights Landing: 2nd Generation Intel Xeon Phi Processor</a>. A Sodani, Hot Chips 25, 2015</li>
     </ul>
     </div>

</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('snoopimpl'); ?>">Lecture 12: A Basic Snooping-Based Multi-Processor Implementation</a></div>
     <div class="colored_text book_lecture_subtitle">(deadlock, livelock, starvation, implementation of coherence on an atomic and split-transaction bus)</div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('consistency'); ?>">Lecture 13: Memory Consistency</a></div>
     <div class="colored_text book_lecture_subtitle">(consistency vs. coherence, relaxed consistency models and their motivation, acquire/release semantics)</div>

     <div class="book_lecture_indent">

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
     <div class="colored_text book_lecture_subtitle">(machine-level atomic operations, implementing locks, implementing barriers)</div>

     <div class="book_lecture_indent">

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

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.intel.com/content/www/us/en/architecture-and-technology/64-ia-32-architectures-optimization-manual.html" target="_blank">Intel Optimization Manual, Chapter 12</a></li>
     <li><a href="https://software.intel.com/en-us/node/524025" target="_blank">Intel Restricted Transactional Memory Overview</a></li>
     <li>Students may find it helpful to read the background chapters of <a href="http://csl.stanford.edu/~christos/publications/2009.austen_mcdonald.phd_thesis.pdf" target="_blank">Austen McDonald's Thesis</a></li>
     </ul>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('heterogeneity'); ?>">Lecture 19: Heterogeneous Parallelism and Hardware Specialization</a></div>
     <div class="colored_text book_lecture_subtitle">(energy-efficient computing, motivation for heterogeneous processing, fixed-function processing, FPGAs, what's in a modern SoC)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://international.download.nvidia.com/pdf/tegra/Tegra-X1-whitepaper-v1.0.pdf" target="_blank">NVIDIA Tegra X1 Whitepaper</a></li>
     <li><a href="http://research.cs.wisc.edu/multifacet/papers/ieeecomputer08_amdahl_multicore.pdf" target="_blank">Amdahl's Law in the Multicore Era</a>. by M. Hill and M. Marty. IEEE Computer 2008</li>
     <li><a href="http://csl.stanford.edu/~christos/publications/2010.efficiency.isca.pdf" target="_blank">Understanding Sources of Inefficiency in General-Purpose Chips</a>. by Hameed et al. ISCA 2010</li>
     <li><a href="https://arxiv.org/abs/1602.01528" target="_blank">EIE: Efficient Inference Engine on Compressed Deep Neural Network</a>. by Han et al. ISCA 2016</li>
     <li><a href="https://www.hotchips.org/wp-content/uploads/hc_archives/hc25/HC25.70-Mobility-epub/HC25.27.712-Hot%20Chips%202013%20Final%20Presentation%20--%20Qualcomm_Lucian_Codrescu%20v2.pdf" target="_blank">Qualcomm Hexagon DSP: An architecture optimized for mobile multimedia and communications</a>. (HotChips 25, 2013)</li>
     </ul>
 
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('dsl'); ?>">Lecture 20: Domain-Specific Programming Systems</a></div>
     <div class="colored_text book_lecture_subtitle">(motivation for DSLs, case studies on Lizst and Halide)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
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
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('graphdsl'); ?>">Lecture 21: Domain-Specific Programming on Graphs</a></div>
     <div class="colored_text book_lecture_subtitle">(GraphLab, Ligra, and GraphChi, streaming graph processing, graph compression)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://jshun.github.io/ligra/" target="_blank">Ligra Web Site</a> (see bottom of <a href="http://jshun.github.io/ligra/docs/introduction.html" target="_blank">this page</a> for Ligra papers)</li>
     <li><a href="http://www.cs.cmu.edu/~pavlo/courses/fall2013/static/papers/osdi2012-graphchi.pdf" target="_blank">GraphChi: Large-Scale Graph Computation on Just a PC</a>. by Kyrola et al. OSDI 12
     <li><a href="http://select.cs.cmu.edu/code/graphlab/" target="_blank">GraphLab Documentation</a> (now see <a href="https://turi.com/" target="_blank">Turi's site</a>)</li>
     <li><a href="http://spark.apache.org/graphx/" target="_blank">Apache Spark's GraphX Framework</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('spark'); ?>">Lecture 22: In-Memory Distributed Computing using Spark</a></div>
     <div class="colored_text book_lecture_subtitle">(producer-consumer locality, RDD abstraction, Spark implementation and scheduling)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://spark.apache.org" target="_blank">Apache Spark Web Site</a></li>
     <li><a href="https://www.usenix.org/system/files/conference/nsdi12/nsdi12-final138.pdf" target="_blank">Resilient Distributed Datasets: A Fault-Tolerant Abstraction for In-Memory Cluster Computing</a>. by Zaharia et al. NSDI 2012</li>
     <li><a href="https://www.usenix.org/system/files/conference/hotos15/hotos15-paper-mcsherry.pdf" target="_blank">Scalability! But at What COST?</a>. F. McSherry et al. HotOS 2015</li>
     <li><a href="https://www.oreilly.com/learning/accelerating-spark-workloads-using-gpus" target="_blank">Accelerating Spark Workloads Using GPUs</a>. by R. Bordawekar, 2016</li>
     <li><a href="https://cs.stanford.edu/~matei/papers/2017/cidr_weld.pdf" target="_blank">Weld: A Common Runtime for High Performance Data Analytics</a>, by S. Palkar, CIDR 2017</li>
     <li><a href="https://sparkhub.databricks.com/video/deep-dive-into-project-tungsten-bringing-spark-closer-to-bare-metal/" target="_blank">Deep Dive into Project Tungsten: Bringing Apache Spark Closer to Bare Metal</a>. J. Rosen 2015</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('dnn'); ?>">Lecture 23: Efficiently Evaluating Deep Networks</a></div>
     <div class="colored_text book_lecture_subtitle">(intro to deep networks, what a convolution does, mapping convolution to matrix multiplication, deep network compression)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://cs231n.stanford.edu" target="_blank">Stanford cs231: Convolutional Neural Networks for Visual Recognition</a>. I recommend that you read through the lecture notes for modules 1 and 2 for a very nice explanation of key topics.</li>     
     <li><a href="http://neuralnetworksanddeeplearning.com" target="_blank">Neural Networks and Deep Learning</a>, Nielson, 2016 (a free online book)</li> 
     <li>Check out the <a href="https://www.tensorflow.org/" target="_blank">TensorFlow</a> tutorials and play around in the <a href="http://playground.tensorflow.org" target="_blank">TensorFlow Playground</a></li>
     <li><a href="https://arxiv.org/pdf/1311.2901v1.pdf" target="_blank">Visualizing and Understanding Convolutional Neural Networks</a>, Zeiler and Fergus, ECCV14</li>
     <li><a href="https://papers.nips.cc/paper/4824-imagenet-classification-with-deep-convolutional-neural-networks.pdf" target="_blank">ImageNet Classification with Deep Convolutional Neural Networks</a>. Krizhevsky et al. NIPS 2012 (this is the original "AlexNet" paper)</li>
     <li><a href="https://arxiv.org/abs/1409.4842" target="_blank">Going Deeper with Convolutions</a>, Szegedy et al. CVPR 2015 (this is the original Google Inception paper)</li>
     <li><a href="https://arxiv.org/abs/1602.07360" target="_blank">SqueezeNet: AlexNet-level accuracy with 50x fewer parameters and &lt;0.5MB model size</a>, Iandola et al. 2016</li>
     <li><a href="https://arxiv.org/pdf/1510.00149.pdf" target="_blank">Deep Compression: Compressing Deep Neural Networks with Pruning, Trained Quantization and Huffman Coding</a>, Han et al. ICLR 2016</li>
     <li><a href="https://arxiv.org/abs/1602.01528" target="_blank">EIE: Efficient Inference Engine on Compressed Deep Neural Network</a>, Han et al. ISCA 2016</li>
     <li><a href="https://drive.google.com/file/d/0Bx4hafXDDq2EMzRNcy1vSUxtcEk/view" target="_blank">In-Datacenter Performance Analysis of a Tensor Processing Unit</a>. Jouppi et al. ISCA 2017</li>     
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('dnntraining'); ?>">Lecture 24: Parallel Deep Network Training</a></div>
     <div class="colored_text book_lecture_subtitle">(basics of gradient descent and backpropagation, memory footpring issues, asynchronous parallel implementations of gradient descent)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://www.cs.cmu.edu/~muli/file/parameter_server_osdi14.pdf" target="_blank">Scaling Distributed Machine Learning with the Parameter Server</a>, Li et al. OSDI 2014</li>
     <li><a href="https://www.usenix.org/system/files/conference/osdi14/osdi14-paper-chilimbi.pdf" target="_blank">Project Adam: Building an Efficient and Scalable Deep Learning Training System</a>, Chilimbi et al. OSDI 2014</li>
     <li><a href="https://arxiv.org/abs/1511.00175" target="_blank">FireCaffe: Near-linear Acceleration of Deep Neural Network Training on Compute Clusters</a>, Iandola et al. CVPR 2016</li>
     </ul>

     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('memory'); ?>">Lecture 25: Addressing the Memory Wall</a></div>
     <div class="colored_text book_lecture_subtitle">(how DRAM works, cache compression, DRAM compression, upcoming memory technologies like 3D stacking)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="https://users.ece.cmu.edu/~omutlu/pub/bdi-compression_pact12.pdf" target="_blank">Base-Delta-Immediate Compression: Practical Data Compression for On-Chip Caches</a>. by Pekhimenko et al. PACT 2012</li>
     <li><a href="http://www.anandtech.com/show/11002/the-amd-vega-gpu-architecture-teaser/3" target="_blank">AnandTech Article on HBM2</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('hpcfuture'); ?>">Lecture 26: The Future of High-Performance Computing</a></div>
     <div class="colored_text book_lecture_subtitle">(supercomputing vs. distributed computing/analytics, design philosophy of both systems)</div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('dbscaling'); ?>">Lecture 27: Database Systems Do Not Scale to 1000 CPU Cores</a></div>
     <div class="bold_text">(Guest lecture by <a href="http://www.cs.cmu.edu/~pavlo/">Andy Pavlo</a>)</div>
     <div class="colored_text book_lecture_subtitle">(concurrency control in databases, transactions, two-phase locking, timestamp ordering)</div>

     <div class="book_lecture_indent">
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.vldb.org/pvldb/vol8/p209-yu.pdf" target="_blank">Staring into the Abyss: An Evaluation of
     Concurrency Control with One Thousand Cores</a>. Yu et al. VLDB Endowment 2014</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title" style="padding-bottom: 0px">
     <a href="<?php echo lecture_url('finaltips'); ?>">Lecture 28: Course Wrap Up + How to Give a Talk</a></div>
     <div class="colored_text book_lecture_subtitle">(tips for giving a clear talk, a bit of philosophy)</div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/~kayvonf/misc/cleartalktips.pdf" target="_blank">Kayvon's Clear Talk Tips</a> (expanded version)</li>
     <li><a href="http://www.cs.cmu.edu/~kayvonf/misc/do_grades_matter.pdf" target="_blank">Do Grades Matter</a> (a discussion about thinking beyond classes at CMU)</li>
     </ul>

     </div>
</div>


<p>&nbsp;</p>

</div>


