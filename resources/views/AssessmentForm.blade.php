<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Interview-Form</title>
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body style="background-color: rgb(152, 224, 255)">
   
    <div class="container mt-3">
       <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">Ajax</a>
      <x-alertmessage type="success"/>
         <div class="card shadow mt-3 border-top border-bottom border-info border-3">
               
            <div class="card-header d-flex " style="background-color: #ced2d6">
              <img src="{{ asset('image/logo.png') }}" alt="" style="height:45px;width:200px" class="col-sm-2">
               <h4 class="text-dark mr-2 pt-2 text-center">Assessment Test for Intern</h4>

            </div>
            <div class="card-body" style="background-color: rgb(231, 242, 242)">
              @if (isset($user_update))
              {{-- update form components --}}
              <x-update :data="$user_update"/>
              @else
              {{-- insert form components --}}
              <x-insert/>
              @endif    
            </div>
         </div>


         {{-- Table Start --}}
         <div class="mt-5 card mb-5">
            <table class=" table table-bordered">
                <thead class="table-dark">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Skill</th>
                  <th>Image</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($employees as $employee)
                  <tr>
                       <td>{{ $employee->name }}</td> 
                       <td>{{ $employee->email }}</td> 
                       <td>{{ $employee->gender }}</td> 
                       <td>
                    
                        
                        @php
                         $skills= json_decode($employee->skill)
                        @endphp
                    
                        @foreach ($skills as $skill)
                          
                          <span class="badge rounded-pill text-bg-info">{{ $skill }}</span>
                        @endforeach
                      
                        </td> 
                       
                        <td align="center">
                            <img src="{{asset('/storage/employee_image/'.$employee->image)}}" alt="" style="width:100px;height:100px;margin:auto"></td>
                        </td>

                        <td>
                          <a href="{{ route('employees.edit',['employee'=>$employee->id]) }}" class="btn btn-success btn-sm mt-4" name="btn">Edit</a>

                          <a href="{{ route('employees.show',['employee'=>$employee->id]) }}" class="btn btn-danger btn-sm mt-4">Delete</a>
                          
                        </td>
                  </tr>


                  @endforeach
 

                  
                </tbody>
              </table>
         </div>
    </div>

 
 
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

 <script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>
 <script>
  $(document).ready(function(){
  //  alert();
     $(document).on('click','.add_employee',function(e){
      // e.preventDefault();
      let name=$('#name').val();
      let email=$('#email').val();
      let gender = $('input[name="gender"]:checked').val();
       console.log(name+email+gender);
       $.ajax({
  url: "{{ route('employees.store') }}",
  method: "post",
  data: { name: name, email: email, gender: gender },
  success: function(response) {
    
  },
  error: function(xhr, status, error) {
 
  }
});

     })
  });
 </script>
 <script>
  let imagename=document.getElementById("imageInput");
  
   imagename.addEventListener("input",function(event){
      var tmppath = URL.createObjectURL(event.target.files[0]);
   
      document.getElementById("image").src=tmppath;
      
   });
</script>
  </body>
</html>