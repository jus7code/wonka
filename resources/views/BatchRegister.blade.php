<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Register Batch - CocoaMaster</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .cocoa-shadow {
            box-shadow: 0 10px 30px -10px rgba(61, 43, 31, 0.08);
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md min-h-screen flex">
    <!-- SideNavBar (Shared Component) -->
    <aside
        class="fixed left-0 top-0 h-full w-[280px] border-r border-stone-200 bg-stone-50 flex flex-col h-full py-6 px-4 gap-4 z-50">
        <div class="flex flex-col gap-1 mb-6 px-2">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-on-primary">
                    <span class="material-symbols-outlined"
                        style="font-variation-settings: 'FILL' 1;">bakery_dining</span>
                </div>
                <div>
                    <h1 class="text-lg font-black text-amber-900 tracking-tight">CocoaMaster</h1>
                    <p class="text-xs text-stone-500 font-medium">Reliable Craftsmanship</p>
                </div>
            </div>
        </div>
        <nav class="flex flex-col gap-1">
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 hover:bg-stone-200 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="/dashboard">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-amber-900 font-semibold border-r-4 border-amber-700 bg-stone-100 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="/inventory">
                <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                <span>Inventory</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 hover:bg-stone-200 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="/Accounting">
                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                <span>Accounting</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 hover:bg-stone-200 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="/humanresources">
                <span class="material-symbols-outlined" data-icon="badge">badge</span>
                <span>Human Resources</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 hover:bg-stone-200 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="/Clients">
                <span class="material-symbols-outlined" data-icon="groups">groups</span>
                <span>Clients</span>
            </a>
        </nav>
        <div class="mt-4 px-2">
            <a href="/batchregister"
                class="w-full py-3 px-4 bg-primary text-on-primary rounded-lg font-semibold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">
                <span class="material-symbols-outlined">add</span>
                <span>New Batch</span>
            </a>
        </div>
        <div class="mt-auto pt-6 border-t border-stone-200 flex flex-col gap-1">
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 hover:bg-stone-200 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="#">
                <span class="material-symbols-outlined" data-icon="contact_support">contact_support</span>
                <span>Support</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 hover:bg-stone-200 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                href="/">
                <span class="material-symbols-outlined" data-icon="logout">logout</span>
                <span>Log Out</span>
            </a>
        </div>
    </aside>
    <!-- Main Content Canvas -->
    <main class="flex-1 ml-[280px] p-xl bg-background overflow-y-auto">
        <!-- Header -->
        <header class="max-w-5xl mx-auto mb-lg">
            <a href="/inventory" class="flex items-center gap-2 text-outline mb-base hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                <span class="font-label-md text-label-md">Back to Inventory</span>
            </a>
            <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Register New Batch</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Log production details and generate tracking
                assets for the new artisan series.</p>
        </header>
        <!-- Form Layout (Bento-style Grid) -->
        <form class="max-w-5xl mx-auto grid grid-cols-12 gap-gutter">
            <!-- Left Column: Primary Details -->
            <div class="col-span-12 lg:col-span-7 flex flex-col gap-gutter">
                <!-- Main Info Card -->
                <div class="bg-surface-container-lowest p-md rounded-xl cocoa-shadow border border-outline-variant/30">
                    <div class="flex items-center gap-2 mb-md">
                        <span class="material-symbols-outlined text-secondary">info</span>
                        <h3 class="font-headline-md text-headline-md text-primary">Batch Identity</h3>
                    </div>
                    <div class="space-y-md">
                        <div class="flex flex-col gap-xs">
                            <label class="font-label-md text-label-md text-on-surface">Product Name</label>
                            <input
                                class="w-full bg-white border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                placeholder="e.g. Tanzanian Single Origin Dark 70%" type="text" />
                        </div>
                        <div class="grid grid-cols-2 gap-md">
                            <div class="flex flex-col gap-xs">
                                <label class="font-label-md text-label-md text-on-surface">Unit Price ($)</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-outline">$</span>
                                    <input
                                        class="w-full bg-white border border-outline-variant rounded-lg p-3 pl-8 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                        placeholder="0.00" type="number" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-xs">
                                <label class="font-label-md text-label-md text-on-surface">Batch Quantity</label>
                                <input
                                    class="w-full bg-white border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                    placeholder="100" type="number" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Logistics & Details -->
                <div class="bg-surface-container-lowest p-md rounded-xl cocoa-shadow border border-outline-variant/30">
                    <div class="flex items-center gap-2 mb-md">
                        <span class="material-symbols-outlined text-secondary">factory</span>
                        <h3 class="font-headline-md text-headline-md text-primary">Manufacturing Metadata</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-md">
                        <div class="flex flex-col gap-xs">
                            <label class="font-label-md text-label-md text-on-surface">Processing Line</label>
                            <select
                                class="w-full bg-white border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all">
                                <option>Artisanal Conche A</option>
                                <option>Industrial Melanger B</option>
                                <option>Small Batch Tempere C</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-xs">
                            <label class="font-label-md text-label-md text-on-surface">Expiry Target</label>
                            <input
                                class="w-full bg-white border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                type="date" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column: Media & Actions -->
            <div class="col-span-12 lg:col-span-5 flex flex-col gap-gutter">
                <!-- Media Upload Card -->
                <div
                    class="bg-surface-container-lowest p-md rounded-xl cocoa-shadow border border-outline-variant/30 flex-1">
                    <div class="flex items-center gap-2 mb-md">
                        <span class="material-symbols-outlined text-secondary">image</span>
                        <h3 class="font-headline-md text-headline-md text-primary">Product Visuals</h3>
                    </div>
                    <div
                        class="relative w-full aspect-square bg-surface-container rounded-lg border-2 border-dashed border-outline-variant flex flex-col items-center justify-center gap-base hover:bg-surface-container-high transition-colors cursor-pointer group">
                        <img alt="Chocolate Artisan Product"
                            class="absolute inset-0 w-full h-full object-cover rounded-lg opacity-20 group-hover:opacity-40 transition-opacity"
                            data-alt="Close-up of artisan chocolate truffles with gold leaf detail on a stone surface with soft morning light"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBpoEIEPPpLow4Qjyh1mKdRHIh0rR7K-4luCGNFQwKNWrLOc7FMnTNYnsMNVWDix-Q0drtoggl3g41yggz404uitXT5hERE2k3e4vhMBNhtejW2aPU-vbuAyNhc2MfjOFOUF4DuqtUY6HavBG24aFjwXrZtg9XKLdjjIWWg90zz_kkN1H4F9P62Uiw7glLa8Vsgh5qErK_5c20iqEvMMkXAvmmcfO696nEy3mOsUKhe-noxUhuQAL0MVnjQ69Py0Vvl0RH7Gt9zQ" />
                        <span
                            class="material-symbols-outlined text-display-xl text-primary relative">cloud_upload</span>
                        <div class="text-center relative">
                            <p class="font-label-md text-label-md text-primary">Drag and drop or click to upload</p>
                            <p class="text-xs text-outline">High-res PNG or JPG (Max 5MB)</p>
                        </div>
                    </div>
                </div>
                <!-- Final Actions Card -->
                <div class="bg-primary-container p-md rounded-xl cocoa-shadow text-on-primary">
                    <div class="flex items-center gap-2 mb-md">
                        <span class="material-symbols-outlined text-secondary-fixed">qr_code_2</span>
                        <h3 class="font-headline-md text-headline-md text-on-primary">Batch Fulfillment</h3>
                    </div>
                    <p class="text-on-primary-container text-sm mb-lg">Ready to finalize? This will register the batch
                        and generate unique tracking identifiers for each unit.</p>
                    <div class="flex flex-col gap-base">
                        <button
                            class="w-full py-4 bg-secondary-container text-on-secondary-container font-bold rounded-lg flex items-center justify-center gap-2 hover:bg-secondary-fixed transition-colors"
                            type="submit">
                            <span class="material-symbols-outlined">qr_code_scanner</span>
                            Generate &amp; Download QRs
                        </button>
                        <button
                            class="w-full py-3 text-on-primary-container font-semibold rounded-lg border border-on-primary-container/20 hover:bg-white/5 transition-colors"
                            type="button">
                            Save as Draft
                        </button>
                    </div>
                </div>
            </div>
            <!-- Full Width Notification/Status Area -->
            <div class="col-span-12">
                <div
                    class="bg-surface-container-low p-md rounded-xl flex items-center justify-between border border-outline-variant/20">
                    <div class="flex items-center gap-md">
                        <div
                            class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined">inventory</span>
                        </div>
                        <div>
                            <h4 class="font-label-md text-label-md text-primary">Current Inventory Status</h4>
                            <p class="text-sm text-on-surface-variant">Once registered, this batch will increase total
                                stock of 'Artisan Series' by <span class="font-bold text-secondary">100 units</span>.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-base">
                        <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
                        <span class="text-xs font-semibold text-outline tracking-widest uppercase">Awaiting
                            Submission</span>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- Contextual FAB (Only for main screens, but kept here for potential secondary flow as per user requirement) -->
    <!-- Suppression rule applied: FAB suppressed on form/transactional page -->
</body>

</html>