<?php include './partials/head.php'; ?>
<?php include './partials/nav.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold text-center mt-8 text-green-600">Give Us Your Feedback</h1>
    <p class="text-lg text-center mt-4 text-green-600">We would love to hear from you!</p>
    <div class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-md p-6">
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your Name"
                       class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"/>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your Email"
                       class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"/>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message:</label>
                <textarea id="message" name="message" rows="4"
                          class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit"
                        class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    h1 {
        font-size: 3rem;
        font-weight: 600;
    }

    p {
        font-size: 1.5rem;
        font-weight: 400;
    }
</style>
<?php include './partials/footer.php'; ?>

