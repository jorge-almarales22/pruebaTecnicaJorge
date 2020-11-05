@if(session('status'))
<div class="container">
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		{{ session('status') }}
		<button type="button" 
			class="close"
			data-dismiss="alert"
			aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
@endif
@if(session('error'))
<div class="container">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{ session('error') }}
		<button type="button" 
			class="close"
			data-dismiss="alert"
			aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
@endif