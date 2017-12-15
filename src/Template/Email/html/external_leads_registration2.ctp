<?php ?>
<p>Hi,</p>
<p>A new lead has been entered into the Holistic CRM. To update any details regarding this lead login here: <a href="http://holisticwebpresencecrm.com">http://holisticwebpresencecrm.com</a></p>
<h3 class="form-hdr" style="background-color: #222D32;color:#ffffff;padding: 10px;">Lead Information</h3>
<table>
<?php if($fields) { ?>
		<?php foreach($fields as $fd)?>
		<tr>
			<td><?php echo $fd; ?></td>
			<td>: --</td>
		</tr>
		<?php } ?>
<?php } else { ?>
		<tr><td>NO FIELDS FOUND</td></tr>
<?php } ?>
</table>

<br/><br/>
<p><a href="https://www.holisticwebpresence.com">Holistic Web Presence LLC</a></p>