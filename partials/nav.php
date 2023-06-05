<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="test.php">
                        <img class="h-20 w-auto" src="../../resources/images/cendol-bg-removed.png" alt="">
                    </a>
                </div>
                <div class="hidden md:block">
                    <!-- Desktop navigation -->
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="../views/test.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'test.php') ?
                               'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>
                               rounded-md px-3 py-2 text-sm font-medium"
                           aria-current="page">Main</a>
                        <a href="../views/menu.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'menu.php') ?
                               'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>
                               rounded-md px-3 py-2 text-sm font-medium"
                           aria-current="page">Menu</a>
                        <a href="../views/contact.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'contact.php') ?
                               'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>
                               rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                        <a href="../views/about.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'about.php') ?
                               'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>
                                rounded-md px-3 py-2 text-sm font-medium">About Us</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Cart icon -->
                    <button type="button" class="relative flex" onclick="openCartSlideOver()">
                        <svg class="flex-1 w-8 h-8 fill-current text-black hover:text-gray-700" viewBox="0 0 24 24">
                            <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobileMenuButton" type="button"
                        class="text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="../views/test.php"
               class="<?php echo (basename($_SERVER['PHP_SELF']) === 'test.php') ? 'bg-gray-900 text-white' :
                   'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> block px-3 py-2 rounded-md text-base font-medium"
               aria-current="page">Test</a>
            <a href="../views/menu.php"
               class="<?php echo (basename($_SERVER['PHP_SELF']) === 'menu.php') ? 'bg-gray-900 text-white' :
                   'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> block px-3 py-2 rounded-md text-base font-medium"
               aria-current="page">Menu</a>
            <a href="food.php"
               class="<?php echo (basename($_SERVER['PHP_SELF']) === 'food.php') ? 'bg-gray-900 text-white' :
                   'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> block px-3 py-2 rounded-md text-base font-medium">Foods</a>
            <a href="order.php"
               class="<?php echo (basename($_SERVER['PHP_SELF']) === 'order.php') ? 'bg-gray-900 text-white' :
                   'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> block px-3 py-2 rounded-md text-base font-medium">Orders</a>
            <a href="../views/checkout.php"
               class="<?php echo (basename($_SERVER['PHP_SELF']) === 'checkout.php') ? 'bg-gray-900 text-white' :
                   'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> block px-3 py-2 rounded-md text-base font-medium">Checkout</a>
            <a href="#"
               class="<?php echo (basename($_SERVER['PHP_SELF']) === 'reports.php') ? 'bg-gray-900 text-white' :
                   'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> block px-3 py-2 rounded-md text-base font-medium">Reports</a>
            <!-- Cart icon (mobile) -->
            <a href="#" class="text-gray-300 hover:text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="h-6 w-6 mx-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 19c-1.333 0-2.667-.667-3-2L4 9H2V7h16v2h-2l-2 8c-.333 1.333-1.667 2-3 2H9zm6-12h-2V4H9v3H7l-1 4h14V7h-2V4z"/>
                </svg>
            </a>
        </div>
    </div>
</nav>
<script>
    // Get the mobile menu button and mobile menu
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    // Add a click event listener to the mobile menu button
    mobileMenuButton.addEventListener('click', function () {
        // Toggle the visibility of the mobile menu
        mobileMenu.classList.toggle('hidden');
    });
</script>
</body>
</html>
