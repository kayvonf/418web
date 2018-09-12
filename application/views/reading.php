
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS348K, Fall 2018</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>


<p>This page contains lecture slides and recommended readings for the Fall 2018 offering of CS348K.</p>


<div class="book_lecture">
     <div class="book_lecture_title">
     <!-- <a href="lectures/01_introReview.pdf">Lecture 1: Throughput Architecture Review</a> -->
     <span>Lecture 1: Throughput Architecture Review</span>
     </div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://software.intel.com/sites/default/files/managed/c5/9a/The-Compute-Architecture-of-Intel-Processor-Graphics-Gen9-v1d0.pdf" target="_blank">The Compute Architecture of Intel Processor Graphics Gen9</a>, Intel Technical Whitepaper </li>
     </ul>

     <div class="instructions">

<p>The reading for this class is not an academic paper, but a
whitepaper from Intel describing the architectural geometry of a
recent GPU. -- the marketing name is HD Graphics 530 (or larger
numbers).</p>

<p>I'd like you to read the whitepaper, focusing on the description of
the processor in Sections 5.3-5.5.  Then, given your knowledge of the
concepts discussed in lecture (such as superscalar execution,
multi-core, multi-threading, etc.), I'd like you to describe the
organization of the processor (using terms from the lecture, not Intel
terms). For example, what is the basic processor building block.  How
many hardware threads does it support? What type of SIMD instructions
are executed by those threads? Does it have superscalar execution
capabilities? How many times is this block replicated for additional
parallelism?</p>

<p>Consider your favorite data-parallel language, such as GLSL/HLSL
shading languages, CUDA, OpenCL, ISPC, or just an OpenMP #pragma
parallel for. Can you think through how an embarrassingly parallel for
loop can be mapped to this architecture. (You don't need to write this
down, but you could.)  </p>

<p>I also encourage you to read <a href="http://images.nvidia.com/content/volta-architecture/pdf/volta-architecture-whitepaper.pdf">NVIDIA's V100 (Volta) Architecture
whitepaper</a>, linked in the "further reading" below. Can you put the
organization of this GPU in correspondence with the organization of
the Intel GPU? You could make a table contrasting the features of a
modern AVX-capable Intel CPU, Intel Integrated Graphics (Gen9), NVIDIA
GPUs, etc.</p>
  
</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://images.nvidia.com/content/volta-architecture/pdf/volta-architecture-whitepaper.pdf">NVIDIA Tesla V100 Whitepaper</a>, 2017</li>
     <li><a href="http://international.download.nvidia.com/pdf/tegra/Tegra-X1-whitepaper-v1.0.pdf">NVIDIA Tegra X1 Whitepaper</a></li>
     <li><a href="http://www.cs.cmu.edu/~kayvonf/papers/mobilevc_ieee16.pdf" target="_blank">The Rise of Mobile Visual Computing Systems</a>, Fatahalian, IEEE Mobile Computing 2016</li>
     <li><a href="http://www.frankmcsherry.org/assets/COST.pdf">Scalability! But at What COST?</a>, McSherry, Isard, and Murray. HotOS 2015 (The arguments in this paper are very consistent with the way we think about performance in the visual computing domain.)</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <span>Lecture 2: The Digital Camera Processing Pipeline</span>
     </div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://research.google.com/pubs/pub45586.html">Burst Photography for High Dynamic Range and Low-light Imaging
     on Mobile Cameras</a>, Hasinoff et al. SIGGRAPH Asia 2016</li>
     </ul>
 
     <div>Further Reading:</div>
     <ul>
     <li>The Stanford CS448A <a href="http://graphics.stanford.edu/courses/cs448a-10/" target="_blank">course notes</a> are a very good reference for camera image processing pipeline algorithms and issues.</li>
     <li>The <a href="http://graphics.stanford.edu/courses/cs178-11/applets/applets.html" target="_blank">interactive demos</a> on the Stanford CS178 course site are very well done</li>
     <li><a href="http://www.clarkvision.com/articles/index.html">Clarkvision.com</a> has some very interesting material on cameras.</li>
     <li><a href="http://ieeexplore.ieee.org/document/1407714/">Demosaicking: Color Filter Array Interpolation</a>, Gunturk et al. IEEE Signal Processing Magazine, 2005</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=1069066" target="_blank">A Non-Local Algorithm for Image Denoising</a>, Buades et al. CVPR 2005</li>
     <li><a href="http://people.csail.mit.edu/sparis/bf_course/" target="_blank">A Gentle Introduction to Bilateral Filtering and its Applications</a>, Paris et al. SIGGRAPH 2008 Course Notes</li>
     <li><a href="http://people.csail.mit.edu/sparis/publi/2006/tr/Paris_06_Fast_Bilateral_Filter_MIT_TR.pdf" target="_blank">A Fast Approximation of the Bilateral Filter using a Signal Processing Approach</a>, Paris and Durand. MIT technical report 2006 (extends their ECCV 2006 paper)</li>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <span>Lecture 3: Modern Smartphone Camera Processing (such as in the Pixel 2 Phone)</span>
     </div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/papers/portrait/wadhwa-portrait-sig18.pdf">Synthetic Depth-of-Field with a Single-Camera Mobile Phone</a>, Wadha et al. SIGGRAPH 2018</li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://ieeexplore.ieee.org/document/1095851/" target="_blank">The Laplacian Pyramid as a Compact Image Code</a>. Burt and Adelson, IEEE Transactions on Communications 1983.</li>
     <li><a href="http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.56.8646" target="_blank">Pyramid Methods in Image Processing</a>. Andersen et al. 1984</li>
     <li><a href="https://people.csail.mit.edu/sparis/publi/2011/siggraph/" target="_blank">Local Laplacian Filters: Edge-aware Image Processing with a Laplacian Pyramid</a>. Paris et al. SIGGRAPH 2013</li>
     <li><a href="http://ieeexplore.ieee.org/document/4392748/" target="_blank">Exposure Fusion</a>. Mertens et al. Computer Graphics and Applications, 2007</li>
     <li><a href="http://people.csail.mit.edu/sparis/publi/2014/tog/Aubry_14-Fast_Local_Laplacian_Filters.pdf" target="_blank">Fast Local Laplacian Filters: Theory and Applications</a>. Aubry et al. TOG 14</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=1069066" target="_blank">A Non-Local Algorithm for Image Denoising</a>, Buades et al. CVPR 2005</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <span>Lecture 4: Efficiently Scheduling Image Processing Algorithms on Parallel Hardware</span>
     </div>
     

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://people.csail.mit.edu/jrk/halide-pldi13.pdf" target="_blank">Halide: A Language and Compiler for Optimizing Parallelism, Locality, and Recomputation in Image Processing Pipelines</a>. Ragan-Kelley, Andrew Adams, et al. PLDI 2013 (or read the selected chapters in the Ragan-Kelley thesis below)</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/halidesched/" target="_blank">Automatically Scheduling Halide Image Processing Pipelines</a>, Mullapudi et al. SIGGRAPH 2016</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
       <li><a href="http://people.csail.mit.edu/jrk/jrkthesis.pdf" target="_blank">Decoupling Algorithms from the Organization of Computation for High Performance Image Processing</a> (please read Chapters 1, 4, 5, and 6.1), Ragan-Kelley (MIT Ph.D. thesis, 2014)</li>
     <li><a href="http://halide-lang.org/" target="_blank">Halide Language Website</a> (contains documentation and many tutorials)</li>
     </ul>
     </div>
</div>


<p>&nbsp;</p>

</div>


