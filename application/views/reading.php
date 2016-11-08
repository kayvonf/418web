
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


