@if(session('successMsg'))
  	<div class="alert alert-success">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
      	<i class="material-icons">close</i>
    </button>
    <span>{{ session('successMsg') }}</span>
  </div>
@endif

@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
              <i class="material-icons">close</i>
            </button>
            <span>{{ $error }}</span>
        </div>
	@endforeach
@endif

