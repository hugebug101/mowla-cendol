<?php include './partials/head.php'; ?>
<?php include './partials/nav.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold text-center mt-8">Place Your Order</h1>
    <form action="save_order.php" method="POST" class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-md p-6">
        <div class="mb-4">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required
                   class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div class="mb-4">
            <label for="food">Food:</label>
            <input type="text" id="food" name="food" required
                   class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div class="mb-4">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required
                   class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div class="mb-4">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required
                   class="w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div class="flex justify-center">
            <button type="submit"
                    class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                Submit
            </button>
        </div>
    </form>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    h1 {
        font-size: 3rem;
        font-weight: 600;
        color: #1F2937;
    }

    label {
        font-size: 1.2rem;
        font-weight: 600;
        color: #4B5563;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border-radius: 0.25rem;
        border: 1px solid #D1D5DB;
        transition: border-color 0.2s ease-in-out;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
        outline: none;
        border-color: #60A5FA;
    }

    input[type="submit"] {
        background-color: #34D399;
        color: #FFFFFF;
        padding: 10px 16px;
        border-radius: 0.25rem;
        border: none;
        font-size: 1.2rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    input[type="submit"]:hover {
        background-color: #22C29F;
    }
</style>

<?php include './partials/footer.php'; ?>
