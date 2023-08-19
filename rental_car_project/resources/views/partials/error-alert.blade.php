@if($errors->has('error'))
    <div class="flashbag-master" id="error">
        <x-alert type="danger">
            {{ $errors->first('error') }}
        </x-alert>
    </div>
@endif

<script>
    let error = document.getElementById('error');
    setTimeout(function (){
        error.classList.add('d-none');

    }, 2000);
</script>
