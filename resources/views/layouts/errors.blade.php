@if ($errors->any())
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3 form-group">
            <div class="alert alert-danger m-0">
                <ul class="m-0 pl-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif