@extends('layouts.base')
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Ajout de produits</h2>
                    </div>
                </div>
            </div>
            <div>
                <form method="POST" enctype="multipart/form-data"id='sendForm'>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="" class="form-control">
                                <option></option>
                                <option value="1">Actif</option>
                                <option value="0">Désactivé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" required rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="index.html" class="btn btn-secondary">Annuler</a>
                        <button class="btn btn-success">Créer</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let urlForm = '/admin/products/store';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let form = document.querySelector('form');

    document.querySelector('#sendForm').addEventListener('submit',function (event){
        event.preventDefault()
        const formData = new FormData(form);
        fetch(urlForm,{
            headers:{
                'X-Requested-With':'XMLHttpResquest',
                'X-CSRF-TOKEN':token,
            },
            method : 'POST',
            credentials:'same-origin',
            body : formData
        }).then(data =>{
         if(data.status == 200){
             alert('Produit crée avec succes');
             //redirectoon 
             window.location = '/admin/products/index';
         }
        }).catch(error =>{
            console.table(error)
        })
    });
    
    

   


</script>
@endsection
