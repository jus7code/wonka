<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Accounting - Artisanal Logistics</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "outline": "#81756e",
                        "on-primary": "#ffffff",
                        "primary-fixed-dim": "#dec1af",
                        "on-primary-container": "#ac9181",
                        "secondary-fixed": "#ffdf9d",
                        "surface-container": "#fdeadf",
                        "primary": "#26170c",
                        "on-tertiary-fixed-variant": "#484743",
                        "surface-bright": "#fff8f5",
                        "on-primary-fixed": "#28180d",
                        "tertiary-fixed": "#e6e2dd",
                        "on-secondary-fixed-variant": "#5b4300",
                        "outline-variant": "#d2c4bc",
                        "on-tertiary-fixed": "#1c1c19",
                        "secondary": "#785a00",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#e9d7cb",
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#ffede3",
                        "surface-container-lowest": "#ffffff",
                        "surface-variant": "#f1dfd4",
                        "secondary-fixed-dim": "#ebc162",
                        "inverse-primary": "#dec1af",
                        "on-secondary-container": "#775800",
                        "on-tertiary-container": "#999692",
                        "on-surface": "#231a13",
                        "tertiary": "#1b1a18",
                        "on-surface-variant": "#4f453f",
                        "background": "#fff8f5",
                        "on-error-container": "#93000a",
                        "tertiary-fixed-dim": "#c9c6c1",
                        "surface-container-high": "#f7e5d9",
                        "surface-container-low": "#fff1e9",
                        "primary-container": "#3d2b1f",
                        "tertiary-container": "#302f2c",
                        "error-container": "#ffdad6",
                        "on-background": "#231a13",
                        "error": "#ba1a1a",
                        "secondary-container": "#fdd170",
                        "surface-tint": "#705a4c",
                        "surface-container-highest": "#f1dfd4",
                        "surface": "#fff8f5",
                        "inverse-surface": "#392e27",
                        "on-primary-fixed-variant": "#574335",
                        "on-error": "#ffffff",
                        "primary-fixed": "#fbddca",
                        "on-secondary-fixed": "#251a00"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "sm": "12px",
                        "base": "8px",
                        "lg": "48px",
                        "gutter": "24px",
                        "xl": "80px",
                        "xs": "4px",
                        "md": "24px",
                        "margin": "32px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-xl": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "display-xl": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #fff8f5;
        }
    </style>
</head>

<body class="font-body-md text-on-background">
    <!-- TopNavBar -->
    <header
        class="bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50">
        <div class="flex items-center gap-md">
            <span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">Artisanal Logistics</span>
        </div>
        <div class="flex items-center gap-sm">
            <div class="flex items-center gap-4 mr-6">
                <span
                    class="text-stone-500 dark:text-stone-400 font-inter text-sm hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors px-3 py-1 rounded cursor-pointer">Help</span>
            </div>
            <div class="flex gap-4">
                <span
                    class="material-symbols-outlined text-amber-900 dark:text-amber-100 cursor-pointer">notifications</span>
                <span
                    class="material-symbols-outlined text-amber-900 dark:text-amber-100 cursor-pointer">settings</span>
            </div>
            <div class="w-8 h-8 rounded-full overflow-hidden ml-4">
                <img alt="User profile" class="w-full h-full object-cover"
                    data-alt="close-up portrait of a professional chef wearing a clean white uniform in a high-end kitchen setting"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRt_-Q-_8EKLS3rn-2xu41TOuxhTTCffFvYzpl8KDjFNxmUJLRr8tAw1LL6NFAzVpXexXtbqYLgoEPO3z1wR-Qv7Hh698kF-VaFgWCxWK6DoNkD9kT_XVPm7teolLRfLlr9Cwiv6HwZ8QCfitNsz1jYuj6DAvbT-rqEYfDHazElvHkDRqzJjaB2T4FGmJf62WfFonK9s5dvBAENo7UaR96FmfGHzSb4OCngg7jdVgAlipcpTYUWUzFdVZyBg6MvhCYQKa0bYBJHg" />
            </div>
        </div>
    </header>
    <div class="flex">
        <!-- SideNavBar -->
        <aside
            class="bg-stone-50 dark:bg-stone-950 fixed left-0 top-0 h-full w-[280px] border-r border-stone-200 dark:border-stone-800 flex flex-col h-full py-6 px-4 gap-4 z-40">
            <div class="mb-6 px-2 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg overflow-hidden bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-secondary"
                        style="font-variation-settings: 'FILL' 1;">bakery_dining</span>
                </div>
                <div>
                    <h1 class="text-lg font-black text-amber-900 dark:text-amber-50 leading-tight">CocoaMaster</h1>
                    <p class="text-xs text-stone-600 dark:text-stone-400">Reliable Craftsmanship</p>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                    href="/dashboard">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    Dashboard
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                    href="/inventory">
                    <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                    Inventory
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-amber-900 dark:text-amber-100 font-semibold border-r-4 border-amber-700 bg-stone-100 dark:bg-stone-900 transition-all duration-200 ease-in-out font-inter text-sm"
                    href="/Accounting">
                    <span class="material-symbols-outlined" data-icon="payments"
                        style="font-variation-settings: 'FILL' 1;">payments</span>
                    Accounting
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                    href="/humanresources">
                    <span class="material-symbols-outlined" data-icon="badge">badge</span>
                    Human Resources
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                    href="/Clients">
                    <span class="material-symbols-outlined" data-icon="groups">groups</span>
                    Clients
                </a>
            </nav>
            <div class="mt-auto pt-6 border-t border-stone-200 dark:border-stone-800 space-y-1">
                <a href="/batchregister"
                    class="w-full bg-primary text-on-primary py-3 rounded-xl font-semibold mb-4 hover:opacity-90 transition-opacity">
                    New Batch
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="contact_support">contact_support</span>
                    Support
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                    href="/">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    Log Out
                </a>
            </div>
        </aside>
        <!-- Main Content Canvas -->
        <main class="ml-[280px] w-full min-h-screen bg-background p-margin">
            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-lg gap-gutter">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Accounting Ledger</h2>
                    <p class="font-body-md text-on-surface-variant">Real-time financial tracking for chocolate
                        production and distribution.</p>
                </div>
                <div class="flex gap-base">
                    <button
                        class="px-6 py-3 border border-secondary text-secondary rounded-lg font-semibold flex items-center gap-2 hover:bg-secondary-container/10 transition-colors">
                        <span class="material-symbols-outlined text-lg">analytics</span>
                        View Indicators
                    </button>
                    <button
                        class="px-6 py-3 bg-primary text-on-primary rounded-lg font-semibold flex items-center gap-2 shadow-sm hover:opacity-90 transition-opacity">
                        <span class="material-symbols-outlined text-lg">shopping_cart</span>
                        Make Purchase
                    </button>
                </div>
            </div>
            <!-- Dashboard Highlights (Bento Grid Style) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-lg">
                <div
                    class="p-md bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant flex flex-col justify-between">
                    <div>
                        <p class="text-label-sm font-label-sm text-outline uppercase tracking-wider mb-sm">Total Revenue
                        </p>
                        <p class="text-headline-md font-headline-md text-primary">$124,500.00</p>
                    </div>
                    <div class="mt-sm flex items-center gap-xs text-secondary">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        <span class="text-label-sm font-label-sm">+12.5% this month</span>
                    </div>
                </div>
                <div
                    class="p-md bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant flex flex-col justify-between">
                    <div>
                        <p class="text-label-sm font-label-sm text-outline uppercase tracking-wider mb-sm">Operational
                            Expenses</p>
                        <p class="text-headline-md font-headline-md text-primary">$48,210.40</p>
                    </div>
                    <div class="mt-sm flex items-center gap-xs text-error">
                        <span class="material-symbols-outlined text-sm">trending_down</span>
                        <span class="text-label-sm font-label-sm">-4.2% versus last week</span>
                    </div>
                </div>
                <div
                    class="p-md bg-primary-container rounded-xl shadow-sm flex flex-col justify-between overflow-hidden relative">
                    <div class="relative z-10">
                        <p class="text-label-sm font-label-sm text-primary-fixed uppercase tracking-wider mb-sm">Net
                            Margin</p>
                        <p class="text-headline-md font-headline-md text-white">$76,289.60</p>
                    </div>
                    <div class="mt-sm relative z-10 flex items-center gap-xs text-secondary-fixed">
                        <span class="material-symbols-outlined text-sm">verified</span>
                        <span class="text-label-sm font-label-sm">Financial health: Excellent</span>
                    </div>
                    <div class="absolute -right-4 -bottom-4 opacity-10">
                        <span class="material-symbols-outlined text-9xl text-white">payments</span>
                    </div>
                </div>
            </div>
            <!-- Main Ledger Table -->
            <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant overflow-hidden">
                <div
                    class="p-gutter border-b border-outline-variant flex justify-between items-center bg-surface-container-low/30">
                    <div class="flex items-center gap-md">
                        <h3 class="font-headline-md text-headline-md text-primary">Transaction History</h3>
                        <div class="flex gap-xs">
                            <span
                                class="px-3 py-1 bg-secondary-container text-on-secondary-container text-label-sm rounded-full">All
                                Accounts</span>
                            <span
                                class="px-3 py-1 bg-surface-variant text-on-surface-variant text-label-sm rounded-full">Q3
                                2023</span>
                        </div>
                    </div>
                    <div class="flex gap-sm">
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
                            <input
                                class="pl-10 pr-4 py-2 border border-outline-variant rounded-lg bg-surface focus:border-secondary focus:ring-0 text-sm font-body-md w-64"
                                placeholder="Search transactions..." type="text" />
                        </div>
                        <button
                            class="p-2 border border-outline-variant rounded-lg hover:bg-surface-variant transition-colors">
                            <span class="material-symbols-outlined">filter_list</span>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-surface-container-low/50">
                            <tr>
                                <th
                                    class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                    Transaction Details</th>
                                <th
                                    class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant">
                            <tr class="hover:bg-surface-container-low/40 transition-colors">
                                <td class="px-gutter py-md font-label-md text-primary">Oct 24, 2023</td>
                                <td class="px-gutter py-md">
                                    <div class="flex items-center gap-sm">
                                        <div
                                            class="w-8 h-8 rounded bg-surface-container flex items-center justify-center">
                                            <span
                                                class="material-symbols-outlined text-primary text-sm">inventory</span>
                                        </div>
                                        <div>
                                            <p class="font-body-md font-semibold text-primary">Ghanaian Cocoa Bulk
                                                Purchase</p>
                                            <p class="text-label-sm text-outline">TXN-998122 • Bean Source Ltd.</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-gutter py-md">
                                    <span
                                        class="px-3 py-1 bg-amber-100 text-amber-800 text-[11px] font-bold rounded-full uppercase tracking-tighter">Raw
                                        Materials</span>
                                </td>
                                <td class="px-gutter py-md font-body-md text-error font-semibold">-$12,450.00</td>
                                <td class="px-gutter py-md text-right">
                                    <button class="text-outline hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined">edit</span></button>
                                    <button class="text-outline hover:text-primary transition-colors ml-4"><span
                                            class="material-symbols-outlined">more_vert</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/40 transition-colors">
                                <td class="px-gutter py-md font-label-md text-primary">Oct 22, 2023</td>
                                <td class="px-gutter py-md">
                                    <div class="flex items-center gap-sm">
                                        <div
                                            class="w-8 h-8 rounded bg-surface-container flex items-center justify-center">
                                            <span
                                                class="material-symbols-outlined text-primary text-sm">local_shipping</span>
                                        </div>
                                        <div>
                                            <p class="font-body-md font-semibold text-primary">European Distribution -
                                                Batch A4</p>
                                            <p class="text-label-sm text-outline">TXN-998120 • Grand Hotel Paris</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-gutter py-md">
                                    <span
                                        class="px-3 py-1 bg-green-100 text-green-800 text-[11px] font-bold rounded-full uppercase tracking-tighter">Sales
                                        Income</span>
                                </td>
                                <td class="px-gutter py-md font-body-md text-secondary font-semibold">+$28,300.00</td>
                                <td class="px-gutter py-md text-right">
                                    <button class="text-outline hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined">edit</span></button>
                                    <button class="text-outline hover:text-primary transition-colors ml-4"><span
                                            class="material-symbols-outlined">more_vert</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/40 transition-colors">
                                <td class="px-gutter py-md font-label-md text-primary">Oct 21, 2023</td>
                                <td class="px-gutter py-md">
                                    <div class="flex items-center gap-sm">
                                        <div
                                            class="w-8 h-8 rounded bg-surface-container flex items-center justify-center">
                                            <span
                                                class="material-symbols-outlined text-primary text-sm">precision_manufacturing</span>
                                        </div>
                                        <div>
                                            <p class="font-body-md font-semibold text-primary">Tempering Machine
                                                Maintenance</p>
                                            <p class="text-label-sm text-outline">TXN-998115 • Swiss Precision Tools</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-gutter py-md">
                                    <span
                                        class="px-3 py-1 bg-stone-200 text-stone-800 text-[11px] font-bold rounded-full uppercase tracking-tighter">Maintenance</span>
                                </td>
                                <td class="px-gutter py-md font-body-md text-error font-semibold">-$2,100.00</td>
                                <td class="px-gutter py-md text-right">
                                    <button class="text-outline hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined">edit</span></button>
                                    <button class="text-outline hover:text-primary transition-colors ml-4"><span
                                            class="material-symbols-outlined">more_vert</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/40 transition-colors">
                                <td class="px-gutter py-md font-label-md text-primary">Oct 20, 2023</td>
                                <td class="px-gutter py-md">
                                    <div class="flex items-center gap-sm">
                                        <div
                                            class="w-8 h-8 rounded bg-surface-container flex items-center justify-center">
                                            <span
                                                class="material-symbols-outlined text-primary text-sm">storefront</span>
                                        </div>
                                        <div>
                                            <p class="font-body-md font-semibold text-primary">Direct Retail Payout</p>
                                            <p class="text-label-sm text-outline">TXN-998110 • Flagship Boutique NYC</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-gutter py-md">
                                    <span
                                        class="px-3 py-1 bg-green-100 text-green-800 text-[11px] font-bold rounded-full uppercase tracking-tighter">Sales
                                        Income</span>
                                </td>
                                <td class="px-gutter py-md font-body-md text-secondary font-semibold">+$4,550.00</td>
                                <td class="px-gutter py-md text-right">
                                    <button class="text-outline hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined">edit</span></button>
                                    <button class="text-outline hover:text-primary transition-colors ml-4"><span
                                            class="material-symbols-outlined">more_vert</span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div
                    class="p-gutter flex items-center justify-between bg-surface-container-low/30 border-t border-outline-variant">
                    <p class="text-label-sm text-outline font-label-sm">Showing 1-4 of 124 transactions</p>
                    <div class="flex gap-base">
                        <button
                            class="px-4 py-2 border border-outline-variant rounded-lg text-label-sm font-label-sm text-on-surface hover:bg-white transition-colors disabled:opacity-50">Previous</button>
                        <button
                            class="px-4 py-2 border border-outline-variant rounded-lg text-label-sm font-label-sm text-on-surface hover:bg-white transition-colors">Next</button>
                    </div>
                </div>
            </div>
            <!-- Secondary Analytics & Procurement Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter mt-lg">
                <div class="p-md bg-white rounded-xl border border-outline-variant shadow-sm flex flex-col gap-sm">
                    <div class="flex justify-between items-center">
                        <h4 class="font-headline-md text-primary">Procurement Status</h4>
                        <span class="material-symbols-outlined text-secondary">shopping_basket</span>
                    </div>
                    <div class="space-y-md">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-on-surface-variant">Active POs</span>
                            <span class="font-bold text-primary">12 Orders</span>
                        </div>
                        <div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
                            <div class="bg-secondary h-full" style="width: 65%;"></div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-on-surface-variant">Pending Approval</span>
                            <span class="font-bold text-secondary">3 Orders</span>
                        </div>
                        <div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
                            <div class="bg-primary h-full" style="width: 20%;"></div>
                        </div>
                    </div>
                    <button class="mt-base text-label-sm font-label-sm text-secondary hover:underline self-start">Manage
                        Supplier Contracts →</button>
                </div>
                <div
                    class="rounded-xl overflow-hidden relative border border-outline-variant shadow-sm h-full min-h-[200px]">
                    <img alt="Aerial view of logistics warehouse" class="w-full h-full object-cover"
                        data-alt="professional overhead view of a clean organized warehouse floor with wooden pallets and industrial machinery in soft morning light"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-t8kzbsR0cjQz7YVL3mnkgWcirQe3-H0f6R89M_qf7xkyLpbj_jFQbCW89CNBNLuddvlmjrJ8qBMQ1ag8ARmtS25hRGJfxCjVr6eN-NjyEFw6C1k5AcA2Fwxszj6AvnjXwD8eoDIGqfJ2mzZUBE34wxtMNmp0Q-Bliw7fUyycAxT9Xo1xLYLCmpImPK69rKZOLrraJ_1tJzQpKQKuihPWRrNSwGtWGSHRCQDHzWX0mBewa46IA_7Fx-KX24tCZpN3Pa6Isp7WQA" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-md">
                        <h4 class="text-white font-headline-md mb-xs">Supply Chain Insights</h4>
                        <p class="text-primary-fixed text-sm">Predictive maintenance saves 15% on monthly logistics
                            costs. View the full report.</p>
                        <button
                            class="mt-md px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-md text-white rounded-lg text-sm font-semibold transition-all">Review
                            Audit</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>