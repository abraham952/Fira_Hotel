@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.showToast === 'function') {
                window.showToast('{{ session('success') }}', 'success');
            }
        });
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.showToast === 'function') {
                window.showToast('{{ session('error') }}', 'error');
            }
        });
    </script>
@endif

@if(session('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.showToast === 'function') {
                window.showToast('{{ session('warning') }}', 'warning');
            }
        });
    </script>
@endif

@if(session('info'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.showToast === 'function') {
                window.showToast('{{ session('info') }}', 'info');
            }
        });
    </script>
@endif

@if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.showToast === 'function') {
                @foreach($errors->all() as $error)
                    window.showToast('{{ $error }}', 'error');
                @endforeach
            }
        });
    </script>
@endif
