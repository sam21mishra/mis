<?php
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 * @var $this DefaultController 
 * @var $data EnquiryDetail 
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aadhaar_no')); ?>:</b>
	<?php echo CHtml::encode($data->aadhaar_no); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('education')); ?>:</b>
	<?php echo CHtml::encode($data->education); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation')); ?>:</b>
	<?php echo CHtml::encode($data->occupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('college_company')); ?>:</b>
	<?php echo CHtml::encode($data->college_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_no')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parents_contact_no')); ?>:</b>
	<?php echo CHtml::encode($data->parents_contact_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_id')); ?>:</b>
	<?php echo CHtml::encode($data->email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flat_floor')); ?>:</b>
	<?php echo CHtml::encode($data->flat_floor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postalcode')); ?>:</b>
	<?php echo CHtml::encode($data->postalcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center')); ?>:</b>
	<?php echo CHtml::encode($data->center); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_time')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_date')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_time')); ?>:</b>
	<?php echo CHtml::encode($data->batch_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_time')); ?>:</b>
	<?php echo CHtml::encode($data->contact_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('form_no')); ?>:</b>
	<?php echo CHtml::encode($data->form_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->branch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_id')); ?>:</b>
	<?php echo CHtml::encode($data->org_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heard_about')); ?>:</b>
	<?php echo CHtml::encode($data->heard_about); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mode')); ?>:</b>
	<?php echo CHtml::encode($data->mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('handled_by')); ?>:</b>
	<?php echo CHtml::encode($data->handled_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_suggested')); ?>:</b>
	<?php echo CHtml::encode($data->course_suggested); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_offered')); ?>:</b>
	<?php echo CHtml::encode($data->course_offered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees')); ?>:</b>
	<?php echo CHtml::encode($data->fees); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_enrolled')); ?>:</b>
	<?php echo CHtml::encode($data->is_enrolled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_id')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enroll_date')); ?>:</b>
	<?php echo CHtml::encode($data->enroll_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_emi')); ?>:</b>
	<?php echo CHtml::encode($data->is_emi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_emi_duration')); ?>:</b>
	<?php echo CHtml::encode($data->max_emi_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_duration')); ?>:</b>
	<?php echo CHtml::encode($data->min_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_duration')); ?>:</b>
	<?php echo CHtml::encode($data->max_duration); ?>
	<br />

	*/ ?>

</div>