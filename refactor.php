<?php
$files = ['Dashboard.blade.php', 'Inventory.blade.php', 'Accounting.blade.php', 'HumanR.blade.php', 'Clients.blade.php', 'BatchRegister.blade.php'];

foreach($files as $f) {
    $path = __DIR__.'/resources/views/'.$f;
    $content = file_get_contents($path);
    
    $header = "";
    $mainContent = "";
    $fab = "";
    $styles = "";

    // Extract extra styles
    if (preg_match('/<style>(.*?)<\/style>/is', $content, $mStyle)) {
        $styleContent = $mStyle[1];
        if (strpos($styleContent, '.cocoa-shadow') !== false) {
            $styles = "    <style>\n        .cocoa-shadow {\n            box-shadow: 0 10px 30px -10px rgba(61, 43, 31, 0.08);\n        }\n    </style>";
        }
        if (strpos($styleContent, '.hide-scrollbar') !== false) {
            $styles .= "\n    <style>\n        .hide-scrollbar::-webkit-scrollbar { display: none; }\n        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }\n    </style>";
        }
    }

    // Find the header (top nav)
    if (preg_match('/<header[^>]*w-full px-6 py-3 h-16[^>]*>.*?<\/header>/is', $content, $mHeader)) {
        $header = $mHeader[0];
        $contentAfterHeader = explode($header, $content)[1];
        if (preg_match('/^(.*?)(?:<\/main>)/is', $contentAfterHeader, $mMain)) {
            $mainContent = trim($mMain[1]);
        }
    } else {
        // extract everything inside <main ...> and </main>
        if (preg_match('/<main[^>]*>(.*?)<\/main>/is', $content, $mMain)) {
            $mainContent = trim($mMain[1]);
        }
    }
    
    // Check for FAB (Floating Action Button) after main
    if (preg_match('/<\/main>\s*(<a[^>]*fixed bottom-margin[^>]*>.*?<\/a>)/is', $content, $mFab)) {
        $fab = "\n\n    " . $mFab[1];
    }

    $newContent = "@extends('layouts.app')\n\n";
    if ($styles) {
        $newContent .= "@section('styles')\n" . $styles . "\n@endsection\n\n";
    }
    if ($header) {
        $newContent .= "@section('header')\n    " . str_replace("\n", "\n    ", $header) . "\n@endsection\n\n";
    }
    $newContent .= "@section('content')\n    " . str_replace("\n", "\n    ", $mainContent) . $fab . "\n@endsection\n";
    
    file_put_contents($path, $newContent);
    echo "Refactored $f\n";
}
