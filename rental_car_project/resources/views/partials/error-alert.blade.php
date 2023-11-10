@if($errors->has('error'))
    <div class="flashbag-master" id="error">
        <x-master-alert type="danger">
            {{ $errors->first('error') }}
        </x-master-alert>
    </div>
@endif

<script>
    let error = document.getElementById('error');
    setTimeout(function (){
        error.classList.add('d-none');

    }, 4000);
</script>
