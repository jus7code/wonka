@extends('layouts.app')

@section('header')
    <header
                class="flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50 bg-stone-50 dark:bg-stone-900 text-amber-900 dark:text-amber-100 font-inter text-sm border-b border-stone-200 dark:border-stone-800 shadow-sm">
                <div class="flex items-center gap-4 flex-1">
                    <div class="relative w-full max-w-md">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400"
                            data-icon="search">search</span>
                        <input
                            class="w-full pl-10 pr-4 py-2 bg-stone-100 dark:bg-stone-800 border-none rounded-full focus:ring-2 focus:ring-amber-700/20 text-sm"
                            placeholder="Search employees..." type="text" />
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors relative">
                        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-secondary rounded-full"></span>
                    </button>
                    <button class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors">
                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    </button>
                    <div class="h-6 w-[1px] bg-stone-300 dark:bg-stone-700 mx-2"></div>
                    <button
                        class="px-4 py-2 rounded-lg text-amber-900 dark:text-amber-100 font-semibold hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors">
                        Help
                    </button>
                    <img alt="User profile" class="w-8 h-8 rounded-full ml-2 object-cover ring-2 ring-amber-900/10"
                        data-alt="Professional headshot of a middle-aged male executive in a clean studio setting with warm lighting"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3CVRzIygm11TQ3aDsfmh52EDTN4uXRhlNUN3XaI2g_pYJc1xD4Vh_NoTAojXEvdqcmpspab97OATZj3QKZ7zWEdmw2shFmJa7FDLOAszt9KwyS4K1NqjLHr768TjNXpU_ETneX5SWuuTZNqSEWqmagwDvJmYjypj44Rw5VmizMvoZzP0Gd5-w1nhrbKirof7DpZJHI1I8zv_Fo0uhLMELouQ25N3IdI7gdoT7CplzxWnwGJXD1ph8qEXAavN14Cb-vA1LtYq5Yg" />
                </div>
            </header>
@endsection

@section('content')
    <!-- Module Content -->
            <div class="p-margin flex flex-col gap-lg">
                <!-- Page Header & Action -->
                <div class="flex justify-between items-end">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-primary">Active Personnel</h2>
                        <p class="font-body-md text-body-md text-outline mt-1">Manage employee roles, schedules, and factory
                            floor distribution.</p>
                    </div>
                    <div class="flex gap-3">
                        <button
                            class="px-6 py-2.5 rounded-lg border-2 border-secondary text-secondary font-bold hover:bg-secondary/5 transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" data-icon="calendar_month">calendar_month</span>
                            Assign Shifts
                        </button>
                        <button
                            class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-bold hover:opacity-90 transition-opacity flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" data-icon="person_add">person_add</span>
                            Hire Employee
                        </button>
                    </div>
                </div>
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 shadow-sm">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Total Active</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-3xl font-black text-primary">142</span>
                            <span class="material-symbols-outlined text-secondary" data-icon="groups">groups</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 shadow-sm">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">On Shift</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-3xl font-black text-primary">56</span>
                            <span class="material-symbols-outlined text-green-700"
                                data-icon="potted_plant">potted_plant</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 shadow-sm">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Vacancies</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-3xl font-black text-primary">12</span>
                            <span class="material-symbols-outlined text-amber-700" data-icon="search">search</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 shadow-sm">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Training</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-3xl font-black text-primary">8</span>
                            <span class="material-symbols-outlined text-secondary" data-icon="school">school</span>
                        </div>
                    </div>
                </div>
                <!-- Employee CRUD Table -->
                <div
                    class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 overflow-hidden">
                    <div
                        class="p-md border-b border-stone-100 flex justify-between items-center bg-surface-container-low/50">
                        <div class="flex gap-4">
                            <button
                                class="px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container text-sm font-bold">All
                                Employees</button>
                            <button
                                class="px-4 py-1.5 rounded-full text-stone-500 text-sm font-medium hover:bg-stone-100 transition-colors">Production</button>
                            <button
                                class="px-4 py-1.5 rounded-full text-stone-500 text-sm font-medium hover:bg-stone-100 transition-colors">Logistics</button>
                            <button
                                class="px-4 py-1.5 rounded-full text-stone-500 text-sm font-medium hover:bg-stone-100 transition-colors">Quality
                                Control</button>
                        </div>
                        <button class="flex items-center gap-1 text-stone-400 hover:text-stone-600 transition-colors">
                            <span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                            <span class="text-sm font-medium">Filter</span>
                        </button>
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50/50 border-b border-stone-100">
                                <th class="px-6 py-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">
                                    Employee</th>
                                <th class="px-6 py-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Role
                                    &amp; Dept</th>
                                <th class="px-6 py-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">
                                    Shift Status</th>
                                <th class="px-6 py-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">
                                    Engagement</th>
                                <th
                                    class="px-6 py-4 font-label-sm text-label-sm text-outline uppercase tracking-wider text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <img alt="Employee" class="w-10 h-10 rounded-full object-cover shadow-sm"
                                            data-alt="Portrait of a young artisan chocolate maker in a white chef coat smiling"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvYVueCD-6SjoKwLG28kaACYZed82ptmGq87oQaQMF6Gu5wimru4fT9T2YVhNDMmWfuF3-QJMdO4RAZEXB_tTHMbiJShOugYAxaHILO721afTFYwFAqwp29BxYqSlMbkbiSM9mgmaM-eOs-g7tqvvlnJhqQXeDpoLLKRtPhm-ydWiZzp9eh4nRfqoqCMFy2UzOKxq4lzgw-Wv8aKhUX4ZZKdENGFK87xgWXk6HN7V0tLe3HI9ct8UlA3qd3rM_5KMeQmO5EWeaLg" />
                                        <div>
                                            <p class="font-label-md text-label-md text-primary">Julian Moreau</p>
                                            <p class="text-[12px] text-outline">julian.m@artisanal.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-label-md text-label-md text-primary">Master Chocolatier</p>
                                    <p class="text-[12px] text-outline">Production • Senior</p>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold border border-green-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        On Shift
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="w-24 bg-stone-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-secondary h-full rounded-full" style="width: 92%;"></div>
                                    </div>
                                    <p class="text-[10px] text-outline mt-1 font-bold">92% Performance</p>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <button
                                        class="p-2 text-stone-400 hover:text-primary transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="edit">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-stone-400 hover:text-error transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="delete">delete</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <img alt="Employee" class="w-10 h-10 rounded-full object-cover shadow-sm"
                                            data-alt="Portrait of a female professional in a modern office, wearing a dark blazer and neutral top"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0i-LFf44bjot04jaBDjCrofRSC7SiSdGHCPZz8WIF0wfi6-W0VkQDllXCBb2ZS5aNra9jf2BaIUbOExHKjd2BAzUhYA2_PWwfB7mSJEncU54KX2mG33j7t9ynp9ziFddaiycBnZ0g7zMk4hc9Wde2iyS9_Rqv_JiDdXzymuFo0nl1qhAqhbmi_KfdZkCKbkoT0qsE_BsGxdguTFuX-ux0xn7BIjuM9n-2NuhVTwjU81D7NdP5u1JNaFXQ5KHuky6HQ9XALEmTlw" />
                                        <div>
                                            <p class="font-label-md text-label-md text-primary">Elena Rodriguez</p>
                                            <p class="text-[12px] text-outline">elena.r@artisanal.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-label-md text-label-md text-primary">Inventory Specialist</p>
                                    <p class="text-[12px] text-outline">Logistics • Mid-level</p>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-stone-100 text-stone-500 text-xs font-bold border border-stone-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
                                        Off Duty
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="w-24 bg-stone-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-secondary h-full rounded-full" style="width: 85%;"></div>
                                    </div>
                                    <p class="text-[10px] text-outline mt-1 font-bold">85% Performance</p>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <button
                                        class="p-2 text-stone-400 hover:text-primary transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="edit">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-stone-400 hover:text-error transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="delete">delete</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <img alt="Employee" class="w-10 h-10 rounded-full object-cover shadow-sm"
                                            data-alt="Portrait of a middle aged man with glasses, look like a professional tech supervisor"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHwU0PhqQXnmVR58YcqWc6w9QFheFU4NdLlu06kXnq3KUzVY96xLTFvDn58OfFKQxydj6Vb75Dc_BYSdU4bh6EkmAmL8x2aYG2aJU4R-rNlm2hZ-0SZtxK03pBG4qtRogt-Z2gmBJl8fSbXGkGW6PvdUcbP5CoYLh3bKAMJE2fZ7wFwPy890OgkDNssApYMNM3Lle74BRrINdPxSgyEIAKMFgOfXqUwLwNPMO2TvRyLDLgiD2OkIl8m7Csn998zIGbIIsSLkn-OA" />
                                        <div>
                                            <p class="font-label-md text-label-md text-primary">Marcus Thorne</p>
                                            <p class="text-[12px] text-outline">m.thorne@artisanal.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-label-md text-label-md text-primary">Quality Lead</p>
                                    <p class="text-[12px] text-outline">QC • Supervisor</p>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-bold border border-amber-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        On Break
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="w-24 bg-stone-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-secondary h-full rounded-full" style="width: 98%;"></div>
                                    </div>
                                    <p class="text-[10px] text-outline mt-1 font-bold">98% Performance</p>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <button
                                        class="p-2 text-stone-400 hover:text-primary transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="edit">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-stone-400 hover:text-error transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="delete">delete</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <img alt="Employee" class="w-10 h-10 rounded-full object-cover shadow-sm"
                                            data-alt="Portrait of a young diverse male employee in casual professional attire"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcT7pfyG4wNyiIvNqdNhTc3lncmtH0sts40eiNmjnjhpjomaftOd5VQFZ7Ki01jY8nD6Iwb_DpFrAxK98D0xWa2t4DrauaSAp7cb-tO1OC2_cm-LpM1uH8KpA6lJcyASxnq8OcFdoPpkirFjxLVNENliF9WN6HQ1aO0RF2nxv0IbAIYtzI5aIUBlGEv18BXzZF3jup8NZAsTMeP0wZ0UaHjJVNcRLCa4vQT9qId1xgOv7GCrywB8DBHg2MO-g5Vqx_uMGDqDLHGw" />
                                        <div>
                                            <p class="font-label-md text-label-md text-primary">Liam Chen</p>
                                            <p class="text-[12px] text-outline">liam.c@artisanal.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-label-md text-label-md text-primary">Packaging Operator</p>
                                    <p class="text-[12px] text-outline">Logistics • Junior</p>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold border border-green-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        On Shift
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="w-24 bg-stone-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-secondary h-full rounded-full" style="width: 76%;"></div>
                                    </div>
                                    <p class="text-[10px] text-outline mt-1 font-bold">76% Performance</p>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <button
                                        class="p-2 text-stone-400 hover:text-primary transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="edit">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-stone-400 hover:text-error transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-symbols-outlined" data-icon="delete">delete</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="p-4 border-t border-stone-100 flex items-center justify-between bg-stone-50/50">
                        <p class="text-sm text-stone-500">Showing <span class="font-bold text-primary">4</span> of <span
                                class="font-bold text-primary">142</span> employees</p>
                        <div class="flex gap-1">
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg border border-stone-200 text-stone-400 hover:bg-stone-100 transition-colors">
                                <span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
                            </button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold text-sm">1</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-stone-100 text-stone-500 font-medium text-sm">2</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-stone-100 text-stone-500 font-medium text-sm">3</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg border border-stone-200 text-stone-400 hover:bg-stone-100 transition-colors">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="chevron_right">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
@endsection
