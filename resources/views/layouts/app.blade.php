
<!-- HEAD SECTION -->

@include('layouts.partials.head')

<!-- END HEAD SECTION -->


    
<!-- HEADER SECTION -->

@include('layouts.partials.header')

<!-- END HEADER SECTION -->



@yield('content')



<!-- MODAL SECTION -->
@auth
@include('layouts.partials.delete-modal')
@include('layouts.users.change-password')
@endauth


<!-- END MODAL SECTION -->



<!-- FOOTER SECTION -->

@include('layouts.partials.footer')

<!-- END FOOTER SECTION -->


