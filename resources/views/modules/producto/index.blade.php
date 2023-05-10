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
                                            <!-- Button trigger modal Registros-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Registrar nuevo producto
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Nuevo Producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                    <form id="form-create-producto-inventario">
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nombre</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext" id="staticEmail" value="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Referencia</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Precio</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Precio</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Categoria</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Stock</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                        </div>
                                    </form>



                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Registrar Producto</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">

                        <table id="table-listado-productos-inventario" class="table text-center">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">REFERENCIA</th>
                                <th scope="col">PRECIO</th>
                                <th scope="col">PESO</th>
                                <th scope="col">CATEGORIA</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">CREADO</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $item)
                                    {{-- {{ $item }} --}}
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->referencia }}</td>
                                        <td>{{ $item->precio }}</td>
                                        <td>{{ $item->peso }}</td>
                                        <td>{{ $item->categoria }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><input class="btn btn-info" type="button" value="edit"></td>
                                        <td><input class="btn btn-danger" type="button" value="delete"></td>
                                      </tr>
                                @endforeach
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

