<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_plugins
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

foreach ($this->fieldsets as $name => $fieldset)
{
	if (!isset($fieldset->repeat) || isset($fieldset->repeat) && $fieldset->repeat == false)
	{
		$label = !empty($fieldset->label) ? JText::_($fieldset->label) : JText::_('COM_PLUGINS_' . $fieldset->name . '_FIELDSET_LABEL', true);
		$optionsname = 'options-' . $fieldset->name;
		echo JHtml::_('bootstrap.addTab', 'myTab', $optionsname,  $label);

		if (isset($fieldset->description) && trim($fieldset->description))
		{
			echo '<p class="tip">' . $this->escape(JText::_($fieldset->description)) . '</p>';
		}

		$hidden_fields = '';

		foreach ($this->form->getFieldset($name) as $field)
		{
			if (!$field->hidden)
			{
				?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $field->label; ?>
					</div>
					<div class="controls">
						<?php echo $field->input; ?>
					</div>
				</div>
			<?php
			}
			else
			{
				$hidden_fields .= $field->input;
			}
		}
		echo $hidden_fields;

		echo JHtml::_('bootstrap.endTab');
	}
}
