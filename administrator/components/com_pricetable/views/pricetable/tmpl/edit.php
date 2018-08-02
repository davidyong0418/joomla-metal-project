<?php
/**
 * @version     2.0.0
 * @package     com_pricetable
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Abdur Rashid <rashid.cse.05@gmail.com> - http://www.keenitsolution.com
 */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_pricetable/assets/css/pricetable.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'pricetable.cancel') {
            Joomla.submitform(task, document.getElementById('pricetable-form'));
        }
        else {
            
            if (task != 'pricetable.cancel' && document.formvalidator.isValid(document.id('pricetable-form'))) {
                
                Joomla.submitform(task, document.getElementById('pricetable-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>
<script>
 js = jQuery.noConflict();
 js(document).ready(function(){
     js('.add_plan').click(function(e){
        e.preventDefault();
        js(this).before("<div><input name='features[]' type='text' class='in_box' /><span class='rem_plan' ><a href='javascript:void(0);' class='in_box'>Remove</a></span></div>");
     });
	 js('#pricetable-form').on('click', '.rem_plan', function() {
     js(this).parent("div").remove();
     });
});
</script>

<form action="<?php echo JRoute::_('index.php?option=com_pricetable&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="pricetable-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_PRICETABLE_TITLE_PRICETABLE', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('plan_title'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('plan_title'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('plan_cat'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('plan_cat'); ?></div>
			</div>
            <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('header_top_color'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('header_top_color'); ?></div>
			</div>
            <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('header_bottom_color'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('header_bottom_color'); ?></div>
			</div>
            
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('price'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('price'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('plan_subtext'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('plan_subtext'); ?></div>
			</div>
			 <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('button_text'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('button_text'); ?></div>
			</div>
            
            <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('button_url'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('button_url'); ?></div>
			</div>
            
            <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('button_color'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('button_color'); ?></div>
			</div>

            
			<div class="control-group">
            <div class="control-label"><?php echo  JText::_('COM_PRICETABLE_FORM_LBL_PRICETABLE_FEATURES'); ?></div>
            <div class="controls">
				   <?php 
				   $id=$this->item->id;
                   if(empty($id)): ?>
                   <input type="text" name="features[]" /><span class=" add_plan btn btn-success remove_fa">Add More</span>
                    <?php 
                    else:
					 echo PricetableHelper::getfeatures($id);
                    ?>
                    <span class=" add_plan btn btn-success" style="margin-left:5px; margin-top:5xp;">Add More</span>
                    <?php endif;?>
            </div>			
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>

                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>