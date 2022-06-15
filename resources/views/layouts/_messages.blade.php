@if(session()->has('successMessage'))
    <div class="alert alert-success">{{ session('successMessage') }}</div>
@endif
@if(session()->has('errorMessage'))
    <div class="alert alert-danger">{{ session('errorMessage') }}</div>
@endif
