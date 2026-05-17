@extends('layouts.app')

@section('header')
        <header
            class="bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50">
            <div class="flex items-center gap-md">
                <span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">{{ __('Artisanal Logistics') }}</span>
            </div>
            <div class="flex items-center gap-sm">
            </div>
        </header>
@endsection

@section('content')
    <!-- Dashboard Canvas -->
            <div class="p-margin flex-1">
                <div class="mb-lg">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">{{ __('Resumen General') }}</h2>
                    <p class="font-body-md text-body-md text-outline">{{ __('Bienvenido de nuevo, Maestro Chocolatero. Este es el estado actual de la  fabrica.') }}</p>
                </div>
                <!-- Bento Grid Layout -->
                <div class="grid grid-cols-12 gap-gutter">

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
                                {{ __('Stock Bajo') }}
                            </span>
                        </div>
                        <div>
                            <h4 class="font-headline-md text-headline-md text-primary mt-base">{{ __('Inventario') }}</h4>
                            <p class="text-outline font-body-md text-body-md mt-xs">{{ __('Gestiona el cacao, los azucares y los empaques.') }}</p>
                        </div>
                        <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                            <span class="text-label-md font-label-md text-on-surface">{{ __('1,420 items en stock') }}</span>
                            <a href="/inventory"
                                class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                                {{ __('Ver Stock') }}
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
                            <h4 class="font-headline-md text-headline-md text-primary mt-base">{{ __('Contabilidad') }}</h4>
                            <p class="text-outline font-body-md text-body-md mt-xs">{{ __('Costos por lote, y analisis de costos internacionales.') }}</p>
                        </div>
                        <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                            <span class="text-label-md font-label-md text-on-surface-variant">{{ __('Q3 Report Ready') }}</span>
                            <a href="/Accounting"
                                class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                                {{ __('Ver Contabilidad') }}
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
                            <h4 class="font-headline-md text-headline-md text-primary mt-base">{{ __('Clients') }}</h4>
                            <p class="text-outline font-body-md text-body-md mt-xs">{{ __('Relationship management for luxury retailers, boutique hotels, and wholesale distributors.') }}</p>
                        </div>
                        <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                            
                            <a href="/Clients"
                                class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                                {{ __('Directory') }}
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
                            <h4 class="font-headline-md text-headline-md text-primary mt-base">{{ __('Recursos Humanos') }}</h4>
                            <p class="text-outline font-body-md text-body-md mt-xs">{{ __('Horarios de los operarios, certificaciones de seguridad y recompensas por desempeño.') }}</p>
                        </div>
                        <div class="mt-gutter pt-gutter border-t border-stone-100 flex items-center justify-between">
                            <span class="text-label-md font-label-md text-on-surface">{{ __('42 Artisans On-site') }}</span>
                            <a href="/humanresources"
                                class="text-secondary font-label-md text-label-md flex items-center gap-1 hover:underline">
                                {{ __('Staff Portal') }}
                                <span class="material-symbols-outlined text-[18px]"
                                    data-icon="arrow_forward">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                    <!-- Module Card: Design (Custom Module) -->
                    
            </div>
            <!-- Footer / Technical Info -->
            <footer class="mt-xl px-margin py-base border-t border-stone-200 flex justify-between items-center bg-white/50">
                <p class="text-label-sm font-label-sm text-outline">{{ __('Estado del Sistema:') }} <span class="text-secondary">{{ __('Fully Operational') }}</span> • {{ __('Última sincronización de inventario: 3 minutos') }}</p>
                <p class="text-label-sm font-label-sm text-outline">{{ __('© 2024 WonkaFactory. v1.0.0') }}</p>
            </footer>
            
    <!-- Floating Action Button (FAB) - Only for Main Dashboard Actions -->
    <a href="/batchregister"
        class="fixed bottom-margin right-margin w-14 h-14 bg-primary text-on-primary rounded-full shadow-lg flex items-center justify-center hover:scale-105 active:scale-95 transition-transform z-[70]">
        <span class="material-symbols-outlined text-[28px]" data-icon="add">add</span>
    </a>
@endsection
