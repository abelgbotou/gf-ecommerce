@extends('layouts.base')
@section('content')

<div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Gérer les <b>Products</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('create')}}" class="btn btn-success">
                                <i class="fa-solid fa-circle-plus"></i>
                              Ajouter un nouveau produit
                            </a>
                            <a href="" class="btn btn-danger" data-toggle="modal">
                                Tous supprimer
                            </a>
                        </div>
                    </div>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
                <table class="table table-striped table-hover">

                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Image
                            </th>
                            <th>Name</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                  @foreach ($products as $product)
                        <tr>
                            <td>  {{$product->id}} </td>
                            <td>
                                <img 
                                  class="img-thumbnail rounded" 
                                  width="50" height="50" src="{{Storage::url($product->image)}}" alt="">
                            </td>
                            <td> {{$product->name}} </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->description}}</td>
                            <td>
                                @if ($product->status==1)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                   <i class="fas fa-exclamation-circle text-danger"></i>
                                @endif
                            </td>
                            <td>
                                <a href="" class="text-info" data-toggle="modal">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('edit',['id'=>$product->id])}}"class="edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{route('delete',['product'=>$product->id])}}"class="delete" data-toggle="modal">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                  @endforeach

                      
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Supprimer ce produit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Annuler">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection