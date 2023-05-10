@vite(['resources/js/modules/ventas_productos/index.js'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Ventas!") }}

                    <form id="form-venta-producto">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                            <input type="number"  class="form-control-plaintext" id="staticEmail" name='id'>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Cantidad</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputPassword" name='cantidad'>
                            </div>
                        </div>
                        <div class="row" style="text-align: right">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" >
                                Realizar venta del producto
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
