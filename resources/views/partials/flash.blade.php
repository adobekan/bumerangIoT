<div class="container">
    @if (Session::has('flash_message'))
        @if (Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif
        <div class="alert  {{ Session::has('flash_message_important')? 'alert-important': 'alert-success' }}">
            {{ Session::get('flash_message') }}
        </div>
    @endif
</div>