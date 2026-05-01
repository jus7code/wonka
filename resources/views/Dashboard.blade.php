@extends('layouts.app')

@section('header')
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
@endsection

@section('content')
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
            
    <!-- Floating Action Button (FAB) - Only for Main Dashboard Actions -->
    <a href="/batchregister"
        class="fixed bottom-margin right-margin w-14 h-14 bg-primary text-on-primary rounded-full shadow-lg flex items-center justify-center hover:scale-105 active:scale-95 transition-transform z-[70]">
        <span class="material-symbols-outlined text-[28px]" data-icon="add">add</span>
    </a>
@endsection
