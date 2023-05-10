@vite(['resources/js/modules/resumen/ventas/index.js'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resumen ventas!') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("Resumen ventas!") }} --}}

                    <div class="input-group mb-3">
                        <span class="input-group-text">Producto con mayor stock</span>
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username">
                          <label id="LabelProductoMayorStock"></label>
                        </div>
                      </div>

                      <div class="input-group mb-3">
                        <span class="input-group-text">Producto con mayor venta</span>
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username">
                          <label for="LabelProductoMayorVenta"></label>
                        </div>
                      </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
