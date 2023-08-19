@if(session()->has('success'))
<div class="flashbag-main" id="flashbag">
    <x-alert type="success">
        {{session('success')}}
    </x-alert>
</div>
@endif

<script>
    let flashbag = document.getElementById('flashbag');
    setTimeout(function (){
        flashbag.classList.add('d-none');

    }, 2000);
</script>


