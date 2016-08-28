
<div class="home_container">

<div style="font-size: 12pt; padding: 10px 0px 0px 0px;" class="home_title">CMU 15-769</div>
<div style="padding-top: 0px; padding-bottom: 5px;" class="home_title">VISUAL COMPUTING SYSTEMS</div>

<div>
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/teaser.jpg'); ?>" width="800" height="\
125"></a>
</div>

<p style="padding-bottom: .15em">

Visual computing tasks such as 2D/3D graphics, image processing, and
image understanding are important responsibilities of modern computer
systems ranging from sensor-rich smart phones to large
datacenters. These workloads demand exceptional system efficiency and
this course examines the key ideas, techniques, and challenges
associated with the design of parallel (and heterogeneous) systems
that serve to accelerate visual computing applications. This course is
intended for graduate and advanced undergraduate-level students
interested in architecting efficient future graphics, image
processing, and computer vision platforms and for students seeking to
develop scalable algorithms for these platforms.  </p>

<p class="colored_text bold_text" style="font-size: 18pt;">
NOTE TO STUDENTS: THE FIRST DAY OF CLASS FOR 15-769 WILL BE WEDNESDAY, AUGUST 31.  SEE YOU THEN!!!!!
</p>

<p class="colored_text bold_text" style="font-size: 18pt;">
Please signup on <a href="http://www.piazza.com/cmu/fall2016/15769">Piazza</a>.
</p>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Mon/Wed 10:30-11:50am</div>
<div>GHC 4303</div>
<div>Instructor: <a href="http://www.cs.cmu.edu/~kayvonf">Kayvon Fatahalian</a></div>
<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on policies and logistics.</div>
</div>

<div class="overview_main_item overview_ruled_element">Fall 2016 Schedule</div>

<table>

<?php

function lecture_def($date, $title, $link, $fmt='', $extras=array()) {
    return array('date' => $date,
                 'title' => $title,
                 'link' => $link,
                 'format' => $fmt,
                 'deadlines' => $extras);
}

/*
 * ======================================================================
 * =========== BEGIN LECTURES ARRAY =====================================
 * ======================================================================
 * 
 * Make a list of lectures here:
 *
 * Format of lecture_def() is:
 *     - Date of lecture (as a string)
 *     - Lecture Name
 *     - Url for lecture (If the lecture has been given, this is link to lecture summary page, else it's just '')
 *     - optional formatting options (only 'bold' is supported)
 *     - Array of sublines (often used for due dates)
 *
 * Here are some examples:
 * 
 * A lecture with a url:
 *    lecture_def('Jan 12', 'Why Parallelism?', lecture_url('whyparallelism'))
 * 
 * A lecture with no url since the lecture has not been given yet:
 *    lecture_def('Jan 12', 'Why Parallelism?', '', 'bold')
 *
 * More complicated:
 *
 * A lecture with multiple assignment due dates on the same day:
 *    lecture_def('Jan 21', 'Parallel Programming Models and their Corresponding HW/SW Implementations', lecture_url('progmodels'), '',
 *                array('Quiz 1 due (on Thu Jan 22)', 'Assignment 1 due (on Fri Jan 23)') )
 *
 * =======================================================================
 */

$lectures = array(

  lecture_def('Aug 31', 'Course Introduction + Parallel Architecture Review', '', 'bold'),
    
  lecture_def('Sep 2', 'No Class -- Memorial Day', '', 'bold'),

  lecture_def('Sep 4', 'COMING SOON', '', 'bold'),

  lecture_def('Sep 6', 'COMING TBD', '', 'bold')
  );


/*
 * ===================================================================
 * =========== END OF LECTURES ARRAY =================================
 * ===================================================================
 */


foreach ($lectures as $lecture)
{

?>

<tr>
<td class="schedule_date">
     <?php echo $lecture['date']; ?>
</td>

<td class="schedule_lecture">
     <div>
     <?php if (strlen($lecture['link']) > 0) { ?>

        <a href="<?php echo $lecture['link']; ?>"><?php echo $lecture['title']; ?></a>

     <?php } else { ?>

      <?php if ($lecture['format'] == 'bold') { ?>
           <span class="bold_text"><?php echo $lecture['title']; ?></span>
      <?php } else { ?>
        <?php echo $lecture['title']; ?>
     <?php } ?>

     <?php } ?>
     </div>

     <?php if (count($lecture['deadlines']) > 0) {
        foreach($lecture['deadlines'] as $deadline) { ?>
     <div class="small_text colored_text">
     <?php echo $deadline; ?>
     </div>
     <?php } } ?>

</td>

</tr>

<?php
}
?>

</table>

<div class="overview_main_item overview_ruled_element">Assignments and Projects</div>

<table>
<tr>
  <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 1: COMING SOON</span></td>
</tr>
<tr>
    <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 2: COMING SOON</span></td>
</tr>
<tr>
    <td class="schedule_date">TBD</td><td class="schedule_lecture"><span class="bold_text">Assignment 3: COMING SOON</span></td>
</tr>
</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
