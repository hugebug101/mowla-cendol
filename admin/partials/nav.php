<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <!--                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"-->
                    <!--                         alt="Your Company">-->
                    <a href="dashboard.php"><img class="h-20 w-auto"
                                                 src="../../resources/images/cendol-bg-removed.png" alt=""></a>

                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="dashboard.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'dashboard.php') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> rounded-md px-3 py-2 text-sm font-medium"
                           aria-current="page">Dashboard</a>
                        <a href="food.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'food.php') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> rounded-md px-3 py-2 text-sm font-medium">Team</a>
                        <a href="order.php"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'order.php') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> rounded-md px-3 py-2 text-sm font-medium">Orders</a>
                        <a href="#"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'calendar.php') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
                        <a href="#"
                           class="<?php echo (basename($_SERVER['PHP_SELF']) === 'reports.php') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?> rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                    </div>
                </div>

            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                            class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                    class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                             tabindex="-1" id="user-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1">Settings</a>
                            <a href="../auth/logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                               tabindex="-1"
                               id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let userMenuButton = document.getElementById("user-menu-button");
        let userMenu = document.getElementById("user-menu");

        userMenuButton.addEventListener("click", function () {
            let expanded = this.getAttribute("aria-expanded") === "true";

            if (expanded) {
                userMenu.classList.remove("block");
                userMenu.classList.add("hidden");
                this.setAttribute("aria-expanded", "false");
            } else {
                userMenu.classList.remove("hidden");
                userMenu.classList.add("block");
                this.setAttribute("aria-expanded", "true");
            }
        });
    });
</script>
