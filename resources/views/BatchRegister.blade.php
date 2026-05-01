@extends('layouts.app')

@section('styles')
    <style>
        .cocoa-shadow {
            box-shadow: 0 10px 30px -10px rgba(61, 43, 31, 0.08);
        }
    </style>
@endsection

@section('content')
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
@endsection
