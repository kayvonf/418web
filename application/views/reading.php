
<div class="home_container">

<div class="home_title">VISUAL COMPUTING SYSTEMS</div>

<p>This page contains lecture slides and recommended readings for the Fall 2016 offering of 15-769.</p>

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

<p>I'd like you to read the whitepaper, focusing on the description of
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
     <li><a href="http://www.cs.cmu.edu/~kayvonf/papers/mobilevc_ieee16.pdf" target="_blank">The Rise of Mobile Visual Computing Systems</a>, Fatahalian, IEEE Mobile Computing 2016</li>
     <li><a href="http://www.frankmcsherry.org/assets/COST.pdf">Scalability! But at What COST?</a>, McSherry, Isard, and Murray. HotOS 2015 (The arguments in this paper are very consistent with the way we think about performance in the visual computing domain.)</li>
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
     <li>The Stanford CS448A <a href="http://graphics.stanford.edu/courses/cs448a-10/" target="_blank">course notes</a> are a very good reference for camera image processing pipeline algorithms and issues.</li>
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
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/adams10_fcam.pdf" target="_blank">The Frankencamera: An Experimental Platform for Computational Photography</a>, Adams et al. SIGGRAPH 2010</li>
     <li><a href="http://www.hdrplusdata.org/hdrplus_preprint.pdf">Burst Photography for High Dynamic Range and Low-light Imaging
     on Mobile Cameras</a>, Hasinoff et al. SIGGRAPH Asia 2016</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('halidefcam'); ?>">Lecture 4:
     Productive, High-Performance Image Processing Using Halide</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://people.csail.mit.edu/jrk/jrkthesis.pdf" target="_blank">Decoupling Algorithms from the Organization of Computation for High Performance Image Processing</a> (please read Chapters 1, 4, 5, and 6.1), Ragan-Kelley (MIT Ph.D. thesis, 2014)</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/halidesched/" target="_blank">Automatically Scheduling Halide Image Processing Pipelines</a>, Mullapudi et al. SIGGRAPH 2016</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://halide-lang.org/" target="_blank">Halide Language Website</a> (contains documentation and many tutorials)</li>
     <li><a href="http://www.connellybarnes.com/work/publications/2016_image_perforation.pdf" target="_blank">Image Perforation: Automatically Accelerating Image Pipelines by Intelligently Skipping Samples</a>, Lou et al. Transactions on Graphics 2016</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('imageprocessing'); ?>">Lecture 5:
     Image Processing Algorithm Grab Bag</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://dl.acm.org/citation.cfm?id=1141918" target="_blank">Fast Median and Bilateral Filtering</a>, Weiss. SIGGRAPH 2006</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=1069066" target="_blank">A Non-Local Algorithm for Image Denoising</a>, Buades et al. CVPR 2005</li>
     <li><a href="http://people.csail.mit.edu/sparis/bf_course/" target="_blank">A Gentle Introduction to Bilateral Filtering and its Applications</a>, Paris et al. SIGGRAPH 2008 Course Notes</li>
     <li><a href="http://people.csail.mit.edu/sparis/bf/" target="_blank">Sylvain Paris' Fast Bilateral Filter</a> page</li>
     <li><a href="http://people.csail.mit.edu/sparis/publi/2006/tr/Paris_06_Fast_Bilateral_Filter_MIT_TR.pdf" target="_blank">A Fast Approximation of the Bilateral Filter using a Signal Processing Approach</a>, Paris and Durand. MIT technical report 2006 (extends their ECCV 2006 paper)</li>
     <li><a href="http://www.ri.cmu.edu/pub_files/pub3/lucas_bruce_d_1981_2/lucas_bruce_d_1981_2.pdf" target="_blank">An Iterative Image Registration Technique with an Application to Stereo Vision</a>, Lucas and Kanade. IJCAI 1981</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/baker04_lucaskanade.pdf" target="_blank">Lucas-Kanade 20 Years On: A Unifying Framework</a>, Baker and Matthews. ICCV 2004</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('imagehardware'); ?>">Lecture 6:
     Specializing Hardware for Image Processing</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/papers/rigel/" target="_blank">Rigel: Flexible Multi-Rate Image Processing Hardware</a>, Hegarty et al. SIGGRAPH 2016. (You can learn more about Rigel on its <a href="https://github.com/jameshegarty/rigel" target="_blank">Github project page</a>. I would be interested in a student attempting to try out Rigel in a course project.)</li>
     <li><a href="http://graphics.stanford.edu/papers/darkroom14/" target="_blank">Darkroom: Compiling High-Level Image Processing Code into Hardware Pipelines</a>, Hegarty et al. SIGGRAPH 2014</li>
     <li><a href="http://csl.stanford.edu/~christos/publications/2010.efficiency.isca.pdf" target="_blank">Understanding Sources of Inefficiency in General-Purpose Chips</a>, Hameed et al. ISCA 2010</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('videocompression'); ?>">Lecture 7: H.264 Video Compression</a></div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/wiegand03_h264.pdf" target="_blank">Overview of the H.264/AVC Video Coding Standard</a></li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnneval'); ?>">Lecture 8: Basics of DNN Evaluation</a></div>

     <div class="book_lecture_indent">

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://cs231n.stanford.edu" target="_blank">Stanford cs231: Convolutional Neural Networks for Visual Recognition</a>. I recommend that you read through the lecture notes for modules 1 and 2 for very nice explanation of key topics.</li>     
     <li><a href="http://neuralnetworksanddeeplearning.com" target="_blank">Neural Networks and Deep Learning</a>, Nielson, 2016 (a free online book)</li> 
     <li>Check out the <a href="https://www.tensorflow.org/" target="_blank">TensorFlow</a> tutorials and play around in the <a href="http://playground.tensorflow.org" target="_blank">TensorFlow Playground</a></li>
     <li><a href="https://arxiv.org/pdf/1311.2901v1.pdf" target="_blank">Visualizing and Understanding Convolutional Neural Networks</a>, Zeiler and Fergus, ECCV14</li>
     <li><a href="https://papers.nips.cc/paper/4824-imagenet-classification-with-deep-convolutional-neural-networks.pdf" target="_blank">ImageNet Classification with Deep Convolutional Neural Networks</a>. Krizhevsky et al. NIPS 2012 (this is the original "AlexNet" paper)</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnntraining'); ?>">Lecture 9:
     Parallel DNN Training</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>

     <div class="instructions">Now that we've covered the basics of
     what a DNN is, and discussed the basics of forward evaluation and
     training workloads, we'll take a look at more recent DNN
     topologies that are designed to be evaluated/trained more
     efficiently and/or yield higher accuracy.
     </div>
   
     <ul>
     <li><a href="https://arxiv.org/abs/1409.4842" target="_blank">Going Deeper with Convolutions</a>, Szegedy et al. CVPR 2015</li>
     <li><a href="https://arxiv.org/abs/1602.07360" target="_blank">SqueezeNet: AlexNet-level accuracy with 50x fewer parameters and &lt;0.5MB model size</a>, Iandola et al. 2016</li>
     </ul>

     <div>Further Reading: </div>
     <ul>
     <li><a href="https://www.cs.cmu.edu/~muli/file/parameter_server_osdi14.pdf" target="_blank">Scaling Distributed Machine Learning with the Parameter Server</a>, Li et al. OSDI 2014</li>
     <li><a href="https://www.usenix.org/system/files/conference/osdi14/osdi14-paper-chilimbi.pdf" target="_blank">Project Adam: Building an Efficient and Scalable Deep Learning Training System</a>, Chilimbi et al. OSDI 2014</li>
     <li><a href="https://arxiv.org/abs/1511.00175" target="_blank">FireCaffe: Near-linear Acceleration of Deep Neural Network Training on Compute Clusters</a>, Iandola et al. CVPR 2016</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('detectioncasestudy'); ?>">Lecture 10: Optimizing Object Detection: R-CNN, Fast R-CNN, Faster R-CNN</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://people.eecs.berkeley.edu/~rbg/papers/r-cnn-cvpr.pdf" target="_blank">Rich Feature Hierarchies for Accurate Object Detection and Semantic Segmentation</a>, Girshick et al. CVPR 2014 (the R-CNN paper)</li>
     <li><a href="http://arxiv.org/pdf/1504.08083.pdf" target="_blank">Fast R-CNN</a>, Girshick, ICCV 2015</li>
     <li><a href="http://arxiv.org/pdf/1506.01497.pdf" target="_blank">Faster R-CNN: Towards Real-Time Object Detection with Region Proposal Networks</a>, Ren et al. NIPS 2015</li>
     <li><a href="https://arxiv.org/abs/1512.03385" target="_blank">Deep Residual Learning for Image Recognition</a>, He et al. CVPR 2016 (this is the ResNet paper)</li>
     <li><a href="https://arxiv.org/pdf/1409.1556.pdf" target="_blank">Very Deep Convolutional Networks for Large-Scale Image Recognition</a>, Simonyan and A. Zisserman, ICLR 2015 (this is the VGG paper)</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnnapprox'); ?>">Lecture 11: Efficient DNN Evaluation via Approximation</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://arxiv.org/pdf/1510.00149.pdf" target="_blank">Deep Compression: Compressing Deep Neural Networks with Pruning, Trained Quantization and Huffman Coding</a>, Han et al. ICLR 2016</li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://arxiv.org/pdf/1506.02626.pdf" target="_blank">Learning both Weights and Connections for Efficient Neural Networks</a>, Han et al. NIPS 2015</li>
     <li><a href="https://arxiv.org/abs/1602.01528" target="_blank">EIE: Efficient Inference Engine on Compressed Deep Neural Network</a>, Han et al. ISCA 2016</li>
     <li><a href="https://arxiv.org/abs/1608.03609" target="_blank">Clockwork Convnets for Video Semantic Segmentation</a>, Shelhamer et al. ECCV16</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('dnnstructure'); ?>">Lecture 12:
     Imposing Structure on DNN Topologies</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://arxiv.org/abs/1511.06085" target="_blank">Variable Rate Image Compression with Recurrent Neural Networks</a>, Toderici et al. ICLR 2016</li>
     <li><a href="https://arxiv.org/abs/1608.05148v1" target="_blank">Full Resolution Image Compression with Recurrent Neural Networks</a>, Toderici et al. 2016</li>
     <li><a href="https://arxiv.org/abs/1604.03539" target="_blank">Cross-stitch Networks for Multi-task Learning</a>, Misra et al. CVPR 2016</li>
     <li><a href="https://arxiv.org/abs/1506.02025" target="_blank">Spatial Transformer Networks</a>, Jaderberg et al. NIPS 2015</li>
     <li><a href="https://arxiv.org/abs/1602.00134" target="_blank">Convolutional Pose Machines</a>, Wei et al. CVPR 2016</li>
     <li><a href="https://arxiv.org/abs/1511.02799" target="_blank">Neural Module Networks</a>, Andreas et al. CVPR 2016</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <span class="bold_text">Lecture 13: Hardware Accelerators for Deep Neural Network Evaluation</span></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There are no
     lecture slides from this lecture. The students led an in-class
     discussion about the nine papers listed below.</div>
     
     <div>Required Reading:</div>
     <ul>
     <li><a href="http://dl.acm.org/citation.cfm?id=3001179" target="_blank">Cambricon: an instruction set architecture for neural networks</a>, Liu et al. ISCA 2016</li>
     <li><a href="https://arxiv.org/abs/1602.01528" target="_blank">EIE: Efficient Inference Engine on Compressed Deep Neural Network</a>, Han et al. ISCA 2016</li>
     <li><a href="http://www.ece.ubc.ca/~aamodt/papers/Cnvlutin.ISCA2016.pdf" target="_blank">Cnvlutin: Ineffectual-Neuron-Free Deep Neural Network Computing</a>, Albericio et al. ISCA 2016</li>
<li><a href="http://vlsiarch.eecs.harvard.edu/wp-content/uploads/2016/05/reagen_isca16.pdf" target="_blank">Minerva: Enabling Low-Power, Highly-Accurate Deep Neural Network Accelerators</a>, Reagen et al. ISCA 2016</li>
     <li><a href="https://arxiv.org/abs/1602.08124" target="_blank">vDNN: Virtualized Deep Neural Networks for Scalable, Memory-Efficient Neural Network Design</a>, Rhu et al. MICRO 2016</li> 
     <li><a href="http://compas.cs.stonybrook.edu/~mferdman/downloads.php/MICRO16_Fused_Layer_CNN_Accelerators.pdf" target="_blank">Fused-Layer CNN Architectures</a>, Alwani et al. MICRO 2016</li>
     <li><a href="http://eyeriss.mit.edu/" target="_blank">Eyeriss: A Spatial Architecture for Energy-Efficient Dataflow for Convolutional Neural Network</a>, Chen et al. ISCA 2016</li>
     <li><a href="https://seal.ece.ucsb.edu/sites/seal.ece.ucsb.edu/files/publications/prime_isca_2016.pdf" target="_blank">PRIME: A Novel Processing-in-memory Architecture for Neural Network Computation in ReRAM-based Main Memory</a>, Chi et al. ISCA 2016</li>
     <li><a href="http://www.cc.gatech.edu/~hadi/doc/paper/2016-cogarch-dnn_weaver.pdf" target="_blank">DNNWEAVER: From High-Level Deep Network Models to FPGA Acceleration</a>, Sharma et al. MICRO 2016</li>
     </ul>
</div>


<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('3dreconstruction'); ?>">Lectures 14-15: Large-Scale 3D Reconstruction + Image Retrieval</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://phototour.cs.washington.edu/ModelingTheWorld_ijcv07.pdf" target="_blank">Modeling the World from Internet Photo Collections</a>. N. Snavely et al. IJCV 2007</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/snavely06_phototourism.pdf" target="_blank"> Photo Tourism: Exploring Photo Collections in 3D</a>. N. Snavely et al. SIGGRAPH 2006</li> 
     <li><a href="http://grail.cs.washington.edu/rome/" target="_blank">Building Rome in a Day</a>. S. Agarwal et al. ICCV 2009</li>
     <li><a href="http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.174.8828" target="_blank">Building Rome on a Cloudless Day</a>. J. Frahm et al. ECCV 10</li>
     <li><a href="http://www.cs.cornell.edu/~snavely/projects/skeletalset/" target="_blank">Skeletal Graphs for Efficient Structure from Motion</a>. N. Snavely et al. CVPR 2008</li>
     <li><a href="http://www.cs.unc.edu/~jheinly/reconstructing_the_world.html" target="_blank">Reconstructing the World in Six Days</a>, Heinly et al. CVPR 2015</li>
     </ul>
     <ul>
     <li><a href="http://www.cs.toronto.edu/~fritz/absps/esann-deep-final.pdf" target="_blank">Using Very Deep Autoencoders for Content-Based Image Retrieval</a>, by Krizhevsky and Hinton</li>
     <li><a href="http://www.cs.cornell.edu/projects/p2f/" target="_blank">Location Recognition using Prioritized Feature Matching</a>, Li et al. ECCV10</li>
     <li><a href="http://www.cs.ubc.ca/research/flann/uploads/FLANN/flann_visapp09.pdf" target="_blank">Fast Approximate Nearest Neighbors with Automatic Algorithm Configuration</a>, Muja and Lowe</li>
     <li><a href="http://arxiv.org/abs/1604.01325" target="_blank">Deep Image Retrieval: Learning Global Representations for Image Search</a>, Gordo et al. ECCV 2016</li>
     <li><a href="http://www.cs.toronto.edu/~norouzi/research/papers/multi_index_hashing.pdf" target="_blank">Fast Search in Hamming Space with Multi-Index Hashing</a>, Norouzi et al.</li>
     <li><a href="http://www.cs.cmu.edu/~./iyu/files/p_icmr15_speed.pdf" target="_blank">Content-Based Video Search over 1 Million Videos with 1 Core in 1 Second</a>, Yu et al. ICMR 2015</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('realtime3d'); ?>">Lecture 16:
     Real-Time Dense 3D Reconstruction from RGBD Data</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://optlang.org/" target="_blank">Opt: A Domain Specific Language for Non-linear Least Squares Optimization in Graphics and Imaging</a>, DeVito et al. 2016</li>
     </ul>

     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://www.microsoft.com/en-us/research/wp-content/uploads/2016/02/ismar2011.pdf" target="_blank">KinectFusion: Real-Time Dense Surface Mapping and Tracking</a>, Newcombe et al. ISMAR 2011</li>
     <li><a href="http://graphics.stanford.edu/~niessner/niessner2013hashing.html" target="_blank">Real-time 3D Reconstruction at Scale using Voxel Hashing</a>, Nie&#223;ner et al., TOG 2013</li>
     <li><a href="http://graphics.stanford.edu/projects/bundlefusion/" target="_blank">BundleFusion: Real-time Globally Consistent 3D Reconstruction using Online Surface Re-integration</a>, Dai et al. 2016</li>
     <li><a href="http://grail.cs.washington.edu/projects/dynamicfusion/" target="_blank">DynamicFusion: Reconstruction and Tracking of Non-rigid Scenes in Real-Time</a>, Newcombe et al. CVPR 2015 (extending KinectFusion ideas to moving scenes)</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('gfxpipeline'); ?>">Lecture 17: Real-Time 3D Graphics Pipeline Architecture
     </a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/design_opengl.pdf" target="_blank">The Design of the OpenGL Graphics Interface</a>. by M. Segal and K. Akeley. [unpublished 1994]</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/blythe06_d3d10.pdf" target="_blank">The Direct3D 10 System</a> by D. Blythe. SIGGRAPH 2006</li>     
<li><a href="http://www.realtimerendering.com/" target="_blank">Real-Time Rendering</a> (Third Edition, chapters 2 and 3), by T. Akenine-Moller, E. Haines, and N. Hoffman</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('visibility'); ?>">Lecture 18: Rasterization and Occlusion
     </a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/abrash09_lrbrast.pdf" target="_blank">Rasterization on Larrabee</a>. M. Abrash. Dr. Dobbs Portal, May 1, 2009 (original article is available online <a href="http://drdobbs.com/high-performance-computing/217200602">here</a>)</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/olano97_homogeneous.pdf" target="_blank">Triangle Scan Conversation Using 2D Homogeneous Coordinates</a>. M. Olano and T. Greer. Graphics Hardware 1997</li>
     <li><a href="http://research.nvidia.com/publication/high-performance-software-rasterization-gpus" target="_blank">High-Performance Software Rasterization on GPUs</a>. S. Laine et al. High Performance Graphics 2011. (source code is available on the paper page)</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/greene93_hierarchicalz.pdf" target="_blank">Hierarchical Z-Buffer Visibility</a>. N. Greene et al. SIGGRAPH 1993</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/hasselgren06_zcompression.pdf" target="_blank">Efficient Depth Buffer Compression</a>. J. Hasselgren and T. Akenine M&ouml;ller. </li>
<li><a href="http://software.intel.com/sites/default/files/article/392311/stochastic-depth-buffer-compression-using-generalized-plane-encoding.pdf" target="_blank">Stochastic Depth Buffer Compression using Generalized Plane Encoding</a>. M. Andersson et al. Computer Graphics Forum 2013</li>     
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/johnson05_irregularzbuf.pdf" target="_blank">The Irregular Z-Buffer: Hardware Acceleration for Irregular Data Structures</a>. G. Johnson et al.  Transactions on Graphics, 2005</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/fatahalian09_mprast.pdf" target="_blank">Data-Parallel Rasterization of Micropolygons with Defocus and Motion Blur</a>. K. Fatahalian et al. High Performance Graphics 2009</li>     
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/laine11_dualspace.pdf" target="_blank">Clipless Dual-Space Bounds for Faster Stochastic Rasterization</a>. S. Laine et al. SIGGRAPH 2011</li>     
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/heckbert91_persptex.pdf" target="_blank">Interpolation for Polygon Texture Mapping and Shading</a>. P. Heckbert and H. Moreton, State of the Art in Computer Graphics: Visualization and Modeling. 1991</li>

     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('texture'); ?>">Lecture 19: Texture Mapping Algorithms and Hardware
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
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('schedulinggfx'); ?>">Lecture 20: Scheduling the Graphics Pipeline on a GPU</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/eldridge00_pomegranate.pdf" target="_blank">Pomegranate: A Fully Scalable Graphics Architecture</a>. M. Eldridge et al. SIGGRAPH 2000</li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="https://developer.nvidia.com/content/life-triangle-nvidias-logical-pipeline" target="_blank">Life of a Triangle - NVIDIA's Logical Pipeline</a>. C. Kubisch (NVIDIA GameWorks Blog, 2015)
     <li><a href="http://attila.ac.upc.edu/wiki/images/d/db/HPG10_Hot3D_Fermi.pdf" target="_blank">Fast Tessellated Rendering on Fermi GF100</a>. T. Purcell (High Performance Graphics Hot3D talk)</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/molnar94_sorting.pdf" target="_blank">A Sorting Classification of Parallel Rendering</a>. S. Molnar et al. IEEE Computer Graphics and Applications, 1994.</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('deferred'); ?>">Lecture 21: Deferred Shading</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs/academic/class/15869-f11/www/readings/reshetov09_mlaa.pdf" target="_blank">Morphological Anti-Aliasing</a>. A. Reshetov. High Performance Graphics 2009</li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
<li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/clarberg13_deferred.pdf" target="_blank">A Sort-based Deferred Shading Architecture for Decoupled Sampling</a>. P. Clarberg. SIGGRAPH 2013</li>
     <li><a href="http://bps10.idav.ucdavis.edu/talks/12-lauritzen_DeferredShading_BPS_SIGGRAPH2010_Notes.pdf" target="_blank">Deferred Rendering for Current and Future Rendering Pipelines</a>. A. Lauritzen. SIGGRAPH Beyond Programmable Shading Course 2010</li>
<li><a href="http://bps12.idav.ucdavis.edu/talks/03_lauritzenIntersectingLights_bps2012.pdf" target="_blank">Intersecting Lights with Pixels: Reasoning about Forward and Deferred Rendering</a>. A. Lauritzen. SIGGRAPH Beyond Programmable Shading Course 2012</li>
     <li><a href="http://advances.realtimerendering.com/s2013/Tatarchuk-Destiny-SIGGRAPH2013.pdf" target="_blank">Mythic Science Fiction in Real-Time: The Destiny Rendering Engine</a>. Natalya Tatarchunk, Advances in Real-Time Rendering in Games, SIGGRAPH 2013 Course Notes</li>
     <li><a href="http://www.iryoku.com/smaa/" target="_blank">SMAA: Enhanced Subpixel Morphological Antialiasing</a>. J. Jimenez et al. Eurographics 2012</li>
     <li><a href="http://iryoku.com/aacourse/" target="_blank">Filtering Approaches for Real-Time Anti-Aliasing</a>. SIGGRAPH 2011 Course Notes</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('fastraytracing'); ?>">Lecture 22: High-Performance Ray Tracing</a></div>

     <div class="book_lecture_indent">

     <div class="bold_text" style="padding-bottom: 10px;">There is no required reading for this lecture.</div>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/aila09_gpu_rt.pdf" target="_blank">Understanding the Efficiency of Ray Traversal on GPUs</a>. T. Aila and S. Laine, High Performance Graphics 2009</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/aila10_incoherentrays.pdf" target="_blank">Architecture Considerations for Tracing Incoherent Rays</a>. T. Aila and T. Karras, High Performance Graphics 2010</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/laine13_megakernels.pdf" target="_blank">Megakernels Considered Harmful: Wavefront Path Tracing on GPUs</a>. S. Laine, T. Karras and T. Aila,  High Performance Graphics 2013</li>
      <li><a href="http://www.cs.utah.edu/~kshkurko/projects/HPG_13/HPG13_koptaEnergyBandwEfficientRTArch.pdf" target="_blank">An Energy and Bandwidth Efficient Ray Tracing Architecture</a>. D. Kopta et al. High Performance Graphics 2013</li>	
     <li><a href="https://research.nvidia.com/publication/fast-parallel-construction-high-quality-bounding-volume-hierarchies" target="_blank">Fast Parallel Construction of High-Quality Bounding Volume Hierarchies</a>. T. Karras et al. High Performance Graphics 2013</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/aac/" target="_blank">Efficient BVH Construction via Approximate Agglomerative Clustering</a>. Y. Gu et al. High Performance Graphics 2013</li>	
     <li><a href="http://pl887.pairlitesite.com/papers/hybrid-rt-2011.pdf" target="_blank">Combining Single and Packet Ray Tracing for Arbitrary Ray Distributions on the Intel MIC Architecture</a>. C. Benthin et al. IEEE Transactions on Visualization and Computer Graphics 2011</li>		
     <li><a href="http://web.yonsei.ac.kr/wjlee/document/sgrthpg2013.htm" target="_blank">SGRT: A Mobile GPU Architecture for Real-Time Ray Tracing</a>. W. Lee et al. High Performance Graphics 2013</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=2024194" target="_blank">T&I engine: traversal and intersection engine for hardware accelerated ray tracing</a>. J. Nah et al. SIGGRAPH Asia 2011</li>	
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/parker10_optix.pdf" target="_blank">OptiX: A General Purpose Ray Tracing Engine</a>. S. Parker et al. SIGGRAPH 2010</li>	
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/christensen07_cars.pdf" target="_blank">Ray Tracing for the Movie Cars</a>. P. Christensen. Symposium on Interactive Ray Tracing 2007</li>	
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/pharr97_coherent_rt.pdf" target="_blank">Rendering Complex Scenes With Memory-Coherent Ray Tracing</a>. M. Pharr et al. SIGGRAPH 1997</li>
<li><a href="http://www.pbrt.org" target="_blank">PBRT: Physically-Based Ray Tracing: From Theory to Implementation</a>, 2nd Edition. M. Pharr and G. Humphreys.</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('shadinglang'); ?>">Lecture 23: Shading Language Design</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/hanrahan90_rsl.pdf" target="_blank">A Language for Shading and Lighting Calculations</a>. P. Hanrahan and J. Lawson. SIGGRAPH 1990</li>
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/mark03_cg.pdf" target="_blank">Cg: A System for Programming Graphics Hardware in a C-like Language</a>. W. R. Mark et al. SIGGRAPH 2003</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
<li><a href="http://graphics.stanford.edu/papers/spark/" target="_blank">Spark: Modular, Composable Shaders for Graphics Hardware</a>. T. Foley and P. Hanrahan. SIGGRAPH 2011</li>
     <li><a href="http://graphics.cs.cmu.edu/projects/spire/" target="_blank">A System for Rapid Exploration of Shader Optimization Choices</a>. Y. He et al. SIGGRAPH 2016</li>
     <li><a href="http://graphics.stanford.edu/projects/shading/pubs/sig2001/" target="_blank">A Real-Time Procedural Shading System for
Programmable Graphics Hardware</a>. K. Proudfoot et al. SIGGRAPH 2001</li>
     <li><a href="http://graphics.pixar.com/library/ShadeTrees/paper.pdf" target="_blank">Shade Trees</a>. R. Cook. SIGGRAPH 1984</li>
     <li><a href="http://dl.acm.org/citation.cfm?id=325247" target="_blank">An Image Synthesizer</a>. K. Perlin. SIGGRAPH 1985</li>	
     <li><a href="http://www.cs.cmu.edu/afs/cs.cmu.edu/academic/class/15869-f11/www/readings/mccool02_sh.pdf" target="_blank">Shader Metaprogramming</a>. M. McCool et al. Graphics Hardware 2002</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <a href="<?php echo lecture_url('lizstnotes'); ?>">Lecture 24: DSLs for Physical Simulation</a></div>

     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://arxiv.org/abs/1506.07577" target="_blank">Ebb: A DSL for Physical Simulation on CPUs and GPUs</a>. G. Bernstein et al. TOG 2016 (also see the <a href="http://ebblang.org/" target="_blank">Ebb language page</a>)</li>
     </ul>
     
     <div>Further Reading:</div>
     <ul>
     <li><a href="http://graphics.stanford.edu/hackliszt/liszt_sc2011.pdf" target="_blank">Liszt: A Domain Specific Language for Building Portable Mesh-based PDE Solvers</a>. Z DeVito et al. Supercomputing 2011 (also see the <a href="http://graphics.stanford.edu/hackliszt/" target="_blank">Lizst language page</a>)</li>
     <li><a href="http://simit-lang.org/tog16" target="_blank">Simit: A Language for Physical Simulation</a>. F. Kjolstad et al. TOG 2016 (also see the <a href="http://simit-lang.org/" target="_blank">Simit language page</a>)</li>
     <li><a href="http://groups.csail.mit.edu/commit/papers/2016/why.pdf" target="_blank">Why New Programming Languages for Simulation?</a>. G. Bernstein and F. Kjolstad, TOG 2016</li>
     </ul>
     </div>
</div>

<div class="book_lecture">
     <div class="book_lecture_title">
     <span class="">Lecture 25: TensorFlow, XLA, and Emerging IRs for Machine Learning</span></div>

     <div class="bold_text" style="padding-bottom: 10px;">There are no
     lecture slides from this lecture. The students led an in-class
      discussion about the papers/links below..</div>
     
     <div class="book_lecture_indent">

     <div>Required Reading:</div>
     <ul>
     <li><a href="https://www.usenix.org/system/files/conference/osdi16/osdi16-abadi.pdf" target="_blank">TensorFlow: A System for Large-Scale Machine Learning</a>. M. Abadi et al. OSDI 2016</li>
     </ul>

     <div>Further Reading:</div>
     <ul>
     <li><a href="http://download.tensorflow.org/paper/whitepaper2015.pdf" target="_blank">TensorFlow: Large-Scale Machine Learning on Heterogeneous Distributed Systems</a>. M. Abadi et al. (TensorFlow whitepaper from 2015)</li>
     <li><a href="https://github.com/dmlc/nnvm" target="_blank">NNVM Documentation</a> (NxNet)</li>
     <li><a href="https://www.tensorflow.org/versions/master/resources/xla_prerelease.html" target="_blank">XLA Documentation</a> (Google)</li>
     <li><a href="https://www.nervanasys.com/intel-nervana-graph-preview-release/" target="_blank">Nervana Graph API Documentation</a></li>
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


