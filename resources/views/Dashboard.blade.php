<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
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
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 200, 'GRAD' 0, 'opsz' 24;
        }

        .active-nav-fill {
            font-variation-settings: 'FILL' 1;
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md min-h-screen">
    <!-- SideNavBar -->
    <aside
        class="fixed left-0 top-0 h-full w-[280px] border-r border-stone-200 dark:border-stone-800 bg-stone-50 dark:bg-stone-950 flex flex-col h-full py-6 px-4 gap-4 z-[60]">
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
            <a class="flex items-center gap-3 px-3 py-3 text-amber-900 dark:text-amber-100 font-semibold border-r-4 border-amber-700 bg-stone-100 dark:bg-stone-900 transition-all duration-200 ease-in-out"
                href="/dashboard">
                <span class="material-symbols-outlined active-nav-fill" data-icon="dashboard">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-3 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out"
                href="/inventory">
                <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                <span class="font-label-md text-label-md">Inventory</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-3 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out"
                href="/Accounting">
                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                <span class="font-label-md text-label-md">Accounting</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-3 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out"
                href="/humanresources">
                <span class="material-symbols-outlined" data-icon="badge">badge</span>
                <span class="font-label-md text-label-md">Human Resources</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-3 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out"
                href="/Clients">
                <span class="material-symbols-outlined" data-icon="groups">groups</span>
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
    <!-- Main Content Area -->
    <main class="ml-[280px] min-h-screen flex flex-col">
        <!-- TopNavBar -->
        <header
            class="flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline"
                        data-icon="search">search</span>
                    <input
                        class="w-full pl-10 pr-4 py-1.5 bg-stone-100 dark:bg-stone-800 border-none rounded-full text-sm focus:ring-1 focus:ring-secondary transition-all"
                        placeholder="Search orders, batches, or artisans..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-r border-stone-200 pr-6">
                    <button class="text-stone-500 hover:bg-stone-100 p-2 rounded-full transition-colors relative">
                        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
                    </button>
                    <button class="text-stone-500 hover:bg-stone-100 p-2 rounded-full transition-colors">
                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="font-label-md text-label-md text-on-surface">Artisanal Logistics</p>
                        <p class="text-[10px] text-outline font-semibold tracking-wider">PREMIUM PARTNER</p>
                    </div>
                    <img alt="User profile"
                        class="w-10 h-10 rounded-full border-2 border-surface-container object-cover"
                        data-alt="Professional headshot of a master chocolatier wearing a clean white chef coat in a bright modern kitchen"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVELqwVQCtLuX2GFk9-EKSSeEZeJxq6FBGGfKTtt6Mo8EZyLJ2GcVpZil_gKlTWGTtWr1dWctHo2KrBdxZOg6G4LYddhq-vtdIeD92Xyznk8MtYmVRMQJKaXI2_GzB5q2Mxpm63TWkc5pBo9ZpIsgSY2pTTzKd4Ispfbrl6D76aRzgaSNB1DBouiTSYE5MsFi-0-DTEygclCxnwzphR1qHoeyFMz_VgmeLrbFCVjbHqW7CPuLl6Hu0MHKnoAALwn8jWPOg7fXjBw" />
                </div>
            </div>
        </header>
        <!-- Dashboard Canvas -->
        <div class="p-margin flex-1">
            <div class="mb-lg">
                <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Operations Overview</h2>
                <p class="font-body-md text-body-md text-outline">Welcome back, Master Chocolatier. Here is the current
                    status of the factory floors.</p>
            </div>
            <!-- Bento Grid Layout -->
            <div class="grid grid-cols-12 gap-gutter">
                <!-- Hero Card: Real-time Production -->
                <div
                    class="col-span-12 lg:col-span-8 h-[420px] bg-primary-container rounded-xl overflow-hidden relative group">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent z-10"></div>
                    <img alt="Production Flow"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        data-alt="Slow-motion pour of rich melted dark chocolate being tempered in a large stainless steel industrial vat, steam rising"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBceb7mLWAiCgjQEooQ_CkRhMmjeEOQ0vNDnHwMIsIT3u4D_8n6410uwBNxNOK4Ks1d9ex-HsldBjF4oKsPh8L49g-VmZY_vf9CWpObEmlSpe6ZLgEUAJutd2vuPwKaUVBhF52onw7B6XHqT_VjQUjjrSr-gTKtiO4jWOU99zPHUdNPVCAQVaWibHYGQrjxnqNK9wqCDkk1m7VwQGMIwZxQhAb7S-ojoZh9tN17Kup1iBZiByHNoqiaDE-1l5R0HM0lwLVzv80rYQ" />
                    <div class="absolute bottom-0 left-0 p-lg z-20 w-full flex justify-between items-end">
                        <div>
                            <span
                                class="inline-block px-3 py-1 bg-secondary text-on-secondary rounded-full text-label-sm font-label-sm mb-base">LIVE
                                PRODUCTION</span>
                            <h3 class="font-display-xl text-display-xl text-on-primary mb-base">The 'Noir 72' Batch</h3>
                            <p class="text-primary-fixed-dim font-body-lg text-body-lg max-w-lg">Tempering phase active.
                                Maintaining optimal 32°C. Next pouring scheduled in 14 minutes.</p>
                        </div>
                        <div
                            class="bg-surface/10 backdrop-blur-md p-md rounded-xl border border-white/10 text-center min-w-[140px]">
                            <p class="text-on-primary font-display-xl text-display-xl leading-none">88%</p>
                            <p class="text-primary-fixed-dim text-label-sm mt-xs">COMPLETION</p>
                        </div>
                    </div>
                </div>
                <!-- Module Card: Inventory -->
                <div
                    class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-xl shadow-sm border border-stone-100 p-gutter flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div
                            class="w-14 h-14 bg-surface-container-low rounded-xl flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[32px]"
                                data-icon="inventory_2">inventory_2</span>
                        </div>
                        <span class="text-error font-label-sm text-label-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]" data-icon="warning">warning</span>
                            Low Stock
                        </span>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-primary mt-base">Inventory</h4>
                        <p class="text-outline font-body-md text-body-md mt-xs">Manage raw cocoa beans, specialized
                            sweeteners, and artisanal packaging supplies.</p>
                    </div>
                    <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                        <span class="text-label-md font-label-md text-on-surface">1,420 SKUs Active</span>
                        <a href="/inventory"
                            class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                            View Stock
                            <span class="material-symbols-outlined text-[18px]"
                                data-icon="arrow_forward">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <!-- Module Card: Accounting -->
                <div
                    class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-xl shadow-sm border border-stone-100 p-gutter flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div
                        class="w-14 h-14 bg-surface-container-low rounded-xl flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[32px]" data-icon="payments">payments</span>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-primary mt-base">Accounting</h4>
                        <p class="text-outline font-body-md text-body-md mt-xs">Financial oversight, batch cost
                            analysis, and international shipping revenue tracking.</p>
                    </div>
                    <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                        <span class="text-label-md font-label-md text-on-surface-variant">Q3 Report Ready</span>
                        <a href="/Accounting"
                            class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                            Open Ledger
                            <span class="material-symbols-outlined text-[18px]"
                                data-icon="arrow_forward">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <!-- Module Card: Clients -->
                <div
                    class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-xl shadow-sm border border-stone-100 p-gutter flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div
                        class="w-14 h-14 bg-surface-container-low rounded-xl flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[32px]" data-icon="groups">groups</span>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-primary mt-base">Clients</h4>
                        <p class="text-outline font-body-md text-body-md mt-xs">Relationship management for luxury
                            retailers, boutique hotels, and wholesale distributors.</p>
                    </div>
                    <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                        <div class="flex -space-x-2">
                            <img alt="Client 1" class="w-8 h-8 rounded-full border-2 border-white"
                                data-alt="Avatar of a business professional"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPu6xbdp-WyP-JjbeGSrcZvPzrAz-snvQDUnrq64Y3KMf4c_GihHhjzP5AyfQ7UHAZMqBDeGts58gAZxOUKk4U1G3E0iXzQY_P7toNRrd2akLywGVFABvVGFcj-uzzGtuYmZwX9Oey_YYs0dnfdUxXX16Ytm6E_U_9lz1S1N6IRxydERHARvlZChWGdALRCixNz92Nk3h9yJffL9qMPda5Sn5jKBQxFMK5Ee8-ssOSQc9flrxeoFJnj_FWjqOK_a4prTo72UUffg" />
                            <img alt="Client 2" class="w-8 h-8 rounded-full border-2 border-white"
                                data-alt="Avatar of a boutique owner"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXDfN__NUTJsfAP4yBZfcyFitv9492N31H_Hdl-2tH0yfT0-HaYeb414jrm8sYTEC3c3xwhgILDFlrOW2nczCfKyc6fGHVg2uFpuCpkxep-lwsqpr7ViSavmevt-JWCgFNB8JVQLtEQOMES_rKcSalbsOrclkkJUxulugwCr8aHKDLfk-6S_EBRrBov6uxUoZYB_tEn0f8ioC9kom34ELj_Y1vT8ydo4Dbc_hYQULY7BqgD5qewODWdJO8BjJLjYdnpfrtP9SxwA" />
                            <img alt="Client 3" class="w-8 h-8 rounded-full border-2 border-white"
                                data-alt="Avatar of a hotel manager"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD38XqxX21ZX3jAEg6s2ol6NsAZcIb_7C35qGZKjPaT6WSoS92iUiyhAcCItl4IjeXasEpWapICckJuK2PhXouOZqMKqKiDEorBaxrr1IIlUnIq6cdMHScbehdRmieVaJTJHmlmZv5vwCSvyxnVF2moFrH-BLwhqaZhIvtKairMe18bCX6-5RXbMnod3NXRE76JXyHvLrEgCv7Y7umWoW0t9TljWFhu_AH5YmCogf1PNhIgSJnwetNhP6eX_F5k-l_qJnvsw4rhNQ" />
                            <div
                                class="w-8 h-8 rounded-full border-2 border-white bg-stone-100 flex items-center justify-center text-[10px] font-bold">
                                +12</div>
                        </div>
                        <a href="/Clients"
                            class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                            Directory
                            <span class="material-symbols-outlined text-[18px]"
                                data-icon="arrow_forward">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <!-- Module Card: Human Resources -->
                <div
                    class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-xl shadow-sm border border-stone-100 p-gutter flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div
                        class="w-14 h-14 bg-surface-container-low rounded-xl flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[32px]" data-icon="badge">badge</span>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-primary mt-base">Human Resources</h4>
                        <p class="text-outline font-body-md text-body-md mt-xs">Shift scheduling for artisans, safety
                            certifications, and performance rewards.</p>
                    </div>
                    <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                        <span class="text-label-md font-label-md text-on-surface">42 Artisans On-site</span>
                        <a href="/humanresources"
                            class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                            Staff Portal
                            <span class="material-symbols-outlined text-[18px]"
                                data-icon="arrow_forward">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <!-- Module Card: Design (Custom Module) -->
                <div
                    class="col-span-12 lg:col-span-12 bg-white rounded-xl shadow-sm border border-stone-100 p-gutter flex items-center gap-lg hover:shadow-md transition-shadow">
                    <div
                        class="w-24 h-24 bg-surface-container-low rounded-xl flex items-center justify-center text-primary shrink-0">
                        <span class="material-symbols-outlined text-[48px]" data-icon="brush">brush</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-xs">
                            <h4 class="font-headline-md text-headline-md text-primary">Artisanal Design Studio</h4>
                            <span
                                class="px-3 py-1 bg-surface-container-high text-on-primary-fixed-variant rounded-full text-label-sm font-label-sm">EXPERIMENTAL</span>
                        </div>
                        <p class="text-outline font-body-md text-body-md max-w-3xl">Prototype new flavor profiles,
                            design limited-edition packaging patterns, and simulate 3D chocolate mold geometries for
                            seasonal collections.</p>
                    </div>
                    <div class="shrink-0 flex flex-col gap-2">
                        <button
                            class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">Launch
                            Studio</button>
                        <button
                            class="border border-outline-variant text-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:bg-stone-50 transition-colors">View
                            Archives</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer / Technical Info -->
        <footer class="mt-xl px-margin py-base border-t border-stone-200 flex justify-between items-center bg-white/50">
            <p class="text-label-sm font-label-sm text-outline">System Status: <span class="text-secondary">Fully
                    Operational</span> • Last Inventory Sync: 3 minutes ago</p>
            <p class="text-label-sm font-label-sm text-outline">© 2024 Artisanal Logistics. CocoaMaster v2.4.1</p>
        </footer>
    </main>
    <!-- Floating Action Button (FAB) - Only for Main Dashboard Actions -->
    <a href="/batchregister"
        class="fixed bottom-margin right-margin w-14 h-14 bg-primary text-on-primary rounded-full shadow-lg flex items-center justify-center hover:scale-105 active:scale-95 transition-transform z-[70]">
        <span class="material-symbols-outlined text-[28px]" data-icon="add">add</span>
    </a>
</body>

</html>