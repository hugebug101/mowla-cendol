<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div id="cartSlideOver" class="fixed inset-0 overflow-hidden">
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900"
                                        id="slide-over-title">Your cart</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" onclick="closeCartSlideOver()"
                                                class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <?php
                                        //get items from session
                                        $items = $_SESSION['cart'];
                                        $subtotal = 0; // variable to store subtotal

                                        //check if cart is empty
                                        if (empty($items)) :
                                            ?>
                                            <div class="py-6">
                                                <div class="flex justify-center">
                                                    <svg class="h-12 w-12 text-gray-400"
                                                         stroke="currentColor" fill="none"
                                                         viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                                d="M24 8a16 16 0 1 0 0 32 16 16 0 0 0 0-32zm0 6a2 2 0 1 1-.001 4.001A2 2 0 0 1 24 14zm0 20a2 2 0 1 1 .001-4.001A2 2 0 0 1 24 34z"/>
                                                    </svg>
                                                </div>
                                                <div class="mt-6 text-center">
                                                    <p class="text-sm text-gray-500">
                                                        No items in your cart.
                                                    </p>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            <?php
                                            //loop through items

                                            foreach ($items as $item) :
                                                $itemSubtotal = $item['price'] * $item['quantity']; // calculate item subtotal
                                                $subtotal += $itemSubtotal; // add item subtotal to total
                                                ?>
                                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                    <li class="flex py-6">
                                                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                                                 alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                                 class="h-full w-full object-cover object-center">
                                                        </div>

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                                    <h3>
                                                                        <a href="#"><?= $item['name'] ?></a>
                                                                    </h3>
                                                                    <p class="ml-4">
                                                                        RM <?= number_format($item['price'], 2) ?></p>

                                                                </div>
                                                                <p class="mt-1 text-sm text-gray-500">
                                                                    Salmon</p>
                                                            </div>
                                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                                <p class="text-gray-500">
                                                                    Qty <?= $item['quantity'] ?></p>

                                                                <div class="flex">
                                                                    <button type="button"
                                                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>


                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>RM <?= number_format($subtotal, 2) ?></p>
                                </div>


                                <div class="mt-6">
                                    <a href="#"
                                       class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <button type="button" onclick="closeCartSlideOver()"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Continue Browsing
                                            <span aria-hidden="true"> &rarr;</span>
                                        </button>
                                    </p>
                                </div>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


