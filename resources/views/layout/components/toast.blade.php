<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-bg-success">
            <strong class="me-auto">Sucesso</strong>
            <button type="button" class="btn-close text-light" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
        </div>
    </div>
</div>

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showToast('danger', '{{ session('error') }}');
        })
    </script>
@endif

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showToast('success', '{{ session('success') }}');
        })
    </script>
@endif

@if (session('info'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showToast('success', '{{ session('info') }}');
        })
    </script>
@endif

@if (session('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showToast('success', '{{ session('warning') }}');
        })
    </script>
@endif
