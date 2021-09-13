<?php require_once 'inc/header.php';
	$select = "SELECT * FROM mail WHERE status = 1 ORDER BY id DESC";
	$query = mysqli_query($conn, $select);

	$selectCount = "SELECT COUNT(*) as total FROM mail WHERE status = 1";
	$querycounter = mysqli_query($conn, $selectCount);
	$assoc = mysqli_fetch_assoc($querycounter);

	$selectNOtification = "SELECT COUNT(*) as nf FROM mail WHERE notification = 'on' ";
	$queryNOtification = mysqli_query($conn, $selectNOtification);
	$countNotification = mysqli_fetch_assoc($queryNOtification);
?>

<div class="row">
	<div class="col-md-3 ">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Inbox </a>
	  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Trash</a>
	</div>
	</div>
	
	<div class="col-md-9">
	<form action="delete-message.php" method="post">
		<div class="tab-content" id="v-pills-tabContent">
	  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	  	<div class="bg-primary p-2 text-white rounded">
	  		Inbox ( <?= $assoc['total'] ?> )
	  	</div> <br> 
	  		<label>
	      		<input id="checkAll" type="checkbox" name="select"> Select All
	      	</label>
		<input type="submit" value="Delete All" >
	  	<table class="table table-bordered table-hover">
		  <tbody>
		  	
			<?php foreach ($query as $key => $mail): ?>

			<tr class="text-center ">
		      <th width="5%">
		      	<label>
		      		<input value="<?= $mail['id'] ?>" type="checkbox" name="select[]">
		      	</label>
		      </th>
		      <td width="20%" class="font-weight-bold">
		      	<a href="single-mail.php?id=<?php echo $mail['id'] ?>" class="<?= $mail['notification'] == 'off' ? 'text-muted' : '' ?>"><?= $mail['name']; ?></a>
		      </td>
		      <td width="30%"><?= $mail['email'] ?></td>
		      <td width="30%">
		      	<?php 
		      		$msg = $mail['message'];
		      		$sort = substr($msg, 0, 50);
		      		echo $sort.'.....';
		      	?>
		      </td>
		      <td width="20%"> <?= $mail['tim'] ?> <br> <?= $mail['dat'] ?></td>
		    </tr>
			<?php endforeach ?>
		  </tbody>
		</table>

	  </div>
	</form>
	  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">trahs</div>
	</div>
	</div>
</div>

<?php require_once 'inc/footer.php';?>