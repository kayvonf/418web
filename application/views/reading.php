
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">Stanford CS348K, Fall 2018</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>


<p>This page contains lecture slides and recommended readings for the Fall 2018 offering of CS348K.</p>


<div class="book_lecture">
     <div class="book_lecture_title">
     <!-- <a href="lectures/01_introReview.pdf">Lecture 1: Throughput Architecture Review</a> -->
     <a href="<?php echo lecture_url('introreview'); ?>">Lecture 1: Throughput Architecture Review</a>
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
     <a href="<?php echo lecture_url('camerapipeline'); ?>">Lecture 2: The Digital Camera Processing Pipeline</a>
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
     <a href="<?php echo lecture_url('camerapipeline2'); ?>">Lecture 3: Modern Smartphone Camera Processing (such as in the Pixel 2 Phone)</a>
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
     <a href="<?php echo lecture_url('imagesched'); ?>">Lecture 4: Efficiently Scheduling Image Processing Algorithms on Parallel Hardware</a>
     </div>
     

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://people.csail.mit.edu/jrk/halide-pldi13.pdf" target="_blank">Halide: A Language and Compiler for Optimizing Parallelism, Locality, and Recomputation in Image Processing Pipelines</a>. Ragan-Kelley, Andrew Adams, et al. PLDI 2013 (or read the selected chapters in the Ragan-Kelley thesis below)</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
       <li><a href="http://people.csail.mit.edu/jrk/jrkthesis.pdf" target="_blank">Decoupling Algorithms from the Organization of Computation for High Performance Image Processing</a> (please read Chapters 1, 4, 5, and 6.1), Ragan-Kelley (MIT Ph.D. thesis, 2014)</li>
       <li><a href="http://graphics.cs.cmu.edu/projects/halidesched/" target="_blank">Automatically Scheduling Halide Image Processing Pipelines</a>, Mullapudi et al. SIGGRAPH 2016</li>

     <li><a href="https://people.csail.mit.edu/tzumao/gradient_halide/">Differentiable Programming for Image Processing and Deep Learning in Halide</a>. T. Li et al. SIGGRAPH 2018</li>
     <li><a href="https://drive.google.com/file/d/1JukgkGGPFrQ4_Vwi5ZxpgkRND0yU2gyk/view">Parallel Associative Reductions in Halide</a>. P. Suriana et al. CGO 2017</li>
     <li><a href="http://halide-lang.org/" target="_blank">Halide Language Website</a> (contains documentation and many tutorials)</li>
     <li>Check out <a href="https://www.youtube.com/watch?v=3uiEyEKji0M">this Youtube Video</a> on scheduling</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('imagehw'); ?>">Lecture 5:
     Specialized Hardware for Image Processing</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
      <li><a href="http://graphics.stanford.edu/papers/fcam/" target="_blank">The Frankencamera: An Experimental Platform for Computational Photography</a>. A. Adams et al. SIGGRAPH 2010</li>    
     </ul>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/papers/darkroom14/">Darkroom: Compiling High-Level Image Processing Code into Hardware Pipelines</a> Hegarty et al. SIGGRAPH 2014</li>
     <li><a href="http://graphics.stanford.edu/papers/rigel/" target="_blank">Rigel: Flexible Multi-Rate Image Processing Hardware</a>, Hegarty et al. SIGGRAPH 2016.</li>
     <li><a href="https://dl.acm.org/citation.cfm?id=3107953">Programming Heterogeneous Systems from an Image Processing DSL</a>. Pu et al. TACO 2017</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('compression'); ?>">Lecture 6: Lossy Image (JPG) and Video (H.264) Compression</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
      <li><span class="bold_text">There is no required reading for this lecture.</span></li>
     </ul>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/wiegand03_h264.pdf" target="_blank">Overview of the H.264/AVC Video Coding Standard</a></li>
     <li><a href="https://arxiv.org/pdf/1712.05087.pdf">Learning Binary Residual Representations for Domain-specific Video Streaming</a>. Tsai et al. AAAI 18</li>
     <li><a href="https://arxiv.org/abs/1705.05823">Real-Time Adaptive Image Compression</a>. Rippel and Bourdev. 2017</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('lightfield_vr'); ?>">Lecture 7:
     The Light Field and Capture for VR</a></div>

     <div class="book_lecture_indent">

     <div>Further reading on the light field:</div>
     <ul>
     <li><a href="https://graphics.stanford.edu/papers/light/" target="_blank">Light Field Rendering</a>. Levoy and Hanrahan SIGGRAPH 1996</li>
     <li><a href="https://dl.acm.org/citation.cfm?id=237200" target="_blank">The Lumigraph</a>. Gortler et al. SIGGRAPH 1996</li>
     <li><a href="http://persci.mit.edu/pub_pdfs/plenoptic.pdf" target="_blank">Single Lens Stereo with a Plenoptic Camera</a>. E. Adelseon and J. Wang. Transactions on Pattern Analysis and Machine Intelligence, 1992</li>
     <li><a href="http://graphics.stanford.edu/papers/lfcamera/" target="_blank">Light-Field Photography with a Hand-Held Plenoptic Camera</a>. Ng et al. Stanford Technical Report, 2005</li>
     <li><a href="https://cdn.lytro.com/renng-thesis.pdf" target="_blank">Digital Light Field Photography</a>. R. Ng. Stanford Ph.D. Dissertation, 2006 (see chapters 1-4)</li>
     </ul>
     <div>Further reading on VR content acquisition:</div>
     <ul>
     <li><a href="https://research.google.com/pubs/pub45617.html" target="_blank">Jump: Virtual Reality Video</a>, Andersen et al. SIGGRAPH Asia 2016 (<a href="https://vr.google.com/jump/" target="_blank">Jump website</a>)</li>
          <li><a href="http://visual.cs.ucl.ac.uk/pubs/casual3d/" target="_blank">Casual 3D Photography</a>, Hedman et al. SIGGRAPH Asia 2017</li>
	  <li><a href="http://visual.cs.ucl.ac.uk/pubs/instant3d/" target="_blank">Instant 3D Photography</a>. Hedman and Kopf. SIGGRAPH 2018 
          <li><a href="https://facebook360.fb.com/facebook-surround-360/" target="_blank">Facebook Surround 360 page</a></li>          
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnneval'); ?>">Lecture 8: Efficient DNN Evaluation for Image Analysis</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
       <li><a href="https://arxiv.org/abs/1409.4842" target="_blank">Going Deeper with Convolutions</a>, Szegedy et al. CVPR 2015 (the Inception paper).  You may also enjoy reading this useful <a href="https://towardsdatascience.com/a-simple-guide-to-the-versions-of-the-inception-network-7fc52b863202">blog post</a> about versions of the Inception network.</li>
       <li><a href="https://arxiv.org/abs/1704.04861" target="_blank">MobileNets: Efficient Convolutional Neural Networks for Mobile Vision Applications</a>. Howard et al. 2017</li>
     </ul>
       
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://cs231n.stanford.edu" target="_blank">Stanford cs231: Convolutional Neural Networks for Visual Recognition</a>. If you haven't taken CS231N, I recommend that you read through the lecture notes of modules 1 and 2 for very nice explanation of key topics.</li>
     <li><a href="https://towardsdatascience.com/types-of-convolutions-in-deep-learning-717013397f4d" target="_blank">An Introduction to different Types of Convolutions in Deep Learning</a>. by Paul-Louis Pr&ouml;ve (a nice little tutorial)</li>
     <li><a href="http://neuralnetworksanddeeplearning.com" target="_blank">Neural Networks and Deep Learning</a>, Nielson, 2016 (a free online book)</li>
     <li><a href="https://arxiv.org/abs/1512.03385" target="_blank">Deep Residual Learning for Image Recognition</a>. K. He et al. CVPR 2016 (the ResNet paper)</li>
     <li><a href="https://arxiv.org/pdf/1311.2901v1.pdf" target="_blank">Visualizing and Understanding Convolutional Neural Networks</a>, Zeiler and Fergus, ECCV14</li>
     <li><a href="https://research.fb.com/announcing-tensor-comprehensions/">Facebook Tensor Comprehensions</a> (Arxiv paper is <a href="https://arxiv.org/abs/1802.04730">here</a>)</li>
     <li><a href="https://arxiv.org/pdf/1510.00149v5.pdf">Deep Compression: Compressing Deep Neural Networks with Pruning, Trained Quantization and Huffman Coding</a>. Han et al. ICLR 2016</li>
     <li><a href="https://arxiv.org/abs/1712.00559">Progressive Neural Architecture Search</a>. Liu et al. ECCV 2018</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnntrain'); ?>">Lecture 9: Parallel DNN Training</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
 
     <ul>
<li><a href="https://arxiv.org/abs/1706.02677" target="_blank">Accurate, Large Minibatch SGD: Training ImageNet in 1 Hour</a>. Goyal et al. 2017</li>
</ul>

     <div>Further Reading: </div>
     <ul>
     <li><a href="https://arxiv.org/abs/1709.05011" target="_blank">ImageNet Training in Minutes</a>. You et al. 2018</li>
     <li><a href="https://www.cs.cmu.edu/~muli/file/parameter_server_osdi14.pdf" target="_blank">Scaling Distributed Machine Learning with the Parameter Server</a>, Li et al. OSDI 2014</li>
     <li><a href="https://arxiv.org/abs/1712.01887">Deep Gradient Compression</a>. Lin et al. ICLR 2018</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnnhw'); ?>">Lecture 10: Hardware Accelerators for Deep Neural Network Evaluation</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
       <li><a href="https://arxiv.org/abs/1704.04760" target="_blank">In-Datacenter Performance Analysis of a Tensor Processing Unit</a>. Jouppi et al. ISCA 2017</li>
     </ul>
       
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://arxiv.org/abs/1708.04485" target="_blank">SCNN: An Accelerator for Compressed-sparse Convolutional Neural Networks</a>. Parashar et al. ISCA 2017</li>
     <li><a href="https://arxiv.org/abs/1602.01528" target="_blank">EIE: Efficient Inference Engine on Compressed Deep Neural Network</a>, Han et al. ISCA 2016</li>
     <li><a href="https://arxiv.org/abs/1602.08124" target="_blank">vDNN: Virtualized Deep Neural Networks for Scalable, Memory-Efficient Neural Network Design</a>, Rhu et al. MICRO 2016</li> 
     <li><a href="http://eyeriss.mit.edu/" target="_blank">Eyeriss: A Spatial Architecture for Energy-Efficient Dataflow for Convolutional Neural Network</a>, Chen et al. ISCA 2016</li>
     </ul>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnnstructure'); ?>">Lecture 11: Imposing Structure on DNN Topologies</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://cs.stanford.edu/people/jcjohns/iep/" target="_blank">Inferring and Executing Programs for Visual Reasoning</a>. J. Johnson et al. ICCV 2017</li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://cs.stanford.edu/people/jcjohns/clevr/" target="_blank">CLEVR: A Diagnostic Dataset for
     Compositional Language and Elementary Visual Reasoning</a>. J. Johnson et al. CVPR 2017</li>
<li><a href="https://arxiv.org/abs/1511.02799" target="_blank">Neural Module Networks</a>, Andreas et al. CVPR 2016</li>
     <li><a href="https://rmullapudi.bitbucket.io/data/hydranet_cvpr_final.pdf">HydraNets: Specialized Dynamic Architectures for Efficient Inference</a>. Mullapudi et al. CVPR 2018</li>
     <li><a href="https://groups.csail.mit.edu/graphics/hdrnet/" target="_blank">Deep Bilateral Learning
for Real-Time Image Enhancement</a>. Gharni et al. SIGGRAPH 2017</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnnvideo'); ?>">Lecture 12: Efficient Inference on Video Streams</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://arxiv.org/abs/1703.02529" target="_blank">NoScope: Optimizing Neural Network Queries over Video at Scale</a>. D. Kang et al. 2017</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
       <li><a href="https://www.usenix.org/conference/atc18/presentation/jiang" target="_blank">Mainstream: Dynamic Stem-Sharing for Multi-Tenant Video Processing</a>. Jiang et al. USENIX 2018</li>
       <li><a href="https://arxiv.org/abs/1611.07715" target="_blank">Deep Feature Flow for Video Recognition</a>. Zhu et al. CVPR 2017</li>
       <li><a href="https://arxiv.org/abs/1608.03609" target="_blank">Clockwork Convnets for Video Semantic Segmentation</a>. E. Shelhamer et al. 2016</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('cloudvideo'); ?>">Lecture 13: Video Processing at Cloud Scale</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/papers/scanner/scanner_sig18.pdf" target="_blank">Scanner: Efficient Video Analysis at Scale</a>. Poms et al. SIGGRAPH 2018 (<a href="https://github.com/scanner-research/scanner">Github code here</a>)</li>
     </ul>


     <div>Further Reading:</div>
     <ul>
       <li><a href="https://research.fb.com/wp-content/uploads/2017/10/sosp-226-cameraready.pdf" target="_blank">SVE: Distributed Video Processing at Facebook Scale</a>. Huang et al. SOSP 2017</li>
       <li><a href="http://people.cs.uchicago.edu/~junchenj/docs/Chameleon_SIGCOMM_CameraReady.pdf" target="_blank">Chameleon: Scalable Adaptation of Video Analytics</a>. Jiang et al. SIGCOMM 2018</li>
       <li><a href="https://www.usenix.org/system/files/conference/nsdi17/nsdi17-fouladi.pdf" target="_blank">Encoding, Fast and Slow: Low-Latency Video Processing Using Thousands of Tiny Threads</a>. Fouladi et al. NSDI 2017</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('gfxpipeline'); ?>">Lecture 14: Real-Time 3D Graphics Pipeline Architecture
     </a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><div class="bold_text" style="padding-bottom: 10px;">Please read the Fouladi et al. paper listed under the recommended readings from last class.</div></li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://engineering.riotgames.com/news/trip-down-lol-graphics-pipeline" target="_blank">A Trip Down the LOL Graphics Pipeline</a>. A nice introductory blog post for Riot Games that illustrates all the different rendering passes used to construct a League of Legends scene.  Note how each of these passes draws geometry under different graphics pipeline state configurations.</li>
    <li><a href="https://fgiesen.wordpress.com/2011/07/09/a-trip-through-the-graphics-pipeline-2011-index/" target="_blank">A Trip Down the Graphics Pipeline</a>. A much more detailed blog post by Fabian Giesen describing the Direct3D 10-class pipeline</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/design_opengl.pdf" target="_blank">The Design of the OpenGL Graphics Interface</a>. by M. Segal and K. Akeley. [unpublished 1994]</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/blythe06_d3d10.pdf" target="_blank">The Direct3D 10 System</a> by D. Blythe. SIGGRAPH 2006</li>
     </ul>
     </div>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('gfxmemory'); ?>">Lecture 15: Data Access in the Graphics Pipeline (Efficient Texture Mapping and Depth Buffering)
     </a></div>


     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/williams83_mipmap.pdf" target="_blank">Pyramidal Parametrics</a>. L. Williams, Computer Graphics 1983</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/peachey90_texthrift.pdf" target="_blank">Texture on Demand</a>. D. Peachy. Pixar Technical Memory #217. 1990</li>
<li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/hakura97_texcaching.pdf" target="_blank">The Design and Analysis of a Cache Architecture for Texture Mapping</a>. Z. S. Hakura and Anoop Gupta, ISCA 1997</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/igehy98_texprefetching.pdf" target="_blank">Prefetching in a Texture Cache Architecture</a>. H. Igehy et al. Graphics Hardware 1998<br/></li>
     <li><a href="http://faculty.cs.tamu.edu/schaefer/research/cardinality.pdf" target="_blank">Cardinality-Constrained Texture Filtering</a>. J. Manson and S. Schaefer. SIGGRAPH 2013.</li>
<li><a href="http://faculty.cs.tamu.edu/schaefer/research/ParamAwareMIP.pdf" target="_blank">Parameterization-Aware MIP-Mapping</a>. J. Manson and S. Schaefer. Computer Graphics Forum. 2012.</li>
     </ul>

     <div>Further Reading on Texture Compression:</div>
     <ul>
     <li><a href="http://web.onetel.net.uk/~simonnihal/assorted3d/fenney03texcomp.pdf" target="_blank">Texture Compression using Low-Frequency Signal Modulation</a>. S. Fenney. Graphics Hardware 2003</li>
     <li><a href="http://fileadmin.cs.lth.se/graphics/research/papers/ipackman2005/"  target="_blank">iPACKMAN: High-Quality, Low-Complexity Texture Compression for Mobile Phones</a>. J. Str&ouml;m and T. Akenine-M&ouml;ller. Graphics Hardware 2005</li>
     <li><a href="http://www.jacobstrom.com/publications/StromPetterssonGH07.pdf"  target="_blank">ETC2: Texture Compression using Invalid Combinations</a>. J. Str&ouml;m and M. Pettersson. Graphics Hardware 2007</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/nystad12_astc.pdf"  target="_blank">Adaptive Scalable Texture Compression</a>. T. Olson et al. High Performance Graphics 2012</li>
<li><a href="http://msdn.microsoft.com/en-us/library/windows/desktop/bb694531(v=vs.85).aspx" target="_blank">Block Compression in Direct3D 10</a>. MSDN Developer Reference. 2013</li>
     </ul>

     <div>Further Reading on Depth Compression:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/hasselgren06_zcompression.pdf" target="_blank">Efficient Depth Buffer Compression</a>. J. Hasselgren and T. Akenine M&ouml;ller. </li>
     <li><a href="http://software.intel.com/sites/default/files/article/392311/stochastic-depth-buffer-compression-using-generalized-plane-encoding.pdf" target="_blank">Stochastic Depth Buffer Compression using Generalized Plane Encoding</a>. M. Andersson et al. Computer Graphics Forum 2013</li>     
     </ul>
</div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('schedulinggfx');?>">Lecture 16: Scheduling the Graphics Pipeline on a GPU</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/eldridge00_pomegranate.pdf" target="_blank">Pomegranate: A Fully Scalable Graphics Architecture</a>. M. Eldridge et al. SIGGRAPH 2000</li>
     <li><a href="https://developer.nvidia.com/content/life-triangle-nvidias-logical-pipeline" target="_blank">Life of a Triangle - NVIDIA's Logical Pipeline</a>. C. Kubisch (NVIDIA GameWorks Blog, 2015)
     <li><a href="http://attila.ac.upc.edu/wiki/images/d/db/HPG10_Hot3D_Fermi.pdf" target="_blank">Fast Tessellated Rendering on Fermi GF100</a>. T. Purcell (High Performance Graphics Hot3D talk)</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/molnar94_sorting.pdf" target="_blank">A Sorting Classification of Parallel Rendering</a>. S. Molnar et al. IEEE Computer Graphics and Applications, 1994.</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <span class="bold_text">Lecture 17: Domain-Specific Languages for Shading</span></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>

     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/hanrahan90_rsl.pdf" target="_blank">A Language for Shading and Lighting Calculations</a>. P. Hanrahan and J. Lawson. SIGGRAPH 1990</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/mark03_cg.pdf" target="_blank">Cg: A System for Programming Graphics Hardware in a C-like Language</a>. W. R. Mark et al. SIGGRAPH 2003</li>

     </ul>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://graphics.cs.cmu.edu/projects/slang/" target="_blank">Slang: Language Mechanisms for Extensible Real-time Shading Systems</a>. Y. He, K. Fatahalian, T. Foley. SIGGRAPH 2018</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/shadercomp/" target="_blank">Shader Components: Modular and High Performance Shader Development</a>. Y. He et al. SIGGRAPH 2017</li>
     <li><a href="http://graphics.stanford.edu/projects/shading/pubs/sig2001/" target="_blank">A Real-Time Procedural Shading System for
Programmable Graphics Hardware</a>. K. Proudfoot et al. SIGGRAPH 2001</li>
     <li><a href="http://graphics.pixar.com/library/ShadeTrees/paper.pdf" target="_blank">Shade Trees</a>. R. Cook. SIGGRAPH 1984</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=325247" target="_blank">An Image Synthesizer</a>. K. Perlin. SIGGRAPH 1985</li>	

     </ul>
     </div>
</div>



<p>&nbsp;</p>

</div>


