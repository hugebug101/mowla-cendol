<?php
$pageTitle = 'Contact Us';
?>
<?php include '../partials/head.php'; ?>
<?php include '../partials/nav.php'; ?>
<?php include '../partials/header.php'; ?>

<main class="flex-grow min-h-screen">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <section class="bg-gray-100">
            <div class="container px-6 mx-auto">
                <div class="grid grid-cols-1 gap-12 mt-10 md:grid-cols-2">
                    <div class="flex flex-col items-center justify-center p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 bg-white">
                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                        </div>
                        <h2 class="mt-4 text-base font-medium text-gray-800">Email</h2>
                        <p class="mt-2 text-sm text-gray-600">Our friendly team is here to help.</p>
                        <p class="mt-2 text-sm text-blue-600"><a href="mailto:someone@example">info@cx2foodcourt.com</a>
                        </p>
                    </div>

                    <div class="flex flex-col items-center justify-center p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 bg-white">
                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </div>
                        <h2 class="mt-4 text-base font-medium text-gray-800">Order Support</h2>
                        <p class="mt-2 text-sm text-gray-600">Have questions about your order?</p>
                        <p class="mt-2 text-sm text-blue-600"><a href="mailto:someone@example">Contact our support
                                team</a></p>
                    </div>

                    <div class="flex flex-col items-center justify-center p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 bg-white">
                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                        </div>
                        <h2 class="mt-4 text-base font-medium text-gray-800">Office</h2>
                        <p class="mt-2 text-sm text-gray-600">Come say hello at our office HQ.</p>
                        <p class="mt-2 text-sm text-blue-600">CX2 Food court of Kulliyyah of Human Sciences, IIUM</p>
                        <p class="mt-2 text-sm text-blue-600">Gombak, 53100 Kuala Lumpur</p>
                    </div>

                    <div class="flex flex-col items-center justify-center p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 bg-white ">
                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                            </svg>
                        </div>
                        <h2 class="mt-4 text-base font-medium text-gray-800">Phone</h2>
                        <p class="mt-2 text-sm text-gray-600">Mon-Sat from 8.00am to 5.30pm.</p>
                        <p class="mt-2 text-sm text-blue-600">+60 16-907 4534</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php include '../partials/extensions.php'; ?>
<?php include '../partials/footer.php'; ?>
