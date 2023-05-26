<div class="mt-6">
    <?php if ($currentPage > 1) : ?>
        <a href="?page=<?php echo $currentPage - 1; ?>"
           class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-500 border border-gray-300 rounded-l-md">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                      clip-rule="evenodd"/>
            </svg>
            <span class="sr-only">Previous</span>
        </a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <a href="?page=<?php echo $i; ?>"
           class="<?php echo $i === $currentPage ? 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 border border-indigo-600' : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 hover:text-gray-700 border border-gray-300'; ?>">
            <?php if ($i === $currentPage) : ?>
                <span class="sr-only">Current Page</span>
            <?php endif; ?>
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages) : ?>
        <a href="?page=<?php echo $currentPage + 1; ?>"
           class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-500 border border-gray-300 rounded-r-md">
            <span class="sr-only">Next</span>
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                      clip-rule="evenodd"/>
            </svg>
        </a>
    <?php endif; ?>
</div>
