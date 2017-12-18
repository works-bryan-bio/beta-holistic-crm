<?php ?>
<p>Hi,</p>
<p>A new lead has been entered into the Holistic CRM. To update any details regarding this lead login here: <a href="http://holisticwebpresencecrm.com">http://holisticwebpresencecrm.com</a></p>
<h3 class="form-hdr" style="background-color: #222D32;color:#ffffff;padding: 10px;">Lead Information</h3>
<table>
	<?php foreach($fields_data as $fd) { ?>
			<?php if($fd == 'source_id') { ?>
					<tr>
						<td><?php echo str_replace('_', ' ', $fd); ?>: </td>
						<td><?php echo isset($new_lead['source']['name']) ? $new_lead['source']['name'] : '-'; ?></td>
					</tr>
			<?php } else if($fd == 'allocation_date') { ?>
					<tr>
						<td><?php echo str_replace('_', ' ', $fd); ?>: </td>
						<td><?php echo isset($new_lead['allocation_date']) ? date("Y-m-d",strtotime($new_lead['allocation_date'])) : '-'; ?></td>
					</tr>			
			<?php } else if($fd == 'followup_date') { ?>
					<tr>
						<td><?php echo str_replace('_', ' ', $fd); ?>: </td>
						<td><?php echo isset($new_lead['followup_date']) ? date("Y-m-d",strtotime($new_lead['followup_date'])) : '-'; ?></td>
					</tr>			
			<?php } else if($fd == 'followup_action_reminder_date') { ?>
					<tr>
						<td><?php echo str_replace('_', ' ', $fd); ?>: </td>
						<td><?php echo isset($new_lead['followup_action_reminder_date']) ? date("Y-m-d",strtotime($new_lead['followup_action_reminder_date'])) : '-'; ?></td>
					</tr>			
			<?php } else { ?>
					<tr>
						<td><?php echo str_replace('_', ' ', $fd); ?>: </td>
						<td><?php echo isset($new_lead[$fd]) ? $new_lead[$fd] : '-'; ?></td>
					</tr>
			<?php } ?>
	<?php } ?>
</table>

<br/><br/>
<p><a href="https://www.holisticwebpresence.com">Holistic Web Presence LLC</a></p>