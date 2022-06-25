@extends('layouts.base')
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Modification de produits</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <form method="post" action="{{route('update',['id'=>$product->id])}}" class="col-lg-7" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" 
                                 name='name'
                                 value="{{$product->name}}" 
                                 class="form-control" 
                                 required
                            >
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="text"
                                class="form-control" 
                                required
                                value="{{$product->price}}"
                                name="price" 
                            >
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="" class="form-control">
                                <option></option> 
                                <option @if($product->status==1)selected @endif value="1">Actif</option>
                                <option @if($product->status==0)selected @endif value="0">Désactivé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file"
                               name="image" 
                               id="image"
                               class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea 
                            class="form-control" 
                            required rows="10"
                            name="description"
                            >{{$product->description}} </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('index')}}" class="btn btn-secondary">Annuler</a>
                        <input type="submit" class="btn btn-success" value="Enregistrer">
                    </div>
                </form>
                <div class="col-lg-5">
                   <label for="image">
                    <img src="{{Storage::url($product->image)}}" width="500px" height="auto" alt="">
                   </label>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection