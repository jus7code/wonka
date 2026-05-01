@php
    function navClass($route) {
        $base = 'flex items-center gap-3 px-3 py-3 transition-all duration-200 ease-in-out';
        if (request()->is($route)) {
            return $base . ' text-amber-900 dark:text-amber-100 font-semibold border-r-4 border-amber-700 bg-stone-100 dark:bg-stone-900';
        }
        return $base . ' text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800';
    }

    function iconClass($route) {
        return request()->is($route) ? 'material-symbols-outlined active-nav-fill' : 'material-symbols-outlined';
    }
@endphp

<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full w-[280px] border-r border-stone-200 dark:border-stone-800 bg-stone-50 dark:bg-stone-950 flex flex-col h-full py-6 px-4 gap-4 z-[60]">
    <div class="flex items-center gap-3 px-2 mb-6">
        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center overflow-hidden">
            <img alt="Chocolate Factory Logo" class="w-8 h-8"
                data-alt="Minimalist gold foil cocoa pod emblem on a dark chocolate brown background"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3gD7pOWCu7syh5E-ZtPduH5R_OIKskh2KlYR7y9tUgzuln9tZY1-ndujAkWpRcUo9Ri8cmdsi170PI7zl_J3fUgSUOwDqSYrZQMWP-wN__0T79li1mu_eYx2oCyRzcoKDMe-5cCwlwrHMU5heRFnfCry2hmZum2p5knOQ1gyJQ_ijJNR4JesiCw8kKG_453nkBdCOzwxecqeNC9iXcw_0JUEVRamxkK-XHpPC0K8qLeGJ13B4vFE_LAiapwJ2eaYfHn_Q3tVLNg" />
        </div>
        <div>
            <h1 class="text-lg font-black text-amber-900 dark:text-amber-50 leading-tight">CocoaMaster</h1>
            <p class="text-[10px] uppercase tracking-widest text-secondary font-bold">Reliable Craftsmanship</p>
        </div>
    </div>
    <nav class="flex-1 space-y-1">
        <a class="{{ navClass('dashboard') }}" href="/dashboard">
            <span class="{{ iconClass('dashboard') }}" data-icon="dashboard">dashboard</span>
            <span class="font-label-md text-label-md">Dashboard</span>
        </a>
        <a class="{{ navClass('inventory') }}" href="/inventory">
            <span class="{{ iconClass('inventory') }}" data-icon="inventory_2">inventory_2</span>
            <span class="font-label-md text-label-md">Inventory</span>
        </a>
        <a class="{{ navClass('Accounting') }}" href="/Accounting">
            <span class="{{ iconClass('Accounting') }}" data-icon="payments">payments</span>
            <span class="font-label-md text-label-md">Accounting</span>
        </a>
        <a class="{{ navClass('humanresources') }}" href="/humanresources">
            <span class="{{ iconClass('humanresources') }}" data-icon="badge">badge</span>
            <span class="font-label-md text-label-md">Human Resources</span>
        </a>
        <a class="{{ navClass('Clients') }}" href="/Clients">
            <span class="{{ iconClass('Clients') }}" data-icon="groups">groups</span>
            <span class="font-label-md text-label-md">Clients</span>
        </a>
    </nav>
    <div class="mt-auto pt-6 border-t border-stone-200 dark:border-stone-800 space-y-1">
        <a href="/batchregister"
            class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary py-3 rounded-lg font-label-md text-label-md mb-4 hover:opacity-90 transition-opacity">
            <span class="material-symbols-outlined text-[20px]" data-icon="add_circle">add_circle</span>
            New Batch
        </a>
        <a class="flex items-center gap-3 px-3 py-2 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out"
            href="#">
            <span class="material-symbols-outlined" data-icon="contact_support">contact_support</span>
            <span class="font-label-md text-label-md">Support</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out"
            href="/">
            <span class="material-symbols-outlined" data-icon="logout">logout</span>
            <span class="font-label-md text-label-md">Log Out</span>
        </a>
    </div>
</aside>
