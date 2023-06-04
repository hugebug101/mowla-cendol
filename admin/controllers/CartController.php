<?php
require '/Users/anas/Desktop/mowla-cendol/db_connect.php';

session_start();

class CartController
{
    public function addToCart()
    {
        // Retrieve the item details from the request
        $itemId = $_POST['item_id'];
        $itemName = $_POST['item_name'];
        $itemPrice = $_POST['item_price'];
        $quantity = $_POST['quantity'];

        // Add the item to the cart
        $this->addItemToCart($itemId, $itemName, $itemPrice, $quantity);

        // Prepare the response data
        $response = [
            'message' => 'Item added to cart successfully!',
            'cartCount' => $this->getCartCount()
        ];

        // Send the response as JSON
        echo json_encode($response);
        exit;
    }

    private function addItemToCart($itemId, $itemName, $itemPrice, $quantity)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $item = array(
            'id' => $itemId,
            'name' => $itemName,
            'price' => $itemPrice,
            'quantity' => $quantity
        );

        $_SESSION['cart'][$itemId] = $item;
    }

    private function getCartCount()
    {
        $count = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $count += $item['quantity'];
            }
        }
        return $count;
    }

    public function clearCart()
    {
        unset($_SESSION['cart']);
    }

    public function displayCart()
    {
        if (empty($_SESSION['cart'])) {
            echo "Cart is empty.";
        } else {
            foreach ($_SESSION['cart'] as $item) {
                echo "Item: " . $item['name'] . "<br>";
                echo "Price: " . $item['price'] . "<br>";
                echo "Quantity: " . $item['quantity'] . "<br>";
                echo "<br>";
            }
        }
    }

    public function getCart()
    {
        return $_SESSION['cart'];
    }

    public function updateQuantity($itemId, $newQuantity)
    {
        if (isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId]['quantity'] = $newQuantity;
        }
    }

    public function removeItem($itemId)
    {
        if (isset($_SESSION['cart'][$itemId])) {
            unset($_SESSION['cart'][$itemId]);
        }
    }

    public function calculateTotalPrice()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

// Check the action parameter in the request and call the corresponding method
$cartController = new CartController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'addToCart') {
        $cartController->addToCart();
    } elseif ($action === 'clearCart') {
        $cartController->clearCart();
    }
}

?>
