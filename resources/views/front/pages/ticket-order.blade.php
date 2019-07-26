<!DOCTYPE html>
<html>
<head>
	<title>Ticket Order</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="card" >
				<div class="card-header">
					Ticket Order
				</div>
				<div class="card-body">
					<form method="POST" action="{{route('ticket.store')}}">
						@csrf
						<div class="row">
						    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					  		  <div class="form-group">
							    <label for="name">Name</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
							  </div>
							</div>
						  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							  <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
							  </div>
							</div>
						    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					  		  <div class="form-group">
							    <label for="phone">Phone number</label>
							    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
							  </div>
							</div>
						    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					  		  <div class="form-group">
							    <label for="organization">Organization</label>
							    <input type="text" class="form-control" id="organization" name="organization" placeholder="Enter your organization name">
							  </div>
							</div>
						    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					  		  <div class="form-group">
							    <label for="number_of_tickets">Number of tickets</label>
							    <input type="number" class="form-control" id="ticketnumber_of_tickets" name="number_of_tickets" placeholder="Enter number of tickets">
							  </div>
							</div>
						</div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
</body>
</html>