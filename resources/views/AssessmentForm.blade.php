<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interview-Form</title>
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body style="background-color: rgb(152, 224, 255)">
 
    <div class="container mt-3">
      <x-alertmessage type="success"/>
         <div class="card shadow mt-3 border-top border-bottom border-info border-3">
            <div class="card-header bg-primary">
               <h3 class="text-center text-white">Assessment Test for Software Engineer Intern</h3>
            </div>
            <div class="card-body" style="background-color: rgb(231, 242, 242)">
                
                <form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                  @csrf
                
                    <div class="row mb-3">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                        <x-error name="name"/>
                      </div>
 
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                        <x-error name="email"/>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="image" class="col-sm-2 col-form-label">Image</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                        <x-error name="image"/>
                      </div>
                      
                    </div>
                    
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                      <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                          <label class="form-check-label" for="male">
                            Male
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="femail" value="female">
                          <label class="form-check-label" for="female">
                            Female
                          </label>
                        </div>
                        <x-error name="gender"/>
                      </div>
                    </fieldset>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Skill</legend>
                      <div class="col-sm-10 row ">
                        <div class="col-sm-2 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Laravel" name="skill[]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Laravel
                                </label>
                              </div>
                               
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Ajax" name="skill[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                  Ajax
                                </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="MySQl" name="skill[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                  MySQL
                                </label>
                              </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Codeiniter" name="skill[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                  Codeiniter
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="VUE JS" name="skill[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                 VUE JS
                                </label>
                              </div>
                              <div class="form-check">
                                <input  class="form-check-input" type="checkbox" value="API" name="skill[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                API
                                </label>
                              </div>
                           
                        </div>
                        <x-error name="skill"/>
                          


                        
                          
                       
                      </div>
                     
                    </div>
                    <div class="d-grid gap-2 col-2 mx-auto ">
                        
                        <button class="btn text-white" type="submit" style="background-color: #003d0c">Submit</button>
                      </div>
                  </form>
            </div>
         </div>
         <div class="mt-5 card">
            <table class="table">
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
                          {{ $skill }}
                        @endforeach
                        </td> 
                       
                          <td align="center"><img src="{{asset('/storage/employee_image/'.$employee->image)}}" alt="" style="width:100px;height:100px;margin:auto"></td>
                        </td>
                        <td class="">
                       
                          <form action="{{ route('employees.show',['employee' => $employee->id]) }}" method="post">
                          <a href="{{ route('employees.edit',['employee' => $employee->id]) }}" class="btn btn-success btn-sm ">Edit</a>
                       
                           

                        
                          
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                           </form>
                      
                          
                        </td>
                  </tr>
                  @endforeach
                    
                    
                  
                </tbody>
              </table>
         </div>
    </div>
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>