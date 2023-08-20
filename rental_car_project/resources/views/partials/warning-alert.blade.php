@if($errors->has('warning'))
    <div class="flashbag-master" id="warning">
        <x-alert type="warning">
            {{ $errors->first('warning') }}
        </x-alert>
    </div>
@endif

<script>
    let warning = document.getElementById('warning');
    setTimeout(function (){
        warning.classList.add('d-none');

    }, 2500);
</script>
