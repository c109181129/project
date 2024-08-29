<div class="form-result">
    @if ($errors and count($errors))
	    <ul class="iconlist" data-username="envato" data-count="2">
		    @foreach($errors->all() as $err)
			    <div class="alert twitter-widget-alert text-center alert-danger">
				    <li>{{ $err }}</li>
			    </div>
		    @endforeach
	    </ul>
    @endif
</div>