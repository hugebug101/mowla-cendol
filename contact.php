<?php include './partials/head.php'; ?>
<?php include './partials/nav.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold text-center mt-8">Contact Us</h1>
    <p class="text-lg text-center mt-4">We would love to hear from you!</p>
    <p class="text-lg text-center mt-2">If you have any questions, suggestions, or inquiries, please feel free to reach
        out to us.</p>

    <div class="mt-8 flex flex-col md:flex-row">
        <div class="w-full md:w-1/2">
            <div class="map-container rounded-md overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.515988277051!2d101.7321705!3d3.2523173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc389124c4d031%3A0x2c74dcff7d8ae86e!2sMOWLA%20Cendol%20%26%20Laksa!5e0!3m2!1sen!2smy!4v1628495431867!5m2!1sen!2smy"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="w-full md:w-1/2 pl-0 md:pl-8 mt-4 md:mt-0">
            <h2 class="text-2xl font-bold">Contact Information</h2>
            <ul class="mt-4">
                <li class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 1a7 7 0 11-3.978 12.248l-4.393 4.393a1 1 0 001.414 1.414l4.393-4.393A7 7 0 0110 3zm0 2a5 5 0 100 10 5
 5 0 000-10zm0 1a4 4 0 11-2.968 6.776l-4.497 4.498 1.416 1.416L10 11.83l3.05 3.05 1.416-1.416-4.497-4.498A4 4 0 0110 6z"
                              clip-rule="evenodd"/>

                    </svg>
                    <span>CX2 Food court of Kulliyyah of Human Sciences,<br> IIUM Gombak, 53100 Kuala Lumpur</span>
                </li>
                <li class="flex items-center space-x-2 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 12a1 1 0 01-2 0V9a1 1 0 012 0v5zm0-7a1 1 0 100-2 1 1 0 000 2z"/>
                    </svg>
                    <span>Phone: 016-907 4534</span>
                </li>
                <li class="flex items-center space-x-2 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm5 11a1 1 0 01-1 1H6a1 1 0 01-1-1V7a1 1 0 011-1h8a1 1 0 011 1v6z"/>
                    </svg>
                    <span>Email: info@mowlacendol.com</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<style>
    .map-container {
        position: relative;
        overflow: hidden;
        padding-top: 40%; /* Adjust the padding to control the size of the map */
        border-radius: 10px; /* Add border-radius to round the edges */
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .flex-center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>

<?php include './partials/footer.php'; ?>
