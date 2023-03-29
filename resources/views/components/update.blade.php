
@props(['data'])

 @php
      $skills= json_decode($data[0]->skill);
 @endphp

<form method="post" action="{{ route('employees.update',['employee'=>$data[0]->id]) }}" enctype="multipart/form-data">
    @csrf
  @method('patch')
  <input type="hidden" value="{{ $data[0]->image }}" name="oldimage">
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}{{ $data[0]->name }}">
          <x-error name="name"/>
        </div>

      </div>
      <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}{{ $data[0]->email }} ">
          <x-error name="email"/>
        </div>
      </div>

      <div class="row mb-3">
        <label for="image" class="col-sm-2 col-form-label">Image</label> 
        <div class="col-sm-10">
            <img src="{{asset('/storage/employee_image/'.$data[0]->image)}}" alt="" style="width:100px;height:100px;margin:auto" id="image">
          <input type="file" class="form-control" id="imageInput" name="image">
          <x-error name="image"/>
        </div>
        
      </div>
      

      <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
        <div class="col-sm-10">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="Male"{{ old('gender') == 'Male' ? 'checked' : '' }}@if ($data[0]->gender=="Male")
                checked
            @endif>
            <label class="form-check-label" for="male">
              Male
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} @if ($data[0]->gender=="Female")
            checked
        @endif>
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
            {{-- @foreach ($skills as $skill) --}}
          <div class="col-sm-2 ">
             
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Laravel" name="skill[]" id="flexCheckDefault" @if(old('skill') && in_array('Laravel', old('skill'))) checked @endif {{ in_array('Laravel',$skills)?'checked':'' }}>

                  <label class="form-check-label" for="flexCheckDefault">
                    Laravel
                  </label>
                </div>
                 
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Ajax" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('Ajax', old('skill'))) checked @endif   {{ in_array('Ajax',$skills)?'checked':'' }}>
                  <label class="form-check-label" for="flexCheckChecked">
                    Ajax
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="MySQL" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('MySQL', old('skill'))) checked @endif   {{ in_array('MySQL',$skills)?'checked':'' }} >
                  <label class="form-check-label" for="flexCheckChecked">
                    MySQL
                  </label>
                </div>
          </div>

          <div class="col-sm-3">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Codeiniter" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('Codeiniter', old('skill'))) checked @endif  {{ in_array('Codeiniter',$skills)?'checked':'' }}>
                  <label class="form-check-label" for="flexCheckChecked">
                    Codeiniter
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="VUE JS" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array('VUE JS', old('skill'))) checked @endif  {{ in_array('VUE JS',$skills)?'checked':'' }}>
                  <label class="form-check-label" for="flexCheckChecked">
                   VUE JS
                  </label>
                </div>
                <div class="form-check">
                  <input  class="form-check-input" type="checkbox" value="API" name="skill[]" id="flexCheckChecked" @if(old('skill') && in_array(' API', old('skill'))) checked @endif  {{ in_array('API',$skills)?'checked':'' }}>
                  <label class="form-check-label" for="flexCheckChecked">
                  API
                  </label>
                </div>
                
          </div>
          <x-error name="skill"/>
         
        </div>
       
      </div>
      <div class="text-center">
          
          <button class="btn text-white btn-inline btn-sm" type="submit" style="background-color: #003d0c">Save Change</button>
         <a href="{{ route('home') }}" class="btn btn-danger btn-sm btn-inline">Clear</a>
      </div>
    </form>
     