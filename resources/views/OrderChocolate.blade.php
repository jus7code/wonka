<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Client Purchase Portal | Artisanal Logistics</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "display-xl": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            background-color: #fff8f5;
        }
    </style>
</head>
<body class="font-body-md text-on-background">
<!-- TopNavBar -->
<nav class="flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm">
<div class="flex items-center gap-8">
<span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">Artisanal Logistics</span>
<div class="hidden md:flex gap-6">
<a class="font-inter text-sm font-semibold text-amber-700 dark:text-amber-300 border-b-2 border-amber-700 py-1" href="/OrderChocolate">Catalog</a>
<a class="font-inter text-sm text-stone-500 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors px-2 py-1 rounded" href="/inventory">Orders</a>
<a class="font-inter text-sm text-stone-500 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors px-2 py-1 rounded" href="#">Shipments</a>
</div>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden lg:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-sm">search</span>
<input class="bg-surface-container-low border border-outline-variant rounded-full py-1.5 pl-10 pr-4 text-sm focus:outline-none focus:border-secondary w-64" placeholder="Search batches..." type="text"/>
</div>
<button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<button class="flex items-center gap-2 px-4 py-1.5 bg-primary text-on-primary rounded-full font-label-md">
<span class="material-symbols-outlined text-[18px]" data-icon="help">help</span>
                Help
            </button>
<div class="h-8 w-8 rounded-full bg-surface-container overflow-hidden border border-outline-variant">
<img alt="User profile" class="w-full h-full object-cover" data-alt="Close-up professional portrait of a business executive with a warm, confident smile in a bright studio setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApyJGX3InGPWJF_BqvfDCAJwxz1OLkJuvSB0F-zrbPcXVCsKrk3FLegi56xodUG_wzMVbhb91lB14p3BYN5sP25PZUxP9Zv0m8P-rrnQnF9iZtX90hkG2uPNImpjVDmj6SBeo9gaTWJo0CeBMep-Bvm2OJxe6iDE5aGHffSUORalC8i67VMW7pT6oI6vSFYZJAbJZYi6r68J7BYO8isO8kOMMmD4huMQRANjHdqdicz1nVnCcJk1l-iBej_P2zmxp4jSWpgZftyQ"/>
</div>
</div>
</nav>
<main class="max-w-[1400px] mx-auto px-margin py-lg">
<!-- Hero Section -->
<header class="mb-xl grid grid-cols-1 lg:grid-cols-2 gap-md items-center">
<div>
<span class="font-label-sm text-secondary uppercase tracking-widest mb-base block">Premium Sourcing</span>
<h1 class="font-display-xl text-primary mb-md">Artisanal Batch Portal</h1>
<p class="font-body-lg text-on-surface-variant max-w-xl mb-md">
                    Secure your next inventory from our curated seasonal selection. Every batch is traceable to its organic cocoa estate, ensuring the highest standards of reliable craftsmanship.
                </p>
<div class="flex gap-4">
<a href="/inventory" class="bg-primary text-on-primary px-lg py-3 rounded-lg font-label-md flex items-center gap-2 hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined" data-icon="shopping_bag" style="font-variation-settings: 'FILL' 1;">shopping_bag</span>
                        View Active Lots
                    </a>
<button class="border border-secondary text-secondary px-lg py-3 rounded-lg font-label-md hover:bg-surface-container-low transition-colors">
                        Download Pricing List
                    </button>
</div>
</div>
<div class="relative h-[400px] rounded-xl overflow-hidden shadow-xl">
<img alt="Artisanal Chocolate" class="w-full h-full object-cover" data-alt="High-end studio shot of premium dark chocolate bars stacked elegantly on a stone surface with cocoa beans scattered around, warm ambient lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTLsukAzi5DpV2mUXsfKm2WM5BtvhWIepeKPcf-qRdR1s9NAhVEX1KGI7cvabZVtNC4oRmFr08Qhmjo65uWXgOO9b0mw3drw9AT_hlgAkn667AgfAcnG71cgmQpYoWnRyLhgVsfsL3K7I4OuPi1gllEzHjrXk5o6QboH1wnGvIbmk9vcszK1TCLlNn81pNmV8TChfPOP6X0RHvj6gr0SsrT4oy2h5cYjbQ3sDTIpcPwgfG-rlQ2OvvHnLPUbOk4rjnZl-Opv9YXg"/>
<div class="absolute bottom-md left-md bg-white/90 backdrop-blur-md p-md rounded-lg shadow-lg border border-outline-variant/30">
<div class="text-secondary font-label-sm">NEXT SHIPMENT</div>
<div class="text-primary font-headline-md">October 15, 2023</div>
</div>
</div>
</header>
<!-- Product Catalog Header -->
<section class="flex flex-col md:flex-row justify-between items-end mb-md gap-4">
<div>
<h2 class="font-headline-lg text-primary">Current Batch Offerings</h2>
<p class="font-body-md text-on-surface-variant">Filter by origin, percentage, or volume.</p>
</div>
<div class="flex gap-base">
<button class="flex items-center gap-2 px-4 py-2 bg-white border border-outline-variant rounded-lg text-label-md">
<span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
                    Filters
                </button>
<button class="flex items-center gap-2 px-4 py-2 bg-white border border-outline-variant rounded-lg text-label-md">
<span class="material-symbols-outlined" data-icon="sort">sort</span>
                    Sort by Price
                </button>
</div>
</section>
<!-- Product Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Product Card 1 -->
<div class="bg-white rounded-xl overflow-hidden shadow-sm border border-stone-100 group transition-all hover:shadow-md">
<div class="h-64 relative overflow-hidden">
<img alt="Dark Chocolate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Close-up of glossy tempered dark chocolate waves being poured with a rich deep brown color and professional lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgF7fSk6fDz9vIlnml-CFQSpw863jKTKUZQD-m-Q2R-UiI6Qoeyv-e0p5LdCytUpQZRE2UJL9HfK7gZloKGs7ZU91dgvoq7qX6W2lSotzkNbBv7rPAPPWOLONcVX0m1wM4Fb8RrGJMl91rGdsSQTBp3wzuOhzjWrNx8ClWLvMSatcUkTJFTfsu-9v2GRHEqKcW0SFC-7lmNRdDzZPIqmByGos_VjKJIl3QeiP-X2WKc8W_GMDHV0CqdKCY_sHVuCR_FtNXmJ-l-A"/>
<div class="absolute top-4 left-4">
<span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-label-sm font-bold border border-green-200">IN STOCK</span>
</div>
</div>
<div class="p-md">
<div class="flex justify-between items-start mb-2">
<div>
<span class="font-label-sm text-secondary">ORIGIN: MADAGASCAR</span>
<h3 class="font-headline-md text-primary">Single Origin 72%</h3>
</div>
<span class="font-headline-md text-primary">$1,250</span>
</div>
<p class="text-on-surface-variant font-body-md mb-4">A vibrant batch featuring red berry notes and a silky finish. Ideal for premium truffles.</p>
<div class="grid grid-cols-2 gap-4 mb-gutter py-4 border-y border-stone-50">
<div>
<div class="text-label-sm text-outline">BATCH SIZE</div>
<div class="font-label-md text-primary">50 kg Lot</div>
</div>
<div>
<div class="text-label-sm text-outline">TYPE</div>
<div class="font-label-md text-primary">Organic Dark</div>
</div>
</div>
<div class="flex gap-3">
<button class="flex-1 border border-outline text-primary py-2.5 rounded-lg font-label-md hover:bg-stone-50 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[18px]" data-icon="add_shopping_cart">add_shopping_cart</span>
                            Add to Cart
                        </button>
<button class="flex-1 bg-primary text-on-primary py-2.5 rounded-lg font-label-md hover:bg-primary-container transition-colors">
                            Buy Now
                        </button>
</div>
</div>
</div>
<!-- Product Card 2 -->
<div class="bg-white rounded-xl overflow-hidden shadow-sm border border-stone-100 group transition-all hover:shadow-md">
<div class="h-64 relative overflow-hidden">
<img alt="Milk Chocolate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Gourmet milk chocolate pieces with visible hazelnut inclusions, soft warm studio lighting on a neutral cream background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOcizReR2kE_XyE6TFaENxZKWIw5UGG2s21O91MEYliKnjacsaxd9zpNr_7vXJGD20gxGV0_9QARGXstd9LVPkcgzehXvG-xSbAIYvNAErTN80fITa2vBeYdapE2CRmcw7e1BWcP5rOZho89Nom58TVPbpmRCUhEa-lvDnJXBZG-_1aQ8TC8jb_KnAxgFphezQFBczMg7tylMeRuEY1uW6q-87pSG6LONrTfMp5b-hoX1eZ3e0j3W8_ZHkyVVfzF5vB5DaC6rPyw"/>
<div class="absolute top-4 left-4">
<span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-label-sm font-bold border border-amber-200">LOW STOCK</span>
</div>
</div>
<div class="p-md">
<div class="flex justify-between items-start mb-2">
<div>
<span class="font-label-sm text-secondary">ORIGIN: ECUADOR</span>
<h3 class="font-headline-md text-primary">Arriba Nacional 45%</h3>
</div>
<span class="font-headline-md text-primary">$980</span>
</div>
<p class="text-on-surface-variant font-body-md mb-4">Luxurious milk chocolate with floral aromas and a deep caramel undertone.</p>
<div class="grid grid-cols-2 gap-4 mb-gutter py-4 border-y border-stone-50">
<div>
<div class="text-label-sm text-outline">BATCH SIZE</div>
<div class="font-label-md text-primary">50 kg Lot</div>
</div>
<div>
<div class="text-label-sm text-outline">TYPE</div>
<div class="font-label-md text-primary">Creamy Milk</div>
</div>
</div>
<div class="flex gap-3">
<button class="flex-1 border border-outline text-primary py-2.5 rounded-lg font-label-md hover:bg-stone-50 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[18px]" data-icon="add_shopping_cart">add_shopping_cart</span>
                            Add to Cart
                        </button>
<button class="flex-1 bg-primary text-on-primary py-2.5 rounded-lg font-label-md hover:bg-primary-container transition-colors">
                            Buy Now
                        </button>
</div>
</div>
</div>
<!-- Product Card 3 -->
<div class="bg-white rounded-xl overflow-hidden shadow-sm border border-stone-100 group transition-all hover:shadow-md">
<div class="h-64 relative overflow-hidden">
<img alt="White Chocolate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Pure white chocolate buttons or callets in a minimalist ceramic bowl, bright clean lighting, airy aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbDT0UM1C4-ItngLRp-afYI8OclYIr821FZtJSlCU2d07XVh7Y_EZQac--2PjzDCLXaa8ifxsuuMdzoWeE5FekA-5tRX-V8mnEGBbWhjlSrRn-L7T3D93tGCB8Rw9xOkop0ZzyfAohxg7AglaXdr7dKqiYRFNI6QI4KFhzhea-sp7mdvpWG4JBMc-x_H98ZvvnQc_O1vrEB0hptbIKW_pEiby9r2fkNwEwTx6nq5cAFxZQhWyEzKPiYg1NmYOmgNt7DI_74rGCww"/>
<div class="absolute top-4 left-4">
<span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-label-sm font-bold border border-green-200">IN STOCK</span>
</div>
</div>
<div class="p-md">
<div class="flex justify-between items-start mb-2">
<div>
<span class="font-label-sm text-secondary">ORIGIN: GHANA</span>
<h3 class="font-headline-md text-primary">Velvet White 35%</h3>
</div>
<span class="font-headline-md text-primary">$1,100</span>
</div>
<p class="text-on-surface-variant font-body-md mb-4">Crafted with undeodorized cocoa butter, retaining authentic chocolate aroma.</p>
<div class="grid grid-cols-2 gap-4 mb-gutter py-4 border-y border-stone-50">
<div>
<div class="text-label-sm text-outline">BATCH SIZE</div>
<div class="font-label-md text-primary">50 kg Lot</div>
</div>
<div>
<div class="text-label-sm text-outline">TYPE</div>
<div class="font-label-md text-primary">Cocoa Butter</div>
</div>
</div>
<div class="flex gap-3">
<button class="flex-1 border border-outline text-primary py-2.5 rounded-lg font-label-md hover:bg-stone-50 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[18px]" data-icon="add_shopping_cart">add_shopping_cart</span>
                            Add to Cart
                        </button>
<button class="flex-1 bg-primary text-on-primary py-2.5 rounded-lg font-label-md hover:bg-primary-container transition-colors">
                            Buy Now
                        </button>
</div>
</div>
</div>
<!-- Product Card 4 -->
<div class="bg-white rounded-xl overflow-hidden shadow-sm border border-stone-100 group transition-all hover:shadow-md">
<div class="h-64 relative overflow-hidden">
<img alt="Cocoa Beans" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Heap of roasted cocoa beans showing textured shells and deep rich brown tones, macro photography with soft shadows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFaQyQwhRrbS6NSPiNW9Y7PtRFl6HNHc-NudQAnNCETlNZuZGah94phtRhgRe33JzcPIPLTVzanZQwRQBLbZxGsZHO9WuEHfHkesq2xoaugNVumA_VLALKgjrkwj0z4p1rMPXq-WnigEYDAg2obSAF3gMUNwJxqmpCMwhhCEGv-_UnOuJf3IdU0wzPqD2SvyZT4v7A6n61hqVfrQAI_c1Co1jFMtQ7Fl9dOo7FgRlO9KT4CUya94ZymgHndQ-0r1lzbbjqVQ7C3Q"/>
<div class="absolute top-4 left-4">
<span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-label-sm font-bold border border-green-200">IN STOCK</span>
</div>
</div>
<div class="p-md">
<div class="flex justify-between items-start mb-2">
<div>
<span class="font-label-sm text-secondary">ORIGIN: PERU</span>
<h3 class="font-headline-md text-primary">Grand Cru 85%</h3>
</div>
<span class="font-headline-md text-primary">$1,450</span>
</div>
<p class="text-on-surface-variant font-body-md mb-4">Intense and robust with notes of roasted nuts and tobacco. For connoisseurs.</p>
<div class="grid grid-cols-2 gap-4 mb-gutter py-4 border-y border-stone-50">
<div>
<div class="text-label-sm text-outline">BATCH SIZE</div>
<div class="font-label-md text-primary">50 kg Lot</div>
</div>
<div>
<div class="text-label-sm text-outline">TYPE</div>
<div class="font-label-md text-primary">Extra Dark</div>
</div>
</div>
<div class="flex gap-3">
<button class="flex-1 border border-outline text-primary py-2.5 rounded-lg font-label-md hover:bg-stone-50 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[18px]" data-icon="add_shopping_cart">add_shopping_cart</span>
                            Add to Cart
                        </button>
<button class="flex-1 bg-primary text-on-primary py-2.5 rounded-lg font-label-md hover:bg-primary-container transition-colors">
                            Buy Now
                        </button>
</div>
</div>
</div>
<!-- Cart Summary Card (Bento Style) -->
<div class="bg-surface-container-low rounded-xl p-md border border-outline-variant flex flex-col justify-between lg:row-span-1">
<div>
<div class="flex items-center gap-2 mb-md">
<span class="material-symbols-outlined text-secondary" data-icon="shopping_basket">shopping_basket</span>
<h3 class="font-headline-md text-primary">Your Order</h3>
</div>
<div class="space-y-4 mb-lg">
<div class="flex justify-between items-center text-body-md">
<span class="text-on-surface-variant">Selected Items</span>
<span class="font-label-md">2 Lots</span>
</div>
<div class="flex justify-between items-center text-body-md">
<span class="text-on-surface-variant">Total Volume</span>
<span class="font-label-md">100 kg</span>
</div>
<div class="flex justify-between items-center text-body-md">
<span class="text-on-surface-variant">Estimated Shipping</span>
<span class="font-label-md">$145.00</span>
</div>
<div class="pt-4 border-t border-outline-variant flex justify-between items-center">
<span class="font-headline-md text-primary">Total</span>
<span class="font-headline-md text-secondary">$2,375.00</span>
</div>
</div>
</div>
<button class="w-full bg-secondary text-on-secondary py-4 rounded-lg font-label-md flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">
                    Complete Purchase
                    <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
<!-- Support Section -->
<section class="mt-xl p-lg bg-primary-container text-on-primary rounded-xl flex flex-col md:flex-row items-center justify-between gap-md">
<div class="flex items-center gap-md">
<div class="h-16 w-16 bg-white/10 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-display-xl" data-icon="support_agent">support_agent</span>
</div>
<div>
<h3 class="font-headline-md">Need a Custom Blend?</h3>
<p class="opacity-80">Our master chocolatiers can develop proprietary profiles for your brand.</p>
</div>
</div>
<button class="bg-secondary-container text-on-secondary-container px-lg py-3 rounded-lg font-label-md whitespace-nowrap">
                Contact Craft Specialist
            </button>
</section>
</main>
<footer class="bg-stone-50 border-t border-stone-200 mt-xl py-xl">
<div class="max-w-[1400px] mx-auto px-margin grid grid-cols-1 md:grid-cols-4 gap-xl">
<div class="col-span-1 md:col-span-1">
<span class="text-lg font-black text-amber-900 tracking-tight">CocoaMaster</span>
<p class="mt-4 text-on-surface-variant text-label-md">Reliable Craftsmanship for the world's finest chocolatiers and bakers since 1984.</p>
</div>
<div>
<h4 class="font-label-md text-primary mb-4">Sourcing</h4>
<ul class="space-y-2 text-label-md text-on-surface-variant">
<li><a class="hover:text-secondary" href="#">Direct Trade Ethics</a></li>
<li><a class="hover:text-secondary" href="#">Sustainability Report</a></li>
<li><a class="hover:text-secondary" href="#">Origin Map</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-primary mb-4">Support</h4>
<ul class="space-y-2 text-label-md text-on-surface-variant">
<li><a class="hover:text-secondary" href="#">Shipping Policy</a></li>
<li><a class="hover:text-secondary" href="#">Quality Guarantee</a></li>
<li><a class="hover:text-secondary" href="#">Bulk Inquiries</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-primary mb-4">Newsletter</h4>
<div class="flex gap-2">
<input class="bg-white border border-outline-variant rounded px-3 py-2 text-sm w-full focus:outline-none focus:border-secondary" placeholder="Email" type="email"/>
<button class="bg-primary text-on-primary px-4 py-2 rounded text-label-sm">Join</button>
</div>
</div>
</div>
<div class="max-w-[1400px] mx-auto px-margin mt-xl pt-md border-t border-stone-200 flex flex-col md:flex-row justify-between text-label-sm text-outline">
<span>© 2023 Artisanal Logistics. All rights reserved.</span>
<div class="flex gap-md">
<a href="#">Privacy Policy</a>
<a href="#">Terms of Service</a>
</div>
</div>
</footer>
</body></html>