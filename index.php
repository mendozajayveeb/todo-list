<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>To-Do's</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
	<!-- EXTERNAL CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col l12">

				<div class="addBox">
					<h3 class="head1">To-Do List</h3>

						<div class="row">
							<div class="container">
								<!-- <form class="col s12" id="form1"> -->
									<div class="row">
										<div class="input-field col s12">
											<input id="text-add-task" type="text" name="addNewTask" >
											<label for="text-add-task">Add Task</label>
											<button class="btn waves-effect waves-light blue darken-3" type="submit" name="submit" id="addBtn">Add Task
											    <i class="material-icons right">send</i>
											</button>
											<a class="waves-effect waves-light btn" id="clearText"><i class="material-icons left">clear_all</i>Clear</a>
										</div>
									</div>
								<!-- </form> -->
							</div>
						</div>

				</div> <!-- END OF ADD BOX -->

				<div class="pendBox">
					<h3 class="head1">Pending Task</h3>

						<div class="row">
							<div class="container">
								<ul class="collection with-header">
									<li class="collection-header" id="resultTable"></li>
								</ul>
							</div>
						</div>
						
				</div> 
			</div>
		</div>
	</div>

	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="assets/js/materialize.min.js"></script>
	<!-- INTERNAL JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>


		// CLEAR BUTTON
		$('#clearText').on('click', function(){
			$('#text-add-task').val("");
		});


		// ADD TASK
		$('#addBtn').on('click', function(){

			const addTask = $('#text-add-task').val();

			$.post({
				url: 'app/controller/addtask.php',
				data: {
					addNewTask : addTask
				},
				success: function(result){
					if(result == 1){
						$('#text-add-task').val("");
						view();
					}
				}
			});
		});

		// VIEW TASK
		function view(){
			$.post({
				url: 'app/controller/viewtask.php',
				success: function(result){
					$('#resultTable').html(result);
				}
			});
		}

		view();

		// DELETE TASK
		$('.collection-header').on('click', '.secondary-content', function(){
			const test = $(this).val();

			$.get({
				url: 'app/controller/deltask.php',
				data: {
					id : test
				},
				success: function(result){
					if(result == 1){
						view();
					} else {
						alert('Failed');
					}
				}
			})
		});
	</script>
</body>
</html>
