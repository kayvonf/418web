
<div class="home_container">

<div style="font-size: 12pt; padding-left: 5px; padding-top:10px;" class="home_title">CMU 15-462/662</div>
<div style="padding-bottom: 5px;" class="home_title">COMPUTER GRAPHICS</div>

<div> 
<img style="padding-bottom: 5px;" src="<?php echo base_url('assets/images/misc/462_banner.jpg'); ?>" width="800" height="125"></a>
</div>

<div class="overview_main_item overview_ruled_element">Basic Info</div>

<div style="padding-bottom: 15px;">
<div>Mon/Wed 1:30-2:50pm (recitation on Fri 1:30-2:50pm)</div>
<div>GHC 4401 (Rashid Auditorium)</div>
<div>Instructors: TBD</div>
<div style="padding-top:1em;">See the <a href="<?php echo site_url('courseinfo'); ?>">course info</a> page for more info on policies and logistics.</div>
</div>

<div class="overview_main_item overview_ruled_element">Fall 2017 Schedule</div>

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

  lecture_def('Jan 16', 'No Class (example)', '', 'bold'),

  lecture_def('Jan 18', 'Example Lecture 1', lecture_url('mylecturename1'), '',
                   array('Assignment 1 out')),

  lecture_def('Jan 20', 'Example Lecture 2', lecture_url('mylecturename2'), ''),

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
    <td class="schedule_date">Jan 30</td><td class="schedule_lecture"><a href="<?php echo article_url('1'); ?>">Assignment 1: Dummy Link</a></td>
</tr>

</table>

<div class="overview_main_item overview_ruled_element">Acknowledgments</div>

<p> Special thanks to...</p>

<div>&nbsp;</div>
<div>&nbsp;</div>

</div>  <!-- end of home_container -->
