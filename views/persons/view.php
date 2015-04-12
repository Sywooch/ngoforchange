<?php
	$this->title = Yii::t('app', 'View Profile');
	$this->registerJsFile(
		'js/persons/view.js',
		[
			'position' => yii\web\View::POS_END,
			'depends' => ['yii\web\YiiAsset', 'app\assets\KendoAsset']
		]);
?>
<script type="text/javascript">
var labels = {
	"grid_button_edit": "<?php echo Yii::t('app', 'Edit'); ?>",
	"grid_button_destroy": "<?php echo Yii::t('app', 'Delete'); ?>",
	"grid_button_preview": "<?php echo Yii::t('app', 'Preview'); ?>",

	"grid_column_id": "<?php echo Yii::t('app', 'ID'); ?>",
	"grid_column_fname": "<?php echo Yii::t('app', 'First Name'); ?>",
	"grid_column_lname": "<?php echo Yii::t('app', 'Last Name'); ?>",
	"grid_column_types": "<?php echo Yii::t('app', 'Registered as'); ?>",
	"grid_column_ssrn": "<?php echo Yii::t('app', 'SSRN'); ?>",
	"grid_column_idnumber": "<?php echo Yii::t('app', 'ID Number'); ?>",
	"grid_column_fathername": "<?php echo Yii::t('app', 'Father Name'); ?>",
	"grid_column_address": "<?php echo Yii::t('app', 'Address'); ?>",
	"grid_column_post": "<?php echo Yii::t('app', 'Post Code'); ?>",
	"grid_column_city": "<?php echo Yii::t('app', 'City'); ?>",
	
	"grid_confirm_delete": "<?php echo Yii::t('app', 'Are you sure that you want to delete this record?'); ?>"
};

var links = {
	"person_read": "?r=api/persons/index",
	"person_update": "?r=api/persons/update",
	"person_destroy": "?r=api/persons/destroy",
	"person_preview": "?r=persons/view&person_id="
};
</script>

<?php
	$photo_file = '';

	if(isset($patient_data_index) && $patient_data_index != -1) {
		$i = $patient_data_index;

		if(isset($person_data[$i]['model']->photo) && $person_data[$i]['model']->photo != '')
			$photo_file = '?r=persons/attachment&t=photo&f='. $person_data[$i]['model']->photo;
		else if(isset($person_data[$i]['model']->sex))
			$photo_file = '/images/no_photo'. ($person_data[$i]['model']->sex == 'female' ? '_f' : '') .'.jpg';
		else
			$photo_file = '/images/no_photo.jpg';

	} else {
		$photo_file = '/images/no_photo.jpg';
	}
?>

<!-- title and photo attachement -->
<div class="row">
	<div class="col-xs-4 col-md-2">
		<img class="img-thumbnail patient-photo" src="<?= $photo_file ?>" />
	</div>
	<div class="col-xs-8 col-md-10">
		<h3><?= Yii::t('app', 'Profile') ?></h3>
		<h3>
			# <?= $person->id ?><br />
			<?= $person->first_name.' '.$person->last_name ?>
		</h3>
	</div>
</div>

<?php if (isset($person->is_deleted) && $person->is_deleted == '1'): ?>
	<div class="alert alert-danger" role="alert">
		<div>
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<b><?= Yii::t('app', 'Notice') ?>:</b>
				<?= Yii::t('app', 'This person has been deleted.') ?>
		</div>
		<div>
			<b><?= Yii::t('app', 'Reason') ?>:</b>
				<?= $person->deletion_reason ?>
		</div>
	</div>
<?php endif; ?>

<!-- Person information -->
<div class="well well-sm">
	<table class="table table-striped table-hover table-condensed table-responsive">
		<thead>
			<tr>
				<th>
					<span class="glyphicon glyphicon-user"></span>
					<?= Yii::t('app', 'General Information') ?>
				</th>
				<th class="text-right">
					<a href='' class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-pencil"></span>
						<?= Yii::t('app', 'Edit') ?>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$labels = $person->attributeLabels();
				foreach ($person->attributes as $key => $value) {
					if(isset($labels[$key])) {
						echo '<tr><td>'.$labels[$key].'</td>';
						echo '<td>'.$value.'</td></tr>';
					}
				}
			?>
		</tbody>
	</table>
</div>


<?php foreach ($person_data as $key => $data): ?>
<div class="well well-sm">
	<table class="table table-striped table-hover table-condensed table-responsive">
		<thead>
			<tr>
				<th>
					<span class="glyphicon glyphicon-list-alt"></span>
					<?= $data['name'] ?> <?= Yii::t('app', 'information') ?> 
				</th>
				<th class="text-right">
					<a href='' class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-pencil"></span>
						<?= Yii::t('app', 'Edit') ?>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($data['model'] == null) {
					echo '<tr><td colspan="2">'. Yii::t('app', 'No data is available ').'</td></tr>';
				} else {
					$labels = $data['model']->attributeLabels();
					foreach ($data['model']->attributes as $key => $value) {
						if(isset($labels[$key])) {
							echo '<tr><td>'.$labels[$key].'</td>';
							echo '<td>'.$value.'</td></tr>';
						}
					}	
				}
			?>
		</tbody>
	</table>
</div>
<?php endforeach; ?>

<!-- Contacts -->
<div class="well well-sm">
	<table class="table table-striped table-hover table-condensed table-responsive">
		<thead>
			<tr>
				<th colspan="2">
					<span class="glyphicon glyphicon-list"></span>
					<?= Yii::t('app', 'Contact information') ?> 
				</th>
				<th class="text-right">
					<a href='' class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-pencil"></span>
						<?= Yii::t('app', 'Edit') ?>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($person['contacts'] == null) {
					echo '<tr><td colspan="2">'. Yii::t('app', 'No data is available ').'</td></tr>';
				} else {
					$icons = Yii::$app->params['contactTypeIcons'];
					foreach ($person['contacts'] as $key => $contact) {
						$icon = '';
						if(isset($icons[$contact->contact_type])) {
							$icon = '<img src="'.$icons[$contact->contact_type].'" alt="'.$contact->contact_type.'" title="'.$contact->contact_type.'" />';
						}

						echo '<tr><td class="contact-icon">'.$icon.'</td><td>'.$contact->contact_type.'</td>';
						echo '<td>'.$contact->contact_data.'</td></tr>';
					}	
				}
			?>
		</tbody>
	</table>
</div>


<!-- Donations -->
<div class="well well-sm">
	<table class="table table-striped table-hover table-condensed table-responsive">
		<thead>
			<tr>
				<th>
					<span class="glyphicon glyphicon-eur"></span>
					<?= Yii::t('app', 'Donation information') ?> 
				</th>
				<th class="text-right">
					<a href='' class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-pencil"></span>
						<?= Yii::t('app', 'Edit') ?>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				echo '<tr><td colspan="2">'. Yii::t('app', 'No data is available ').'</td></tr>';
				/*} else {
					$labels = $data['model']->attributeLabels();
					foreach ($data['model']->attributes as $key => $value) {
						if(isset($labels[$key])) {
							echo '<tr><td>'.$labels[$key].'</td>';
							echo '<td>'.$value.'</td></tr>';
						}
					}	
				}*/
			?>
		</tbody>
	</table>
</div>
