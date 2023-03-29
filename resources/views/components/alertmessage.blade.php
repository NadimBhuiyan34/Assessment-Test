@props(['type'=>'danger'])

@if (session('message'))
        
  <div role="alert" aria-live="assertive"  class="toast show position-absolute text-center bg-white" data-bs-autohide="true" style=" margin: auto; top:0; left:0; right:0;  height:auto;  z-index: 1;" data-bs-delay="10000">

    
     
      @if (session('type')=='delete')
      
      @elseif (session('type')=='danger')
    
      @else
     
      @endif
        
        <div class="toast-body">
          <p class="text-{{ session('type') }}">{{ session('message') }}</p>
          <button type="button" class="btn btn-success" data-bs-dismiss="toast">OK</button>
        </div>

         
        
         



        
  </div>
      
      
   


@endif
 