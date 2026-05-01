<?php
$viewsDir = __DIR__ . '/resources/views/';
$files = glob($viewsDir . '*.blade.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    $original = $content;

    // Sidebar Links
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?>(?:dashboard)<\/span>)/i', '<a$1href="/dashboard"$2>$3', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?data-icon="dashboard"[^>]*?>)/i', '<a$1href="/dashboard"$2>$3', $content);

    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?>(?:inventory_2)<\/span>)/i', '<a$1href="/inventory"$2>$3', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?data-icon="inventory_2"[^>]*?>)/i', '<a$1href="/inventory"$2>$3', $content);

    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?>(?:payments)<\/span>)/i', '<a$1href="/Accounting"$2>$3', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?data-icon="payments"[^>]*?>)/i', '<a$1href="/Accounting"$2>$3', $content);

    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?>(?:badge)<\/span>)/i', '<a$1href="/humanresources"$2>$3', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?data-icon="badge"[^>]*?>)/i', '<a$1href="/humanresources"$2>$3', $content);

    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?>(?:groups)<\/span>)/i', '<a$1href="/Clients"$2>$3', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?data-icon="groups"[^>]*?>)/i', '<a$1href="/Clients"$2>$3', $content);

    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?>(?:logout)<\/span>)/i', '<a$1href="/"$2>$3', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(\s*<span[^>]*?data-icon="logout"[^>]*?>)/i', '<a$1href="/"$2>$3', $content);

    // Topnav links in OrderChocolate
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(Catalog)<\/a>/i', '<a$1href="/OrderChocolate"$2>$3</a>', $content);
    $content = preg_replace('/<a([^>]*?)href="#"([^>]*?)>(Orders)<\/a>/i', '<a$1href="/inventory"$2>$3</a>', $content);

    // Dashboard module buttons
    $content = preg_replace('/<button([^>]*?)>(\s*View Stock\s*<span[^>]*?>arrow_forward<\/span>\s*)<\/button>/is', '<a href="/inventory"$1>$2</a>', $content);
    $content = preg_replace('/<button([^>]*?)>(\s*Open Ledger\s*<span[^>]*?>arrow_forward<\/span>\s*)<\/button>/is', '<a href="/Accounting"$1>$2</a>', $content);
    $content = preg_replace('/<button([^>]*?)>(\s*Directory\s*<span[^>]*?>arrow_forward<\/span>\s*)<\/button>/is', '<a href="/Clients"$1>$2</a>', $content);
    $content = preg_replace('/<button([^>]*?)>(\s*Staff Portal\s*<span[^>]*?>arrow_forward<\/span>\s*)<\/button>/is', '<a href="/humanresources"$1>$2</a>', $content);
    $content = str_replace('<button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">Launch Studio</button>', '<a href="/batchregister" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity inline-block text-center">Launch Studio</a>', $content);

    // New Batch Buttons
    $content = preg_replace('/<button([^>]*?)>(.*?New Batch.*?)<\/button>/is', '<a href="/batchregister"$1>$2</a>', $content);

    // Floating action button on Dashboard:
    $content = preg_replace('/<button([^>]*?z-\[70\][^>]*?)>(\s*<span[^>]*?data-icon="add"[^>]*?>add<\/span>\s*)<\/button>/is', '<a href="/batchregister"$1>$2</a>', $content);

    // OrderChocolate Make Purchase / Add to Cart / View Active Lots
    $content = preg_replace('/<button([^>]*?)>(\s*<span[^>]*?data-icon="shopping_bag"[^>]*?>shopping_bag<\/span>\s*View Active Lots\s*)<\/button>/is', '<a href="/inventory"$1>$2</a>', $content);
    
    // BatchRegister - Back to Inventory
    $content = preg_replace('/<div class="flex items-center gap-2 text-outline mb-base">(\s*<span[^>]*?>arrow_back<\/span>\s*<span[^>]*?>Back to Inventory<\/span>\s*)<\/div>/is', '<a href="/inventory" class="flex items-center gap-2 text-outline mb-base hover:text-primary transition-colors">$1</a>', $content);
    
    // Inventory - Register Batch
    $content = preg_replace('/<button([^>]*?)>(\s*<span[^>]*?data-icon="assignment_add"[^>]*?>assignment_add<\/span>\s*Register Batch\s*)<\/button>/is', '<a href="/batchregister"$1>$2</a>', $content);
    
    // Mobile bottom nav in Inventory
    $content = preg_replace('/<button([^>]*?)>(\s*<span[^>]*?data-icon="dashboard"[^>]*?>dashboard<\/span>\s*<span[^>]*?>Dash<\/span>\s*)<\/button>/is', '<a href="/dashboard"$1>$2</a>', $content);
    $content = preg_replace('/<button([^>]*?)>(\s*<span[^>]*?data-icon="inventory_2"[^>]*?>inventory_2<\/span>\s*<span[^>]*?>Stock<\/span>\s*)<\/button>/is', '<a href="/inventory"$1>$2</a>', $content);
    $content = preg_replace('/<button([^>]*?)>(\s*<span[^>]*?data-icon="payments"[^>]*?>payments<\/span>\s*<span[^>]*?>Acct<\/span>\s*)<\/button>/is', '<a href="/Accounting"$1>$2</a>', $content);
    $content = preg_replace('/<button([^>]*?)>(\s*<span[^>]*?data-icon="groups"[^>]*?>groups<\/span>\s*<span[^>]*?>Clients<\/span>\s*)<\/button>/is', '<a href="/Clients"$1>$2</a>', $content);

    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "Updated " . basename($file) . "\n";
    }
}
?>
