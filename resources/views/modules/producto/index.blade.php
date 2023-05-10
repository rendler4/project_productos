@vite(['resources/js/modules/inventario_productos/index.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventario de Productos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Inventario de Productos!") }}
                </div> --}}

                <div class="card">
                    <div class="card-header">
                        {{-- <button id="btnPrueba">hyhy</button> --}}
                    </div>
                    <div class="card-body">

                        <table id="table-listado-productos-inventario" class="table table-dark">
                            <thead>
                              <tr>
                                <th scope="col">id</th>
                                <th scope="col">nombre</th>
                                <th scope="col">referencia</th>
                                <th scope="col">precio</th>
                                <th scope="col">peso</th>
                                <th scope="col">categoria</th>
                                <th scope="col">stock</th>
                                <th scope="col">Creado</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $item)
                                    {{ $item }}
                                @endforeach

                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td >Larry the Bird</td>
                                <td>Thornton</td>
                                <td>@twitter</td>
                                <td >Larry the Bird</td>
                                <td>Thornton</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                              </tr>
                            </tbody>
                          </table>



                      {{-- <blockquote class="blockquote mb-0">
                        <p>A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      </blockquote> --}}

                    </div>
                  </div>


            </div>
        </div>
    </div>



</x-app-layout>

