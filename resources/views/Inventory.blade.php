@extends('layouts.app')

@section('header')
    <header class="flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm">
    <div class="flex items-center gap-6 flex-1">
    <div class="md:hidden text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">Artisanal Logistics</div>
    <!-- Search Bar on Left -->
    <div class="hidden md:flex relative max-w-md w-full">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg" data-icon="search">search</span>
    <input class="w-full bg-surface-container-low border border-outline-variant rounded-full pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all" placeholder="Search inventory, batches, or SKUs..." type="text"/>
    </div>
    </div>
    <div class="flex items-center gap-4">
    <button class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors relative">
    <span class="material-symbols-outlined text-stone-600 dark:text-stone-400" data-icon="notifications">notifications</span>
    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-stone-50"></span>
    </button>
    <button class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors">
    <span class="material-symbols-outlined text-stone-600 dark:text-stone-400" data-icon="settings">settings</span>
    </button>
    <div class="h-6 w-px bg-stone-200 mx-2"></div>
    <button class="text-sm font-medium text-amber-900 dark:text-amber-100 hover:underline">Help</button>
    <div class="w-8 h-8 rounded-full overflow-hidden bg-stone-200">
    <img alt="User profile" class="w-full h-full object-cover" data-alt="professional portrait of a manufacturing manager in a clean warehouse setting with soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuYl6ypc9zOr4aohd1Yy7Djp5wbkyUNFxg38wPpOBFG6uuNng86ZyNTcfDBapk5nFzOdsNY3yx8hQYnooLub-DXfhWXFalV52PUMkBD0h7dnnYOZ3A5BhUuyuC7MQyB3zcjmCcBe5RJWljp_QCcz0IpLtCNx4NoPSNqB803RdOPVyw1ulnvsYZ9Oy8JGv1Grn6a0HPaPRVTQOhGg1rYTd_OvrQAXGday1ypGC4Fzz2iVc--AjrFDJukeBh1GtnZkCmaodOvit5BQ"/>
    </div>
    </div>
    </header>
@endsection

@section('content')
    <!-- Page Canvas -->
    <div class="p-8 lg:p-12 space-y-10">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-2">
    <div class="flex items-center gap-2 text-secondary font-semibold text-sm tracking-wide uppercase">
    <span class="material-symbols-outlined text-sm" data-icon="analytics">analytics</span>
                            Master Catalog
                        </div>
    <h2 class="text-4xl font-bold text-primary tracking-tight">Inventory Management</h2>
    <p class="text-outline max-w-2xl">Monitor real-time stock levels of artisanal chocolate batches, manage expiration windows, and coordinate warehouse distribution for CocoaMaster logistics.</p>
    </div>
    <div class="flex items-center gap-4 shrink-0">
    <button class="flex items-center gap-2 px-6 py-3 border-2 border-secondary text-secondary rounded-xl font-bold text-sm hover:bg-secondary-container/20 transition-colors active:opacity-80">
    <span class="material-symbols-outlined text-lg" data-icon="outbox">outbox</span>
                            Withdraw Batch
                        </button>
    <a href="/batchregister" class="flex items-center gap-2 px-6 py-3 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all active:scale-[0.98]">
    <span class="material-symbols-outlined text-lg" data-icon="assignment_add">assignment_add</span>
                            Register Batch
                        </a>
    </div>
    </div>
    <!-- Dashboard Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">Total Inventory</span>
    <span class="p-2 bg-surface-container rounded-lg"><span class="material-symbols-outlined text-primary text-xl" data-icon="inventory">inventory</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-primary">12,482 kg</div>
    <div class="text-xs text-green-600 font-bold mt-1 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm" data-icon="trending_up">trending_up</span>
                                +4.2% from last week
                            </div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">Active Batches</span>
    <span class="p-2 bg-surface-container rounded-lg"><span class="material-symbols-outlined text-primary text-xl" data-icon="layers">layers</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-primary">84</div>
    <div class="text-xs text-outline font-bold mt-1">12 pending QC check</div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">Low Stock Alerts</span>
    <span class="p-2 bg-error-container/30 rounded-lg"><span class="material-symbols-outlined text-error text-xl" data-icon="warning">warning</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-error">03</div>
    <div class="text-xs text-error font-bold mt-1">Requires immediate order</div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">Storage Capacity</span>
    <span class="p-2 bg-surface-container rounded-lg"><span class="material-symbols-outlined text-primary text-xl" data-icon="warehouse">warehouse</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-primary">78%</div>
    <div class="w-full bg-stone-100 h-1.5 rounded-full mt-2">
    <div class="bg-secondary h-full rounded-full" style="width: 78%"></div>
    </div>
    </div>
    </div>
    </div>
    <!-- CRUD Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
    <div class="p-6 border-b border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="flex items-center gap-4 w-full md:w-auto">
    <div class="relative w-full md:w-80">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg" data-icon="filter_list">filter_list</span>
    <select class="w-full appearance-none bg-stone-50 border border-stone-200 rounded-lg pl-10 pr-8 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/20">
    <option>All Categories</option>
    <option>Single Origin Dark</option>
    <option>Milk Chocolate</option>
    <option>White Chocolate</option>
    <option>Truffle Fillings</option>
    </select>
    </div>
    <div class="flex bg-stone-50 border border-stone-200 rounded-lg p-1">
    <button class="p-1.5 bg-white shadow-sm rounded-md"><span class="material-symbols-outlined text-sm block" data-icon="grid_view">grid_view</span></button>
    <button class="p-1.5 text-stone-400"><span class="material-symbols-outlined text-sm block" data-icon="view_list">view_list</span></button>
    </div>
    </div>
    <div class="flex items-center gap-2 text-xs font-bold text-outline">
                            Viewing 1-10 of 244 Items
                            <div class="flex gap-1 ml-2">
    <button class="w-8 h-8 rounded border border-stone-200 flex items-center justify-center hover:bg-stone-50 disabled:opacity-30" disabled=""><span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span></button>
    <button class="w-8 h-8 rounded border border-stone-200 flex items-center justify-center hover:bg-stone-50"><span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span></button>
    </div>
    </div>
    </div>
    <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
    <thead>
    <tr class="bg-stone-50 border-b border-stone-200 text-outline text-[10px] uppercase tracking-widest font-black">
    <th class="px-6 py-4 w-12"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></th>
    <th class="px-6 py-4">Product Details</th>
    <th class="px-6 py-4">Category</th>
    <th class="px-6 py-4">Current Stock</th>
    <th class="px-6 py-4">Batch ID</th>
    <th class="px-6 py-4">Status</th>
    <th class="px-6 py-4 text-right">Actions</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-stone-100">
    <!-- Row 1 -->
    <tr class="table-row-hover group">
    <td class="px-6 py-5"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></td>
    <td class="px-6 py-5">
    <div class="flex items-center gap-4">
    <div class="w-12 h-12 rounded-lg bg-stone-100 overflow-hidden flex-shrink-0">
    <img alt="70% Madagascar Dark" class="w-full h-full object-cover" data-alt="extreme close up of dark chocolate bar texture with visible cocoa nibs and professional studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDl5rkqEHHGwSR69NKEBK6RYcVdf1eKcRB7q1DMb8LCCEE1D3U1TmlkomLaxmpiLjTiFLYWBIKwkqzFZOcNaH8NSygcTmwTR2g2f7AEMAJpKxXQtDJn7_isg5PoQJRLHsGo3KlQIN8ZVwDFNc5uvXH5NQowULMnaA3ip7S46RP6UnLVA1vi3SrEunmV3LIhr64gC6YuAjYoHDDXKOtdpFHa3bMONPeKx_PceIPN5cpYw3CxNllU3gAyVBPfjaOkKPHJ355lza1wlA"/>
    </div>
    <div>
    <div class="font-bold text-primary">70% Madagascar Dark</div>
    <div class="text-xs text-outline">SKU: CHOC-MD-70-A</div>
    </div>
    </div>
    </td>
    <td class="px-6 py-5">
    <span class="text-sm text-on-surface">Single Origin</span>
    </td>
    <td class="px-6 py-5">
    <div class="text-sm font-bold text-primary">1,250 kg</div>
    <div class="text-[10px] text-green-600 uppercase font-black tracking-tight">Optimal Level</div>
    </td>
    <td class="px-6 py-5">
    <span class="font-mono text-xs text-outline">#BATCH-2023-1102</span>
    </td>
    <td class="px-6 py-5">
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
    <span class="w-1 h-1 rounded-full bg-green-500 mr-1.5"></span>
                                            Available
                                        </span>
    </td>
    <td class="px-6 py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
    <button class="p-2 text-stone-400 hover:text-error transition-colors"><span class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
    </td>
    </tr>
    <!-- Row 2 -->
    <tr class="table-row-hover group">
    <td class="px-6 py-5"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></td>
    <td class="px-6 py-5">
    <div class="flex items-center gap-4">
    <div class="w-12 h-12 rounded-lg bg-stone-100 overflow-hidden flex-shrink-0">
    <img alt="Hazelnut Praline Base" class="w-full h-full object-cover" data-alt="creamy smooth chocolate praline with roasted hazelnuts in a polished copper bowl industrial setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6-u59K9PmkCzvstYNZpX8bXgsfm4YMCcH2MQmspV5JWu_hUB2EHKCwn_VqPxYH5gIKlhmnw3EvJ0HJBt_7nH9yXNZBHFaZwjFce1AD3AwJyfHpvFyrlUigT1MZPVEAdfUAfbozJ_GFoJWEcClfGq2ZImj6ve4-E1pbLlr85y4MNqpBJHIAtWTrrNMnz2A9gu8CntDuoSL8AnN7Pas4akcUdvUP-dAd8B4eksni43JTbCnGTuHtCeqSg31fi5qE4r8iNj13Vgxhw"/>
    </div>
    <div>
    <div class="font-bold text-primary">Hazelnut Praline Base</div>
    <div class="text-xs text-outline">SKU: FILL-HZ-PR-B</div>
    </div>
    </div>
    </td>
    <td class="px-6 py-5">
    <span class="text-sm text-on-surface">Truffle Filling</span>
    </td>
    <td class="px-6 py-5">
    <div class="text-sm font-bold text-error">45 kg</div>
    <div class="text-[10px] text-error uppercase font-black tracking-tight">Critically Low</div>
    </td>
    <td class="px-6 py-5">
    <span class="font-mono text-xs text-outline">#BATCH-2023-1108</span>
    </td>
    <td class="px-6 py-5">
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-container/50 text-secondary">
    <span class="w-1 h-1 rounded-full bg-secondary mr-1.5"></span>
                                            On Order
                                        </span>
    </td>
    <td class="px-6 py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
    <button class="p-2 text-stone-400 hover:text-error transition-colors"><span class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
    </td>
    </tr>
    <!-- Row 3 -->
    <tr class="table-row-hover group">
    <td class="px-6 py-5"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></td>
    <td class="px-6 py-5">
    <div class="flex items-center gap-4">
    <div class="w-12 h-12 rounded-lg bg-stone-100 overflow-hidden flex-shrink-0">
    <img alt="Ecuadorian White 35%" class="w-full h-full object-cover" data-alt="blocks of premium white chocolate with a creamy yellow tint on a marble surface with soft shadows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpOittdtw8JhCkYTBMLdupxKLWMdezjJ8t0Ea4RWqdrbtLlwlD6nPqcodXPM7kwG9Ir2hJUfIbcQz6dZYlF4nvoQujFia2qd7SkZ3ySH1mqFPaHYY6m3ziuo6lT3c0BjzNrjJxHABHSUdjFjaACdacvJH9-jLF8uelkUvj1Knzr69keiKXmbodwo5w2eClwKW5S9QgAO9yB-g_iWmDTpY1fToSEvJdRbWo3caPqPbXvTzNwr1aX8Ui3tbnWHnpybeCw-STVBhH3A"/>
    </div>
    <div>
    <div class="font-bold text-primary">Ecuadorian White 35%</div>
    <div class="text-xs text-outline">SKU: CHOC-EC-35-W</div>
    </div>
    </div>
    </td>
    <td class="px-6 py-5">
    <span class="text-sm text-on-surface">White Chocolate</span>
    </td>
    <td class="px-6 py-5">
    <div class="text-sm font-bold text-primary">820 kg</div>
    <div class="text-[10px] text-amber-600 uppercase font-black tracking-tight">Check Storage Temp</div>
    </td>
    <td class="px-6 py-5">
    <span class="font-mono text-xs text-outline">#BATCH-2023-1105</span>
    </td>
    <td class="px-6 py-5">
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-stone-100 text-stone-600">
    <span class="w-1 h-1 rounded-full bg-stone-400 mr-1.5"></span>
                                            QC Pending
                                        </span>
    </td>
    <td class="px-6 py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
    <button class="p-2 text-stone-400 hover:text-error transition-colors"><span class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
    </td>
    </tr>
    <!-- Row 4 -->
    <tr class="table-row-hover group">
    <td class="px-6 py-5"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></td>
    <td class="px-6 py-5">
    <div class="flex items-center gap-4">
    <div class="w-12 h-12 rounded-lg bg-stone-100 overflow-hidden flex-shrink-0">
    <img alt="Salted Caramel Filling" class="w-full h-full object-cover" data-alt="dripping warm liquid salted caramel being poured into a chocolate mold high speed photography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8xkIM68OPUOe8r5_Gm4AVO8TFkV3Be69jadfzfQHZRcwrr529M7WlfDN6qU0yM5xFBgSuMtnh81Mjjwh9LPw7-9H18tJBYr8wsnSt3x2HjK41hBWKBxlkHCzWiwdqeOK6kAwKjB9FN1GJPf1Jg-K7EtZKPr_aeQBwLI9givBUy0gT8T_kB63zbxCXflV_wja4Ri4x7u1yXkuUzk9v70kt1vHhNC4qkzzYZw0Ru1WBPhBrsKN-ThUgP4AJzSnPw2dV1Bp0qs04Ww"/>
    </div>
    <div>
    <div class="font-bold text-primary">Salted Caramel Filling</div>
    <div class="text-xs text-outline">SKU: FILL-SLT-CRM</div>
    </div>
    </div>
    </td>
    <td class="px-6 py-5">
    <span class="text-sm text-on-surface">Confectionery</span>
    </td>
    <td class="px-6 py-5">
    <div class="text-sm font-bold text-primary">450 kg</div>
    <div class="text-[10px] text-green-600 uppercase font-black tracking-tight">Sufficient</div>
    </td>
    <td class="px-6 py-5">
    <span class="font-mono text-xs text-outline">#BATCH-2023-1110</span>
    </td>
    <td class="px-6 py-5">
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
    <span class="w-1 h-1 rounded-full bg-green-500 mr-1.5"></span>
                                            Available
                                        </span>
    </td>
    <td class="px-6 py-5 text-right">
    <button class="p-2 text-stone-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
    <button class="p-2 text-stone-400 hover:text-error transition-colors"><span class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <div class="p-6 bg-stone-50 border-t border-stone-200 flex justify-between items-center">
    <button class="text-sm font-bold text-outline hover:text-primary flex items-center gap-2">
    <span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                            Export Catalog (CSV)
                        </button>
    <div class="flex items-center gap-1">
    <button class="px-4 py-2 text-sm font-bold bg-white border border-stone-200 rounded-lg text-primary shadow-sm hover:bg-stone-50 transition-colors">Previous</button>
    <button class="px-4 py-2 text-sm font-bold bg-primary text-on-primary rounded-lg shadow-sm hover:opacity-90 transition-opacity">Next</button>
    </div>
    </div>
    </div>
    <!-- Contextual Help / Tips -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-primary-container text-on-primary-container p-8 rounded-2xl relative overflow-hidden">
    <div class="relative z-10 max-w-lg">
    <h3 class="text-xl font-bold mb-2">Automate Your Replenishment</h3>
    <p class="text-sm opacity-80 mb-6">Link your inventory directly to supplier portals for automated batch registration when stock dips below the threshold.</p>
    <button class="px-6 py-2 bg-on-primary-container text-primary-container font-bold rounded-lg text-sm hover:bg-white transition-colors">Configure Webhooks</button>
    </div>
    <span class="material-symbols-outlined absolute -bottom-8 -right-8 text-[180px] opacity-10 pointer-events-none" data-icon="precision_manufacturing">precision_manufacturing</span>
    </div>
    <div class="bg-surface-container-high p-8 rounded-2xl border border-outline-variant/30">
    <h3 class="text-lg font-bold text-primary mb-4">Inventory Health</h3>
    <div class="space-y-4">
    <div class="flex justify-between items-center text-sm">
    <span class="text-outline">Freshness Index</span>
    <span class="font-bold text-green-600">98.4%</span>
    </div>
    <div class="w-full bg-stone-200/50 h-2 rounded-full overflow-hidden">
    <div class="bg-green-600 h-full w-[98.4%]"></div>
    </div>
    <div class="flex justify-between items-center text-sm">
    <span class="text-outline">Wastage Rate</span>
    <span class="font-bold text-amber-700">0.2%</span>
    </div>
    <div class="w-full bg-stone-200/50 h-2 rounded-full overflow-hidden">
    <div class="bg-amber-700 h-full w-[2%]"></div>
    </div>
    <p class="text-xs text-outline-variant mt-2 italic">Based on current storage humidity and turnover rates.</p>
    </div>
    </div>
    </div>
    </div>
    <!-- Footer spacing for mobile -->
    <div class="h-12 md:hidden"></div>
@endsection
