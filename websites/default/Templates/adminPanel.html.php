
<main class="container">
	<ul>
	<h4>Welcome to the admin panel</h4>


<div class="row  ">
	<div class="col-md-6 mb-3  ">
		<div class="card ">
			<div class="card-body">
				<h5 class="card-title">Accounts</h5>
				<p class="card-text">Manage all Accounts both seller and buyers</p>
				<a href="/client/list" class="btn btn-primary m-2">Manage  Accounts</a>
				<a href="/client/edit" class="btn btn-primary m-2"> Create New Account</a>
			</div>
		</div>
	</div>


<!-- Auction -->
	<div class="col-md-6 mb-3 ">
		<div class="card ">
			<div class="card-body">
				<h5 class="card-title">Auctions</h5>
				<p class="card-text">Manage Auctions</p>
				<a href="/admin/auction/list?sort=past" class="btn btn-primary m-2">View Previous Auctions</a>
				<a href="/admin/auction/list?sort=future" class="btn btn-primary m-2">View Future Auctions</a>
				<a href="/admin/auction/catalogue/edit?edit_all_auction=1" class="btn btn-primary m-2">Edit Auctions</a>
				<a href="/admin/auction/catalogue/edit?edit_all_auction=0" class="btn btn-primary m-2"> Create New Auction</a>
				<a href="/live/bid/catalogue" class="btn btn-primary m-2">Live Auctions </a>
			</div>
		</div>

	</div>

<!-- Catalogue -->
	<div class="col-md-6 mb-3 ">
		<div class="card ">
			<div class="card-body">
				<h5 class="card-title">Catalogue</h5>
				<p class="card-text">Manage Catalogue</p>
				<a href="/admin/catalogue/list" class="btn btn-primary m-2">View All Catalogues </a>
				<a href="/admin/catalogue/item/edit" class="btn btn-primary m-2">Add Items  to Catalogue</a>
				<a href="/admin/catalogue/edit" class="btn btn-primary m-2"> Create New Catalogue</a>
			</div>
		</div>
	</div>

<!-- Items -->
	<div class="col-md-6 mb-3 ">
		<div class="card ">
		<div class="card-body">
			<h5 class="card-title">Items</h5>
			<p class="card-text">Manage Item</p>
			<a href="/admin/item/waiting" class="btn btn-primary m-2">Items on Waiting List </a>
			<a href="/admin/item/evaluating" class="btn btn-primary m-2">Items on Evaluation List</a>
			<a href="/admin/item/approved" class="btn btn-primary m-2"> Items Approved</a>
			<a href="/admin/item/auction" class="btn btn-primary m-2"> Items On Auction</a>
		</div>
	</div>
	</div>

</div>



	</ul>
</main>
