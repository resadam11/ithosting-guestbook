@extends('layouts.app')

@section('content')
    <h1>Vendégkönyv</h1>

    <div id="validationMessage" class="alert alert-danger" role="alert" style="display: none"></div>

    <form method="POST" id="myForm" name="myForm" action="{{ route('guestbook.store') }}">
    @csrf
        <div class="form-group">
            <label for="title">Név</label>
            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Név" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="number">Üzenet</label>
            <textarea type="text" id="message" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Üzenet szövege..." rows="2">{{ old('message') }}</textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Elküld</button>
  </form>
  <div class="mt-5">
    @include('guestbook.widget.list')
  </div>
@endsection

@section('javascript')
<script type = "text/javascript"> 
    document.querySelector('#myForm').addEventListener('submit', (e) => {
        e.preventDefault();
        if(validate()){
            document.getElementById("myForm").submit();
        }
    });

    const validationMessage = document.getElementById("validationMessage");

    function validate() { 
        document.myForm.name.classList.remove("is-invalid");    
        document.myForm.message.classList.remove("is-invalid");  

        if( document.myForm.name.value == "" ||            
            document.myForm.message.value.length > 100) {  
            validationMessage.innerHTML = 'A név mező kitöltése kötelező és hossza nem lehet több 100 karakternél!';     
            validationMessage.style.display = 'block';
            document.myForm.name.focus() ;      
            document.myForm.name.classList.add("is-invalid");
            return false;  
        }  
        if( document.myForm.message.value == "" ||            
            document.myForm.message.value.length > 400) {  
            validationMessage.innerHTML = 'Az üzenet mező kitöltése kötelező és hossza nem lehet több 400 karakternél!';     
            validationMessage.style.display = 'block';     
            document.myForm.message.focus() ;     
            document.myForm.message.classList.add("is-invalid"); 
            return false; 
        }  
        return( true );  
    }  
 </script>
@endsection