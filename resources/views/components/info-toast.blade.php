<div style="position: fixed; top: 3rem; right: 3rem; z-index: 9999999;">
    <div id="toast-example-1" class="toast fade hide" data-delay="6000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="si si-bubble text-danger mr-2"></i>
            <strong class="mr-auto">{{ $parameters['title'] }}</strong>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ $parameters['message'] }}
        </div>
    </div>
</div>
<script>jQuery('#toast-example-1').toast('show');</script>
