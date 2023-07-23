<form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
          <x-error name="name"/>
        </div>

      </div>
      <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }} ">
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
            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male"{{ old('gender') == 'Male' ? 'checked' : '' }}>
            <label class="form-check-label" for="male">
              Male
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
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
                  <input class="form-check-input" type="checkbox" value="Laravel" name="skill[]" id="flexCheckDefault" @if(old('skill') && in_array('Laravel', old('skill'))) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">
                    Laravel
                  </label>
                </div>
                 
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Ajax" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('Ajax', old('skill'))) checked @endif>
                  <label class="form-check-label" for="flexCheckChecked">
                    Ajax
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="MySQL" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('MySQL', old('skill'))) checked @endif>
                  <label class="form-check-label" for="flexCheckChecked">
                    MySQL
                  </label>
                </div>
          </div>

          <div class="col-sm-3">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Codeiniter" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('Codeiniter', old('skill'))) checked @endif>
                  <label class="form-check-label" for="flexCheckChecked">
                    Codeiniter
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="VUE JS" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('VUE JS', old('skill'))) checked @endif>
                  <label class="form-check-label" for="flexCheckChecked">
                   VUE JS
                  </label>
                </div>
                <div class="form-check">
                  <input  class="form-check-input" type="checkbox" value="API" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array(' API', old('skill'))) checked @endif>
                  <label class="form-check-label" for="flexCheckChecked">
                  API
                  </label>
                </div>
             
          </div>
          <x-error name="skill"/>
         
        </div>
       
      </div>
      <div class="d-grid gap-2 col-2 mx-auto ">
          
          <button class="btn text-white add_employee" type="submit" style="background-color: #003d0c">Submit</button>
        </div>
    </form>