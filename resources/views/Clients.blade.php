@extends('layouts.app')

@section('header')
    <header class="sticky top-0 z-40 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm flex justify-between items-center w-full px-6 py-3 h-16">
    <div class="flex items-center gap-6 flex-1">
    <div class="relative w-full max-w-md">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-lg" data-icon="search">search</span>
    <input class="w-full bg-white border border-stone-200 rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all" placeholder="Search clients, orders, or logistics data..." type="text"/>
    </div>
    </div>
    <div class="flex items-center gap-4">
    <div class="flex items-center gap-2 mr-4 border-r border-stone-200 pr-4">
    <button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
    </button>
    <button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
    <span class="material-symbols-outlined" data-icon="settings">settings</span>
    </button>
    </div>
    <button class="text-sm font-semibold text-amber-900 dark:text-amber-100 hover:underline">Help</button>
    <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-stone-200">
    <img alt="User profile" class="w-full h-full object-cover" data-alt="professional headshot of an executive in a neutral studio setting with soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmx-7B6mlp8QqldFKQUWzaJCKLJCAVZr621adyBlwLsoIX2oGCBp9bkLF9zpLpRMaU0En7xFoUnp3dMgPouluz_988GzAsczhJMYjz_bZ7ezZ1-6fqNfI5XiTemprKQtpVWblwQH4LrEx2dimtjXs-FBAWmUtbHKSpi4jvT76YYn6lRX7HemgV-gKps8kfw95HYCmBZlJiL-6b2gE17Wjf9kFgIzNMY0gjy10eZRghdFobvbxuMN99DIiY-BgdD-M18RQlGidKSw"/>
    </div>
    </div>
    </header>
@endsection

@section('content')
    <div class="p-margin flex-1">
    <!-- Breadcrumbs and Header -->
    <div class="mb-lg flex justify-between items-end">
    <div>
    <nav class="flex items-center gap-2 text-label-sm text-outline mb-base uppercase tracking-widest">
    <span>Organization</span>
    <span class="material-symbols-outlined text-xs" data-icon="chevron_right">chevron_right</span>
    <span class="text-secondary font-bold">Clients</span>
    </nav>
    <h1 class="text-display-xl font-display-xl text-primary">Client Management</h1>
    </div>
    <button class="bg-secondary text-on-secondary px-6 py-3 rounded-lg font-bold text-label-md flex items-center gap-2 hover:brightness-110 transition-all shadow-lg shadow-secondary/20">
    <span class="material-symbols-outlined" data-icon="palette">palette</span>
                        New Packaging Design
                    </button>
    </div>
    <!-- Dashboard Stats Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-lg">
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">Total Partnerships</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">124</span>
    <span class="text-label-sm text-green-600 flex items-center">+4% <span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span></span>
    </div>
    </div>
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">Active Batches</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">38</span>
    <span class="text-label-sm text-secondary">Peak Cycle</span>
    </div>
    </div>
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">Logistics Efficiency</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">98.2%</span>
    <span class="text-label-sm text-green-600 flex items-center">+1.2% <span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span></span>
    </div>
    </div>
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">Average Order Value</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">$12.4k</span>
    <span class="text-label-sm text-outline">Per SKU</span>
    </div>
    </div>
    </div>
    <!-- Main Client Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-stone-200 overflow-hidden">
    <div class="px-md py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50/50">
    <h3 class="text-headline-md text-primary">Active Clients</h3>
    <div class="flex gap-2">
    <button class="p-2 border border-stone-200 rounded-lg hover:bg-white transition-colors">
    <span class="material-symbols-outlined text-stone-500" data-icon="filter_list">filter_list</span>
    </button>
    <button class="p-2 border border-stone-200 rounded-lg hover:bg-white transition-colors">
    <span class="material-symbols-outlined text-stone-500" data-icon="download">download</span>
    </button>
    </div>
    </div>
    <div class="overflow-x-auto">
    <table class="w-full text-left">
    <thead>
    <tr class="bg-stone-50/50 text-label-sm text-outline uppercase tracking-widest border-b border-stone-100">
    <th class="px-md py-4 font-bold">Client Entity</th>
    <th class="px-md py-4 font-bold">Category</th>
    <th class="px-md py-4 font-bold">Status</th>
    <th class="px-md py-4 font-bold">Contract Value</th>
    <th class="px-md py-4 font-bold">Last Activity</th>
    <th class="px-md py-4 font-bold text-right">Actions</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-stone-100">
    <!-- Row 1 -->
    <tr class="hover:bg-surface-container-low/30 transition-colors group">
    <td class="px-md py-5">
    <div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center text-amber-900 font-bold">LA</div>
    <div>
    <div class="text-body-md font-bold text-primary">Luxe Artisan Sweets</div>
    <div class="text-label-sm text-stone-500">luxe-sweets.com</div>
    </div>
    </div>
    </td>
    <td class="px-md py-5 text-body-md text-on-surface-variant">Boutique Retail</td>
    <td class="px-md py-5">
    <span class="px-3 py-1 bg-green-100 text-green-800 text-[11px] font-black uppercase tracking-tighter rounded-full border border-green-200">Active High</span>
    </td>
    <td class="px-md py-5 text-body-md font-medium text-primary">$450,000</td>
    <td class="px-md py-5 text-label-md text-stone-500">2 hours ago</td>
    <td class="px-md py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-secondary hover:bg-stone-100 rounded-lg transition-all">
    <span class="material-symbols-outlined" data-icon="edit">edit</span>
    </button>
    </td>
    </tr>
    <!-- Row 2 -->
    <tr class="hover:bg-surface-container-low/30 transition-colors group">
    <td class="px-md py-5">
    <div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-stone-200 rounded-lg flex items-center justify-center text-stone-700 font-bold">GV</div>
    <div>
    <div class="text-body-md font-bold text-primary">Gourmet Valleys</div>
    <div class="text-label-sm text-stone-500">gourmet-valleys.co</div>
    </div>
    </div>
    </td>
    <td class="px-md py-5 text-body-md text-on-surface-variant">Industrial Supply</td>
    <td class="px-md py-5">
    <span class="px-3 py-1 bg-amber-100 text-amber-800 text-[11px] font-black uppercase tracking-tighter rounded-full border border-amber-200">Pending Review</span>
    </td>
    <td class="px-md py-5 text-body-md font-medium text-primary">$1,200,000</td>
    <td class="px-md py-5 text-label-md text-stone-500">Yesterday</td>
    <td class="px-md py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-secondary hover:bg-stone-100 rounded-lg transition-all">
    <span class="material-symbols-outlined" data-icon="edit">edit</span>
    </button>
    </td>
    </tr>
    <!-- Row 3 -->
    <tr class="hover:bg-surface-container-low/30 transition-colors group">
    <td class="px-md py-5">
    <div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center font-bold">EB</div>
    <div>
    <div class="text-body-md font-bold text-primary">Emerald Bean Roasters</div>
    <div class="text-label-sm text-stone-500">emerald-roasters.com</div>
    </div>
    </div>
    </td>
    <td class="px-md py-5 text-body-md text-on-surface-variant">Beverage Partner</td>
    <td class="px-md py-5">
    <span class="px-3 py-1 bg-green-100 text-green-800 text-[11px] font-black uppercase tracking-tighter rounded-full border border-green-200">Active High</span>
    </td>
    <td class="px-md py-5 text-body-md font-medium text-primary">$89,200</td>
    <td class="px-md py-5 text-label-md text-stone-500">3 days ago</td>
    <td class="px-md py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-secondary hover:bg-stone-100 rounded-lg transition-all">
    <span class="material-symbols-outlined" data-icon="edit">edit</span>
    </button>
    </td>
    </tr>
    <!-- Row 4 -->
    <tr class="hover:bg-surface-container-low/30 transition-colors group">
    <td class="px-md py-5">
    <div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-secondary-container rounded-lg flex items-center justify-center text-on-secondary-container font-bold">OC</div>
    <div>
    <div class="text-body-md font-bold text-primary">Organic Cocoa Ltd</div>
    <div class="text-label-sm text-stone-500">organiccocoa.org</div>
    </div>
    </div>
    </td>
    <td class="px-md py-5 text-body-md text-on-surface-variant">Raw Materials</td>
    <td class="px-md py-5">
    <span class="px-3 py-1 bg-stone-100 text-stone-600 text-[11px] font-black uppercase tracking-tighter rounded-full border border-stone-200">On Hold</span>
    </td>
    <td class="px-md py-5 text-body-md font-medium text-primary">$2,450,000</td>
    <td class="px-md py-5 text-label-md text-stone-500">1 week ago</td>
    <td class="px-md py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-secondary hover:bg-stone-100 rounded-lg transition-all">
    <span class="material-symbols-outlined" data-icon="edit">edit</span>
    </button>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <!-- Pagination -->
    <div class="px-md py-4 border-t border-stone-100 flex items-center justify-between bg-stone-50/50">
    <span class="text-label-sm text-stone-500">Showing 4 of 124 clients</span>
    <div class="flex gap-2">
    <button class="px-3 py-1 border border-stone-200 rounded text-label-sm text-stone-600 hover:bg-white">Previous</button>
    <button class="px-3 py-1 bg-primary text-on-primary rounded text-label-sm">1</button>
    <button class="px-3 py-1 border border-stone-200 rounded text-label-sm text-stone-600 hover:bg-white">2</button>
    <button class="px-3 py-1 border border-stone-200 rounded text-label-sm text-stone-600 hover:bg-white">Next</button>
    </div>
    </div>
    </div>
    </div>
    <footer class="p-margin mt-auto border-t border-stone-200 py-6 text-center">
    <p class="text-label-sm text-stone-400 uppercase tracking-widest">© 2024 Artisanal Logistics Global. Built for Reliable Craftsmanship.</p>
    </footer>
@endsection
