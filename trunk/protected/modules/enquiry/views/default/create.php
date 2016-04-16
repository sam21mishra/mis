<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data EnquiryDetail 
 */
?>
<div class="row wrapper border-bottom white-bg">
    <h2>Add Enquiry</h2>
</div>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'modes' => $modes,
    'courses' => $courses,
    'heardAbout' => $heardAbout
));
?>