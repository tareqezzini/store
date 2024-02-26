<!-- latest jquery-->
<script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('backend/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('backend/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('backend/js/sidebar-menu.js') }}"></script>



<!-- lazyload js-->
<script src="{{ asset('backend/js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ asset('backend/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('backend/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('backend/js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ asset('backend/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('backend/js/counter/counter-custom.js') }}"></script>




<!--right sidebar js-->
<script src="{{ asset('backend/js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ asset('backend/js/height-equal.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('backend/js/lazysizes.min.js') }}"></script>
@yield('js')


<script>
    function hideLoader() {
        document.getElementById('loader-overlay').style.display = 'none';
    }
    window.addEventListener('load', function() {
        hideLoader();
    })
</script>
