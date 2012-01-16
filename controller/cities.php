<option value="">Select City</option>
<?php foreach ($cities as $rec) { ?>
}
<option value="<?php echo $rec['ID'] ?>" n="<?php echo $rec['Name'] ?>" ><?php echo $rec['Name'] ?></option>
<?php } ?>